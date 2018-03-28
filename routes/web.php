<?php

Route::get('/', function () {
    return view('welcome');
});


Route::group(
    [
        'prefix'=>'admin'
    ],
    function(){
    Route::get('/','DashboardController@dashboard');
    Route::resource('posts','PostController');
});
