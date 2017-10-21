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

//Route::get('/', function () {return view('list');});
Route::get ("/", ["as" => "list", "uses" => "TeamController@getUserLists"]);
Route::get ("team/new", ["as" => "team-new", "uses" => "TeamController@prepareNewTeam"]);
Route::post ("team/new", ["as" => "team-new", "uses" => "TeamController@addTeam"]);
Route::post("delete/{id}",["as" => "user-delete", "uses" => "TeamController@deleteUser"]);
Route::post("delete/team/{id}", ["as" => "team-delete", "uses" => "TeamController@deleteTeam"]);
Route::get ("users/new", ["as" => "user-new", "uses" => "TeamController@prepareNewUser"]);
Route::post ("users/new", ["as" => "user-new", "uses" => "TeamController@newUser"]);

