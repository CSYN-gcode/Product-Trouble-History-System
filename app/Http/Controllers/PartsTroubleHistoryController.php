<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\PartTroubleHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PartsTroubleHistoryController extends Controller
{
    public function viewPartsTroubleHistoryInfo(Request $request){
        $parts_trouble_history_details = PartTroubleHistory::with(['defects', 'improvements'])->get();

        return $parts_trouble_history_details;
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
        ->rawColumns(['action', 'status_label'])
        ->make(true);
    }

    public function addPartsTroubleHistoryInfo(Request $request){
        $request->validate([
            'date_encountered' => 'required',
            'model' => 'required',
            'illustration_of_defect' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'no_of_occurence' => 'required',
            'mode_of_defect' => 'required',
            'root_cause' => 'required',
            'improvement_action.*' => 'nullable|string',
            'improvement_action_remarks.*' => 'nullable|string'
        ]);

        // For editing
        $history = PartTroubleHistory::find($request->id);

        // For new record
        if (!$history) {
            $history = new PartsTroubleHistory();
        }

        $history->title = $request->title;

        // FILE HANDLING
        if ($request->hasFile('attachment')) {

            // delete old file if replace
            if ($history->attachment && Storage::exists('public/parts_trouble_history/' . $history->attachment)) {
                Storage::delete('public/parts_trouble_history/' . $history->attachment);
            }

            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/parts_trouble_history', $filename);

            $history->attachment = $filename; // save only varchar
        }

        $history->save();

        // DELETE OLD ACTIONS ON UPDATE
        ImprovementAction::where('parts_trouble_history_id', $history->id)->delete();

        // SAVE NEW ACTIONS
        if ($request->action) {
            foreach ($request->action as $i => $value) {
                ImprovementAction::create([
                    'parts_trouble_history_id' => $history->id,
                    'action' => $request->action[$i],
                    'person' => $request->person[$i],
                ]);
            }
        }

        return response()->json(['success' => true]);
    }

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
    //                 'no_of_occurence' => $request->PartTroubleHistory
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
        return PartTroubleHistory::where('id', $request->id)->first();
    }

    // public function updatePartsTroubleHistoryStatus(Request $request){
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
                'message' => 'Defect status updated successfully.'
            ]);
        } catch (\Throwable $e) { // ✅ catch everything including DB errors
            DB::rollBack(); // ✅ rollback only if it fails

            // log the error so you can see what’s happening
            \Log::error('Defect status update failed', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update defect status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // public function updatePartsTroubleHistoryStatus(Request $request){
    //     DB::beginTransaction();

    //     try {
    //         // Find the defect record
    //         $defect = PartTroubleHistory::findOrFail($request->id);
    //         // return $defect;
    //         // Toggle status: if 0 → 1, if 1 → 0
    //         $defect->status = $defect->status == 1 ? 0 : 1;
    //         // return $defect->status;
    //         // Save the change
    //         $defect->save();

    //         // Update the record
    //         // $defect->update(['status' => $newStatus]);

    //         DB::commit();

    //         return response()->json([
    //             'success' => true,
    //             'new_status' => $defect->status,
    //             'message' => 'Defect status updated successfully.'
    //         ]);
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Failed to update defect status.',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
}
