<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::resource('products', 'ProductsController');

Route::group(['prefix' => 'admin'], function(){
	Route::resource('norakstits', 'NorakstitsController');
	Route::resource('users', 'UserController');
	Route::resource('inventars', 'InventarController');
});

Auth::routes();