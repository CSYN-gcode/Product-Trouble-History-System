@extends('layouts.admin_layout')

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
                            {{-- <span class="info-box-icon bg-info"><i class="fas fa-tachometer-alt"></i></span> --}}
                            <span class="info-box-icon bg-info"><i class="fa-brands fa-bitcoin"></i></span>
                            
                            <div class="info-box-content">
                                <span class="info-box-text">Total Users</span>
                                <span class="info-box-number" id="totalUsers">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning"><i class="fa-brands fa-bitcoin"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Pending Request</span>
                                <span class="info-box-number" id="totalPendingUsers">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-success"><i class="fa-brands fa-bitcoin"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Residents</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-info"><i class="fa-brands fa-bitcoin"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Blotter</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-black"><i class="fa-brands fa-bitcoin"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Households</span>
                                <span class="info-box-number">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-danger"><i class="fa-brands fa-bitcoin"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Business Permit</span>
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
            getDataForDashboard();
        });
    </script>
@endsection
