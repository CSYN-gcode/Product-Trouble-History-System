@php $layout = 'layouts.super_user_layout'; @endphp
  @extends($layout)

  @section('title', 'Pilot Run1')

  @section('content_page')
  <style type="text/css">
    .hidden_scanner_input{
      position: fixed;
      opacity: 0;
    }
    .modal-xl-custom{
      width: 95%!important;
      min-width: 95%!important;
    }
    .modal-footer {
      justify-content: space-between;
    }
</style>
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

  <div class="modal fade" id="modalGenPilotRunToPrint">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-qrcode"></i> Generate QR Code</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center>
            <div class="row">
              <div class="col-sm-12">
                  <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                            ->size(150)->errorCorrection('H')
                            ->generate('0')) !!}" id="imgGenPilotRunPoNoBarcode" style="max-width: 200px; min-width: 200px;">
                  <br>
                  <label id="lblGenPilotRunPoNo"></label> <br>
                  <label id="lblGenPilotRunSeriesName">...</label> <br>
                  <label id="lblGenPilotRunQty">...</label> <br>
                  {{-- <label id="lblGenPilotRunPairNo">...</label> <br> --}}
              </div>
            </div>
          </center>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="btnPrintPilotRunBarcode" class="btn btn-primary"><i id="ibtnPrintPilotRunBarcodeIcon" class="fa fa-print"></i> Print</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- Modal Scan PO -->
  <div class="modal fade" id="modalScanPONum" data-formid="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0 pb-0">
          <!-- <h5 class="modal-title" id="exampleModalLongTitle"></h5> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pt-0">
          <div class="text-center text-secondary">
            Please scan the PO code.
            <br>
            <br>
            <h1><i class="fa fa-qrcode fa-lg"></i></h1>
          </div>
          <input type="text" id="txtSearchPoNum" class="hidden_scanner_input">
        </div>
      </div>
    </div>
  </div>
  <!-- /.Modal -->

   <div class="modal fade" id="mdl_alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mdl_alert_title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="mdl_alert_body" style="font-size: 40px; color:red;">
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('js_content')
  <script type="text/javascript">

    function getdate(datetime){
      if(!datetime){
        return '';
      }
      var d = new Date(datetime);
      // var d = new Date();

      var month = d.getMonth()+1;
      var day = d.getDate();

      var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day;

      return output;
    }

    function getcurrentdate(){
      var d = new Date();
      return d;
    }

    let currentPoNo = "";
    let arrayProdnEmp = [];
    let arrayProdnEmpName = [];
    let dt_pilot_run;

  $(document).ready(function () {
    // console.log(frmPilotrunAdetails);
    var frmPilotrunAdetails = $('#frm_pilotrun_Adetails');
    var exceptInputs = $(
            '#txt_AKLdrawing' + ',#txt_AKLdrawing_rev' +',#txt_GAGdrawing'+',#txt_GAGdrawing_rev'+
            ',#txt_AKLdrawing_pn'+',#txt_mlc_mat_name_list_emp_name'+',#txt_prc_plastic_emp_name'
    );
    var exceptEnggInputs = $(
        '#txt_surc_assembly_type_first_emp_name'
    );
    //========nowmodify : if the 3.2 and 3.3 change the select value
    $('#slct_surc_moving_test').change(function () {
        frmPilotrunAdetails.find('input[name=rdo_surc_moving_test]').prop('checked',false);
        if($(this).val()==0){
            frmPilotrunAdetails.find('#rdo_surc_moving_test_100').removeClass('d-none',true);
            frmPilotrunAdetails.find('#rdo_surc_moving_test_sampling').removeClass('d-none',true);
        }else{
            frmPilotrunAdetails.find('#rdo_surc_moving_test_100').addClass('d-none',true);
            frmPilotrunAdetails.find('#rdo_surc_moving_test_sampling').addClass('d-none',true);
        }
    });
    $('#slct_surc_resist_check').change(function () {
        frmPilotrunAdetails.find('input[name=rdo_surc_resist_check]').prop('checked',false);
        if($(this).val()==0){
            frmPilotrunAdetails.find('#rdo_surc_resist_check_100').removeClass('d-none',true);
            frmPilotrunAdetails.find('#rdo_surc_resist_check_sampling').removeClass('d-none',true);
        }else{
            frmPilotrunAdetails.find('#rdo_surc_resist_check_100').addClass('d-none',true);
            frmPilotrunAdetails.find('#rdo_surc_resist_check_sampling').addClass('d-none',true);
        }
    });

    setTimeout(function() {
      $('.nav-link').find('.fa-bars').closest('a').click();
    }, 100);

    $('#txt_po_number').keypress(function(e){
        //po_modify- drawing
      if(e.keyCode == 13){
        $(this).val( $(this).val().split(' ')[0] )
        // arrSelectedRuncards = [];
        $(".spanOICount").html('');
        currentPoNo = $(this).val();
        dt_pilot_run.draw();
        $('#txt_device_name_lbl').val('');
        $('#txt_device_code_lbl').val('');
        $('#txt_po_qty_lbl').val('');
        $('#txt_device_name').val('');

        $("#txt_AKLdrawing").val('');
        $("#txt_AKLdrawing_rev").val('');
        $("#txt_AKLdrawing_page").val('');

        $("#txt_GAGdrawing").val('');
        $("#txt_GAGdrawing_rev").val('');
        $("#txt_GAGdrawing_page").val('');

        $("#txt_PackDocdrawing").val('');
        $("#txt_PackDocdrawing_rev").val('');
        $("#txt_PackDocdrawing_page").val('');

        $(this).val('');
        $(this).focus();
      }
    });

    dt_pilot_run = $('#tbl_pilot_run1').DataTable({
        "processing" : true,
        "serverSide" : true,
        "ajax" : {
          url: "get_pilotrun_by_po",
          data: function (param){
              param.po_no = currentPoNo;
              param.status = [0,1,2,3,4,5,6,7,8,9];
          }
        },
        bAutoWidth: false,

        "columns":[
          { "data" : "raw_action", orderable:false, searchable:false},
          { "data" : "status_lbl" },
        //   { "data" : "control_type" },
        //   { "data" : "pair_no" },
          { "data" : "created_at" },
        ],
        "columnDefs": [
          {
            "targets": [1, 2],
            "data": null,
            "defaultContent": "--"
          },
        ],
        order: [[2, "desc"]],
        "rowCallback": function(row,data,index ){
          currentPoNo = data['po_no'];
          $('#txt_po_number').val( data['po_no'] ); //po_modify - DTable
          $('#txt_device_name_lbl').val( data['wbs_kitting']['device_name'] );
          $('#txt_po_qty_lbl').val( data['wbs_kitting']['po_qty'] );
        },
        "drawCallback": function(row,data,index ){
          // GetMaterialKittingListByPoNo($(".selAccessoryName"), $('#txt_po_number').val());

          // $(".chkSelProdRuncard").each(function(index){
          //     if(arrSelectedRuncards.includes($(this).attr('production-runcard-id'))){
          //         $(this).attr('checked', 'checked');
          //     }
          // });

          // var api = this.api();
          // var rows = api.rows( {page:'current'} ).nodes();
          // var last = null;
        //   GetMaterialKitting();
        //   getMaterialIssuancetoProbes();
        },
        paging: false,
    });

    $("#btnShowAddPilotRun").click(function(){
      if($("#txt_po_number").val() == "" || $("#txt_po_number").val() == null){
        toastr.warning('PO not found!'); //po_modify - clickbutton
      }
      else{
        $.ajax({
          url: "get_data_by_po_no",
          method: "get",
          data: {
              po_no: $("#txt_po_number").val(),
              device_name: $("#txt_device_name_lbl").val(),
              po_qty: $("#txt_po_qty_lbl").val(),
              validate: true,
          },
          dataType: "json",
          success: function(data){
            $("#modalPilotRunDetailsA").modal('show');
            $('#id_btn_save_pilotA').removeClass('d-none');
            $("#txt_series_name").val($("#txt_device_name_lbl").val());
            $("#txt_po_num").val($("#txt_po_number").val());
            $("#txt_po_qty").val($("#txt_po_qty_lbl").val());
            frmPilotrunAdetails.find('#btnScanECheckedBy').attr('disabled',true);
            frmPilotrunAdetails.find('.txt_AKLdrawing_pn').html('Checked by - Auto generated');
            frmPilotrunAdetails.find('.txt_mlc_mat_name_list_emp_name').html('Checked by - Auto generated');
            frmPilotrunAdetails.find('.txt_surc_assembly_type_first_emp_name').html('Checked by - Auto generated');
            frmPilotrunAdetails.find('.txt_prc_plastic_emp_name').html('Checked by - Auto generated');
            frmPilotrunAdetails.find('#txt_start_datetime').html('Auto generated');
            frmPilotrunAdetails.find('input[type=radio]').removeAttr('checked',true);
            frmPilotrunAdetails.find('button[data-checked-by=txt_surc_assembly_type_first_emp_name]').attr('disabled',true);
            frmPilotrunAdetails.find('#rdo_surc_moving_test_100').addClass('d-none',true);
            frmPilotrunAdetails.find('#rdo_surc_moving_test_sampling').addClass('d-none',true);
            frmPilotrunAdetails.find('#rdo_surc_resist_check_100').addClass('d-none',true);
            frmPilotrunAdetails.find('#rdo_surc_resist_check_sampling').addClass('d-none',true);

            frmPilotrunAdetails.find('.prodn-container input').not(exceptInputs).removeAttr('readonly',true); /*Check the docReady for the exceptInputs id*/
            frmPilotrunAdetails.find('.prodn-container input[type=radio]').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.prodn-container #btnSearchProdn').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.prodn-container select').removeAttr('readonly',true);
            frmPilotrunAdetails.find('.engg-container input').attr('readonly',true); /*Check the docReady for the exceptEnggInputs id*/
            frmPilotrunAdetails.find('.engg-container input[type=radio]').attr('disabled',true);
            frmPilotrunAdetails.find('.engg-container#btnScanECheckedBy').attr('disabled',true);
            frmPilotrunAdetails.find('.engg-container select').attr('readonly',true);

            getMaterialIssuancetoProbes(frmPilotrunAdetails); //nmodify
            // GetMaterialKitting();
            // getMaterialIssuancetoProbes();
          }
        })
      }
    });

    $('input[type=radio][name=with_accessory_req]').change(function(){
      if (this.value == '2') {
          $('#txt_with_accessory_req_no').attr("readonly",true);
          $('#txt_with_accessory_req_no').val('0');
      }else if (this.value == '1') {
          $('#txt_with_accessory_req_no').attr("readonly",false);
      }
    });


    $("#frm_pilotrun_Adetails").submit(function(event){
      event.preventDefault();
      AddPilotRunA();
    });

    /* Packing Document */
    $('#txt_PackDocdrawing').change(function () {
      if($('#txt_PackDocdrawing').val() != 0) {
        var thiss = $(this);
        $('#list_txt_PackDocdrawing option').each(function(index) {
            var id = $(this).val();
            var name = $(this).text();
            var revision = $(this).attr('data-revision');
            var no_pages = $(this).attr('no-pages');

            if($(thiss).val()==id){
            $('#txt_PackDocdrawing_rev').val(revision);
            $('#txt_PackDocdrawing_page').val(no_pages);
            }
        });

      }else{
          $('#txt_PackDocdrawing_rev').val('N/A');
          $('#txt_PackDocdrawing_page').val('N/A');
      }
    });

    $(".class_txt_PackDocdrawing").on("keyup", function(e){//<!--testmodify-->

      var parent        = $(this).closest(".row_container");
      var data = {
        "action"          : "get_PackDocdrawing",
        "device_name"     : $("#txt_device_name_lbl").val(),
        "str"             : $(this).val(),
      }
      data = $.param(data);
      $.ajax({
          type      : "get",
          dataType  : "json",
          data      : data,
          url       : "get_PackDocdrawing",
        success       : function(data){

          var list    = "";

           list+="<option value='N/A' data-revision='N/A' no-pages='N/A'>N/A</option>";
          if ($.trim(data['doc'])){
            for(var ctr=0;ctr<data['doc'].length;ctr++){
              list+="<option value='"+data['doc'][ctr]['doc_no']+"' data-revision='"+data['doc'][ctr]['rev_no']+"' no-pages='"+data['doc'][ctr]['no_of_pages']+"'>"+data['doc'][ctr]['doc_no']+' '+data['doc'][ctr]['doc_title']+' '+data['doc'][ctr]['rev_no']+"</option>";

            }
          }
           console.log(data['doc'])
          $(parent).find(".class_dl_PackDocdrawing").html(list);
        }
      });
    });

    /* Packing Specs */
    $('#txt_PackSpecsdrawing').change(function () {
      if($('#txt_PackSpecsdrawing').val() != 0) {
        var thiss = $(this);
        $('#list_txt_PackSpecsdrawing option').each(function(index) {
            var id = $(this).val();
            var name = $(this).text();
            var revision = $(this).attr('data-revision');
            var no_pages = $(this).attr('no-pages');

            if($(thiss).val()==id){
            $('#txt_PackSpecsdrawing_rev').val(revision);
            $('#txt_PackSpecsdrawing_page').val(no_pages);
            }
        });
      }else{
          $('#txt_PackSpecsdrawing_rev').val('N/A');
          $('#txt_PackSpecsdrawing_page').val('N/A');
      }
    });

    $(".class_txt_PackSpecsdrawing").on("keyup", function(e){

      var parent        = $(this).closest(".row_container");
      var data = {
        "action"          : "get_PackSpecsdrawing",
        "device_name"     : $("#txt_device_name_lbl").val(),
        "str"             : $(this).val(),
      }
      data = $.param(data);
      $.ajax({
          type      : "get",
          dataType  : "json",
          data      : data,
          url       : "get_PackSpecsdrawing",
        success       : function(data){

          var list    = "";

           list+="<option value='N/A' data-revision='N/A' no-pages='N/A'>N/A</option>";
          if ($.trim(data['doc'])){
            for(var ctr=0;ctr<data['doc'].length;ctr++){
              list+="<option value='"+data['doc'][ctr]['doc_no']+"' data-revision='"+data['doc'][ctr]['rev_no']+"' no-pages='"+data['doc'][ctr]['no_of_pages']+"'>"+data['doc'][ctr]['doc_no']+' '+data['doc'][ctr]['doc_title']+' '+data['doc'][ctr]['rev_no']+"</option>";

            }
          }
           console.log(data['doc'])
          $(parent).find(".class_dl_PackSpecsdrawing").html(list);
        }
      });
    });

    /* OT/Urgent Direction */
    $('#txt_OTUDdrawing').change(function () {
      if($('#txt_OTUDdrawing').val() != 0) {
        var thiss = $(this);
        $('#list_txt_OTUDdrawing option').each(function(index) {
            var id = $(this).val();
            var name = $(this).text();
            var revision = $(this).attr('data-revision');
            var no_pages = $(this).attr('no-pages');

            if($(thiss).val()==id){
            $('#txt_OTUDdrawing_rev').val(revision);
            $('#txt_OTUDdrawing_page').val(no_pages);
            }
        });

      }else{
          $('#txt_OTUDdrawing_rev').val('N/A');
          $('#txt_OTUDdrawing_page').val('N/A');
      }
    });

    $(".class_txt_OTUDdrawing").on("keyup", function(e){
      var parent        = $(this).closest(".row_container");
      var data = {
        "action"          : "get_OTUDdrawing",
        "device_name"     : $("#txt_device_name_lbl").val(),
        "str"             : $(this).val(),
      }
      data = $.param(data);
      $.ajax({
          type      : "get",
          dataType  : "json",
          data      : data,
          url       : "get_OTUDdrawing",
        success       : function(data){

          var list    = "";

           list+="<option value='N/A' data-revision='N/A' no-pages='N/A'>N/A</option>";
          if ($.trim(data['doc'])){
            for(var ctr=0;ctr<data['doc'].length;ctr++){
              list+="<option value='"+data['doc'][ctr]['doc_no']+"' data-revision='"+data['doc'][ctr]['rev_no']+"' no-pages='"+data['doc'][ctr]['no_of_pages']+"'>"+data['doc'][ctr]['doc_no']+' '+data['doc'][ctr]['doc_title']+' '+data['doc'][ctr]['rev_no']+"</option>";

            }
          }
           console.log(data['doc'])
          $(parent).find(".class_dl_OTUDdrawing").html(list);
        }
      });
    });

     /* Work Instruction  */
    $('#txt_WIDdrawing').change(function () {
      if($('#txt_WIDdrawing').val() != 0) {
        var thiss = $(this);
        $('#list_txt_WIDdrawing option').each(function(index) {
            var id = $(this).val();
            var name = $(this).text();
            var revision = $(this).attr('data-revision');
            var no_pages = $(this).attr('no-pages');

            if($(thiss).val()==id){
            $('#txt_WIDdrawing_rev').val(revision);
            $('#txt_WIDdrawing_page').val(no_pages);
            }
        });

      }else{
          $('#txt_WIDdrawing_rev').val('N/A');
          $('#txt_WIDdrawing_page').val('N/A');
      }
    });

    $(".class_txt_WIDdrawing").on("keyup", function(e){

      var parent        = $(this).closest(".row_container");
      var data = {
        "action"          : "get_WIDdrawing",
        "device_name"     : $("#txt_device_name_lbl").val(),
        "str"             : $(this).val(),
      }
      data = $.param(data);
      $.ajax({
          type      : "get",
          dataType  : "json",
          data      : data,
          url       : "get_WIDdrawing",
        success       : function(data){

          var list    = "";

           list+="<option value='N/A' data-revision='N/A' no-pages='N/A'>N/A</option>";
          if ($.trim(data['doc'])){
            for(var ctr=0;ctr<data['doc'].length;ctr++){
              list+="<option value='"+data['doc'][ctr]['doc_no']+"' data-revision='"+data['doc'][ctr]['rev_no']+"' no-pages='"+data['doc'][ctr]['no_of_pages']+"'>"+data['doc'][ctr]['doc_no']+' '+data['doc'][ctr]['doc_title']+' '+data['doc'][ctr]['rev_no']+"</option>";

            }
          }
           console.log(data['doc'])
          $(parent).find(".class_dl_WIDdrawing").html(list);
        }
      });
    });
    /* Redirect to RAPID ACDCS */
    $("#btnView_AKLdrawing").click(function(){
      redirect_to_drawing( $('#txt_AKLdrawing').val(), 0 )
    });

    $("#btnView_GAGdrawing").click(function(){
      redirect_to_drawing( $('#txt_GAGdrawing').val(), 1 )
    });

    $("#btnView_PackDocdrawing").click(function(){
      redirect_to_drawing( $('#txt_PackDocdrawing').val(), 2 )
    });

    $("#btnView_PackSpecsdrawing").click(function(){
      redirect_to_drawing( $('#txt_PackSpecsdrawing').val(), 3 )
    });

    $("#btnView_OTUDdrawing").click(function(){
      redirect_to_drawing( $('#txt_OTUDdrawing').val(), 4 )
    });

    $("#btnView_WIDdrawing").click(function(){
      redirect_to_drawing( $('#txt_WIDdrawing').val(), 5 )
    });

    function redirect_to_drawing(txt_Adrawing, index) {
      if ( txt_Adrawing == 'N/A' || txt_Adrawing == '' ){
        alert('No Document Required')
      }
      else{
        window.open("http://rapid/ACDCS/prdn_home_pats?doc_no="+txt_Adrawing)
      }
    }

    /* Employee Scanning */ //bmodify find the scan data
    $('.btnSearchProdn').click(function(){
      $('#txt_employee_id').val(''); //bmodify find the scan data
      let dataCheckedBy = $(this).attr('data-checked-by'); // for dynamic checked_by input
      let dataCheckedByHidden = $(this).attr('data-checked-by-hidden'); // for dynamic checked_by input
      console.log('dataCheckedBy: ', dataCheckedBy);
      console.log('dataCheckedByHidden: ', dataCheckedByHidden);
      $('#modalSearchProdn').attr('modal-checked-by', dataCheckedBy);
      $('#modalSearchProdn').attr('modal-checked-by-hidden', dataCheckedByHidden);
    });

    $(document).on('click','.btnScan',function(e){
      let btnScanId = $(this).attr('id');
      console.log('btnScanId: ',btnScanId);
      $('#txt_employee_number_scanner').val('');
      $('#mdl_employee_number_scanner').attr('data-formid',btnScanId).modal('show');

    });

    $(document).on('keypress',function(e){
        $('#txt_employee_number_scanner').focus();
        if( ($("#mdl_employee_number_scanner").data('bs.modal') || {})._isShown ){
            if( e.keyCode == 13 && $('#txt_employee_number_scanner').val() !='' && ($('#txt_employee_number_scanner').val().length >= 4) ){
            var formid = $("#mdl_employee_number_scanner").attr('data-formid');
            if ( ( formid ).indexOf('#') > -1){
                $( formid ).submit();
            }
            else{
                switch( formid ){
                    case 'btnScanECheckedBy':
                    $.ajax({
                    url: "get_user_by_employee_no",
                    method: "get",
                    data: {
                        employee_no: $("#txt_employee_number_scanner").val()
                    },
                    dataType: "json",
                    beforeSend: function(){},
                    success: function(data){
                        console.log('data: ',data['data']);
                        if(data['data'] != null){
                            if(data['data']['position'] == 9){ // Engineer
                            frmPilotrunAdetails.find('input[name="txt_surc_assembly_type_first_emp_name"]').val(data['data']['name']);
                            frmPilotrunAdetails.find('input[name="hidden_surc_assembly_type_first_emp_id"]').val(data['data']['id']);
                            }
                            else{
                            frmPilotrunAdetails.find('input[name="txt_surc_assembly_type_first_emp_name"]').val('');
                            frmPilotrunAdetails.find('input[name="hidden_surc_assembly_type_first_emp_id"]').val('');
                            toastr.warning('Engineer not found!');
                            }
                        }else{
                            frmPilotrunAdetails.find('input[name="txt_surc_assembly_type_first_emp_name"]').val('');
                            frmPilotrunAdetails.find('input[name="hidden_surc_assembly_type_first_emp_id"]').val('');
                            toastr.error('User not found!');
                        }
                    },
                    error: function(data, xhr, status){
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                    });
                    break;
                default:
                    break;
                }
            }
            $('#mdl_employee_number_scanner').modal('hide');
            }
        }
    });

    $(document).on('keypress',function(e){
      if( ($("#modalSearchProdn").data('bs.modal') || {})._isShown ){
        $('#txt_employee_id').focus();

        if( e.keyCode == 13 && $('#txt_employee_id').val() !='' && ($('#txt_employee_id').val().length >= 4) ){
            $('#modalSearchProdn').modal('hide');
          }
        }
    });

    $("#txt_employee_id").keydown(function (e) {
      let modalCheckedByValues = $('#modalSearchProdn').attr('modal-checked-by'); // for dynamic checked_by input
      let modalCheckedByHiddenValues = $('#modalSearchProdn').attr('modal-checked-by-hidden'); // for dynamic checked_by input

        if (e.keyCode == 13) {
          $.ajax({
            'data'      : {
              employee_id: $("#txt_employee_id").val(),
              // position: [1,3,4]
              position: 3, // Material Handler
              // user_level_id: 11,
            },
            'type'      : 'get',
            'dataType'  : 'json',
            'url'       : 'employee_id_checker', //bmodify
            success     : function(JsonObject){
                console.log(modalCheckedByValues);

                if(JsonObject['result'] == 1){
                    GetEmployeeDetails($('#txt_employee_id').val(), modalCheckedByValues, modalCheckedByHiddenValues);
                }
                else if(JsonObject['result'] == 0){
                    $('#mdl_alert #mdl_alert_title').html('<i class="fa fa-exclamation-triangle text-danger"></i> ALERT!');
                    $('#mdl_alert #mdl_alert_body').html('<center>Scanned Employee ID is not MH!<center>');
                    $('#mdl_alert').modal('show');
                }
                else
                    toastr.error(JsonObject['error_msg']);
                },
                completed     : function(data){

                },
                error     : function(data){
                },
          });
        }
    });

    function GetEmployeeDetails(employee_id, modalCheckedByValues, modalCheckedByHiddenValues){
      $.ajax({
        url: "load_user_details",
        method: "get",
        data:
        {
          employee_id: employee_id,
        },
        dataType: "json",
        beforeSend: function(){
        },
        success: function(JsonObject)
        {
          if(JsonObject['result'] == 1)
          {
            let operator_names
            let userId = JsonObject['user_details'][0].id;
            let userName = JsonObject['user_details'][0].name;
              $('#'+modalCheckedByHiddenValues).val(userId.toString());
              $('#'+modalCheckedByValues).val(userName.toString());
          }
          else
          {
            toastr.error('Employee ID not Found!');
          }
        },
        error: function(data, xhr, status){
          toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
      });
    }

    $('input[type=radio][name=special_control_type]').change(function(){
      if (this.value == '6') {
          $('input[name=special_other_type]').attr("disabled",false);
      }else{
          $('input[name=special_other_type]').attr("disabled",false);
          $('input[name=special_other_type]').prop('checked', false);
      }
    });

    $('input[type=radio][name=control_type]').change(function(){
      if (this.value == '2') {
          $('input[name=special_control_type]').attr("disabled",true);
          $('input[name=special_control_type]').prop('checked', false);
          $('input[name=special_other_type]').attr("disabled",true);
          $('input[name=special_other_type]').prop('checked', false);
          $('input[name=special_other_type]').val('');
      }else if (this.value == '1') {
          $('input[name=special_control_type]').attr("disabled",false);
          $('input[name=special_other_type]').attr("disabled",false);
      }
    });

    $('input[type=radio][name=with_accessory_req]').change(function(){
      if (this.value == '2') {
          $('#txt_with_accessory_req_no').attr("readonly",true);
      }else if (this.value == '1') {
          $('#txt_with_accessory_req_no').attr("readonly",false);
      }
    });

    $("#tbl_pilot_run1").on('click','.btnOpenPilotRunDetails',function(e){
        let global_pilotrun_id = $(this).attr('pilotrun-id');
        let global_pilotrun_status = $(this).attr('pilotrun-status');
        let user_level_id = $(this).attr('user-level-id');
        let employee_name = $(this).attr('employee-name');
        console.log('user_level'+user_level_id);

        $("#modalPilotRunDetailsA").modal('show');
        $('#global_pilotrun_id').val(global_pilotrun_id);
        $('#global_status').val(global_pilotrun_status);
        frmPilotrunAdetails.find('#btnScanECheckedBy').removeAttr('disabled',true);
        frmPilotrunAdetails.find('input[name=employee_name]').val(employee_name);
        console.log(employee_name);

        if(global_pilotrun_status >= 1 && user_level_id != 2){
            console.log('position_id');
            $('#id_btn_save_pilotA').addClass('d-none');
            // user_levels->name
        }
        /* STATUS == 0 : Set the Engineer Input as Display None */
        if(global_pilotrun_status == 0){
            $('#id_btn_save_pilotA').removeClass('d-none');
            // $('.actions button').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.prodn-container input').attr('readonly',true);
            frmPilotrunAdetails.find('.prodn-container input[type=radio]').addClass('d-none',true);
            frmPilotrunAdetails.find('.prodn-container #btnSearchProdn').attr('disabled',true);
            frmPilotrunAdetails.find('.prodn-container select').attr('readonly',true);
            frmPilotrunAdetails.find('.engg-container input').not(exceptEnggInputs).removeAttr('readonly',true);/*Check the docReady for the exceptEnggInputs id*/
            frmPilotrunAdetails.find('.engg-container input[type=radio]').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.engg-container #btnScanECheckedBy').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.engg-container select').removeAttr('readonly',true);
        }
        /* STATUS greater than 0 : Show all Input Display but Disabled the Save Button */
        else if(global_pilotrun_status > 0){
            // $('#id_btn_save_pilotA').addClass('d-none');
            // $('.actions button').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.prodn-container input').not(exceptInputs).removeAttr('readonly',true);
            frmPilotrunAdetails.find('.prodn-container input[type=radio]').removeClass('d-none',true); /*Check the docReady for the exceptEnggInputs id*/
            frmPilotrunAdetails.find('.prodn-container #btnSearchProdn').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.prodn-container select').removeAttr('readonly',true);
            frmPilotrunAdetails.find('.engg-container input[type=radio]').removeAttr('disabled',true); /*Check the docReady for the exceptEnggInputs id*/
            frmPilotrunAdetails.find('.engg-container input').not(exceptEnggInputs).removeAttr('readonly',true);
            frmPilotrunAdetails.find('.engg-container #btnScanECheckedBy').removeAttr('disabled',true);
            frmPilotrunAdetails.find('.engg-container select').removeAttr('readonly',true);
        }
        GetProdPilotRunA(global_pilotrun_id);
    });

    $("#tbl_pilot_run1").on('click','.btnPrintPilotRun',function(e){
    let formA = 'formA';
    global_pilotrun_id = $(this).attr('pilotrun-id');
    console.log(global_pilotrun_id);
    GetPilotRunToPrint(global_pilotrun_id,formA);
    // alert(global_pilotrun_id)
    });

    $("#modalPilotRunDetailsA").on('hidden.bs.modal', function () {
        $("#frm_pilotrun_Adetails")[0].reset();

        $('b').removeAttr('style');
        $('i').removeAttr('style');
        $('i').removeAttr('style');
        $(':radio(:checked)').attr('disabled', false);

        $("#txt_PackDocdrawing").attr('readonly', false)
        $("#txt_PackDocdrawing_rev").attr('readonly', false)
        $("#txt_PackDocdrawing_page").attr('readonly', false)

        $("#txt_PackSpecsdrawing").attr('readonly', false)
        $("#txt_PackSpecsdrawing_rev").attr('readonly', false)
        $("#txt_PackSpecsdrawing_page").attr('readonly', false)

        $("#txt_OTUDdrawing").attr('readonly', false)
        $("#txt_OTUDdrawing_rev").attr('readonly', false)
        $("#txt_OTUDdrawing_page").attr('readonly', false)

        $("#txt_WIDdrawing").attr('readonly', false)
        $("#txt_WIDdrawing_rev").attr('readonly', false)
        $("#txt_WIDdrawing_page").attr('readonly', false)
        // $("#id_btn_save_pilotA").show()
    });
  });
  $("#btnPrintPilotRunBarcode").click(function(){
    console.log('btnPrintPilotRunBarcode');
    popup = window.open();
    let content = '';

    content += '<html>';
    content += '<head>';
    content += '<title></title>';
    content += '<style type="text/css">';

    // content += '.rotated {';
    // content += 'width: 180px;';
    // content += 'position: absolute;';
    // content += '}';

    content += '.rotated {';
      content += 'padding-top: 10px;';
    content += '}';

    content += '</style>';
    content += '</head>';
    content += '<body>';
    content += '<div class="rotated">';
    content += '<table>';
    content += '<tr>';
    content += '<td>';
    content += '<img src="' + $("#imgGenPilotRunPoNoBarcode").attr('src') + '" style="min-width: 60px; max-width: 60px;">';
    content += '</td>';
    content += '<td>';
    content += '<label style="font-weight: bold; font-family: Arial; font-size: 10px;">' + $("#lblGenPilotRunPoNo").text() + '</label><br>';
    content += '<label style="font-weight: bold; font-family: Arial; font-size: 10px;">' + $("#lblGenPilotRunSeriesName").text() + '</label><br>';
    content += '<label style="font-weight: bold; font-family: Arial; font-size: 10px;">' + $("#lblGenPilotRunQty").text() + '</label><br>';
    content += '</td>';
    content += '</tr>';

    let date = new Date();
    content += '<tr>';
    content += '<td colspan="4" style="font-size: 8px;float: center;font-family: Arial;">';
    content += '<center><span class="title">';
    content += date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
    content += '</span>';
    content += '</center></td>';
    content += '</tr>';
    content += '</table>';
    content += '</div>';
    content += '</body>';
    content += '</html>';

    popup.document.write(content);
    popup.focus();
    popup.print();
    popup.close();
  });

  /* Search PO */
  $(".btnSearchPoNo").click(function(){
    $("#txtSearchPoNum").val('');
    $('#modalScanPONum').attr('data-formid', 'search_po_number').modal('show');
  });

  $(document).on('keypress',function(e){
    if( ($("#modalScanPONum").data('bs.modal') || {})._isShown ){
      $('#txtSearchPoNum').focus();
      if( e.keyCode == 13 && $('#txtSearchPoNum').val() !='' && ($('#txtSearchPoNum').val().length >= 4) ){
        $('#modalScanPONum').modal('hide');
        var formid = $("#modalScanPONum").attr('data-formid');

        if ( ( formid ).indexOf('#') > -1){
          $( formid ).submit();
        }
        else{
          switch( formid ){
            case 'search_po_number':
              currentPoNo = $("#txtSearchPoNum").val();
              $("#txt_po_number").val(currentPoNo); //po_modify - keypress
              dt_pilot_run.draw();
              getMaterialIssuancetoProbes(frmPilotrunAdetails); //nmodify
            //   GetMaterialKitting();
              $('#txt_po_number').val('');
              $('#txt_device_name_lbl').val('');
              $('#txt_device_code_lbl').val('');
              $('#txt_po_qty_lbl').val('');
              $('#txt_device_name').val('');
              $(this).val('');
              $(this).focus();
            break;
            default:
            break;
          }
        }
      }
    }
  });

  $(document).on('keypress',function(e){
    if( e.keyCode == 13 && $('#txt_po_number').val() !='' && $('#txt_po_number').val().length >= 4){

      currentPoNo = $("#txt_po_number").val();
      dt_pilot_run.draw();
      $('#txt_po_number').val('');
      $('#txt_device_name_lbl').val('');
      $('#txt_device_code_lbl').val('');
      $('#txt_po_qty_lbl').val('');
      $('#txt_device_name').val('');
      $(this).val('');
      $(this).focus();
    }
  });

  $(document).on('keydown',function(e){
    if ($("#txt_employee_id").is(":focus")) {
      setTimeout(function() {
        $("#txt_employee_id").val('');
      }, 300);
    }
  });

  $(document).on('keydown',function(e){
    if ($("#txt_employee_number_scanner").is(":focus")) {
      setTimeout(function() {
        $("#txt_employee_number_scanner").val('');
      }, 300);
    }
  });

/**
 * NOTE: 05062023 - MODIFY BY MIGZ - This function GetMaterialKitting is not inactive.
 * Instead go to function getMaterialIssuancetoProbes
*/
function GetMaterialKitting(){
      $.ajax({
        url: "get_wbs_material_kitting_rev",
        method: 'get',
        dataType: 'json',
        data: {
          po_number: currentPoNo
        },
        beforeSend: function(){
          boxing = "";
          assessment = "";
        },
        success: function(data){
        /* NOTE: If the device name is not found get the Material Details (PMI PO or Strategic PO) to pats_ts_maverick DB */
            if(data['device_name_print']=='not found'){
                getMaterialIssuancetoProbes(frmPilotrunAdetails); //nmodify
            }else{
                console.log('NOTE: This output is a WBS PO');
                if(data['material_kitting'] != null){
                    $("#txt_po_number").val(data['material_kitting']['po_no']); //po_modify - GetMatKitting
                    $("#txt_device_name_lbl").val(data['material_kitting']['device_name']);
                    $("#txt_device_code_lbl").val(data['material_kitting']['device_code']);
                    $("#txt_po_qty_lbl").val(data['material_kitting']['po_qty']);

                    if (data['orig_a_drawing'] ==''){
                        $("#txt_AKLdrawing").val('N/A');
                        $("#txt_AKLdrawing_rev").val('N/A');
                        $('.btnView_AKLdrawing').prop('disabled', true);
                    }else{
                        $("#txt_AKLdrawing").val(data['orig_a_drawing'][0]['doc_no']);
                        $("#txt_AKLdrawing_rev").val(data['orig_a_drawing'][0]['rev_no']);
                        $("#txt_AKLdrawing_page").val(data['orig_a_drawing'][0]['no_of_pages']);
                    }

                    if (data['g_drawing'] ==''){
                        $("#txt_GAGdrawing").val('N/A');
                        $("#txt_GAGdrawing_rev").val('N/A');
                        $('.btnView_GAGdrawing').prop('disabled', true);
                    }else{
                        $("#txt_GAGdrawing").val(data['g_drawing'][0]['doc_no']);
                        $("#txt_GAGdrawing_rev").val(data['g_drawing'][0]['rev_no']);
                        $("#txt_GAGdrawing_page").val(data['g_drawing'][0]['no_of_pages']);
                    }

                    if(data['material_kitting']['device_info'] != null){
                        boxing = data['material_kitting']['device_info']['boxing'];
                    }
                    else{
                        boxing = "";
                    }

                    if(data['material_kitting']['assessment'] != null){
                        assessment = data['material_kitting']['device_info']['assessment'];
                    }
                    else{
                        assessment = "";
                    }
                    $("#txt_ct_supplier").val('YEC');
                }
                else{
                    $("#txt_po_number").val(''); //po_modify - GetMatKitting
                    $("#txt_device_name_lbl").val('');
                    $("#txt_device_code_lbl").val('');
                    $("#txt_po_qty_lbl").val('');
                    $("#txt_lot_qty").val('');
                }
            }
        }
      });
    }
  </script>
  @endsection
