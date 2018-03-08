<?php

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