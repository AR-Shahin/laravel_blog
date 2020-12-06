<?php

use Illuminate\Support\Facades\Route;



Route::get('blog-login','backend\LoginController@index')->name('login');
Route::get('control_panel','backend\LoginController@index')->name('control_panel');

//frontend routes---------------------------------------------
Route::get('/','frontend\HomeController@index')->name('home');
Route::get('blog','frontend\BlogController@index')->name('blog');
Route::get('single-post/{slug?}','frontend\BlogController@singlePost')->name('single.post');
//Route::get('log','frontend\UserController@logout')->name('logout');

Route::get('category/{cat_name}','frontend\BlogController@categoryWisePost')->name('cat.post');
Route::get('tag/{tag_name}','frontend\BlogController@tagWisePost')->name('tag.post');


#Contact Routes
Route::get('contact','frontend\ContactController@index')->name('contact');
Route::post('storeMailFromUsers','frontend\ContactController@storeMailFromUsers')->name('storeMailFromUsers');

#Comment Routes
Route::post('store/comment','frontend\CommentController@commentStore')->name('store.comment');
#Users Routes
Route::prefix('users')->group(function () {
    Route::get('profile','frontend\UserController@index')->name('users.profile')->middleware('auth:user');

    Route::get('login','frontend\LoginController@showLoginForm')->name('users.login');
    Route::post('login','frontend\LoginController@login')->name('user.login');
    Route::post('logout', 'frontend\LoginController@logout')->name('user.logout');
    Route::get('registration','frontend\UserController@registration')->name('users.registration');
    Route::post('registration','frontend\UserController@store')->name('users.registration');
});

//backend routes-------------------------------------------------------
//Route::get('admin/login','backend\LoginController@index')->name('login.admin');
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::group(['middleware' => 'auth'],function (){
    #Auth Routes
    Route::post('admin/logout','Auth\LoginController@logout')->name('admin.logout');

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

#SiteIdentity Routes
    Route::get('site-identity','backend\SiteController@index')->name('site.identity');
    Route::post('site-identity','backend\SiteController@store')->name('site.identity');
    Route::post('site/update','backend\SiteController@update')->name('site.update');

#SocialLinks Routes
    Route::get('social/link','backend\SocialLinksController@index')->name('social.link');
    Route::post('social/link','backend\SocialLinksController@store')->name('social.link');
    Route::post('social/update','backend\SocialLinksController@update')->name('social.update');

    #Admins Routes
    Route::get('admin/index','backend\AdminController@index')->name('admin.index');
    Route::get('admin/create','backend\AdminController@addNewAdmin')->name('admin.create');
    Route::post('admin/store','backend\AdminController@storeNewAdmin')->name('admin.store');
    Route::put('admin/edit/email/{id}','backend\AdminController@editEmail')->name('admin.email.edit');

    Route::get('admin/profile','backend\AdminController@profile')->name('admin.profile');
    Route::get('admin/update','backend\AdminController@update')->name('admin.update');
    Route::post('admin/update','backend\AdminController@updateProfile')->name('admin.update');
    Route::post('admin/change/password','backend\AdminController@changePassword')->name('admin.change.password');

    //admin status
    Route::get('admin/block/{id}','backend\AdminController@blockAdmin')->name('admin.block');
    Route::get('admin/unblock/{id}','backend\AdminController@unblockAdmin')->name('admin.unblock');
    Route::get('admin/promote/{id}','backend\AdminController@promoteAdmin')->name('admin.promote');
    Route::get('admin/demote/{id}','backend\AdminController@demoteAdmin')->name('admin.demote');
    Route::get('admin/delete/{id}','backend\AdminController@deleteAdmin')->name('admin.delete');

});
