@php $layout = 'layouts.super_user_layout'; @endphp

{{-- @auth
    @php
    if (Auth::user()->user_level_id == 1) {
        $layout = 'layouts.super_user_layout';
    } elseif (Auth::user()->user_level_id == 2) {
        $layout = 'layouts.admin_layout';
    } elseif (Auth::user()->user_level_id == 3) {
        $layout = 'layouts.user_layout';
    }
    @endphp
@endauth --}}

{{-- Here I removed the @auth because the dashboard isn't loading properly --}}
@extends($layout)
@section('title', 'Paper Consumption')

@section('content_page')
    {{-- <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Paper Consumption</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Paper Consumption</li>
                        </ol>
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
                                <h3 class="card-title">Paper Consumption</h3>
                            </div>
                            <div class="card-body">
                                    <div class="text-left mt-4 d-flex flex-row">
                                        <div class="form-group ml-3 col-2">
                                            <label><strong>Fiscal Year :</strong></label>
                                            <select class="form-control select2bs4 selectYearPaper" name="fiscal_year_value"
                                                id="selFiscalYearPaper" style="width: 100%;">
                                            </select>
                                        </div>

                                        <div class="form-group ml-3 col-2">
                                            <label><strong>Month :</strong></label>
                                            <select class="form-control select2bs4 selectMonthPaper" name="month_value"
                                                id="selMonthPaper" style="width: 100%;">
                                                <option value="0" disabled selected>Select Month</option>
                                                <option value="" >All</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>

                                        <div class="form-group ml-3 col-2" id="department_filter" style="display: none;">
                                            <label><strong>Department :</strong></label>
                                            <select class="form-control select2bs4 selectDepartment" name="month_value"
                                                id="selDepartment" style="width: 100%;">
                                                <option value="0" disabled selected>Select Department</option>
                                                <option value="">All</option>
                                                <option value="1">CN</option>
                                                <option value="2">PPS</option>
                                                <option value="3">TS</option>
                                                <option value="4">YF</option>
                                            </select>
                                        </div>

                                        <div style="margin-left: auto">

                                            <button class="btn btn-primary paper_admin_addtarget" style="display: none;" data-toggle="modal" data-target="#modalPaperTargetSemiAdmin"
                                                id="btnShowPaperTargetSemiAdmin"><i class="fa fa-plus fa-md"></i> (Admin) Add Monthly
                                                Target</button> &nbsp;

                                            <button class="btn btn-primary paper_admin_addactual" style="display: none;" data-toggle="modal"
                                                data-target="#modalPaperConsumptionSemiAdmin" id="btnShowPaperActualSemiAdmin"><i
                                                    class="fa fa-plus fa-md"></i>(Admin) Add Actual Consumption</button>

                                            <button class="btn btn-primary paper_user_addtarget" style="display: none;" data-toggle="modal" data-target="#modalPaperTarget"
                                                id="btnShowPaperTarget"><i class="fa fa-plus fa-md"></i> Add Monthly
                                                    Target</button> &nbsp;

                                            <button class="btn btn-primary paper_user_addactual" style="display: none;" data-toggle="modal"
                                                data-target="#modalPaperConsumption" id="btnShowPaperActual"><i
                                                    class="fa fa-plus fa-md"></i> Add Actual Consumption</button>
                                        </div>
                                    </div><br>

                                    <div class="table-responsive" style="overflow: scroll; height: 500px;" >
                                        <table id="tblPaperConsumption"
                                            class="table table-md table-bordered table-striped table-hover text-center"
                                            style="width: 100%;">
                                            <thead>
                                                <tr>

                                                    <th>Month</th>
                                                    <th>Fiscal Year</th>
                                                    <th>Year</th>
                                                    <th>Department</th>
                                                    <th class="text-white" style="background-color: rgb(21, 163, 245); 200px;">Target (Ream)</th>
                                                    <th class="text-white" style="background-color: rgb(9, 189, 33); 200px;">Actual (Ream)</th>
                                                    <th style="width: 200px;">Status</th>
                                                    <th style="width: 500px;">Reason for usage</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> --}}

    <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <h1>A. Material / Product / Process Requirement Checking <br> (In-Charge: Production)</h1>
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
                    <h3 class="card-title">Search PO Number</h3>
                  </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <label>PO Number</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-primary btnSearchPoNo" title="Scan PO Code"><i class="fa fa-qrcode"></i></button>
                          </div>
                          <input type="text" class="form-control" id="txt_po_number" value="" placeholder="Scan PO Code." readonly>
                        </div>
                       <!--  <div class="input-group">
                          <input type="text" class="form-control" id="txt_po_number">
                        </div> -->
                      </div>
                      <div class="col-sm-3">
                        <label>Device Name</label>
                        <input type="text" class="form-control" id="txt_device_name_lbl" readonly>
                      </div>
                      <div class="col-sm-2">
                        <label>Device Code</label>
                       <input type="text" class="form-control" id="txt_device_code_lbl" readonly>
                      </div>
                      <div class="col-sm-1">
                        <label>PO Qty</label>
                        <input type="text" class="form-control" id="txt_po_qty_lbl" readonly>
                      </div>
                    </div>
                  </div>
                </div>
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
                    <h3 class="card-title">A. Material / Product / Process Requirement Checking Summary</h3>
                    <button class="btn btn-primary btn-sm" style="float: right;" id="btnShowAddPilotRun"><i class="fa fa-plus"></i> Add Pilot Run</button>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table table-sm table-bordered table-hover" id="tbl_pilot_run1" style="min-width: 900px;">
                          <thead>
                            <tr class="bg-light">
                            <th>Action</th>
                            <th>Status</th>
                            {{-- <th>Control Type</th>
                            <th>Pair No.</th> --}}
                            <th>Created At</th>
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

        <div class="modal fade" id="modalPilotRunDetailsA" tabindex="-1" role="dialog" aria-labelledby="cnptsmodal" aria-hidden="true" data-backdrop="static">
          <div class="modal-dialog modal-xl modal-xl-custom modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-info-circle text-info"></i> A - Pilot Run Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>

              <form id="frm_pilotrun_Adetails" method="post">
                @csrf
                <div class="modal-body">
                    <!--Start of Pilot Run A-->
                  <center>
                    <h3>PILOT RUN EVALUATION REPORT</h3>
                  </center>
                  <div class="row d-none">
                    <div class="col-sm-3">
                        <div class="input-group input-group-sm mb-2">
                            <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="basic-addon1">Global ID</span>
                            </div>
                            <input type="text" name="global_pilotrun_id" id="global_pilotrun_id">
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
                                <span class="input-group-text w-100" id="basic-addon1">Employee Name</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="#txt_employee_name" name="employee_name" readonly>
                        </div>
                    </div>
                  </div>
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">PO Num</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="txt_po_num" name="po_no" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">Device Name</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="txt_series_name" name="series_name" style="color: blue; font-weight: bold;" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                    <span class="input-group-text w-100" id="basic-addon1">PO Qty</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="txt_po_qty" name="po_qty" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                  <span class="input-group-text w-100" id="basic-addon1">Start Date/Time (Auto)</span>
                                <span class="input-group-text w-100" id="txt_start_datetime" name="txt_start_datetime" id="txt_start_datetime"></span>
                                </div>

                            </div>
                        </div>
                    </div> <!--end row MODAL PILOT RUN EVALUATION REPORT-->
                    <br>
                    <div class="col-sm-12">
                      <span class="badge badge-primary">A.</span> <b> MATERIAL / PRODUCT / PROCESS REQUIREMENT CHECKING (IN-CHARGE: PRODUCTION) </b>
                      <br>
                      PRODUCT DRAWING VS. MATERIAL LIST / OTHER REQUIRED DOCUMENTS AND REFERENCES
                      <br>
                    </div>
        <div class="prodn-container"> <!--HELLO-->
                    <div class="col-sm-12">
                      <span class="badge badge-warning">1.</span> REFERENCE DOCUMENTS CHECKING (IN-CHARGE: PRODUCTION) <!--bmodify 1-->
                      <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                    <button style="width:30px" type="button" class="btn btn-sm py-0 btn-info table-btns" id="btnView_AKLdrawing">
                                      <i class="fa fa-file" title="View"></i>
                                    </button>
                                <span class="input-group-text w-100" id="basic-addon1">1.1 A / KL Drawing #</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_AKLdrawing" name="txt_AKLdrawing" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_AKLdrawing_rev" name="txt_AKLdrawing_rev" placeholder="REV" readonly>
                              {{-- <input type="text" class="form-control" id="txt_AKLdrawing_page" name="txt_AKLdrawing_page" placeholder="NO. OF PAGE" readonly> --}}
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="hidden" class="form-control" id="hidden_AKLdrawing_pn" name="hidden_AKLdrawing_pn" placeholder="CHECKED BY" readonly>
                              <input type="text" class="form-control" id="txt_AKLdrawing_pn" name="txt_AKLdrawing_pn" placeholder="CHECKED BY" readonly>
                              <div class="input-group-prepend">
                                <button type="button" class="btn btn-info btn-sm btnSearchProdn" id="btnSearchProdn" data-checked-by="txt_AKLdrawing_pn" data-checked-by-hidden="hidden_AKLdrawing_pn" data-toggle="modal" data-target="#modalSearchProdn" title="Scan Employee ID"><i class="fa fa-barcode"></i></button>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_AKLdrawing_remarks" name="txt_AKLdrawing_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                    <button style="width:30px" type="button" class="btn btn-sm py-0 btn-info table-btns" id="btnView_GAGdrawing">
                                      <i class="fa fa-file" title="View"></i>
                                    </button>
                                <span class="input-group-text w-100" id="basic-addon1">1.2 G / AG Drawing #</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_GAGdrawing" name="txt_GAGdrawing" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_GAGdrawing_rev" name="txt_GAGdrawing_rev" placeholder="REV" readonly>
                              {{-- <input type="text" class="form-control" id="txt_GAGdrawing_page" name="txt_GAGdrawing_page" placeholder="NO. OF PAGE" readonly> --}}
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2"> <!--cmodify-->
                                <div class="input-group-prepend w-100">
                              {{-- <input type="text" class="form-control" id="txt_GAGdrawing_pn" name="txt_GAGdrawing_pn" placeholder="" readonly> --}}
                                    <span class="input-group-text w-100 txt_AKLdrawing_pn" id="auto_generated"></span>
                                </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_GAGdrawing_remarks" name="txt_GAGdrawing_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div>

                     <div class="row row_container">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                    <button style="width:30px" type="button" class="btn btn-sm py-0 btn-info table-btns" id="btnView_OTUDdrawing">
                                      <i class="fa fa-file" title="View"></i>
                                    </button>
                                <span class="input-group-text w-100" id="basic-addon1">1.3 OT/Urgent Direction #</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control class_txt_OTUDdrawing" list="list_txt_OTUDdrawing" id="txt_OTUDdrawing" name="txt_OTUDdrawing" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                              <datalist class="class_dl_OTUDdrawing" id="list_txt_OTUDdrawing"></datalist>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_OTUDdrawing_rev" name="txt_OTUDdrawing_rev" placeholder="REV" readonly>
                              {{-- <input type="text" class="form-control" id="txt_OTUDdrawing_page" name="txt_OTUDdrawing_page" placeholder="NO. OF PAGE" readonly> --}}
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              {{-- <input type="text" class="form-control" id="txt_OTUDdrawing_pn" name="txt_OTUDdrawing_pn" placeholder="" readonly> --}}
                                <div class="input-group-prepend w-100">
                                    <span class="input-group-text w-100 txt_AKLdrawing_pn" id="auto_generated"></span>
                                </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_OTUDdrawing_remarks" name="txt_OTUDdrawing_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div>
                      <div class="row row_container">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                    <button style="width:30px" type="button" class="btn btn-sm py-0 btn-info table-btns" id="btnView_PackDocdrawing">
                                      <i class="fa fa-file" title="View"></i>
                                    </button>
                                    <span class="input-group-text w-100" id="basic-addon1">1.4 Packing Doc # (ex. PM,DJ,etc)</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control class_txt_PackDocdrawing" list="list_txt_PackDocdrawing" id="txt_PackDocdrawing" name="txt_PackDocdrawing" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                              <datalist class="class_dl_PackDocdrawing" id="list_txt_PackDocdrawing"></datalist> <!--testmodify-->
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_PackDocdrawing_rev" name="txt_PackDocdrawing_rev" placeholder="REV" readonly>
                              {{-- <input type="text" class="form-control" id="txt_PackDocdrawing_page" name="txt_PackDocdrawing_page" placeholder="NO. OF PAGE" readonly> --}}
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                     {{-- <input type="text" class="form-control" id="txt_PackDocdrawing_pn" name="txt_PackDocdrawing_pn" placeholder="" readonly> --}}
                                    <span class="input-group-text w-100 txt_AKLdrawing_pn" id="auto_generated"></span>
                                </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_PackDocdrawing_remarks" name="txt_PackDocdrawing_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div>
                      <div class="row row_container">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                    <button style="width:30px" type="button" class="btn btn-sm py-0 btn-info table-btns" id="btnView_PackSpecsdrawing">
                                      <i class="fa fa-file" title="View"></i>
                                    </button>
                                    <!-- amodify NEW FIELD -->
                                <span class="input-group-text w-100" id="basic-addon1">1.5 Other Documents #:</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control class_txt_PackSpecsdrawing" list="list_txt_PackSpecsdrawing" id="txt_PackSpecsdrawing" name="txt_PackSpecsdrawing" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                              <datalist class="class_dl_PackSpecsdrawing" id="list_txt_PackSpecsdrawing"></datalist>

                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_PackSpecsdrawing_rev" name="txt_PackSpecsdrawing_rev" placeholder="REV" readonly>
                              {{-- <input type="text" class="form-control" id="txt_PackSpecsdrawing_page" name="txt_PackSpecsdrawing_page" placeholder="NO. OF PAGE" readonly> --}}
                            </div>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                              {{-- <input type="text" class="form-control" id="txt_PackSpecsdrawing_pn" name="txt_PackSpecsdrawing_pn" placeholder="" readonly> --}}
                                   <span class="input-group-text w-100 txt_AKLdrawing_pn" id="auto_generated"></span>
                               </div>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_PackSpecsdrawing_remarks" name="txt_PackSpecsdrawing_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div>
                    </div>
                    <br>
                    <!--bmodify 2-->
                    <div class="col-sm-12">
                      <span class="badge badge-warning">2.</span> MATERIAL / LABEL CHECKING (IN-CHARGE: PRODUCTION) <!-- Code: mlc-->
                      <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                <span class="input-group-text w-100" id="basic-addon1">2.1 Material Name vs. Material List</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-1">
                                <input type="radio" id="mlc_mat_name_list_yes" name="rdo_mlc_mat_name_list" value="1">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="mlc_mat_name_list_yes">Tally</i>
                          </div>
                          <div class="col-sm-1">
                              <input type="radio" id="mlc_mat_name_list_no" name="rdo_mlc_mat_name_list" value="2">
                              &nbsp;&nbsp;&nbsp;&nbsp;<i class="mlc_mat_name_list_no">Not Tally</i>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                                <input type="hidden" class="form-control" id="hddn_mlc_mat_name_list_emp_id" name="hddn_mlc_mat_name_list_emp_id" readonly>
                                <input type="text" class="form-control" id="txt_mlc_mat_name_list_emp_name" name="txt_mlc_mat_name_list_emp_name" placeholder="CHECKED BY" readonly>
                              <div class="input-group-prepend">
                                <button type="button" class="btn btn-info btn-sm btnSearchProdn" id="btnSearchProdn" data-checked-by="txt_mlc_mat_name_list_emp_name" data-checked-by-hidden="hddn_mlc_mat_name_list_emp_id" data-toggle="modal" data-target="#modalSearchProdn" title="Scan Employee ID"><i class="fa fa-barcode"></i></button>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_mlc_mat_name_list_remarks" name="txt_mlc_mat_name_list_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                <span class="input-group-text w-100" id="basic-addon1">2.2 Material label vs. Material Issuance</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-1">
                            <input type="radio" id="mlc_mat_label_issuance_yes" name="rdo_mlc_mat_label_issuance" value="1">
                              &nbsp;&nbsp;&nbsp;&nbsp;<i class="mlc_mat_label_issuance_yes">Tally</i>
                          </div>
                          <div class="col-sm-1">
                            <input type="radio" id="mlc_mat_label_issuance_no" name="rdo_mlc_mat_label_issuance" value="2">
                              &nbsp;&nbsp;&nbsp;&nbsp;<i class="mlc_mat_label_issuance_no">Not Tally</i>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                    {{-- <input type="text" class="form-control" id="txt_mlc_mat_label_issuance" name="txt_mlc_mat_label_issuance" placeholder="" readonly> --}}
                                    <span class="input-group-text w-100 txt_mlc_mat_name_list_emp_name" id="auto_generated"></span>
                                </div>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_mlc_mat_label_issuance_remarks" name="txt_mlc_mat_label_issuance_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div>
                    </div>
        </div> <!--HELLO-->
        <div class="engg-container"> <!--HELLO-->
                    <br> <!-- bmodify 3  SET-UP REQUIREMENTS CHECKING-->
                    <div class="col-sm-12">
                      <span class="badge badge-warning">3.</span> SET-UP REQUIREMENTS CHECKING (IN-CHARGE:ENGINEERING) <!--code: surc-->
                      <div class="row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="basic-addon1">3.1 Crimping/Assembly Type</span>
                              </div>
                            </div>
                          </div>
                      </div>
                        <div class="row">
                            <div class="col-sm-1 ml-5">
                                &nbsp;&nbsp;&nbsp; <b><i class="label_surc_assembly_type_first">1st:</i></b>
                            </div>
                            <div class="col-sm-1">
                                <input type="radio" id="rdo_surc_assembly_type_first_roll" name="rdo_surc_assembly_type_first" value="1">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_assembly_type_first_roll">Roll/Press</i>
                            </div>
                            <div class="col-sm-1">
                                <input type="radio" id="rdo_surc_assembly_type_first_point" name="rdo_surc_assembly_type_first" value="2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_assembly_type_first_point">4-Point Dent</i>
                            </div>
                            <div class="col-sm-1 mr-5">
                                <input type="radio" id="rdo_surc_assembly_type_first_spring" name="rdo_surc_assembly_type_first" value="3">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_assembly_type_first_spring">Spring Lock</i>
                            </div>
                            <div class="col-sm-2 ml-5">
                                <div class="input-group input-group-sm mb-2">
                                    <!-- Newly Added -->
                                    <input type="hidden" class="form-control" id="hidden_surc_assembly_type_first_emp_id" name="hidden_surc_assembly_type_first_emp_id" placeholder="CHECKED BY" readonly>
                                    <input type="text" class="form-control" id="txt_surc_assembly_type_first_emp_name" name="txt_surc_assembly_type_first_emp_name" placeholder="CHECKED BY" readonly>
                                    <div class="input-group-prepend">
                                        <!--<button type="button" class="btn btn-info btn-sm btnSearchProdn" id="btnSearchProdn" data-checked-by="txt_surc_assembly_type_first_emp_name" data-checked-by-hidden="hidden_surc_assembly_type_first_emp_id" data-toggle="modal" data-target="#modalSearchProdn" title="Scan Employee ID"><i class="fa fa-barcode"></i></button>--->
                                        <button class="btn btn-xs btn-info input-group-append btnScan" id="btnScanECheckedBy" type="button" style="padding: 5px 8px; padding-top: 8px;"><i class="fa fa-barcode"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm mb-2">
                                  <input type="text" class="form-control" id="txt_assembly_type_first_remarks" name="txt_assembly_type_first_remarks" placeholder="REMARKS">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1 ml-5">
                                &nbsp;&nbsp;&nbsp; <b><i class="label_surc_assembly_type_second">2nd:</i></b>
                            </div>
                            <div class="col-sm-1">
                                <input type="radio" id="rdo_surc_assembly_type_second_roll" name="rdo_surc_assembly_type_second" value="1">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_assembly_type_second_roll">Roll/Press</i>
                            </div>
                            <div class="col-sm-1">
                                <input type="radio" id="rdo_surc_assembly_type_second_point" name="rdo_surc_assembly_type_second" value="2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_assembly_type_second_point">4-Point Dent</i>
                            </div>
                            <div class="col-sm-1 mr-5">
                                <input type="radio" id="rdo_surc_assembly_type_second_spring" name="rdo_surc_assembly_type_second" value="3">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_assembly_type_second_spring">Spring Lock</i>
                            </div>
                            <div class="col-sm-2 ml-5">
                                <div class="input-group input-group-sm mb-2">
                                  <div class="input-group-prepend w-100">
                                    <span class="input-group-text w-100 txt_surc_assembly_type_first_emp_name" id="auto_generated"></span>
                                  </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group input-group-sm mb-2">
                                  <input type="text" class="form-control" id="txt_surc_assembly_type_second_remarks" name="txt_surc_assembly_type_second_remarks" placeholder="REMARKS">
                                </div>
                            </div>
                        </div>
                      <div class="row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="basic-addon1">3.2 Moving Test</span>
                              </div>
                               <select class="form-control form-control-sm" id="slct_surc_moving_test" name="slct_surc_moving_test">
                                <option selected disabled>-- Choose One --</option>
                                <option value="0">With</option>
                                <option value="1">Without</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-1 ml-2">
                                <input type="radio" id="rdo_surc_moving_test_100" name="rdo_surc_moving_test" value="1">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_moving_test_100">100%</i>
                          </div>
                          <div class="col-sm-1">
                                <input type="radio" id="rdo_surc_moving_test_sampling" name="rdo_surc_moving_test" value="2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_moving_test_sampling">Sampling</i>
                          </div>
                          <div class="col-sm-2">
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                  <span class="input-group-text w-100 txt_surc_assembly_type_first_emp_name" id="auto_generated"></span>
                                </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_surc_moving_test_remarks" name="txt_surc_moving_test_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div><!-- end 3.3 Row-->
                      <div class="row">
                          <div class="col-sm-3">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-50">
                                <span class="input-group-text w-100" id="basic-addon1">3.3 Resistance Check</span>
                              </div>
                               <select class="form-control form-control-sm" id="slct_surc_resist_check" name="slct_surc_resist_check">
                                <option selected disabled>-- Choose One --</option>
                                <option value="0">With</option>
                                <option value="1">Without</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-1">
                                <input type="radio" id="rdo_surc_resist_check_100" name="rdo_surc_resist_check" value="1">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_resist_check_100">100%</i>
                          </div>
                          <div class="col-sm-1">
                                <input type="radio" id="rdo_surc_resist_check_sampling" name="rdo_surc_resist_check" value="2">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="rdo_surc_resist_check_sampling">Sampling</i>
                          </div>
                          <div class="col-sm-2 ml-2">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                <span class="input-group-text w-100 txt_surc_assembly_type_first_emp_name" id="auto_generated"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="input-group input-group-sm mb-2">
                              <input type="text" class="form-control" id="txt_surc_resist_check_remarks" name="txt_surc_resist_check_remarks" placeholder="REMARKS">
                            </div>
                          </div>
                      </div><!-- end 3.3 Row-->
                    </div> <!-- end 3. Column-->
        </div>
        <div class="prodn-container"> <!--HELLO-->
                    <div class="col-sm-12"> <!--bmodify 4-->
                        <span class="badge badge-warning"> 4.</span> PACKING REQUIREMENTS CHECKING (IN-CHARGE:PRODUCTION) <!--prc-->
                        <div class="row">
                            <div class="col-sm-3">
                              <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                  <span class="input-group-text w-100" id="basic-addon1">4.1 Plastic</span>
                                </div>
                                <input type="number" class="form-control form-control-sm" id="num_prc_plastic_qty" name="num_prc_plastic_qty" placeholder = "Quantity">
                              </div>
                            </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2 ml-2">
                              <div class="input-group input-group-sm mb-2">
                                <!-- Newly Added -->
                                <input type="hidden" class="form-control" id="hidden_prc_plastic_emp_id" name="hidden_prc_plastic_emp_id" placeholder="CHECKED BY" readonly>
                                <input type="text" class="form-control" id="txt_prc_plastic_emp_name" name="txt_prc_plastic_emp_name" placeholder="CHECKED BY" readonly>
                                <div class="input-group-prepend">
                                  <button type="button" class="btn btn-info btn-sm btnSearchProdn" id="btnSearchProdn" data-checked-by="txt_prc_plastic_emp_name" data-checked-by-hidden="hidden_prc_plastic_emp_id" data-toggle="modal" data-target="#modalSearchProdn" title="Scan Employee ID"><i class="fa fa-barcode"></i></button>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="input-group input-group-sm mb-2">
                                <input type="text" class="form-control" id="txt_prc_plastic_remarks" name="txt_prc_plastic_remarks" placeholder="REMARKS">
                              </div>
                            </div>
                        </div> <!--end 4.1 row-->
                        <div class="row">
                            <div class="col-sm-3">
                              <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                  <span class="input-group-text w-100" id="basic-addon1">4.2 Canister</span>
                                </div>
                                <input type="number" class="form-control form-control-sm" id="num_prc_canister_qty" name="num_prc_canister_qty" placeholder = "Quantity">
                              </div>
                            </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2 ml-2">
                                <div class="input-group input-group-sm mb-2">
                                    <div class="input-group-prepend w-100">
                                    {{-- <input type="text" class="form-control" id="txt_prc_canister" name="txt_prc_canister" placeholder="" readonly> --}}
                                        <span class="input-group-text w-100 txt_prc_plastic_emp_name" id="auto_generated"></span>
                                     </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="input-group input-group-sm mb-2">
                                <input type="text" class="form-control" id="txt_prc_canister_remarks" name="txt_prc_canister_remarks" placeholder="REMARKS">
                              </div>
                            </div>
                        </div> <!--end 4.2 row-->
                        <div class="row">
                            <div class="col-sm-3">
                              <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-50">
                                  <span class="input-group-text w-100" id="basic-addon1">4.3 Tray / Case</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="txt_prc_tray_name" name="txt_prc_tray_name" placeholder = "Tray Name">
                              </div>
                            </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2 ml-2">
                                <div class="input-group input-group-sm mb-2">
                                    <div class="input-group-prepend w-100">
                                        {{-- <input type="text" class="form-control" id="txt_prc_tray" name="txt_prc_tray" placeholder="" readonly> --}}
                                        <span class="input-group-text w-100 txt_prc_plastic_emp_name" id="auto_generated"></span>
                                     </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="input-group input-group-sm mb-2">
                                <input type="text" class="form-control" id="txt_prc_tray_remarks" name="txt_prc_tray_remarks" placeholder="REMARKS">
                              </div>
                            </div>
                        </div> <!--end 4.3 row-->
                        <div class="row">
                            <div class="col-sm-4 ml-5 mr-5">
                              <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                  <span class="input-group-text w-100" id="basic-addon1">4.3.1 Tray Color</span>
                                  <select type="text" class="form-control form-control-sm" id="slct_prc_tray_color" name="slct_prc_tray_color">
                                    <option value="" selected disabled>-Select Color-</option>
                                    <option value="1">Green</option>
                                    <option value="2">Blue</option>
                                    <option value="3">Red</option>
                                    <option value="4">White</option>
                                    <option value="5">Black</option>
                                    <input type="number" class="form-control form-control-sm" id="num_prc_tray_color_qty" name="num_prc_tray_color_qty" placeholder= "Quantity">
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-2 ml-5">
                              <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                    {{-- <input type="text" class="form-control" id="txt_prc_tray_color" name="txt_prc_tray_color" placeholder="" readonly> --}}
                                    <span class="input-group-text w-100 txt_prc_plastic_emp_name" id="auto_generated"></span>
                                 </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="input-group input-group-sm mb-2">
                                <input type="text" class="form-control" id="txt_prc_tray_color_remarks" name="txt_prc_tray_color_remarks" placeholder="REMARKS">
                              </div>
                            </div>
                        </div> <!--end 4.3.2 row-->
                        <div class="row">
                            <div class="col-sm-4 ml-5 mr-5">
                              <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                  <span class="input-group-text w-100" id="basic-addon1">4.3.2 Unit orientation</span>
                                  <select type="text" class="form-control form-control-sm" id="slct_prc_unit" name="slct_prc_unit">
                                    <option value="" selected disabled>-Select-</option>
                                    <option value="1">Plunger-A up</option>
                                    <option value="2">Plunger-A down</option>
                                    <option value="3">Plunger-A left</option>
                                    <option value="4">Plunger-A right</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-2 ml-5">
                              <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend w-100">
                                    {{-- <input type="text" class="form-control" id="txt_slct_prc_unit" name="txt_slct_prc_unit" placeholder="" readonly> --}}
                                    <span class="input-group-text w-100 txt_prc_plastic_emp_name" id="txt_D_generated_emp_name" name="txt_D_generated_emp_name" id="basic-addon1"></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="input-group input-group-sm mb-2">
                                <input type="text" class="form-control" id="txt_prc_unit_remarks" name="txt_prc_unit_remarks" placeholder="REMARKS">
                              </div>
                            </div>
                        </div> <!--end 4.3.2 row-->
                    </div ><!--end 4 Column-->
        </div> <!--HELLO-->
                  </div> <!-- End Body -->
                <div class="modal-footer float-right">
                    <div class="actions">
                        <button type="submit" id="id_btn_save_pilotA" class="btn btn-primary btn-sm"><i class="fa fa-check fa-xs icon_save_pilotA"></i> Save</button>
                        <button type="button" id="id_btn_close" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>

             </form>

            </div>
          </div>
        </div>

        <div class="modal fade" id="modalSearchProdn" modal-checked-by="" modal-checked-by-hidden="" tabindex="-1"><!--bmodify-->
          <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header border-bottom-0 pb-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pt-0">
                <div class="text-center text-secondary">
                <h1>
                  <b>Please scan your ID!<b>
                <br>
                <i class="fa fa-qrcode fa-3x"></i></h1>
                </div>
                <input type="text" id="txt_employee_id" class="hidden_scanner_input" autocomplete="off">
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="mdl_employee_number_scanner" data-formid="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header border-bottom-0 pb-0">
              <!-- <h5 class="modal-title" id="exampleModalLongTitle"></h5> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pt-0">
              <div class="text-center text-secondary">
                <h1>
                  <b>Please scan your ID!<b>
                <br>
                <i class="fa fa-qrcode fa-3x"></i></h1>
                </div>
              <input type="text" id="txt_employee_number_scanner" class="hidden_scanner_input" autocomplete="off">
            </div>
          </div>
        </div>
      </div>
      
     <!-- ADD ENERGY MONTHLY TARGET -->
     <div class="modal fade modalPaper" data-backdrop="static" id="modalPaperTargetSemiAdmin">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4PaperConsumptionChangeTitleSemiAdmin"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddPaperTargetSemiAdmin">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year" id="fiscalYearIdSemiAdmin"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="paper_id" id="paperId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            {{-- <input type="text" class="form-control" name="department" id="txtSelectTargetDepartment"
                                        style="width: 100%;" readonly> CURRENT FISCAL YEAR ID --}}

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control select2bs4 selectDepartment" type="text" name="department"
                                        id="txtSelectAddDepartment" style="width: 100%;">
                                        <option value="0" disabled selected>Select Department</option>
                                        <option value="1">CN</option>
                                        <option value="2">PPS</option>
                                        <option value="3">TS</option>
                                        <option value="4">YF</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                        id="txtSelectAddMonth" style="width: 100%;">
                                        <option value="0" disabled selected>Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Paper Consumption Target (Ream)</label>
                                    <input type="number" class="form-control" step="any" name="paper_target" id="txtAddPaperTarget">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddPaperTarget" class="btn btn-primary"><i
                                id="iBtnAddPaperTargetIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD SEMIADMIN PAPER MONTHLY TARGET END -->


    <!-- ADD SEMIADMIN PAPER MONTHLY ACTUAL CONSUMPTION -->
    <div class="modal fade modalPaperConsumption" data-backdrop="static" id="modalPaperConsumptionSemiAdmin">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4PaperConsumptionActualChangeTitleSemiAdmin"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddPaperActualSemiAdmin">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year" id="txtFiscalYearIdSemiAdmin"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="paper_id" id="paperId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            {{-- <input type="text" class="form-control" name="department" id="txtSelectActualDepartment"
                                        style="width: 100%;" readonly> CURRENT FISCAL YEAR ID --}}

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control select2bs4 selectDepartment" type="text" name="department"
                                        id="txtSelectAddDepartment" style="width: 100%;">
                                        <option value="0" disabled selected>Select Department</option>
                                        <option value="1">CN</option>
                                        <option value="2">PPS</option>
                                        <option value="3">TS</option>
                                        <option value="4">YF</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                        id="txtSelectAddPaperConsumption" style="width: 100%;">
                                        <option value="0" disabled selected>Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Paper Consumption Actual</label>
                                    <input type="text" class="form-control" name="paper_consumption" id="txtAddPaperConsumption">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Reason for Usage</label>
                                    <input type="text" class="form-control" name="reason" id="txtAddReason">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddPaperConsumption" class="btn btn-primary"><i
                                id="iBtnAddPaperConsumptionIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD SEMIADMIN PAPER MONTHLY CONSUMPTION END -->

    <!-- ADD ENERGY MONTHLY TARGET -->
    <div class="modal fade modalPaper" data-backdrop="static" id="modalPaperTarget">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4PaperConsumptionChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddPaperTarget">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year" id="fiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="paper_id" id="paperId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="department" id="txtSelectTargetDepartment"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}

                            {{-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control select2bs4 selectDepartment" type="text" name="department"
                                        id="txtSelectAddDepartment" style="width: 100%;">
                                        <option value="0" disabled selected>Select Department</option>
                                        <option value="1">CN</option>
                                        <option value="2">PPS</option>
                                        <option value="3">TS</option>
                                        <option value="4">YF</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                        id="txtSelectAddMonth" style="width: 100%;">
                                        <option value="0" disabled selected>Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Paper Consumption Target (Ream)</label>
                                    <input type="number" class="form-control" step="any" name="paper_target" id="txtAddPaperTarget">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddPaperTarget" class="btn btn-primary"><i
                                id="iBtnAddPaperTargetIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD ENERGY MONTHLY TARGET END -->


    <!-- ADD PAPER MONTHLY ACTUAL CONSUMPTION -->
    <div class="modal fade modalPaperConsumption" data-backdrop="static" id="modalPaperConsumption">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title" id="h4PaperConsumptionActualChangeTitle"></h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close" id="closeModalAddId">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddPaperActual">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="fiscal_year" id="txtFiscalYearId"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}
                                    <input type="hidden" class="form-control" name="paper_id" id="paperId"
                                        style="width: 100%;" readonly> {{-- ENERGY CONSUMPTION ID --}}
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="department" id="txtSelectActualDepartment"
                                        style="width: 100%;" readonly> {{-- CURRENT FISCAL YEAR ID --}}

                            {{-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control select2bs4 selectDepartment" type="text" name="department"
                                        id="txtSelectAddDepartment" style="width: 100%;">
                                        <option value="0" disabled selected>Select Department</option>
                                        <option value="1">CN</option>
                                        <option value="2">PPS</option>
                                        <option value="3">TS</option>
                                        <option value="4">YF</option>

                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Month</label>
                                    <select class="form-control select2bs4 selectMonth" type="text" name="month"
                                        id="txtSelectAddPaperConsumption" style="width: 100%;">
                                        <option value="0" disabled selected>Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Paper Consumption Actual</label>
                                    <input type="text" class="form-control" name="paper_consumption" id="txtAddPaperConsumption">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Reason for Usage</label>
                                    <input type="text" class="form-control" name="reason" id="txtAddReason">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" id="btnAddPaperConsumption" class="btn btn-primary"><i
                                id="iBtnAddPaperConsumptionIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- ADD ENERGY MONTHLY CONSUMPTION -->

@endsection

@section('js_content')

    <script type="text/javascript">
        $(document).ready(function() {

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            GetFiscalYear();
            GetDepartment();
            // GetEnergyEntryDetailsforEdit();
            // GetMonthsFilter($('.selectMonthWater'));
            GetFiscalYearFilter($('.selectYearPaper'));


            $("#selDepartment").on('change', function() {
                dataTablePaperConsumptions.column(3).search($(this).val()).draw();
            });

            $("#selMonthPaper").on('change', function() {
                dataTablePaperConsumptions.column(0).search($(this).val()).draw();
            });

            $("#selFiscalYearPaper").on('change', function() {
                dataTablePaperConsumptions.column(1).search($(this).val()).draw();
            });

            //===== DATATABLES OF ENERGY CONSUMPTION ================
            var dataTablePaperConsumptions = $("#tblPaperConsumption").DataTable({
                "processing": false,
                "serverSide": true,
                // "responsive": true,
                // // "scrollX": true,
                "ajax": {
                    url: "view_paper_consumption",
                },
                "columns": [{
                        "data": "month",
                        orderable: true,
                        width: "10%"
                    },
                    {
                        "data": "fiscal_year_id.fiscal_year",
                        width: "10%",
                        visible: false
                    },
                    {
                        "data": "year"
                        // orderable: true,
                        // width: "10%"
                        // orderable: false
                    },
                    {
                        "data": "department",
                        render: function(data) {
                            if(data == 1) {
                                return 'CN'
                            }
                            else if(data == 2) {
                                return 'PPS'
                            }
                            else if(data == 3) {
                                return 'TS'
                            }
                            else if(data == 4) {
                                return 'YF'
                            }
                        }
                    },
                        // orderable: false

                    {
                        "data": "target",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
                        orderable: false
                    },
                    {
                        "data": "actual",
                        // "render": $.fn.dataTable.render.number(',', 2, ''),
                        "render": $.fn.dataTable.render.number( '\,', '.', 2, '' ),
                        orderable: false
                    },
                    {
                        "data": "status",
                        orderable: false
                    },
                    {
                        "data": "reason",
                        orderable: false
                    },
                    {
                        "data": "action",
                        orderable: false,
                    },
                ],
                "order": [
                    [0, 'asc'],
                    [3, 'asc'],
                    [1, 'desc']
                ]
                // "bSort": false,
            });

            // let column = dataTablePaperConsumptions.column(7);
            // let column_attr = column.visible(true);
            // $('#column_name').on('change', function(e) {

            // })


            //===== DATATABLES OF ENERGY CONSUMPTION END ================

            $('#btnShowPaperTarget').on('click', function(e) {
                // console.log('test');
                console.log('target');
                $('input[name="paper_id"]', $("#formAddPaperTarget")).val('');
                $('input[name="paper_target"]', $("#formAddPaperTarget")).val('');
                $('select[name="month"]', $("#formAddPaperTarget")).val(0).trigger('change');
                $('select[name="department"]', $("#formAddPaperTarget")).val(0).trigger('change');
                $('#h4PaperConsumptionChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Paper Consumption Target');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });

            $('#btnShowPaperActual').on('click', function(e) {
                // console.log('test');
                console.log('actual');
                $('input[name="paper_id"]', $("#formAddPaperActual")).val('');
                $('input[name="paper_consumption"]', $("#formAddPaperActual")).val('');
                $('input[name="reason"]', $("#formAddPaperActualSemiAdmin")).val('');
                $('select[name="month"]', $("#formAddPaperActual")).val(0).trigger('change');
                $('select[name="department"]', $("#formAddPaperActual")).val(0).trigger('change');
                $('#h4PaperConsumptionActualChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Paper Actual Consumption');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });

            $('#btnShowPaperTargetSemiAdmin').on('click', function(e) {
                // console.log('test');
                console.log('targetsemiadmin');
                $('input[name="paper_id"]', $("#formAddPaperTargetSemiAdmin")).val('');
                $('input[name="paper_target"]', $("#formAddPaperTargetSemiAdmin")).val('');
                $('select[name="month"]', $("#formAddPaperTargetSemiAdmin")).val(0).trigger('change');
                $('select[name="department"]', $("#formAddPaperTargetSemiAdmin")).val(0).trigger('change');
                $('#h4PaperConsumptionChangeTitleSemiAdmin').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Paper Consumption Target');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });

            $('#btnShowPaperActualSemiAdmin').on('click', function(e) {
                // console.log('test');
                console.log('actualsemiadmin');
                $('input[name="paper_id"]', $("#formAddPaperActualSemiAdmin")).val('');
                $('input[name="paper_consumption"]', $("#formAddPaperActualSemiAdmin")).val('');
                $('input[name="reason"]', $("#formAddPaperActualSemiAdmin")).val('');
                $('select[name="month"]', $("#formAddPaperActualSemiAdmin")).val(0).trigger('change');
                $('select[name="department"]', $("#formAddPaperActualSemiAdmin")).val(0).trigger('change');
                $('#h4PaperConsumptionActualChangeTitleSemiAdmin').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Paper Actual Consumption');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            });


            //====== ADD ENERGY CONSUMPTION TARGET ======
            function AddPaperConsumptionTarget() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "3000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                };

                $.ajax({
                    url: "insert_paper_target",
                    method: "post",
                    data: $('#formAddPaperTarget').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddPaperTargetIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['department'] === undefined) {
                                $("#txtSelectAddDepartment").removeClass('is-invalid');
                                $("#txtSelectAddDepartment").attr('title', '');
                            } else {
                                $("#txtSelectAddDepartment").addClass('is-invalid');
                                $("#txtSelectAddDepartment").attr('title', response['error']['department']);
                            }


                            if (response['error']['month'] === undefined) {
                                $("#txtSelectAddMonth").removeClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', '');
                            } else {
                                $("#txtSelectAddMonth").addClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', response['error']['month']);
                            }


                            if (response['error']['paper_target'] === undefined) {
                                $("#txtAddPaperTarget").removeClass('is-invalid');
                                $("#txtAddPaperTarget").attr('title', '');
                            } else {
                                $("#txtAddPaperTarget").addClass('is-invalid');
                                $("#txtAddPaperTarget").attr('title', response['error']['paper_target']);
                            }
                        } else if (response['result'] == 0) {
                            toastr.warning( 'You already have a record for this month!');
                        }else if (response['result'] == 1) {
                            $("#modalPaperTarget").modal('hide');

                            dataTablePaperConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month!');
                        }

                        $("#iBtnAddPaperTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperTarget").removeAttr('disabled');
                        $("#iBtnAddPaperTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddPaperTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperTarget").removeAttr('disabled');
                        $("#iBtnAddPaperTargetIcon").addClass('fa fa-check');
                    }
                });
            }

            function AddPaperConsumptionActual() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "3000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                };

                $.ajax({
                    url: "insert_paper_actual",
                    method: "post",
                    data: $('#formAddPaperActual').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddPaperActualIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperActual").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['paper_consumption'] === undefined) {
                                $("#txtAddPaperConsumption").removeClass('is-invalid');
                                $("#txtAddPaperConsumption").attr('title', '');
                            } else {
                                $("#txtAddPaperConsumption").addClass('is-invalid');
                                $("#txtAddPaperConsumption").attr('title', response['error']['paper_consumption']);
                            }
                        }else if (response['result'] == 0) {
                            toastr.warning( 'You already have a record for this month!');
                        } else if (response['result'] == 1) {
                            $("#modalPaperConsumption").modal('hide');

                            dataTablePaperConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month');
                        }else if (response['result'] == 3) {
                            toastr.warning( 'You have no target for this month, please put target first!');
                        }

                        $("#iBtnAddPaperActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperActual").removeAttr('disabled');
                        $("#iBtnAddPaperActualIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddPaperActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperActual").removeAttr('disabled');
                        $("#iBtnAddPaperActualIcon").addClass('fa fa-check');
                    }
                });
            }

            //====== ADD ENERGY CONSUMPTION TARGET ======
            function AddPaperConsumptionTargetSemiAdmin() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "3000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                };

                $.ajax({
                    url: "insert_paper_target",
                    method: "post",
                    data: $('#formAddPaperTargetSemiAdmin').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddPaperTargetIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperTarget").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['department'] === undefined) {
                                $("#txtSelectAddDepartment").removeClass('is-invalid');
                                $("#txtSelectAddDepartment").attr('title', '');
                            } else {
                                $("#txtSelectAddDepartment").addClass('is-invalid');
                                $("#txtSelectAddDepartment").attr('title', response['error']['department']);
                            }


                            if (response['error']['month'] === undefined) {
                                $("#txtSelectAddMonth").removeClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', '');
                            } else {
                                $("#txtSelectAddMonth").addClass('is-invalid');
                                $("#txtSelectAddMonth").attr('title', response['error']['month']);
                            }

                            if (response['error']['paper_target'] === undefined) {
                                $("#txtAddPaperTarget").removeClass('is-invalid');
                                $("#txtAddPaperTarget").attr('title', '');
                            } else {
                                $("#txtAddPaperTarget").addClass('is-invalid');
                                $("#txtAddPaperTarget").attr('title', response['error']['paper_target']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalPaperTargetSemiAdmin").modal('hide');

                            dataTablePaperConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month');
                        }

                        $("#iBtnAddPaperTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperTarget").removeAttr('disabled');
                        $("#iBtnAddPaperTargetIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddPaperTargetIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperTarget").removeAttr('disabled');
                        $("#iBtnAddPaperTargetIcon").addClass('fa fa-check');
                    }
                });
            }

            function AddPaperConsumptionActualSemiAdmin() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "3000",
                    "timeOut": "3000",
                    "extendedTimeOut": "3000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                };

                $.ajax({
                    url: "insert_paper_actual",
                    method: "post",
                    data: $('#formAddPaperActualSemiAdmin').serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $("#iBtnAddPaperActualIcon").addClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperActual").prop('disabled', 'disabled');
                    },
                    success: function(response) {
                        if (response['validation'] == 'hasError') {
                            toastr.error('Saving failed!');

                            if (response['error']['paper_consumption'] === undefined) {
                                $("#txtAddPaperConsumption").removeClass('is-invalid');
                                $("#txtAddPaperConsumption").attr('title', '');
                            } else {
                                $("#txtAddPaperConsumption").addClass('is-invalid');
                                $("#txtAddPaperConsumption").attr('title', response['error']['paper_consumption']);
                            }
                        } else if (response['result'] == 1) {
                            $("#modalPaperConsumptionSemiAdmin").modal('hide');

                            dataTablePaperConsumptions.draw(); // reload the tables after insertion
                            toastr.success('Save success!');
                        } else if (response['result'] == 2) {
                            toastr.warning( 'You already have a record for this month');
                        }
                        else if (response['result'] == 3) {
                            toastr.warning( 'You have no target for this month, please put target first!');
                        }

                        $("#iBtnAddPaperActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperActual").removeAttr('disabled');
                        $("#iBtnAddPaperActualIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                        $("#iBtnAddPaperActualIcon").removeClass('fa fa-spinner fa-pulse');
                        $("#btnAddPaperActual").removeAttr('disabled');
                        $("#iBtnAddPaperActualIcon").addClass('fa fa-check');
                    }
                });
            }

            function GetPaperTargetById(targetId) {
                $.ajax({
                    url: "get_paper_target_by_id",
                    method: "get",
                    data: {
                        targetId: targetId,
                    },
                    dataType: "json",
                    success: function(response) {
                        let formAddPaperTarget = $('#formAddPaperTarget');
                        let formAddPaperActual = $('#formAddPaperActual');
                        let paperTargetDetails = response['result'];
                        if (paperTargetDetails.length > 0) {
                            $('select[name="month"]', formAddPaperTarget).val(paperTargetDetails[0].month).trigger('change');
                            $('input[name="department"]', formAddPaperTarget).val(paperTargetDetails[0].department).trigger('change');
                            $('input[name="department"]', formAddPaperActual).val(paperTargetDetails[0].department).trigger('change');
                            $('input[name="reason"]', formAddPaperActual).val(paperTargetDetails[0].reason);
                            $('select[name="month"]', formAddPaperActual).val(paperTargetDetails[0].month).trigger('change');
                            $('input[name="paper_target"]', formAddPaperTarget).val(paperTargetDetails[0].target);
                            $('input[name="paper_consumption"]', formAddPaperActual).val(paperTargetDetails[0].actual);

                            // $("#txtAddPaperTarget").val(paperTargetDetails[0].target);
                            // $("#txtAddPaperConsumption").val(paperTargetDetails[0].actual);

                            // $("#txtAddEnergyConsumption").val(energyTargetDetails[0].actual);

                        } else {
                            toastr.warning('No record found!');
                        }
                    },
                    error: function(data, xhr, status) {
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    },
                });
            }


            function GetFiscalYearFilter(cboElement) {
                let result = '<option value="0" selected disabled> -- Select Fiscal Year -- </option>';

                $.ajax({
                    url: 'get_fiscal_year_for_filter',
                    method: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        result = '<option value="0" selected disabled> -- Loading -- </option>';
                        cboElement.html(result);
                    },
                    success: function (response) {
                        result = '';
                        let year = response['year'];

                        if (year.length > 0) { // true
                            result += '<option value="0" selected disabled> Select Fiscal Year </option>';
                            result += '<option value=""> All </option>';
                            for (let index = 0; index < year.length; index++) {
                                result += '<option value="' + year[index].fiscal_year + '">' + year[index].fiscal_year + '</option>';
                            }
                        }
                        else {
                            result = '<option value="0" selected disabled> No record found </option>';
                        }
                        cboElement.html(result);
                    }
                });
            }

            $("#formAddPaperTarget").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddPaperTarget")).prop('disabled', false);
                $('select[name="department"]', $("#formAddPaperTarget")).prop('disabled', false);
                AddPaperConsumptionTarget();
            });

            $("#formAddPaperTargetSemiAdmin").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddPaperTargetSemiAdmin")).prop('disabled', false);
                $('select[name="department"]', $("#formAddPaperTargetSemiAdmin")).prop('disabled', false);
                AddPaperConsumptionTargetSemiAdmin();
            });

            //===== EDIT WATER CONSUMPTION =====
            $("#tblPaperConsumption").on('click', '.actionEditPaperConsumptionTarget', function() {
                let id = $(this).attr('paper-id');

                // console.log('asd');
                // alert('asdsadasd');
                // $('.modalPaper').modal('show');
                $("input[name='paper_id'", $("#formAddPaperTarget")).val(id);
                $('#h4PaperConsumptionChangeTitle').html('<i class="fas fa-edit"></i>&nbsp;&nbsp; Edit Paper Consumption Target');
                $('select[name="month"]', $("#formAddPaperTarget")).prop('disabled', false);
                $('select[name="department"]', $("#formAddPaperTarget")).prop('disabled', true);

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetPaperTargetById(id);
            });

            $('#tblPaperConsumption').on('click', '.actionAddPaperConsumption', function() {
                let id = $(this).attr('paper-id');

                $('select[name="month"]', $("#formAddPaperActual")).prop('disabled', true);
                $('select[name="department"]', $("#formAddPaperActual")).prop('disabled', true);
                // $('select[name="factory"]', $("#formAddWaterActual")).val(0).trigger('change');
                $('input[name="paper_id"]', $("#formAddPaperActual")).val(id);

                $('input[name="paper_consumption"]', $("#formAddPaperActual")).val('');
                $('#h4PaperConsumptionActualChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Add Paper Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetPaperTargetById(id);
            });

            $("#formAddPaperActual").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddPaperActual")).prop('disabled', false);
                $('select[name="department"]', $("#formAddPaperActual")).prop('disabled', false);
                AddPaperConsumptionActual();
            });

            $("#formAddPaperActualSemiAdmin").submit(function(event) {
                event.preventDefault(); // to stop the form submission
                $('select[name="month"]', $("#formAddPaperActualSemiAdmin")).prop('disabled', false);
                $('select[name="department"]', $("#formAddPaperActualSemiAdmin")).prop('disabled', false);
                AddPaperConsumptionActualSemiAdmin();
                });


            $('#tblPaperConsumption').on('click', '.actionEditPaperConsumption', function() {
                let id = $(this).attr('paper-id');

                $('select[name="month"]', $("#formAddPaperActual")).prop('disabled', false);
                $('select[name="department"]', $("#formAddPaperActual")).prop('disabled', true);
                // $('select[name="factory"]', $("#formAddWaterActual")).val(0).trigger('change');
                $('input[name="paper_id"]', $("#formAddPaperActual")).val(id);

                $('input[name="paper_consumption"]', $("#formAddPaperActual")).val('');
                $('#h4PaperConsumptionActualChangeTitle').html('<i class="fas fa-plus"></i>&nbsp;&nbsp; Edit Paper Consumption Actual');

                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');

                GetPaperTargetById(id);
            });
        });

    </script>
@endsection
