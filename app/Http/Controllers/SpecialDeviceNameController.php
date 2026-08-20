<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\SpecialDeviceName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SpecialDeviceNameController extends Controller
{
    public function viewSpecialDeviceNamesInfo(Request $request){
        $special_device_names = SpecialDeviceName::get();

        // return $special_device_names;
        return DataTables::of($special_device_names)
        ->addColumn('action', function($special_device_names){
            $result = "";
            $result .= "<center>";
            $result .= "<button class='btn btn-secondary btn-sm btnEdit mr-1' data-id='$special_device_names->id'><i class='fa-solid fa-pen-to-square'></i></button>";
            if($special_device_names->status == 0){
                $result .= "<button class='btn btn-danger btn-sm btnDisable' data-id='$special_device_names->id'><i class='fa-solid fa-ban'></i></button>";
            }
            else{
                $result .= "<button class='btn btn-success btn-sm btnEnable' data-id='$special_device_names->id'><i class='fa-solid fa-rotate-left'></i></button>";
            }
            $result .= "</center>";
            return $result;
        })
        ->addColumn('status_label', function($special_device_names){
            $result = "";
            $result .= "<center>";

            if($special_device_names->status == 0){
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

    public function addSpecialDeviceNamesInfo(Request $request){
        $validation = array(
            'device_name' => ['required', 'string', 'max:255']
        );

        $data = $request->all();
        $validator = Validator::make($data, $validation);
        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }else{
            DB::beginTransaction();

            try{
                $process_array = array(
                    'device_name' => $request->device_name
                );

                if(isset($request->id)){ // EDIT
                    SpecialDeviceName::where('id', $request->id)
                    ->update($process_array);
                }else{ // ADD
                    SpecialDeviceName::insert($process_array);
                }

                DB::commit();
                return response()->json(['result' => 1, 'msg' => 'Transaction Succesful']);
            }catch(Exemption $e){
                DB::rollback();
                return $e;
            }
        }
    }

    public function getSpecialDeviceNamesById(Request $request){
        return SpecialDeviceName::where('id', $request->id)->first();
    }

    public function getSpecialDeviceNames(Request $request){
        return SpecialDeviceName::where('status', 0)->get();
    }

    public function updateSpecialDeviceNamesStatus(Request $request){
        DB::beginTransaction();

        try {
            $special_device_name = SpecialDeviceName::findOrFail($request->id);

            $special_device_name->status = $special_device_name->status == 1 ? 0 : 1;
            $special_device_name->save();

            DB::commit(); // ✅ commit here

            return response()->json([
                'success' => true,
                'new_status' => $special_device_name->status,
                'message' => 'Special device name status updated successfully.'
            ]);
        } catch (\Throwable $e) { // ✅ catch everything including DB errors
            DB::rollBack(); // ✅ rollback only if it fails

            // log the error so you can see what’s happening
            \Log::error('Special device name status update failed', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update special device name status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
