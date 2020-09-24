<?php

Route::group(['prefix' => 'panel', 'namespace' => 'Panel'], function(){
    Route::any('brands/search', 'BrandController@search')->name('brands.search');
    Route::get('brands/{brand}/planes', 'BrandController@planes')->name('brands.planes');
    Route::resource('/brands', 'BrandController');

    Route::any('planes/search', 'PlaneController@search')->name('planes.search');
    Route::resource('/planes', 'PlaneController');
    
    Route::post('states/search', 'StateController@search')->name('states.search');
    Route::get('states', 'StateController@index')->name('states.index');

    Route::get('state/{initials}/cities/search', 'CityController@search')->name('state.cities.search');
    Route::get('state/{initials}/cities', 'CityController@index')->name('state.cities');

    Route::get('/', 'PanelController@index')->name('panel');
});

Route::get('/', 'Site\SiteController@index');
Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');

Auth::routes();