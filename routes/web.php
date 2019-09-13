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

Route::get('/', 'AuthController@getLogin');

Route::get("/register", "AuthController@getRegister");
Route::post("/register", "AuthController@postRegister");

Route::post('/login',  'AuthController@postLogin');
Route::get('/home',  'HomeController@getHome');
Route::get('/logout',  'HomeController@getLogout');

Route::get("/preffered", "HomeController@getPrefferedWorkingHours");
Route::post("/preffered", "HomeController@postPreffered");

Route::get("/task", "HomeController@getTask");
Route::post("/task", "HomeController@postWork");

Route::get("/table", "HomeController@getTable");









