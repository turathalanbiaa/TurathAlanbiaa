<?php
/**********************************************************************************************************************/
/******************************************************Main************************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel", "ControlPanel\\MainController@index");
Route::get("/ControlPanel/login", "ControlPanel\\MainController@login");
Route::post("/ControlPanel/validate", "ControlPanel\\MainController@validation");
Route::get("/ControlPanel/logout", "ControlPanel\\MainController@logout");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/******************************************************News************************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/news", "ControlPanel\\NewsController@index");
Route::post("/ControlPanel/news/delete", "ControlPanel\\NewsController@delete");
Route::get("/ControlPanel/news/create", "ControlPanel\\NewsController@create");
Route::post("/ControlPanel/news/create/validate", "ControlPanel\\NewsController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/****************************************************Activity**********************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/activities", "ControlPanel\\ActivityController@index");
Route::post("/ControlPanel/activity/delete", "ControlPanel\\ActivityController@delete");
Route::get("/ControlPanel/activity/create", "ControlPanel\\ActivityController@create");
Route::post("/ControlPanel/activity/create/validate", "ControlPanel\\ActivityController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/**************************************************QC Activity*********************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/qcActivities", "ControlPanel\\QCActivityController@index");
Route::post("/ControlPanel/qcActivity/delete", "ControlPanel\\QCActivityController@delete");
Route::get("/ControlPanel/qcActivity/create", "ControlPanel\\QCActivityController@create");
Route::post("/ControlPanel/qcActivity/create/validate", "ControlPanel\\QCActivityController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/**************************************************Application*********************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/applications", "ControlPanel\\ApplicationController@index");
Route::post("/ControlPanel/application/delete", "ControlPanel\\ApplicationController@delete");
Route::get("/ControlPanel/application/create", "ControlPanel\\ApplicationController@create");
Route::post("/ControlPanel/application/create/validate", "ControlPanel\\ApplicationController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/****************************************************Release***********************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/releases", "ControlPanel\\ReleaseController@index");
Route::post("/ControlPanel/release/delete", "ControlPanel\\ReleaseController@delete");
Route::get("/ControlPanel/release/create", "ControlPanel\\ReleaseController@create");
Route::post("/ControlPanel/release/create/validate", "ControlPanel\\ReleaseController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/************************************************Special Student*******************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/special-students", "ControlPanel\\SpecialStudentController@index");
Route::post("/ControlPanel/special-student/delete", "ControlPanel\\SpecialStudentController@delete");
Route::get("/ControlPanel/special-student/create", "ControlPanel\\SpecialStudentController@create");
Route::post("/ControlPanel/special-student/create/validate", "ControlPanel\\SpecialStudentController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/******************************************************FAQ*************************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/faqs", "ControlPanel\\FAQController@index");
Route::post("/ControlPanel/faq/delete", "ControlPanel\\FAQController@delete");
Route::get("/ControlPanel/faq/create", "ControlPanel\\FAQController@create");
Route::post("/ControlPanel/faq/create/validate", "ControlPanel\\FAQController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/*****************************************************Masael***********************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/masaels", "ControlPanel\\MasaelController@index");
Route::post("/ControlPanel/masael/delete", "ControlPanel\\MasaelController@delete");
Route::get("/ControlPanel/masael/create", "ControlPanel\\MasaelController@create");
Route::post("/ControlPanel/masael/create/validate", "ControlPanel\\MasaelController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/
/**********************************************************************************************************************/
/*****************************************************Studio***********************************************************/
/**********************************************************************************************************************/
Route::get("/ControlPanel/videos", "ControlPanel\\StudioController@index");
Route::post("/ControlPanel/video/delete", "ControlPanel\\StudioController@delete");
Route::get("/ControlPanel/video/create", "ControlPanel\\StudioController@create");
Route::post("/ControlPanel/video/create/validate", "ControlPanel\\StudioController@validation");
/*--------------------------------------------------------------------------------------------------------------------*/