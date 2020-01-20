<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Patients
Route::get('patients', 'PatientController@index');
Route::get('patient/{id}', 'PatientController@show');
Route::post('patient', 'PatientController@store');
Route::put('patient/{id}', 'PatientController@update');
Route::delete('patient/{id}', 'PatientController@destroy');

//Doctors
Route::get('doctors', 'DoctorController@index');
Route::get('doctor/{id}', 'DoctorController@show');
Route::post('doctor', 'DoctorController@store');
Route::put('doctor/{id}', 'DoctorController@update');
Route::delete('doctor/{id}', 'DoctorController@destroy');

//Medicines
Route::get('medicines', 'MedicineController@index');
Route::get('medicine/{id}', 'MedicineController@show');
Route::post('medicine', 'MedicineController@store');
Route::put('medicine/{id}', 'MedicineController@update');
Route::delete('medicine/{id}', 'MedicineController@destroy');

//MedicalRecords
Route::get('medicalrecords', 'MedicalRecordController@index');
Route::get('medicalrecord/{id}', 'MedicalRecordController@show');
Route::post('medicalrecord', 'MedicalRecordController@store');
////Route::put('medicalrecord', 'MedicalRecordController@store');
////Route::delete('medicalrecord/{id}', 'MedicalRecordController@destroy');