<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;

use App\Models\RapidXUser;
use App\Models\RapidXUserAccess;
use App\Models\RapidXDepartment;
use App\Models\User;
use App\Models\Userlevel;

class UserController extends Controller
{

    // public function get_user_department()
    // // public function GetRapidxUser(Request $request)
    // {
    //     session_start();
    // //    $test = RapidXUser::all();
    // //    return $test;

    //    $rapidx_user_details = RapidXUser::where('id', $_SESSION['rapidx_user_id'])->get();
    //     // return $rapidx_user_details;
    //    $rapidx_user_id = $rapidx_user_details[0]->id;
    //    $rapidx_dept = $rapidx_user_details[0]->department->department_name;
    //    $rapidx_dept_id = $rapidx_user_details[0]->department_id;

    // //    return $rapidx_dept_id;

    //     $user_details = User::where('rapidx_id', $_SESSION['rapidx_user_id'])->where('status', 0)->get();

    //     $user_id = $user_details[0]->rapidx_id;
    //     $user_level_id = $user_details[0]->user_level_id;
    //     $user_status = $user_details[0]->status;

    //     $user_access = RapidXUserAccess::where('user_id', $user_id)->get();

    //     $accesses = array();
    //     for($i = 0; $i < count($user_access); $i++) {
    //         $accesses[] = $user_access[$i]->module_id;
    //     }

    //     // test
    //    // $rapidx_dept_id = 14;

    //     // DEPARTMENT ID == 30 (FACILITY SECTION), DEPARTMENT ID == 48 (ISS), DEPARTMENT ID == 1 (ISS SOFTWARE), DEPARTMENT ID == 2 (ISS HARDWARE), DEPARTMENT ID == 54 (SECRETARIAT), DEPARTMENT ID == 54 (TS WHSE)

    //     $authorized_departments = [1, 2, 30, 48, 54, 18];

    //     $BOD = RapidXDepartment::where('department_name', 'like', 'Board of Directors%')->pluck('department_id')->toArray();
    //     $IAS = RapidXDepartment::where('department_name', 'like', 'IAS%')->pluck('department_id')->toArray();
    //     $FIN = RapidXDepartment::where('department_name', 'like', 'FIN%')->pluck('department_id')->toArray();
    //     $HRD = RapidXDepartment::where('department_name', 'like', 'HRD%')->pluck('department_id')->toArray();
    //     $ESS = RapidXDepartment::where('department_name', 'like', 'ESS%')->pluck('department_id')->toArray();
    //     $LOG = RapidXDepartment::where('department_name', 'like', 'LOG%')->pluck('department_id')->toArray();
    //     $FAC = RapidXDepartment::where('department_name', 'like', 'FAC%')->pluck('department_id')->toArray();
    //     $ISS = RapidXDepartment::where('department_name', 'like', 'ISS%')->pluck('department_id')->toArray();
    //     $QAD = RapidXDepartment::where('department_name', 'like', 'QAD%')->pluck('department_id')->toArray();
    //     $EMS = RapidXDepartment::where('department_name', 'like', 'EMS%')->pluck('department_id')->toArray();

    //     $sg_array = array_merge($BOD,$IAS,$FIN,$HRD,$ESS,$LOG,$ISS,$QAD,$EMS);

    //     $ts_department = RapidXDepartment::where('department_name', 'like', 'TS%')->pluck('department_id')->toArray();
    //     $cn_department = RapidXDepartment::where('department_name', 'like', 'CN%')->pluck('department_id')->toArray();
    //     $yf_department = RapidXDepartment::where('department_name', 'like', 'YF%')->pluck('department_id')->toArray();
    //     $pps_department = RapidXDepartment::where('department_name', 'like', 'PPS%')->pluck('department_id')->toArray();

    //     $prod_wo_pps_array = array_merge($ts_department,$cn_department,$yf_department);
    //     $prod_pps_array = array_merge($pps_department);

    //     // return $pps_department;

    //     Session::put('support_group', $sg_array);
    //     Session::put('production_wo_pps', $prod_wo_pps_array);
    //     Session::put('production_pps', $prod_pps_array);
    //     Session::put('facility_section', $FAC);

