<?php

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
$router->group(['prefix' => 'karyawan'], function () use ($router){
    $router->get('/list', 'EmployeeController@index');
    $router->get('/create', 'EmployeeController@create');
    $router->post('/store', 'EmployeeController@store');
    $router->post('/destroy/{id}', 'EmployeeController@destroy');
    $router->get('/edit/{id}', 'EmployeeController@edit');
    $router->post('/update', 'EmployeeController@update');
});

Route::get('/', 'DashboardController@index');
Route::get('/home', 'DashboardController@index');
Route::get('/laporan', 'LaporanController@index');
Route::get('/data', 'ContohController@data');
Route::get('/testing', 'ContohController@index');
Route::get('/login', 'AuthController@login_form')->name('login');
Route::post('/login', 'AuthController@login')->middleware(['api']);
Route::post('/logout', 'AuthController@logout');

// Route::group(['prefix' => 'api'], function ($router) {
//     Route::post('/login', 'AuthController@login');
// });
