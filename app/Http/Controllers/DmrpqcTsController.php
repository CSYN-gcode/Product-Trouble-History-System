<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DataTables;

use Carbon\Carbon;
use App\Models\PpsDbsDieset;
use App\Models\PpsDbsPoReceived;
use App\Models\ProductIdentification;
use App\Models\DiesetCondition;
use App\Models\DiesetConditionChecking;
use App\Models\MachineSetup;
use App\Models\ProductReqChecking;
use App\Models\User;

class DmrpqcTsController extends Controller
{
    // Get Name by Session
    public function get_name_by_session(Request $request){
        session_start();
        if(isset($_SESSION["rapidx_user_id"])){
            $dmrpqc_user_id = $_SESSION["rapidx_user_id"];

            $get_requested_by_id = User::with(['rapidx_user_details'])->where('rapidx_id', $dmrpqc_user_id)->get();
            // return $get_requested_by_id[0]->rapidx_user_details->name;

            return response()->json(["result" => $get_requested_by_id]);
        }else{
            return response()->json(['result' => "1"]);
        }
    }

    public function get_pps_db_data_by_item_code(Request $request)
    {
        $pps_db_details = PpsDbsPoReceived::with(['pps_dieset'])->where('OrderNo', $request->po_number)->get();

        if($pps_db_details == null){
            return response()->json(['result' => '1']);
        }else{
            return response()->json(['pps_db_details' => $pps_db_details]);
        }
    }