    //     Session::put('department_id', $rapidx_dept_id);
    //     Session::put('departments', $authorized_departments);
    //     Session::put('user_level', $user_level_id);

    //     // return Session::get('departments');

    //     // if(!in_array(Session::get('department_id'), Session::get('departments'))) {
    //     //     return 'true';
    //     // } else {
    //     //     return 'false';
    //     // }

    //     // return Session::get('departments');
    //     // AUTHORIZED == 0, NOT AUTHORIZED == 1

    //     if(in_array(16, $accesses)) {
    //         Session::put('authorized', 0);
    //     } else {
    //         Session::put('authorized', 1);
    //     }

    //     return response()->json([
    //                             'support_group' => Session::get('support_group'),
    //                             'production_wo_pps' => Session::get('production_wo_pps'),
    //                             'production_pps' => Session::get('production_pps'),
    //                             'facility_section' => Session::get('facility_section'),
    //                             'department_id' => Session::get('department_id'),
    //                             'departments_authorized' => Session::get('departments'),
    //                             'user_level_id' => Session::get('user_level'),
    //                             'auth' => Session::get('authorized')
    //                         ]);
    // }

    // public function get_department()
    // {
    //     session_start();

    //     $rapidx_user_details = RapidXUser::where('id', $_SESSION['rapidx_user_id'])->get();

    //     $rapidx_user_id = $rapidx_user_details[0]->id;
    //     $rapidx_dept_id = $rapidx_user_details[0]->department_id;

    //     // test
    //    // $rapidx_dept_id = 14;

    //     $user_details = User::where('rapidx_id', $_SESSION['rapidx_user_id'])->get();

    //     $user_id = $user_details[0]->rapidx_id;
    //     $user_level_id = $user_details[0]->user_level_id;

    //     // department id from rapidx
    //     $ts_department = RapidXDepartment::where('department_name', 'like', 'TS%')->pluck('department_id')->toArray();
    //     $cn_department = RapidXDepartment::where('department_name', 'like', 'CN%')->pluck('department_id')->toArray();
    //     $yf_department = RapidXDepartment::where('department_name', 'like', 'YF%')->pluck('department_id')->toArray();
    //     $pps_department = RapidXDepartment::where('department_name', 'like', 'PPS%')->pluck('department_id')->toArray();

    //     if(in_array($rapidx_dept_id, $cn_department)){
    //         $dep = 1;
    //     }
    //     else if(in_array($rapidx_dept_id, $pps_department)){
    //         $dep = 2;
    //     }
    //     else if(in_array($rapidx_dept_id, $ts_department)){
    //         $dep = 3;
    //     }
    //     else if(in_array($rapidx_dept_id, $yf_department)){
    //         $dep = 4;
    //     }else if($user_level_id == 2 || $user_level_id == 4){

    //     }

    //     return response()->json(['department' => $dep]);
    // }

    // public function get_department_for_ink()
    // {
    //     session_start();

    //     $rapidx_user_details = RapidXUser::where('id', $_SESSION['rapidx_user_id'])->get();

    //     $rapidx_user_id = $rapidx_user_details[0]->id;
    //     $rapidx_dept_id = $rapidx_user_details[0]->department_id;

    //     $user_details = User::where('rapidx_id', $_SESSION['rapidx_user_id'])->get();

    //     $user_id = $user_details[0]->rapidx_id;
    //     $user_level_id = $user_details[0]->user_level_id;

