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

Route::get('/', 'DashboardController@index');
Route::get('/home', 'DashboardController@index');
Route::get('/login', 'AuthController@login');
Route::post('/login-action', 'AuthController@login_action');
Route::get('/logout-action', 'AuthController@logout_action');
Route::get('/laporan', 'LaporanController@index');
Route::get('/data', 'ContohController@data');
Route::get('/testing', 'ContohController@index');

