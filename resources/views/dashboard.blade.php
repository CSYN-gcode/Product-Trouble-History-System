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
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <h2 class="my-3">Dashboard</h2>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning"><i class="fa-brands fa-bitcoin"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Pending Dieset Preparation Request</span>
                                <span class="info-box-number" id="totalPendingUsers">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-success"><i class="fa-brands fa-bitcoin"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Completed Dieset Preparation Request</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            function getDataForDashboard(){
                $.ajax({
                    url: "get_data_for_dashboard",
                    method: "get",
                    dataType: "json",
                    success: function(response){
                        console.log('response ', response['totalUsers']);
                        $('#totalUsers').text(response['totalUsers']);
                        $('#totalPendingUsers').text(response['totalPendingUsers']);
                    },
                });
            }
            // getDataForDashboard(); //comment for now
        });
    </script>
@endsection
