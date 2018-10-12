<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', 'listController@index');

Route::post('list', 'listController@store'); // as it receives data from JAVASCRIPT

Route::post('delete', 'listController@delete1'); // as it receives data from JAVASCRIPT

Route::post('update', 'listController@update'); // as it receives data from JAVASCRIPT

Route::get('search', 'listController@search'); // as it receives data from JAVASCRIPT