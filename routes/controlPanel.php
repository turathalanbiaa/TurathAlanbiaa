<?php

Route::get("/ControlPanel", "ControlPanel\\MainController@index");
Route::get("/ControlPanel/login", "ControlPanel\\MainController@login");
Route::post("/ControlPanel/validate", "ControlPanel\\MainController@validation");
Route::get("/ControlPanel/logout", "ControlPanel\\MainController@logout");


Route::get("/ControlPanel/news", "ControlPanel\\NewsController@index");
Route::post("/ControlPanel/news/delete", "ControlPanel\\NewsController@delete");
Route::get("/ControlPanel/news/create", "ControlPanel\\NewsController@create");
Route::post("/ControlPanel/news/create/validate", "ControlPanel\\NewsController@validation");


Route::get("/ControlPanel/activity", "ControlPanel\\ActivityController@index");
Route::post("/ControlPanel/activity/delete", "ControlPanel\\ActivityController@delete");
Route::get("/ControlPanel/activity/create", "ControlPanel\\ActivityController@create");
Route::post("/ControlPanel/activity/create/validate", "ControlPanel\\ActivityController@validation");


Route::get("/ControlPanel/qcActivity", "ControlPanel\\QCActivityController@index");
Route::post("/ControlPanel/qcActivity/delete", "ControlPanel\\QCActivityController@delete");
Route::get("/ControlPanel/qcActivity/create", "ControlPanel\\QCActivityController@create");
Route::post("/ControlPanel/qcActivity/create/validate", "ControlPanel\\QCActivityController@validation");