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

/* Route Default Laravel
Route::get('/', function () {
    return view('welcome');
});
*/
 
// Route Website
Route::get('/', 'WebController@welcome');
Route::get('/patients', 'WebController@patients');
Route::get('/doctors', 'WebController@doctors');
Route::get('/medicines', 'WebController@medicines');
Route::get('/medicalrecords', 'WebController@medicalrecords');