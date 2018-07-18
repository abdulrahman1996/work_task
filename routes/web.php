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

Route::get('/', 'Common@login');
Route::get('/login' ,  [ 'as' => 'login', 'uses' => 'Common@login']);
Route::post('/login' , 'Common@doLogin');
Route::get('/register' , 'Common@register');
Route::post('/register' , 'Common@store');

Route::group(['middleware' => 'admin'], function () {
Route::get('/addCompany' , 'ComponyController@addCompany');
Route::post('/addCompany' , 'ComponyController@store');
Route::get('/editCompany' , 'ComponyController@editCompany');
Route::post('/editCompany' , 'ComponyController@edit');
Route::get('/getCompany' , 'ComponyController@getById');
Route::get('/deleteCompany' , 'ComponyController@delete');
Route::get('/searchCompany/{search_field}' , 'ComponyController@search');

Route::get('adminHome' , 'AdminController@adminHome');
Route::get('/getAllCompanies' , 'AdminController@getAllCompanies');
Route::get('/getAllEmployees' , 'AdminController@getAllEmployees');
Route::post('/edit' , 'AdminController@editUser');
Route::get('/getUser/{id}' , 'AdminController@getEmployerById');
Route::get('/deleteUser' , 'AdminController@deleteUser');
Route::get('/searchUser/{search_field}' , 'AdminController@searchEmployer');
Route::get('/AddEmployee' , 'AdminController@createEmployee');
Route::Post('/AddEmployee' , 'AdminController@storeEmployee');
});




