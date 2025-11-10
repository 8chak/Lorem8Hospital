<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});
Route::get('/news', [UserController::class, 'allNews'])->name('allNews');

Route::get('/blog-details/{blog}', [UserController::class, 'showNews'])->name('showNews');

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/appointment', [UserController::class, 'requestAppointment'])->name('appointmentRequest');

Route::get('/dashboard', [UserController::class, 'dashboardType'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/doctors', [UserController::class, 'allDoctors'])->name('doctorsPage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/add_doctor', [AdminController::class, 'addDoctor'])->name('add_doctor');
    Route::get('/doctors_list', [AdminController::class, 'doctorsList'])->name('doctors_list');
    Route::POST('/add_doctor', [AdminController::class, 'addNewDoctor'])->name('add_new_doctor');
    Route::POST('/delete_doctor/{id}', [AdminController::class, 'deleteDoctor'])->name('delete_doctor');
    Route::get('/edit_doctor/{id}', [AdminController::class, 'editDoctor'])->name('edit_doctor');
    Route::PUT('/update_doctor/{id}', [AdminController::class, 'updateDoctor'])->name('update_doctor');
    Route::get('/appointments', [AdminController::class, 'viewAppointments'])->name('appointments');
    Route::PUT('/appointment/{id}/update', [AdminController::class, 'updateAppointment'])->name('appointmentUpdate');
    Route::get('/main_panel', [AdminController::class, 'showPanel'])->name('show_panel');
});

Route::resource('blogs', BlogController::class)->middleware('admin', 'auth');

require __DIR__.'/auth.php';
