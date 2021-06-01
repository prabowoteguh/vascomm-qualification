<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', [ContohController::class, 'home']);
Route::get('/home', [ContohController::class, 'home']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login-action', [AuthController::class, 'login_action']);
Route::get('/logout-action', [AuthController::class, 'logout_action']);
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/data', [ContohController::class, 'data']);
Route::get('/testing', [ContohController::class, 'index']);

Route::get('/karyawan/list', [App\Http\Controllers\EmployeeController::class, 'index']);
Route::get('/karyawan/create', [App\Http\Controllers\EmployeeController::class, 'create']);
Route::post('/karyawan/store', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::post('/karyawan/destroy/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy']);
Route::post('/karyawan/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit']);
Route::post('/karyawan/update', [App\Http\Controllers\EmployeeController::class, 'update']);
// Route::prefix('employees')->group(function () {
// });

