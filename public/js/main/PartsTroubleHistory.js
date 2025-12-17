/**
 * ==========================================
 * TEMPLATE PartsTroubleHistory SCRIPT
 * ------------------------------------------
 * Rename "PartsTroubleHistory" and related variables
 * to match your actual feature.
 *
 * Example:
 *   - Replace "PartsTroubleHistory" with "Defects"
 *   - Replace URLs accordingly
 * ==========================================
 */

$(document).ready(function () {
    // --------------------------------------
    // Cache DOM elements
    // --------------------------------------
    const $table = $('#tblPartsTroubleHistory');                                    //table for parts_trouble_history
    const $form = $('#formPartsTroubleHistory');                                    //form for parts_trouble_history
    const $modal = $('#modalPartsTroubleHistory');                                  //modal for parts_trouble_history
    const $addButtonPTH = $('#btnShowAddPartsTroubleHistory');      //button for adding parts_trouble_history
    const dtPTH = initPartsTroubleHistoryTable($table);
    const $tableIA = $('#tblImprovementActions');                   //table for improvement actions
    const $addButtonIA = $('#btnAddImprovementAction');             //button for adding improvement actions
    const $exportReportButton = $('#btnShowExportReportModal');             //button for adding improvement actions
    // --------------------------------------
    // Initialize global AJAX setup (once per project)
    // --------------------------------------
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Apply Select2 to all select elements inside any modal dynamically
    $('.modal').on('shown.bs.modal', function () {
        $(this).find('.select2bs5').each(function() {
            $(this).select2({
                theme: 'bootstrap-5',
                dropdownParent: $(this).closest('.modal') // Ensures correct parent modal
            });
        });
    });

    // --------------------------------------
    // Bind all event handlers
    // --------------------------------------
    bindPartsTroubleHistoryEvents($table,
        $form,
        $modal,
        $addButtonPTH,
        dtPTH,
        $tableIA,
        $addButtonIA,
        $exportReportButton
    );
});

/**
 * Reset a form and clear hidden fields
 * @param {string|jQuery} formSelector - the form element or selector
 */
function resetPartsTroubleHistoryForm(formSelector, tableImprovementActions) {
    const $formSelector = $(formSelector);
    $formSelector[0].reset();
    $formSelector.find('input[type="hidden"]').val('');

    // hide image preview
    $('#previewImage').hide();

    // clear error fields
    $('.text-danger').text('');

    // Remove all rows except template row
    $(tableImprovementActions).find('tbody tr:not(.data-row)').remove();

    // Clear template row inputs
    $(tableImprovementActions).find('.data-row input').val('');

    // Remove any additional rows except the default one
    const defaultRow = `
        <tr class="data-row">
            <td id="removeIA">
                <center><button class="btn btn-md btn-danger removeIA" title="Remove Row" type="button"><i class="fa fa-times"></i></button></center>
            </td>
            <td>
                <textarea class="form-control" name="improvement_action[]" required></textarea>
            </td>
            <td>
                <textarea class="form-control" name="improvement_action_remarks[]" required></textarea>
            </td>
        </tr>
    `;
    const $tbody = $(tableImprovementActions).find('tbody');
    $tbody.html(defaultRow);

    // Hide Reupload Div & Exisiting Filename
    formSelector.find("#btnReuploadTriggerDiv").addClass('d-none');
    formSelector.find("#btnReuploadTrigger").addClass('d-none');
    formSelector.find("#btnReuploadTrigger").prop('checked', false);
    formSelector.find("#btnReuploadTriggerLabel").addClass('d-none');
    formSelector.find("#illustrationOfDefectFileName").addClass('d-none');

    // Show Upload Attachment section, remove required attribute
    formSelector.find("#illustrationOfDefect").removeClass('d-none');
    formSelector.find("#illustrationOfDefect").prop('required', true);

    // Hide Download Button
    formSelector.find("#downloadFile").addClass('d-none');

    updateRemoveButtons(tableImprovementActions);
}

/**
 * Initialize DataTable
 */
function initPartsTroubleHistoryTable($table, url = 'view_parts_trouble_history') {
    return $table.DataTable({
        processing: true,
        serverSide: true,
        ajax: { url: url },
        fixedHeader: true,
        columns: [
            { data: 'action', orderable: false, searchable: false },
            { data: 'status_label' },
            { data: 'date_encountered' },    // customize this per parts_trouble_history
            { data: 'model' },    // customize this per parts_trouble_history
            { data: 'defects.defect_item.defect_name' },    // customize this per parts_trouble_history
            { data: 'defects.illustration_of_defect' },    // customize this per parts_trouble_history
            { data: 'defects.no_of_occurrence' },    // customize this per parts_trouble_history
            { data: 'defects.root_cause' },    // customize this per parts_trouble_history
            { data: 'improvements' },    // customize this per parts_trouble_history
        ]
    });
}

/**
 * Bind events for buttons, forms, etc.
 */
