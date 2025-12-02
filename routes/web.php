<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\DefectsController;
use App\Http\Controllers\PartsTroubleHistoryController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DmrpqcTsController;
use App\Http\Controllers\DiesetConditionController;
use App\Http\Controllers\ExportPdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/defects', function () {
    return view('defects');
})->name('defects');

Route::get('/parts_trouble_history_record', function () {
    return view('parts_trouble_history_record');
})->name('parts_trouble_history_record');

// MODE OF DEFECTS CONTROLLER
Route::controller(DefectsController::class)->group(function () {
    Route::get('/view_defects', 'viewDefectsInfo')->name('view_defects');
    Route::post('/add_defects', 'addDefectsInfo')->name('add_defects');
    Route::get('/get_defects_by_id', 'getDefectsById')->name('get_defects_by_id');
    Route::post('/update_defects_status', 'updateDefectsStatus')->name('update_defects_status');
    Route::get('/get_defects', 'getDefects')->name('get_defects');
});

// MODE OF PARTS TROUBLE HISTORY CONTROLLER
Route::controller(PartsTroubleHistoryController::class)->group(function () {
    Route::get('/view_parts_trouble_history', 'viewPartsTroubleHistoryInfo')->name('view_parts_trouble_history');
    Route::post('/add_parts_trouble_history', 'addPartsTroubleHistoryInfo')->name('add_parts_trouble_history');
    Route::get('/get_parts_trouble_history_by_id', 'getPartsTroubleHistoryById')->name('get_parts_trouble_history_by_id');
    Route::post('/update_parts_trouble_history_status', 'updatePartsTroubleHistoryStatus')->name('update_parts_trouble_history_status');
});




Route::get('/user_management', function () {
    return view('user_management');
})->name('user_management');

Route::get('/status_dashboard', function () {
    return view('status_dashboard');
})->name('status_dashboard');

// Route::get('/dmrpqc_ts_1', function () {
//     return view('dmrpqc_ts_1');
// })->name('dmrpqc_ts_1');

Route::get('/dmrpqc_ts', function () {
    return view('dmrpqc_ts');
})->name('dmrpqc_ts');

// Route::get('/ts_dieset_condition', function () {
//     return view('ts_dieset_condition');
// })->name('ts_dieset_condition');

Route::get('/DMR_PQC_TS', function () {
    return view('DMR_PQC_TS');
})->name('DMR_PQC_TS');

Route::get('/DMR_PQC_CN', function () {
    return view('DMR_PQC_CN');
})->name('DMR_PQC_CN');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/email_content', function () {
    return view('email_content');
})->name('email_content');

Route::get('/email_completed_data_content', function () {
    return view('email_completed_data_content');
})->name('email_completed_data_content');

// Automailer
Route::get('/auto_mailer', function () {
    return view('auto_mailer');
})->name('auto_mailer');


//===== USER CONTROLLER ======
Route::get('/get_user_department', [UserController::class, 'get_user_department'])->name('get_user_department');
Route::get('/get_user_level', [UserController::class, 'get_user_level'])->name('get_user_level');
Route::get('/get_users_by_stat', [UserController::class, 'get_users_by_stat'])->name('get_users_by_stat');
Route::get('/get_users_by_position', [UserController::class, 'get_users_by_position'])->name('get_users_by_position');
Route::post('/add_user', [UserController::class, 'add_user'])->name('add_user');
Route::get('/get_id_edit_user', [UserController::class, 'get_id_edit_user'])->name('get_id_edit_user');
Route::post('edit_user', [UserController::class, 'edit_user'])->name('edit_user');
Route::get('/view_users', [UserController::class, 'view_users'])->name('view_users');
Route::post('/deactivate_user', [UserController::class, 'deactivate_user'])->name('deactivate_user');
Route::post('/activate_user', [UserController::class, 'activate_user'])->name('activate_user');

//===== DIESET CONTROLLER ======
Route::get('/get_data_for_dashboard', [DmrpqcTsController::class, 'get_data_for_dashboard'])->name('get_data_for_dashboard');
Route::post('/add_request', [DmrpqcTsController::class, 'add_request'])->name('add_request');
Route::post('/update_dieset_conditon_data', [DmrpqcTsController::class, 'update_dieset_conditon_data'])->name('update_dieset_conditon_data');
Route::post('/update_dieset_conditon_checking_data', [DmrpqcTsController::class, 'update_dieset_conditon_checking_data'])->name('update_dieset_conditon_checking_data');
Route::post('/update_machine_setup_data', [DmrpqcTsController::class, 'update_machine_setup_data'])->name('update_machine_setup_data');
Route::post('/update_product_req_checking_data', [DmrpqcTsController::class, 'update_product_req_checking_data'])->name('update_product_req_checking_data');
Route::post('/update_machine_param_checking_data', [DmrpqcTsController::class, 'update_machine_param_checking_data'])->name('update_machine_param_checking_data');
Route::post('/update_specifications_data', [DmrpqcTsController::class, 'update_specifications_data'])->name('update_specifications_data');
Route::post('/update_completion_data', [DmrpqcTsController::class, 'update_completion_data'])->name('update_completion_data');
Route::post('/update_parts_drawing_data', [DmrpqcTsController::class, 'update_parts_drawing_data'])->name('update_parts_drawing_data');
Route::post('/delete_request', [DmrpqcTsController::class, 'delete_request'])->name('delete_request');
// Route::post('/submit_request', [DmrpqcTsController::class, 'submit_request'])->name('submit_request');
Route::post('/update_status_of_dieset_request', [DmrpqcTsController::class, 'update_status_of_dieset_request'])->name('update_status_of_dieset_request');
Route::get('/get_name_by_session', [DmrpqcTsController::class, 'get_name_by_session'])->name('get_name_by_session');
Route::get('/view_dmrpqc', [DmrpqcTsController::class, 'view_dmrpqc'])->name('view_dmrpqc');
Route::get('/get_pps_db_data_by_item_code', [DmrpqcTsController::class, 'get_pps_db_data_by_item_code'])->name('get_pps_db_data_by_item_code');
Route::get('/get_dmrpqc_details_id', [DmrpqcTsController::class, 'get_dmrpqc_details_id'])->name('get_dmrpqc_details_id');
Route::get('/download_file/{id}', [DmrpqcTsController::class, 'download_file'])->name('download_file');
// Route::get('/get_chart_data', 'ChartController@get_chart_data');

Route::controller(ExportPdfController::class)->group(function () {
    Route::get('/view_pdf/{id},{process_status}', 'print')->name('print');
    Route::get('/get_dmrpqc_details_id_test/{id},{process_status}', 'get_dmrpqc_details_id_test')->name('test');
});

//===== DIESET CONDITION PPS-TS CONTROLLER ======
Route::get('/view_dieset_condition', [DiesetConditionController::class, 'view_dieset_condition'])->name('view_dieset_condition');
