<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applications. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",'Website\\MainController@index');
/*********************************************/
Route::get("/all-news",'NewsController@news');
Route::get("/news",'NewsController@singleNews');
/*********************************************/
Route::get("/all-activities",'ActivityController@activities');
Route::get("/activity",'ActivityController@singleActivity');
/*********************************************/
Route::get("/all-qc-activities",'QamerCenterActivityController@activities');
Route::get("/qc-activity",'QamerCenterActivityController@singleActivity');




/*********************************************/
Route::get("/applications",'ApplicationController@applications');
Route::get("/application",'ApplicationController@application');








/*********************************************/
Route::get("/all-releases",'ReleaseController@releases');
Route::get("/release",'ReleaseController@singleRelease');

/*********************************************/
Route::get("/studio",'StudioController@index');
Route::get("/albums",'AlbumController@index');