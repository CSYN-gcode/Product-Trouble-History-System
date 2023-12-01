<form id="frm_prod_identification" method="post">
    @csrf
    <div class="modal-body">
          <div class="accordion" id="accordionMain">
              {{-- <h5 class="modal-title"> I. Product Identification & Drawing Revision Checking <strong>(Responsible:Machine Operator)</strong></h5> --}}
              <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h5 class="modal-title"> I. Product Identification & Drawing Revision Checking <strong>(Responsible:Machine Operator)</strong></h5>
              </button>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
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
                                  <span class="input-group-text w-100" id="basic-addon1">Die No.</span>
                              </div>
                              <input type="text" class="form-control form-control-sm" id="frm_txt_die_no" name="die_no" readonly>
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

                      <div class="col-sm-2">
                          <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-50">
                                  <span class="input-group-text w-100" id="basic-addon1">Rev No.</span>
                              </div>
                              <input type="text" class="form-control form-control-sm" id="frm_txt_rev_no" name="rev_no" readonly>
                          </div>
                      </div>
                  </div>

                  <div class="row"><!-- 2nd row -->

                      <div class="col-sm-4">
                          <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-50">
                                  <span class="input-group-text w-100" id="basic-addon1">P.O #:</span>
                              </div>
                              <input type="text" class="form-control form-control-sm" id="frm_txt_po_no" name="po_no" readonly>
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

                      <div class="col-sm-3">
                          <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend w-100">
                                  <span class="input-group-text w-100" id="basic-addon1">Start Date/Time (Auto)</span>
                              <span class="input-group-text w-100" id="txt_start_datetime" name="txt_start_datetime" id="txt_start_datetime"></span>
                              </div>

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
              <div><!-- ATTRIBUTE HIDDEN -->
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
            <button type="submit" id="id_btn_save_pilotA" class="btn btn-primary btn-sm"><i class="fa fa-check fa-xs icon_save_pilotA"></i> Save</button>
            <button type="button" id="id_btn_close" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
    </div>
  </form>
