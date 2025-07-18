<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NotulenController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'landingPage'])->name('landingPage');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');
Route::resource('schedules', ScheduleController::class)->middleware('auth');
Route::put('schedules/{schedule}/disposition', [ScheduleController::class, 'updateDisposition'])->name('schedules.updateDisposition')->middleware('auth');
Route::resource('notulens', NotulenController::class)->middleware('auth');
Route::get('notulens/{notulen}/download', [NotulenController::class, 'downloadPDF'])->name('notulens.downloadPDF')->middleware('auth');
Route::resource('contact', ContactController::class)->middleware('auth');

