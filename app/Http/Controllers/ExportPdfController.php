<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\GetDmrpqcDetailsTrait;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DmrpqcTsController;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PackingListDetails;
use Illuminate\Support\Facades\DB;
// use App(DmrpqcTsController::class')->getPrintReport();

use App\Models\ProductIdentification;
use App\Models\DiesetCondition;
use App\Models\DiesetConditionChecking;
use App\Models\MachineSetup;
use App\Models\ProductReqChecking;
use App\Models\ProductReqCheckingDetails;
use App\Models\MachineSetupSample;
use App\Models\MachineParameterChecking;
use App\Models\Specification;
use App\Models\CompletionActivity;

use App\Models\User;
use App\Models\RapidXUser;

class ExportPdfController extends DmrpqcTsController{
    use GetDmrpqcDetailsTrait;

    // public function get_dmrpqc_details_id_test($id, $process_status){
    //     $getData = $this->getDmrpqcDetailsId($id);
    //     return $getData;
    // }

    public function print($id,$process_status){
            $dmrpqc_details = ProductIdentification::where('id', $id)->where('logdel', 0)->get();

            if($process_status >= 2){ //Get Dieset Condition Data if the Product Identification Status is (2)Ongoing
                $dieset_condition_details = DiesetCondition::where('request_id', $id)->where('logdel', 0)->get();

                // return $dieset_condition_details[0];

                if($dieset_condition_details[0]->status == 0){ //return blank data if the (p2) status is unchanged(0) not yet updated
                    $dieset_condition_details = '';
                }

                $dieset_condition_checking_details = DiesetConditionChecking::with(['checked_by.rapidx_user_details' => function($query) { $query->select('id', 'name'); }])
                                                                                    ->where('request_id', $id)
                                                                                    ->where('logdel', 0)->get();

                if($dieset_condition_checking_details[0]->status == 0){ //return blank data if the (p3) status is unchanged(0) not yet updated
                    $dieset_condition_checking_details = '';
                }
            }else{
                $dieset_condition_details = '';
                $dieset_condition_checking_details = '';
            }

            // return $dieset_condition_checking_details[0];

            if($process_status >= 4){
                $machine_setup_details = MachineSetup::where('request_id', $id)->where('logdel', 0)->get();
                if($machine_setup_details[0]->status == 0){ //return blank data if the (p4) status is unchanged(0) not yet updated
                    $machine_setup_details = '';
                }
            }else{
                $machine_setup_details = '';
            }

            if($process_status >= 5){
                $product_req_checking_details = ProductReqChecking::with(['prod_req_checking_details'])->where('request_id', $id)->where('logdel', 0)->get();

                if($product_req_checking_details[0]->prod_req_checking_details == ''){
                    $product_req_checking_details = '';
                }

                $machine_setup_sample_details = MachineSetupSample::where('request_id', $id)->where('logdel', 0)->first();

                if($machine_setup_sample_details->pic == '' || $machine_setup_sample_details->pic_datetime == ''){
                    $machine_setup_sample_details = '';
                }
            }else{
                $product_req_checking_details = '';
                $machine_setup_sample_details = '';
            }

            if($process_status >= 6){
                $machine_param_checking_details = MachineParameterChecking::where('request_id', $id)
                                                        ->where('logdel', 0)->first();

                if($machine_param_checking_details->status == 0){ //return blank data if the (p4) status is unchanged(0) not yet updated
                    $machine_param_checking_details = '';
                }
            }else{
                $machine_param_checking_details = '';
            }

            if($process_status >= 7){
                $specification_details = Specification::where('request_id', $id)->where('logdel', 0)->first();

                if($specification_details->status == 0){ //return blank data if the (p4) status is unchanged(0) not yet updated
                    $specification_details = '';
                }
            }else{
                $specification_details = '';
            }

            if($process_status >= 8){
                $completion_activity_details = CompletionActivity::where('request_id', $id)
                                                        ->where('logdel', 0)->get();

                if($completion_activity_details[0]->status == 0){ //return blank data if the (p4) status is unchanged(0) not yet updated
                    $completion_activity_details = '';
                }
            }else{
                $completion_activity_details = '';
            }

            // mapping part 2
            if($dieset_condition_details != ''){
                $dieset_condition_mapped_names = $dieset_condition_details->map(function ($item) use ($dieset_condition_details){
                    if($dieset_condition_details[0]->in_charged != ''){
                        $in_charged_rapidx_id = User::where('id', $dieset_condition_details[0]->in_charged)->first();
                        $item->in_charged_name = RapidXUser::select('id', 'name')->where('id', $in_charged_rapidx_id->rapidx_id)->first();
                    }

                    if($dieset_condition_details[0]->mold_check_checked_by != ''){
                        $mold_checked_by_rapidx_id = User::where('id', $dieset_condition_details[0]->mold_check_checked_by)->first();
                        $item->mold_checked_by_name = RapidXUser::select('id', 'name')->where('id', $mold_checked_by_rapidx_id->rapidx_id)->first();
                    }
                    return $item;
                });
            }else{
                $dieset_condition_mapped_names = [];
            }

            // mapping part 3
            if($dieset_condition_checking_details != ''){
                $dieset_condition_checking_mapped_names = $dieset_condition_checking_details->map(function ($item) use ($dieset_condition_checking_details){
                    if($dieset_condition_checking_details[0]->checked_by != ''){
                        $part3_checked_by_rapidx_id = User::where('id', $dieset_condition_checking_details[0]->checked_by)->first();
                        $item->checked_by_name = RapidXUser::select('id', 'name')->where('id', $part3_checked_by_rapidx_id->rapidx_id)->first();
                    }

                    return $item;
                });
            }else{
                $dieset_condition_checking_mapped_names = [];
            }

            // mapping part 4
            if($machine_setup_details != ''){
                $machine_setup_details_mapped_name = $machine_setup_details->map(function ($item) use ($machine_setup_details){
                    if($machine_setup_details[0]->first_in_charged != ''){
                        $part4_first_in_charged = User::where('id', $machine_setup_details[0]->first_in_charged)->first();
                        $item->part4_first_in_charged_name = RapidXUser::select('id', 'name')->where('id', $part4_first_in_charged->rapidx_id)->first();
                    }

                    if($machine_setup_details[0]->second_in_charged != ''){
                        $part4_second_in_charged = User::where('id', $machine_setup_details[0]->second_in_charged)->first();
                        $item->part4_second_in_charged_name = RapidXUser::select('id', 'name')->where('id', $part4_second_in_charged->rapidx_id)->first();
                    }

                    if($machine_setup_details[0]->third_in_charged != ''){
                        $part4_third_in_charged = User::where('id', $machine_setup_details[0]->third_in_charged)->first();
                        $item->part4_third_in_charged_name = RapidXUser::select('id', 'name')->where('id', $part4_third_in_charged->rapidx_id)->first();
                    }

                    return $item;
                });
            }else{
                $machine_setup_details_mapped_name = [];
            }

            // mapping part 5
            if($product_req_checking_details != ''){
                $p5_mapped_names_arr = [];
                $prod_req_details = $product_req_checking_details[0]->prod_req_checking_details;
                for($index = 0; $index < count($prod_req_details); $index++){
                    $p5_mapped_names = $prod_req_details->map(function ($item) use ($prod_req_details, $index){

                        if($prod_req_details[$index]->visual_insp_name != '' && $prod_req_details[$index]->visual_insp_name != 'N/A'){
                            $p5_visual_insp_name_rapidx_id = User::where('id', $prod_req_details[$index]->visual_insp_name)->first();
                            $item->p5_visual_insp_name = RapidXUser::select('id', 'name')->where('id', $p5_visual_insp_name_rapidx_id->rapidx_id)->first();
                        }else{
                            $item->p5_visual_insp_name->name = '';
                        }

                        if($prod_req_details[$index]->dimension_insp_name != '' && $prod_req_details[$index]->dimension_insp_name != 'N/A'){
                            $p5_dimension_insp_name_rapidx_id = User::where('id', $prod_req_details[$index]->dimension_insp_name)->first();
                            $item->p5_dimension_insp_name = RapidXUser::select('id', 'name')->where('id', $p5_dimension_insp_name_rapidx_id->rapidx_id)->first();
                        }else{
                            $item->p5_dimension_insp_name->name = '';
                        }
                        return $item;
                    });
                    array_push($p5_mapped_names_arr, [$p5_mapped_names[0]->p5_visual_insp_name->name, $p5_mapped_names[0]->p5_dimension_insp_name->name]);
                }
            }else{
                $p5_mapped_names = [];
            }
            // return $p5_mapped_names_arr;

            // mapping Part 5 Machine Setup Samples
            if($machine_setup_sample_details != ''){
                $p5_machine_setup_sample_names_arr = [];

                $machine_setup_name_arr = [
                    $machine_setup_sample_details->pic,
                    $machine_setup_sample_details->engr,
                    $machine_setup_sample_details->qc,
                ];

                $index = 0;
                while($index < count($machine_setup_name_arr)){
                    if($machine_setup_name_arr[$index] != '' && $machine_setup_name_arr[$index] != 'N/A'){
                        $p5_mss_rapidx_id = User::where('id', $machine_setup_name_arr[$index])->first();
                        $p5_mss_rapidx_name = RapidXUser::select('name')->where('id', $p5_mss_rapidx_id->rapidx_id)->first();
                    }else{
                        $p5_mss_rapidx_name = array('name' => 'N/A');
                    }
                    array_push($p5_machine_setup_sample_names_arr, $p5_mss_rapidx_name);
                    $index++;
                }
            }else{
                $p5_machine_setup_sample_names_arr = [];
            }

            $machine_setup_sample_dates = [
                $machine_setup_sample_details->pic_datetime,
                $machine_setup_sample_details->engr_datetime,
                $machine_setup_sample_details->qc_datetime,
            ];
            
            // return $mss_name_arr;
            // return $p5_machine_setup_sample_names_arr;
            // mapping part 6
            if($machine_param_checking_details != ''){
                $p6_mapped_names_arr = [];

                $machine_param_checking_arr = [
                    [$machine_param_checking_details->pressure_engr_name, $machine_param_checking_details->pressure_qc_name],
                    [$machine_param_checking_details->temp_nozzle_engr_name, $machine_param_checking_details->temp_nozzle_qc_name],
                    [$machine_param_checking_details->temp_mold_engr_name, $machine_param_checking_details->temp_mold_qc_name],
                    [$machine_param_checking_details->cooling_time_engr_name, $machine_param_checking_details->cooling_time_qc_name]
                ];

                // return $machine_param_checking_arr;
                // $prod_req_details = $machine_param_checking_details;
                for($index = 0; $index < count($machine_param_checking_arr); $index++){
                        if($machine_param_checking_arr[$index][0] != '' && $machine_param_checking_arr[$index][0] != 'N/A'){
                            $p6_rapidx_id = User::where('id', $machine_param_checking_arr[$index])->first();
                            $p6_engr_rapidx_name = RapidXUser::select('name')->where('id', $p6_rapidx_id->rapidx_id)->first();
                        }else{
                            $p6_engr_rapidx_name = array('name' => 'N/A');
                        }

                        if($machine_param_checking_arr[$index][1] != '' && $machine_param_checking_arr[$index][1] != 'N/A'){
                            $p6_rapidx_id = User::where('id', $machine_param_checking_arr[$index])->first();
                            $p6_qc_rapidx_name = RapidXUser::select('name')->where('id', $p6_name_rapidx_id->rapidx_id)->first();
                        }else{
                            $p6_qc_rapidx_name = array('name' => 'N/A');
                        }
                        array_push($p6_mapped_names_arr, [$p6_engr_rapidx_name, $p6_qc_rapidx_name]);
                }
            }else{
                $p6_mapped_names_arr = [];
            }
            
        //include image for format guide
        $testing = 'app/public/dmrpqc_page1_copy.jpg';
        $path = storage_path($testing);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $path1 = storage_path('app/public/dmrpqc_page2_copy.jpg');
        $type1 = pathinfo($path1, PATHINFO_EXTENSION);
        $data1 = file_get_contents($path1);
        $base641 = 'data:image/' . $type . ';base64,' . base64_encode($data1);
        //include image for format guide

        $pdf = PDF::loadView('view_dmrpqc_pdf', compact(
                                                        'dmrpqc_details',
                                                        'dieset_condition_details',
                                                        'dieset_condition_checking_details',
                                                        'machine_setup_details',
                                                        'product_req_checking_details',
                                                        'machine_setup_sample_details',
                                                        'machine_param_checking_details',
                                                        'specification_details',
                                                        'completion_activity_details',
                                                        'dieset_condition_mapped_names',
                                                        'dieset_condition_checking_mapped_names',
                                                        'machine_setup_details_mapped_name',
                                                        'p5_mapped_names_arr',
                                                        'p5_machine_setup_sample_names_arr',
                                                        'p6_mapped_names_arr',
                                                        'base64',
                                                        'base641'))
                                                        ->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
}
