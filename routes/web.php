<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', 'listController@index');

Route::post('list', 'listController@store'); // as it receives data from JAVASCRIPT