    //     // department id from rapidx
    //     $BOD = RapidXDepartment::where('department_name', 'like', 'Board of Directors%')->pluck('department_id')->toArray();
    //     $IAS = RapidXDepartment::where('department_name', 'like', 'IAS%')->pluck('department_id')->toArray();
    //     $FIN = RapidXDepartment::where('department_name', 'like', 'FIN%')->pluck('department_id')->toArray();
    //     $HRD = RapidXDepartment::where('department_name', 'like', 'HRD%')->pluck('department_id')->toArray();
    //     $ESS = RapidXDepartment::where('department_name', 'like', 'ESS%')->pluck('department_id')->toArray();
    //     $LOG = RapidXDepartment::where('department_name', 'like', 'LOG%')->pluck('department_id')->toArray();
    //     $FAC = RapidXDepartment::where('department_name', 'like', 'FAC%')->pluck('department_id')->toArray();
    //     $ISS = RapidXDepartment::where('department_name', 'like', 'ISS%')->pluck('department_id')->toArray();
    //     $QAD = RapidXDepartment::where('department_name', 'like', 'QAD%')->pluck('department_id')->toArray();
    //     $EMS = RapidXDepartment::where('department_name', 'like', 'EMS%')->pluck('department_id')->toArray();
    //     $ts_department = RapidXDepartment::where('department_name', 'like', 'TS%')->pluck('department_id')->toArray();
    //     $cn_department = RapidXDepartment::where('department_name', 'like', 'CN%')->pluck('department_id')->toArray();
    //     $yf_department = RapidXDepartment::where('department_name', 'like', 'YF%')->pluck('department_id')->toArray();
    //     $pps_department = RapidXDepartment::where('department_name', 'like', 'PPS%')->pluck('department_id')->toArray();

    //     if(in_array($rapidx_dept_id, $BOD)){
    //         $dep = 1;
    //     }
    //     else if(in_array($rapidx_dept_id, $IAS)){
    //         $dep = 2;
    //     }
    //     else if(in_array($rapidx_dept_id, $FIN)){
    //         $dep = 3;
    //     }
    //     else if(in_array($rapidx_dept_id, $HRD)){
    //         $dep = 4;
    //     }
    //     else if(in_array($rapidx_dept_id, $ESS)){
    //         $dep = 5;
    //     }
    //     else if(in_array($rapidx_dept_id, $LOG)){
    //         $dep = 6;
    //     }
    //     else if(in_array($rapidx_dept_id, $FAC)){
    //         $dep = 7;
    //     }
    //     else if(in_array($rapidx_dept_id, $ISS)){
    //         $dep = 8;
    //     }
    //     else if(in_array($rapidx_dept_id, $QAD)){
    //         $dep = 9;
    //     }
    //     else if(in_array($rapidx_dept_id, $EMS)){
    //         $dep = 10;
    //     }
    //     else if(in_array($rapidx_dept_id, $ts_department)){
    //         $dep = 11;
    //     }
    //     else if(in_array($rapidx_dept_id, $cn_department)){
    //         $dep = 12;
    //     }
    //     else if(in_array($rapidx_dept_id, $yf_department)){
    //         $dep = 13;
    //     }
    //     else if(in_array($rapidx_dept_id, $pps_department)){
    //         $dep = 14;
    //     }

    //     return response()->json(['department' => $dep]);
    // }

    public function view_users()
    {
        $users = User::with(['rapidx_user_details.department','user_levels'])
                ->get();

        return DataTables::of($users)
            ->addColumn('name', function ($user) {
                $result = $user->rapidx_user_details->name;
                return $result;
            })
            ->addColumn('section_name', function ($user) {
                $result = $user->rapidx_user_details->department->department_name;
                return $result;
            })
            ->addColumn('user_level', function ($user) {
                $result = $user->user_levels->name;
                return $result;
            })
            ->addColumn('status', function ($user) {
                $result = "";

                if ($user->status == 0) {
                    $result .= '<center><span class="badge badge-pill badge-success">Active</span></center>';
                } else {
                    $result .= '<center><span class="badge badge-pill badge-secondary">Inactive</span></center>';
                }
                return $result;
            })
            ->addColumn('action', function ($user) {
                $result = "";
                $result .= '<button class="btn btn-primary text-center actionEditUser" user-id="' . $user->id . '" data-bs-toggle="modal" data-bs-target="#modalEditUser" data-keyboard="false"><i class="fas fa-edit"></i> Edit</button>&nbsp;';

                if ($user->status == 0) {
                    $result .= '<button class="btn btn-danger text-center actionDeactivateUser" user-id="' . $user->id . '" data-bs-toggle="modal" data-bs-target="#modalDeactivateUser" data-keyboard="false">Deactivate</button>';
                } else {
                    $result .= '<button class="btn btn-success text-center actionActivateUser" user-id="' . $user->id . '" data-bs-toggle="modal" data-bs-target="#modalActivateUser" data-keyboard="false">Activate</button>';
                }
                return $result;
            })
            ->rawColumns(['user_level','name','section','position','status', 'action'])
            ->make(true);
    }

