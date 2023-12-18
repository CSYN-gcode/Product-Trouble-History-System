<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\DmrpqcTsController;
use App\Http\Controllers\DiesetConditionController;

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
// Route::get('/', function () {
//     return view('signin');
// })->name('signin');

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('/register', function () {
//     return view('register');
// })->name('register');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// Route::get('/about_management', function () {
//     return view('about_management');
// })->name('about_management');

// Route::get('/history', function () {
//     return view('history');
// })->name('history');

// Route::get('/vision_mission', function () {
//     return view('vision_mission');
// })->name('vision_mission');

// Route::get('/officials', function () {
//     return view('officials');
// })->name('officials');

// Route::get('/activities', function () {
//     return view('activities');
// })->name('activities');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Route::get('/change_password_page', function () {
//     return view('change_password');
// })->name('change_password_page');

// Route::get('/user_management', function () {
//     return view('user_management');
// })->name('user_management');


// /**
//  * USER CONTROLLER
//  * Note: always use snake case naming convention to route & route name then set camel case to the method for best practice
//  */
// Route::get('/sign_in', [UserController::class, 'signIn'])->name('sign_in');
// Route::post('/add_user', [UserController::class, 'addUser'])->name('add_user');
// Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// Route::get('/check_session', [UserController::class, 'checkSession'])->name('check_session');
// Route::post('/add_user_as_admin', [UserController::class, 'addUserAsAdmin'])->name('add_user_as_admin');
// Route::get('/get_user_levels', [UserController::class, 'getUserLevels'])->name('get_user_levels');
// Route::get('/view_users', [UserController::class, 'viewUsers'])->name('view_users');
// Route::get('/view_pending_users', [UserController::class, 'viewPendingUsers'])->name('view_pending_users');
// Route::get('/get_user_by_id', [UserController::class, 'getUserById'])->name('get_user_by_id');
// Route::post('/edit_user_status', [UserController::class, 'editUserStatus'])->name('edit_user_status');
// Route::post('/edit_user_authentication', [UserController::class, 'editUserAuthentication'])->name('edit_user_authentication');

// ############################################################################################################ //

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
Route::post('/add_request', [DmrpqcTsController::class, 'add_request'])->name('add_request');
Route::post('/update_dieset_conditon_data', [DmrpqcTsController::class, 'update_dieset_conditon_data'])->name('update_dieset_conditon_data');
Route::post('/update_dieset_conditon_checking_data', [DmrpqcTsController::class, 'update_dieset_conditon_checking_data'])->name('update_dieset_conditon_checking_data');
Route::post('/update_machine_setup_data', [DmrpqcTsController::class, 'update_machine_setup_data'])->name('update_machine_setup_data');
Route::post('/update_product_req_checking_data', [DmrpqcTsController::class, 'update_product_req_checking_data'])->name('update_product_req_checking_data');
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


//===== DIESET CONDITION PPS-TS CONTROLLER ======
Route::get('/view_dieset_condition', [DiesetConditionController::class, 'view_dieset_condition'])->name('view_dieset_condition');

// User Controller
// Route::post('/add_user', 'UserController@add_user');
// Route::post('/deactivate_user', 'UserController@deactivate_user');
// Route::post('/activate_user', 'UserController@activate_user');
// Route::post('edit_user', 'UserController@edit_user');
// Route::get('get_user_levels', 'UserController@get_user_levels');
// Route::get('/view_users', 'UserController@'view_users);
// Route::get('/get_id_edit_user', 'UserController@get_id_edit_user');
// Route::get('/get_user_details', 'UserController@get_user_details');
// // Route::get('/get_UserDepartment', 'UserController@get_UserDepartment');

// Route::get('/get_department', 'UserController@get_department');
// Route::get('/get_department_for_ink', 'UserController@get_department_for_ink');

// //test
// Route::get('/send_mail', 'MailController@send_mail');
// Route::get('/send_mail_completed_data', 'MailController@send_mail_completed_data');

// //===== FISCAL YEAR CONTROLLER ======
// Route::get('/get_fiscal_year', 'FiscalYearController@get_fiscal_year')->name('get_fiscal_year');
// Route::get('/transition_fy', 'FiscalYearController@transition_fy')->name('transition_fy');
// Route::get('/get_current_fy', 'FiscalYearController@get_current_fy')->name('get_current_fy');


// //===== ENERGY CONSUMPTION CONTROLLER ======
// Route::post('/insert_energy_yearly_target', 'EnergyConsumptionController@insert_energy_yearly_target')->name('insert_energy_yearly_target');
// Route::post('/insert_energy_target', 'EnergyConsumptionController@insert_energy_target')->name('insert_energy_target');
// Route::post('/insert_energy_actual', 'EnergyConsumptionController@insert_energy_actual')->name('insert_energy_actual');
// Route::get('/view_energy_consumption', 'EnergyConsumptionController@view_energy_consumption')->name('view_energy_consumption');
// Route::get('/get_energy_target_by_id', 'EnergyConsumptionController@get_energy_target_by_id')->name('get_energy_target_by_id');
// Route::get('/get_months_for_filter', 'EnergyConsumptionController@get_months_for_filter')->name('get_months_for_filter');
// Route::get('/get_fiscal_year_for_filter', 'EnergyConsumptionController@get_fiscal_year_for_filter')->name('get_fiscal_year_for_filter');
// Route::get('/get_current_energy_data', 'EnergyConsumptionController@get_current_energy_data')->name('get_current_energy_data');
// Route::get('/get_fiscal_year_target', 'EnergyConsumptionController@get_fiscal_year_target')->name('get_fiscal_year_target');

// //test
// // Route::get('/get_energy_fy_target', 'EnergyConsumptionController@get_energy_fy_target')->name('get_energy_fy_target');

// //===== WATER CONSUMPTION CONTROLLER ======
// Route::post('/insert_water_yearly_target', 'WaterConsumptionController@insert_water_yearly_target')->name('insert_water_yearly_target');
// Route::post('/insert_water_target', 'WaterConsumptionController@insert_water_target')->name('insert_water_target');
// Route::post('/insert_water_actual', 'WaterConsumptionController@insert_water_actual')->name('insert_water_actual');
// Route::get('/view_water_consumption', 'WaterConsumptionController@view_water_consumption')->name('view_water_consumption');
// Route::get('/get_water_target_by_id', 'WaterConsumptionController@get_water_target_by_id')->name('get_water_target_by_id');
// Route::get('/get_current_water_data', 'WaterConsumptionController@get_current_water_data')->name('get_current_water_data');
// Route::get('/get_fiscal_year_target', 'WaterConsumptionController@get_fiscal_year_target')->name('get_fiscal_year_target');
// //test
// // Route::get('/get_water_fy_target', 'WaterConsumptionController@get_water_fy_target')->name('get_water_fy_target');

// //===== PAPER CONSUMPTION CONTROLLER ======
// Route::post('/insert_paper_target', 'PaperConsumptionController@insert_paper_target')->name('insert_paper_target');
// Route::post('/insert_paper_actual', 'PaperConsumptionController@insert_paper_actual')->name('insert_paper_actual');
// Route::get('/get_current_paper_data', 'PaperConsumptionController@get_current_paper_data')->name('get_current_paper_data');
// Route::get('/view_paper_consumption', 'PaperConsumptionController@view_paper_consumption')->name('view_paper_consumption');
// Route::get('/get_paper_target_by_id', 'PaperConsumptionController@get_paper_target_by_id')->name('get_paper_target_by_id');
// Route::get('/get_current_paper_data_ts', 'PaperConsumptionController@get_current_paper_data_ts')->name('get_current_paper_data_ts');
// Route::get('/get_current_paper_data_cn', 'PaperConsumptionController@get_current_paper_data_cn')->name('get_current_paper_data_cn');
// Route::get('/get_current_paper_data_yf', 'PaperConsumptionController@get_current_paper_data_yf')->name('get_current_paper_data_yf');
// Route::get('/get_current_paper_data_pps', 'PaperConsumptionController@get_current_paper_data_pps')->name('get_current_paper_data_pps');

// //===== INK CONSUMPTION CONTROLLER ======
// Route::get('/view_ink_consumption_sg', 'InkConsumptionController@view_ink_consumption_sg')->name('view_ink_consumption_sg');
// Route::get('/view_ink_consumption_prod', 'InkConsumptionController@view_ink_consumption_prod')->name('view_ink_consumption_prod');
// Route::post('/insert_ink_target', 'InkConsumptionController@insert_ink_target')->name('insert_ink_target');
// Route::post('/insert_ink_actual', 'InkConsumptionController@insert_ink_actual')->name('insert_ink_actual');
// Route::get('/get_ink_target_by_id', 'InkConsumptionController@get_ink_target_by_id')->name('get_ink_target_by_id');
// //DASHBOARD
// Route::get('/get_current_ink_data_bod', 'InkConsumptionController@get_current_ink_data_bod')->name('get_current_ink_data_bod');
// Route::get('/get_current_ink_data_ias', 'InkConsumptionController@get_current_ink_data_ias')->name('get_current_ink_data_ias');
// Route::get('/get_current_ink_data_fin', 'InkConsumptionController@get_current_ink_data_fin')->name('get_current_ink_data_fin');
// Route::get('/get_current_ink_data_hrd', 'InkConsumptionController@get_current_ink_data_hrd')->name('get_current_ink_data_hrd');
// Route::get('/get_current_ink_data_ess', 'InkConsumptionController@get_current_ink_data_ess')->name('get_current_ink_data_ess');
// Route::get('/get_current_ink_data_log', 'InkConsumptionController@get_current_ink_data_log')->name('get_current_ink_data_log');
// Route::get('/get_current_ink_data_fac', 'InkConsumptionController@get_current_ink_data_fac')->name('get_current_ink_data_fac');
// Route::get('/get_current_ink_data_iss', 'InkConsumptionController@get_current_ink_data_iss')->name('get_current_ink_data_iss');
// Route::get('/get_current_ink_data_qad', 'InkConsumptionController@get_current_ink_data_qad')->name('get_current_ink_data_qad');
// Route::get('/get_current_ink_data_ems', 'InkConsumptionController@get_current_ink_data_ems')->name('get_current_ink_data_ems');
// Route::get('/get_current_ink_data_ts', 'InkConsumptionController@get_current_ink_data_ts')->name('get_current_ink_data_ts');
// Route::get('/get_current_ink_data_cn', 'InkConsumptionController@get_current_ink_data_cn')->name('get_current_ink_data_cn');
// Route::get('/get_current_ink_data_yf', 'InkConsumptionController@get_current_ink_data_yf')->name('get_current_ink_data_yf');
// Route::get('/get_current_ink_data_pps', 'InkConsumptionController@get_current_ink_data_pps')->name('get_current_ink_data_pps');

// Route::get('/get_all_target_papers', 'InkConsumptionController@get_all_target_papers')->name('get_all_target_papers');
// Route::get('/get_fy_for_overall_target', 'InkConsumptionController@get_fy_for_overall_target');

//USER CONTROLLER
// Route::post('/sign_in', 'UserController@sign_in')->name('sign_in');
// Route::post('/sign_out', 'UserController@sign_out')->name('sign_out');
// Route::post('/change_pass', 'UserController@change_pass')->name('change_pass');
// Route::post('/change_user_stat', 'UserController@change_user_stat')->name('change_user_stat');
// Route::get('/view_users', 'UserController@view_users');
// Route::post('/add_user', 'UserController@add_user');
// Route::get('/get_user_by_id', 'UserController@get_user_by_id');
// Route::get('/get_user_list', 'UserController@get_user_list');
// Route::get('/get_user_by_batch', 'UserController@get_user_by_batch');
// Route::get('/get_user_by_stat', 'UserController@get_user_by_stat');
// Route::post('/edit_user', 'UserController@edit_user');
// Route::post('/reset_password', 'UserController@reset_password');
// Route::get('/generate_user_qrcode', 'UserController@generate_user_qrcode');
// Route::post('/import_user', 'UserController@import_user');

// Route::get('/export/{month}', 'ExportController@excel')->name('export');
// Route::get('/export_test', 'ExportController@past_fy_excel')->name('export_test');
// Route::post('/insert_action_plan', 'ExportController@insert_action_plan')->name('insert_action_plan');
// Route::get('/get_action_plan_by_id', 'ExportController@get_action_plan_by_id')->name('get_action_plan_by_id');
// Route::get('/view_action_plan', 'ExportController@view_action_plan')->name('view_action_plan');
// // Route::get('/export_past_fy', 'ExportController@past_fy_excel')->name('export_past_fy');
// Route::get('/export_past_fy/{fyId}', 'ExportController@past_fy_excel')->name('export_past_fy');

// // PAST FY SELECTOR
// Route::get('/get_past_fy', 'ExportController@get_past_fy');
