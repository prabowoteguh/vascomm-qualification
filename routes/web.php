<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

$router->group(['prefix' => 'user'], function () use ($router){
    $router->get('/list', 'EmployeeController@index');
    $router->get('/create', 'EmployeeController@create');
    $router->post('/store', 'EmployeeController@store');
    $router->post('/destroy/{id}', 'EmployeeController@destroy');
    $router->get('/edit/{id}', 'EmployeeController@edit');
    $router->post('/update', 'EmployeeController@update');
});