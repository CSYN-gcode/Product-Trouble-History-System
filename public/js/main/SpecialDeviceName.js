$(document).ready(function () {
    // --------------------------------------
    // Cache DOM elements
    // --------------------------------------
    const $table = $('#tblSpecialDeviceName');        // e.g., #tblDefects
    const $form = $('#formSpecialDeviceName');        // e.g., #formDefects
    const $modal = $('#modalAddSpecialDeviceName');      // e.g., #modalAddDefects

    // --------------------------------------
    // Initialize global AJAX setup (once per project)
    // --------------------------------------
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // --------------------------------------
    // Initialize DataTable
    // --------------------------------------
    const dtSpecialDeviceName = initSpecialDeviceNameTable($table);

    // --------------------------------------
    // Bind all event handlers
    // --------------------------------------
    bindSpecialDeviceNameEvents($table, $form, $modal, dtSpecialDeviceName);
});

/**
 * Reset a form and clear hidden fields
 * @param {string|jQuery} formSelector - the form element or selector
 */
function resetSpecialDeviceNameForm(formSelector) {
    const $form = $(formSelector);
    $form[0].reset();
    $form.find('input[type="hidden"]').val('');
}

/**
 * Initialize DataTable
 */
function initSpecialDeviceNameTable($table, url = 'view_special_device_names') {
    return $table.DataTable({
        processing: true,
        serverSide: true,
        ajax: { url: url },
        fixedHeader: true,
        columns: [
            { data: 'action', orderable: false, searchable: false },
            { data: 'device_name' },    // customize this per special device names
            { data: 'status_label' }
        ]
    });
}

/**
 * Bind events for buttons, forms, etc.
 */
function bindSpecialDeviceNameEvents($table, $form, $modal, dtSpecialDeviceName){

    $('#btnShowAddSpecialDeviceNameModal').on('click', function () {
        resetSpecialDeviceNameForm($form);
        $('#modalAddSpecialDeviceName').modal('show');
    });

    // Submit form (Add / Edit)
    $form.on('submit', function (e) {
        e.preventDefault();
        saveSpecialDeviceName($form, $modal, dtSpecialDeviceName);
    });

    // Edit button
    $table.on('click', '.btnEdit', function () {
        const id = $(this).data('id');
        fetchSpecialDeviceNameById(id, $modal);
    });

    // Disable button
    $table.on('click', '.btnDisable', function () {
        const id = $(this).data('id');
        confirmAction('Are you sure you want to disable this special device name?', function () {
            updateSpecialDeviceNameStatus(id, dtSpecialDeviceName);
        });
    });

    // Enable button
    $table.on('click', '.btnEnable', function () {
        const id = $(this).data('id');
        confirmAction('Are you sure you want to enable this special device name?', function () {
            updateSpecialDeviceNameStatus(id, dtSpecialDeviceName);
        });
    });
}

/**
 * Save (add/update) special device names data
 */
function saveSpecialDeviceName($form, $modal, dtSpecialDeviceName) {
    $.ajax({
        type: 'POST',
        url: 'add_special_device_names',
        data: $form.serialize(),
        dataType: 'json',
        success: function (response) {
            if (response.result === 1) {
                dtSpecialDeviceName.draw(false);
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
 * Fetch special device names data by ID
 */
function fetchSpecialDeviceNameById(id, $modal) {
    $.ajax({
        type: 'GET',
        url: 'get_special_device_names_by_id',
        data: { id },
        dataType: 'json',
        success: function (response) {
            // Populate modal fields (adjust names per special device names)
            $('#txtDeviceNameId').val(response.id);
            $('#txtDeviceName').val(response.device_name);
            // $('#selStatus').val(response.status);

            $modal.modal('show');
        },
        error: function (xhr) {
            console.error('Fetch failed:', xhr.responseText);
            showError('Failed to fetch data.');
        }
    });
}

/**
 * Disable or update special device names status
 */
function updateSpecialDeviceNameStatus(id, dtSpecialDeviceName) {
    $.ajax({
        type: 'POST',
        url: 'update_special_device_names_status',
        data: { id },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                showSuccess('Status updated successfully.');
                dtSpecialDeviceName.draw(false);
            }else {
                // ⚠️ If success is false
                Swal.fire({
                    title: 'Error',
                    text: response.message,
                    icon: 'error'
                });
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
