<?php

use Illuminate\Support\Facades\Route;

Route::get('index', 'ClientController@index');
Route::get('add', 'ClientController@create');
Route::post('store', 'ClientController@store');
Route::get('edit/{client_edit}', 'ClientController@show');
Route::delete('delete/{client_delete}', 'ClientController@destroy');
Route::patch('update/{client_update}', 'ClientController@update');
