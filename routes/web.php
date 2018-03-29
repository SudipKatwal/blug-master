<?php

Route::get('/', function () {
    return view('front.pages.index');
});
Route::get('login', function () {
    return view('front.pages.login');
});
Route::get('single', function () {
    return view('front.pages.single');
});


Route::group(
    [
        'prefix'=>'admin'
    ],
    function(){
    Route::get('/','DashboardController@dashboard');
    Route::resource('posts','PostController');
});
