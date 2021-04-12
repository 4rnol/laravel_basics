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

Route::resource('providers', 'ProviderController');

Route::resource('spots', 'SpotController');

Route::resource('payments', 'PaymentController');

Route::get('user/{user}/provider', 'ProviderController@userProviderTable')->name('user.provider');
Route::get('provider/{provider}/users', 'ProviderController@providerUsersTable')->name('provider.users');
Route::get('provider/{provider}/spots', 'ProviderController@providerSpotsTable')->name('provider.spots');
Route::get('table/providers', 'ProviderControlle@show')->name('table.providers');

Route::get('spot/{spot}/providers','SpotController@spotProvidersTable')->name('spot.providers');
