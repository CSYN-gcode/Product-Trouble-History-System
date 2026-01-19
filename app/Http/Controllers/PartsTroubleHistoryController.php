<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\PthsDefects;
use App\Models\PthsImprovements;
use App\Models\PartTroubleHistory;
use App\Models\WbsTsMatKitting;
use App\Models\WbsCnMatKitting;
use App\Models\WbsYfMatKitting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPartsTroubleHistory;
use Illuminate\Support\Facades\Cache;

class PartsTroubleHistoryController extends Controller
{
    public function viewPartsTroubleHistoryInfo(Request $request){
        $parts_trouble_history_details = PartTroubleHistory::with(['defects.defect_item', 'improvements'])->get();

        // return $parts_trouble_history_details;
        return DataTables::of($parts_trouble_history_details)
        ->addColumn('action', function($parts_trouble_history_details){
            $result = "";
            $result .= "<center>";
            $result .= "<button class='btn btn-secondary btn-sm btnEdit mr-1' data-id='$parts_trouble_history_details->id'><i class='fa-solid fa-pen-to-square'></i></button>";
            if($parts_trouble_history_details->status == 0){
                $result .= "<button class='btn btn-danger btn-sm btnDisable' data-id='$parts_trouble_history_details->id'><i class='fa-solid fa-ban'></i></button>";
            }
            else{
                $result .= "<button class='btn btn-success btn-sm btnEnable' data-id='$parts_trouble_history_details->id'><i class='fa-solid fa-rotate-left'></i></button>";
            }
            $result .= "</center>";
            return $result;
        })
        ->addColumn('status_label', function($parts_trouble_history_details){
            $result = "";
            $result .= "<center>";

            if($parts_trouble_history_details->status == 0){
                $result .= "<span class='badge rounded-pill bg-success'>Active</span>";
            }else{
                $result .= "<span class='badge rounded-pill bg-danger'>Inactive</span>";
            }
            $result .= "</center>";

            return $result;
        })
        ->addColumn('mode_of_defect', function($parts_trouble_history_details){
            $result = "";
            $result .= "<center>";
            $result .= $parts_trouble_history_details->defects->defect_item ? $parts_trouble_history_details->defects->defect_item->defect_name : 'N/A';
            $result .= "</center>";

            return $result;
        })
        ->rawColumns(['action', 'status_label', 'mode_of_defect'])
        ->make(true);
    }

