<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\PthsDefects;
use App\Models\PthsImprovements;
use App\Models\PartTroubleHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPartsTroubleHistory;

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
        ->addColumn('improvements', function($parts_trouble_history_details){
            $result = "";
            $result .= "<center>";
            $count = 1;
            foreach($parts_trouble_history_details->improvements as $improvement){
                $result .= $count . ". " . $improvement->improvement_actions ." - Remarks: " . $improvement->remarks . "<br>";
                $count++;
            }
            $result .= "</center>";

            return $result;
        })
        ->rawColumns(['action', 'status_label', 'mode_of_defect', 'improvements'])
        ->make(true);
    }

    public function addPartsTroubleHistoryInfo(Request $request){
        $validation = array(
            'date_encountered' => 'required',
            'model' => 'required',
            'illustration_of_defect' => ['nullable','file','mimes:jpg,jpeg,png,webp','max:10240'], // 5MB
            'no_of_occurrence' => 'required',
            'defect_id' => 'required',
            'root_cause' => 'required',
            'improvement_action.*' => 'required|string',
            'improvement_action_remarks.*' => 'required|string'
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
                if ($request->improvement_action){
                    foreach ($request->improvement_action as $i => $value){
                        PthsImprovements::insert([
                            'history_id'           => $history_id,
                            'improvement_actions'  => $request->improvement_action[$i],
                            'remarks'              => $request->improvement_action_remarks[$i]
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

    // public function addPartsTroubleHistoryInfo(Request $request){
    //     $request->validate([
    //         'date_encountered' => 'required',
    //         'model' => 'required',
    //         'illustration_of_defect' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
    //         'no_of_occurrence' => 'required',
    //         'mode_of_defect' => 'required',
    //         'root_cause' => 'required',
    //         'improvement_action.*' => 'nullable|string',
    //         'improvement_action_remarks.*' => 'nullable|string'
    //     ]);

    //     // For editing
    //     $history = PartTroubleHistory::find($request->id);

    //     // For new record
    //     if (!$history) {
    //         $history = new PartTroubleHistory();
    //     }

    //     return 'here';

    //     $history->title = $request->title;

    //     // FILE HANDLING
    //     if ($request->hasFile('attachment')) {

    //         // delete old file if replace
    //         if ($history->attachment && Storage::exists('public/parts_trouble_history/' . $history->attachment)) {
    //             Storage::delete('public/parts_trouble_history/' . $history->attachment);
    //         }

    //         $file = $request->file('attachment');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->storeAs('public/parts_trouble_history', $filename);

    //         $history->attachment = $filename; // save only varchar
    //     }

    //     $history->save();

    //     // DELETE OLD ACTIONS ON UPDATE
    //     ImprovementAction::where('parts_trouble_history_id', $history->id)->delete();

    //     // SAVE NEW ACTIONS
    //     if ($request->action) {
    //         foreach ($request->action as $i => $value) {
    //             ImprovementAction::create([
    //                 'parts_trouble_history_id' => $history->id,
    //                 'action' => $request->action[$i],
    //                 'person' => $request->person[$i],
    //             ]);
    //         }
    //     }

    //     return response()->json(['success' => true]);
    // }

    // public function addPartsTroubleHistoryInfo(Request $request){
    //     return $request->all();

    //     // if(!isset($request->id)){
    //     //     $validation = array(
    //     //         'PartTroubleHistory' => ['required', 'string', 'max:255']
    //     //     );
    //     // }else{
    //     //     $validation = array(
    //     //         'PartTroubleHistory' => ['required', 'string', 'max:255']
    //     //     );
    //     // }

    //     // $data = $request->all();
    //     // $validator = Validator::make($data, $validation);
    //     // if ($validator->fails()) {
    //     //     return response()->json(['result' => '0', 'error' => $validator->messages()]);
    //     // }else{
    //         DB::beginTransaction();

    //         try{
    //             $parts_array = array(
    //                 'date_encountered' => $request->PartTroubleHistory
    //                 'illustration_of_defect' => $request->PartTroubleHistory
    //                 'model' => $request->PartTroubleHistory
    //                 'mode_of_defect' => $request->PartTroubleHistory
    //                 'no_of_occurrence' => $request->PartTroubleHistory
    //                 'root_cause' => $request->PartTroubleHistory
    //             );

    //             if(isset($request->id)){ // EDIT
    //                 PartTroubleHistory::where('id', $request->id)
    //                 ->update($process_array);
    //             }else{ // ADD
    //                 PartTroubleHistory::insert($process_array);
    //             }

    //             DB::commit();
    //             return response()->json(['result' => 1, 'msg' => 'Transaction Succesful']);
    //         }catch(Exemption $e){
    //             DB::rollback();
    //             return $e;
    //         }
    //     // }
    // }

    public function getPartsTroubleHistoryById(Request $request){
        return PartTroubleHistory::with(['defects.defect_item', 'improvements'])->where('id', $request->id)->first();
    }

    // public function updatePartTroubleHistoryStatus(Request $request){
    //     DB::beginTransaction();
    //     try{
    //         PartTroubleHistory::where('id', $request->id)
    //                 ->update(['status' => $request->status]);
    //     }catch(Exemption $e){
    //         DB::rollback();
    //         return $e;
    //     }
    // }

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
                'message' => 'Parts Trouble History Record status updated successfully.'
            ]);
        } catch (\Throwable $e) { // ✅ catch everything including DB errors
            DB::rollBack(); // ✅ rollback only if it fails

            // log the error so you can see what’s happening
            \Log::error('Parts Trouble History Record status update failed', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update Parts Trouble History Record status.',
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
        ]);

        $from = $request->date_from;
        $to   = $request->date_to;

        $filename = "Parts_Trouble_Report_History_{$from}_to_{$to}.xlsx";

        return Excel::download(
            new ExportPartsTroubleHistory($from, $to),
            $filename
        );

        // use $from and $to in query
        // return 'Excel download';
    }
}
