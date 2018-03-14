<?php

Route::get("/",'Website\\MainController@index');

Route::get("/news/all",'Website\\NewsController@news');
Route::get("/news",'Website\\NewsController@singleNews');

Route::get("/activities",'Website\\ActivityController@activities');
Route::get("/activity",'Website\\ActivityController@singleActivity');

Route::get("/qc-activities",'Website\\QamerCenterActivityController@activities');
Route::get("/qc-activity",'Website\\QamerCenterActivityController@singleActivity');

Route::get("/applications",'Website\\ApplicationController@applications');
Route::get("/application",'Website\\ApplicationController@application');

Route::get("/releases",'Website\\ReleaseController@releases');
Route::get("/release/download", 'Website\\ReleaseController@download');

/*********************************************/
Route::get("/studio",'Website\\StudioController@index');
Route::get("/albums",'Website\\AlbumController@index');