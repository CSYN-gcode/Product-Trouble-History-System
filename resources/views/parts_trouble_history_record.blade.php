@php $layout = 'layouts.super_user_layout'; @endphp
{{-- @auth
  @php
    if(Auth::user()->user_level_id == 1){
      $layout = 'layouts.super_user_layout';
    }
    else if(Auth::user()->user_level_id == 2){
      $layout = 'layouts.admin_layout';
    }
    else if(Auth::user()->user_level_id == 3){
      $layout = 'layouts.user_layout';
    }
  @endphp
@endauth --}}

{{-- @auth --}}
@extends($layout)
@section('title', 'Parts Trouble History Record')
@section('content_page')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parts Trouble History Record</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Parts Trouble History Record</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-sm-12">
                        <!-- general form elements -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Parts Trouble History Record Module</h3>
                            </div>

                            <!-- Start Page Content -->
                            <div class="card-body">
                                <div class="float-sm-right">
                                    <button class="btn btn-dark" id="btnShowAddPartsTroubleHistory">
                                        <i class="fa fa-initial-icon"></i> Add Parts Trouble History
                                    </button>
                                </div>

                                <div class="float-sm-left col-2">
                                    {{-- <form id="frmSearchYear" class="form-inline"> --}}
                                        <label><strong>Filter Year : &nbsp;</strong></label>
                                        <input type="text" id="SearchYear" class="form-control" name="year" title="<?php echo date('Y'); ?>" value="<?php echo date('Y'); ?>">

                                        {{-- <button class="btn btn-primary" type="submit">Search</button> --}}
                                    {{-- </form> --}}

                                {{-- <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAdvancedSearch" id=""><i class="fas fa-search fa-md"></i> Advanced Search</button> --}}
                                </div>

                                <div class="float-sm-left mb-4 col-2">
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
                                    <table id="tblPartsTroubleHistory" class="table table-bordered table-striped table-hover" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Date Encountered</th>
                                                <th>Model</th>
                                                <th>Mode of Defect</th>
                                                <th>Illustration of Defect</th>
                                                <th>No of Occurence</th>
                                                <th>Root Cause</th>
                                                <th>Improvement Actions</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <!-- !-- End Page Content -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- MODALS -->
    <div class="modal fade" id="modalPartsTroubleHistory" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add/Edit Parts Trouble History Info</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="formPartsTroubleHistory" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="hidden" id="txtPartsTroubleHistoryId" name="id">

                                <div class="form-group">
                                    <label>Date Encountered</label>
                                    <input type="date" class="form-control" name="date_encountered" id="dateEncountered" required>
                                </div>

                                <div class="form-group">
                                    <label for="imageUpload">Illustration of Defect</label>
                                    <input type="file" class="form-control" name="illustration_of_defect" id="illustrationOfDefect" accept="image/*" required>
                                </div>

                                <div class="form-group">
                                    <label>Mode of Defect</label>
                                    <select type="text" class="form-control select2bs5" name="mode_of_defect" id="modeOfDefect" required></select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" class="form-control" name="model" id="model" required>
                                </div>

                                <div class="form-group">
                                    <label>No. of Occurence</label>
                                    <input type="text" class="form-control" name="no_of_occurence" id="noOfOccurence" required>
                                </div>

                                <div class="form-group">
                                    <label>Root Cause</label>
                                    <input type="text" class="form-control" name="root_cause" id="rootCause" required>
                                </div>
                            </div>

                            {{-- Multiple Data for Improvement Actions --}}
                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive">
                                        <div class="d-flex justify-content-between">

                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button type="button" id="btnAddImprovementAction" class="btn btn-primary"><i class="fa fa-plus"></i> Add Improvements</button>
                                        </div>
                                        <br>
                                        <table class="table table-sm" id="tblImprovementActions">
                                            <thead>
                                                <tr>
                                                    <th style="width: 45%;">Improvement Action</th>
                                                    <th style="width: 45%;">Remarks</th>
                                                    <th style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Multiple Data for Improvement Actions --}}

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnSubmitPartsTroubleHistory" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('js_content')
    <script type="text/javascript">

    </script>
@endsection

