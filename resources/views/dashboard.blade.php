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

@extends($layout)

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            {{-- <div class="container-fluid">
                <div class="row">
                    <h2 class="my-3">Dashboard</h2>
                </div>
                <div class="row">
                    <h2 class="my-3">Records</h2>
                </div>
            </div> --}}
            <div class="row">
                    <h2 class="my-3">Dashboard</h2>
                    <div class="row" id="kpiRow"></div>
                    <div class="row" id="situationRow"></div>
                    {{-- <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning"><i class="fa-solid fa-wrench fa-beat-fade"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number" id="totalUsers">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-success"><i class="fa-solid fa-file-circle-check fa-beat-fade"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Defects</span>
                                <span class="info-box-number" id="totalDefects">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-success"><i class="fa-solid fa-file-circle-check fa-beat-fade"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Situations</span>
                                <span class="info-box-number" id="totalSituations">0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-success"><i class="fa-solid fa-file-circle-check fa-beat-fade"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Past Trouble History Record</span>
                                <span class="info-box-number" id="totalPthsRecord">0</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="row">
                    <h2 class="my-3">Pendings</h2>
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning">P1</span>
                            <div class="info-box-content">
                                <span class="info-box-text">Product Identification</span>
                                <span class="info-box-number" id="PendingProductIdentification">0</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning">P2-3</span>
                            <div class="info-box-content">
                                <span class="info-box-text">Dieset Condition Checking</span>
                                <span class="info-box-number" id="PendingDiesetConditionChecking">0</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning">P4</span>
                            <div class="info-box-content">
                                <span class="info-box-text">Machine Setup</span>
                                <span class="info-box-number" id="PendingMachineSetup">0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning">P5</span>
                            <div class="info-box-content">
                                <span class="info-box-text">Product Requirement Checking</span>
                                <span class="info-box-number" id="PendingProductRequirementChecking">0</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning">P6</span>
                            <div class="info-box-content">
                                <span class="info-box-text">Machine Parameter Checking</span>
                                <span class="info-box-number" id="PendingMachineParameterChecking">0</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning">P7</span>
                            <div class="info-box-content">
                                <span class="info-box-text">Specification</span>
                                <span class="info-box-number" id="PendingSpecification">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="info-box shadow bg-white rounded">
                            <span class="info-box-icon bg-warning">P8</span>
                            <div class="info-box-content">
                                <span class="info-box-text">Completion Activity</span>
                                <span class="info-box-number" id="PendingCompletionActivity">0</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
        </section>
    </div>
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        // <div class="col-lg-4">
        //     <div class="card bg-info text-white">
        //         <div class="card-body">
        //             <h3>Recurring Situations</h3>
        //             <h2>${response.totalSituationOccured}</h2>
        //         </div>
        //     </div>
        // </div>

        function loadDashboard(){
            $.ajax({
                url: "get_data_for_dashboard",
                method: "get",
                dataType: "json",
                success: function(response){
                    // TOP KPI
                    var kpi = `
                        <div class="col-lg-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h3>Total Count of Incidents</h3>
                                    <h2>${response.totalIncidents}</h2>
                                </div>
                            </div>
                        </div>
                    `;

                    $('#kpiRow').html(kpi);

                    // SITUATION CARDS
                    var situationCards = '';
                    $.each(response.PTHRecords, function(index, item) {
                        var badgeColor = item.defect_id >= 3 ? 'danger' : 'secondary';

                        situationCards += `
                            <div class="col-md-4 mb-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h6><b>Model/Series Name:</b> ${item.model}</h6>
                                        <h6><b>Defect Name:</b> ${item.defects.defect_item.defect_name}</h6>
                                        <h6><b>Date Occured:</b> ${item.date_encountered}</h6>
                                        <h4><b>Occurence:</b> ${item.defects.no_of_occurrence}</h4>
                                        <span class="badge bg-${badgeColor}">
                                            ${item.defects.no_of_occurrence >= 3 ? 'Recurring' : 'Normal'}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('#situationRow').html(situationCards);
                },
            });
        }

        $(document).ready(function(){
            loadDashboard();
        });

        // $(document).ready(function(){
        //     function getDataForDashboard(){
        //         $.ajax({
        //             url: "get_data_for_dashboard",
        //             method: "get",
        //             dataType: "json",
        //             success: function(response){
        //                 console.log('response ', response['totalUsers']);
        //                 $('#totalUsers').text(response['totalUsers']);
        //                 $('#totalDefects').text(response['totalDefects']);
        //                 $('#totalSituations').text(response['totalSituations']);
        //                 $('#totalPthsRecord').text(response['totalPthsRecord']);

        //                 // $('#PendingProductIdentification').text(response['ProductIdentification']);
        //                 // $('#PendingDiesetConditionChecking').text(response['DiesetConditionChecking']);
        //                 // $('#PendingMachineSetup').text(response['MachineSetup']);
        //                 // $('#PendingProductRequirementChecking').text(response['ProductRequirementChecking']);
        //                 // $('#PendingMachineParameterChecking').text(response['MachineParameterChecking']);
        //                 // $('#PendingSpecification').text(response['Specification']);
        //                 // $('#PendingCompletionActivity').text(response['CompletionActivity']);
        //             },
        //         });
        //     }
        //     getDataForDashboard(); //comment for now
        // });
    </script>
@endsection
