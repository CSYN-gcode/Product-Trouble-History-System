@php $layout = 'layouts.super_user_layout'; @endphp
@auth
    @php
    if (Auth::user()->user_level_id == 1) {
        $layout = 'layouts.super_user_layout';
    } elseif (Auth::user()->user_level_id == 2) {
        $layout = 'layouts.admin_layout';
    } elseif (Auth::user()->user_level_id == 3) {
        $layout = 'layouts.user_layout';
    }
    @endphp
@endauth

@extends($layout)
@section('title', 'Dashboard')

{{-- CONTENT PAGE--}}
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">User Management</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-right mt-4">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddUser"
                                        id="addUserModalbtn"><i class="fa fa-plus fa-md"></i> Add Staff</button>
                                </div><br>

                                <div class="table-responsive">
                                    <table id="tableUsers" class="table table-sm table-bordered table-striped table-hover display nowrap text-center" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;">Name</th>
                                                <th style="display: none">Section_Name</th>
                                                <th style="width: 15%;">Section</th>
                                                <th style="width: 20%;">Position</th>
                                                <th style="width: 20%;">User Level</th>
                                                <th style="width: 10%;">Status</th>
                                                <th style="width: 15%;">Action</th>
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
    </div>

    <!-- ADD USER MODAL START -->
    <div class="modal fade" id="modalAddUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Add Staff</h4>
                    <button type="button" style="color: #fff;" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="addUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <select class="form-control" id="selAddUserAccessUserId"
                                    name="user_id" style="width: 100%;">
                                    <option disabled selected>-- Select User --</option>
                                    <!-- <option disabled selected>-- Select User --</option> <option value="AL">Alabama</option> -->
                                    <!-- <option value="WY">Wyoming</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Section :</strong></label>
                                    <select class="form-control" name="section_id"
                                        id="selSection" style="width: 100%;">
                                        <option value="0" disabled selected>-- Select Department --</option>
                                        <option value="1">PPS-TS</option>
                                        <option value="2">PPS-CN</option>
                                        <option value="3">PPS-ADMIN</option>
                                        <option value="4">ADIMINISTRATOR</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Position:</strong></label>
                                    <select class="form-control" name="position_id"
                                        id="selPosition" style="width: 100%;">
                                        <option value="0" disabled selected>-- Select Position --</option>
                                        <option value="1">Production Operator</option>
                                        <option value="2">Die Maintenance Engineering</option>
                                        <option value="3">Process Technician</option>
                                        <option value="4">Process Engineering</option>
                                        <option value="5">LQC</option>
                                        <option value="6">Sr. Engineer</option>
                                        <option value="7">Manager</option>
                                        <option value="8">Administrator</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>User Level</label>
                                    <select class="form-control" name="userLevel"
                                        id="selAddUserLevelId" style="width: 100%;">
                                        <option disabled selected>-- Select Userlevel --</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddUser" class="btn btn-primary"><i id="btnAddUserIcon"
                                class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ADD USER MODAL END -->

    <!-- DEACTIVATE USER MODAL START -->
    <div class="modal fade" id="modalDeactivateUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Deactivate Staff</h4>
                    <button type="button" style="color: #fff" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="deactivateUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <label class="text-secondary mt-2">Are you sure you want to deactivate this user?</label>
                            <input type="hidden" class="form-control" name="user_id" id="deactivateUserID">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnDeactivateUser" class="btn btn-primary"><i id="deactivateIcon"
                                class="fa fa-check"></i> Deactivate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- DEACTIVATE USER MODAL END -->

    <!-- ACTIVATE USER MODAL START -->
    <div class="modal fade" id="modalActivateUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Activate Staff</h4>
                    <button type="button" style="color: #fff" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="activateUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row d-flex justify-content-center">
                            <label class="text-secondary mt-2">Activate this user?</label>
                            <input type="hidden" class="form-control" name="user_id" id="activateUserID">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnActivateUser" class="btn btn-primary"><i id="activateIcon"
                                class="fa fa-check"></i> Activate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ACTIVATE USER MODAL END -->

    <!-- EDIT USER MODAL START -->
    <div class="modal fade" id="modalEditUser">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Edit Staff</h4>
                    <button type="button" style="color: #fff;" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="editUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="txtEditUserAccessId" name="user_access_id">
                                    <label for="projectinput1">User</label>
                                    <select class="form-control" id="selEditUserAccessUserId" name="user_id"
                                    style="width: 100%;">
                                    <option disabled selected>-- Select User --</option>
                                    <!-- <option value="AL">Alabama</option> -->
                                    <!-- <option value="WY">Wyoming</option> -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Section :</strong></label>
                                    <select class="form-control" name="section_id"
                                        id="selSection" style="width: 100%;">
                                        <option value="0" disabled selected>-- Select Department --</option>
                                        <option value="1">PPS-TS</option>
                                        <option value="2">PPS-CN</option>
                                        <option value="3">PPS-ADMIN</option>
                                        <option value="4">ADIMINISTRATOR</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label><strong>Position:</strong></label>
                                    <select class="form-control" name="position_id"
                                        id="selPosition" style="width: 100%;">
                                        <option value="0" disabled selected>-- Select Position --</option>
                                        <option value="1">Production Operator</option>
                                        <option value="2">Die Maintenance Engineering</option>
                                        <option value="3">Process Technician</option>
                                        <option value="4">Process Engineering</option>
                                        <option value="5">LQC</option>
                                        <option value="6">Sr. Engineer</option>
                                        <option value="7">Manager</option>
                                        <option value="8">Administrator</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>User Level</label>
                                    <select class="form-control " id="selEditUserLevelId" name="user_level_id">
                                        <option disabled selected>-- Select User Level --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnEditUser" class="btn btn-primary"><i id="btnEditUserIcon"
                                class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT USER MODAL END -->

