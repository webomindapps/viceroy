<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\frontend\RegistrationController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/',[RegistrationController::class,'welcome']);
Route::post('/AddGuest', [RegistrationController::class, 'store'])->name('guest.store');
Route::get('guests/{id}/edit', [RegistrationController::class, 'editguests'])->name('guests.edit');
Route::post('guests/{id}/edit', [RegistrationController::class, 'updateguests']);
Route::get('/guests/document/{id}/delete', [RegistrationController::class, 'deleteDocument'])->name('guests.document.delete');




Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/guest/export', [LoginController::class, 'exports'])->name('guest.exports');
    Route::get('guest/{id}/details', [LoginController::class, 'getdetails'])->name('guest.details');
    Route::get('guest/{id}/download', [LoginController::class, 'downloadpdf'])->name('guest.download');
    Route::get('guest/{id}/edit', [LoginController::class, 'editguests'])->name('guest.edit');
    Route::post('guest/{id}/edit', [LoginController::class, 'updateguests']);
    Route::get('/guest/document/{id}/delete', [LoginController::class, 'deleteDocument'])->name('guest.document.delete');
    Route::get('guest/{id}/delete',[LoginController::class,'deleteguests'])->name('guest.delete');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/filter-guests', [LoginController::class, 'filterGuests'])->name('admin.filter.guests');

});
