<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::resource('companies', \App\Http\Controllers\CompanyController::class);
    Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
});

Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');