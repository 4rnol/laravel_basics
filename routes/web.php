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

//Auth::routes();

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');


// Logout Routes...
//if ($options['logout'] ?? true) {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//}

// Registration Routes...
//if ($options['register'] ?? true) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
//}
//forgot Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/table/users','HomeController@tables')->name('table.user');

Route::get('/user/{user}/edit','HomeController@userEdit')->name('user.edit');

Route::put('user/{user}','HomeController@userUpdate')->name('user.update');

Route::delete('users/{user}/delete', 'HomeController@userDestroy')->name('user.delete');
