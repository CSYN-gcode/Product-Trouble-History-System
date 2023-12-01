@php
session_start();
$isLogin = false;
if (isset($_SESSION['rapidx_user_id'])) {
    $isLogin = true;
}

$isAuthorized = false;
$user_level = 0;
@endphp

@if ($isLogin)
    <!--
        *These are the sessions in RapidX System(for reference only)

        $_SESSION["rapidx_user_id"] = Auth::user()->id;
        $_SESSION["rapidx_user_level_id"] = Auth::user()->user_level_id;
        $_SESSION["rapidx_username"] = Auth::user()->username;
        $_SESSION["rapidx_name"] = Auth::user()->name;
        $_SESSION["rapidx_department_id"] = Auth::user()->department_id;

        $user_accesses = UserAccess::on('mysql')->where('user_id', Auth::user()->id)
                        ->where('user_access_stat', 1)
                        ->get();

        $arr_user_accesses = [];
        for($index = 0; $index < count($user_accesses); $index++) {
            // $arr_user_accesses['module_id'] = $user_accesses[$index]->module_id;
            // $arr_user_accesses['user_level_id'] = $user_accesses[$index]->user_level_id;
            array_push($arr_user_accesses, array(
                'module_id' => $user_accesses[$index]->module_id,
                'user_level_id' => $user_accesses[$index]->user_level_id
            ));
        }
        $_SESSION["rapidx_user_accesses"] = $arr_user_accesses;
    -->

    @if ($_SESSION['rapidx_user_level_id'] == 1 || $_SESSION['rapidx_user_level_id'] == 2 || $_SESSION['rapidx_user_level_id'] == 3 || $_SESSION['rapidx_user_level_id'] == 4 || $_SESSION['rapidx_user_level_id'] == 5)
        <!-- 1-Super User, 2-Administrator, 3-User, 4-QAD Admin, 5-Other Section -->
        @if (count($_SESSION['rapidx_user_accesses']) > 0)
            <!-- Count the rapidx_user_accesses session based on RapidX session -->
            @for ($index = 0; $index < count($_SESSION['rapidx_user_accesses']); $index++)
                <!-- Loop the rapidx_user_accesses session based on RapidX session -->
                <!--
                    You will see the module_id on the table inside modules(table) under db_rapidx(database) since Customer Claim Database System id is 11
                    you are free to change below module_id equals to your module_id
                -->
                @if ($_SESSION['rapidx_user_accesses'][$index]['module_id'] == 31)
                    <!-- 31- DMR & PQC -->
                    @php
                        $isAuthorized = true;
                        $user_level = $_SESSION['rapidx_user_accesses'][$index]['user_level_id']; // Collect the user_level_id
                    @endphp
                    @break
                @endif
            @endfor
        @endif

        @if (!$isAuthorized)
            <script type="text/javascript">
                window.location = '../RapidX/';
            </script>
        @endif
    @else
        <script type="text/javascript">
            window.location = '../RapidX/';
        </script>
    @endif

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DMR & PQC | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/images/favicon1.ico') }}">

    <!-- CSS LINKS -->
    @include('shared.css_links.css_links')
    <style>
        .modal-xl-custom {
            width: 95% !important;
            min-width: 90% !important;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">

    {{-- <div class="modal" tabindex="-1" role="dialog" id="modalOnGoing">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;On-going Module</h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This is an On-Going Feature</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="wrapper">
        @include('shared.pages.header')

        <script type="text/javascript">
        let _token = "{{ csrf_token() }}";
        </script>

        @include('shared.pages.super_user_nav')
        @include('shared.js_links.js_links')
        @yield('js_content')
        @php
            // print_r( Auth::user()->id );
        @endphp
        @yield('content_page')
        @include('shared.pages.footer')
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            // LoadSession();

            function LoadSession() {
                $.ajax({
                    url: 'get_user_department',
                    method: 'get',
                    dataType: 'json',
                    success: function (response) {
                        result = '';
                        let departmentID = response['department_id'];
                        let departments = response['departments_authorized'];

                        let support_group = response['support_group'];
                        let production_wo_pps = response['production_wo_pps'];
                        let production_pps = response['production_pps'];
                        let facility_section = response['facility_section'];
                        let userlevelID = response['user_level_id'];
                        let auth = response['auth'];

                        console.log(departmentID);
                        console.log(departments);
                        console.log(auth);

                        if(auth != 1) {
                            // user_level_id = 4 || SUPER ADMIN
                            if(userlevelID == 3){
                                console.log('in array');
                                //OVERALL (FILTERING FEATURE)
                                $('#department_filter').css('display', 'block');
                                $('#pps_dep_filter_target').css('display', 'block');
                                $('#pps_dep_filter_actual').css('display', 'block');

                                //DASHBOARD BLADE
                                $('#energy-dash').css('display', 'block');
                                $('#water-dash').css('display', 'block');
                                $('#ink-dash').css('display', 'block');
                                $('#paper-dash').css('display', 'block');
                                $('#energy-nav').css('display', 'block');
                                $('#water-nav').css('display', 'block');
                                $('#ink-sg-nav').css('display', 'block');
                                $('#ink-prod-nav').css('display', 'block');
                                $('#paper-nav').css('display', 'block');

                                //SUPER-USER NAV BLADE

                                $('#user_header').css('display', 'block');
                                $('#user_settings').css('display', 'block');
                                $('#dashboard-header').css('display', 'block');
                                $('#dashboard-energy').css('display', 'block');
                                $('#dashboard-water').css('display', 'block');
                                $('#dashboard-ink').css('display', 'block');
                                $('#dashboard-paper').css('display', 'block');
                                $('#energyNav').css('display', 'block');
                                $('#waternav').css('display', 'block');
                                $('#inknav_sg').css('display', 'block');
                                $('#inknav_prod').css('display', 'block');
                                $('#papernav').css('display', 'block');
                                $('#reportsnav').css('display', 'block');
                                $('#reports_header').css('display', 'block');

                                //ENERGY DASHBOARD
                                $('#energyConsumption').css('display', 'block');
                                //WATER DASHBOARD
                                $('.waterConsumption').css('display', 'block');
                                //INK DASHBOARD
                                $("#ink_bod-tab").addClass('active');
                                $("#ink_bod").addClass('show active');
                                $('.inkConsumptionBOD').css('display', 'block');
                                $('.inkConsumptionIAS').css('display', 'block');
                                $('.inkConsumptionFIN').css('display', 'block');
                                $('.inkConsumptionHRD').css('display', 'block');
                                $('.inkConsumptionESS').css('display', 'block');
                                $('.inkConsumptionLOG').css('display', 'block');
                                $('.inkConsumptionFAC').css('display', 'block');
                                $('.inkConsumptionISS').css('display', 'block');
                                $('.inkConsumptionQAD').css('display', 'block');
                                $('.inkConsumptionEMS').css('display', 'block');
                                $('.inkConsumptionTS').css('display', 'block');
                                $('.inkConsumptionCN').css('display', 'block');
                                $('.inkConsumptionYF').css('display', 'block');
                                $('.inkConsumptionPPS').css('display', 'block');
                                //PAPER DASHBOARD
                                $("#paper-tab").addClass('active');
                                $("#paper").addClass('show active');
                                $('.paperConsumptionSG').css('display', 'block');
                                $('.paperConsumptionTS').css('display', 'block');
                                $('.paperConsumptionYF').css('display', 'block');
                                $('.paperConsumptionPPS').css('display', 'block');
                                $('.paperConsumptionCN').css('display', 'block');

                                // INK CONSUMPTION
                                $('.ink_admin_addtarget').css('display', 'inline-block');
                                $('.ink_admin_addactual').css('display', 'inline-block');
                                // $('.ink_user_addtarget').css('display', 'inline-block');
                                // $('.ink_user_addactual').css('display', 'inline-block');

                                // PAPER CONSUMPTION PROD
                                $('.paper_admin_addtarget').css('display', 'inline-block');
                                $('.paper_admin_addactual').css('display', 'inline-block');
                                // $('.paper_user_addtarget').css('display', 'inline-block');
                                // $('.paper_user_addactual').css('display', 'inline-block');

                                // ENABLE TARGET EDITIING
                                // $('#edit-target').css('display', 'block');
                                // column.visible(false);

                            }
                            // user_level_id = 3 || ADMIN
                            else if(userlevelID == 3){
                                console.log('in array');
                                //OVERALL (FILTERING FEATURE)
                                $('#department_filter').css('display', 'block');

                                //DASHBOARD BLADE
                                $('#energy-dash').css('display', 'block');
                                $('#water-dash').css('display', 'block');
                                $('#ink-dash').css('display', 'block');
                                $('#paper-dash').css('display', 'block');
                                $('#energy-nav').css('display', 'block');
                                $('#water-nav').css('display', 'block');
                                $('#ink-sg-nav').css('display', 'block');
                                $('#ink-prod-nav').css('display', 'block');
                                $('#paper-nav').css('display', 'block');

                                //SUPER-USER NAV BLADE
                                $('#dashboard-header').css('display', 'block');
                                $('#dashboard-energy').css('display', 'block');
                                $('#dashboard-water').css('display', 'block');
                                $('#dashboard-ink').css('display', 'block');
                                $('#dashboard-paper').css('display', 'block');
                                $('#energyNav').css('display', 'block');
                                $('#waternav').css('display', 'block');
                                $('#inknav_sg').css('display', 'block');
                                $('#inknav_prod').css('display', 'block');
                                $('#papernav').css('display', 'block');
                                $('#reportsnav').css('display', 'block');
                                $('#reports_header').css('display', 'block');

                                //ENERGY DASHBOARD
                                $('#energyConsumption').css('display', 'block');
                                //WATER DASHBOARD
                                $('.waterConsumption').css('display', 'block');
                                //INK DASHBOARD
                                $("#ink_bod-tab").addClass('active');
                                $("#ink_bod").addClass('show active');
                                $('.inkConsumptionBOD').css('display', 'block');
                                $('.inkConsumptionIAS').css('display', 'block');
                                $('.inkConsumptionFIN').css('display', 'block');
                                $('.inkConsumptionHRD').css('display', 'block');
                                $('.inkConsumptionESS').css('display', 'block');
                                $('.inkConsumptionLOG').css('display', 'block');
                                $('.inkConsumptionFAC').css('display', 'block');
                                $('.inkConsumptionISS').css('display', 'block');
                                $('.inkConsumptionQAD').css('display', 'block');
                                $('.inkConsumptionEMS').css('display', 'block');
                                $('.inkConsumptionTS').css('display', 'block');
                                $('.inkConsumptionCN').css('display', 'block');
                                $('.inkConsumptionYF').css('display', 'block');
                                $('.inkConsumptionPPS').css('display', 'block');
                                //PAPER DASHBOARD
                                $("#paper-tab").addClass('active');
                                $("#paper").addClass('show active');
                                $('.paperConsumptionSG').css('display', 'block');
                                $('.paperConsumptionTS').css('display', 'block');
                                $('.paperConsumptionYF').css('display', 'block');
                                $('.paperConsumptionPPS').css('display', 'block');
                                $('.paperConsumptionCN').css('display', 'block');

                                // INK CONSUMPTION PROD
                                $('.ink_admin_addtarget').css('display', 'inline-block');
                                $('.ink_admin_addactual').css('display', 'inline-block');
                                // $('.ink_user_addtarget').css('display', 'inline-block');
                                // $('.ink_user_addactual').css('display', 'inline-block');

                                // PAPER CONSUMPTION PROD
                                $('.paper_admin_addtarget').css('display', 'inline-block');
                                $('.paper_admin_addactual').css('display', 'inline-block');
                                // $('.paper_user_addtarget').css('display', 'inline-block');
                                // $('.paper_user_addactual').css('display', 'inline-block');
                            }
                            // user_level_id = 2 || SEMI-ADMIN FOR PRODUCTION
                            else if(userlevelID == 2){
                                console.log('in array');
                                //OVERALL (FILTERING FEATURE)
                                $('#department_filter').css('display', 'block');
                                $('#pps_dep_filter_target').css('display', 'none');
                                $('#pps_dep_filter_actual').css('display', 'none');


                                //DASHBOARD BLADE
                                $('#ink-dash').css('display', 'block');
                                $('#paper-dash').css('display', 'block');
                                $('#ink-prod-nav').css('display', 'block');
                                $('#paper-nav').css('display', 'block');

                                //SUPER-USER NAV BLADE
                                $('#dashboard-ink').css('display', 'block');
                                $('#dashboard-paper').css('display', 'block');
                                $('#inknav_prod').css('display', 'block');
                                $('#papernav').css('display', 'block');

                                //PAPER CONSUMPTION
                                $("#paper-prod-ts-tab").addClass('active');
                                $("#paper-prod-ts").addClass('show active');
                                $('.paperConsumptionTS').css('display', 'block');
                                $('.paperConsumptionYF').css('display', 'block');
                                $('.paperConsumptionPPS').css('display', 'block');
                                $('.paperConsumptionCN').css('display', 'block');

                                //INK CONSUMPTION
                                $("#ink_ts-tab").addClass('active');
                                $("#ink_ts").addClass('show active');
                                $('.inkConsumptionTS').css('display', 'block');
                                $('.inkConsumptionCN').css('display', 'block');
                                $('.inkConsumptionYF').css('display', 'block');
                                $('.inkConsumptionPPS').css('display', 'block');

                                // INK CONSUMPTION PROD
                                $('.ink_admin_addtarget').css('display', 'inline-block');
                                $('.ink_admin_addactual').css('display', 'inline-block');

                                // PAPER CONSUMPTION PROD
                                $('.paper_admin_addtarget').css('display', 'inline-block');
                                $('.paper_admin_addactual').css('display', 'inline-block');

                                var dataTableInkConsumptions = $("#tblInkConsumption").DataTable();
                                //hide the action column
                                dataTableInkConsumptions.column(8).visible(false);

                                var dataTablePaperConsumptions = $('#tblPaperConsumption').DataTable();
                                //hide the action column
                                dataTablePaperConsumptions.column(8).visible(false);
                            }
                            else if(userlevelID == 1 && jQuery.inArray(departmentID, facility_section) != -1){
                                console.log('in array');

                                //SUPER-USER NAV BLADE
                                $('#dashboard-header').css('display', 'block');
                                $('#dashboard-energy').css('display', 'block');
                                $('#dashboard-water').css('display', 'block');
                                $('#energyNav').css('display', 'block');
                                $('#waternav').css('display', 'block');
                                $('#inknav_sg').css('display', 'block');

                                //DASHBOARD BLADE
                                $('#energy-nav').css('display', 'block');
                                $('#water-nav').css('display', 'block');
                                $('#ink-sg-nav').css('display', 'block');

                                // INK CONSUMPTION PROD
                                $('.ink_user_addtarget').css('display', 'inline-block');
                                $('.ink_user_addactual').css('display', 'inline-block');

                                var dataTableEnergyConsumptions = $("#tblEnergyConsumption").DataTable();
                                //hide the action column
                                dataTableEnergyConsumptions.column(6).visible(false);

                                var dataTableWaterConsumptions = $("#tblWaterConsumption").DataTable();
                                //hide the action column
                                dataTableWaterConsumptions.column(10).visible(false);

                                var dataTableInkConsumptions = $('#tblInkConsumption').DataTable();
                                //show the action column
                                dataTableInkConsumptions.column(8).visible(false);

                            }
                            else if(userlevelID == 1 && jQuery.inArray(departmentID, support_group) != -1){
                                console.log('sg in array');

                                //DASHBOARD BLADE
                                $('#ink-sg-nav').css('display', 'block');

                                //SUPER-USER NAV BLADE
                                $('#inknav_sg').css('display', 'block');

                                //INK CONSUMPTION
                                $("#ink_qad-tab").addClass('active');
                                $("#ink_qad").addClass('show active');
                                $('.inkConsumptionSG').css('display', 'block');

                                // INK CONSUMPTION PROD
                                $('.ink_user_addtarget').css('display', 'inline-block');
                                $('.ink_user_addactual').css('display', 'inline-block');

                                var dataTableInkConsumptions = $('#tblInkConsumption').DataTable();
                                //show the action column
                                dataTableInkConsumptions.column(8).visible(false);
                            }
                            else if(userlevelID == 1 && jQuery.inArray(departmentID, production_wo_pps) != -1){

                                console.log('prod in array');

                                //DASHBOARD BLADE
                                $('#ink-prod-nav').css('display', 'block');
                                $('#paper-nav').css('display', 'block');

                                //SUPER-USER NAV BLADE
                                $('#inknav_prod').css('display', 'block');
                                $('#papernav').css('display', 'block');
                                //PAPER CONSUMPTION
                                $('.paperConsumptionTS').css('display', 'block');
                                //INK CONSUMPTION
                                $("#ink_ts-tab").addClass('active');
                                $("#ink_ts").addClass('show active');
                                $('.inkConsumptionTS').css('display', 'block');

                                // INK CONSUMPTION PROD
                                $('.ink_user_addtarget').css('display', 'inline-block');
                                $('.ink_user_addactual').css('display', 'inline-block');

                                // PAPER CONSUMPTION PROD
                                $('.paper_user_addtarget').css('display', 'inline-block');
                                $('.paper_user_addactual').css('display', 'inline-block');

                                var dataTablePaperConsumptions = $('#tblPaperConsumption').DataTable();
                                //hide the action column
                                dataTablePaperConsumptions.column(8).visible(false);

                                var dataTableInkConsumptions = $("#tblInkConsumption").DataTable();
                                //hide the action column
                                dataTableInkConsumptions.column(8).visible(false);

                            }else if(userlevelID == 1 && jQuery.inArray(departmentID, production_pps) != -1){

                                console.log('prod in array');

                                //DASHBOARD BLADE
                                $('#ink-prod-nav').css('display', 'block');

                                //SUPER-USER NAV BLADE
                                $('#inknav_prod').css('display', 'block');

                                //INK CONSUMPTION
                                $("#ink_ts-tab").addClass('active');
                                $("#ink_ts").addClass('show active');
                                $('.inkConsumptionTS').css('display', 'block');

                                // INK CONSUMPTION PROD
                                $('.ink_user_addtarget').css('display', 'inline-block');
                                $('.ink_user_addactual').css('display', 'inline-block');

                                var dataTableInkConsumptions = $("#tblInkConsumption").DataTable();
                                //hide the action column
                                dataTableInkConsumptions.column(8).visible(false);
                            }
                        }

                    }
                });
            }
        });
    </script>
</body>
</html>
@else
<script type="text/javascript">
    window.location = "../RapidX/";
</script>
@endif
