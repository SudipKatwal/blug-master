<?php

Route::get('/', 'PublicPageController@index');
Route::get('post/{single}','PublicPageController@singlePost')->name('single');

Route::get('login','auth\LoginController@loginForm')->name('login');
Route::post('login','auth\LoginController@login');
Route::get('register','auth\RegisterController@register')->name('register');
Route::post('register','auth\RegisterController@create');




Route::group(
    [
        'prefix'=>'admin',
        'middleware'=>'auth'
    ],
    function(){
    Route::get('/','DashboardController@dashboard');
    Route::resource('posts','PostController');
    Route::post('posts/{id}/approve-post','PostController@postApprove')->name('approve.post');

    Route::resource('users','UserController');

    Route::resource('pages','PageController');
    Route::post('pages/{id}/change-status','CategoryController@updateStatus')->name('pages.status');

    Route::resource('category','CategoryController');
    Route::post('category/{id}/change-status','CategoryController@updateStatus')->name('category.status');

    Route::get('tags','PostController@tag')->name('tags');
    Route::post('tags','PostController@tagAdd')->name('tags.add');

    Route::post('logout','Auth\LoginController@logout')->name('logout');


    //Maile thapeko route haru ---// Change it as your preference

     Route::get('postlogs','PostController@postlogs');
     Route::get('WriterDash','PostController@userdash');


});


//Route::get('/home', 'HomeController@index')->name('home');
