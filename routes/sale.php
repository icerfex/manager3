<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*************pagina principal*****************/
Route::get('/', 'Home\HomeController@index');
/*************setting*****************/
Route::resource('setting/employee', 'Setting\Employee\EmployeeController',['only'=>['index', 'store', 'edit', 'update', 'show', 'destroy']]);
