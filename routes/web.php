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

Route::get("/task/{project_id}", "HomeController@getTask");
Route::post("/task/{project_id}", "HomeController@postWork");

Route::get("/table", "HomeController@getTable");

Route::get("/profile", "HomeController@getProfile");
Route::post("/profile", "HomeController@postProfile");

Route::get("/table-tasks", "HomeController@getTableTasks");
Route::get("/table-tasks/delete/{id}", "HomeController@getDeleteTask");

Route::get("/edit/{id}", "HomeController@getEdit");
Route::post("/edit/{id}", "HomeController@postEdit");

Route::get("/admin/users", "AdminController@getUsers");

Route::get("/admin/edit_user/{id}", "AdminController@getEditUser");
Route::post("/admin/edit_user/{id}", "AdminController@postEditUser");

Route::get("/admin/users/delete/{id}", "AdminController@getDeleteUser");

Route::get("/change-profile-picture", "HomeController@getProfilePicture");
Route::post("/change-profile-picture", "HomeController@postProfilePicture");

Route::get("/project", "HomeController@getProject");
Route::post("/project", "HomeController@postProject");

Route::get("/open_project/{project_id}", "HomeController@getOpenProject");

Route::get("/home/{project_id}", "HomeController@getDeleteProject");

Route::get("/edit_project/{project_id}", "HomeController@getEditProject");
Route::post("/edit_project/{project_id}", "HomeController@postEditProject");

Route::post("/open_project/add-user/{project_id}", "HomeController@postAddUser");

Route::get("/open_project/kick/{user_project_id}", "HomeController@getKickUser");






































