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
        $addButtonIA
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
    $(tableImprovementActions).find('tbody tr:not(.template-row)').remove();

    // Clear template row inputs
    $(tableImprovementActions).find('.template-row input').val('');

    // Remove any additional rows except the default one
    const defaultRow = `
        <tr class="template-row">
            <td>
                <textarea class="form-control" name="improvement_action[]" required></textarea>
            </td>
            <td>
                <textarea class="form-control" name="improvement_action_remarks[]" required></textarea>
            </td>
            <td id="removeIA">
                <center><button class="btn btn-md btn-danger removeIA" title="Remove Row" type="button"><i class="fa fa-times"></i></button></center>
            </td>
        </tr>
    `;
    const $tbody = $(tableImprovementActions).find('tbody');
    $tbody.html(defaultRow);

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
            { data: 'status' },
            { data: 'date_encountered' },    // customize this per parts_trouble_history
            { data: 'model' },    // customize this per parts_trouble_history
            { data: 'mode_of_defect' },    // customize this per parts_trouble_history
            { data: 'illustration_of_defect' },    // customize this per parts_trouble_history
            { data: 'no_of_occurrence' },    // customize this per parts_trouble_history
            { data: 'root_cause' },    // customize this per parts_trouble_history
            { data: 'improvement_actions' },    // customize this per parts_trouble_history
            { data: 'remarks' },    // customize this per parts_trouble_history
        ]
    });
}

/**
 * Bind events for buttons, forms, etc.
 */
function bindPartsTroubleHistoryEvents($table, $form, $modal, $addButtonPTH, dtPTH, $tableIA, $addButtonIA) {

    // initial check (on page load)
    updateRemoveButtons($tableIA);

    $addButtonPTH.on('click', function () {
        resetPartsTroubleHistoryForm($form, $tableIA);
        getDefects($('#modeOfDefect'));
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
        fetchPartsTroubleHistoryById(id, $modal);
    });

    // Disable button
    $table.on('click', '.btnDisable', function () {
        const id = $(this).data('id');
        confirmAction('Are you sure you want to disable this item?', function () {
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

    // --------------------
    // ADD ROW
    // --------------------
    // $addButtonIA.on('click', function() {
    //     let newRow = $tableIA.find('.template-row').first().clone();
    //     newRow.find('input').val('');
    //     $tableIA.find('tbody').append(newRow);

    //     // enable remove button
    //     newRow.find('.removeIA').prop('disabled', false);

    //     $tableIA.find('tbody').append(newRow);

    //     updateRemoveButtons($tableIA);
    // });
    $addButtonIA.on('click', function () {

        const $templateRow = $tableIA.find('.template-row').first();
        let newRow = $templateRow.clone();

        // Remove the template class so it can be deleted
        newRow.removeClass('template-row');
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
        console.log('clicked');

        // if it is template row, DON'T allow delete
        if ($(this).closest('tr').hasClass('template-row')) return;

        $(this).closest('tr').remove();

        updateRemoveButtons($tableIA);
    });

    // $addButtonIA.on('click', function(){
    //     // let totalNumberOfMOD = 0;
    //     // let ngQty = $('#formAddProductionRuncardStation #txtNgQuantity').val();
    //     let rowImprovementAction = `
    //         <tr>
    //             <td>
    //                 <textarea class="form-control" name="improvement_action[]"></textarea>
    //             </td>
    //             <td>
    //                 <textarea class="form-control" name="improvement_action_remarks[]"></textarea>
    //             </td>
    //             <td id="btnRemoveRowImprovementAction">
    //                 <center><button class="btn btn-md btn-danger btnRemoveRowImprovementAction" title="Remove" type="button"><i class="fa fa-times"></i></button></center>
    //             </td>
    //         </tr>
    //     `;
    //    $tableIA.find('tbody').append(rowImprovementAction);
    // });

    // $tableIA.on('click', '.btnRemoveRowImprovementAction', function(){
    //     $(this).closest('tr').remove();
    // });

    // // --------------------
    // // ADD ROW (copy format only)
    // // --------------------
    // $('#btnAddRow').on('click', function() {

    //     let template = $table.find('.template-row').first();

    //     let newRow = template.clone();

    //     newRow.removeClass('template-row');   // important!
    //     newRow.find('input').val('');         // clear values

    //     // enable remove button
    //     newRow.find('.removeIA').prop('disabled', false);

    //     $table.find('tbody').append(newRow);

    //     updateRemoveButtons();
    // });

    // // --------------------
    // // REMOVE ROW
    // // --------------------
    // $table.on('click', '.removeIA', function() {

    //     // if it is template row, DON'T allow delete
    //     if ($(this).closest('tr').hasClass('template-row')) return;

    //     $(this).closest('tr').remove();

    //     updateRemoveButtons();
    // });
}

function updateRemoveButtons($tableIA) {
    let rowCount = $tableIA.find('tbody tr').length;

    $tableIA.find('.removeIA').prop('disabled', rowCount <= 1);
}

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
            if(response.length > 0) {
                    result = '<option value="" disabled selected> Select Defect </option>';
                for (let i = 0; i < response.length; i++) {
                    if(response[i]['po_number'] == defectId){
                        result += '<option value="' + response[i]['id'] + '">' + response[i]['defect_name'] + '</option>';
                    }
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
function fetchPartsTroubleHistoryById(id, $modal) {
    $.ajax({
        type: 'GET',
        url: 'get_parts_trouble_history_by_id',
        data: { id },
        dataType: 'json',
        success: function (response) {
            // Populate modal fields (adjust names per parts_trouble_history)
            $('#txtPartsTroubleHistoryId').val(response.id);
            $('#txtPartsTroubleHistoryName').val(response.name);
            $('#selStatus').val(response.status);

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
function updatePartsTroubleHistoryStatus(id, dtPartsTroubleHistory) {
    $.ajax({
        type: 'POST',
        url: 'update_parts_trouble_history_status',
        data: { id },
        dataType: 'json',
        success: function (response) {
            if (response.result === 1) {
                showSuccess('Status updated successfully.');
                dtPartsTroubleHistory.draw(false);
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
