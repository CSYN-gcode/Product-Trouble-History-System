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

    @if ($_SESSION['rapidx_user_level_id'] == 5)
        <!-- 1-Super User, 2-Administrator, 3-User, 4-QAD Admin, 5-Other Section -->
        @if (count($_SESSION['rapidx_user_accesses']) > 0)
            <!-- Count the rapidx_user_accesses session based on RapidX session -->
            @for ($index = 0; $index < count($_SESSION['rapidx_user_accesses']); $index++)
                <!-- Loop the rapidx_user_accesses session based on RapidX session -->
                @if ($_SESSION['rapidx_user_accesses'][$index]['module_id'] == 16)
                    <!-- 11-Customer Claim Database System Module -->
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
@endif

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> DMR & PQC | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/images/favicon1.ico') }}">

    <style>
        .modal-xl-custom {
            width: 95% !important;
            min-width: 90% !important;
        }

    </style>
    <!-- CSS LINKS -->
    @include('shared.js_links.js_links')

    @include('shared.css_links.css_links')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('shared.pages.header')
        @include('shared.pages.admin_nav')
        @yield('content_page')

        @include('shared.pages.footer')
    </div>

    <!-- JS LINKS -->
    @yield('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            LoadSession();

            function LoadSession() {
                $.ajax({
                    url: 'get_user_department',
                    method: 'get',
                    dataType: 'json',
                    success: function (response) {
                        result = '';
                        let departmentID = response['department_id'];
                        let departments = response['departments_authorized'];
                        let auth = response['auth'];

                        console.log(departmentID);
                        console.log(departments);
                        console.log(auth);

                        if(auth != 1) {
                            if(jQuery.inArray(departmentID, departments) != -1) {
                                console.log('in array');

                                $('#energyConsumption').css('display', 'block');
                                $('.waterConsumption').css('display', 'block');
                                $('.paperConsumptionSG').css('display', 'block');
                                $('.inkConsumption').css('display', 'block');
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


                                $('.paperConsumptionTS').css('display', 'block');
                                $('.paperConsumptionYF').css('display', 'block');
                                $('.paperConsumptionPPS').css('display', 'block');
                                $('.paperConsumptionCN').css('display', 'block');

                                $('#waternav').css('display', 'block');
                                $('#energyNav').css('display', 'block');
                                $('#inknav_sg').css('display', 'block');
                                $('#inknav_prod').css('display', 'block');
                                $('#reportsnav').css('display', 'block');
                            } else {

                                $('#energyConsumption').css('display', 'none');
                                $('.waterConsumption').css('display', 'none');
                                $('.paperConsumptionSG').css('display', 'none');
                                $('.inkConsumption').css('display', 'none');

                                $('.inkConsumptionBOD').css('display', 'none');
                                $('.inkConsumptionIAS').css('display', 'none');
                                $('.inkConsumptionFIN').css('display', 'none');
                                $('.inkConsumptionHRD').css('display', 'none');
                                $('.inkConsumptionESS').css('display', 'none');
                                $('.inkConsumptionLOG').css('display', 'none');
                                $('.inkConsumptionFAC').css('display', 'none');
                                $('.inkConsumptionISS').css('display', 'none');
                                $('.inkConsumptionQAD').css('display', 'none');
                                $('.inkConsumptionEMS').css('display', 'none');
                                $('.inkConsumptionTS').css('display', 'none');
                                $('.inkConsumptionCN').css('display', 'none');
                                $('.inkConsumptionYF').css('display', 'none');
                                $('.inkConsumptionPPS').css('display', 'none');


                                $('.paperConsumptionTS').css('display', 'block');
                                $('.paperConsumptionYF').css('display', 'block');
                                $('.paperConsumptionPPS').css('display', 'block');
                                $('.paperConsumptionCN').css('display', 'block');
                                // $('#paperConsumptionTS').addClass('active');

                                $('#waternav').css('display', 'none');
                                $('#energyNav').css('display', 'none');
                                $('#inknav_sg').css('display', 'none');
                                $('#inknav_prod').css('display', 'block');
                                $('#reportsnav').css('display', 'none');
                            }
                        }

                    }
                });
            }
        });
    </script>
</body>

{{-- @if (Session::get('authorized') == 0)
    @if (in_array(Session::get('department_id'), Session::get('departments')))
    <script type="text/javascript">
        setInterval(() => {
            // console.log('admin');
            $('#energyConsumption').css('display', 'block');
            $('.waterConsumption').css('display', 'block');
            $('.paperConsumptionSG').css('display', 'block');
            $('.inkConsumption').css('display', 'block');

            $('.paperConsumptionTS').css('display', 'block');
            $('.paperConsumptionYF').css('display', 'block');
            $('.paperConsumptionPPS').css('display', 'block');
            $('.paperConsumptionCN').css('display', 'block');
            // $('#paperConsumptionTS').addClass('active');

            $('#waternav').css('display', 'block');
            $('#energyNav').css('display', 'block');
            $('#inknav').css('display', 'block');
        }, 500);


    </script>

        @else
            <script type="text/javascript">
               setInterval(() => {
                // console.log('not admin');
                    $('#energyConsumption').css('display', 'none');
                    $('.waterConsumption').css('display', 'none');
                    $('.paperConsumptionSG').css('display', 'none');
                    $('.inkConsumption').css('display', 'none');

                    $('.paperConsumptionTS').css('display', 'block');
                    $('.paperConsumptionYF').css('display', 'block');
                    $('.paperConsumptionPPS').css('display', 'block');
                    $('.paperConsumptionCN').css('display', 'block');
                    // $('#paperConsumptionTS').addClass('active');

                    $('#waternav').css('display', 'none');
                    $('#energyNav').css('display', 'none');
                    $('#inknav').css('display', 'none');
               }, 500);

            </script>
    @endif
@endif --}}

</html>
@else
<script type="text/javascript">
    window.location = "/";
</script>
@endif
