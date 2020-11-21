<?php

use Illuminate\Support\Facades\Route;



Route::get('login','backend\LoginController@index')->name('login');
Route::get('admin','backend\DashboardController@index')->name('admin');

//frontend routes---------------------------------------------
Route::get('/','frontend\HomeController@index')->name('home');
Route::get('blog','frontend\BlogController@index')->name('blog');
Route::get('single/post','frontend\BlogController@singlePost')->name('single.post');


//backend routes-------------------------------------------------------
#Dashboard Routes
Route::get('dashboard','backend\DashboardController@index')->name('dashboard');

#Slider Routes
Route::resource('slider','backend\SliderController')->except(['edit','show']);
Route::get('slider/inactive/{id}','backend\SliderController@sliderInactive')->name('slider.inactive');
Route::get('slider/active/{id}','backend\SliderController@sliderActive')->name('slider.active');

#About us Routes
Route::get('about-us','backend\AboutUsController@index')->name('about-us');
Route::post('about-us/{id}','backend\AboutUsController@update')->name('about-us-update');
Route::post('about/store','backend\AboutUsController@store')->name('about.store');
Route::get('about/destroy/{id}','backend\AboutUsController@destroy')->name('about.destroy');

#Category Routes
Route::resource('category','backend\CategoryController')->except(['create']);

#Post Routes
Route::get('post/index','backend\PostController@index')->name('post.index');
Route::get('post/create','backend\PostController@create')->name('post.create');
Route::post('post/create','backend\PostController@store')->name('post.create');

Route::get('post/inactive/{id}','backend\PostController@inactivePost')->name('post.inactive');
Route::get('post/active/{id}','backend\PostController@activePost')->name('post.active');
Route::get('post/show/{id}','backend\PostController@show')->name('post.show');
Route::get('post/edit/{id}','backend\PostController@edit')->name('post.edit');
Route::post('post/update/{id}','backend\PostController@update')->name('post.update');
Route::get('post/destroy/{id}','backend\PostController@destroy')->name('post.destroy');





