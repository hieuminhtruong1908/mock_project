<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');

Route::group(['middleware' => ['authMiddle', 'autoLogout']], function () {

    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/logout', 'UserController@logout')->name('logout');

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile/{idUser}', 'UserController@update')->name('profile.upload');

    Route::group(['prefix' => '/group'], function () {
        Route::get('/{idCourse}', 'GroupController@list')->name('group.list');
        Route::post('/{idCourse}', 'GroupController@create');
        Route::get('/home/{id}','GroupController@home')->name('group.detail');
        Route::post('/home/uploadavatar/{id}','GroupController@uploadAvatar')->name('group.uploadAvatar');
        Route::post('/home/uploadcover/{id}','GroupController@uploadCover')->name('group.uploadCover');
    });

    Route::group(['prefix' => 'content'],function (){
        Route::post('/add/{id}','ContentController@add')->name('content.add');
    });

    Route::group(['prefix' => 'course'], function () {
        Route::get('/', 'CourseController@list');
        Route::post('/create', 'CourseController@create')->name('course.create');
        Route::post('/edit/{id}','CourseController@edit')->name('editCourse');
    });

    Route::group(['prefix' => 'member'], function () {
        Route::get('/', 'MemberController@list')->name('member.list');
    });


});

Route::group(['prefix' => '/login', 'as' => 'login.'], function () {
    Route::get('/google', 'Auth\LoginController@redirectToProvider')->name('google.social');
    Route::get('/google/callback', 'Auth\LoginController@handleProviderCallback');
});


