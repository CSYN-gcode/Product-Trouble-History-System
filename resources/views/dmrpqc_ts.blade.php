@php $layout = 'layouts.super_user_layout'; @endphp

{{-- Here I removed the @auth because the dashboard isn't loading properly --}}
    @extends($layout)
    @section('title', 'Product Identification(PPS-TS)')

    @section('content_page')
    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <h4>Die set Maintenance Runcard & Product Qualification Checksheet</h4>
              </div>
            </div>
          </div>
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Die-set Maintenance Preparation Requests</h3>
                        <button class="btn btn-dark btn-sm" style="float: right;" id="btnShowAddRequest"><i class="fa fa-plus"></i> New Prepartion Request</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="float-sm-left mb-4 col-1">
                                <button class="btn btn-info btn-outline-dark border-0" data-bs-toggle="modal" data-bs-target="#modalAdvancedSearch" id=""><i class="fas fa-search fa-md"></i> Advanced Search</button>
                            </div>

                            <div class="float-sm-left mb-4 col-2">
                                {{-- <form id="frmSearchYear" class="form-inline"> --}}
                                    <label><strong>Filter Year : &nbsp;</strong></label>
                                    <input type="text" id="SearchYear" class="form-control" name="year" value="<?php echo date('Y'); ?>">

                                    {{-- <button class="btn btn-primary" type="submit">Search</button> --}}
                                {{-- </form> --}}

                            {{-- <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAdvancedSearch" id=""><i class="fas fa-search fa-md"></i> Advanced Search</button> --}}
                            </div>

                            <div class="float-sm-left mb-3 col-2">
                                <label><strong>Month :</strong></label>
                                <select class="form-control selectMonth" name="month_value" id="SelectMonth">
                                    <option value="<?php echo date('m'); ?>" readonly><?php echo date('F'); ?></option><!-- selected -->
                                    <option value="" selected>All</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-sm table-bordered text-center table-hover" id="tbl_dmrpqc" style="min-width: 900px;">
                                <thead>
                                    <tr class="bg-light">
                                        <th style="width: 10%;">Action</th>
                                        <th style="width: 8%;">Status</th>
                                        <th style="width: 8%;">Process</th>
                                        <th style="width: 15%;">Device Name</th>
                                        <th style="width: 15%;">PO No.</th>
                                        <th style="width: 10%;">Item Code</th>
                                        <th style="width: 12%;">Request Type</th>
                                        {{-- <th>Request By</th> --}}
                                        <th style="width: 10%;">Date/Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <div class="modal fade" id="modalProdIdentification" tabindex="-1" role="dialog" aria-labelledby="cnptsmodal" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-xl modal-xl-custom modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" style="text-align: center"> Die set Maintenance Runcard & Product Qualification Checksheet </h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form id="frm_prod_identification" method="post">
                  @csrf
                  <div class="modal-body">
                    {{-- <div class="row d-none"> --}}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">Global ID</span>
                                </div>
                                <input type="text" name="global_dmrpqc_id" id="txt_global_dmrpqc_id" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">Process Status</span>
                                </div>
                                <input type="text" name="global_status" id="txt_global_status" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">User ID</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="user_id" id="txt_user_id" readonly>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">User Name</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="user_name" id="txt_user_name" readonly>
                            </div>
                        </div>
                    </div>

                        <div class="accordion" id="accordionMain">
                            {{-- <h5 class="modal-title"> I. Product Identification & Drawing Revision Checking <strong>(Responsible:Machine Operator)</strong></h5> --}}
                            <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5 class="modal-title"> I. Product Identification & Drawing Revision Checking <strong>(Responsible:Production Operator)</strong></h5>
                            </button>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                                <div class="row"><!-- 1st row -->
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100" id="basic-addon1">Device Name</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="frm_txt_device_name" name="device_name" style="color: blue; font-weight: bold;" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100" id="basic-addon1">Item Code</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="frm_txt_item_code" name="item_code" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100" id="basic-addon1">Rev No.</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="frm_txt_rev_no" name="rev_no" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100" id="basic-addon1">Drawing No.</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="frm_txt_drawing_no" name="drawing_no" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row"><!-- 2nd row -->

                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100 bg-primary" id="basic-addon1">P.O #: (Press Enter to Search)</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="frm_txt_po_no" name="po_no" placeholder="Insert PO Number">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100 bg-primary" id="basic-addon1">Request Type</span>
                                            </div>
                                                <select class="form-control" type="text" name="request_type" id="frm_request_type">
                                                    <option value="" disabled selected>Select Request type</option>
                                                    <option value="1">For Maintenance</option>
                                                    <option value="2">Temporary Stop</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100" id="basic-addon1">Die No.</span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" id="frm_txt_die_no" name="die_no" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-50">
                                                <span class="input-group-text w-100" id="basic-addon1">Date/Time</span>
                                            </div>
                                            <input class="form-control form-control-sm" id="frm_txt_start_datetime" name="txt_start_datetime" placeholder="(Auto Generate)" readonly>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-sm mb-2">
                                            <div class="input-group-prepend w-30">
                                                <p class="input-group-text" id="basic-addon1">Drawing & rev# validation:<strong>(Responsible:Machine Operator)</strong></p>
                                            </div>
                                            <p class="input-group-text" id="basic-addon1">Using PO balance from PPC with drawing & rev#, compare it versus RAPID.</p>
                                            <p class="input-group-text" id="basic-addon1">if not tally, inform Supervisor & do not proceed the production </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Part2"><!-- PART II Division Start-->
                                    {{-- <h5 class="modal-title">II. Dieset Condition <strong>(Responsible:Die Maintenance Engineering)</strong></h5> --}}
                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5 class="modal-title">II. Dieset Condition <strong>(Responsible:Die Maintenance Engineering)</strong></h5>
                                    </button>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                                        <div class="row col-sm-12">
                                            <div class="col-sm-3 border border-right-0 border-bottom-0 border-dark"  id="action_done_div">
                                                <strong><label class="form-check-label"> Action Done </label></strong>
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tbl_action_done" class="table table-sm table-borderless table-hover display nowrap" style="width: 100%;">
                                                        {{-- table-borderless --}}
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 0" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data ActionDoneChckbox" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> 1. Mold Cleaned</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data ActionDoneChckbox" type="checkbox" index="1.1" name="action_2" id="frm_txt_action_2" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> 2. Mold Check</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25">
                                                                    {{-- <input class="form-check-input" type="checkbox" name="action_3" id="frm_txt_action_3"> --}}
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data ActionDoneChckbox" type="checkbox" index="1.2" name="action_3" id="frm_txt_action_3" value="1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label dieset_condition_data"> 3. Device conversion (Coma change)</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data ActionDoneChckbox" type="checkbox" index="1.3" name="action_4" id="frm_txt_action_4" value="1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label dieset_condition_data"> 4. Die set Overhaul</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action4Chckbox" type="checkbox" index="1.4" name="action_4a" id="frm_txt_action_4a" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> Fix side</label>
                                                                    </div>
                                                                    <div style="margin-left: 2%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action4Chckbox" type="checkbox" index="1.5" name="action_4b" id="frm_txt_action_4b" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> Movement side</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action4Chckbox" type="checkbox" index="1.6" name="action_4c" id="frm_txt_action_4c" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> With parts marking</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action4Chckbox" type="checkbox" index="1.7" name="action_4d" id="frm_txt_action_4d" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> Without part(s) marking (Qty: )</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <label class="form-check-label dieset_condition_data"> 5. With parts that can reversely installed</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data ActionDoneChckbox" type="radio" index="1.8" name="action_5" id="frm_txt_action_5_yes" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> Yes</label>
                                                                    </div>
                                                                    <div style="margin-left: 10%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data ActionDoneChckbox" type="radio" index="1.8" name="action_5" id="frm_txt_action_5_no" value="0">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> No</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data ActionDoneChckbox" type="checkbox" index="1.9" name="action_6" id="frm_txt_action_6" value="1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label dieset_condition_data"> 6. Repair</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data ActionDoneChckbox" type="checkbox" index="1.10" name="action_7" id="frm_txt_action_7" value="1">
                                                                </td>
                                                                <td colspan="2">
                                                                    <label class="form-check-label dieset_condition_data"> 7. Parts change</label>
                                                                </td>
                                                                <td>
                                                                    <button type="button" id="btnPartsDrawing" class="btn btn-primary btn-xs float-right d-none">Parts Drawing Section</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action7Chckbox" type="checkbox" index="1.11" name="action_7_a" id="frm_txt_action_7a" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> New</label>
                                                                    </div>
                                                                    <div style="margin-left: 8%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action7Chckbox" type="checkbox" index="1.12" name="action_7_b" id="frm_txt_action_7b" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> Fabricated</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action7Chckbox" type="checkbox" name="action_7c" index="1.13" id="frm_txt_action_7c" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> With part(s) marking</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data Action7Chckbox" type="checkbox" name="action_7d" index="1.14" id="frm_txt_action_7d" value="1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label dieset_condition_data"> With die-set part(s) change notice</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border border-left-0 border-bottom-0 border-dark">
                                                <div class="col-sm-10">
                                                    <strong><label class="form-check-label"> Details of activity:</label></strong>
                                                    <br>
                                                    <textarea class="form-control dieset_condition_data" style="height: 150px;" name="details_of_activity" id="frm_txt_details_of_activity" required></textarea>
                                                </div>
                                                <br>
                                                <div class="table-responsive col-sm-12">
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-primary btn-sm float-right" id="btn_add_row"><i class="fa fa-check fa-xs icon_save"></i> Add Row</button>
                                                        <button type="button" class="btn btn-sm btn-danger d-none float-right mr-2" id="btn_remove_row"><i class="fas fa-times"></i> Remove Row</button>
                                                    </div>
                                                    <table id="tbl_parts_no_and_qty" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <thead>
                                                            <tr class="bg-light">
                                                              <td hidden style="width: 15%;">Counter</td>
                                                              <td style="width: 5%;">#</td>
                                                              <td style="width: 40%;">
                                                                <label class="form-check-label"> Parts No.</label>
                                                              </td>
                                                              <td style="width: 40%;">
                                                                <label class="form-check-label"> Quantity</label>
                                                              </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td hidden>
                                                                    <input type="text" class="form-control" name="row_counter" id="row_counter" value="1" readonly>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <label class="form-check-label"> 1.</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control dieset_condition_data" index="4.1" name="parts_no" id="frm_parts_no_1">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control dieset_condition_data" index="4.1" name="quantity" id="frm_quantity_1">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr class="text-center align-middle">
                                                                <td>
                                                                    <label class="form-check-label"> Date</label>
                                                                </td>
                                                                <td>
                                                                    <label class="form-check-label"> Start</label>
                                                                </td>
                                                                <td>
                                                                    <label class="form-check-label"> Finish</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="date" class="form-control text-center align-middle dieset_condition_data" name="action_done_date_start" id="frm_txt_action_date_start" required>
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control text-center align-middle dieset_condition_data" name="action_done_start_time" id="frm_txt_action_start_time" required>
                                                                    {{-- oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" --}}
                                                                </td>
                                                                <td>
                                                                    <input type="time" class="form-control text-center align-middle dieset_condition_data" name="action_done_finish_time" id="frm_txt_action_finish_time" required>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center align-middle">
                                                                <td>
                                                                    <label class="form-check-label" style="margin-top: 5%" > In-charged</label>
                                                                    <input type="text" class="form-control dieset_condition_data" name="in_charged_id" id="frm_txt_action_in_charged_id" hidden>
                                                                </td>
                                                                <td colspan="2">
                                                                    <input type="text" class="form-control dieset_condition_data" name="in_charged" id="frm_txt_action_in_charged" readonly>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 border border-left-0 border-right-0 border-bottom-0 border-dark">
                                                <strong><label class="form-check-label"> Checkpoints during Mold overhauling:</label></strong>
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tbl_check_points" class="table table-sm table-borderless table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td width="30" class="form-check-label">OK</td>
                                                                <td width="30" class="form-check-label">N.G</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">1. Marking Check</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.0" name="check_point_1" id="frm_check_point_1_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.0" name="check_point_1" id="frm_check_point_1_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">2. Tanshi Pin</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.1" name="check_point_2" id="frm_check_point_2_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.1" name="check_point_2" id="frm_check_point_2_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data" type="checkbox" index="2.2" name="check_point_2a" value="1" id="frm_check_point_2a">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Crack</label>
                                                                    </div>
                                                                    <div style="margin-left: 2%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data" type="checkbox" index="2.3" name="check_point_2b" value="1" id="frm_check_point_2b">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Bend</label>
                                                                    </div>
                                                                    <div style="margin-left: 2%" class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data" type="checkbox" index="2.4" name="check_point_2c" value="1" id="frm_check_point_2c">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Worn out</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">3. Dent</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.5" name="check_point_3" id="frm_check_point_3_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.5" name="check_point_3" id="frm_check_point_3_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">4. Porous</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.6" name="check_point_4" id="frm_check_point_4_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.6" name="check_point_4" id="frm_check_point_4_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">5. Ejection Pin</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.7" name="check_point_5" id="frm_check_point_5_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.7" name="check_point_5" id="frm_check_point_5_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">6. Coma</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.8" name="check_point_6" id="frm_check_point_6_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.8" name="check_point_6" id="frm_check_point_6_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="form-check form-check-inline">
                                                                        7. Gasvent
                                                                    </div>
                                                                    <br>
                                                                    <div style="margin-left: 17%" class="form-check form-check-inline">
                                                                        Required: 0.005mm min
                                                                    </div>
                                                                    <br>
                                                                    <div style="margin-left: 15%" class="input-group input-group-sm col-sm-10">
                                                                        <span class="input-group-text">Actual: </span>
                                                                        <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">8. Assy. Orientation</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.10" name="check_point_8" id="frm_check_point_8_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.10" name="check_point_8" id="frm_check_point_8_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">9. F.S and M.S fittings</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.11" name="check_point_9" id="frm_check_point_9_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.11" name="check_point_9" id="frm_check_point_9_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">10. Sub. Gate appearance</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.12" name="check_point_10" id="frm_check_point_10_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="2.12" name="check_point_10" id="frm_check_point_10_ng" value="NG">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 border border-left-0 border-bottom-0 border-dark">
                                                <strong><label class="form-check-label"> Remarks:</label></strong>
                                                <br>
                                                <textarea class="form-control dieset_condition_data" style="height: 150px;" name="check_point_remarks" id="frm_check_point_remarks"></textarea>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-4 border border-right-0 border-dark">
                                                <strong><label class="form-check-label"> Mold check prior endorse to production:</label></strong>
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-borderless table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td width="30" class="form-check-label">OK</td>
                                                                <td width="30" class="form-check-label">N.G</td>
                                                                <td width="30" class="form-check-label">N/A</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">1. Withdraw Pin (External)</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.0" name="mold_check_1" id="frm_mold_check_1_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.0" name="mold_check_1" id="frm_mold_check_1_ng" value="NG">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.0" name="mold_check_1" id="frm_mold_check_1_na" value="N/A">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">2. Withdraw Pin (Internal)</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.1" name="mold_check_2" id="frm_mold_check_2_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.1" name="mold_check_2" id="frm_mold_check_2_ng" value="NG">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.1" name="mold_check_2" id="frm_mold_check_2-na" value="N/A">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">3. Slidecore stopper</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.2" name="mold_check_3" id="frm_mold_check_3_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.2" name="mold_check_3" id="frm_mold_check_3_ng" value="NG">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.2" name="mold_check_3" id="frm_mold_check_3_na" value="N/A">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">4. Locator ring</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.3" name="mold_check_4" id="frm_mold_check_4_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.3" name="mold_check_4" id="frm_mold_check_4_ng" value="NG">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.3" name="mold_check_4" id="frm_mold_check_4_na" value="N/A">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">5. Bolts and Nuts</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.4" name="mold_check_5" id="frm_mold_check_5_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.4" name="mold_check_5" id="frm_mold_check_5_ng" value="NG">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.4" name="mold_check_5" id="frm_mold_check_5_na" value="N/A">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">6. Stripper plate</td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.5" name="mold_check_6" id="frm_mold_check_6_ok" value="OK">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.5" name="mold_check_6" id="frm_mold_check_6_ng" value="NG">
                                                                </td>
                                                                <td>
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" index="3.5" name="mold_check_6" id="frm_mold_check_6_na" value="N/A">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border border-left-0 border-dark">
                                                <div class="col-sm-12">
                                                    <strong><label class="form-check-label"> Remarks:</label></strong>
                                                    <br>
                                                    <textarea class="form-control dieset_condition_data" style="height: 200px;" name="mold_check_remarks" id="frm_mold_check_remarks"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border border-left-0 border-dark">
                                                <div class="table-responsive col-sm-12">
                                                    <strong><label class="form-check-label">References Used </label></strong>
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr class="align-middle">
                                                                <td width="25">
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" value="1" name="references_used" id="frm_ref_used_1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Eval Sample</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" value="2" name="references_used" id="frm_ref_used_2">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Japan Sample</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" value="3" name="references_used" id="frm_ref_used_3">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Dieset Assy. Drawing</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input dieset_condition_data" type="radio" value="4" name="references_used" id="frm_ref_used_4">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Last Production Sample</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-12 border border-top-0 border-dark">
                                                <div class="table-responsive col-sm-8">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-borderless display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr class="text-center align-middle">
                                                                <td>
                                                                    <label class="form-check-label"> Checked by:</label>
                                                                    <input type="text" class="form-control text-center align-middle dieset_condition_data" name="mold_check_checked_by_id" id="frm_txt_mold_check_checked_by_id" hidden>
                                                                </td>
                                                                <td>
                                                                    <label class="form-check-label"> Date/Time</label>
                                                                </td>
                                                                {{-- <td>
                                                                    <label class="form-check-label"> Time</label>
                                                                </td> --}}
                                                                <td>
                                                                    <label class="form-check-label"> Status</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control text-center align-middle dieset_condition_data" name="mold_check_checked_by" id="frm_txt_mold_check_checked_by" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="datetime" class="form-control text-center align-middle dieset_condition_data" name="mold_check_date_time" id="frm_mold_check_date_time" readonly>
                                                                </td>
                                                                {{-- <td>
                                                                    <input type="text" class="form-control" id="mold_check_time" readonly>
                                                                </td> --}}
                                                                <td width="25%">
                                                                    <input type="text" class="form-control text-center align-middle dieset_condition_data" name="mold_check_status" id="frm_mold_check_status">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-12 border border-top-0 border-dark">
                                                <div class="table-responsive col-sm-12" style="margin-bottom: -1%">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-borderless" style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center align-middle">
                                                                    <label class="form-check-label"> Remarks:</label>
                                                                </td>
                                                                <td colspan="3">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data" type="radio" value="1" name="final_remarks" id="frm_final_remarks_1">
                                                                        <label class="form-check-label"> No problem found</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input dieset_condition_data" type="radio" value="2" name="final_remarks" id="frm_final_remarks_2">
                                                                        <label class="form-check-label"> With problem found</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- PART II Division End -->
                            <!-- PART III Division Start-->
                            <div class="Part3">
                                {{-- <h5 class="modal-title">III. Dieset Condition Checking <strong>(Responsible:Die Maintenance)</strong></h5> --}}
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h5 class="modal-title">III. Dieset Condition Checking <strong>(Responsible:Die Maintenance)</strong></h5>
                                </button>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingOne">
                                    <div class="row col-sm-12">
                                        <div class="col-sm-12 border border-dark">
                                            <br>
                                            <div class="col-sm-6">
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr class="align-middle">
                                                                <td width="25">
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Good Condition</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Under Longevity</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Problematic Die set</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="text-center align-middle">
                                                                <td colspan="2">
                                                                    <label class="form-check-label"> Checked by:</label>
                                                                </td>
                                                                <td>
                                                                    <label class="form-check-label"> Date</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <input type="text" class="form-control" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="datetime-local" class="form-control text-center" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Part III Division End -->
                            <!-- PART IV Division Start-->
                            <div class="Part4">
                                {{-- <h5 class="modal-title">III. Dieset Condition Checking <strong>(Responsible:Die Maintenance)</strong></h5> --}}
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <h5 class="modal-title">IV. Machine Set-up <strong>(Responsible:Production / Process Engineering)</strong></h5>
                                </button>
                                <div id="collapseFour" class="collapse show" aria-labelledby="headingOne">
                                    <div class="row col-sm-12">
                                        <div class="col-sm-12 border border-dark">
                                            <br>
                                            <div class="col-sm-6">
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <thead>
                                                            <th colspan="2">Machine Adjustment</th>
                                                            <th class="text-center">In-Charge</th>
                                                            <th class="text-center">Date / Time</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="align-middle">
                                                                <td width="30">
                                                                    <input style="margin-left:0; width:20px; height:20px;" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td class="align-middle">
                                                                    <label class="form-check-label"> 1st Adjustment</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="datetime-local" class="form-control text-center align-middle">
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td width="30">
                                                                    <input style="margin-left:0; width:20px; height:20px;" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td class="align-middle">
                                                                    <label class="form-check-label"> 2nd Adjustment</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="datetime-local" class="form-control text-center align-middle">
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td width="30">
                                                                    <input style="margin-left:0; width:20px; height:20px;" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td class="align-middle">
                                                                    <label class="form-check-label"> 3rd Adjustment</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="datetime-local" class="form-control text-center align-middle">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Part IV Division End -->

                            <!-- PART V Division Start-->
                            <div class="Part5">
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    <h5 class="modal-title">V. Product Requirement Checking-Using Actual Product Sample<strong>(Responsible:Production / Process / Die Maintenance Engineering / QC)</strong></h5>
                                </button>
                                <div id="collapseFive" class="collapse show" aria-labelledby="headingOne">
                                    <div class="row col-sm-12">
                                        <div class="col-sm-12 border border-dark" style="padding:0">
                                            <br>
                                            <div class="row col-sm-12 text-center" style="padding:0; margin:0">
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr class="align-middle">
                                                                <td rowspan="3" class="align-middle text-center">
                                                                    <label class="form-check-label"> Product Qualification Flow</label>
                                                                </td>
                                                                <td class="align-middle text-center" colspan="5">
                                                                    <label class="form-check-label"> Dieset/Product Condition</label>
                                                                </td>
                                                                <td class="align-middle text-center" colspan="6">
                                                                    <label class="form-check-label"> In-charge of this activity</label>
                                                                </td>
                                                                <td rowspan="3" class="align-middle" colspan="5">
                                                                    <label class="form-check-label">Important Note:</label>
                                                                    <br>
                                                                    <label class="form-check-label">Sequence of activity shall be performed and</label>
                                                                    <br>
                                                                    <label class="form-check-label">finished first prior to proceeding to the next step.</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td class="align-middle text-center" colspan="5">
                                                                    <label class="form-check-label"> # I, II, III, IX & X</label>
                                                                </td>
                                                                <td colspan="6">
                                                                    <label class="form-check-label"> Machine Operator->Die Maintenance Engineering</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td class="align-middle text-center" colspan="5">
                                                                    <label class="form-check-label"> # IV to XIII</label>
                                                                </td>
                                                                <td colspan="5">
                                                                    <label class="form-check-label">Machine Operator->Eng`g (Technician)->QC Inspector->Process Engr</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row col-sm-12 text-center" style="padding:0; margin:0">
                                                <div class="col-sm-4" style="padding:0">
                                                    <div class="row col-sm-12 d-flex justify-content-center" style="padding-left:15px; padding-right:0">
                                                        <div class="col-sm-12 text-center" style="padding:0">
                                                            <div class="table-responsive col-sm-12" style="padding:0">
                                                                <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="padding:0" width="32%"><label class="form-check-label">Activity Sequence</label></td>
                                                                            <td style="padding:0" colspan="4"><strong><label class="form-check-label">1.0 Production</label></strong></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td rowspan="13" class="align-middle">
                                                                                <label class="form-check-label">STANDARD</label>
                                                                                <br>
                                                                                <label class="form-check-label">REFERENCES</label>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- Sample References -->
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 1. Sample References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.1 Evaluation Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.2 Japan Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.3 Last Prodn Sample</td>
                                                                        </tr>
                                                                        <!-- Document References -->
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 2. Document References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.2 Die set Evaluation Report</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4" height="39"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.3 Cosmetic Defect(Point Panel)</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4" height="107"></td>
                                                                        </tr>
                                                                        {{-- <tr>
                                                                            <td colspan="4" height="34"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4" height="34"></td>
                                                                        </tr> --}}
                                                                        <!-- C/T Hole Checking -->
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 3. C/T Hole Checking</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.1 Pingauges</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.2 Measurescope</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td rowspan="2" class="align-middle">
                                                                                <label class="form-check-label"> ACTIVITY</label>
                                                                            </td>
                                                                            <td rowspan="2" colspan="2" class="align-middle">
                                                                                <label class="form-check-label"> Process Engr. Name/</label>
                                                                                <br>
                                                                                <label class="form-check-label"> Date/Time</label>
                                                                            </td>
                                                                            <td colspan="2" width="20%">
                                                                                <label class="form-check-label"> Result</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="form-check-label"> OK</label>
                                                                            </td>
                                                                            <td>
                                                                                <label class="form-check-label"> NG</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-left align-middle" style="padding:0">
                                                                                <label class="form-check-label">1. Visual Insp.</label>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:18px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:18px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-left align-middle" style="padding:0">
                                                                                <label class="form-check-label">2. Dimension Insp.</label>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:18px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:18px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-left align-middle">
                                                                                <label class="form-check-label">Remarks/Result</label>
                                                                            </td>
                                                                            <td colspan="4">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm" style="padding:0">
                                                    <div class="row col-sm-12 d-flex justify-content-center" style="padding:0">
                                                        <div class="col-sm-12 text-center" style="padding:0">
                                                            <div class="table-responsive col-sm-12" style="padding:0">
                                                                <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="padding:0" colspan="4"><strong><label class="form-check-label">2.0 ENGINEERING(TECHNICIAN)</label></strong></td>
                                                                        </tr>
                                                                        {{-- Sample References --}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 1. Sample References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td width="30" colspan="3" class="text-left">1.1 Evaluation Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.2 Japan Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.3 Last Prodn Sample</td>
                                                                        </tr>
                                                                        {{-- Document References --}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 2. Document References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.1 Material/Product Drawing</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Drawing #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Rev #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.2 Inspection Guide</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Drawing #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Rev #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.3 Die set Evaluation Report</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.4 Cosmetic Defect(Point Panel)</td>
                                                                        </tr>
                                                                        {{-- C/T Hole Checking--}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 3. C/T Hole Checking</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.1 Pingauges</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.2 Measurescope</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td rowspan="2" colspan="2" class="align-middle">
                                                                                <label class="form-check-label"> Process Engr. Name/</label>
                                                                                <br>
                                                                                <label class="form-check-label"> Date/Time</label>
                                                                            </td>
                                                                            <td colspan="2" width="30%">
                                                                                <label class="form-check-label"> Result</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="form-check-label"> OK</label>
                                                                            </td>
                                                                            <td>
                                                                                <label class="form-check-label"> NG</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm" style="padding:0">
                                                    <div class="row col-sm-12 d-flex justify-content-center" style="padding:0">
                                                        <div class="col-sm-12 text-center" style="padding:0">
                                                            <div class="table-responsive col-sm-12" style="padding:0">
                                                                <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="padding:0" colspan="4"><strong><label class="form-check-label">3.0 LINE QUALITY CONTROL</label></strong></td>
                                                                        </tr>
                                                                        {{-- Sample References --}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 1. Sample References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.1 Evaluation Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.2 Japan Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.3 Last Prodn Sample</td>
                                                                        </tr>
                                                                        {{-- Document References --}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 2. Document References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.1 Material/Product Drawing</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Drawing #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Rev #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.2 Inspection Guide</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Drawing #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Rev #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.3 Die set Evaluation Report</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.4 Cosmetic Defect(Point Panel)</td>
                                                                        </tr>
                                                                        {{-- C/T Hole Checking--}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 3. C/T Hole Checking</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.1 Pingauges</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.2 Measurescope</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td rowspan="2" colspan="2" class="align-middle">
                                                                                <label class="form-check-label"> Process Engr. Name/</label>
                                                                                <br>
                                                                                <label class="form-check-label"> Date/Time</label>
                                                                            </td>
                                                                            <td colspan="2" width="30%">
                                                                                <label class="form-check-label"> Result</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="form-check-label"> OK</label>
                                                                            </td>
                                                                            <td>
                                                                                <label class="form-check-label"> NG</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm" style="padding:0">
                                                    <div class="row col-sm-12 d-flex justify-content-center" style="padding:0">
                                                        <div class="col-sm-12 text-center" style="padding:0">
                                                            <div class="table-responsive col-sm-12" style="padding:0">
                                                                <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="padding:0" colspan="4"><strong><label class="form-check-label">4.0 PROCESS ENGINEERING</label></strong></td>
                                                                        </tr>
                                                                        {{-- Sample References --}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 1. Sample References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.1 Evaluation Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.2 Japan Sample</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">1.3 Last Prodn Sample</td>
                                                                        </tr>
                                                                        {{-- Document References --}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 2. Document References:</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.1 Material/Product Drawing</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Drawing #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Rev #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.2 Inspection Guide</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td>
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Drawing #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <div class="input-group input-group-sm">
                                                                                    <span class="input-group-text">Rev #: </span>
                                                                                    <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.3 Die set Evaluation Report</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">2.4 Cosmetic Defect(Point Panel)</td>
                                                                        </tr>
                                                                        {{-- C/T Hole Checking--}}
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <label class="form-check-label d-flex justify-content-start"> 3. C/T Hole Checking</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.1 Pingauges</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="30">
                                                                                <input style="margin-left:0; width:20px; height:20px;" class="form-check-input d-flex" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td colspan="3" class="text-left">3.2 Measurescope</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td rowspan="2" colspan="2" class="align-middle">
                                                                                <label class="form-check-label"> Process Engr. Name/</label>
                                                                                <br>
                                                                                <label class="form-check-label"> Date/Time</label>
                                                                            </td>
                                                                            <td colspan="2" width="30%">
                                                                                <label class="form-check-label"> Result</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="form-check-label"> OK</label>
                                                                            </td>
                                                                            <td>
                                                                                <label class="form-check-label"> NG</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                            <td style="padding-left:15px;">
                                                                                <input style="width:25px; height:25px;" class="form-check-input" type="checkbox" index="1.0" name="action_1" id="frm_txt_action_1" value="1">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="4">
                                                                                <input type="text" class="form-control dieset_condition_data" index="2.9" name="check_point_7" id="frm_check_point_7">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Part V Division End -->
                        </div>
                  </div> <!-- End Body -->
                  <div class="modal-footer">
                      <div class="actions">
                          <button type="button" id="idbtnSaveFrm" class="btn btn-primary btn-sm"><i class="fa fa-check fa-xs icon_save"></i> Save</button>
                          <button type="button" id="id_btn_close" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      </div>
                  </div>
                </form>

              </div>
            </div>
        </div>

        <!-- Filtering Modal Start -->
        <div class="modal fade" id="modalAdvancedSearch" data-bs-keyboard="false" data-bs-backdrop="static">
            <div class="modal-dialog modal-md" style="min-width: 550px;">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h4 class="modal-title"><i class="fas fa-filter"></i>&nbsp;Multiple Filter</h4>
                        <button type="button" style="color: #fff;" class="close" data-bs-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmSearch" autocomplete = 'off'>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Request Type</label>
                                        <select class="form-control" type="text" name="request_type"
                                            id="request_type" style="width: 100%;">
                                            <option value="" disabled selected>Select Request type</option>
                                            <option value="1">For Maintenance</option>
                                            <option value="2">Temporary Stop</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <label>Request Date</label>
                            <br>
                                <div class="col">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input type="date" class="form-control" name="request_date_from" value="">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="date" class="form-control" name="request_date_to" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" type="text" name="status"
                                        id="status" style="width: 100%;">
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="0">For Submission</option>
                                        <option value="1">For Conformance</option>
                                        <option value="2">Ongoing Condition Checking</option>
                                        <option value="3">For Machine Setup</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex">
                    <div class="p-2">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="float: left">Close</button>
                    </div>

                    <div class="p-2">
                        <button type="button" id="btnReset" class="btn btn-secondary" style="float: left">Reset</button>
                    </div>

                    <div class="ml-auto p-2">
                        <button type="button" id="btnRunAdvancedSearch" class="btn btn-primary"><i class="fa fa-check"></i> Search</button>
                    </div>
                    </div>

                </div>
            </div>
        </div><!-- Filtering Modal End -->

        <!-- DELETE REQUEST MODAL START -->
        <div class="modal fade" id="modalDeleteRequest">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h4 class="modal-title"><i class="fa-solid fa-trash-can"></i>&nbsp;&nbsp;Delete Request?</h4>
                        <button type="button" style="color: #fff" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="FrmDeleteRequest">
                        @csrf
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <label class="text-secondary mt-2">Are you sure you want to delete this request?</label>
                                <input type="hidden" class="form-control" name="request_id" id="deleterequestID">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="btnDeleteRequest" class="btn btn-primary"><i id="deactivateIcon"
                                    class="fa fa-trash-can"></i> Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- DELETE REQUEST MODAL END -->

        <!-- CONFIRM REQUEST MODAL START -->
        <div class="modal fade" id="modalChangeStatusRequest">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title"><i class="fa-solid fa-file-circle-check"></i>&nbsp;&nbsp;Confirmation</h4>
                        <button type="button" style="color: #fff" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="FrmChangeStatusRequest">
                        @csrf
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <label class="text-secondary mt-2">Are you sure you want to proceed?</label>
                                <input type="hidden" class="form-control" name="request_id" id="ChangeStatusRequestID">
                                <input type="hidden" class="form-control" name="process_status" id="ProcessStatus">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="btnChangeStatusRequest" class="btn btn-primary"><i id="ChangeStatusRequestIcon"
                                    class="fa fa-check"></i> Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- CONFIRM REQUEST MODAL END -->

        <!-- PARTS DRAWING START -->
        <div class="modal fade" id="modalPartsDrawing" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h4 class="modal-title">X. Internally Fabricated Parts Verification (Responsible: Die Maintenance Engineering)</h4>
                        <button type="button" id="CloseBtnFrmPartsDrawing" style="color: #fff" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="FrmPartsDrawing" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <label class="text-secondary text-center">Internal parts fabrication verification</label>
                                <input type="hidden" class="form-control" name="request_id_for_parts_drawing" id="frm_txt_request_id_for_parts_drawing">
                            </div>
                            {{-- X. Internal Fabrication --}}
                            <div class="row col-sm-12">
                                {{-- 1st Column --}}
                                <div class="col-sm-6 border border-dark text-center">
                                    <label class="form-control-label mt-1">Illustration (Parts Drawing):</label> <br>
                                    {{-- Upload Part Drawing File --}}
                                    <div class="col-sm-12 border border-dark">
                                        <br>
                                        <div id="AttachmentDiv">
                                            <label class="form-control-label">Attachment:</label>
                                            {{-- <a id="download_file" name="download_file" href='download_file/".$employee_infos->cash_advance_details->id."'> See Attachment</a> --}}
                                            {{-- <a id="download_file" name="download_file"> See Attachment</a> --}}

                                            {{-- <button type="button" id="download_file" name="download_file" class="btn btn-primary btn-sm d-none">
                                                <i class="fa-solid fa-file-arrow-down"></i>
                                                See Attachment
                                            </button> --}}
                                        </div>

                                        <input type="file" class="" id="txtAddFile" name="uploaded_file" accept=".png, .jpg, .jpeg" style="width:100%;" required>
                                        <input type="text" class="form-control d-none" name="uploaded_file" id="txtEditUploadedFile" disabled>
                                        <div class="form-group form-check d-none m-0" id="btnReuploadTriggerDiv">
                                            <input type="checkbox" class="form-check-input d-none" id="btnReuploadTrigger">
                                            <label class="d-none" id="btnReuploadTriggerLabel"> Re-upload Drawing</label>
                                        </div>
                                        <br><br>
                                    </div>
                                    {{-- Fabricated By & Measurement Validate By --}}
                                    <div class="row col-sm-12 float-right">
                                        <div class="col-sm-6">
                                            <br>
                                            <label class="form-check-label"> Fabricated by:</label>
                                            <input type="text" class="form-control text-center align-middle dieset_condition_data" name="fabricated_by_id" id="frm_txt_fabricated_by_id" hidden>
                                            <input type="text" class="form-control text-center align-middle dieset_condition_data" name="fabricated_by" id="frm_txt_fabricated_by" readonly>
                                            <br>
                                        </div>
                                        <div class="col-sm-6">
                                            <br>
                                            <label class="form-check-label"> Measurement validated by:</label>
                                            <input type="text" class="form-control text-center align-middle dieset_condition_data" name="m_validated_by_id" id="frm_m_validated_by_id" hidden>
                                            <input type="text" class="form-control text-center align-middle dieset_condition_data" name="m_validated_by" id="frm_m_validated_by" readonly>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                {{-- 2nd Column --}}
                                <div class="table-responsive col-sm-6 border border-dark">
                                    <div class="text-right mt-2">
                                        <button type="button" class="btn btn-primary btn-sm float-right" id="btnPartsDrawingAddRow"><i class="fa fa-check fa-xs icon_save"></i> Add Row</button>
                                        <button type="button" class="btn btn-sm btn-danger d-none float-right mr-2" id="btnPartsDrawingRemoveRow"><i class="fas fa-times"></i> Remove Row</button>
                                    </div>
                                    <table id="tblPartsDrawingData" class="table table-sm table-bordered table-hover display nowrap mt-1" style="width: 100%;">
                                        <thead>
                                            <tr class="bg-light">
                                            {{-- <th style="width: 20%;">Action</th> --}}
                                            <td hidden style="width: 15%;">Counter</td>
                                            <td style="width: 5%;">#</td>
                                            <td style="width: 40%;">
                                                <label class="form-check-label">Specification</label>
                                            </td>
                                            <td style="width: 40%;">
                                                <label class="form-check-label">Actual Measurement</label>
                                            </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td hidden>
                                                    <input type="text" class="form-control" name="PartsDrawingRowCounter" id="PartsDrawingRowCounter" value="1" readonly>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <label class="form-check-label"> 1.</label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control PartsDrawing" index="10.1" name="specification" id="frm_specification">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control PartsDrawing" index="10.1" name="actual_measurement" id="frm_actual_measurement">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="CloseBtnFrmPartsDrawing" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="btnSavePartsDrawing" class="btn btn-primary"><i id="SavePartsDrawingIcon" class="fa fa-check"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- PARTS DRAWING MODAL END -->

    @endsection

    @section('js_content')

    <style>
        table.dataTable td {
        font-size:  1em;
        /* padding:    5px 5px !important; */
        text-align: center;
        }
    </style>

<script type="text/javascript">

$(document).ready(function() {

    $(document).on('hidden.bs.modal', '.modal',
    () => $('.modal:visible').length && $(document.body).addClass('modal-open'));

    var frmProdIdentification = $('#frm_prod_identification');
        // GetUserIDBySession();

    // GET PREPARED BY FOR MATERIAL ISSUANCE
    function GetUserIDBySession(){
        $.ajax({
            url: "get_name_by_session",
            method: "get",
            dataType: "json",
            beforeSend: function(){
            },
            success: function(response){
                let result = response['result'];
                if(result == 1){
                    toastr.error('Session Expired!');
                }else{
                    $('#txt_user_id').val(result[0].id);
                    $('#txt_user_name').val(result[0].rapidx_user_details.name);
                }
            },
        });
    }

    $('#btnReset').on('click', function(){
      $("#frmSearch").trigger("reset");
    });

    $("#SearchYear").keyup(function(e){
        e.preventDefault();
        dataTableDmrpqc.draw();
	  });

    $("#SelectMonth").on('change', function(e){
        e.preventDefault();
        dataTableDmrpqc.draw();
	  });

    $('#btnRunAdvancedSearch').on('click', function(){
        console.log($('#frmSearch').serialize());
        dataTableDmrpqc.draw();
        $('#modalAdvancedSearch').modal('hide');
    });

    //===== DATATABLES OF INK FIN CONSUMPTION ================
    dataTableDmrpqc = $("#tbl_dmrpqc").DataTable({
        "processing": false,
        "serverSide": true,
        "responsive": true,
        "ajax": {
            url: "view_dmrpqc",
            data: function(param){
                param.year =  $("input[name='year']").val();
                param.month =  $("select[name='month_value']").val();
                // param.month =  $("#SearchMonth").val();
                // param.device_name = $("select[name='supplier_name']", $("#frmSearch")).val();
                param.request_type = $("select[name='request_type']", $("#frmSearch")).val();
                param.request_date_from = $("input[name='request_date_from']", $("#frmSearch")).val();
                param.request_date_to = $("input[name='request_date_to']", $("#frmSearch")).val();
                param.status = $("select[name='status']", $("#frmSearch")).val();
            }
        },
        "columns": [
        {
            "data": "action",
            orderable: false,
            searchable: false,
        },
        { "data": "status"},
        { "data": "process_status"},
        { "data": "device_name"},
        { "data": "po_number"},
        { "data": "item_code"},
        {
            "data": "request_type",
            render: function(data) {
                if(data == 1) {
                    return 'For Maintenance'
                }
                else if(data == 2) {
                    return 'Temporary Stop'
                }
            }
        },
        // { "data": "created_by" },
        { "data": "start_date_time"},
        ],
        "order": [0, 'desc']
    });

    $('#frm_txt_po_no').keypress(function(e){
        //po_modify- drawing
      if(e.keyCode == 13){
        var po_number = $(this).val();
        if(po_number == "" || po_number == null ){
            toastr.warning('PO not found!'); //po_modify - clickbutton
        }
        else{
            $('#frm_txt_item_code').val('');
            $('#frm_txt_device_name').val('');
            $('#frm_txt_po_number').val('');
            $('#frm_txt_die_no').val('');
            $('#frm_txt_drawing_no').val('');
            $('#frm_txt_rev_no').val('');

            $(this).val('');
            $(this).focus();

            GetPPSDBDataByItemCode(po_number);
        }
        // $(this).val( $(this).val().split(' ')[0] )
        // $(".spanOICount").html('');
        // currentPoNo = $(this).val();
        // dt_pilot_run.draw();

        // $('#frm_txt_item_code').val('');
        // $('#frm_txt_device_name').val('');
        // $('#frm_txt_po_number').val('');
        // $('#frm_txt_die_no').val('');
        // $('#frm_txt_drawing_no').val('');
        // $('#frm_txt_rev_no').val('');

        // $(this).val('');
        // $(this).focus();

        // GetPPSDBDataByItemCode(po_number);
      }
    });

    $('#btn_add_row').click(function(){
        let row_counter = $('#row_counter').val();
        row_counter++;
        console.log('test click add');
        if(row_counter > 1){
            $('#btn_remove_row').removeClass('d-none');
        }
        var html = '<tr class="addRowforEdit" id="row_'+row_counter+'">';
                // html += '<td>';
                //     html += '<input type="text" class="form-control" name="row_counter" id="row_counter" value="'+row_counter+'" readonly>';
                // html += '</td>';
                html += '<td hidden></td>';
                html += '<td class="text-center align-middle">'+row_counter+'.</td>';
                html += '<td>';
                    html += '<input type="text" class="form-control dieset_condition_data" index="4.'+row_counter+'" name="parts_no" id="frm_parts_no_'+row_counter+'" required>';
                html += '</td>';
                html += '<td>';
                    html += '<input type="text" class="form-control dieset_condition_data" index="4.'+row_counter+'" name="quantity" id="frm_quantity_'+row_counter+'" required>';
                html += '</td>';
            html += '</tr>';

        $('#row_counter').val(row_counter);
        $('#tbl_parts_no_and_qty tbody').append(html);
    });

    $('#btn_remove_row').click(function(){
                let row_counter =  $('#row_counter').val();
                $('#tbl_parts_no_and_qty tbody').find('#row_'+row_counter).remove();
                console.log('Total of row_counter before removing row: ', row_counter);
                row_counter--;
                $('#row_counter').val(row_counter).trigger('change');
                console.log('Total of row_counter after removing row: ' + row_counter);

                if(row_counter < 2){
                        $('#btn_remove_row').addClass('d-none');
                    }
            });

    $('#btnPartsDrawingAddRow').click(function(){
        let PartsDrawingRowCounter = $('#PartsDrawingRowCounter').val();
        PartsDrawingRowCounter++;
        console.log('test click add');
        if(PartsDrawingRowCounter > 1){
            $('#btnPartsDrawingRemoveRow').removeClass('d-none');
        }
        var html = '<tr class="addRowforEdit" id="row_'+PartsDrawingRowCounter+'">';
                // html += '<td>';
                //     html += '<input type="text" class="form-control" name="PartsDrawingRowCounter" id="PartsDrawingRowCounter" value="'+PartsDrawingRowCounter+'" readonly>';
                // html += '</td>';
                html += '<td hidden></td>';
                html += '<td class="text-center align-middle">'+PartsDrawingRowCounter+'.</td>';
                html += '<td>';
                    html += '<input type="text" class="form-control PartsDrawing" index="10.'+PartsDrawingRowCounter+'" name="specification" id="frm_specification_'+PartsDrawingRowCounter+'" required>';
                html += '</td>';
                html += '<td>';
                    html += '<input type="text" class="form-control PartsDrawing" index="10.'+PartsDrawingRowCounter+'" name="actual_measurement" id="frm_actual_measurement_'+PartsDrawingRowCounter+'" required>';
                html += '</td>';
            html += '</tr>';

        $('#PartsDrawingRowCounter').val(PartsDrawingRowCounter);
        $('#tblPartsDrawingData tbody').append(html);
    });

    $('#btnPartsDrawingRemoveRow').click(function(){
            let PartsDrawingRowCounter =  $('#PartsDrawingRowCounter').val();
            $('#tblPartsDrawingData tbody').find('#row_'+PartsDrawingRowCounter).remove();
            console.log('Total of PartsDrawingRowCounter before removing row: ', PartsDrawingRowCounter);
            PartsDrawingRowCounter--;
            $('#PartsDrawingRowCounter').val(PartsDrawingRowCounter).trigger('change');
            console.log('Total of PartsDrawingRowCounter after removing row: ' + PartsDrawingRowCounter);

            if(PartsDrawingRowCounter < 2){
                    $('#btnPartsDrawingRemoveRow').addClass('d-none');
                }
    });

    function GetPPSDBDataByItemCode(po_number){
        $.ajax({
            url: "get_pps_db_data_by_item_code",
            method: "get",
            data: {
                po_number : po_number,
            },
            // data: $('#ReceiveStratPOMaterialIssuanceForm').serialize(),
            dataType: "json",
            success: function(response){
                if (response['result'] == '1') {
                    toastr.error('Error, Wrong PO Number');
                }else{
                    let pps_details = response['pps_db_details'];
                    let pps_dieset = response['pps_db_details'][0]['pps_dieset'];

                    // $('#txt_device_name').val(pps_details[0].ItemName);
                    // $('#txt_po_number').val(pps_details[0].OrderNo);
                    // $('#txt_item_code').val(pps_details[0].ItemCode);
                    // $('#txt_die_no').val(pps_dieset.DieNo);
                    // $('#txt_drawing_no').val(pps_dieset.DrawingNo);
                    // $('#txt_rev_no').val(pps_dieset.Rev);

                    $("#frm_txt_device_name").val(pps_details[0].ItemName);
                    $("#frm_txt_po_no").val(pps_details[0].OrderNo);
                    $("#frm_txt_item_code").val(pps_details[0].ItemCode);
                    $("#frm_txt_die_no").val(pps_dieset.DieNo);
                    $("#frm_txt_drawing_no").val(pps_dieset.DrawingNo);
                    $("#frm_txt_rev_no").val(pps_dieset.Rev);
                }
            }
        });
    }


    $("#btnShowAddRequest").click(function(){
        // if($("#txt_po_number").val() == "" || $("#txt_po_number").val() == null ||
        //     $("#txt_device_name").val() == "" || $("#txt_device_name").val() == null || $("#txt_item_code").val() == "" || $("#txt_item_code").val() == null){
        //     toastr.warning('PO not found!'); //po_modify - clickbutton
        // }
        // else{
            // $('input', frmProdIdentification).val('');
            // $('select', frmProdIdentification).val('');
            $("#frm_prod_identification")[0].reset();
            frmProdIdentification.find('.Part2').attr('hidden',true);
            frmProdIdentification.find('.Part3').attr('hidden',true);
            frmProdIdentification.find('.Part4').attr('hidden',true);
            frmProdIdentification.find('.Part5').attr('hidden',true);
            frmProdIdentification.find('#collapseTwo').removeClass('show',true);
            frmProdIdentification.find('#collapseThree').removeClass('show',true);
            frmProdIdentification.find('#collapseFour').removeClass('show',true);
            frmProdIdentification.find('#collapseFive').removeClass('show',true);
            $("#frm_prod_identification .dieset_condition_data").attr('disabled', true);
            $("#frm_prod_identification .dieset_condition_data").attr('required', false);
            frmProdIdentification.find('input').attr('disabled',false);
            frmProdIdentification.find('select').attr('disabled',false);
            // frmProdIdentification.find('button').attr('disabled',false);
            frmProdIdentification.find('textarea').attr('readonly',false);
            GetUserIDBySession();
            $('#modalProdIdentification').modal('show');
            // GetUserIDBySession();
            // let po_number = $('#txt_po_number').val();
            // GetPPSDBDataByItemCode(po_number);

            // $('#id_btn_save_pilotA').removeClass('d-none');
            // $("#frm_txt_device_name").val($("#txt_device_name").val());
            // $("#frm_txt_po_no").val($("#txt_po_number").val());
            // $("#frm_txt_item_code").val($("#txt_item_code").val());
            // $("#frm_txt_die_no").val($("#txt_die_no").val());
            // $("#frm_txt_drawing_no").val($("#txt_drawing_no").val());
            // $("#frm_txt_rev_no").val($("#txt_rev_no").val());

            // frmProdIdentification.find('#collapseTwo').addClass('show',true); //clark test
            // frmProdIdentification.find('.txt_AKLdrawing_pn').html('Checked by - Auto generated');
            // frmProdIdentification.find('.txt_mlc_mat_name_list_emp_name').html('Checked by - Auto generated');
            // frmProdIdentification.find('.txt_surc_assembly_type_first_emp_name').html('Checked by - Auto generated');
            // frmProdIdentification.find('.txt_prc_plastic_emp_name').html('Checked by - Auto generated');
            // frmProdIdentification.find('#txt_start_datetime').html('Auto generated');
            // frmProdIdentification.find('input[type=radio]').removeAttr('checked',true);
            // frmProdIdentification.find('button[data-checked-by=txt_surc_assembly_type_first_emp_name]').attr('disabled',true);
            // frmProdIdentification.find('#rdo_surc_moving_test_100').addClass('d-none',true);
            // frmProdIdentification.find('#rdo_surc_moving_test_sampling').addClass('d-none',true);
            // frmProdIdentification.find('#rdo_surc_resist_check_100').addClass('d-none',true);
            // frmProdIdentification.find('#rdo_surc_resist_check_sampling').addClass('d-none',true);

            // frmProdIdentification.find('.prodn-container input').not(exceptInputs).removeAttr('readonly',true); /*Check the docReady for the exceptInputs id*/
            // frmProdIdentification.find('.prodn-container input[type=radio]').removeAttr('disabled',true);
            // frmProdIdentification.find('.prodn-container #btnSearchProdn').removeAttr('disabled',true);
            // frmProdIdentification.find('.prodn-container select').removeAttr('readonly',true);
            // frmProdIdentification.find('.engg-container input').attr('readonly',true); /*Check the docReady for the exceptEnggInputs id*/
            // frmProdIdentification.find('.engg-container input[type=radio]').attr('disabled',true);
            // frmProdIdentification.find('.engg-container#btnScanECheckedBy').attr('disabled',true);
            // frmProdIdentification.find('.engg-container select').attr('readonly',true);

            // getMaterialIssuancetoProbes(frmProdIdentification); //nmodify
            // GetMaterialKitting();
            // getMaterialIssuancetoProbes();
        // }
    });

    //ClarkGG
    // $("#id_btn_save").click(function(){
    //     if(){

    //     }
    // });

    //Assign Value clark gggg commented
    // $('[type="checkbox"]').click(function(){
    //     let isChecked = 0;
    //     if($(this).prop('checked')){
    //         isChecked = 1;
    //     }
    //     $(this).val(isChecked);
    //     console.log('click mo', isChecked);
    // });

    var ActionDonePartsNoArr = [];
    var ActionDoneQuantityArr = [];

    $("#idbtnSaveFrm").click(function(event){
    event.preventDefault();
    let process_status = $('#txt_global_status').val();
        if(process_status == ''){
            console.log('process_status null');
            AddDmrpqc();
        }
        else if(process_status == 2){
            // console.log(process_status);
            // console.table('form', $('#frm_prod_identification').serialize());

            for(let index = 1; index <= $('#row_counter').val(); index++){
                let parts_no = $('.dieset_condition_data[index="4.'+index+'"][name="parts_no"]').val();
                let quantity = $('.dieset_condition_data[index="4.'+index+'"][name="quantity"]').val();

                ActionDonePartsNoArr.push(parts_no);
                ActionDoneQuantityArr.push(quantity);
            }
            // ActionDonePartsNoArr = implode(",",ActionDonePartsNoArr);
            // ActionDoneQuantityArr = implode(",",ActionDoneQuantityArr);
            console.log('parts_no', ActionDonePartsNoArr);
            console.log('quantity', ActionDoneQuantityArr);
            // var action_name;
            // $('.dieset_condition_data').each(function(){
            //     // action_name = $(this).attr('name');
            //     // obj = {};
            //     // obj[action_name] = $(this).val();
            //     // DiesetConditionData.push(obj);
            //     DiesetConditionData.push({
            //         name: $(this).attr('name'),
            //         value: $(this).val(),
            //     });
            // });
            // var objDiesetConditionData = DiesetConditionData.reduce(function(o, val) { o[val] = val; return o; }, {});
            // console.table(objDiesetConditionData);

            // var myObject = Object.assign({}, DiesetConditionData);

            // var myObject = JSON.stringify(Object.assign({}, DiesetConditionData));
            // console.log(JSON.stringify(myObject));
            // console.log(DiesetConditionData.serialize());

            // UpdateDiesetConditionData();
            console.log($('.dieset_condition_data').serialize());
            UpdateDiesetConditionData(ActionDonePartsNoArr, ActionDoneQuantityArr, $('#txt_global_dmrpqc_id').val(), $('#txt_global_status').val(), $('#txt_user_id').val());

        }else if(process_status == 3){

        }
    });

    var SpecificationArr = [];
    var ActualMeasurementArr = [];

    $("#FrmPartsDrawing").submit(function(event){
    event.preventDefault();
    let process_status = $('#txt_global_status').val();

    if(process_status == 2){
            // console.log(process_status);
            // console.table('form', $('#frm_prod_identification').serialize());

            for(let index = 1; index <= $('#PartsDrawingRowCounter').val(); index++){
                let specification = $('.PartsDrawing[index="10.'+index+'"][name="specification"]').val();
                let actual_measurement = $('.PartsDrawing[index="10.'+index+'"][name="actual_measurement"]').val();

                SpecificationArr.push(specification);
                ActualMeasurementArr.push(actual_measurement);
            }
            // console.log('specification', SpecificationArr);
            // console.log('actual_measurement', ActualMeasurementArr);
            // console.log('teststaas', $('#txtAddFile').val());
            // console.table($('#FrmPartsDrawing').serialize());
            // console.log('');
            UpdatePartsDrawingData(SpecificationArr, ActualMeasurementArr, $('#txt_global_dmrpqc_id').val(), $('#txt_global_status').val(), $('#txt_user_id').val());
            // var formData = new FormData($('#FrmPartsDrawing')[0]);
            // console.log(formData);
            // UpdatePartsDrawingData();
        }
    });

    // let id = $(this).attr('dmrpqc_id');
    // let process_status = $(this).attr('process_status');
    // let _token = "{{ csrf_token() }}";

    // var data = {
    //     'id' : id,
    //     'process_status' : process_status,
    //     '_token' : _token,
    //   }
    // ConformDiesetCondition(data);

    function AddDmrpqc(){
        $.ajax({
            url: "add_request",
            method: "post",
            data: $('#frm_prod_identification').serialize(),
            dataType: "json",
            beforeSend: function(){
                // $(".icon_save_pilotA").addClass('fa fa-spinner fa-pulse');
                // $("#id_btn_save_pilotA").prop('disabled', 'disabled');
            },
            success: function(JsonObject){
                if(JsonObject['validation'] == "hasError"){
                    console.log(JsonObject['error']);

                    if(JsonObject['error']['po_no'] === undefined){
                        frmProdIdentification.find('#frm_txt_po_no').removeClass('is-invalid');
                        frmProdIdentification.find('#frm_txt_po_no').attr('title','');
                    }else{
                        frmProdIdentification.find('#frm_txt_po_no').addClass('is-invalid');
                        frmProdIdentification.find('#frm_txt_po_no').attr('title',JsonObject['error']['po_no']);
                    }

                    if(JsonObject['error']['request_type'] === undefined){
                        frmProdIdentification.find('#frm_request_type').removeClass('is-invalid');
                        frmProdIdentification.find('#frm_request_type').attr('title','');
                    }else{
                        frmProdIdentification.find('#frm_request_type').addClass('is-invalid');
                        frmProdIdentification.find('#frm_request_type').attr('title',JsonObject['error']['request_type']);
                    }

                    // if(JsonObject['error']['txt_OTUDdrawing']===undefined){
                    //     frmProdIdentification.find('#txt_OTUDdrawing').removeClass('is-invalid');
                    //     frmProdIdentification.find('#txt_OTUDdrawing').attr('title','');
                    // }else{
                    //     frmProdIdentification.find('#txt_OTUDdrawing').addClass('is-invalid');
                    //     frmProdIdentification.find('#txt_OTUDdrawing').attr('title',JsonObject['error']['txt_OTUDdrawing']);
                    // }

                }else if(JsonObject['result'] == 1){
                    $("#modalProdIdentification").modal('hide');
                    $("#frm_prod_identification")[0].reset();
                    frmProdIdentification.find('input').removeClass('is-invalid');
                    frmProdIdentification.find('input').attr('title','');
                    frmProdIdentification.find('select').removeClass('is-invalid');
                    frmProdIdentification.find('select').attr('title','');
                    toastr.success('New Request was succesfully saved!');
                }else if(JsonObject['result'] == 2){
                    toastr.error('Saving Failed! Item Code Still Ongoing Preparation');
                }
                else{
                    toastr.error('Saving Failed! Please check all fields. Put N/A if not applicable. Check all radio button.');
                }
                dataTableDmrpqc.draw();
                // $("#id_btn_save_pilotAIcon").removeClass('fa fa-spinner fa-pulse');
                // $("#id_btn_save_pilotA").removeAttr('disabled');
                // $("#iid_btn_save_pilotAIcon").addClass('fa fa-check');
            },
            error: function(data, xhr, status){
                toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                // $("#iid_btn_save_pilotAIcon").removeClass('fa fa-spinner fa-pulse');
                // $("#id_btn_save_pilotA").removeAttr('disabled');
                // $("#iid_btn_save_pilotAIcon").addClass('fa fa-check');
            }
        });
    }

    // $("#tblViewEnergyConsumption input").keyup(function(e){
    //     $("#tblViewEnergyConsumption input").removeClass('is-invalid');
    // });

    function UpdatePartsDrawingData(Specification, ActualMeasurement, request_id, process_status, user_id){
        var formData = new FormData($('#FrmPartsDrawing')[0]);
            formData.append('specification', Specification);
            formData.append('actual_measurement', ActualMeasurement);
            formData.append('request_id', request_id);
            formData.append('process_status', process_status);
            formData.append('user_id', user_id);

        $.ajax({
            url: "update_parts_drawing_data",
            method: "post",
            // _token: _token,
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: function(){
            },
            success: function(JsonObject){
                if(JsonObject['result'] == 'Success'){
                    $("#modalPartsDrawing").modal('hide');
                    $("#FrmPartsDrawing")[0].reset();
                    toastr.success('Drawing Succesfully Saved!');
                }else if(JsonObject['result'] == 'File Name Already Exists'){
                    toastr.error('File Name Already Exists!');
                }else{
                    toastr.error('Saving Failed!');
                }
            },
            error: function(data, xhr, status){
                toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });

        SpecificationArr     = [];
        ActualMeasurementArr = [];
    }


    function UpdateDiesetConditionData(PartsNoArr, QuantityArr, request_id, process_status, user_id){
    // function UpdateDiesetConditionData(){
        let _token = "{{ csrf_token() }}";
        var data = $.param({ _token, PartsNoArr, QuantityArr, request_id, process_status, user_id}) + '&' + $('.dieset_condition_data').serialize();
        $.ajax({
            url: "update_dieset_conditon_data",
            method: "post",
            // _token: _token,
            data: data,
            // data: $('#frm_prod_identification').serialize(),
            // data: {
            //     _token: _token,
            //     request_id: request_id,
            //     process_status: process_status,
            //     user_id: user_id,
            //     data: data
            // },
            dataType: "json",
            beforeSend: function(){
            },
            success: function(JsonObject){
                if(JsonObject['error'] == "Please Select Action Done"){
                    // console.log(JsonObject['error']);
                    toastr.error('Please Select Action Done');
                    ActionDonePartsNoArr  = [];
                    ActionDoneQuantityArr = [];
                }else if(JsonObject['result'] == 'Success'){
                    $("#modalProdIdentification").modal('hide');
                    $("#frm_prod_identification")[0].reset();
                    frmProdIdentification.find('input').removeClass('is-invalid');
                    frmProdIdentification.find('input').attr('title','');
                    frmProdIdentification.find('select').removeClass('is-invalid');
                    frmProdIdentification.find('select').attr('title','');
                    toastr.success('New Request was succesfully saved!');
                }else if(JsonObject['result'] == 2){
                    toastr.error('Saving Failed! Item Code Still Ongoing Preparation');
                    ActionDonePartsNoArr  = [];
                    ActionDoneQuantityArr = [];
                }
                else{
                    toastr.error('Saving Failed! Please check all fields. Put N/A if not applicable. Check all radio button.');
                    ActionDonePartsNoArr  = [];
                    ActionDoneQuantityArr = [];
                }
                dataTableDmrpqc.draw();
            },
            error: function(data, xhr, status){
                toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    }

    $("#tbl_dmrpqc").on('click', '.actionViewBtn', function(e){
        let id = $(this).attr('dmrpqc_id');
        // GetDmrpqcDetails(id);
        $.ajax({
            url: "get_dmrpqc_details_id",
            method: "get",
            data: {
                id: id,
            },
            dataType: "json",
            success: function(response){
                    let dmrpqc_details = response['dmrpqc_details'];

                    $("#frm_txt_device_name").val(dmrpqc_details[0].device_name);
                    $("#frm_txt_po_no").val(dmrpqc_details[0].po_number);
                    $("#frm_txt_item_code").val(dmrpqc_details[0].item_code);
                    $("#frm_txt_die_no").val(dmrpqc_details[0].die_no);
                    $("#frm_txt_drawing_no").val(dmrpqc_details[0].drawing_no);
                    $("#frm_txt_rev_no").val(dmrpqc_details[0].rev_no);
                    $("#frm_txt_start_datetime").val(dmrpqc_details[0].start_date_time);
                    $("#frm_request_type").val(dmrpqc_details[0].request_type);

                    let part2 = frmProdIdentification.find('.Part2')
                    let part3 = frmProdIdentification.find('.Part3')
                    let collapseTwo = frmProdIdentification.find('#collapseTwo')
                    let collapseThree = frmProdIdentification.find('#collapseThree')

                    //[Default]: All Part is Hidden and Div is Collapsed
                    part2.attr('hidden',true);
                    part3.attr('hidden',true);
                    collapseTwo.removeClass('show',true);
                    collapseThree.removeClass('show',true);

                    //Show Parts and Div where the current process status matches
                    if(dmrpqc_details[0].process_status == 2){
                        part2.removeAttr('hidden',true);
                        collapseTwo.addClass('show',true);
                    }else if(dmrpqc_details[0].process_status == 3){
                        part2.removeAttr('hidden',true);
                        part3.removeAttr('hidden',true);
                        collapseTwo.addClass('show',true);
                        collapseThree.addClass('show',true);
                    }
                    // else if(dmrpqc_details[0].process_status == 4){

                    // }

                    frmProdIdentification.find('input').attr('disabled',true);
                    frmProdIdentification.find('select').attr('disabled',true);
                    // frmProdIdentification.find('button').attr('disabled',true);
                    frmProdIdentification.find('textarea').attr('readonly',true);
                    $('#modalProdIdentification').modal('show');
            }
        });
      });


    // DELETE REQUEST
    $(document).on('click', '.actionDeleteBtn', function(e){
        let id = $(this).attr('dmrpqc_id');
        $("#deleterequestID").val(id);
        $("#modalDeleteRequest").modal('show');
    });

    // ================================= RE-UPLOAD FILE =================================
    $('#btnReuploadTrigger').on('click', function() {
        $('#btnReuploadTrigger').attr('checked', 'checked');
        if($(this).is(":checked")){
            $("#txtAddFile").removeClass('d-none');
            $("#txtAddFile").attr('required', true);
            $("#txtEditUploadedFile").addClass('d-none');
        }
        else{
            $("#txtAddFile").addClass('d-none');
            $("#txtAddFile").removeAttr('required');
            $("#txtAddFile").val('');
            $("#txtEditUploadedFile").removeClass('d-none');
        }
    });

    // OPEN PARTS DRAWING
    $(document).on('click', '#btnPartsDrawing', function(e){
        let id = $('#txt_global_dmrpqc_id').val();
        let process_status = $('#txt_global_status').val();

        var data = {
            'id' : id,
            'process_status' : process_status
          }

        // $("#modalPartsDrawing").modal('show');
        // $('#tblPartsDrawingData tbody .addRowforEdit').remove();
        // $('#btnPartsDrawingRemoveRow').addClass('d-none');

        SpecificationArr     = [];
        ActualMeasurementArr = [];

        // GetDmrpqcDetails(data);
        $.ajax({
            url: "get_dmrpqc_details_id",
            method: "get",
            data: data,
            dataType: "json",
            beforeSend(){
                $('#tblPartsDrawingData tbody .addRowforEdit').remove();
                $('#btnPartsDrawingRemoveRow').addClass('d-none');
                // $('#tbl_parts_no_and_qty tbody').append(html);
            },
            success: function(response){
                    let dmrpqc_details = response['dmrpqc_details'];
                    let dieset_condition_details = response['dieset_condition_details'];

                    // $("#txt_global_dmrpqc_id").val(dmrpqc_details[0].id);
                    // $("#txt_global_status").val(dmrpqc_details[0].process_status);
                    $("#txtEditUploadedFile").removeClass('d-none');
                    $("#btnReuploadTrigger").removeClass('d-none');
                    $("#btnReuploadTrigger").prop('checked', false);
                    $("#btnReuploadTriggerDiv").removeClass('d-none');
                    $("#btnReuploadTriggerLabel").removeClass('d-none');
                    $("#txtAddFile").addClass('d-none');
                    $("#txtAddFile").removeAttr('required');
                    $("#txtEditUploadedFile").val(dieset_condition_details[0].parts_drawing);
				    let drawing_specification = dieset_condition_details[0].drawing_specification.split(",");
                    let drawing_actual_measurement = dieset_condition_details[0].drawing_actual_measurement.split(",");

                    if(dieset_condition_details[0].drawing_fabricated_by == null){
                        $("#frm_txt_fabricated_by_id").val($("#txt_user_id").val());
                        $("#frm_txt_fabricated_by").val($("#txt_user_name").val());
                    }else{
                        $("#frm_txt_fabricated_by_id").val(dieset_condition_details[0].drawing_fabricated_by.id);
                        $("#frm_txt_fabricated_by").val(dieset_condition_details[0].drawing_fabricated_by.rapidx_user_details.name);
                    }

                    if(dieset_condition_details[0].drawing_validated_by == null){
                        $("#frm_m_validated_by_id").val($("#txt_user_id").val());
                        $("#frm_m_validated_by").val($("#txt_user_name").val());
                    }else{
                        $("#frm_m_validated_by_id").val(dieset_condition_details[0].drawing_validated_by.id);
                        $("#frm_m_validated_by").val(dieset_condition_details[0].drawing_validated_by.rapidx_user_details.name);
                    }

                    $('.PartsDrawing[index="10.1"][name="specification"]').val(drawing_specification[0]); //static set of value to static attr:index
                    $('.PartsDrawing[index="10.1"][name="actual_measurement"]').val(drawing_actual_measurement[0]); //static set of value to static attr:index

                    let edit_row_counter = (drawing_specification.length);
                    if(edit_row_counter > 1){
                        $('#btnPartsDrawingRemoveRow').removeClass('d-none');
                    }
                    for(let index = 1; index < drawing_specification.length && index < 	drawing_actual_measurement.length; index++){
                        var html = '<tr class="addRowforEdit" id="row_'+(index+1)+'">';
                                // html += '<td>';
                                //     html += '<input type="text" class="form-control" name="row_counter" id="row_counter" value="'+row_counter+'" readonly>';
                                // html += '</td>';
                                html += '<td hidden></td>';
                                html += '<td class="text-center align-middle">'+(index+1)+'.</td>';
                                html += '<td>';
                                    html += '<input type="text" class="form-control PartsDrawing" index="10.'+(index+1)+'" name="specification" id="frm_specification_'+(index+1)+'" value="'+drawing_specification[index]+'">';
                                html += '</td>';
                                html += '<td>';
                                    html += '<input type="text" class="form-control PartsDrawing" index="10.'+(index+1)+'" name="actual_measurement" id="frm_actual_measurement_'+(index+1)+'" value="'+drawing_actual_measurement[index]+'">';
                                html += '</td>';
                            html += '</tr>';

                        $('#PartsDrawingRowCounter').val(edit_row_counter);
                        $('#tblPartsDrawingData tbody').append(html);
                    }

                    // var download = '<button type="button" href="download_file/'+dieset_condition_details.request_id+'" id="download_file" name="download_file" class="btn btn-primary btn-sm d-none">';
                    // var download ='<a>';
                    var download ='<a href="download_file/'+dieset_condition_details[0].request_id+'">';
                        download +='<button type="button" id="download_file" name="download_file" class="btn btn-primary btn-sm d-none">';
                        // download +='<a id="download_file" name="download_file" href="download_file/'+dieset_condition_details.request_id+'">';
                        // href='download_file/".$employee_infos->cash_advance_details->id."'
                        download +=     '<i class="fa-solid fa-file-arrow-down"></i>';
                        download +=         '&nbsp;';
                        download +=         'See Attachment';
                        download +='</button>';
                        download +='</a>';
                    $('#AttachmentDiv').append(download);
                    $("#download_file").removeClass('d-none');
                    $('#frm_txt_request_id_for_parts_drawing').val(dieset_condition_details[0].request_id);
                    $("#modalPartsDrawing").modal('show');
            },
            error: function(data, xhr, status){
                toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    });


    // $('#download_file').on('click', function(e){
    //     let request_id_for_download = $('#frm_txt_request_id_for_parts_drawing').val();
    //     $.ajax({
    //         url: "download_file",
    //         method: "get",
    //         data: {
    //             id : request_id_for_download
    //         },
    //         dataType: "json"
    //     });
    // });

    $("#FrmDeleteRequest").submit(function(event) {
        event.preventDefault();
        DeleteRequest();
    });

    function DeleteRequest() {

        $.ajax({
            url: "delete_request",
            method: "post",
            data: $('#FrmDeleteRequest').serialize(),
            dataType: "json",
            beforeSend: function () {
                $("#deactivateIcon").addClass('fa fa-spinner fa-pulse');
                $("#btnDeleteRequest").prop('disabled', 'disabled');
            },
            success: function (response) {
                let result = response['result'];
                if (result == 1) {
                    dataTableDmrpqc.draw();
                    $("#modalDeleteRequest").modal('hide');
                    toastr.success('Request successfully deleted!');
                }
                else {
                    toastr.warning('Request already deleted!');
                }

                $("#deactivateIcon").removeClass('fa fa-spinner fa-pulse');
                $("#btnDeleteRequest").removeAttr('disabled');
                $("#deactivateIcon").addClass('fa fa-check');
            },
            error: function (data, xhr, status) {
                toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                $("#deactivateIcon").removeClass('fa fa-spinner fa-pulse');
                $("#btnDeleteRequest").removeAttr('disabled');
                $("#deactivateIcon").addClass('fa fa-check');
            }
        });
    }

    //Assign Value
    $('#frm_txt_action_7a').click(function(){
        $('#frm_txt_action_7b').prop('checked', false);
    });

    $('#frm_txt_action_7b').click(function(){
        $('#frm_txt_action_7a').prop('checked', false);
    });

    // UPDATE STATUS OF DIESET REQUEST
    $(document).on('click', '.actionChangeStatusBtn', function(e){
        let id = $(this).attr('dmrpqc_id');
        let process_status = $(this).attr('process_status');
        $("#ChangeStatusRequestID").val(id);
        $("#ProcessStatus").val(process_status);
        // let id = $(this).attr('dmrpqc_id');
        // let process_status = $(this).attr('process_status');
        // let _token = "{{ csrf_token() }}";
        // var data = {
        //     'id' : id,
        //     'process_status' : process_status,
        //     '_token' : _token,
        //   }
        $("#modalChangeStatusRequest").modal('show');
        //   UpdateStatusOfDiesetRequest(data);
    });

    $("#FrmChangeStatusRequest").submit(function(event) {
        event.preventDefault();
        UpdateStatusOfDiesetRequest();
    });

    function UpdateStatusOfDiesetRequest(){
        $.ajax({
            url: "update_status_of_dieset_request",
            method: "post",
            data: $('#FrmChangeStatusRequest').serialize(),
            dataType: "json",
            success: function (response) {
                let result = response['result'];
                if (result == 'Successful') {
                    dataTableDmrpqc.draw();
                    toastr.success('Successful!');
                    $("#modalChangeStatusRequest").modal('hide');
                }
                else if(result == 'Duplicate'){
                    toastr.error('Request Already Submitted!');
                }
                else if(result == 'Session Expired') {
                    toastr.error('Session Expired!, Please Log-in again');
                }else if(result == 'Error'){
                    toastr.error('Error!, Please Contanct ISS Local 208');
                }
            }
        });
    }

    $("#tbl_dmrpqc").on('click', '.actionUpdateBtn', function(e){
        let id = $(this).attr('dmrpqc_id');
        let process_status = $(this).attr('process_status');

        var data = {
            'id' : id,
            'process_status' : process_status
        }

        if(process_status == 2){ //Dieset Condition Part
            $("#frm_prod_identification")[0].reset();
            frmProdIdentification.find('.Part2').removeAttr('hidden',true); //hide Part2
            frmProdIdentification.find('.Part3').attr('hidden',true);  //hide Part3
            frmProdIdentification.find('.Part4').attr('hidden',true);  //hide Part4
            frmProdIdentification.find('.Part5').attr('hidden',true);  //hide Part5
            frmProdIdentification.find('#collapseTwo').addClass('show',true);
            frmProdIdentification.find('#collapseThree').removeClass('show',true);
            frmProdIdentification.find('#collapseFour').removeClass('show',true);
            frmProdIdentification.find('#collapseFive').removeClass('show',true);
            $('#btnPartsDrawing').removeClass('d-none');

            $("#frm_prod_identification .dieset_condition_data").attr('disabled', false);
            $('#frm_txt_details_of_activity').removeAttr('readonly');
            $('#frm_mold_check_remarks').removeAttr('readonly');

            $("#tbl_action_done .ActionDoneChckbox").attr('required', true);
            $("#tbl_check_points .dieset_condition_data").attr('disabled', true);
            $("#frm_check_point_remarks").attr('disabled', true);
            // $('#btnPartsDrawing').addClass('d-none');
            ActionDonePartsNoArr = [];
            ActionDoneQuantityArr = [];
        }else{
            // $("#tbl_action_done .ActionDoneChckbox").attr('required', true);
            $("#tbl_action_done .dieset_condition_data").attr('disabled', true);
            $("#tbl_action_done .dieset_condition_data").css("color", "#6C757D");
            $("#tbl_action_done .dieset_condition_data").css("opacity", ".5");

            // $("#tbl_parts_no_and_qty .dieset_condition_data").attr('disabled', true);

            // $(".dieset_condition_data").find('input').attr('disabled',true);
            // frmProdIdentification.find('select').attr('disabled',true);
            $("#frm_txt_details_of_activity").attr('disabled', true);
            $("#frm_check_point_remarks").attr('disabled', true);

            frmProdIdentification.find('input').attr('disabled',true);
            frmProdIdentification.find('select').attr('disabled',true);
            // frmProdIdentification.find('button').attr('disabled',true);
            frmProdIdentification.find('textarea').attr('readonly',true);
        }

        if(process_status == 3){ //Dieset Condition Checking Part
            $("#frm_prod_identification")[0].reset();
            frmProdIdentification.find('.Part3').removeAttr('hidden',true); //show Part3
            frmProdIdentification.find('.Part4').attr('hidden',true);   //hide Part4
            frmProdIdentification.find('.Part5').attr('hidden',true);   //hide Part5
            frmProdIdentification.find('#collapseThree').addClass('show',true); //collapse Part3 div
            frmProdIdentification.find('#collapseFour').removeClass('show',true); //remove/fold Part4 div
            frmProdIdentification.find('#collapseFive').removeClass('show',true); //remove/fold Part5 div
            $('#btnPartsDrawing').removeClass('d-none');

        }
        // else if(process_status == 4){ //Dieset Condition Checking Part
        //     $("#frm_prod_identification")[0].reset();
        //     frmProdIdentification.find('.Part3').removeAttr('hidden',true);
        //     frmProdIdentification.find('.Part4').attr('hidden',true);
        //     frmProdIdentification.find('.Part5').attr('hidden',true);
        //     frmProdIdentification.find('#collapseThree').addClass('show',true);
        //     frmProdIdentification.find('#collapseFour').removeClass('show',true);
        //     frmProdIdentification.find('#collapseFive').removeClass('show',true);
        // }

        // $('#tbl_parts_no_and_qty tbody').empty();

        GetUserIDBySession();
        GetDmrpqcDetails(data);
    });

    //FUNCTION FOR ActionDoneChckbox(Action Done 1 - 7)
    $("#tbl_action_done").on('click', '.ActionDoneChckbox', function(e){
        let value = $(this).attr('value');
        let index = $(this).attr('index');
        console.log('click action done', index);
        if($('.ActionDoneChckbox[index="'+index+'"][value="'+value+'"]').prop('checked')){
            console.log('required false');
            $("#tbl_action_done .ActionDoneChckbox").attr('required', false);
        }
        // else if($('.ActionDoneChckbox[index="1.8"][value="'+value+'"]').prop('checked')){
        //     console.log('required false');
        //     $("#tbl_action_done .ActionDoneChckbox").attr('required', false);
        // }
        else{
            console.log('required true');
            $("#tbl_action_done .ActionDoneChckbox").attr('required', true);
        }
    });

    //FUNCTION FOR #frm_txt_action_4(Action Done 4)
    $("#tbl_action_done").on('click', '#frm_txt_action_4', function(e){
        // console.log('test 4');
        // $('.dieset_condition_data[index="1.'+action_index+'"]').prop('checked', true);
        if($('#tbl_action_done #frm_txt_action_4').prop('checked')){
            $("#tbl_check_points .dieset_condition_data").attr('disabled', false);
            $("#frm_check_point_remarks").attr('disabled', false);
            $("#frm_check_point_remarks").attr('readonly', false);
            $("#tbl_action_done .Action4Chckbox").attr('required', true);
            $("#tbl_check_points .dieset_condition_data").attr('required', true);
        }else{
            $("#tbl_check_points .dieset_condition_data").attr('disabled', true);
            $("#frm_check_point_remarks").attr('disabled', true);
            $("#tbl_action_done .Action4Chckbox").attr('required', false);

        }
    });

    function require_if_unchecked(ClassName){
        if(ClassName.prop('checked')){
            console.log('checked, not required');
            ClassName.attr('required', false);
        }else{
            console.log('unchecked, required');
            ClassName.attr('required', true);
        }
    }

    //FUNCTION FOR ActionDone4ChckBox(Action Done 4a, 4b, 4c, 4d)
    $("#tbl_action_done").on('click', '.Action4Chckbox', function(e){
        require_if_unchecked($(this));
    });

    //FUNCTION FOR ActionDone7ChckBox(Action Done 7a, 7b, 7c, 7d)
    $("#tbl_action_done").on('click', '.Action7Chckbox', function(e){
        if($('#tbl_action_done .Action7Chckbox').prop('checked')){
            $("#tbl_action_done .Action7Chckbox").attr('required', false);
        }else{
            $("#tbl_action_done .Action7Chckbox").attr('required', true);
        }
    });

    // HAHA
    //FUNCTION FOR #frm_txt_action_7(Action Done 7)
    $("#tbl_action_done").on('click', '#frm_txt_action_7', function(e){
        if($('#tbl_action_done #frm_txt_action_7').prop('checked')){
            console.log('click on');
            // $("#tbl_check_points .dieset_condition_data").attr('disabled', false);
            // $("#frm_check_point_remarks").attr('disabled', false);
            // $("#tbl_check_points .dieset_condition_data").attr('required', true);
            $("#tbl_action_done .Action7Chckbox").attr('required', true);
            // .ActionDoneChckbox[index="1.8"][value="'+value+'"]
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='parts_no']").attr('required', true);
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='quantity']").attr('required', true);
            $("#tbl_action_done").on('click', '#frm_txt_action_7b', function(e){
                if($('#tbl_action_done #frm_txt_action_7b').prop('checked') && $('#tbl_action_done #frm_txt_action_7').prop('checked')){
                    $('#modalPartsDrawing').modal('show');
                    $('#tblPartsDrawingData tbody .addRowforEdit').remove();
                    $('#btnPartsDrawingRemoveRow').addClass('d-none');

                    $("#txtEditUploadedFile").addClass('d-none');
                    $("#btnReuploadTrigger").addClass('d-none');
                    $("#btnReuploadTriggerDiv").addClass('d-none');
                    $("#btnReuploadTriggerLabel").addClass('d-none');
                    $("#txtAddFile").removeClass('d-none');
                    $("#download_file").addClass('d-none');

                    SpecificationArr     = [];
                    ActualMeasurementArr = [];
                }else{
                    $('#modalPartsDrawing').modal('hide');
                }
            });
        }else{
            console.log('click off');
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='parts_no']").attr('required', false);
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='quantity']").attr('required', false);
            $("#tbl_action_done .Action7Chckbox").attr('required', false);
            // $("#tbl_check_points .dieset_condition_data").attr('disabled', true);
            // $("#frm_check_point_remarks").attr('disabled', true);
        }
    });

    // $('#modalPartsDrawing').on('hidden.bs.modal', function (e) {
    //     $('#tbl_action_done #frm_txt_action_7').prop('checked', false);
    //     $('#tbl_action_done #frm_txt_action_7b').prop('checked', false);
    //     $("#tbl_parts_no_and_qty .dieset_condition_data[name='parts_no']").attr('required', false);
    //     $("#tbl_parts_no_and_qty .dieset_condition_data[name='quantity']").attr('required', false);
    // });

    // $("#tbl_action_done").on('click', '#frm_txt_action_7', function(e){
    $('#modalPartsDrawing').on('click', '#CloseBtnFrmPartsDrawing', function(e){
        console.log('cancel botton');
        if($("#frm_txt_request_id_for_parts_drawing").val() === ''){
            console.log('walang laman');
            $('#tbl_action_done #frm_txt_action_7').prop('checked', false);
            $('#tbl_action_done #frm_txt_action_7b').prop('checked', false);
            $("#tbl_action_done .Action7Chckbox").attr('required', false);
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='parts_no']").attr('required', false);
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='quantity']").attr('required', false);
        }
        else{
            console.log('norem');
            $('#tbl_action_done #frm_txt_action_7').prop('checked', true);
            $('#tbl_action_done #frm_txt_action_7b').prop('checked', true);
            $("#tbl_action_done .Action7Chckbox").attr('required', true);
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='parts_no']").attr('required', true);
            $("#tbl_parts_no_and_qty .dieset_condition_data[name='quantity']").attr('required', true);
        }
        $("#FrmPartsDrawing")[0].reset();
        // $('#frm_txt_action_7b').prop('checked', false);
    });

    function GetDmrpqcDetails(data){
        $.ajax({
            url: "get_dmrpqc_details_id",
            method: "get",
            data: data,
            dataType: "json",
            beforeSend(){
                $('#tbl_parts_no_and_qty tbody .addRowforEdit').remove();
                $('#btn_remove_row').addClass('d-none');
            },
            success: function(response){
                    let dmrpqc_details = response['dmrpqc_details'];
                    let dieset_condition_details = response['dieset_condition_details'];
                    let dieset_condition_checking_details = response['dieset_condition_checking_details'];

                    $("#txt_global_dmrpqc_id").val(dmrpqc_details[0].id);
                    $("#txt_global_status").val(dmrpqc_details[0].process_status);

                    $("#frm_txt_device_name").val(dmrpqc_details[0].device_name);
                    $("#frm_txt_po_no").val(dmrpqc_details[0].po_number);
                    $("#frm_txt_item_code").val(dmrpqc_details[0].item_code);
                    $("#frm_txt_die_no").val(dmrpqc_details[0].die_no);
                    $("#frm_txt_drawing_no").val(dmrpqc_details[0].drawing_no);
                    $("#frm_txt_rev_no").val(dmrpqc_details[0].rev_no);
                    $("#frm_txt_start_datetime").val(dmrpqc_details[0].start_date_time);
                    $("#frm_request_type").val(dmrpqc_details[0].request_type);

                        if(dieset_condition_details != ''){
                            let action_done_arr = [];
                            let check_point_arr = [];
                            let mold_check_arr  = [];

                            action_done_arr.push(dieset_condition_details[0].action_1_mold_cleaned,
                                                dieset_condition_details[0].action_2_mold_check,
                                                dieset_condition_details[0].action_3_device_conversion,
                                                dieset_condition_details[0].action_4_dieset_overhaul,
                                                dieset_condition_details[0].action_4a_fix_side,
                                                dieset_condition_details[0].action_4b_movement_side,
                                                dieset_condition_details[0].action_4c_with_parts_marking,
                                                dieset_condition_details[0].action_4d_without_parts_marking,
                                                dieset_condition_details[0].action_5_reversible_parts_installed,
                                                dieset_condition_details[0].action_6_repair,
                                                dieset_condition_details[0].action_7_parts_change,
                                                dieset_condition_details[0].action_7a_new,
                                                dieset_condition_details[0].action_7b_fabricated,
                                                dieset_condition_details[0].action_7c_with_parts_marking,
                                                dieset_condition_details[0].action_7d_with_parts_change_notice
                            );

                            check_point_arr.push(dieset_condition_details[0].check_point_1_marking_check,
                                                dieset_condition_details[0].check_point_2_tanshi_pin,
                                                dieset_condition_details[0].check_point_2a_crack,
                                                dieset_condition_details[0].check_point_2b_bend,
                                                dieset_condition_details[0].check_point_2c_worn_out,
                                                dieset_condition_details[0].check_point_3_dent,
                                                dieset_condition_details[0].check_point_4_porous,
                                                dieset_condition_details[0].check_point_5_ejector_pin,
                                                dieset_condition_details[0].check_point_6_coma,
                                                dieset_condition_details[0].check_point_7_gasvent,
                                                dieset_condition_details[0].check_point_8_assy_orientation,
                                                dieset_condition_details[0].check_point_9_fs_ms_fitting,
                                                dieset_condition_details[0].check_point_10_sub_gate
                            );

                            mold_check_arr.push(dieset_condition_details[0].mold_check_1_withdraw_pin_external,
                                                dieset_condition_details[0].mold_check_2_withdraw_pin_internal,
                                                dieset_condition_details[0].mold_check_3_slidecore_stopper,
                                                dieset_condition_details[0].mold_check_4_locator_ring,
                                                dieset_condition_details[0].mold_check_5_bolts_nuts,
                                                dieset_condition_details[0].mold_check_6_stripper_plate
                            );

                            let action_index = 0;
                            while(action_index < action_done_arr.length){
                                if(action_done_arr[action_index] == 1){
                                    $('.dieset_condition_data[index="1.'+action_index+'"]').prop('checked', true);
                                }else{
                                    $('.dieset_condition_data[index="1.'+action_index+'"]').prop('checked', false);
                                }
                                if(action_index == 8){
                                    if(action_done_arr[action_index] == 1){
                                        $('.dieset_condition_data[index="1.'+action_index+'"][value="1"]').prop('checked', true);
                                    }else if(action_done_arr[action_index] == 0){
                                        $('.dieset_condition_data[index="1.'+action_index+'"][value="0"]').prop('checked', true);
                                    }else{
                                        $('.dieset_condition_data[index="1.'+action_index+'"]').prop('checked', false);
                                    }
                                }
                                action_index++;
                            }

                            let checkpoint_index = 0;
                            while(checkpoint_index < check_point_arr.length){
                                if(check_point_arr[checkpoint_index] == 'OK'){
                                    $('.dieset_condition_data[index="2.'+checkpoint_index+'"][value="OK"]').prop('checked', true);
                                }else if(check_point_arr[checkpoint_index] == 'NG'){
                                    $('.dieset_condition_data[index="2.'+checkpoint_index+'"][value="NG"]').prop('checked', true);
                                }else{
                                    $('.dieset_condition_data[index="2.'+checkpoint_index+'"]').prop('checked', false);
                                }

                                if(checkpoint_index == 2 || checkpoint_index == 3 || checkpoint_index == 4){
                                    if(check_point_arr[checkpoint_index] == 1){
                                        $('.dieset_condition_data[index="2.'+checkpoint_index+'"]').prop('checked', true);
                                    }else{
                                        $('.dieset_condition_data[index="2.'+checkpoint_index+'"]').prop('checked', false);
                                    }
                                }
                                if(checkpoint_index == 9){
                                    $('.dieset_condition_data[index="2.'+checkpoint_index+'"]').val(check_point_arr[checkpoint_index]);
                                }
                                checkpoint_index++;
                            }

                            let mold_check_index = 0;
                            while(mold_check_index < mold_check_arr.length){
                                if(mold_check_arr[mold_check_index] == 'OK'){
                                    $('.dieset_condition_data[index="3.'+mold_check_index+'"][value="OK"]').prop('checked', true);
                                }else if(mold_check_arr[mold_check_index] == 'NG'){
                                    $('.dieset_condition_data[index="3.'+mold_check_index+'"][value="NG"]').prop('checked', true);
                                }else if(mold_check_arr[mold_check_index] == 'N/A'){
                                    $('.dieset_condition_data[index="3.'+mold_check_index+'"][value="N/A"]').prop('checked', true);
                                }else{
                                    $('.dieset_condition_data[index="3.'+mold_check_index+'"]').prop('checked', false);
                                }
                                mold_check_index++;
                            }

                            let parts_no = dieset_condition_details[0].parts_no.split(",");
                            let quantity = dieset_condition_details[0].quantity.split(",");
                            console.log(parts_no);
                            console.log(quantity);

                            $('.dieset_condition_data[index="4.1"][name="parts_no"]').val(parts_no[0]); //static set of value to static attr:index
                            $('.dieset_condition_data[index="4.1"][name="quantity"]').val(quantity[0]); //static set of value to static attr:index

                            let edit_row_counter = (parts_no.length);
                            if(edit_row_counter > 1){
                                $('#btn_remove_row').removeClass('d-none');
                            }
                            for(let index = 1; index < parts_no.length && index < quantity.length; index++){
                                var html = '<tr class="addRowforEdit" id="row_'+(index+1)+'">';
                                        // html += '<td>';
                                        //     html += '<input type="text" class="form-control" name="row_counter" id="row_counter" value="'+row_counter+'" readonly>';
                                        // html += '</td>';
                                        html += '<td hidden></td>';
                                        html += '<td class="text-center align-middle">'+(index+1)+'.</td>';
                                        html += '<td>';
                                            html += '<input type="text" class="form-control dieset_condition_data" index="4.'+(index+1)+'" name="parts_no" id="frm_parts_no_'+(index+1)+'" value="'+parts_no[index]+'">';
                                        html += '</td>';
                                        html += '<td>';
                                            html += '<input type="text" class="form-control dieset_condition_data" index="4.'+(index+1)+'" name="quantity" id="frm_quantity_'+(index+1)+'" value="'+quantity[index]+'">';
                                        html += '</td>';
                                    html += '</tr>';

                                $('#row_counter').val(edit_row_counter);
                                $('#tbl_parts_no_and_qty tbody').append(html);
                            }

                            if(dmrpqc_details[0].process_status != 2 ){
                                $("#tbl_parts_no_and_qty .dieset_condition_data").attr('disabled', true);
                            }else{
                                $("#tbl_parts_no_and_qty .dieset_condition_data").attr('disabled', false);
                            }

                            $("#frm_txt_details_of_activity").val(dieset_condition_details[0].details_of_activity);
                            $("#frm_txt_action_date_start").val(dieset_condition_details[0].action_done_date_start);
                            $("#frm_txt_action_start_time").val(dieset_condition_details[0].action_done_start_time);
                            $("#frm_txt_action_finish_time").val(dieset_condition_details[0].action_done_finish_time);
                            $("#frm_check_point_remarks").val(dieset_condition_details[0].check_point_remarks);
                            $("#frm_mold_check_remarks").val(dieset_condition_details[0].mold_check_remarks);
                            let mold_check_date_time = dieset_condition_details[0].mold_check_date.concat(" ", dieset_condition_details[0].mold_check_time);
                            $("#frm_mold_check_date_time").val(mold_check_date_time);
                            $("#frm_mold_check_status").val(dieset_condition_details[0].mold_check_status);

                            if(dieset_condition_details[0].final_remarks == 1){
                                $('.dieset_condition_data[name="final_remarks"][value="1"]').prop('checked', true);
                            }else if(dieset_condition_details[0].final_remarks == 2){
                                $('.dieset_condition_data[name="final_remarks"][value="2"]').prop('checked', true);
                            }else{
                                $('.dieset_condition_data[name="final_remarks"]').prop('checked', false);
                            }

                            if(dieset_condition_details[0].in_charged == null){
                                $("#frm_txt_action_in_charged_id").val($("#txt_user_id").val());
                                $("#frm_txt_action_in_charged").val($("#txt_user_name").val());
                            }else{
                                $("#frm_txt_action_in_charged_id").val(dieset_condition_details[0].in_charged.id);
                                $("#frm_txt_action_in_charged").val(dieset_condition_details[0].in_charged.rapidx_user_details.name);
                            }

                            if(dieset_condition_details[0].mold_check_checked_by == null){
                                $("#frm_txt_mold_check_checked_by_id").val($("#txt_user_id").val());
                                $("#frm_txt_mold_check_checked_by").val($("#txt_user_name").val());
                            }else{
                                $("#frm_txt_mold_check_checked_by_id").val(dieset_condition_details[0].checked_by.id);
                                $("#frm_txt_mold_check_checked_by").val(dieset_condition_details[0].checked_by.rapidx_user_details.name);
                            }

                            switch(dieset_condition_details[0].references_used){
                                case 1: $('.dieset_condition_data[name="references_used"][value="1"]').prop('checked', true); break;
                                case 2: $('.dieset_condition_data[name="references_used"][value="2"]').prop('checked', true); break;
                                case 3: $('.dieset_condition_data[name="references_used"][value="3"]').prop('checked', true); break;
                                case 4: $('.dieset_condition_data[name="references_used"][value="4"]').prop('checked', true); break;
                                default: $('.dieset_condition_data[name="references_used"]').prop('checked', false); break;
                            }
                        }
                    $('#modalProdIdentification').modal('show');
            },
            error: function(data, xhr, status){
                toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    }

});

</script>
@endsection
