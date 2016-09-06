<?php
	
Route::get('/', 'Home\HomeController@index');

Route::resource('profile', 'Profile\ProfileController',['only'=>['index','store','edit','update','show','destroy']]);
Route::resource('bussiness', 'Business\BusinessController',['only'=>['index','store','edit','update','show','destroy']]);


Route::resource('setting/bussiness', 'Setting\Business\BusinessController',['only'=>['index','store','edit','update','show','destroy']]);
Route::resource('setting/branch-office', 'Setting\Business\BranchOfficeController',['only'=>['index','store','edit','update','show','destroy']]);


Route::resource('setting/users', 'Setting\Profile\ProfileListController',['only'=>['index','store','edit','update','show','destroy']]);

