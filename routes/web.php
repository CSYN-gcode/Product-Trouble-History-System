<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\DefectsController;
use App\Http\Controllers\PartsTroubleHistoryController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DmrpqcTsController;
use App\Http\Controllers\DiesetConditionController;
use App\Http\Controllers\ExportPdfController;

use Illuminate\Support\Facades\Response;
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
    return view('parts_trouble_history_record');
})->name('parts_trouble_history_record');

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
    Route::get('/download_file/{id}', 'downloadFile')->name('download_file');
    Route::get('/export_excel', 'exportExcel')->name('export_excel');
    Route::get('/get_count_no_of_occurrence', 'getCountOfNoOfOccurrence')->name('get_count_no_of_occurrence');
    Route::get('/get_device_name', 'getDeviceName')->name('get_device_name');
});
