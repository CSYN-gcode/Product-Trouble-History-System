@php $layout = 'layouts.super_user_layout'; @endphp

{{-- Here I removed the @auth because the dashboard isn't loading properly --}}
    @extends($layout)
    @section('title', 'Paper Consumption')

    @section('content_page')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Paper Consumption</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>

                                <!-- PAPER CONSUMPTION ONLY -->
                                {{-- <!-- <li class="breadcrumb-item"><a href="{{ route('energy_consumption') }}">Energy Consumption</a></li> --}}
                                {{-- <li class="breadcrumb-item"><a href="{{ route('water_consumption') }}">Water Consumption</a></li> --> --}}

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
                                    {{-- <ul class="nav nav-tabs" id="myTab" role="tablist"> --}}
                                        {{-- <li class="nav-item">
                                            <a class="nav-link active" id="april-tab" data-toggle="tab"
                                                href="#april" role="tab" aria-controls="april"
                                                aria-selected="true">Factory 1</a>
                                        </li> --}}
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="may-tab" data-toggle="tab" href="#may"
                                                role="tab" aria-controls="may" aria-selected="false">Factory 2</a>
                                        </li> --}}
                                    {{-- </ul> --}}

                                    {{-- <div class="tab-content" id="myTabContent"> --}}

                                    {{-- <div class="tab-pane fade show active" id="april" role="tabpanel" --}}
                                    {{-- aria-labelledby="april-tab"> --}}


                                        <div class="text-left mt-4 d-flex flex-row">
                                            <div class="form-group ml-3 col-2">
                                                <label><strong>Fiscal Year :</strong></label>
                                                <select class="form-control select2bs4 selectYearPaper" name="fiscal_year_value"
                                                    id="selFiscalYearPaper" style="width: 100%;">
                                                    <!-- Code generated -->
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
                                    {{-- </div> --}}

                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
