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
    Route::get('post-logs','PostController@postLogs')->name('post.logs');
    Route::post('post/resubmission','PostController@postResubmission')->name('post.resubmission');

    Route::resource('users','UserController');
    Route::get('notification/user','UserController@notification')->name('notification.user');
    Route::get('setting','UserController@settingForm')->name('users.setting');
    Route::post('setting','UserController@settingAction');
    Route::post('setting/change-password','UserController@changePassword')->name('change.password');
    Route::post('setting/change-profile-photo','UserController@changePhoto')->name('change.photo');
    Route::get('profile/{id}','UserController@profile')->name('profile');

    Route::resource('pages','PageController');
    Route::post('pages/{id}/change-status','PageController@updateStatus')->name('pages.status');

    Route::resource('category','CategoryController');
    Route::post('category/{id}/change-status','CategoryController@updateStatus')->name('category.status');

    Route::get('tags','PostController@tag')->name('tags');
    Route::post('tags','PostController@tagAdd')->name('tags.add');


    Route::post('logout','Auth\LoginController@logout')->name('logout');


    //Maile thapeko route haru ---// Change it as your preference


    Route::get('profile',function(){
        return view('Back.Pages.profile.profile');

    });


});


//Route::get('/home', 'HomeController@index')->name('home');
