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

Route::get('/issue', [
    'as' => 'issue.get',
    'uses' => 'certi@issue'
]);

Route::post('/issue', [
    'as' => 'home.post',
    'uses' => 'certi@store'
]);

Route::get('/createParentEvent', [
    'as' => 'createParentEvent.get',
    'uses' => 'certi@createParentEventGet'
]);

Route::post('/createParentEvent', [
    'as' => 'createParentEvent.post',
    'uses' => 'certi@createParentEventPost'
]);


// Route::get('/certiCreate', 'certi@create')->name('certi.create');
// Route::post('/certiCreate', 'certi@store')->name('certi.store');
