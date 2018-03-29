<?php

Route::get('/', function () {
    return view('welcome');
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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