function bindPartsTroubleHistoryEvents($table, $form, $modal, $addButtonPTH, dtPTH, $tableIA, $addButtonIA, $exportReportButton) {

    // initial check (on page load)
    updateRemoveButtons($tableIA);

    $addButtonPTH.on('click', function () {
        resetPartsTroubleHistoryForm($form, $tableIA);
        getDefects($('#defectId'));
        $('#modalPartsTroubleHistory').modal('show');
    });

    // Submit form (Add / Edit)
    $form.on('submit', function (e) {
        e.preventDefault();
        savePartsTroubleHistory($form, $modal, dtPTH);
    });

    // Edit button
    $table.on('click', '.btnEdit', function () {
        const id = $(this).data('id');
        fetchPartsTroubleHistoryById(id, $modal, $tableIA, $form);
    });

    // Disable button
    $table.on('click', '.btnDisable', function () {
        const id = $(this).data('id');
        confirmAction('Are you sure you want to disable this?', function () {
            updatePartsTroubleHistoryStatus(id, dtPTH);
        });
    });

    // Enable button
    $table.on('click', '.btnEnable', function () {
        const id = $(this).data('id');
        confirmAction('Are you sure you want to enable this?', function () {
            updatePartsTroubleHistoryStatus(id, dtPTH);
        });
    });

    // --------------------
    // IMAGE PREVIEW
    // --------------------
    $('#attachment').on('change', function() {
        let file = this.files[0];
        if (!file) return;

        let reader = new FileReader();
        reader.onload = function(e) {
            $('#previewImage').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(file);
    });

    $addButtonIA.on('click', function () {
        const $templateRow = $tableIA.find('.data-row').first();
        let newRow = $templateRow.clone();

        // Remove the template class so it can be deleted
        // newRow.removeClass('data-row');
        newRow.find('input, textarea').val('');
        newRow.find('.removeIA').prop('disabled', false);
        $tableIA.find('tbody').append(newRow);

        // Update button states
        updateRemoveButtons($tableIA);
    });

    // --------------------
    // REMOVE ROW
    // --------------------
    $tableIA.on('click', '.removeIA', function() {
        // if it is template row, DON'T allow delete
        // if ($(this).closest('tr').hasClass('data-row')) return;
        $(this).closest('tr').remove();
        updateRemoveButtons($tableIA);
    });

    // ================================= RE-UPLOAD FILE =================================
    $('#btnReuploadTrigger').on('click', function(){
        $('#btnReuploadTrigger').attr('checked', 'checked');
        if($(this).is(":checked")){
            $form.find("#illustrationOfDefect").removeClass('d-none');
            $form.find("#illustrationOfDefect").attr('required', true);
            $form.find("#illustrationOfDefectFileName").addClass('d-none');
            $form.find("#downloadFile").addClass('d-none');
        }else{
            $form.find("#illustrationOfDefect").addClass('d-none');
            $form.find("#illustrationOfDefect").removeAttr('required');
            $form.find("#illustrationOfDefect").val('');
            $form.find("#illustrationOfDefectFileName").removeClass('d-none');
            $form.find("#downloadFile").removeClass('d-none');
        }
    });

    $exportReportButton.on('click', function () {
        const $formExport = $('#exportPTHSReportForm');
        $formExport[0].reset();
        $('#modalExportReport').modal('show');
    });
}

function updateRemoveButtons($tableIA) {
//     let rowCount = $tableIA.find('tbody tr').length;
//     $tableIA.find('.removeIA').prop('disabled', rowCount <= 1);
    let rowCount = $tableIA.find('.data-row').length;
    console.log('rowCount:', rowCount);

    if (rowCount <= 1) {
        $tableIA.find('.removeIA').prop('disabled', true);
    } else {
        $tableIA.find('.removeIA').prop('disabled', false);
    }
}

// function updateRemoveButtons($tableIA) {
//     let rowCount = $tableIA.find('tbody tr').length;

//     if (rowCount <= 1) {
//         // Only one row left → disable remove button
//         $tableIA.find('.removeIA')
//             .prop('disabled', true)
//             .addClass('disabled');
//     } else {
//         // More than one row → enable remove buttons
//         $tableIA.find('.removeIA')
//             .prop('disabled', false)
//             .removeClass('disabled');
//     }
// }

function getDefects(cboElement, defectId = null){
    let result = '<option value="" disabled selected> Select Defect </option>';
    $.ajax({
        method: "get",
        url: "get_defects",
        dataType: "json",
        beforeSend: function(){
            result = '<option value="0" disabled selected>--Loading--</option>';
        },
        success: function (response) {
            if(response.length > 0){
                    result = '<option value="" disabled selected> Select Defect </option>';
                for (let i = 0; i < response.length; i++) {
                    result += '<option value="' + response[i]['id'] + '">' + response[i]['defect_name'] + '</option>';
                }
            }else{
                result = '<option value="0" selected disabled> -- No record found -- </option>';
            }
            cboElement.html(result);
            if(defectId != null){
                cboElement.val(defectId).trigger('change');
            }
        },
        error: function(data, xhr, status) {
            result = '<option value="0" selected disabled> -- Reload Again -- </option>';
            cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

/**
 * Save (add/update) parts_trouble_history data
 */
function savePartsTroubleHistory($form, $modal, dtPartsTroubleHistory) {
    let form = $form[0];
    let formData = new FormData(form);

    $.ajax({
        url: 'add_parts_trouble_history',
        method: 'POST',
        data: formData,
        contentType: false,   // required for file upload
        processData: false,   // required for file upload
        cache: false,
        beforeSend: function() {
            console.log("Submitting...");
        },
        success: function (response) {
            if (response.result === 1) {
                dtPartsTroubleHistory.draw(false);
                $modal.modal('hide');
                $form[0].reset();
                showSuccess('Successfully saved!');
            }
        },
        error: function (xhr) {
            console.error('Save failed:', xhr.responseText);
            showError('Failed to save data.');
        }
    });
}

/**
 * Fetch parts_trouble_history data by ID
 */
function fetchPartsTroubleHistoryById(id, $modal, $tableIA, $form) {
    $.ajax({
        type: 'GET',
        url: 'get_parts_trouble_history_by_id',
        data: { id },
        dataType: 'json',
        success: function (response) {
            // Show Reupload Div & Exisiting Filename
            $form.find("#btnReuploadTriggerDiv").removeClass('d-none');
            $form.find("#btnReuploadTrigger").removeClass('d-none');
            $form.find("#btnReuploadTrigger").prop('checked', false);
            $form.find("#btnReuploadTriggerLabel").removeClass('d-none');
            $form.find("#illustrationOfDefectFileName").removeClass('d-none');

            // Hide Upload Attachment section, remove required attribute
            $form.find("#illustrationOfDefect").addClass('d-none');
            $form.find("#illustrationOfDefect").removeAttr('required');

            // Populate modal fields (adjust names per parts_trouble_history)
            $form.find('#txtPartsTroubleHistoryId').val(response.id);
            $form.find('#dateEncountered').val(response.date_encountered);
            $form.find('#model').val(response.model);
            $form.find('#illustrationOfDefectFileName').val(response.defects.illustration_of_defect);

            let download_file ='<a href="download_file/'+response.id+'" target="_blank">';
                download_file +='<button type="button" class="btn btn-primary btn-sm d-none" name="download_file" id="downloadFile">';
                download_file +=     '<i class="fa-solid fa-file-arrow-down"></i>';
                download_file +=         '&nbsp;';
                download_file +=         'See Attachment';
                download_file +='</button>';
                download_file +='</a>';

            $form.find('#attachmentDiv').append(download_file);

            // Show Download Button
            $form.find("#downloadFile").removeClass('d-none');

            // MODE OF DEFECT
            getDefects($('#defectId'), response.defects.defect_id);
            // MODE OF DEFECT

            $form.find('#noOfOccurrence').val(response.defects.no_of_occurrence);
            $form.find('#rootCause').val(response.defects.root_cause);
            // $('#improvementActionsRemarks').val(response.improvements.improvement_actions_remarks);

            let order = '';
            $tableIA.find('tbody').empty();
            for(let index = 0; index < response.improvements.length; index++){
                if(index > 0){
                    // first row
                    order = '-' + index;
                }
                // <tr class="data-row${order}">

                let rowImprovements = `
                    <tr class="data-row">
                        <td id="removeIA">
                            <center><button class="btn btn-md btn-danger removeIA" title="Remove Row" type="button"><i class="fa fa-times"></i></button></center>
                        </td>
                        <td>
                            <textarea class="form-control" name="improvement_action[]">${response.improvements[index].improvement_actions}</textarea>
                        </td>
                        <td>
                            <textarea class="form-control" name="improvement_action_remarks[]">${response.improvements[index].remarks}</textarea>
                        </td>
                    </tr>
                `;
                $tableIA.find('tbody').append(rowImprovements);
            }

            $modal.modal('show');
        },
        error: function (xhr) {
            console.error('Fetch failed:', xhr.responseText);
            showError('Failed to fetch data.');
        }
    });
}

/**
 * Disable or update parts_trouble_history status
 */
function updatePartsTroubleHistoryStatus(id, dtPTH) {
    $.ajax({
        type: 'POST',
        url: 'update_parts_trouble_history_status',
        data: { id },
        dataType: 'json',
        success: function (response) {
            if(response.success == true) {
                showSuccess('Status updated successfully.');
                dtPTH.draw();
            }
        },
        error: function (xhr) {
            console.error('Status update failed:', xhr.responseText);
            showError('Failed to update status.');
        }
    });
}

/**
 * SweetAlert confirmation
 */
function confirmAction(message, callback) {
    Swal.fire({
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) callback();
    });
}

/**
 * SweetAlert success helper
 */
function showSuccess(message) {
    Swal.fire({
        icon: 'success',
        text: message,
        timer: 1500,
        showConfirmButton: false
    });
}

/**
 * SweetAlert error helper
 */
function showError(message) {
    Swal.fire({
        icon: 'error',
        text: message,
        timer: 2000,
        showConfirmButton: false
    });
}
