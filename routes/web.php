<?php

Route::get('panel', 'Panel\PanelController@index');

Route::get('/', function () {
    return view('welcome');
    
});
