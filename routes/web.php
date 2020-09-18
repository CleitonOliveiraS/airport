<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function(){
    Route::get('/', 'PanelController@index')->name('panel');
    Route::resource('/brands', 'BrandController');
});

Route::get('/', 'Site\SiteController@index');
Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();