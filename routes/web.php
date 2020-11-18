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