    public function add_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();
        $password = "pmi12345";

        $validator = Validator::make($data, [
            'user_id' => 'required',
            'section_id' => 'required',
            'position_id' => 'required',
            'userLevel' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        } else {
            if (User::where('rapidx_id', $request->user_id)->exists()) {
                return response()->json(['result' => 0]);
            } else {
                User::insert([
                    'rapidx_id' => $request->user_id,
                    'section' => $request->section_id,
                    'position' => $request->position_id,
                    'user_level_id' => $request->userLevel,
                    'status' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

                DB::commit();
                return response()->json(['result' => 1]);
            }
        }
    }

    public function deactivate_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        session_start();

        // $data = $request->all();

        User::where('id', $request->user_id)
            ->update([
                'status' => 1
            ]);

        return response()->json(['result' => "1"]);
    }

    public function activate_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        User::where('id', $request->user_id)->update([ 'status' => 0 ]);

        return response()->json(['result' => "1"]);
    }

    public function get_id_edit_user(Request $request)
    {
        $user_data = User::where('id', $request->user_id)->get();

        return response()->json(['user_data' => $user_data]);
    }

    public function edit_user(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        session_start();

        $data = $request->all();

        $validator = Validator::make($data, [
            'user_access_id' => 'required',
            'user_id' => ['required'],
            'section_id' => ['required'],
            'position_id' => ['required'],
            'user_level_id' => ['required'],
        ]);

        $user_rapidx_id = User::where('id', $request->user_access_id)->get();
        $rapidx_id = $user_rapidx_id[0]->rapidx_id;

        // return $rapidx_id;

        if ($validator->fails()) {
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        } else {
            if (User::where('rapidx_id', $request->user_id)->exists() && $request->user_id != $rapidx_id ) {
                // if ($request->user_access_id !== $request->user_id) {
                return response()->json(['result' => 0]);
                // }
            } else {
                User::where('id', $request->user_access_id)
                    ->update([
                        'rapidx_id' => $request->user_id,
                        'section' => $request->section_id,
                        'user_level_id' => $request->user_level_id,
                        'position' => $request->position_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                return response()->json(['result' => 1]);
            }
        }
    }

    public function get_user_level(){
		// $user_levels;
		// if($request->user_level_stat == 0){
		// 	$user_levels = User::all();
		// }
		// else{
			$user_levels = Userlevel::all();
		// }
		return response()->json(['user_levels' => $user_levels]);
    }

    public function get_user_department() {
       session_start();
       $rapidx_user_details = RapidXUser::where('id', $_SESSION['rapidx_user_id'])->get();
       $rapidx_user_id = $rapidx_user_details[0]->id;
       $rapidx_dept = $rapidx_user_details[0]->department->department_name;
       $rapidx_dept_id = $rapidx_user_details[0]->department_id;

        $user_details = User::where('rapidx_id', $_SESSION['rapidx_user_id'])->where('status', 0)->get();

        $user_id = $user_details[0]->rapidx_id;
        $user_level_id = $user_details[0]->user_level_id;
        $user_status = $user_details[0]->status;

        $user_access = RapidXUserAccess::where('user_id', $user_id)->get();

        $accesses = array();
        for($i = 0; $i < count($user_access); $i++) {
            $accesses[] = $user_access[$i]->module_id;
        }

        // DEPARTMENT ID == 30 (FACILITY SECTION), DEPARTMENT ID == 48 (ISS), DEPARTMENT ID == 1 (ISS SOFTWARE), DEPARTMENT ID == 2 (ISS HARDWARE), DEPARTMENT ID == 54 (SECRETARIAT), DEPARTMENT ID == 54 (TS WHSE)

        // $authorized_departments = [1, 2, 30, 48, 54, 18]; /cmodify

        // $BOD = RapidXDepartment::where('department_name', 'like', 'Board of Directors%')->pluck('department_id')->toArray();
        // $IAS = RapidXDepartment::where('department_name', 'like', 'IAS%')->pluck('department_id')->toArray();
        // $FIN = RapidXDepartment::where('department_name', 'like', 'FIN%')->pluck('department_id')->toArray();
        // $HRD = RapidXDepartment::where('department_name', 'like', 'HRD%')->pluck('department_id')->toArray();
        // $ESS = RapidXDepartment::where('department_name', 'like', 'ESS%')->pluck('department_id')->toArray();
        // $LOG = RapidXDepartment::where('department_name', 'like', 'LOG%')->pluck('department_id')->toArray();
        // $FAC = RapidXDepartment::where('department_name', 'like', 'FAC%')->pluck('department_id')->toArray();
        // $ISS = RapidXDepartment::where('department_name', 'like', 'ISS%')->pluck('department_id')->toArray();
        // $QAD = RapidXDepartment::where('department_name', 'like', 'QAD%')->pluck('department_id')->toArray();
        // $EMS = RapidXDepartment::where('department_name', 'like', 'EMS%')->pluck('department_id')->toArray();

        // $sg_array = array_merge($BOD,$IAS,$FIN,$HRD,$ESS,$LOG,$ISS,$QAD,$EMS);

        // $ts_department = RapidXDepartment::where('department_name', 'like', 'TS%')->pluck('department_id')->toArray();
        // $cn_department = RapidXDepartment::where('department_name', 'like', 'CN%')->pluck('department_id')->toArray();
        // $yf_department = RapidXDepartment::where('department_name', 'like', 'YF%')->pluck('department_id')->toArray();
        // $pps_department = RapidXDepartment::where('department_name', 'like', 'PPS%')->pluck('department_id')->toArray();

        // $prod_wo_pps_array = array_merge($ts_department,$cn_department,$yf_department);
        // $prod_pps_array = array_merge($pps_department);

        // Session::put('support_group', $sg_array);
        // Session::put('production_wo_pps', $prod_wo_pps_array);
        // Session::put('production_pps', $prod_pps_array);
        // Session::put('facility_section', $FAC);

        Session::put('department_id', $rapidx_dept_id);
        // Session::put('departments', $authorized_departments);
        Session::put('user_level', $user_level_id);

        // AUTHORIZED == 0, NOT AUTHORIZED == 1
        if(in_array(31, $accesses)) {
            Session::put('authorized', 0);
        } else {
            Session::put('authorized', 1);
        }

        return response()->json([
                                // 'support_group' => Session::get('support_group'),
                                // 'production_wo_pps' => Session::get('production_wo_pps'),
                                // 'production_pps' => Session::get('production_pps'),
                                // 'facility_section' => Session::get('facility_section'),
                                'department_id' => Session::get('department_id'),
                                // 'departments_authorized' => Session::get('departments'),
                                'user_level_id' => Session::get('user_level'),
                                'auth' => Session::get('authorized')
                            ]);
    }

    // public function get_user_details()
    // {
    //     session_start();

    //     $rapidx_user = RapidXUser::where('id', $_SESSION['rapidx_user_id'])->get();

    //     $rapidx_user_id = $rapidx_user[0]->id;

    //     return response()->json(['rapidx_user_id' => $rapidx_user_id]);
    // }

    public function get_users_by_stat(Request $request)
    {
        $users;
        if ($request->user_stat == 0) {
            $users = RapidXUser::on('rapidx')->get();
        } else {
            $users = RapidXUser::on('rapidx')->where('user_stat', $request->user_stat)->get();
        }
        return response()->json(['users' => $users]);
    }

    // public function get_UserDepartment(Request $request)
    // {
    //     $user_department = User::all();
    //     // $user_department_id = $user_department->department;

    //     // return $user_department;

    //     return response()->json(['user_department' => $user_department]);
    // }
}
