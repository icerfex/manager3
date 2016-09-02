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
Route::resource('product', 'Product\ItemController',['only'=>['index','store','edit','update','show','destroy']]);
/*************transacciones*****************/
//tranfer
Route::resource('transaction/tranfer', 'Transaction\Transfer\TranferController',['only'=>['index']]);
//entry
Route::resource('transaction/entry', 'Transaction\Entry\EntryController',['only'=>['index']]);

/*************setting*****************/
//unit
Route::resource('setting/unit', 'Setting\Unit\UnitController',['only'=>['index','store','edit','update','show','destroy']]);
//category
Route::resource('setting/category', 'Setting\Category\CategoryController',['only'=>['index','edit','store','update','show','destroy']]);
//subcategory
Route::resource('setting/subcategory', 'Setting\SubCategory\SubcategoryController',['only'=>['index','edit','store','update','show','destroy']]);
//provider
Route::resource('setting/provider', 'Setting\Provider\ProviderController',['only'=>['index','store','edit', 'update','show','destroy']]);
	Route::get('setting/provider/report/{pdf}', 'Setting\Provider\ProviderController@reportProvider');
	Route::get('setting/provider/{id}/kardex', 'Setting\Provider\KardexController@index');
//client
Route::resource('setting/client', 'Setting\Client\ClientController',['only'=>['index', 'store', 'edit', 'update', 'show', 'destroy']]);
	Route::get('setting/client/report/{pdf}', 'Setting\Client\ClientController@reportClient');
	Route::get('setting/client/{id}/kardex', 'Setting\Client\KardexController@index');
