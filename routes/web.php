<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', function () {
    return view('list');
});
