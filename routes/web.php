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

Route::get('/', [
    'as' => 'home',
    'uses' => 'certi@home'
]);
Route::get('/issue', 'certi@issue');
Route::get('/certiCreate', 'certi@store')->name('certi.store');
Route::post('/certiCreate', 'certi@store')->name('certi.store');