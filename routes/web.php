<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AdvanceSalaryController;
/*
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//===========================Employee Routing=====================================
Route::resource('employees', EmployeeController::class);


//===========================Customer Routing=====================================
Route::resource('customers', CustomerController::class);


//===========================Customer Routing=====================================
Route::resource('suppliers', SupplierController::class);


//===========================Salary Routing=====================================
Route::resource('salaries', SalaryController::class);


//===========================AdvanceSalary Routing=====================================
Route::resource('advances', AdvanceSalaryController::class);