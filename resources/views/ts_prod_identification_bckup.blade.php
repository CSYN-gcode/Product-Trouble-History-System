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

        {{-- Search PO from PPS Database System --}}
        {{-- <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Search PO Number</h3>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <label>PO Number</label>
                        <input type="text" class="form-control" id="txt_po_number" value="" placeholder="Search PO No.">
                      </div>
                      <div class="col-sm-3">
                        <label>Device Name</label>
                        <input type="text" class="form-control" id="txt_device_name" readonly>
                      </div>
                      <div class="col-sm-2">
                        <label>Item Code</label>
                        <input type="text" class="form-control" id="txt_item_code" readonly>
                      </div>
                      <div class="col-sm-1">
                        <label>Die No.</label>
                        <input type="text" class="form-control" id="txt_die_no" readonly>
                      </div>
                      <div class="col-sm-2">
                        <label>Drawing No.</label>
                        <input type="text" class="form-control" id="txt_drawing_no" readonly>
                      </div>
                      <div class="col-sm-1">
                        <label>Rev No.</label>
                        <input type="text" class="form-control" id="txt_rev_no" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> --}}

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
                                    <option value="0" disabled selected>Select Month</option>
                                    <option value="" >All</option>
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
                                        <th>Action</th>
                                        <th>Status</th>
                                        <th>Device Name</th>
                                        <th>PO No.</th>
                                        <th>Item Code</th>
                                        <th>Request Type</th>
                                        <th>Created By</th>
                                        <th>Start Date/Time</th>
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
                    <div class="row d-none">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">Global ID</span>
                                </div>
                                <input type="text" name="global_dmrpqc_id" id="global_dmrpqc_id">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">Status</span>
                                </div>
                                <input type="text" name="global_status" id="global_status">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">Employee ID</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="txt_user_id" name="user_id" readonly>
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
                                            <input type="text" class="form-control form-control-sm" id="frm_txt_po_no" name="po_no" placeholder="Insert PO Number" required>
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
                            <div class="Part2and3Div" hidden><!-- PART II & III IS HIDDEN -->
                                <hr><!-- Visible Line -->
                                    {{-- <h5 class="modal-title">II. Dieset Condition <strong>(Responsible:Die Maintenance Engineering)</strong></h5> --}}
                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5 class="modal-title">II. Dieset Condition <strong>(Responsible:Die Maintenance Engineering)</strong></h5>
                                    </button>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                                        <div class="row col-sm-12">
                                            <div class="col-sm-3 border border-right-0 border-bottom-0 border-dark">
                                                <strong><label class="form-check-label"> Action Done </label></strong>
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-borderless table-hover display nowrap" style="width: 100%;">
                                                        {{-- table-borderless --}}
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 0" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> 1. Mold Cleaned</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> 2. Mold Check</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25">
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> 3. Device conversion (Coma change)</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> 4. Die set Overhaul</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Fix side</label>
                                                                    </div>
                                                                    <div style="margin-left: 2%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Movement side</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> With parts marking</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Without part(s) marking (Qty: )</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <label class="form-check-label"> 5. With parts that can reversely installed</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Yes</label>
                                                                    </div>
                                                                    <div style="margin-left: 10%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> No</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> 6. Repair</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> 7. Parts change</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> New</label>
                                                                    </div>
                                                                    <div style="margin-left: 8%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Fabricated</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> With part(s) marking</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> With die-set part(s) change notice</label>
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
                                                    <textarea class="form-control" style="height: 200px;"></textarea>
                                                </div>
                                                <br>
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td width="20%" class="text-center align-middle">
                                                                    <label class="form-check-label"> Parts No.</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td width="35%" style="padding: ">
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center align-middle">
                                                                    <label class="form-check-label"> Quantity</label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                            </tr>
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
                                                                <td>
                                                                    <label class="form-check-label"> In-charged</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" readonly>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 border border-left-0 border-right-0 border-bottom-0 border-dark">
                                                <strong><label class="form-check-label"> Checkpoints during Mold overhauling:</label></strong>
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-borderless table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2"></td>
                                                                <td width="30" class="form-check-label">OK</td>
                                                                <td width="30" class="form-check-label">N.G</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">1. Marking Check</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">2. Tanshi Pin</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div style="margin-left: 15%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Crack</label>
                                                                    </div>
                                                                    <div style="margin-left: 2%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Bend</label>
                                                                    </div>
                                                                    <div style="margin-left: 2%" class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        &NonBreakingSpace;
                                                                        <label class="form-check-label"> Worn out</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">3. Dent</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">4. Porous</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">5. Ejection Pin</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">6. Coma</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
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
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">8. Assy. Orientation</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">9. F.S and M.S fittings</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">10. Sub. Gate appearance</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 border border-left-0 border-bottom-0 border-dark">
                                                <strong><label class="form-check-label"> Remarks:</label></strong>
                                            <br>
                                            <textarea class="form-control" style="height: 200px;"></textarea>
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
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">2. Withdraw Pin (Internal)</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">3. Slidecore stopper</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">4. Locator ring</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">5. Bolts and Nuts</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">6. Stripper plate</td>
                                                                <td id="april-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                                </td>
                                                                <td id="may-target">
                                                                    &nbsp;
                                                                    <input style="margin-left:0" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
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
                                                    <textarea class="form-control" style="height: 200px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 border border-left-0 border-dark">
                                                <div class="table-responsive col-sm-12">
                                                    <strong><label class="form-check-label">References Used </label></strong>
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-bordered table-hover display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr class="align-middle">
                                                                <td width="25">
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Eval Sample</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Japan Sample</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
                                                                </td>
                                                                <td colspan="3">
                                                                    <label class="form-check-label"> Dieset Assy. Drawing</label>
                                                                </td>
                                                            </tr>
                                                            <tr class="align-middle">
                                                                <td>
                                                                    <input style="margin-left:0" class="form-check-input" type="checkbox" value="option1">
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
                                                <div class="table-responsive col-sm-12">
                                                    <table id="tblViewEnergyConsumption" class="table table-sm table-borderless display nowrap" style="width: 100%;">
                                                        <tbody>
                                                            <tr class="text-center align-middle">
                                                                <td colspan="2">
                                                                    <label class="form-check-label"> Checked by:</label>
                                                                </td>
                                                                <td>
                                                                    <label class="form-check-label"> Date</label>
                                                                </td>
                                                                <td>
                                                                    <label class="form-check-label"> Time</label>
                                                                </td>
                                                                <td>
                                                                    <label class="form-check-label"> Status</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <input type="text" class="form-control" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control">
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
                                                                        <input class="form-check-input" type="checkbox" value="option1">
                                                                        <label class="form-check-label"> No problem found</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="checkbox" value="option1">
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
                                <hr><!-- Visible Line -->
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
                                                                    <input type="text" class="form-control" readonly>
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
                        </div>
                  </div> <!-- End Body -->
                  <div class="modal-footer">
                      <div class="actions">
                          <button type="submit" id="id_btn_save_prod_identification" class="btn btn-primary btn-sm"><i class="fa fa-check fa-xs icon_save_prod_identification"></i> Save</button>
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
                            {{-- <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                        <select class="form-control selectSupplier" name="device_name" id="supplier_name" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                            </div> --}}

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

        <!-- DEACTIVATE USER MODAL START -->
        <div class="modal fade" id="modalDeleteRequest">
            <div class="modal-dialog">
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
                                    class="fa fa-check"></i> Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- DEACTIVATE USER MODAL END -->

    @endsection

    @section('js_content')

    <style>
        table.dataTable td {
        font-size:  1em;
        padding:    5px 5px !important;
        text-align: center;
        }
    </style>

