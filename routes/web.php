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

Route::get("/all-news",'Website\\NewsController@news');
Route::get("/news",'Website\\NewsController@singleNews');

Route::get("/all-activities",'Website\\ActivityController@activities');
Route::get("/activity",'Website\\ActivityController@singleActivity');

Route::get("/all-qc-activities",'Website\\QamerCenterActivityController@activities');
Route::get("/qc-activity",'Website\\QamerCenterActivityController@singleActivity');

Route::get("/applications",'Website\\ApplicationController@applications');
Route::get("/application",'Website\\ApplicationController@application');












/*********************************************/
Route::get("/all-releases",'Website\\ReleaseController@releases');
Route::get("/release",'Website\\ReleaseController@singleRelease');

/*********************************************/
Route::get("/studio",'Website\\StudioController@index');
Route::get("/albums",'Website\\AlbumController@index');