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
    public function view_users(){
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

    public function add_user(Request $request){
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

    public function deactivate_user(Request $request){
        User::where('id', $request->user_id)->update([ 'status' => 1 ]);
        return response()->json(['result' => "1"]);
    }

    public function activate_user(Request $request){
        User::where('id', $request->user_id)->update([ 'status' => 0 ]);
        return response()->json(['result' => "1"]);
    }

    public function get_id_edit_user(Request $request){
        $user_data = User::where('id', $request->user_id)->get();
        return response()->json(['user_data' => $user_data]);
    }

    public function edit_user(Request $request){
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

        if($validator->fails()){
            return response()->json(['validation' => 'hasError', 'error' => $validator->messages()]);
        }else{
            if(User::where('rapidx_id', $request->user_id)->exists() && $request->user_id != $rapidx_id ){
                // if ($request->user_access_id !== $request->user_id) {
                return response()->json(['result' => 0]);
                // }
            }else{
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
		$user_levels = Userlevel::all();
		return response()->json(['user_levels' => $user_levels]);
    }

    public function get_user_department(){
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

    public function get_users_by_stat(Request $request){
        if ($request->user_stat == 0) {
            $users = RapidXUser::on('rapidx')->orderBy('name', 'ASC')->get();
        } else {
            $users = RapidXUser::on('rapidx')->where('user_stat', $request->user_stat)->orderBy('name', 'ASC')->get();
        }
        return response()->json(['users' => $users]);
    }

    public function get_users_by_position(Request $request){
        $users = User::with(['rapidx_user_details'])->where('position', $request->position)->where('status', 0)->get();
        return response()->json(['users' => $users]);
    }
}
