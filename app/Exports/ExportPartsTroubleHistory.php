<?php

namespace App\Exports;

use DB;
use App\Models\PartTroubleHistory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ExportPartsTroubleHistory implements FromCollection, WithHeadings, WithEvents, WithCustomStartCell{
    protected $from;
    protected $to;

    protected $mergeRanges = [];

    protected $records;

    protected $recordStartRows;

    public function __construct($from, $to){

        $this->from = $from;
        $this->to   = $to;

        // 🔒 LOAD ONCE
        $this->records = PartTroubleHistory::with(['defects.defect_item', 'improvements'])
            ->whereBetween('date_encountered', [
                $this->from . ' 00:00:00',
                $this->to   . ' 23:59:59'
            ])
            ->orderBy('date_encountered', 'ASC')
            ->get();
    }

    protected function getRecords(){

        if ($this->records === null) {
            $this->records = PartTroubleHistory::with(['defects.defect_item', 'improvements'])
                ->whereBetween('date_encountered', [
                    $this->from . ' 00:00:00',
                    $this->to   . ' 23:59:59'
                ])
                ->orderBy('date_encountered', 'ASC')
                ->get();
        }

        return $this->records;
    }

    public function collection(){

        // 🔒 RESET state (CRITICAL)
        $this->mergeRanges = [];
        $this->recordStartRows = [];

        $rows = new Collection();
        $currentRow = 3;

        foreach ($this->records as $record) {

            $defect = $record->defects->first();
            $improvements = collect($record->improvements);

            $rowCount = max($improvements->count(), 1);
            $startRow = $currentRow;
            $endRow   = $currentRow + $rowCount - 1;

            $this->recordStartRows[$record->id] = $startRow;

            for ($i = 0; $i < $rowCount; $i++) {
                $improvement = $improvements->get($i);

                $rows->push([
                    $record->date_encountered,
                    $record->model,
                    $defect->defect_item->defect_name ?? '',
                    '', // image column
                    $defect->no_of_occurrence ?? '',
                    $defect->root_cause ?? '',
                    $improvement ? $improvement->improvement_actions : '',
                    $improvement ? $improvement->remarks : '',
                ]);
            }

            // merge only if truly multi-row
            if ($rowCount > 1) {
                foreach (['A','B','C','D','E','F'] as $col) {
                    $this->mergeRanges[] = "{$col}{$startRow}:{$col}{$endRow}";
                }
            }

            $currentRow = $endRow + 1;
        }

        return $rows;
    }

    // public function collection(){

    //     $rows = new Collection();
    //     $currentRow = 3; // row 1 = title, row 2 = headings
    //     $this->recordStartRows = []; // new property to store start row per record

    //     // $records = PartTroubleHistory::with(['defects.defect_item', 'improvements'])
    //     //     ->whereBetween('date_encountered', [
    //     //         $this->from . ' 00:00:00',
    //     //         $this->to   . ' 23:59:59'
    //     //     ])
    //     //     ->orderBy('date_encountered', 'ASC')
    //     //     ->get();
    //     $records = $this->getRecords();

    //     foreach ($records as $record) {

    //         $defect = $record->defects->first(); // SINGLE defect
    //         $improvements = $record->improvements;

    //         $rowCount = max($improvements->count(), 1);
    //         $startRow = $currentRow;
    //         $endRow   = $currentRow + $rowCount - 1;

    //         $this->recordStartRows[$record->id] = $startRow; // store start row

    //         for ($i = 0; $i < $rowCount; $i++) {
    //             $rows->push([
    //                 $record->date_encountered,
    //                 $record->model,

    //                 $defect->defect_item->defect_name ?? '',
    //                 // $defect->illustration_of_defect ?? '',
    //                 '', // leave illustration column empty (image goes here)
    //                 $defect->no_of_occurrence ?? '',
    //                 $defect->root_cause ?? '',

    //                 $improvements[$i]->improvement_actions ?? '',
    //                 $improvements[$i]->remarks ?? '',
    //             ]);
    //         }

    //         // store merge ranges (A–F columns)
    //         if ($rowCount > 1) {
    //             foreach (['A','B','C','D','E','F'] as $col) {
    //                 $this->mergeRanges[] = "{$col}{$startRow}:{$col}{$endRow}";
    //             }
    //         }

    //         $currentRow = $endRow + 1;
    //     }

    //     return $rows;
    // }

    public function headings(): array{
        return [
            'Date Encountered',
            'Model',
            'Mode of Defect',
            'Illustration of Defect',
            'No. of Occurrence',
            'Root Cause',
            'Improvement Actions',
            'Remarks',
        ];
    }

    public function startCell(): string{
        return 'A2';
    }

    // public function drawings(){

    //     $drawings = [];

    //     foreach ($this->records as $record) {

    //         $defect = $record->defects->first();
    //         if (!$defect || !$defect->illustration_of_defect) {
    //             continue;
    //         }

    //         $startRow = $this->recordStartRows[$record->id] ?? null;
    //         if (!$startRow || $startRow < 3) {
    //             continue;
    //         }

    //         $imagePath = storage_path(
    //             'app/public/file_attachments/' . $defect->illustration_of_defect
    //         );

    //         if (!file_exists($imagePath)) {
    //             continue;
    //         }

    //         $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //         $drawing->setPath($imagePath);
    //         $drawing->setCoordinates("D{$startRow}");
    //         $drawing->setWidth(300);
    //         $drawing->setHeight(200);
    //         $drawing->setOffsetX(10);
    //         $drawing->setOffsetY(10);

    //         $drawings[] = $drawing;
    //     }

    //     return $drawings;
    // }

    // public function drawings(){

    //     $drawings = [];
    //     $currentRow = 3;

    //     $records = $this->getRecords();

    //     foreach ($records as $record) {
    //         $defect = $record->defects->first();
    //         $improvements = $record->improvements;
    //         $rowCount = max($improvements->count(), 1);

    //         for ($i = 0; $i < $rowCount; $i++) {
    //             if (!empty($defect->illustration_of_defect)) {
    //                 $imagePath = storage_path(
    //                     'app/public/file_attachments/' . $defect->illustration_of_defect
    //                 );

    //                 if (file_exists($imagePath)) {

    //                     $drawing = new Drawing();
    //                     $drawing->setName('Illustration');
    //                     $drawing->setDescription('Illustration of Defect');
    //                     $drawing->setPath($imagePath);

    //                     // Use the exact row stored in collection()
    //                     $startRow = $this->recordStartRows[$record->id] ?? null;

    //                     if ($startRow) {
    //                         $drawing->setCoordinates("D{$startRow}");
    //                     }

    //                     // Place image inside Illustration column (D)
    //                     // $drawing->setCoordinates("D{$currentRow}");

    //                     // Image size (100px width × 200px height)
    //                     $drawing->setWidth(280);
    //                     $drawing->setHeight(180);

    //                     // Padding inside cell
    //                     $drawing->setOffsetX(5);
    //                     $drawing->setOffsetY(5);

    //                     $drawings[] = $drawing;
    //                 }
    //             }

    //             $currentRow++;
    //         }
    //     }

    //     return $drawings;
    // }

    // public function registerEvents(): array{
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {

    //             $sheet = $event->sheet->getDelegate();

    //             $lastRow = $sheet->getHighestRow();
    //             $lastCol = 'H';

    //             // Apply merges
    //             foreach ($this->mergeRanges as $range) {
    //                 $sheet->mergeCells($range);
    //             }

    //             // Determine last row
    //             $lastRow = $sheet->getHighestRow();
    //             $lastCol = 'H';

    //             // Apply borders to entire table
    //             $sheet->getStyle("A1:{$lastCol}{$lastRow}")
    //                 ->getBorders()
    //                 ->getAllBorders()
    //                 ->setBorderStyle(Border::BORDER_THIN);

    //             // Vertical center for merged cells
    //             $sheet->getStyle("A2:F{$lastRow}")
    //                 ->getAlignment()
    //                 ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    //             // Disable wrap text for headers (row 1)
    //             $sheet->getStyle("A1:{$lastCol}1")
    //                 ->getAlignment()
    //                 ->setWrapText(false);

    //             // Auto-size all columns
    //             foreach (range('A', $lastCol) as $col) {
    //                 $sheet->getColumnDimension($col)->setAutoSize(true);
    //             }

    //             // Optional: wrap text for body (rows 2+)
    //             $sheet->getStyle("A2:{$lastCol}{$lastRow}")
    //                 ->getAlignment()
    //                 ->setWrapText(true);
    //         }
    //     ];
    // }

    public function registerEvents(): array {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();
                $lastCol = 'H';
                $lastRow = $sheet->getHighestRow();

                /**
                 * COLUMN WIDTH
                 * Excel column width ≈ pixels / 7
                 * 100px ÷ 7 ≈ 14.3
                 */
                $sheet->getColumnDimension('D')->setWidth(42.9);

                /**
                 * ROW HEIGHT
                 * Excel row height is in points
                 * 100px ≈ 75 points
                 */
                for ($row = 3; $row <= $lastRow; $row++) {
                    $sheet->getRowDimension($row)->setRowHeight(150);
                }

                /**
                 * Center alignment for illustration column
                 */
                $sheet->getStyle("D3:D{$lastRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                // 1. Title row
                $sheet->setCellValue('A1', 'TS-F1 PRODUCTS PAST TROUBLE HISTORY');
                $sheet->mergeCells('A1:H1');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                // 2. Header row formatting (row 2)
                $headerRow = 2;
                $sheet->getStyle("A{$headerRow}:{$lastCol}{$headerRow}")
                    ->getFont()->setBold(true);
                $sheet->getStyle("A{$headerRow}:{$lastCol}{$headerRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(false);
                $sheet->getStyle("A{$headerRow}:{$lastCol}{$headerRow}")
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFF00'); // Yellow

                // 3. Apply merges from collection
                foreach ($this->mergeRanges as $range) {
                    $sheet->mergeCells($range);
                }

                // 4. Apply borders to entire table
                $sheet->getStyle("A{$headerRow}:{$lastCol}{$lastRow}")
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(Border::BORDER_THIN);

                // 5. Auto-size columns
                foreach (range('A', $lastCol) as $col) {
                    // Skip Illustration column (D)
                    if ($col === 'D') {
                        continue;
                    }

                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                // 6. Data rows formatting (row 3 onward)
                $sheet->getStyle("A" . ($headerRow + 1) . ":{$lastCol}{$lastRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);

                // --- INSERT IMAGES ---
                foreach ($this->records as $record) {

                    $defect = $record->defects->first();
                    if (!$defect || !$defect->illustration_of_defect) {
                        continue;
                    }

                    $startRow = $this->recordStartRows[$record->id] ?? null;
                    if (!$startRow) {
                        continue;
                    }

                    $imagePath = storage_path(
                        'app/public/file_attachments/' . $defect->illustration_of_defect
                    );

                    if (!file_exists($imagePath)) {
                        continue;
                    }

                    $drawing = new Drawing();
                    $drawing->setPath($imagePath);
                    $drawing->setCoordinates("D{$startRow}");
                    $drawing->setWidth(120);
                    $drawing->setHeight(180);
                    $drawing->setOffsetX(10);
                    $drawing->setOffsetY(10);

                    $drawing->setWorksheet($sheet);
                }
            }
        ];
    }
}