<script type="text/javascript">

$(document).ready(function() {

    var frmProdIdentification = $('#frm_prod_identification');

    // GetRequestorNameBySession();

    // GET PREPARED BY FOR MATERIAL ISSUANCE
    function GetRequestorNameBySession(){
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
        { "data": "created_by" },
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
            $("#modalProdIdentification").modal('show');
            GetRequestorNameBySession();
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

    $("#frm_prod_identification").submit(function(event){
    event.preventDefault();
    AddDmrpqc();
    });

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
                    if(JsonObject['error']['request_type']===undefined){
                        frmProdIdentification.find('#request_type').removeClass('is-invalid');
                        frmProdIdentification.find('#request_type').attr('title','');
                    }else{
                        frmProdIdentification.find('#request_type').addClass('is-invalid');
                        frmProdIdentification.find('#request_type').attr('title',JsonObject['error']['request_type']);
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

    // ======================= GET MATERIAL ISSUANCE DATA FOR VIEWING (STATUS: 1) ====================
    $("#tbl_dmrpqc").on('click', '.actionViewBtn', function(e){
        let id = $(this).attr('dmrpqc_id');
        $.ajax({
            url: "get_dmrpqc_details_id",
            method: "get",
            data: {
                id: id,
            },
            dataType: "json",
            success: function(response){
                    let dmrpqc_details = response['dmrpqc_details'];

                    // $('#txt_device_name').val(pps_details[0].ItemName);
                    // $('#txt_po_number').val(pps_details[0].OrderNo);
                    // $('#txt_item_code').val(pps_details[0].ItemCode);
                    // $('#txt_die_no').val(pps_dieset.DieNo);
                    // $('#txt_drawing_no').val(pps_dieset.DrawingNo);
                    // $('#txt_rev_no').val(pps_dieset.Rev);

                    $("#frm_txt_device_name").val(dmrpqc_details[0].device_name);
                    $("#frm_txt_po_no").val(dmrpqc_details[0].po_number);
                    $("#frm_txt_item_code").val(dmrpqc_details[0].item_code);
                    $("#frm_txt_die_no").val(dmrpqc_details[0].die_no);
                    $("#frm_txt_drawing_no").val(dmrpqc_details[0].drawing_no);
                    $("#frm_txt_rev_no").val(dmrpqc_details[0].rev_no);
                    $("#frm_txt_start_datetime").val(dmrpqc_details[0].start_date_time);
                    $("#frm_request_type").val(dmrpqc_details[0].request_type);

                    $('#modalProdIdentification').modal('show');
                    frmProdIdentification.find('.Part2and3Div').removeAttr('hidden',true);
                    frmProdIdentification.find('#collapseTwo').addClass('show',true);
                    frmProdIdentification.find('#collapseThree').addClass('show',true);
                    frmProdIdentification.find('input').attr('disabled',true);
                    frmProdIdentification.find('select').attr('disabled',true);
                    // frmProdIdentification.find('button').attr('disabled',true);
                    frmProdIdentification.find('textarea').attr('readonly',true);

            }
        });
      });

    // DELETE REQUEST
    $(document).on('click', '.actionDeleteRequest', function(e){
        let id = $(this).attr('dmrpqc_id');
        $("#deleterequestID").val(id);
        $("#modalDeleteRequest").modal('show');
    });

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

    // DELETE REQUEST
    $(document).on('click', '.actionSubmitRequest', function(e){
        let id = $(this).attr('dmrpqc_id');
        let _token = "{{ csrf_token() }}";

        var data = {
            'id' : id,
            '_token' : _token,
          }
        SubmitRequest(data);
    });

    function SubmitRequest(data) {
        $.ajax({
            url: "submit_request",
            method: "post",
            data: data,
            dataType: "json",
            success: function (response) {
                let result = response['result'];
                if (result == 1) {
                    dataTableDmrpqc.draw();
                    toastr.success('Request submitted!');
                }
                else if(result == 2) {
                    toastr.warning('Session Expired!, Please Log-in again');
                }
                else if(result == 3) {
                    toastr.warning('Request is already submitted!');
                }
            }
        });
    }

});

</script>
@endsection
