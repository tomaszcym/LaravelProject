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





Auth::routes(['register' => false, 'reset' => false]);


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');





include_once('admin.php');
include_once('page.php');
include_once('offer.php');
include_once('realization.php');
