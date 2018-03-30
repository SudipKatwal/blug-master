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
    Route::get('post/{id}/delete','PostController@postDelete')->name('delete.post');

    Route::get('category','PostController@category')->name('category');
    Route::post('category','PostController@categoryAdd')->name('category.add');
    Route::get('tags','PostController@tag')->name('tags');
    Route::post('tags','PostController@tagAdd')->name('tags.add');

    Route::post('logout','Auth\LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');
