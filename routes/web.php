<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StaffMasterController;
use App\Http\Controllers\frontend\RegistrationController;
use App\Http\Controllers\ReportController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistrationController::class, 'index'])->name('staff_login');
Route::post('/staff/login', [RegistrationController::class, 'authenticate'])->name('staff.login.post');
Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth:staff'], function () {


    Route::get('/welcome', [RegistrationController::class, 'welcome'])->name('welcome');
    Route::post('/AddGuest', [RegistrationController::class, 'store'])->name('guest.store');
    Route::get('guests/{id}/edit', [RegistrationController::class, 'editguests'])->name('guests.edit');
    Route::post('guests/{id}/edit', [RegistrationController::class, 'updateguests']);
    Route::get('/guests/document/{id}/delete', [RegistrationController::class, 'deleteDocument'])->name('guests.document.delete');
});
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
    Route::get('guest/{id}/delete', [LoginController::class, 'deleteguests'])->name('guest.delete');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/filter-guests', [LoginController::class, 'filterGuests'])->name('admin.filter.guests');
    Route::get('downloadformb/{id}', [LoginController::class, 'downloadformb'])->name('admin.downloadformb');
    Route::get('reports', [ReportController::class, 'getreports'])->name('admin.reports');
    Route::post('/generate-foreigner-reports', [ReportController::class, 'generateForeignerReports'])->name('generate.foreigner.reports');


    //staff Master
    Route::get('/staff-master', [StaffMasterController::class, 'index'])->name('staffmaster');
    Route::get('/staff-master/create',[StaffMasterController::class,'create'])->name('staffmaster.create');
    Route::post('/staff-master/store',[StaffMasterController::class,'store'])->name('staffmaster.store');
    Route::get('staff-master/edit/{id}',[StaffMasterController::class,'edit'])->name('staffmaster.edit');
    Route::post('staff-master/edit/{id}',[StaffMasterController::class,'update']);
    Route::get('staff-master/{id}/delete',[StaffMasterController::class,'delete'])->name('staffmaster.delete');

});
