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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/table/users','HomeController@tables')->name('table.user');

Route::get('/user/{user}/edit','HomeController@userEdit')->name('user.edit');

Route::put('user/{user}','HomeController@userUpdate')->name('user.update');

Route::delete('users/{user}/delete', 'HomeController@userDestroy')->name('user.delete');
