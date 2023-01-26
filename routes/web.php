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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// 医者
Route::get('doctor/{yearMonth}', 'DoctorController@alterYearMonth')->name('alter.yearMonth');
Route::resource('doctor', 'DoctorController');

// 管理者
Route::group(['prefix'=>'admin', 'as'=>'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/{yearMonth}', 'AdminController@alterYearMonth')->name('alter.yearMonth');
    Route::get('/doctor/list', 'AdminController@getDoctorList')->name('doctorList');
    Route::get('/patient/list', 'AdminController@getPatientList')->name('patientList');
});

// ユーザー情報
Route::resource('user', 'UserController');
Route::resource('reservation', 'ReservationController');

// Ajax
Route::group(['prefix'=>'ajax'], function () {
    Route::get('/patient/{id}', 'AjaxController@getPatient');
    Route::get('/doctor/{id}', 'AjaxController@getDoctor');    
});

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');