<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientSessionController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;





Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
// Route::post('/booking', function (Request $request) {
// dd('وصلت للراوت بنجاح!', $request->all());
// })->name('booking.store');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.index');
Route::get('/patient', [PatientController::class, 'patient'])->name('patient');
// Route::post('/patient', [PatientController::class, 'store'])->name('patient.store');
Route::get('/patient-session/{id}/create', [PatientSessionController::class, 'create'])->name('patient-session.create');
Route::post('/patient-session', [PatientSessionController::class, 'store'])->name('patient-session.store');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::get('/addcomment', [TestimonialController::class, 'index'])->name('testimonial.index');
Route::post('/comment', [TestimonialController::class, 'create'])->name('testimonial.creat');
