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

Route::get('/', 'RouterController@index');
Route::match(['post','get'],'/search','RouterController@store');
Route::match(['post','get'],'/login','LoginController@login');
Route::get('/exit','LoginController@exit');
Route::match(['post','get'],'/register','LoginController@register');
Route::get('/buy/{id}/{travelClass}','TicketController@buy');
Route::get('/account',"AccountController@show");
Route::post('/edit',"AccountController@edit");
Route::post('/guest',"AccountController@modifyGuest");
Route::get('/deleteguest',"AccountController@deleteGuest");