    public function view_dmrpqc(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $monthNow = Carbon::now()->format('m');
        $dmrpqc_details = ProductIdentification::with(['users.rapidx_user_details' => function($query) { $query->select('id', 'name'); }])
        // ->when($request->month, function ($query) use ($request) {
        //     return $query ->where('start_date_time', 'like', '%-'.$request->month.'-%');
        //     }, function ($query) use ($monthNow) {
        //         return $query ->where('start_date_time', 'like', '%-'.$monthNow.'-%');
        // })
        ->when($request->month, function ($query) use ($request) {
            return $query ->where('start_date_time', 'like', '%-'.$request->month.'-%');
        })
        ->when($request->year, function ($query) use ($request) {
            return $query ->where('created_at', 'like', '%'.$request->year.'%');
        })
        ->when($request->request_type, function ($query) use ($request) {
            return $query ->where('request_type', 'like', '%'.$request->request_type.'%');
        })
        ->when($request->request_date_from, function ($query) use ($request) {
            return $query ->where('created_at', '>=', $request->request_date_from);
        })
        ->when($request->request_date_to, function ($query) use ($request) {
            return $query ->where('created_at', '<=', $request->request_date_to);
        })
        ->when($request->status, function ($query) use ($request) {
            return $query ->where('status', 'like', '%'.$request->status.'%');
        })
        // ->whereIn('status',[0,1,2])
        ->where('logdel',0)->orderBy('created_at','desc')->get();

        return DataTables::of($dmrpqc_details)
            ->addColumn('action', function ($dmrpqc_details){

                // $user_id            = $dmrpqc_details->users->id;
                $user_position_id   = $dmrpqc_details->users->position;
                $user_section_id    = $dmrpqc_details->users->section;
                $user_level_id      = $dmrpqc_details->users->user_level_id;

                        // $result = "";
                        // $result .= '<button class="btn btn-sm btn-outline-info border-0 text-center actionViewBtn" dmrpqc_id="'.$dmrpqc_details->id.'">
                        //             <i class="fas fa-eye fa-lg" title="View"></i></button>&nbsp;';

                $action_btn_view = '<button class="btn btn-sm btn-outline-info border-0 text-center actionViewBtn" process_status="'.$dmrpqc_details->process_status.'"
                                    dmrpqc_id="'.$dmrpqc_details->id.'"><i class="fas fa-eye fa-lg" title="View"></i></button>';

                $action_btn_submit = '<button class="btn btn-sm btn-outline-success border-0 text-center actionChangeStatusBtn" process_status="'.$dmrpqc_details->process_status.'"
                                    dmrpqc_id="'.$dmrpqc_details->id.'"><i class="fa-solid fa-check-to-slot fa-xl" title="Submit"></i></button>';

                $action_btn_delete = '<button class="btn btn-sm btn-outline-danger border-0 text-center actionDeleteBtn" process_status="'.$dmrpqc_details->process_status.'"
                                    dmrpqc_id="'.$dmrpqc_details->id.'"><i class="fa-solid fa-trash-can fa-xl" title="Cancel"></i></button>';

                $action_btn_conform = '<button class="btn btn-sm btn-outline-primary border-0 text-center actionChangeStatusBtn" process_status="'.$dmrpqc_details->process_status.'"
                                    dmrpqc_id="'.$dmrpqc_details->id.'"><i class="fa-solid fa-screwdriver-wrench fa-xl" title="Conform"></i></button>';

                $action_btn_update = '<button class="btn btn-sm btn-outline-primary border-0 text-center actionUpdateBtn" process_status="'.$dmrpqc_details->process_status.'"
                                    dmrpqc_id="'.$dmrpqc_details->id.'"><i class="fa-solid fa-file-pen fa-xl" title="Update"></i></button>';

                            $result = "";
                            $result .= $action_btn_view;

                switch($user_level_id){
                    case 1: //Users
                            switch($user_position_id){
                                case 1: //PRODUCTION
                                    if($dmrpqc_details->status == 0){
                                        $result .= $action_btn_submit;
                                        $result .= $action_btn_delete;
                                    }
                                    break;
                                case 2: //DIE MAINTENANCE ENGR.
                                    if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 2){ //For Conformance in Part 1
                                        $result .= $action_btn_conform;
                                    }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 2){ //Ongoing in Part 1
                                        $result .= $action_btn_update;
                                        $test = DiesetCondition::where('request_id', $dmrpqc_details->id)->where('status', 1)->where('logdel', 0)->get();
                                        // if(DiesetCondition::where('request_id', $dmrpqc_details->id)->where('status', 1)->where('logdel', 0)->exists()){
                                        if($test->status == 1){
                                            $result .= $action_btn_submit;
                                        }else{
                                            $result .= $action_btn_submit;
                                        }
                                    }
                                    break;
                                // case 3: //PROCESS TECHNICIAN
                                //     if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 2){ //For Conformance in Part 1

                                //     }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 2){ //Ongoing in Part 1

                                //     }
                                //     break;
                                // case 4: //PROCESS ENGG.
                                //     if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 2){ //For Conformance in Part 1

                                //     }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 2){ //Ongoing in Part 1

                                //     }
                                //     break;
                                // case 5: //LQC
                                //     if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 2){ //For Conformance in Part 1

                                //     }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 2){ //Ongoing in Part 1

                                //     }
                                //     break;
                                // case 6: //MANAGER
                                //     if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 2){ //For Conformance in Part 1

                                //     }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 2){ //Ongoing in Part 1

                                //     }
                                //     break;
                            }
                        break;
                    case $user_level_id == 2 || $user_level_id == 3: //ADMINISTRATOR || PPS-ADMIN
                        if ($dmrpqc_details->status == 0){ //Status 0 = For Submission
                                $result .= $action_btn_submit;
                                $result .= $action_btn_delete;
                        }
                        else if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 2){ //For Conformance in Part 2
                                $result .= $action_btn_conform;
                        }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 2){ //Ongoing in Part 2
                                $result .= $action_btn_update;
                            if(DiesetCondition::where('request_id', $dmrpqc_details->id)->where('status', 1)->where('logdel', 0)->exists()){
                                $result .= $action_btn_submit;
                            }
                        }else if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 3){ //For Conformance in Part 3
                                $result .= $action_btn_conform;
                        }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 3){ //Ongoing in Part 3
                                $result .= $action_btn_update;
                            if(DiesetConditionChecking::where('request_id', $dmrpqc_details->id)->where('status', 1)->where('logdel', 0)->exists()){
                                $result .= $action_btn_submit;
                            }
                        }else if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 4){ //For Conformance in Part 4
                            $result .= $action_btn_conform;
                        }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 4){ //Ongoing in Part 4
                                $result .= $action_btn_update;
                            if(MachineSetup::where('request_id', $dmrpqc_details->id)->where('status', 1)->where('logdel', 0)->exists()){
                                $result .= $action_btn_submit;
                            }
                        }else if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 5){ //For Conformance in Part 4
                            $result .= $action_btn_conform;
                        }else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 5){ //Ongoing in Part 4
                                $result .= $action_btn_update;
                            if(ProductReqChecking::where('request_id', $dmrpqc_details->id)->whereNotNull(['prod_visual_insp_name','prod_dimension_insp_name'])->where('logdel', 0)->exists()){
                                $result .= $action_btn_submit;
                            }
                        }
                        break;
                }

                return $result;
            })
            ->addColumn('status', function ($dmrpqc_details) {
                $result = "";
                switch($dmrpqc_details->status){
                    case 0: //Default - For Submission (Production)
                        $result .= '<center><span class="badge badge-pill badge-secondary">For Submission</span></center>';
                        $result .= '<center><span class="badge badge-pill badge-primary">By:</span>
                                    <span class="badge badge-pill badge-warning">Production</span></center>';
                        break;
                    case 1: //For Conformance
                        $result .= '<center><span class="badge badge-pill badge-primary">For Conformance</span></center>';
                        $result .= '<center><span class="badge badge-pill badge-primary">By:</span>';
                            switch($dmrpqc_details->process_status){
                                case 1: //Production
                                    $result .= ' <span class="badge badge-pill badge-warning">Production</span></center>';
                                    break;
                                case 2: //Die Maintenance Engr.
                                    $result .= '<span class="badge badge-pill badge-warning">Die Maintenance Engr.</span></center>';
                                    break;
                                case 3: //Die Maintenance Engr.
                                    $result .= '<span class="badge badge-pill badge-warning">Die Maintenance Engr.</span></center>';
                                    break;
                                case 4: //Die Maintenance Engr.
                                    $result .= '<span class="badge badge-pill badge-warning">Production/Process Engr.</span></center>';
                                    break;
                            }
                        break;
                    case 2: //Ongoing Activity
                        $result .= '<center><span class="badge badge-pill badge-warning">Ongoing Activity</span></center>';
                        $result .= '<center><span class="badge badge-pill badge-primary">By:</span>';
                            switch($dmrpqc_details->process_status){
                                case 1: //Production
                                    $result .= ' <span class="badge badge-pill badge-warning">Production</span></center>';
                                    break;
                                case 2: //Die Maintenance Engr.
                                    $result .= ' <span class="badge badge-pill badge-warning">Die Maintenance Engr.</span></center>';
                                    break;
                                case 3: //Die Maintenance Engr.
                                    $result .= ' <span class="badge badge-pill badge-warning">Die Maintenance Engr.</span></center>';
                                    break;
                            }
                        break;
                    case 3: //Completed
                        $result .= '<center><span class="badge badge-pill badge-success">Completed</span></center>';
                        break;
                }
                // if ($dmrpqc_details->status == 0 && $dmrpqc_details->process_status == 1) {
                //     $result .= '<center><span class="badge badge-pill badge-secondary">For Submission</span></center>';
                //     $result .= '<center><span class="badge badge-pill badge-primary">By:</span>
                //                     <span class="badge badge-pill badge-warning">Production</span></center>';
                // }
                // else if($dmrpqc_details->status == 1 && $dmrpqc_details->process_status == 2) {
                //     $result .= '<center><span class="badge badge-pill badge-success">For Conformance</span></center>';
                //     $result .= '<center><span class="badge badge-pill badge-primary">By:</span>
                //                     <span class="badge badge-pill badge-warning">Die Maintenance Engr.</span></center>';
                // }
                // else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 2){
                //     $result .= '<center><span class="badge badge-pill badge-warning">Ongoing</span></center>';
                //     $result .= '<center><span class="badge badge-pill badge-primary">By:</span>
                //                     <span class="badge badge-pill badge-warning">Die Maintenance Engr.</span></center>';
                // }
                // else if($dmrpqc_details->status == 2 && $dmrpqc_details->process_status == 3){
                //     $result .= '<center><span class="badge badge-pill badge-warning">Ongoing</span></center>';
                //     $result .= '<center><span class="badge badge-pill badge-primary">By:</span>
                //                     <span class="badge badge-pill badge-warning">Die Maintenance Engr.</span></center>';
                // }else if($dmrpqc_details->status == 3){
                //     $result .= '<center><span class="badge badge-pill badge-success">Completed</span></center>';
                // }
                return $result;
            })
            ->addColumn('process_status', function ($dmrpqc_details) {
                $result = "";

                if($dmrpqc_details->process_status == 1) {
                    $result .= '<center><span class="badge badge-pill badge-info">Product Identification</span></center>';
                }
                else if($dmrpqc_details->process_status == 2){
                    $result .= '<center><span class="badge badge-pill badge-info">Dieset Condition</span></center>';
                }else if($dmrpqc_details->process_status == 3){
                    $result .= '<center><span class="badge badge-pill badge-info">Dieset Condition Checking</span></center>';
                }else if($dmrpqc_details->process_status == 4){
                    $result .= '<center><span class="badge badge-pill badge-info">Machine Setup</span></center>';
                }else if($dmrpqc_details->process_status == 5){
                    $result .= '<center><span class="badge badge-pill badge-info">Product Requirement Checking</span></center>';
                }
                return $result;
            })
            ->addColumn('created_by', function ($dmrpqc_details) {
                $result = $dmrpqc_details->users->rapidx_user_details->name;
                return $result;
            })
            ->rawColumns(['action','status','process_status','created_by'])
            ->make(true);
    }

    public function add_request(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();
        $password = "pmi12345";

        $validator = Validator::make($data, [
            'user_id' => 'required',
            'po_no' => 'required',
            'request_type' => 'required',
            // 'position_id' => 'required',
            // 'userLevel' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        } else {
            if (ProductIdentification::where('item_code', $request->item_code)->where('status', 0)->where('logdel', 0)->exists()) {
                return response()->json(['result' => 2]);
            } else {
                ProductIdentification::insert([
                    'device_name' => $request->device_name,
                    'po_number' => $request->po_no,
                    'item_code' => $request->item_code,
                    'die_no' => $request->die_no,
                    'drawing_no' => $request->drawing_no,
                    'rev_no' => $request->rev_no,
                    'request_type' => $request->request_type,
                    'start_date_time' => date('Y-m-d H:i:s'),
                    'created_by' => $request->user_id,
                    'last_updated_by' => $request->user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                DB::commit();
                return response()->json(['result' => 1]);
            }
        }
    }

    public function update_parts_drawing_data(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        // $data = $request->all();
        // $password = "pmi12345";
        // return $request->uploaded_file;
        // $validator = Validator::make($data, [
        //     'uploaded_file' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        // } else {
            if(isset($_SESSION["rapidx_user_id"])){
                if($request->hasFile('uploaded_file')){
                    $original_filename = $request->file('uploaded_file')->getClientOriginalName();

                    if(DiesetCondition::where('parts_drawing', $original_filename)->exists()){
                        return response()->json(['result' => 'File Name Already Exists']);
                    }else{
                        // return $original_filename;
                        Storage::putFileAs('public/PartsDrawingUploadFile', $request->uploaded_file,  $original_filename);
                        DiesetCondition::where('request_id', $request->request_id)
                            ->update([
                                'parts_drawing' => $original_filename,
                                'drawing_specification' => $request->specification,
                                'drawing_actual_measurement' => $request->actual_measurement,
                                'drawing_fabricated_by' => $request->user_id,
                                'drawing_validated_by' => $request->user_id,
                            ]);

                        DB::commit();
                        return response()->json(['result' => 'Success']);
                    }
                }else{
                    DiesetCondition::where('request_id', $request->request_id)
                            ->update([
                                'drawing_specification' => $request->specification,
                                'drawing_actual_measurement' => $request->actual_measurement,
                                'drawing_fabricated_by' => $request->user_id,
                                'drawing_validated_by' => $request->user_id,
                            ]);

                        DB::commit();
                        return response()->json(['result' => 'Success']);
                }
            }else{
                return response()->json(['result' => 'Session Expired']);
            }
        // }
    }

    public function update_dieset_conditon_data(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $parts_no_all = implode(",", $request->PartsNoArr);
        $quantity_all = implode(",", $request->QuantityArr);

        // $PartsDrawingSpecification = implode(",", $request->PartsNoArr);
        // $PartsDrawingActualMeasurement = implode(",", $request->QuantityArr);
        // return $request->parts_no[][];
        // return $parts_no;
        // return $request->all();

        if(isset($_SESSION["rapidx_user_id"])){

                // $validator = Validator::make($data, $rules);
                // return $request->all();

                // if ($validator->fails()) {
                //     return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
                // }

                if($request->action_1 == NULL && $request->action_2 == NULL &&
                   $request->action_3 == NULL && $request->action_4 == NULL &&
                   $request->action_5 == NULL && $request->action_6 == NULL && $request->action_7 == NULL){

                    return response()->json(['error' => 'Please Select Action Done']);
                }else {
                        DiesetCondition::where('request_id', $request->request_id)
                        ->update([
                            'action_1_mold_cleaned' => $request->action_1,
                            'action_2_mold_check' => $request->action_2,
                            'action_3_device_conversion' => $request->action_3,
                            'action_4_dieset_overhaul' => $request->action_4,
                            'action_4a_fix_side' => $request->action_4a,
                            'action_4b_movement_side' => $request->action_4b,
                            'action_4c_with_parts_marking' => $request->action_4c,
                            'action_4d_without_parts_marking' => $request->action_4d,
                            'action_5_reversible_parts_installed' => $request->action_5,
                            'action_6_repair' => $request->action_6,
                            'action_7_parts_change' => $request->action_7,
                            'action_7a_new' => $request->action_7_a,
                            'action_7b_fabricated' => $request->action_7_b,
                            'action_7c_with_parts_marking' => $request->action_7c,
                            'action_7d_with_parts_change_notice' => $request->action_7d,
                            'details_of_activity' => $request->details_of_activity,
                            'parts_no' => $parts_no_all,
                            'quantity' => $quantity_all,
                            'action_done_date_start' => $request->action_done_date_start,
                            'action_done_start_time' => $request->action_done_start_time,
                            'action_done_finish_time' => $request->action_done_finish_time,
                            'in_charged' => $request->action_done_in_charged_id,
                            'check_point_1_marking_check' => $request->check_point_1,
                            'check_point_2_tanshi_pin' => $request->check_point_2,
                            'check_point_2a_crack' => $request->check_point_2a,
                            'check_point_2b_bend' => $request->check_point_2b,
                            'check_point_2c_worn_out' => $request->check_point_2c,
                            'check_point_3_dent' => $request->check_point_3,
                            'check_point_4_porous' => $request->check_point_4,
                            'check_point_5_ejector_pin' => $request->check_point_5,
                            'check_point_6_coma' => $request->check_point_6,
                            'check_point_7_gasvent' => $request->check_point_7,
                            'check_point_8_assy_orientation' => $request->check_point_8,
                            'check_point_9_fs_ms_fitting' => $request->check_point_9,
                            'check_point_10_sub_gate' => $request->check_point_10,
                            'check_point_remarks' => $request->check_point_remarks,
                            'mold_check_1_withdraw_pin_external' => $request->mold_check_1,
                            'mold_check_2_withdraw_pin_internal' => $request->mold_check_2,
                            'mold_check_3_slidecore_stopper' => $request->mold_check_3,
                            'mold_check_4_locator_ring' => $request->mold_check_4,
                            'mold_check_5_bolts_nuts' => $request->mold_check_5,
                            'mold_check_6_stripper_plate' => $request->mold_check_6,
                            'mold_check_remarks' => $request->mold_check_remarks,
                            'mold_check_checked_by' => $request->mold_check_checked_by_id,
                            'mold_check_date' => date('Y-m-d'),
                            'mold_check_time' => date('H:i:s'),
                            'mold_check_status' => $request->mold_check_status,
                            'references_used' => $request->references_used,
                            'final_remarks' => $request->final_remarks,
                            'last_updated_by' => $request->user_id,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'status' => 1 //Change Status to Updated(1)
                        ]);

                        DB::commit();
                        return response()->json(['result' => 'Success']);
                }
            // }
        }else{
            return response()->json(['result' => 'Session Expired']);
        }
    }

    public function update_dieset_conditon_checking_data(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();
        // return $data;

        if(isset($_SESSION["rapidx_user_id"])){

                if($request->good_condition == NULL && $request->under_longevity == NULL && $request->problematic == NULL){
                    return response()->json(['error' => 'Please Select Condition']);
                }else {
                        DiesetConditionChecking::where('request_id', $request->request_id)
                        ->update([
                            'good_condition' => $request->good_condition,
                            'under_longevity' => $request->under_longevity,
                            'problematic_die_set' => $request->problematic,
                            'checked_by' => $request->user_id,
                            'date' => date('Y-m-d'),
                            'last_updated_by' => $request->user_id,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'status' => 1 //Change Status to Updated(1)
                        ]);

                        DB::commit();
                        return response()->json(['result' => 'Success']);
                }
        }else{
            return response()->json(['result' => 'Session Expired']);
        }
    }

    public function update_machine_setup_data(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        if(isset($_SESSION["rapidx_user_id"])){

                if($request->machine_setup_1st_adjustment == NULL){
                    return response()->json(['error' => 'Please Select Adjustment']);
                }else {
                        MachineSetup::where('request_id', $request->request_id)
                        ->update([
                            'first_adjustment' => $request->machine_setup_1st_adjustment,
                            'second_adjustment' => $request->machine_setup_2nd_adjustment,
                            'third_adjustment' => $request->machine_setup_3rd_adjustment,
                            'first_in_charged' => $request->machine_setup_1st_in_charged,
                            'second_in_charged' => $request->machine_setup_2nd_in_charged,
                            'third_in_charged' => $request->machine_setup_3rd_in_charged,
                            'first_date_time' => date('Y-m-d H:i:s'),
                            'second_date_time' => date('Y-m-d H:i:s'),
                            'third_date_time' => date('Y-m-d H:i:s'),
                            'first_remarks' => $request->machine_setup_1st_remarks,
                            'second_remarks' => $request->machine_setup_2nd_remarks,
                            'third_remarks' => $request->machine_setup_3rd_remarks,
                            'category' => $request->machine_setup_category,
                            'last_updated_by' => $request->user_id,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'status' => 1 //Change Status to Updated(1)
                        ]);

                        DB::commit();
                        return response()->json(['result' => 'Success']);
                }
        }else{
            return response()->json(['result' => 'Session Expired']);
        }
    }

    public function update_product_req_checking_data(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        $data = $request->all();
        // return $request->all();
        if(isset($_SESSION["rapidx_user_id"])){
            $status = ProductReqChecking::select('status')->where('request_id', $request->request_id)->first();
            // return $status->status;
                // if($request->machine_setup_1st_adjustment == NULL){
                //     return response()->json(['error' => 'Please Select Adjustment']);
                // }else {
                    if($status->status == 0){
                        ProductReqChecking::where('request_id', $request->request_id)
                        ->update([
                            'prod_eval_sample' => $request->prod_eval_sample,
                            'prod_japan_sample' => $request->prod_japan_sample,
                            'prod_last_prodn_sample' => $request->prod_last_prodn_sample,
                            'prod_dieset_eval_report' => $request->prod_dieset_eval_report,
                            'prod_cosmetic_defect' => $request->prod_cosmetic_defect,
                            'prod_pingauges' => $request->prod_pingauges,
                            'prod_measurescope' => $request->prod_measurescope,
                            'prod_na' => $request->prod_na,
                            'prod_visual_insp_name' => $request->prod_visual_insp_name,
                            'prod_visual_insp_datetime' => date('Y-m-d H:i:s'),
                            'prod_visual_insp_result' => $request->prod_visual_insp_result,
                            'prod_dimension_insp_name' => $request->prod_dimension_insp_name,
                            'prod_dimension_insp_datetime' => date('Y-m-d H:i:s'),
                            'prod_dimension_insp_result' => $request->prod_dimension_insp_result,
                            'prod_actual_checking_remarks' => $request->prod_actual_checking_remarks,
                            'last_updated_by' => $request->user_id,
                            'updated_at' => date('Y-m-d H:i:s'),
                            // 'status' => 1 //Change Status to Updated(1)
                        ]);
                    }else if($status->status == 1){
                        ProductReqChecking::where('request_id', $request->request_id)
                        ->update([
                            'engr_tech_eval_sample' => $request->engr_tech_eval_sample,
                            'engr_tech_japan_sample' => $request->engr_tech_japan_sample,
                            'engr_tech_last_prodn_sample' => $request->engr_tech_last_prodn_sample,
                            'engr_tech_material_drawing' => $request->engr_tech_material_drawing,
                            'engr_tech_material_drawing_no' => $request->engr_tech_material_drawing_no,
                            'engr_tech_material_rev_no' => $request->engr_tech_material_rev_no,
                            'engr_tech_insp_guide' => $request->engr_tech_insp_guide,
                            'engr_tech_insp_guide_drawing_no' => $request->engr_tech_insp_guide_drawing_no,
                            'engr_tech_insp_guide_rev_no' => $request->engr_tech_insp_guide_rev_no,
                            'engr_tech_dieset_eval_report' => $request->engr_tech_dieset_eval_report,
                            'engr_tech_cosmetic_defect' => $request->engr_tech_cosmetic_defect,
                            'engr_tech_pingauges' => $request->engr_tech_pingauges,
                            'engr_tech_measurescope' => $request->engr_tech_measurescope,
                            'engr_tech_na' => $request->engr_tech_na,
                            'engr_tech_visual_insp_name' => $request->engr_tech_visual_insp_name,
                            'engr_tech_visual_insp_datetime' => date('Y-m-d H:i:s'),
                            'engr_tech_visual_insp_result' => $request->engr_tech_visual_insp_result,
                            'engr_tech_dimension_insp_name' => $request->engr_tech_dimension_insp_name,
                            'engr_tech_dimension_insp_datetime' => date('Y-m-d H:i:s'),
                            'engr_tech_dimension_insp_result' => $request->engr_tech_dimension_insp_result,
                            'engr_tech_actual_checking_remarks' => $request->engr_tech_actual_checking_remarks,
                            'last_updated_by' => $request->user_id,
                            'updated_at' => date('Y-m-d H:i:s'),
                            // 'status' => 2 //Change Status to Updated(1)
                        ]);
                    }else if($status->status == 2){
                        ProductReqChecking::where('request_id', $request->request_id)
                        ->update([
                            'lqc_eval_sample' => $request->lqc_eval_sample,
                            'lqc_japan_sample' => $request->lqc_japan_sample,
                            'lqc_last_prodn_sample' => $request->lqc_last_prodn_sample,
                            'lqc_material_drawing' => $request->lqc_material_drawing,
                            'lqc_material_drawing_no' => $request->lqc_material_drawing_no,
                            'lqc_material_rev_no' => $request->lqc_material_rev_no,
                            'lqc_insp_guide' => $request->lqc_insp_guide,
                            'lqc_insp_guide_drawing_no' => $request->lqc_insp_guide_drawing_no,
                            'lqc_insp_guide_rev_no' => $request->lqc_insp_guide_rev_no,
                            'lqc_dieset_eval_report' => $request->lqc_dieset_eval_report,
                            'lqc_cosmetic_defect' => $request->lqc_cosmetic_defect,
                            'lqc_pingauges' => $request->lqc_pingauges,
                            'lqc_measurescope' => $request->lqc_measurescope,
                            'lqc_na' => $request->lqc_na,
                            'lqc_visual_insp_name' => $request->lqc_visual_insp_name,
                            'lqc_visual_insp_datetime' => date('Y-m-d H:i:s'),
                            'lqc_visual_insp_result' => $request->lqc_visual_insp_result,
                            'lqc_dimension_insp_name' => $request->lqc_dimension_insp_name,
                            'lqc_dimension_insp_datetime' => date('Y-m-d H:i:s'),
                            'lqc_dimension_insp_result' => $request->lqc_dimension_insp_result,
                            'lqc_actual_checking_remarks' => $request->lqc_actual_checking_remarks,
                            'last_updated_by' => $request->user_id,
                            'updated_at' => date('Y-m-d H:i:s'),
                            // 'status' => 3 //Change Status to Updated(1)
                        ]);
                    }else if($status->status == 3){
                        ProductReqChecking::where('request_id', $request->request_id)
                        ->update([
                            'process_engr_eval_sample' => $request->process_engr_eval_sample,
                            'process_engr_japan_sample' => $request->process_engr_japan_sample,
                            'process_engr_last_prodn_sample' => $request->process_engr_last_prodn_sample,
                            'process_engr_material_drawing' => $request->process_engr_material_drawing,
                            'process_engr_material_drawing_no' => $request->process_engr_material_drawing_no,
                            'process_engr_material_rev_no' => $request->process_engr_material_rev_no,
                            'process_engr_insp_guide' => $request->process_engr_insp_guide,
                            'process_engr_insp_guide_drawing_no' => $request->process_engr_insp_guide_drawing_no,
                            'process_engr_insp_guide_rev_no' => $request->process_engr_insp_guide_rev_no,
                            'process_engr_dieset_eval_report' => $request->process_engr_dieset_eval_report,
                            'process_engr_cosmetic_defect' => $request->process_engr_cosmetic_defect,
                            'process_engr_pingauges' => $request->process_engr_pingauges,
                            'process_engr_measurescope' => $request->process_engr_measurescope,
                            'process_engr_na' => $request->process_engr_na,
                            'process_engr_visual_insp_name' => $request->process_engr_visual_insp_name,
                            'process_engr_visual_insp_datetime' => date('Y-m-d H:i:s'),
                            'process_engr_visual_insp_result' => $request->process_engr_visual_insp_result,
                            'process_engr_dimension_insp_name' => $request->process_engr_dimension_insp_name,
                            'process_engr_dimension_insp_datetime' => date('Y-m-d H:i:s'),
                            'process_engr_dimension_insp_result' => $request->process_engr_dimension_insp_result,
                            'process_engr_actual_checking_remarks' => $request->process_engr_actual_checking_remarks,
                            'last_updated_by' => $request->user_id,
                            'updated_at' => date('Y-m-d H:i:s'),
                            // 'status' => 4 //Change Status to Updated(1)
                        ]);
                    }


                        DB::commit();
                        return response()->json(['result' => 'Success']);
                // }
        }else{
            return response()->json(['result' => 'Session Expired']);
        }
    }

    public function get_dmrpqc_details_id(Request $request){
            $dmrpqc_details = ProductIdentification::with(['created_by.rapidx_user_details' => function($query) { $query->select('id', 'name'); }])
            ->where('id', $request->id)
            ->where('logdel', 0)->get();

            //  return $dmrpqc_details;

        if($request->process_status != 1){ //Get Dieset Condition Data if the Product Identification Status is (2)Ongoing
            $dieset_condition_details = DiesetCondition::with(['in_charged.rapidx_user_details' => function($query) { $query->select('id', 'name'); },
                                                                'checked_by.rapidx_user_details' => function($query) { $query->select('id', 'name'); },
                                                                'drawing_fabricated_by.rapidx_user_details' => function($query) { $query->select('id', 'name'); },
                                                                'drawing_validated_by.rapidx_user_details' => function($query) { $query->select('id', 'name'); }])
                                                                ->where('request_id', $request->id)
                                                                ->where('logdel', 0)->get();

            if($dieset_condition_details[0]->status == 0){ //return blank data if the (p2) status is unchanged(0) not yet updated
                $dieset_condition_details = '';
            }
        }else{
            $dieset_condition_details = '';
        }

        if($request->process_status != 1 && $request->process_status != 2){
            $dieset_condition_checking_details = DiesetConditionChecking::with(['checked_by.rapidx_user_details' => function($query) { $query->select('id', 'name'); }])
                                                                                ->where('request_id', $request->id)
                                                                                ->where('logdel', 0)->get();

            if($dieset_condition_checking_details[0]->status == 0){ //return blank data if the (p3) status is unchanged(0) not yet updated
                $dieset_condition_checking_details = '';
            }
        }else{
            $dieset_condition_checking_details = '';
        }

        if($request->process_status != 1 && $request->process_status != 2 && $request->process_status != 3){
            $machine_setup_details = MachineSetup::where('request_id', $request->id)
                                                    ->where('logdel', 0)->get();

            if($machine_setup_details[0]->status == 0){ //return blank data if the (p4) status is unchanged(0) not yet updated
                $machine_setup_details = '';
            }
        }else{
            $machine_setup_details = '';
        }

        if($request->process_status != 1 && $request->process_status != 2 && $request->process_status != 3 && $request->process_status != 4){
            $product_req_checking_details = ProductReqChecking::where('request_id', $request->id)
                                                    ->where('logdel', 0)->get();

            if($product_req_checking_details[0]->prod_visual_insp_name == '' || $product_req_checking_details[0]->prod_dimension_insp_name == ''){ //return blank data if the (p5) status is unchanged(0) not yet updated
                $product_req_checking_details = '';
            }
        }else{
            $product_req_checking_details = '';
        }

        return response()->json(['dmrpqc_details' => $dmrpqc_details,
                                'dieset_condition_details' => $dieset_condition_details,
                                'dieset_condition_checking_details' => $dieset_condition_checking_details,
                                'machine_setup_details' => $machine_setup_details,
                                'product_req_checking_details' => $product_req_checking_details]);
    }

    public function delete_request(Request $request){
        ProductIdentification::where('id', $request->request_id)->update([ 'logdel' => 1 ]);
        return response()->json(['result' => "1"]);
    }

    function update_status_product_identification($id, $status, $process_status, $updated_by){
        ProductIdentification::where('id', $id)->update([
            'status' => $status,
            'process_status' => $process_status,
            'last_updated_by' => $updated_by,
            'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }

    // function update_status_dieset_condition($id, $updated_by){
    //     DiesetCondition::where('request_id', $id)
    //                     ->update(['last_updated_by' => $updated_by,
    //                               'updated_at' => date('Y-m-d H:i:s'),]);
    // }

    public function update_status_of_dieset_request(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();
        // return $request->all();
        if(isset($_SESSION["rapidx_user_id"])){
            $dmrpqc_user_id = $_SESSION["rapidx_user_id"];
            $get_requested_by_id = User::with(['rapidx_user_details'])->where('rapidx_id', $dmrpqc_user_id)->first();

                if($request->process_status == 1){ //Submit Request (Production Identification)
                    // if(DiesetCondition::where('request_id', $request->id)->exists()){
                    //     return response()->json(['result' => "Duplicate"]);
                    // }else{
                        echo $this->update_status_product_identification($request->request_id, 1, 2, $get_requested_by_id->id);
                        return response()->json(['result' => "Successful"]);
                    // }
                }
                elseif($request->process_status == 2){ //Conform Request (Die Maintenance Engineering)

                    $dieset_condition = DiesetCondition::where('request_id', $request->request_id)->first();
                    // Conform: if request_id is not existing in dieset condition table
                    if(!isset($dieset_condition->request_id)){
                        echo $this->update_status_product_identification($request->request_id, 2, 2, $get_requested_by_id->id);

                        DiesetCondition::insert(['request_id' => $request->request_id,
                                                'created_by' => $get_requested_by_id->id,
                                                'last_updated_by' => $get_requested_by_id->id,
                                                'created_at' => date('Y-m-d H:i:s'),
                                                'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                    }
                    //Submit: if there is request_id exist in dieset condition table and the status is 1(Updated)
                    elseif(isset($dieset_condition->request_id) && $dieset_condition->status == 1){
                        echo $this->update_status_product_identification($request->request_id, 1, 3, $get_requested_by_id->id);
                        DiesetCondition::where('request_id', $request->request_id)->update(['last_updated_by' => $get_requested_by_id->id,
                                               'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                    }
                }elseif($request->process_status == 3){

                    $dieset_condition_checking = DiesetConditionChecking::where('request_id', $request->request_id)->first();
                    // Conform: if request_id is not existing in dieset condition checking table
                    if(!isset($dieset_condition_checking->request_id)){
                        echo $this->update_status_product_identification($request->request_id, 2, 3, $get_requested_by_id->id);

                        DiesetConditionChecking::insert(['request_id' => $request->request_id,
                                                        'created_by' => $get_requested_by_id->id,
                                                        'last_updated_by' => $get_requested_by_id->id,
                                                        'created_at' => date('Y-m-d H:i:s'),
                                                        'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                        //Submit: if there is request_id exist in dieset condition checking table and the status is 1(Updated)
                    }elseif(isset($dieset_condition_checking->request_id) && $dieset_condition_checking->status == 1){
                        echo $this->update_status_product_identification($request->request_id, 1, 4, $get_requested_by_id->id);
                        DiesetConditionChecking::where('request_id', $request->request_id)->update(['last_updated_by' => $get_requested_by_id->id,
                                               'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                    }
                }elseif($request->process_status == 4){

                    $machine_setup = MachineSetup::where('request_id', $request->request_id)->first();
                    // Conform: if request_id is not existing in machine setup table
                    if(!isset($machine_setup->request_id)){
                        echo $this->update_status_product_identification($request->request_id, 2, 4, $get_requested_by_id->id);

                        MachineSetup::insert(['request_id' => $request->request_id,
                                                        'created_by' => $get_requested_by_id->id,
                                                        'last_updated_by' => $get_requested_by_id->id,
                                                        'created_at' => date('Y-m-d H:i:s'),
                                                        'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                        //Submit: if there is request_id exist in machine setup table and the status is 1(Updated)
                    }elseif(isset($machine_setup->request_id) && $machine_setup->status == 1){
                        echo $this->update_status_product_identification($request->request_id, 1, 5, $get_requested_by_id->id);
                        MachineSetup::where('request_id', $request->request_id)->update(['last_updated_by' => $get_requested_by_id->id,
                                               'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                    }
                }elseif($request->process_status == 5){

                    $product_req_checking = ProductReqChecking::select(['request_id', 'status'])->where('request_id', $request->request_id)->first();
                    // return $product_req_checking['request_id'];
                    // Conform: if request_id is not existing in machine setup table
                    if(!isset($product_req_checking['request_id'])){
                        // if(!isset($product_req_checking['status'])){ //Update p1 to next part
                            echo $this->update_status_product_identification($request->request_id, 2, 5, $get_requested_by_id->id);
                        // }
                        ProductReqChecking::insert(['request_id' => $request->request_id,
                                                        'created_by' => $get_requested_by_id->id,
                                                        'last_updated_by' => $get_requested_by_id->id,
                                                        'created_at' => date('Y-m-d H:i:s'),
                                                        'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                        //Submit: if there is request_id exist in machine setup table and the status is 1(Updated)
                    }elseif(isset($product_req_checking['request_id'])){
                        if($product_req_checking['status'] == 3){ //Update p1 to next part
                            echo $this->update_status_product_identification($request->request_id, 1, 6, $get_requested_by_id->id);
                        }

                        $status = $product_req_checking['status'];
                        ProductReqChecking::where('request_id', $request->request_id)->update(['last_updated_by' => $get_requested_by_id->id,
                                                    'status' => $status + 1, 'updated_at' => date('Y-m-d H:i:s'),]);

                        return response()->json(['result' => "Successful"]);
                    }
                }
                else{
                    return response()->json(['result' => "Error"]);
                }
        }else{
            return response()->json(['result' => "Session Expired"]);
        }

    }

    //====================================== DOWNLOAD FILE ======================================
    public function download_file(Request $request, $id){
        $dieset_condition = DiesetCondition::where('request_id', $id)->first();
        $file =  storage_path() . "/app/public/PartsDrawingUploadFile/" . $dieset_condition->parts_drawing;
        // $headers = array(
        //     'Content-Type: application/octet-stream',
        //   );
        return Response::download($file, $dieset_condition->parts_drawing);
    }
}
