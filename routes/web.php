<?php

Route::get('panel', 'Panel\PanelController@index');

Route::get('/', 'Site\SiteController@index');
Route::get('promocoes', 'Site\SiteController@promotions')->name('promotions');
