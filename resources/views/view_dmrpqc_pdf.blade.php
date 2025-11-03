<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Die set Maintenance Runcard & Product Qualification Checksheet (PDF)</title>
        <style>
            .container {
                position: relative;
                border: 1 solid black;
                /* width="100%" height="100%" */
            }

            *{
                margin: 0;
                padding: 0;
            }

            body{
                font:12px Georgia, serif;
                margin: 0;
                padding: 0;
            }

            .part1 {

                /* border: 1 solid black; */
                position: absolute;
                top: 50px;
                left: 50px;
                font:10px Georgia, serif;
            }

            .part2 {
                /* border: 1 solid black; */
                position: absolute;
                top: 115px;
                left: 12px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_doa {
                /* border: 1 solid black; */
                position: absolute;
                top: 115px;
                left: 165px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_part_no_and_quantity {
                /* border: 1 solid black; */
                position: absolute;
                top: 285px;
                left: 70px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_date_start_finish_incharged {
                /* border: 1 solid black; */
                position: absolute;
                top: 321px;
                left: 35px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_check_points {
                /* border: 1 solid black; */
                position: absolute;
                top: 115px;
                left: 308px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .text{
                font:9px Georgia, serif;
            }

            .check_symbol {
                font-family: DejaVu Sans, sans-serif;
                font-size:13px;
                font-weight: bold;
                /* padding-top: 0;
                padding-bottom: 0; */
            }

            .part2_checkpoint_remarks {
                /* border: 1 solid black; */
                position: absolute;
                top: 292px;
                left: 305px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_mold_check {
                /* border: 1 solid black; */
                position: absolute;
                top: 115px;
                left: 582px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_mold_check_remarks {
                /* border: 1 solid black; */
                position: absolute;
                top: 200px;
                left: 490px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_references_used {
                /* border: 1 solid black; */
                position: absolute;
                top: 132px;
                left: 700px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_checked_by_date_time_status {
                /* border: 1 solid black; */
                position: absolute;
                top: 321px;
                left: 490px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part2_final_remarks {
                /* border: 1 solid black; */
                position: absolute;
                top: 332px;
                left: 100px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part3 {
                /* border: 1 solid black; */
                position: absolute;
                top: 360px;
                left: 25px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part3_checked_by_date {
                /* border: 1 solid black; */
                position: absolute;
                top: 392px;
                left: 100px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part4 {
                /* border: 1 solid black; */
                position: absolute;
                top: 372px;
                left: 302px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part5_text{
                font:8px Georgia, serif;
            }

            .part5_prod {
                /* border: 1 solid black; */
                position: absolute;
                top: 469px;
                left: 120px;
                font:10px Georgia, serif;
            }

            .part5_prod_activity_details {
                /* border: 1 solid black; */
                position: absolute;
                top: 647px;
                left: 107px;
                font:10px Georgia, serif;
            }

            .part5_engr {
                /* border: 1 solid black; */
                position: absolute;
                top: 469px;
                left: 280px;
                font:10px Georgia, serif;
            }

            .part5_engr_activity_details {
                /* border: 1 solid black; */
                position: absolute;
                top: 647px;
                left: 270px;
                font:10px Georgia, serif;
            }

            .part5_qc {
                /* border: 1 solid black; */
                position: absolute;
                top: 469px;
                left: 440px;
                font:10px Georgia, serif;
            }

            .part5_qc_activity_details {
                /* border: 1 solid black; */
                position: absolute;
                top: 647px;
                left: 430px;
                font:10px Georgia, serif;
            }

            .part5_process_engr {
                /* border: 1 solid black; */
                position: absolute;
                top: 469px;
                left: 630px;
                font:10px Georgia, serif;
            }

            .part5_process_engr_activity_details {
                /* border: 1 solid black; */
                position: absolute;
                top: 647px;
                left: 620px;
                font:10px Georgia, serif;
            }

            .part6_text{
                font:8px Georgia, serif;
            }

            .part6_reference {
                /* border: 1 solid black; */
                position: absolute;
                top: 707px;
                left: 414px;
                font:10px Georgia, serif;
                /* border-collapse: collapse; */
            }

            .part6_details {
                /* border: 1 solid black; */
                position: absolute;
                top: 737px;
                left: 107px;
                font:10px Georgia, serif;
            }

            .part5_machine_setup_samples {
                /* border: 1 solid black; */
                position: absolute;
                top: 735px;
                left: 625px;
                font:10px Georgia, serif;
            }

            .part7_specifications {
                /* border: 1 solid black; */
                position: absolute;
                top: 822px;
                left: 16px;
                font:10px Georgia, serif;
            }

        </style>
    </head>
    <body>
        <div class="container">
            {{-- Die set Maintenance Runcard & Product Qualfication Checksheet --}}
            <img src="<?php echo $base64 ?>" width="100%" height="100%"/>

            <table class="part1">
                @php
                    $date_time = explode(' ', $dmrpqc_details[0]->start_date_time);
                @endphp
                <tr>
                    <td style="width:40px;"></td>
                    <td style="width:230px;">
                        <b><span>{{ $dmrpqc_details[0]->device_name }}</span></b>
                    </td>
                    <td style="width:110px;">
                        <b><span>{{ $dmrpqc_details[0]->die_no }}</span></b>
                    </td>
                    <td style="width:150px;">
                        <b><span>{{ $dmrpqc_details[0]->drawing_no }}</span></b>
                    </td>
                    <td style="width:50px;">
                        <b><span>{{ $dmrpqc_details[0]->rev_no }}</span></b>
                    </td>
                    <td style="width:90px;">
                        <b><span>{{ $date_time[0] }}</span></b>
                    </td>
                    <td>
                        <b><span>{{ $date_time[1] }}</span></b>
                    </td>

                </tr>
                <tr>
                    <td style="width:100%; padding-top:2px;" colspan="2">
                        <b><span>{{ $dmrpqc_details[0]->po_number }}</span></b>
                    </td>
                </tr>
            </table>

            @php
                $action_done_arr  = [];
                array_push($action_done_arr, $dieset_condition_details[0]->action_1_mold_cleaned,
                            $dieset_condition_details[0]->action_2_mold_check,
                            $dieset_condition_details[0]->action_3_device_conversion,
                            $dieset_condition_details[0]->action_4_dieset_overhaul,
                            $dieset_condition_details[0]->action_4a_fix_side,
                            $dieset_condition_details[0]->action_4b_movement_side,
                            $dieset_condition_details[0]->action_4c_with_parts_marking,
                            $dieset_condition_details[0]->action_4d_without_parts_marking,
                            $dieset_condition_details[0]->action_5_reversible_parts_installed,
                            $dieset_condition_details[0]->action_6_repair,
                            $dieset_condition_details[0]->action_7_parts_change,
                            $dieset_condition_details[0]->action_7a_new,
                            $dieset_condition_details[0]->action_7b_fabricated,
                            $dieset_condition_details[0]->action_7c_with_parts_marking,
                            $dieset_condition_details[0]->action_7d_with_parts_change_notice
                );

                $action_done_value  = [];
                for ($i = 0; $i < count($action_done_arr); $i++) {
                    if($action_done_arr[$i] == 1){
                        $value = "√";
                    }else{
                        $value = "";
                    }
                    array_push($action_done_value, $value);
                }

                $details_of_activity = str_split($dieset_condition_details[0]->details_of_activity, 25);
            @endphp

            <div class="part2">
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:74px;" class="check_symbol">{{ $action_done_value[0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:75px;" class="check_symbol">{{ $action_done_value[1] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-23px" class="check_symbol">{{ $action_done_value[2] }}</h4> {{-- Action Done 3 --}}
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-23px" class="check_symbol">{{ $action_done_value[3] }}</h4> {{-- Action Done 4 --}}
                </div>

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:74px; margin-top:-20px" class="check_symbol">{{ $action_done_value[4] }}</h4> {{-- Action Done 4A --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:74px; margin-top:-20px" class="check_symbol">{{ $action_done_value[5] }}</h4> {{-- Action Done 4B --}}
                    </div>
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-23px" class="check_symbol">{{ $action_done_value[6] }}</h4> {{-- Action Done 4C --}}
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-23px" class="check_symbol">{{ $action_done_value[7] }}</h4> {{-- Action Done 4D --}}
                </div>

                <div>
                    @php
                        if($action_done_value[8] == "√"){
                            $action_done_value_5y = "√";
                            $action_done_value_5n = "";
                        }else{
                            $action_done_value_5y = "";
                            $action_done_value_5n = "√";
                        }
                    @endphp
                    <div style="display: inline-block !important;">
                        <h4 style="width:49px; margin-left:21px; margin-top:5px" class="check_symbol">{{ $action_done_value_5y }}</h4> {{-- Action Done 5 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:74px; margin-top:5px" class="check_symbol">{{ $action_done_value_5n }}</h4> {{-- Action Done 5 --}}
                    </div>
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-25px" class="check_symbol">{{ $action_done_value[9] }}</h4> {{-- Action Done 6 --}}
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-25px" class="check_symbol">{{ $action_done_value[10] }}</h4> {{-- Action Done 7 --}}
                </div>

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:48px; margin-left:13px; margin-top:-23px" class="check_symbol">{{ $action_done_value[11] }}</h4> {{-- Action Done 7A --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:74px; margin-top:-23px" class="check_symbol">{{ $action_done_value[12] }}</h4> {{-- Action Done 7B --}}
                    </div>
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-left:13px; margin-top:-25px" class="check_symbol">{{ $action_done_value[13] }}</h4> {{-- Action Done 7C --}}
                </div>

                <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-left:13px; margin-top:-25px" class="check_symbol">{{ $action_done_value[14] }}</h4> {{-- Action Done 7D --}}
                </div>
            </div>

            <div class="part2_doa">
                <div style="display: inline-block !important;">
                    @foreach ($details_of_activity as $doa_list)
                        <p style="width:125px;" class="text">{{ $doa_list }}</p> {{-- Action Done 2 --}}
                        {{-- <br> --}}
                    @endforeach
                </div>
            </div>

            <div class="part2_part_no_and_quantity">
                @php
                    $parts_no = explode(',', $dieset_condition_details[0]->parts_no);
                    $quantity = explode(',', $dieset_condition_details[0]->quantity);
                    $quantity = explode(',', $dieset_condition_details[0]->quantity);
                @endphp
                @for ($i = 0; $i < count($parts_no); $i++)
                    <div style="display: inline-block !important;">
                        <p style="width:36px;" class="text">{{ $parts_no[$i] }}</p> {{-- Action Done 2 --}}
                    </div>
                @endfor
                <br>
                @for ($i = 0; $i < count($quantity); $i++)
                    <div style="display: inline-block !important;">
                        <p style="width:36px;" class="text">{{ $quantity[$i] }}</p> {{-- Action Done 2 --}}
                    </div>
                @endfor
            </div>

            <div class="part2_date_start_finish_incharged">
                <div style="display: inline-block !important;">
                    <p style="width:80px;" class="text">{{ $dieset_condition_details[0]->action_done_date_start }}</p> {{-- Action Done 2 --}}
                </div>
                <div style="display: inline-block !important;">
                    <p style="width:45px;" class="text">{{ $dieset_condition_details[0]->action_done_start_time }}</p> {{-- Action Done 2 --}}
                </div>
                <div style="display: inline-block !important;">
                    <p style="width:60px;" class="text">{{ $dieset_condition_details[0]->action_done_finish_time }}</p> {{-- Action Done 2 --}}
                </div>

                @php
                    $in_charged_arr = [];
                    if($dieset_condition_mapped_names[0]->in_charged_name->name == null){
                        echo '<div class="data">&nbsp;</div>';
                    }else{
                        $in_charged_name = explode(' ', $dieset_condition_mapped_names[0]->in_charged_name->name);
                        $in_charged_arr[] = $in_charged_name[0];
                        for($icn = 0; $icn < count($in_charged_name); $icn++){
                            if($icn == (count($in_charged_name) - 1)){
                                $in_charged_arr[] = $in_charged_name[$icn][0];
                            }
                        }
                    }
                @endphp

                <div style="display: inline-block !important;">
                    <p style="width:100px;" class="text">{{ implode(' ',$in_charged_arr).'.' }}</p> {{-- Action Done 2 --}}
                </div>
            </div>

            @php
                $check_point_arr  = [];
                array_push($check_point_arr, $dieset_condition_details[0]->check_point_1_marking_check,
                            $dieset_condition_details[0]->check_point_2_tanshi_pin,
                            $dieset_condition_details[0]->check_point_2a_crack,
                            $dieset_condition_details[0]->check_point_2b_bend,
                            $dieset_condition_details[0]->check_point_2c_worn_out,
                            $dieset_condition_details[0]->check_point_3_dent,
                            $dieset_condition_details[0]->check_point_4_porous,
                            $dieset_condition_details[0]->check_point_5_ejector_pin,
                            $dieset_condition_details[0]->check_point_6_coma,
                            $dieset_condition_details[0]->check_point_7_gasvent,
                            $dieset_condition_details[0]->check_point_8_assy_orientation,
                            $dieset_condition_details[0]->check_point_9_fs_ms_fitting,
                            $dieset_condition_details[0]->check_point_10_sub_gate,
                );

                $check_point_value  = [];
                for ($i = 0; $i < count($check_point_arr); $i++) {
                    if($i >= 2 && $i <= 4){
                        //For CheckBoxes
                        if($check_point_arr[$i] == 1){
                            $value = "√";
                        }else{
                            $value = "";
                        }
                        array_push($check_point_value, $value);
                    }else if($i == 9){
                        array_push($check_point_value, $check_point_arr[$i]);
                    }else{
                        //For RadioButtons
                        if($check_point_arr[$i] == "OK"){
                            $value_ok = "√";
                            $value_ng = "";
                        }else if($check_point_arr[$i] == "NG"){
                            $value_ok = "";
                            $value_ng = "√";
                        }else{
                            $value_ok = "";
                            $value_ng = "";
                        }
                        array_push($check_point_value, [$value_ok, $value_ng]);
                    }
                }
            @endphp

            <div class="part2_check_points">
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:104px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px;" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:104px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px; margin-top:-20px" class="check_symbol">{{ $check_point_value[2] }}</h4> {{-- Action Done 4A --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px; margin-top:-20px" class="check_symbol">{{ $check_point_value[3] }}</h4> {{-- Action Done 4B --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-20px" class="check_symbol">{{ $check_point_value[4] }}</h4> {{-- Action Done 4B --}}
                    </div>
                </div>

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:107px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:107px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:107px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:107px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>

                <br> <!-- Line Break -->
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:90px; margin-top:-8px" class="text">{{ $check_point_value[9] }}</h4> {{-- Action Done 1 --}}
                    </div>
                </div>

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:108px; margin-top:-11px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-11px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:108px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:22px; margin-left:108px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $check_point_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
            </div>

            @php
                $check_point_remarks = str_split($dieset_condition_details[0]->check_point_remarks, 40);
            @endphp

            <div class="part2_checkpoint_remarks">
                <div style="display: inline-block !important;">
                    @foreach ($check_point_remarks as $cp_remarks)
                        <p style="width:180px;" class="text">{{ $cp_remarks }}</p> {{-- Action Done 2 --}}
                        {{-- <br> --}}
                    @endforeach
                </div>
            </div>

            @php
                $mold_check_arr  = [];
                array_push($mold_check_arr, $dieset_condition_details[0]->mold_check_1_withdraw_pin_external,
                            $dieset_condition_details[0]->mold_check_2_withdraw_pin_internal,
                            $dieset_condition_details[0]->mold_check_3_slidecore_stopper,
                            $dieset_condition_details[0]->mold_check_4_locator_ring,
                            $dieset_condition_details[0]->mold_check_5_bolts_nuts,
                            $dieset_condition_details[0]->mold_check_6_stripper_plate,
                );

                $mold_check_value  = [];
                for ($i = 0; $i < count($mold_check_arr); $i++) {
                    if($mold_check_arr[$i] == "OK"){
                        $value_ok = "√";
                        $value_ng = "";
                        $value_na = "";
                    }else if($mold_check_arr[$i] == "NG"){
                        $value_ok = "";
                        $value_ng = "√";
                        $value_na = "";
                    }else if($mold_check_arr[$i] == "N/A"){
                        $value_ok = "";
                        $value_ng = "";
                        $value_na = "√";
                    }else{
                        $value_ok = "";
                        $value_ng = "";
                        $value_ng = "";
                    }
                    array_push($mold_check_value, [$value_ok, $value_ng, $value_na]);
                }
            @endphp

            <div class="part2_mold_check">
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px;" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px;" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 1 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px; margin-top:-10px" class="check_symbol">{{ $mold_check_value[0][0] }}</h4> {{-- Action Done 2 --}}
                    </div>
                </div>
            </div>

            @php
                $mold_check_remarks = str_split($dieset_condition_details[0]->mold_check_remarks, 45);
            @endphp

            <div class="part2_mold_check_remarks">
                <div style="display: inline-block !important;">
                    @foreach ($mold_check_remarks as $mc_remarks)
                        <p style="width:180px;" class="text">{{ $mc_remarks }}</p> {{-- Action Done 2 --}}
                        {{-- <br> --}}
                    @endforeach
                </div>
            </div>

            <div class="part2_references_used">
                @php
                    $value_1 = '';
                    $value_2 = '';
                    $value_3 = '';
                    $value_4 = '';

                    switch($dieset_condition_details[0]->references_used){
                        case 1: $value_1 = "√"; break;
                        case 2: $value_2 = "√"; break;
                        case 3: $value_3 = "√"; break;
                        case 4: $value_4 = "√"; break;
                    }
                @endphp

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:-10px" class="check_symbol">{{ $value_1 }}</h4> {{-- Action Done 1 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:22px" class="check_symbol">{{ $value_2 }}</h4> {{-- Action Done 1 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:7.5px; margin-top:16px" class="check_symbol">{{ $value_3 }}</h4> {{-- Action Done 1 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-left:10px; margin-top:21px" class="check_symbol">{{ $value_4 }}</h4> {{-- Action Done 1 --}}
                    </div>
                </div>
            </div>

            <div class="part2_checked_by_date_time_status">
                @php
                    $mold_checked_by_arr = [];
                    if($dieset_condition_mapped_names[0]->mold_checked_by_name->name == null){
                        echo '<div class="data">&nbsp;</div>';
                    }else{
                        $mold_checked_by_name = explode(' ', $dieset_condition_mapped_names[0]->mold_checked_by_name->name);
                        $mold_checked_by_arr[] = $mold_checked_by_name[0];
                        for($mcb = 0; $mcb < count($mold_checked_by_name); $mcb++){
                            if($mcb == (count($mold_checked_by_name) - 1)){
                                $mold_checked_by_arr[] = $mold_checked_by_name[$mcb][0];
                            }
                        }
                    }
                @endphp

                <div style="display: inline-block !important;">
                    <p style="width:45px;" class="text">{{ implode(' ',$mold_checked_by_arr).'.' }}</p> {{-- Action Done 2 --}}
                </div>
                {{-- <div style="display: inline-block !important;">
                    <p style="width:80px;" class="text">{{ $dieset_condition_details[0]->mold_check_checked_by }}</p>
                </div> --}}
                <div style="display: inline-block !important;">
                    <p style="width:50px;" class="text">{{ $dieset_condition_details[0]->mold_check_date }}</p> {{-- Action Done 2 --}}
                </div>
                <div style="display: inline-block !important;">
                    <p style="width:110px;" class="text">{{ $dieset_condition_details[0]->mold_check_time }}</p> {{-- Action Done 2 --}}
                </div>
                <div style="display: inline-block !important;">
                    <p style="width:60px;" class="text">{{ $dieset_condition_details[0]->mold_check_status }}</p> {{-- Action Done 2 --}}
                </div>
            </div>

            <div class="part2_final_remarks">
                @php
                    $value_1 = '';
                    $value_2 = '';

                    switch($dieset_condition_details[0]->final_remarks){
                        case 1: $value_1 = "√"; break;
                        case 2: $value_2 = "√"; break;
                    }
                @endphp

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:109px;" class="check_symbol">{{ $value_1 }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px;" class="check_symbol">{{ $value_2 }}</h4>
                    </div>
                </div>
            </div>

            <div class="part3">
                @php
                    $value_good = '';
                    $value_ul = '';
                    $value_problematic = '';

                    if($dieset_condition_checking_details[0]->good_condition == 1){
                        $value_good = "√";
                    }
                    if($dieset_condition_checking_details[0]->under_longevity == 1){
                        $value_ul = "√";
                    }
                    if($dieset_condition_checking_details[0]->problematic_die_set == 1){
                        $value_problematic = "√";
                    }
                @endphp

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-top:-10px" class="check_symbol">{{ $value_good }}</h4>
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-top:-10px" class="check_symbol">{{ $value_ul }}</h4>
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px; margin-top:-10px" class="check_symbol">{{ $value_problematic }}</h4>
                    </div>
                </div>
            </div>

            <div class="part3_checked_by_date">
                @php
                    $part3_checked_by_arr = [];
                    if($dieset_condition_checking_mapped_names[0]->checked_by_name->name == null){
                        echo '<div class="data">&nbsp;</div>';
                    }else{
                        $part3_checked_by_name = explode(' ', $dieset_condition_checking_mapped_names[0]->checked_by_name->name);
                        $part3_checked_by_arr[] = $part3_checked_by_name[0];
                        for($pcb = 0; $pcb < count($part3_checked_by_name); $pcb++){
                            if($pcb == (count($part3_checked_by_name) - 1)){
                                $part3_checked_by_arr[] = $part3_checked_by_name[$pcb][0];
                            }
                        }
                    }
                @endphp

                <div style="display: inline-block !important;">
                    <p style="width:78px;" class="text">{{ implode(' ',$part3_checked_by_arr).'.' }}</p> {{-- Action Done 2 --}}
                </div>
                <div style="display: inline-block !important;">
                    <p style="width:60px;" class="text">{{ $dieset_condition_checking_details[0]->date }}</p> {{-- Action Done 2 --}}
                </div>
            </div>

            <div class="part4">
                @php
                    $value_first = '';
                    $value_second = '';
                    $value_third = '';

                    if($machine_setup_details[0]->first_adjustment == 1){
                        $value_first = "√";
                    }
                    if($machine_setup_details[0]->second_adjustment == 1){
                        $value_second = "√";
                    }
                    if($machine_setup_details[0]->third_adjustment == 1){
                        $value_third = "√";
                    }

                    $part4_in_charged_first = [];
                    if($machine_setup_details_mapped_name[0]->part4_first_in_charged_name->name == null){
                        echo '<div class="data">&nbsp;</div>';
                    }else{
                        $part4_first_in_charged_name = explode(' ', $machine_setup_details_mapped_name[0]->part4_first_in_charged_name->name);
                        $part4_in_charged_first[] = $part4_first_in_charged_name[0];
                        for($pcb = 0; $pcb < count($part4_first_in_charged_name); $pcb++){
                            if($pcb == (count($part4_first_in_charged_name) - 1)){
                                $part4_in_charged_first[] = $part4_first_in_charged_name[$pcb][0];
                            }
                        }
                    }

                    $part4_in_charged_second = [];
                    if($machine_setup_details_mapped_name[0]->part4_second_in_charged_name->name == null){
                        echo '<div class="data">&nbsp;</div>';
                    }else{
                        $part4_first_in_charged_name = explode(' ', $machine_setup_details_mapped_name[0]->part4_second_in_charged_name->name);
                        $part4_in_charged_second[] = $part4_first_in_charged_name[0];
                        for($pcb = 0; $pcb < count($part4_first_in_charged_name); $pcb++){
                            if($pcb == (count($part4_first_in_charged_name) - 1)){
                                $part4_in_charged_second[] = $part4_first_in_charged_name[$pcb][0];
                            }
                        }
                    }

                    $part4_in_charged_third = [];
                    if($machine_setup_details_mapped_name[0]->part4_third_in_charged_name->name == null){
                        echo '<div class="data">&nbsp;</div>';
                    }else{
                        $part4_third_in_charged_name = explode(' ', $machine_setup_details_mapped_name[0]->part4_third_in_charged_name->name);
                        $part4_in_charged_third[] = $part4_third_in_charged_name[0];
                        for($pcb = 0; $pcb < count($part4_third_in_charged_name); $pcb++){
                            if($pcb == (count($part4_third_in_charged_name) - 1)){
                                $part4_in_charged_third[] = $part4_third_in_charged_name[$pcb][0];
                            }
                        }
                    }
                @endphp

                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:90px; margin-top:-10px" class="check_symbol">{{ $value_first }}</h4>
                    </div>

                    <div style="display: inline-block !important;">
                        <p style="width:124px; margin-top:-12px" class="text">{{ implode(' ',$part4_in_charged_first).'.' }}</p> {{-- Action Done 2 --}}
                    </div>

                    <div style="display: inline-block !important;">
                        <p style="width:80px; margin-top:-12px" class="text">{{ $machine_setup_details[0]->first_date_time }}</p> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:90px; margin-top:-10px" class="check_symbol">{{ $value_second }}</h4>
                    </div>

                    <div style="display: inline-block !important;">
                        <p style="width:124px; margin-top:-12px" class="text">{{ implode(' ',$part4_in_charged_second).'.' }}</p> {{-- Action Done 2 --}}
                    </div>

                    <div style="display: inline-block !important;">
                        <p style="width:80px; margin-top:-12px" class="text">{{ $machine_setup_details[0]->second_date_time }}</p> {{-- Action Done 2 --}}
                    </div>
                </div>
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:90px; margin-top:-12px" class="check_symbol">{{ $value_third }}</h4>
                    </div>

                    <div style="display: inline-block !important;">
                        <p style="width:124px; margin-top:-14px" class="text">{{ implode(' ',$part4_in_charged_third).'.' }}</p> {{-- Action Done 2 --}}
                    </div>

                    <div style="display: inline-block !important;">
                        <p style="width:80px; margin-top:-14px" class="text">{{ $machine_setup_details[0]->third_date_time }}</p> {{-- Action Done 2 --}}
                    </div>
                </div>
            </div>

            @php
                $prod_req_details = $product_req_checking_details[0]->prod_req_checking_details;

                $p5_data_arr  = [];
                $p5_data_values = [];
                    for ($index = 0; $index < count($prod_req_details); $index++) {
                        if($prod_req_details[$index]->process_category == 1){
                            array_push($p5_data_arr,
                                $prod_req_details[$index]->eval_sample,
                                $prod_req_details[$index]->japan_sample,
                                $prod_req_details[$index]->last_prodn_sample,
                                $prod_req_details[$index]->dieset_eval_report,
                                $prod_req_details[$index]->cosmetic_defect,
                                $prod_req_details[$index]->pingauges,
                                $prod_req_details[$index]->measurescope,
                                $prod_req_details[$index]->visual_insp_result,
                                $prod_req_details[$index]->dimension_insp_result
                            );

                            $while_index = 0;
                            while($while_index < count($p5_data_arr)){
                                if($while_index == 7 || $while_index == 8){
                                    $value_1 = '';
                                    $value_0 = '';
                                    $p5_data_arr[$while_index] == 1 ? $value_1 = "√" : (($p5_data_arr[$while_index] == 0) ? $value_0 = "√" : '');
                                    $p5_data_values[$index][] = [$value_1, $value_0];
                                }else{
                                    $value = $p5_data_arr[$while_index] == 1 ? "√" : '';
                                    $p5_data_values[$index][] = $value;
                                }
                                $while_index++;
                            }
                        }else{
                            array_push($p5_data_arr,
                                $prod_req_details[$index]->eval_sample,
                                $prod_req_details[$index]->japan_sample,
                                $prod_req_details[$index]->last_prodn_sample,
                                $prod_req_details[$index]->material_drawing,
                                $prod_req_details[$index]->insp_guide,
                                $prod_req_details[$index]->dieset_eval_report,
                                $prod_req_details[$index]->cosmetic_defect,
                                $prod_req_details[$index]->pingauges,
                                $prod_req_details[$index]->measurescope,
                                $prod_req_details[$index]->visual_insp_result,
                                $prod_req_details[$index]->dimension_insp_result
                            );

                            $while_index = 0;
                            while($while_index < count($p5_data_arr)){
                                if($while_index == 9 || $while_index == 10){
                                    $value_1 = '';
                                    $value_0 = '';
                                    $p5_data_arr[$while_index] == 1 ? $value_1 = "√" : (($p5_data_arr[$while_index] == 0) ? $value_0 = "√" : '');
                                    $p5_data_values[$index][] = [$value_1, $value_0];
                                }else{
                                    $value = $p5_data_arr[$while_index] == 1 ? "√" : '';
                                    $p5_data_values[$index][] = $value;
                                }
                                $while_index++;
                            }
                        }
                    }
            @endphp

            <div class="part5_prod">
                <!-- #1 -->
                <div>
                    <h4 style="width:74px; margin-top:-4px" class="check_symbol">{{ $p5_data_values[0][0] }}</h4> {{-- Action Done 1 --}}
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[0][1] }}</h4> {{-- Action Done 3 --}}
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[0][2] }}</h4> {{-- Action Done 3 --}}
                </div>
                    <br> <!-- line break -->
                <!-- #2 -->
                <div>
                    <h4 style="width:74px; margin-top:-10px" class="check_symbol">{{ $p5_data_values[0][3] }}</h4> {{-- Action Done 3 --}}
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[0][4] }}</h4> {{-- Action Done 3 --}}
                </div>
                <!-- #3 -->
                <div>
                    <h4 style="width:74px; margin-top:65px" class="check_symbol">{{ $p5_data_values[0][5] }}</h4> {{-- Action Done 3 --}}
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[0][6] }}</h4> {{-- Action Done 3 --}}
                </div>
            </div>

            <div class="part5_prod_activity_details">
                    @php
                        $visual_insp_name_arr = [];
                        $dimension_insp_name_arr = [];

                        for($index = 0; $index < count($p5_mapped_names_arr); $index++){
                            if($p5_mapped_names_arr[$index][0] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $visual_insp_name = explode(' ', $p5_mapped_names_arr[$index][0]);
                                $visual_insp_name_arr[$index][] = $visual_insp_name[0];
                                for($vin = 0; $vin < count($visual_insp_name); $vin++){
                                    if($vin == (count($visual_insp_name) - 1)){
                                        $visual_insp_name_arr[$index][] = $visual_insp_name[$vin][0];
                                    }
                                }
                            }

                            if($p5_mapped_names_arr[$index][1] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $dimension_insp_name = explode(' ', $p5_mapped_names_arr[$index][1]);
                                $dimension_insp_name_arr[$index][] = $dimension_insp_name[1];
                                for($din = 0; $din < count($dimension_insp_name); $din++){
                                    if($din == (count($dimension_insp_name) - 1)){
                                        $dimension_insp_name_arr[$index][] = $dimension_insp_name[$din][0];
                                    }
                                }
                            }
                        }

                        $visual_insp_date_time_arr = [];
                        $vi_datetime = explode(' ', $prod_req_details[0]->visual_insp_datetime);
                        $vi_date = explode('-', $vi_datetime[0]);
                        $trimmed_year = substr($vi_date[0], 2);
                        $visual_insp_date_time_arr[] = $vi_date[1].'/'.$vi_date[2].'/'.$trimmed_year;
                        $vi_time = explode(':', $vi_datetime[1]);
                        $visual_insp_date_time_arr[] = $vi_time[0].':'.$vi_time[1];

                        $dimension_insp_date_time_arr = [];
                        $di_datetime = explode(' ', $prod_req_details[0]->dimension_insp_datetime);
                        $di_date = explode('-', $di_datetime[0]);
                        $trimmed_year = substr($di_date[0], 2);
                        $dimension_insp_date_time_arr[] = $di_date[1].'/'.$di_date[2].'/'.$trimmed_year;
                        $di_time = explode(':', $di_datetime[1]);
                        $dimension_insp_date_time_arr[] = $di_time[0].':'.$di_time[1];

                        $actual_checking_remarks = str_split($prod_req_details[0]->actual_checking_remarks, 45);
                    @endphp
                <div>
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part5_text">{{ implode(' ',$visual_insp_name_arr[0]).'. /'.implode(' ',$visual_insp_date_time_arr) }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][7][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][7][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-07px">
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part5_text">{{ implode(' ',$dimension_insp_name_arr[0]).'. /'.implode(' ',$dimension_insp_date_time_arr) }}</p>
                    </div>

                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][8][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][8][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-03px">
                    <div style="display: inline-block !important;">
                        @foreach ($actual_checking_remarks as $ac_remarks)
                            <h4 style="width:30px;" class="part5_text">{{ $ac_remarks }}</h4>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="part5_engr">
                <!-- #1 -->
                <div>
                    <h4 style="width:74px; margin-top:-4px" class="check_symbol">{{ $p5_data_values[1][0] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][1] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][2] }}</h4>
                </div>
                    <br> <!-- line break -->
                <!-- #2 -->
                <div>
                    <h4 style="width:74px; margin-top:-10px" class="check_symbol">{{ $p5_data_values[1][3] }}</h4>
                </div>

                <div style="margin-top:0px">
                    <div style="display: inline-block !important;">
                        <h4 style="width:85px; margin-left:29px" class="part5_text">{{ $prod_req_details[1]->material_drawing_no }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:50px;" class="part5_text">{{ $prod_req_details[1]->material_rev_no }}</h4>
                    </div>
                </div>
                <div>
                    <h4 style="width:74px; margin-top:-09px" class="check_symbol">{{ $p5_data_values[1][4] }}</h4>
                </div>

                <div style="margin-top:0px">
                    <div style="display: inline-block !important;">
                        <h4 style="width:85px; margin-left:29px" class="part5_text">{{ $prod_req_details[1]->insp_guide_drawing_no }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:50px;" class="part5_text">{{ $prod_req_details[1]->insp_guide_rev_no }}</h4>
                    </div>
                </div>
                <div>
                    <h4 style="width:74px; margin-top:10px" class="check_symbol">{{ $p5_data_values[1][5] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][6] }}</h4>
                </div>
                <!-- #3 -->
                <div>
                    <h4 style="width:74px;" class="check_symbol">{{ $p5_data_values[1][7] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][8] }}</h4>
                </div>
            </div>

            <div class="part5_engr_activity_details">
                    @php
                        $visual_insp_name_arr = [];
                        $dimension_insp_name_arr = [];

                        for($index = 0; $index < count($p5_mapped_names_arr); $index++){
                            if($p5_mapped_names_arr[$index][0] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $visual_insp_name = explode(' ', $p5_mapped_names_arr[$index][0]);
                                $visual_insp_name_arr[$index][] = $visual_insp_name[0];
                                for($vin = 0; $vin < count($visual_insp_name); $vin++){
                                    if($vin == (count($visual_insp_name) - 1)){
                                        $visual_insp_name_arr[$index][] = $visual_insp_name[$vin][0];
                                    }
                                }
                            }

                            if($p5_mapped_names_arr[$index][1] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $dimension_insp_name = explode(' ', $p5_mapped_names_arr[$index][1]);
                                $dimension_insp_name_arr[$index][] = $dimension_insp_name[1];
                                for($din = 0; $din < count($dimension_insp_name); $din++){
                                    if($din == (count($dimension_insp_name) - 1)){
                                        $dimension_insp_name_arr[$index][] = $dimension_insp_name[$din][0];
                                    }
                                }
                            }
                        }

                        $visual_insp_date_time_arr = [];
                        $vi_datetime = explode(' ', $prod_req_details[1]->visual_insp_datetime);
                        $vi_date = explode('-', $vi_datetime[0]);
                        $trimmed_year = substr($vi_date[0], 2);
                        $visual_insp_date_time_arr[] = $vi_date[1].'/'.$vi_date[2].'/'.$trimmed_year;
                        $vi_time = explode(':', $vi_datetime[1]);
                        $visual_insp_date_time_arr[] = $vi_time[0].':'.$vi_time[1];

                        $dimension_insp_date_time_arr = [];
                        $di_datetime = explode(' ', $prod_req_details[1]->dimension_insp_datetime);
                        $di_date = explode('-', $di_datetime[0]);
                        $trimmed_year = substr($di_date[0], 2);
                        $dimension_insp_date_time_arr[] = $di_date[1].'/'.$di_date[2].'/'.$trimmed_year;
                        $di_time = explode(':', $di_datetime[1]);
                        $dimension_insp_date_time_arr[] = $di_time[0].':'.$di_time[1];

                        $actual_checking_remarks = str_split($prod_req_details[1]->actual_checking_remarks, 45);
                    @endphp
                <div>
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part5_text">{{ implode(' ',$visual_insp_name_arr[1]).'. /'.implode(' ',$visual_insp_date_time_arr) }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[1][9][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[1][9][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-07px">
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part5_text">{{ implode(' ',$dimension_insp_name_arr[1]).'. /'.implode(' ',$dimension_insp_date_time_arr) }}</p>
                    </div>

                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[1][10][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[1][10][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-03px">
                    <div style="display: inline-block !important;">
                        @foreach ($actual_checking_remarks as $ac_remarks)
                            <h4 style="width:30px;" class="part5_text">{{ $ac_remarks }}</h4>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="part5_qc">
                <!-- #1 -->
                <div>
                    <h4 style="width:74px; margin-top:-4px" class="check_symbol">{{ $p5_data_values[2][0] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[2][1] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[2][2] }}</h4>
                </div>
                    <br> <!-- line break -->
                <!-- #2 -->
                <div>
                    <h4 style="width:74px; margin-top:-10px" class="check_symbol">{{ $p5_data_values[2][3] }}</h4>
                </div>

                <div style="margin-top:0px">
                    <div style="display: inline-block !important;">
                        <h4 style="width:85px; margin-left:29px" class="part5_text">{{ $prod_req_details[2]->material_drawing_no }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:50px;" class="part5_text">{{ $prod_req_details[2]->material_rev_no }}</h4>
                    </div>
                </div>
                <div>
                    <h4 style="width:74px; margin-top:-09px" class="check_symbol">{{ $p5_data_values[2][4] }}</h4>
                </div>

                <div style="margin-top:0px">
                    <div style="display: inline-block !important;">
                        <h4 style="width:85px; margin-left:29px" class="part5_text">{{ $prod_req_details[2]->insp_guide_drawing_no }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:50px;" class="part5_text">{{ $prod_req_details[2]->insp_guide_rev_no }}</h4>
                    </div>
                </div>
                <div>
                    <h4 style="width:74px; margin-top:10px" class="check_symbol">{{ $p5_data_values[2][5] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[2][6] }}</h4>
                </div>
                <!-- #3 -->
                <div>
                    <h4 style="width:74px;" class="check_symbol">{{ $p5_data_values[2][7] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[2][8] }}</h4>
                </div>
            </div>

            <div class="part5_qc_activity_details">
                    @php
                        $visual_insp_name_arr = [];
                        $dimension_insp_name_arr = [];

                        for($index = 0; $index < count($p5_mapped_names_arr); $index++){
                            if($p5_mapped_names_arr[$index][0] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $visual_insp_name = explode(' ', $p5_mapped_names_arr[$index][0]);
                                $visual_insp_name_arr[$index][] = $visual_insp_name[0];
                                for($vin = 0; $vin < count($visual_insp_name); $vin++){
                                    if($vin == (count($visual_insp_name) - 1)){
                                        $visual_insp_name_arr[$index][] = $visual_insp_name[$vin][0];
                                    }
                                }
                            }

                            if($p5_mapped_names_arr[$index][1] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $dimension_insp_name = explode(' ', $p5_mapped_names_arr[$index][1]);
                                $dimension_insp_name_arr[$index][] = $dimension_insp_name[1];
                                for($din = 0; $din < count($dimension_insp_name); $din++){
                                    if($din == (count($dimension_insp_name) - 1)){
                                        $dimension_insp_name_arr[$index][] = $dimension_insp_name[$din][0];
                                    }
                                }
                            }
                        }

                        $visual_insp_date_time_arr = [];
                        $vi_datetime = explode(' ', $prod_req_details[0]->visual_insp_datetime);
                        $vi_date = explode('-', $vi_datetime[0]);
                        $trimmed_year = substr($vi_date[0], 2);
                        $visual_insp_date_time_arr[] = $vi_date[1].'/'.$vi_date[2].'/'.$trimmed_year;
                        $vi_time = explode(':', $vi_datetime[1]);
                        $visual_insp_date_time_arr[] = $vi_time[0].':'.$vi_time[1];

                        $dimension_insp_date_time_arr = [];
                        $di_datetime = explode(' ', $prod_req_details[0]->dimension_insp_datetime);
                        $di_date = explode('-', $di_datetime[0]);
                        $trimmed_year = substr($di_date[0], 2);
                        $dimension_insp_date_time_arr[] = $di_date[1].'/'.$di_date[2].'/'.$trimmed_year;
                        $di_time = explode(':', $di_datetime[1]);
                        $dimension_insp_date_time_arr[] = $di_time[0].':'.$di_time[1];

                        $actual_checking_remarks = str_split($prod_req_details[0]->actual_checking_remarks, 45);
                    @endphp
                <div>
                    <div style="display: inline-block !important;">
                        <p style="width:138px;" class="part5_text">{{ implode(' ',$visual_insp_name_arr[0]).'. /'.implode(' ',$visual_insp_date_time_arr) }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px;" class="check_symbol">{{ $p5_data_values[0][7][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][7][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-07px">
                    <div style="display: inline-block !important;">
                        <p style="width:138px;" class="part5_text">{{ implode(' ',$dimension_insp_name_arr[0]).'. /'.implode(' ',$dimension_insp_date_time_arr) }}</p>
                    </div>

                    <div style="display: inline-block !important;">
                        <h4 style="width:25px;" class="check_symbol">{{ $p5_data_values[0][8][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][8][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-03px">
                    <div style="display: inline-block !important;">
                        @foreach ($actual_checking_remarks as $ac_remarks)
                            <h4 style="width:30px;" class="part5_text">{{ $ac_remarks }}</h4>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="part5_process_engr">
                <!-- #1 -->
                <div>
                    <h4 style="width:74px; margin-top:-4px" class="check_symbol">{{ $p5_data_values[1][0] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][1] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][2] }}</h4>
                </div>
                    <br> <!-- line break -->
                <!-- #2 -->
                <div>
                    <h4 style="width:74px; margin-top:-10px" class="check_symbol">{{ $p5_data_values[1][3] }}</h4>
                </div>

                <div style="margin-top:0px">
                    <div style="display: inline-block !important;">
                        <h4 style="width:80px; margin-left:30px" class="part5_text">{{ $prod_req_details[1]->material_drawing_no }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px;" class="part5_text">{{ $prod_req_details[1]->material_rev_no }}</h4>
                    </div>
                </div>
                <div>
                    <h4 style="width:74px; margin-top:-09px" class="check_symbol">{{ $p5_data_values[1][4] }}</h4>
                </div>

                <div style="margin-top:0px">
                    <div style="display: inline-block !important;">
                        <h4 style="width:80px; margin-left:30px" class="part5_text">{{ $prod_req_details[1]->insp_guide_drawing_no }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px;" class="part5_text">{{ $prod_req_details[1]->insp_guide_rev_no }}</h4>
                    </div>
                </div>
                <div>
                    <h4 style="width:74px; margin-top:10px" class="check_symbol">{{ $p5_data_values[1][5] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][6] }}</h4>
                </div>
                <!-- #3 -->
                <div>
                    <h4 style="width:74px;" class="check_symbol">{{ $p5_data_values[1][7] }}</h4>
                </div>
                    <br> <!-- line break -->
                <div>
                    <h4 style="width:74px; margin-top:-21px" class="check_symbol">{{ $p5_data_values[1][8] }}</h4>
                </div>
            </div>

            <div class="part5_process_engr_activity_details">
                    @php
                        $visual_insp_name_arr = [];
                        $dimension_insp_name_arr = [];

                        for($index = 0; $index < count($p5_mapped_names_arr); $index++){
                            if($p5_mapped_names_arr[$index][0] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $visual_insp_name = explode(' ', $p5_mapped_names_arr[$index][0]);
                                $visual_insp_name_arr[$index][] = $visual_insp_name[0];
                                for($vin = 0; $vin < count($visual_insp_name); $vin++){
                                    if($vin == (count($visual_insp_name) - 1)){
                                        $visual_insp_name_arr[$index][] = $visual_insp_name[$vin][0];
                                    }
                                }
                            }

                            if($p5_mapped_names_arr[$index][1] == null){
                                echo '<div class="data">&nbsp;</div>';
                            }else{
                                $dimension_insp_name = explode(' ', $p5_mapped_names_arr[$index][1]);
                                $dimension_insp_name_arr[$index][] = $dimension_insp_name[1];
                                for($din = 0; $din < count($dimension_insp_name); $din++){
                                    if($din == (count($dimension_insp_name) - 1)){
                                        $dimension_insp_name_arr[$index][] = $dimension_insp_name[$din][0];
                                    }
                                }
                            }
                        }

                        $visual_insp_date_time_arr = [];
                        $vi_datetime = explode(' ', $prod_req_details[0]->visual_insp_datetime);
                        $vi_date = explode('-', $vi_datetime[0]);
                        $trimmed_year = substr($vi_date[0], 2);
                        $visual_insp_date_time_arr[] = $vi_date[1].'/'.$vi_date[2].'/'.$trimmed_year;
                        $vi_time = explode(':', $vi_datetime[1]);
                        $visual_insp_date_time_arr[] = $vi_time[0].':'.$vi_time[1];

                        $dimension_insp_date_time_arr = [];
                        $di_datetime = explode(' ', $prod_req_details[0]->dimension_insp_datetime);
                        $di_date = explode('-', $di_datetime[0]);
                        $trimmed_year = substr($di_date[0], 2);
                        $dimension_insp_date_time_arr[] = $di_date[1].'/'.$di_date[2].'/'.$trimmed_year;
                        $di_time = explode(':', $di_datetime[1]);
                        $dimension_insp_date_time_arr[] = $di_time[0].':'.$di_time[1];

                        $actual_checking_remarks = str_split($prod_req_details[0]->actual_checking_remarks, 45);
                    @endphp
                <div>
                    <div style="display: inline-block !important;">
                        <p style="width:98px;" class="part5_text">{{ implode(' ',$visual_insp_name_arr[0]).'. /'.implode(' ',$visual_insp_date_time_arr) }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:36px;" class="check_symbol">{{ $p5_data_values[0][7][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][7][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-07px">
                    <div style="display: inline-block !important;">
                        <p style="width:98px;" class="part5_text">{{ implode(' ',$dimension_insp_name_arr[0]).'. /'.implode(' ',$dimension_insp_date_time_arr) }}</p>
                    </div>

                    <div style="display: inline-block !important;">
                        <h4 style="width:36px;" class="check_symbol">{{ $p5_data_values[0][8][0] }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px;" class="check_symbol">{{ $p5_data_values[0][8][0] }}</h4>
                    </div>
                </div>
                <div style="margin-top:-03px">
                    <div style="display: inline-block !important;">
                        @foreach ($actual_checking_remarks as $ac_remarks)
                            <h4 style="width:30px;" class="part5_text">{{ $ac_remarks }}</h4>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="part5_machine_setup_samples">
                @php
                    $mss_name_arr = [];
                    if($p5_machine_setup_sample_names_arr != []){
                        for($index = 0; $index < count($p5_machine_setup_sample_names_arr); $index++){
                            if($p5_machine_setup_sample_names_arr[$index]['name'] == null || $p5_machine_setup_sample_names_arr[$index]['name'] == 'N/A'){
                                $mss_name_arr[$index][] = 'N/A';
                            }else{
                                $mss_name = explode(' ', $p5_machine_setup_sample_names_arr[$index]['name']);
                                $mss_name_arr[$index][] = $mss_name[0];
                                $mss_name_arr[$index][] = $mss_name[(count($mss_name) - 1)][0];
                            }
                        }
                    }else{
                        $p5_machine_setup_sample_names_arr = 'N/A';
                    }

                    $machine_setup_sample_dates = [
                        $machine_setup_sample_details->pic_datetime,
                        $machine_setup_sample_details->engr_datetime,
                        $machine_setup_sample_details->qc_datetime,
                    ];

                    $mss_date_arr = [];
                    $index = 0;
                    while ($index < count($machine_setup_sample_dates)) {
                        $mss_datetime = explode(' ', $machine_setup_sample_dates[$index]);
                        $mss_date = explode('-', $mss_datetime[0]);
                        $trimmed_year = substr($mss_date[0], 2);
                        $mss_date_arr[$index] = $mss_date[1].'/'.$mss_date[2].'/'.$trimmed_year;
                        $index++;
                    }

                @endphp

                <div>
                    <h4 style="width:23px; margin-left:86px;" class="check_symbol">{{ $machine_setup_sample_details->number_of_shots == 1 ? "√" : '' }}</h4>
                </div>
                <div>
                    <h4 style="width:53px; margin-left:86px; margin-top:-02px;" class="part6_text">{{ $machine_setup_sample_details->actual_quantity }}</h4>
                </div>
                <div>
                    <h4 style="width:23px; margin-top:-05px; margin-left:46px;" class="check_symbol">{{ $machine_setup_sample_details->judgement == 1 ? "√" : '' }}</h4>
                </div>
                    <br><br>
                <div>
                    <h4 style="width:23px; margin-top:5px; margin-left:-01px;" class="check_symbol">{{ $machine_setup_sample_details->machine_parts == 1 ? "√" : '' }}</h4>
                </div>
                <div>
                    <h4 style="width:23px; margin-left:-01px;" class="check_symbol">{{ $machine_setup_sample_details->output_path == 1 ? "√" : '' }}</h4>
                </div>
                <div>
                    <h4 style="width:23px; margin-left:-01px;" class="check_symbol">{{ $machine_setup_sample_details->product_catcher == 1 ? "√" : '' }}</h4>
                </div>

                <div style="margin-left:8px; margin-top:5px;">
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part6_text">{{ implode(' ',$mss_name_arr[0]).'.'}}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:50px;" class="part6_text">{{ $mss_date_arr[0] }}</p>
                    </div>
                </div>

                <div style="margin-left:8px; margin-top:11px;">
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part6_text">{{ implode(' ',$mss_name_arr[1]).'.'}}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:50px;" class="part6_text">{{ $mss_date_arr[1] }}</p>
                    </div>
                </div>

                <div style="margin-left:18px; margin-top:0px;">
                    <div style="display: inline-block !important;">
                        <p style="width:90px;" class="part6_text">{{ implode(' ',$mss_name_arr[2]).'.'}}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:50px;" class="part6_text">{{ $mss_date_arr[2] }}</p>
                    </div>
                </div>
            </div>

            <div class="part6_reference">
                <div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:133px;" class="check_symbol">{{ $machine_param_checking_details->reference == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:25px;" class="check_symbol">{{ $machine_param_checking_details->reference == 2 ? "√" : '' }}</h4>
                    </div>
                </div>
            </div>

            <div class="part6_details">
                @php
                    $engr_name_arr = [];
                    $qc_name_arr = [];

                    if($p6_mapped_names_arr != []){
                        for($index = 0; $index < count($p6_mapped_names_arr); $index++){
                            if($p6_mapped_names_arr[$index][0]['name'] == null || $p6_mapped_names_arr[$index][0]['name'] == 'N/A'){ //ENGR
                                $engr_name_arr[$index][] = 'N/A';
                            }else{
                                $engr_name = explode(' ', $p6_mapped_names_arr[$index][0]['name']);
                                $engr_name_arr[$index][] = $engr_name[0];
                                $engr_name_arr[$index][] = $engr_name[(count($engr_name) - 1)][0];
                            }

                            if($p6_mapped_names_arr[$index][1]['name'] == null || $p6_mapped_names_arr[$index][1]['name'] == 'N/A'){ //QC
                                $qc_name_arr[$index][] = 'N/A';
                            }else{
                                $qc_name = explode(' ', $p6_mapped_names_arr[$index][1]['name']);
                                $qc_name_arr[$index][] = $qc_name[0];
                                $qc_name_arr[$index][] = $qc_name[(count($qc_name) - 1)][0];
                            }
                        }
                    }

                    $machine_param_checking_date_arr = [
                        [$machine_param_checking_details->pressure_engr_date, $machine_param_checking_details->pressure_qc_date],
                        [$machine_param_checking_details->temp_nozzle_engr_date, $machine_param_checking_details->temp_nozzle_qc_date],
                        [$machine_param_checking_details->temp_mold_engr_date, $machine_param_checking_details->temp_mold_qc_date],
                        [$machine_param_checking_details->cooling_time_engr_date, $machine_param_checking_details->cooling_time_qc_date],
                    ];

                @endphp

                <div><!-- Pressure -->
                    <div style="display: inline-block !important;">
                        <h4 style="width:53px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_std_specs }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px ;"class="check_symbol">{{ $machine_param_checking_details->pressure_engr_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px;" class="check_symbol">{{ $machine_param_checking_details->pressure_engr_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:85px;" class="part6_text">{{ implode(' ',$engr_name_arr[0]).'. / '.$machine_param_checking_date_arr[0][0] }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:93px;" class="part6_text">{{ $machine_param_checking_details->pressure_qc_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px ;"class="check_symbol">{{ $machine_param_checking_details->pressure_qc_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px;" class="check_symbol">{{ $machine_param_checking_details->pressure_qc_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:98px;" class="part6_text">{{ implode(' ',$qc_name_arr[0]).'. / '.$machine_param_checking_date_arr[0][1] }}</p>
                    </div>
                </div>
                <div style="margin-top:-09px"><!-- Temp Nozzle -->
                    <div style="display: inline-block !important;">
                        <h4 style="width:53px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_std_specs }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px ;"class="check_symbol">{{ $machine_param_checking_details->temp_nozzle_engr_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px;" class="check_symbol">{{ $machine_param_checking_details->temp_nozzle_engr_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:85px;" class="part6_text">{{ implode(' ',$engr_name_arr[1]).'. / '.$machine_param_checking_date_arr[1][0] }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:93px;" class="part6_text">{{ $machine_param_checking_details->pressure_qc_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px ;"class="check_symbol">{{ $machine_param_checking_details->temp_nozzle_qc_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px;" class="check_symbol">{{ $machine_param_checking_details->temp_nozzle_qc_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:98px;" class="part6_text">{{ implode(' ',$qc_name_arr[1]).'. / '.$machine_param_checking_date_arr[1][1] }}</p>
                    </div>
                </div>
                <div style="margin-top:-09px"><!-- Temp Mold -->
                    <div style="display: inline-block !important;">
                        <h4 style="width:53px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_std_specs }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px ;"class="check_symbol">{{ $machine_param_checking_details->temp_mold_engr_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px;" class="check_symbol">{{ $machine_param_checking_details->temp_mold_engr_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:85px;" class="part6_text">{{ implode(' ',$engr_name_arr[2]).'. / '.$machine_param_checking_date_arr[2][1] }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:93px;" class="part6_text">{{ $machine_param_checking_details->pressure_qc_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px ;"class="check_symbol">{{ $machine_param_checking_details->temp_mold_qc_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px;" class="check_symbol">{{ $machine_param_checking_details->temp_mold_qc_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:98px;" class="part6_text">{{ implode(' ',$qc_name_arr[2]).'. / '.$machine_param_checking_date_arr[2][1] }}</p>
                    </div>
                </div>
                <div style="margin-top:-09px"><!-- Cooling Time -->
                    <div style="display: inline-block !important;">
                        <h4 style="width:53px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_std_specs }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px;" class="part6_text">{{ $machine_param_checking_details->pressure_engr_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:30px ;"class="check_symbol">{{ $machine_param_checking_details->cooling_time_engr_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:23px;" class="check_symbol">{{ $machine_param_checking_details->cooling_time_engr_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:85px;" class="part6_text">{{ implode(' ',$engr_name_arr[3]).'. / '.$machine_param_checking_date_arr[3][0] }}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:93px;" class="part6_text">{{ $machine_param_checking_details->pressure_qc_actual }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:45px ;"class="check_symbol">{{ $machine_param_checking_details->cooling_time_qc_result == 1 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <h4 style="width:20px;" class="check_symbol">{{ $machine_param_checking_details->cooling_time_qc_result == 0 ? "√" : '' }}</h4>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:98px;" class="part6_text">{{ implode(' ',$qc_name_arr[3]).'. / '.$machine_param_checking_date_arr[3][1] }}</p>
                    </div>
                </div>
            </div>

            <div class="part7_specifications">
                {{-- @php
                    $mss_name_arr = [];
                    if($p5_machine_setup_sample_names_arr != []){
                        for($index = 0; $index < count($p5_machine_setup_sample_names_arr); $index++){
                            if($p5_machine_setup_sample_names_arr[$index]['name'] == null || $p5_machine_setup_sample_names_arr[$index]['name'] == 'N/A'){
                                $mss_name_arr[$index][] = 'N/A';
                            }else{
                                $mss_name = explode(' ', $p5_machine_setup_sample_names_arr[$index]['name']);
                                $mss_name_arr[$index][] = $mss_name[0];
                                $mss_name_arr[$index][] = $mss_name[(count($mss_name) - 1)][0];
                            }
                        }
                    }else{
                        $p5_machine_setup_sample_names_arr = 'N/A';
                    }

                    $machine_setup_sample_dates = [
                        $machine_setup_sample_details->pic_datetime,
                        $machine_setup_sample_details->engr_datetime,
                        $machine_setup_sample_details->qc_datetime,
                    ];

                    $mss_date_arr = [];
                    $index = 0;
                    while ($index < count($machine_setup_sample_dates)) {
                        $mss_datetime = explode(' ', $machine_setup_sample_dates[$index]);
                        $mss_date = explode('-', $mss_datetime[0]);
                        $trimmed_year = substr($mss_date[0], 2);
                        $mss_date_arr[$index] = $mss_date[1].'/'.$mss_date[2].'/'.$trimmed_year;
                        $index++;
                    }

                @endphp --}}

                <div>
                    <h4 style="width:23px;" class="check_symbol">{{ $specification_details->ng_issued_ptnr == 1 ? "√" : '' }}</h4>
                </div>
                <div>
                    <h4 style="width:23px; margin-top:-09px;" class="check_symbol">{{ $specification_details->ng_coordinate_to_ts_cn_assembly == 1 ? "√" : '' }}</h4>
                </div>
                    <br><br>
                <div>
                    <h4 style="width:23px; margin-top:-34px;"class="check_symbol">{{ $specification_details->ng_discussion_w_tech_adviser == 1 ? "√" : '' }}</h4>
                </div>
                <div>
                    <h4 style="width:23px; margin-top:-10px; margin-left:2px;" class="check_symbol">{{ $specification_details->ng_go_production == 1 ? "√" : '' }}</h4>
                </div>
                <div>
                    <h4 style="width:23px; margin-top:-10px; margin-left:2px;" class="check_symbol">{{ $specification_details->ng_stop_production == 1 ? "√" : '' }}</h4>
                </div>

                <div style="margin-left:8px; margin-top:5px;">
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part6_text">{{ implode(' ',$mss_name_arr[0]).'.'}}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:50px;" class="part6_text">{{ $mss_date_arr[0] }}</p>
                    </div>
                </div>

                {{-- <div style="margin-left:8px; margin-top:11px;">
                    <div style="display: inline-block !important;">
                        <p style="width:100px;" class="part6_text">{{ implode(' ',$mss_name_arr[1]).'.'}}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:50px;" class="part6_text">{{ $mss_date_arr[1] }}</p>
                    </div>
                </div>

                <div style="margin-left:18px; margin-top:0px;">
                    <div style="display: inline-block !important;">
                        <p style="width:90px;" class="part6_text">{{ implode(' ',$mss_name_arr[2]).'.'}}</p>
                    </div>
                    <div style="display: inline-block !important;">
                        <p style="width:50px;" class="part6_text">{{ $mss_date_arr[2] }}</p>
                    </div>
                </div> --}}
            </div>

            <div class="page-break"></div>
            <img src="<?php echo $base641 ?>" width="100%" height="100%"/>
        </div>
    </body>
</html>
