<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::resource('users','UserController');
Route::resource('users.providers','UserProviderController');

Route::resource('providers', 'ProviderController');
Route::resource('providers.spots', 'ProviderSpotController');

Route::resource('spots', 'SpotController');
Route::resource('spots.providers', 'SpotProviderController');

Route::resource('payments', 'PaymentController');

