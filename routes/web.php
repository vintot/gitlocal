<?php

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

Route::get('/', 'PagesController@index');
Route::post('auth/login', 'AuthenticationController@authenticate');
Route::get('auth/logout', 'AuthenticationController@logout');
Auth::routes();
Route::get('dashboard', 'DashboardController@index');
Route::get('listings', 'DashboardController@listings');
//Route::get('subscriptions', 'DashboardController@subscriptions');
Route::get('users', 'DashboardController@users');
Route::get('groups', 'DashboardController@groups');
Route::get('permissions', 'DashboardController@permissions');
Route::get('invoice', 'DashboardController@invoice');
Route::get('supervisor', 'DashboardController@supervisor');
Route::get('suplisting', 'DashboardController@suplisting');
Route::get('tableview', 'DashboardController@tableview');


Route::resource('subscriptions', 'PaymentsController');
Route::resource('users', 'Register');

Route::get('payment/process', 'PaymentsController@process')->name('payment.process');