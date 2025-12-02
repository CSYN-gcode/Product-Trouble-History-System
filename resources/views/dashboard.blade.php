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
            <div class="container-fluid">
                <div class="row">
                    <h2 class="my-3">Dashboard</h2>
                </div>
                <div class="row">
                    <h2 class="my-3">Records</h2>
                </div>
            </div>
        </section>
    </div>
@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        $(document).ready(function(){
            // function getDataForDashboard(){
            //     $.ajax({
            //         url: "get_data_for_dashboard",
            //         method: "get",
            //         dataType: "json",
            //         success: function(response){
            //             console.log('response ', response['totalUsers']);
            //             $('#totalPendingRequest').text(response['TotalPendingRequests']);
            //             $('#totalCompletedRequest').text(response['TotalCompletedRequests']);

            //             $('#PendingProductIdentification').text(response['ProductIdentification']);
            //             $('#PendingDiesetConditionChecking').text(response['DiesetConditionChecking']);
            //             $('#PendingMachineSetup').text(response['MachineSetup']);
            //             $('#PendingProductRequirementChecking').text(response['ProductRequirementChecking']);
            //             $('#PendingMachineParameterChecking').text(response['MachineParameterChecking']);
            //             $('#PendingSpecification').text(response['Specification']);
            //             $('#PendingCompletionActivity').text(response['CompletionActivity']);
            //         },
            //     });
            // }
            // getDataForDashboard(); //comment for now
        });
    </script>
@endsection
