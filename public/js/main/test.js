// function UpdatePartsDrawingData(){
function UpdatePartsDrawingData(SpecificationArr, ActualMeasurementArr, request_id, process_status, user_id){
    // function UpdateDiesetConditionData(){
        let _token = "{{ csrf_token() }}";
        var formData = new FormData($('#FrmPartsDrawing')[0]);
            formData.append('specification', SpecificationArr);
            formData.append('actual_measurement', ActualMeasurementArr);
            formData.append('request_id', request_id);
            formData.append('process_status', process_status);
            formData.append('user_id', user_id);
        // var data = $.param({ SpecificationArr, ActualMeasurementArr, UploadedFile, request_id, process_status, user_id}) + '&' + formData;
        // var data = $.param({ SpecificationArr, ActualMeasurementArr, UploadedFile, request_id, process_status, user_id}) + '&' + formData;
        // var data = $.param({ _token, SpecificationArr, ActualMeasurementArr, UploadedFile, request_id, process_status, user_id}) + '&' + $('#FrmPartsDrawing').serialize();
        // var data = $.param({ _token, SpecificationArr, ActualMeasurementArr, UploadedFile, request_id, process_status, user_id, formData});
        // console.log(data);
        $.ajax({
            url: "update_parts_drawing_data",
            method: "post",
            // _token: _token,
            data: formData,
            processData: false,
            contentType: false,
            // data: $('#frm_prod_identification').serialize(),
            // data: {
            //     _token: _token,
            //     SpecificationArr: SpecificationArr,
            //     ActualMeasurementArr: ActualMeasurementArr,
            //     request_id: request_id,
            //     process_status: process_status,
            //     user_id: user_id,
            //     formData: formData
            // },
            dataType: "json",
            beforeSend: function(){
            },
            success: function(JsonObject){
                if(JsonObject['result'] == 'Success'){
                    $("#modalPartsDrawing").modal('hide');
                    $("#FrmPartsDrawing")[0].reset();
                    toastr.success('Drawing Succesfully Saved!');
                }
                else{
                    toastr.error('Saving Failed!');
                }
            },
            error: function(data, xhr, status){
                toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
    }