    public function addPartsTroubleHistoryInfo(Request $request){
        $validation = array(
            'situation' => 'required',
            'section' => 'required',
            'date_encountered' => 'required',
            'model' => 'required',
            'illustration_of_defect' => ['nullable','file','mimes:jpg,jpeg,png,webp','max:10240'], // 5MB
            'no_of_occurrence' => 'required',
            'defect_id' => 'required',
            // 'root_cause' => 'required',
            'factor.*' => 'required|string',
            'cause.*' => 'required|string',
            'analysis.*' => 'required|string',
            'counter_measure.*' => 'required|string',
            'implementation_date.*' => 'required|string',
            // 'improvement_action.*' => 'required|string',
            // 'improvement_action_remarks.*' => 'required|string'
        );

        $data = $request->all();
        $validator = Validator::make($data, $validation);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }else{
            // return 'true';
            DB::beginTransaction();

            try{
                // if ($request->hasFile('illustration_of_defect')) {

                //     // delete old file if replace
                //     if ($request->illustration_of_defect && Storage::exists('public/parts_trouble_history/' . $request->illustration_of_defect)) {
                //         Storage::delete('public/parts_trouble_history/' . $request->illustration_of_defect);
                //     }

                //     $file = $request->file('illustration_of_defect');
                //     $filename = time() . '_' . $file->getClientOriginalName();
                //     $file->storeAs('public/parts_trouble_history', $filename);

                //     $request->attachment = $filename; // save only varchar
                // }

                $history_data_array = array(
                    'date_encountered' => $request->date_encountered,
                    'situation' => $request->situation,
                    'section' => $request->section,
                    'model' => $request->model
                );

                if(isset($request->history_id)){ // EDIT
                    $history_id = $request->history_id;

                    PartTroubleHistory::where('id', $request->history_id)
                    ->update($history_data_array);
                }else{ // ADD
                    $history_id = PartTroubleHistory::insertGetId($history_data_array);
                }

                // DELETE OLD PthsDefects ON UPDATE
                PthsDefects::where('history_id', $request->history_id)->delete();

                // SAVE NEW PthsDefects
                if ($request->defect_id){

                    if($request->hasFile('illustration_of_defect')){
                        // FILE HANDLING
                        $uploadedFile = $request->file('illustration_of_defect');

                        // Get the original filename parts
                        $filename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                        $file_extension = $uploadedFile->getClientOriginalExtension();

                        // 🔹 Remove special characters (keep only letters, numbers, spaces, dash, underscore)
                        $cleanName = preg_replace('/[^\p{L}\p{N} _-]/u', '', $filename);
                        // 🔹 Replace spaces with underscores for safety
                        $cleanName = str_replace(' ', '_', $cleanName);
                        // 🔹 Add timestamp or unique ID if needed
                        $cleanedFilename = $cleanName . '.' . $file_extension;

                        // use cleanedFilename to be saved to storage
                        $file_attachment = $cleanedFilename;

                        Storage::putFileAs('public/file_attachments', $request->illustration_of_defect, $file_attachment);
                    }else{
                        // use existing filename
                        $file_attachment = $request->illustration_of_defect_filename;
                    }

                    $pths_defects_data = [
                        'history_id'                => $history_id,
                        'defect_id'                 => $request->defect_id,
                        'illustration_of_defect'    => $file_attachment,
                        'no_of_occurrence'          => $request->no_of_occurrence,
                        'root_cause'                => $request->root_cause,
                    ];

                    // only add illustration if it exists
                    // if (!empty($cleanedFilename)) {
                    //     $pths_defects_data['illustration_of_defect'] = $cleanedFilename;
                    // }

                    PthsDefects::insert($pths_defects_data);
                }

                // DELETE OLD Improvement Actions ON UPDATE
                PthsImprovements::where('history_id', $request->history_id)->delete();

                // SAVE NEW Improvement Actions
                if ($request->factor){
                    foreach ($request->factor as $i => $value){
                        PthsImprovements::insert([
                            'history_id'          => $history_id,
                            'factor'              => $request->factor[$i],
                            'cause'               => $request->cause[$i],
                            'analysis'            => $request->analysis[$i],
                            'counter_measure'     => $request->counter_measure[$i],
                            'implementation_date' => $request->implementation_date[$i]
                            // 'improvement_actions'  => $request->improvement_action[$i],
                            // 'remarks'              => $request->improvement_action_remarks[$i]
                        ]);
                    }
                }

                DB::commit();
                return response()->json(['result' => 1, 'msg' => 'Transaction Succesful']);
            }catch(Exemption $e){
                DB::rollback();
                return $e;
            }
        }
    }

    public function getPartsTroubleHistoryById(Request $request){
        return PartTroubleHistory::with(['defects.defect_item', 'improvements'])->where('id', $request->id)->first();
    }

    public function updatePartsTroubleHistoryStatus(Request $request){
        DB::beginTransaction();

        try {
            $defect = PartTroubleHistory::findOrFail($request->id);

            $defect->status = $defect->status == 1 ? 0 : 1;
            $defect->save();

            DB::commit(); // ✅ commit here

            return response()->json([
                'success' => true,
                'new_status' => $defect->status,
                'message' => 'Past Trouble History Record status updated successfully.'
            ]);
        } catch (\Throwable $e) { // ✅ catch everything including DB errors
            DB::rollBack(); // ✅ rollback only if it fails

            // log the error so you can see what’s happening
            \Log::error('Past Trouble History Record status update failed', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Past Trouble History Record status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    //====================================== DOWNLOAD FILE ======================================
    public function downloadFile(Request $request, $id){
        $file_name = PartTroubleHistory::with('defects')->where('id', $id)->first();
        // return $file_name->defects->illustration_of_defect;
        $filename = $file_name->defects->illustration_of_defect;
        $filePath =  storage_path() . "/app/public/file_attachments/" . $filename;

        $mimeType = mime_content_type($filePath);
        // return $mimeType;

        if (str_starts_with($mimeType, 'image/')) {
            return response()->file($filePath, [
                'Content-Type'        => $mimeType,
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Pragma'        => 'no-cache',
                'Expires'       => '0',
            ]);
        }
        // return Response::download($file, $file_name->illustration_of_defect);
    }

    public function exportExcel(Request $request){

        $request->validate([
            'date_from' => 'required|date',
            'date_to'   => 'required|date|after_or_equal:date_from',
            'situation'   => 'required',
            'section'   => 'required',
        ]);

        $from = $request->date_from;
        $to   = $request->date_to;
        $situation   = $request->situation;
        $section   = $request->section;

        $param1 = $situation === 'ALL' ? 'All Situation' : $situation;
        $param2 = $section === 'ALL' ? 'All Section' : $section;

        $filename = "PTHS_Report_{$param1}_{$param2}_{$from}_to_{$to}.xlsx";

        return Excel::download( new ExportPartsTroubleHistory($from, $to, $situation, $section), $filename );
    }

    private function getMaterialsFrom($connection){
        return DB::connection($connection)
            ->table('tbl_wbs_material_kitting')
            ->select('device_name')
            ->whereNotNull('device_name')
            ->groupBy('device_name')
            ->orderBy('device_name')
            ->pluck('device_name');
    }

    public function getDeviceName(Request $request){

        $self = $this;

        $section = $request->input('section'); // ts, cn, yf, ppd
        $materials = collect();

        // Only run queries if a section is provided
        if ($section) {

            // TS section
            if ($section == 'TS') {
                $materials = $materials->merge($self->getMaterialsFrom('wbs_ts'));
            }

            // CN section
            if ($section == 'CN') {
                $materials = $materials->merge($self->getMaterialsFrom('wbs_cn'));
            }

            // YF section
            if ($section == 'YF') {
                $materials = $materials->merge($self->getMaterialsFrom('wbs_yf'));
            }

            // PPD section (different DB, only run if selected)
            if ($section == 'PPD') {
                $ppd_results = DB::connection('mysql_rapid')->select("
                    SELECT DeviceName
                    FROM tbl_dieset t1
                    WHERE Rev = (
                        SELECT MAX(NULLIF(Rev, ''))
                        FROM tbl_dieset t2
                        WHERE t2.DeviceName = t1.DeviceName
                    )
                    OR (Rev = '' AND NOT EXISTS (
                        SELECT 1
                        FROM tbl_dieset t3
                        WHERE t3.DeviceName = t1.DeviceName
                            AND t3.Rev <> ''
                    ))
                    ORDER BY DeviceName
                ");

                // Extract only DeviceName and wrap for JSON
                foreach ($ppd_results as $row) {
                    $materials->push($row->DeviceName);
                }
            }

            // Deduplicate, sort, and format for JSON
            $materials = $materials
                ->unique()
                ->sort() // sort alphabetically
                ->values() // reset keys
                ->map(function ($value) {
                    return array('materials' => $value);
                })
                ->values() // reset keys after map
                ->toArray();
        }

        // If no section selected, return empty array
        return response()->json($materials);

        // $self = $this;

        // $materials = Cache::remember('device_materials', 3600, function () use ($self) {
        //     return collect()
        //         ->merge($self->getMaterialsFrom('wbs_ts'))
        //         ->merge($self->getMaterialsFrom('wbs_cn'))
        //         ->merge($self->getMaterialsFrom('wbs_yf'))
        //         ->unique()
        //         ->values()
        //         ->map(function ($value) {
        //             return array(
        //                 'materials' => $value
        //             );
        //         })
        //         ->toArray();
        // });

        // $ppd_device_name = DB::connection('mysql_rapid')->select(' SELECT DeviceName, Rev
        //                                                         FROM tbl_dieset t1
        //                                                         WHERE Rev = (
        //                                                             SELECT MAX(NULLIF(Rev, \'\'))
        //                                                             FROM tbl_dieset t2
        //                                                             WHERE t2.DeviceName = t1.DeviceName
        //                                                         )
        //                                                         OR (Rev = \'\' AND NOT EXISTS (
        //                                                             SELECT 1
        //                                                             FROM tbl_dieset t3
        //                                                             WHERE t3.DeviceName = t1.DeviceName
        //                                                                 AND t3.Rev <> \'\'
        //                                                         ))
        //                                                         ORDER BY DeviceName; ');

        // return response()->json($materials);
    }

    public function getCountOfNoOfOccurrence(Request $request){
        [$year, $month] = explode('-', $request->date_encountered);

        if ($month >= 4) {
            // April to December
            $start = $year . '-04-01';
            $end   = ($year + 1) . '-03-31';
        } else {
            // January to March
            $start = ($year - 1) . '-04-01';
            $end   = $year . '-03-31';
        }

        $count =  PartTroubleHistory::
                // with(['defects' => function($query) use ($request) {
                //     $query->where('defect_id', $request->defect_id);  // Add your condition for the 'defects' relationship
                //     $query->whereNull('delete_at');  // You can add more conditions if needed
                // }])
                where('situation', $request->situation)
                ->where('section', $request->section)
                ->where('model', $request->model)
                ->whereBetween('date_encountered', [$start, $end])
                ->whereHas('defects', function ($query) use ($request) {
                    $query->where('defect_id', $request->defect_id)
                            ->whereNull('deleted_at');
                })
                ->count();

                // +1 because current occurrence is not yet included
                $ordinal = $this->ordinal($count + 1);

                return response()->json([
                    'count'   => $count,
                    'ordinal' => $ordinal
                ]);
    }

    private function ordinal($number){
        if (!in_array($number % 100, [11, 12, 13])) {
            switch ($number % 10) {
                case 1: return $number . 'st';
                case 2: return $number . 'nd';
                case 3: return $number . 'rd';
            }
        }

        return $number . 'th';
    }
}
