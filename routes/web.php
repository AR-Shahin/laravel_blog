<?php

use Illuminate\Support\Facades\Route;



Route::get('login','backend\LoginController@index')->name('login');

//frontend routes
Route::get('/','frontend\HomeController@index')->name('home');
Route::get('blog','frontend\BlogController@index')->name('blog');
Route::get('single/post','frontend\BlogController@singlePost')->name('single.post');


//backend routes
Route::get('dashboard','backend\DashboardController@index')->name('dashboard');