@endsection


{{-- JS CONTENT --}}
@section('js_content')
    <script type="text/javascript">

        $(document).ready(function () {

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        GetUsersByStat(1, $("#selAddUserAccessUserId"));
        GetUserLevel(1, $("#selAddUserLevelId"));
        GetUsersByStat(1, $("#selEditUserAccessUserId"));
        GetUserLevel(1, $("#selEditUserLevelId"));

        function GetUsersByStat(userStat, cboElement) {
            let result = '<option value="0" disabled selected>--Select User--</option>';
            $.ajax({
                url: 'get_users_by_stat',
                method: 'get',
                data: {
                    'user_stat': userStat
                },
                dataType: 'json',
                beforeSend: function() {
                    result = '<option value="0" disabled selected>--Loading--</option>';
                    cboElement.html(result);
                },
                success: function(JsonObject) {
                    if (JsonObject['users'].length > 0) {
                        result = '<option value="0" disabled selected>--Select User--</option>';
                        for (let index = 0; index < JsonObject['users'].length; index++) {
                            result += '<option value="' + JsonObject['users'][index].id + '">' + JsonObject[
                                'users'][index].name + '</option>';
                        }
                    } else {
                        result = '<option value="0" selected disabled> -- No record found -- </option>';
                    }
                    cboElement.html(result);
                    $("#selAddUserAccessUserId").select2();
                },
                error: function(data, xhr, status) {
                    result = '<option value="0" selected disabled> -- Reload Again -- </option>';
                    cboElement.html(result);
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        function GetUserLevel(userLevelStat, cboElement) {
            let result = '<option value="0" selected disabled> -- Select User Level -- </option>';
            $.ajax({
                url: 'get_user_level',
                method: 'get',
                // data: {
                //     'user_level_stat': userLevelStat
                // },
                dataType: 'json',
                beforeSend: function () {
                    result = '<option value="0" selected disabled> -- Loading -- </option>';
                    cboElement.html(result);
                },
                success: function (JsonObject) {
                    // alert(JSON.stringify(JsonObject));
                    // alert(JsonObject['user_levels'][0].module_id);
                    if (JsonObject['user_levels'].length > 0) {
                        result = '<option value="0" selected disabled> -- Select User Level -- </option>';
                        for (let index = 0; index < JsonObject['user_levels'].length; index++) {
                            result += '<option value="' + JsonObject['user_levels'][index].id + '">' + JsonObject['user_levels'][index].name + '</option>';
                        }
                    }
                    else {
                        result = '<option value="0" selected disabled> -- No record found -- </option>';
                    }

                    cboElement.html(result);
                    // $('#').select2();

                },
                error: function (data, xhr, status) {
                    result = '<option value="0" selected disabled> -- Reload Again -- </option>';
                    cboElement.html(result);
                    console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                }
            });
        }

        // ADD USER
        $("#addUserForm").submit(function(event) {
            event.preventDefault(); // to stop the form submission
            AddUser();
        });

        // $('#addUserModalbtn').on('click', function(e) {
        //         console.log('qwe');
        //         $('select[name="user_id"]', $("#addUserForm")).val('');
        //         $('select[name="userLevel"]', $("#addUserForm")).val('');
            // });

        $("#addUserModalbtn").click(function() {
            // console.log('qwe');
            $("#idname").removeClass('is-invalid');
            $("#idname").attr('title', '');
            $("#idemail").removeClass('is-invalid');
            $("#idemail").attr('title', '');
            $("#idusername").removeClass('is-invalid');
            $("#idusername").attr('title', '');
            $("#selSection").removeClass('is-invalid');
            $("#selSection").attr('title', '');
            $("#selPosition").removeClass('is-invalid');
            $("#selPosition").attr('title', '');
            $("#selUserLevelId").removeClass('is-invalid');
            $("#selUserLevelId").attr('title', '');
            $("#idname").focus();
        });
        // ADD USER END

            //===== DATATABLES OF INK FIN CONSUMPTION ================
            dataTableusersTable = $("#tableUsers").DataTable({
                "processing": false,
                "serverSide": true,
                "responsive": true,
                "ajax": {
                    url: "view_users",
                },
                "columns": [
                {
                    "data": "name",
                },
                {
                    "data": "section_name",
                    visible: false,
                },
                {
                    "data": "section",
                        render: function(data) {
                            if(data == 0){
                                return '--undefined--'
                            }
                            else if(data == 1){
                                return 'PPS-TS'
                            }
                            else if(data == 2){
                                return 'PPS-CN'
                            }
                            else if(data == 3){
                                return 'PPS-ADMIN'
                            }
                            else if(data == 4){
                                return 'ADMINISTRATOR'
                            }
                        }
                },
                {
                    "data": "position",
                    render: function(data) {
                            if(data == 0){
                                return '--undefined--'
                            }
                            else if(data == 1){
                                return 'Production Operator'
                            }
                            else if(data == 2){
                                return 'Die Maintenance Engineering'
                            }
                            else if(data == 3){
                                return 'Process Technician'
                            }
                            else if(data == 4){
                                return 'Process Engineering'
                            }
                            else if(data == 5){
                                return 'LQC'
                            }
                            else if(data == 6){
                                return 'Sr. Engineer'
                            }
                            else if(data == 7){
                                return 'Manager'
                            }
                            else if(data == 8){
                                return 'Administrator'
                            }
                        }
                },
                {
                    "data": "user_level",
                },
                {
                    "data": "status",
                    orderable: false
                },
                {
                    "data": "action",
                    orderable: false,
                    searchable: false
                }
            ],
                "order": [0, 'desc']
            });


        // DEACTIVATE USER
        $(document).on('click', '.actionDeactivateUser', function() {

            let userId = $(this).attr('user-id');

            $("#deactivateUserID").val(userId);
        });
        $("#deactivateUserForm").submit(function(event) {
            event.preventDefault();
            DeactivateUser();
        });
        // DEACTIVATE USER END

        // ACTIVATE USER
        $(document).on('click', '.actionActivateUser', function() {
            let userId = $(this).attr('user-id');
            $("#activateUserID").val(userId);
        });

        $("#activateUserForm").submit(function(event) {
            event.preventDefault();
            ActivateUser();
        });
        // ACTIVATE USER END

        // EDIT USER
        $(document).on('click', '.actionEditUser', function() {
            let userId = $(this).attr('user-id');
            $("#txtEditUserAccessId").val(userId);
            GetUserId(userId);
        });

        $("#editUserForm").submit(function(event) {
            event.preventDefault(); // to stop the form submission
            EditUser();
        });
        // EDIT USER END
    });
    </script>
@endsection
