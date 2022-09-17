<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\AppointmentController as ControllersAppointmentController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'handle'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register.page');
Route::post('/register', [RegisterController::class, 'handle'])->name('register.process');
Route::get('/', [ControllersAppointmentController::class, 'index']);
Route::middleware('auth')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('can:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/admin/appointments', [AppointmentController::class, 'store']);
        Route::post('/admin/appointments/{appointment_id}/add_new_appointment_date', [AppointmentController::class, 'newDate']);
    });
    //admin

    //user
    Route::put('/book_appointment/{date_id}', [ControllersAppointmentController::class, 'book']);
});
