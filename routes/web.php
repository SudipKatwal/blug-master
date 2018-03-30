<?php

Route::get('/', function () {
    return view('front.pages.index');
});
Route::get('login','auth\LoginController@loginForm');
Route::post('login','auth\LoginController@login');

Route::get('single', function () {
    return view('front.pages.single');
});


Route::group(
    [
        'prefix'=>'admin',
        'middleware'=>'auth'
    ],
    function(){
    Route::get('/','DashboardController@dashboard');
    Route::resource('posts','PostController');
    Route::post('posts/{id}/approve-post','PostController@postApprove')->name('approve.post');

    Route::resource('category','CategoryController');
    Route::post('category/{id}/change-status','CategoryController@updateStatus')->name('category.status');

    Route::get('tags','PostController@tag')->name('tags');
    Route::post('tags','PostController@tagAdd')->name('tags.add');

    Route::post('logout','Auth\LoginController@logout')->name('logout');
});

//Route::get('/home', 'HomeController@index')->name('home');
