<!-- jQuery -->
<script src="{{ asset('public/template/jquery/js/jquery.min.js') }}"></script>

<!-- Bootstrap 5 -->
<script src="{{ asset('public/template/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/template/bootstrap/js/popper.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('public/template/adminlte/js/adminlte.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('public/template/datatables/js/datatables.min.js') }}"></script>
{{-- <script src="{{ asset('/template/datatables/js/dataTables.bootstrap5.min.js') }}"></script> --}}

<!-- Select2 -->
<script src="{{ asset('public/template/select2/js/select2.min.js') }}"></script>

{{-- <script src = "https://ajax.googleapis.com/ajax/libs/jQuery/3.5.1/jQuery.min.js">
</script> --}}

<!-- Toastr -->
<script src="{{ asset('public/template/toastr/js/toastr.min.js') }}"></script>

<!-- Custom JS -->
<script>
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
        "iconClass":  "toast-custom"
    };
</script>

{{-- User Management --}}
<script src="{{ asset('public/js/main/User.js?n=135643213241032') }}"></script>

<script src="@php echo asset("public/js/main/ProductionRuncard.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/CommonFunctions.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/Common.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/ProductIdentification.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/DiesetCondition.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/DiesetConditionChecking.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/MachineSetup.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/ProductRequirementChecking.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/MachineParameterChecking.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/Specifications.js?".date("YmdHis")) @endphp"></script>
<script src="@php echo asset("public/js/main/CompletionActivity.js?".date("YmdHis")) @endphp"></script>
{{-- <script src="@php echo asset("public/js/main/test.js?".date("YmdHis"))"></script> --}}

{{-- <script src="{{ asset('public/js/main/Mailer.js?n=5') }}"></script> --}}
<!-- Custom JS -->
{{-- <script src="{{ asset('public/js/main/Common.js?n=6') }}"></script> --}}
{{-- <script src="{{ asset('public/js/main/FiscalYear.js') }}"></script>
<script src="{{ asset('public/js/main/EnergyConsumption.js?n=1') }}"></script>
<script src="{{ asset('public/js/main/PaperConsumptionTS.js?n=3') }}"></script>
<script src="{{ asset('public/js/main/PaperConsumptionCN.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/PaperConsumptionYF.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/PaperConsumptionPPS.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/WaterConsumption.js?n=2') }}"></script> --}}

{{-- INK CONSUMPTION DEPARTMENTS --}}
{{-- <script src="{{ asset('public/js/main/InkConsumptionBOD.js?n=3') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionIAS.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionFIN.js?n=3') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionHRD.js?n=1') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionESS.js?n=1') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionLOG.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionFAC.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionISS.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionQAD.js?n=1') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionEMS.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionTS.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionCN.js?n=3') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionYF.js?n=2') }}"></script>
<script src="{{ asset('public/js/main/InkConsumptionPPS.js?n=2') }}"></script> --}}
{{-- INK CONSUMPTION DEPARTMENTS END--}}

{{-- <script src="{{ asset('public/js/main/PastFYSelector.js') }}"></script> --}}
