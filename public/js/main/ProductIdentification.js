$(document).ready(function (){
    $('#frm_txt_po_no').keypress(function(e){
        //po_modify- drawing
        if(e.keyCode == 13){
            var po_number = $(this).val();
            if(po_number == "" || po_number == null ){
                toastr.warning('PO not found!'); //po_modify - clickbutton
            }else{
                $('#frm_txt_item_code').val('');
                $('#frm_txt_device_name').val('');
                $('#frm_txt_po_number').val('');
                $('#frm_txt_die_no').val('');
                $('#frm_txt_drawing_no').val('');
                $('#frm_txt_rev_no').val('');

                $(this).val('');
                $(this).focus();

                GetPPSDBDataByItemCode(po_number);
            }
        }
    });
});

function GetPPSDBDataByItemCode(po_number){
    $.ajax({
        url: "get_pps_db_data_by_item_code",
        method: "get",
        data: {
            po_number : po_number,
        },
        // data: $('#ReceiveStratPOMaterialIssuanceForm').serialize(),
        dataType: "json",
        success: function(response){
            if (response['result'] == '1') {
                toastr.error('Error, Wrong PO Number');
            }else{
                let pps_details = response['pps_db_details'];
                let pps_dieset = response['pps_db_details'][0]['pps_dieset'];

                $("#frm_txt_device_name").val(pps_details[0].ItemName);
                $("#frm_txt_po_no").val(pps_details[0].OrderNo);
                $("#frm_txt_item_code").val(pps_details[0].ItemCode);
                $("#frm_txt_die_no").val(pps_dieset.DieNo);
                $("#frm_txt_drawing_no").val(pps_dieset.DrawingNo);
                $("#frm_txt_rev_no").val(pps_dieset.Rev);
            }
        }
    });
}

function ProductIdentificatioViewingMode(){
        //Part 1 Disable Buttons
        $("#frm_txt_po_no").attr('disabled', true);
        $("#frm_request_type").attr('disabled', true);
        $("#frm_prod_identification")[0].reset();
}
