<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'check_login'])->name('check_login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('home');
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::post('employee/delete', [EmployeeController::class, 'delete'])->name('employee.delete');
    Route::get('employee/{tab?}/{id?}', [EmployeeController::class, 'info'])->name('employee.info');
    Route::post('employee/{tab?}/{id?}', [EmployeeController::class, 'proses'])->name('employee.proses');

    Route::get('role', [RoleController::class, 'index'])->name('role.index');
    
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user/delete', [UserController::class, 'delete'])->name('user.delete');
    Route::get('user/{tab?}/{id?}', [UserController::class, 'info'])->name('user.info');
    Route::post('user/{tab?}/{id?}', [UserController::class, 'proses'])->name('user.proses');

    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('attendance/delete', [AttendanceController::class, 'delete'])->name('attendance.delete');
    Route::post('attendance/{tab?}/{id?}', [AttendanceController::class, 'proses'])->name('attendance.proses');

    Route::get('overtime', [OvertimeController::class, 'index'])->name('overtime.index');
    Route::post('overtime/delete', [OvertimeController::class, 'delete'])->name('overtime.delete');
    Route::post('overtime/{tab?}/{id?}', [OvertimeController::class, 'proses'])->name('overtime.proses');

    Route::get('payroll', [PayrollController::class, 'index'])->name('payroll.index');
    Route::post('payroll/delete', [PayrollController::class, 'delete'])->name('payroll.delete');
    Route::get('payroll/{tab?}/{id?}', [PayrollController::class, 'info'])->name('payroll.info');
    Route::post('payroll/{tab?}/{id?}', [PayrollController::class, 'proses'])->name('payroll.proses');
});

