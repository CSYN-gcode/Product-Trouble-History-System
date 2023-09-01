<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\UserController;

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
    return view('signin');
})->name('signin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/about_management', function () {
    return view('about_management');
})->name('about_management');

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/vision_mission', function () {
    return view('vision_mission');
})->name('vision_mission');

Route::get('/officials', function () {
    return view('officials');
})->name('officials');

Route::get('/activities', function () {
    return view('activities');
})->name('activities');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/change_password_page', function () {
    return view('change_password');
})->name('change_password_page');

Route::get('/user_management', function () {
    return view('user_management');
})->name('user_management');


/**
 * USER CONTROLLER
 * Note: always use snake case naming convention to route & route name then set camel case to the method for best practice
 */
Route::get('/sign_in', [UserController::class, 'signIn'])->name('sign_in');
Route::post('/add_user', [UserController::class, 'addUser'])->name('add_user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/check_session', [UserController::class, 'checkSession'])->name('check_session');
Route::post('/add_user_as_admin', [UserController::class, 'addUserAsAdmin'])->name('add_user_as_admin');
Route::get('/get_user_levels', [UserController::class, 'getUserLevels'])->name('get_user_levels');
Route::get('/view_users', [UserController::class, 'viewUsers'])->name('view_users');
Route::get('/view_pending_users', [UserController::class, 'viewPendingUsers'])->name('view_pending_users');
Route::get('/get_user_by_id', [UserController::class, 'getUserById'])->name('get_user_by_id');
Route::post('/edit_user_status', [UserController::class, 'editUserStatus'])->name('edit_user_status');
Route::post('/edit_user_authentication', [UserController::class, 'editUserAuthentication'])->name('edit_user_authentication');