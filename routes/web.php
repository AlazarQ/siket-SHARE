<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ShareholderController;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('shareholders', ShareholderController::class)
//     ->only(['create', 'index', 'store'])
//     ->middleware('auth', 'verified');

// Route::resource('attendance', AttendanceController::class)
// ->only(['index', 'store'])
// ->middleware('auth', 'verified');
Route::resource('shareholders', ShareholderController::class);
Route::get('shareholders/{id}/edit', [ShareholderController::class, 'edit'])->name('shareholders.edit');

Route::resource('meetings', MeetingController::class);
Route::get('meetings/{id}/edit', [MeetingController::class, 'edit'])->name('meetings.edit');

Route::resource('attendances', AttendanceController::class)->only(['index', 'create', 'store', 'show']);

require __DIR__ . '/auth.php';
