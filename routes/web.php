<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landing.template');
});

// ============================== ADMIN ===============================

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/login', 'admin\authController@index')->name('admin.auth.login');
        Route::post('/login', 'admin\authController@postLogin')->name('admin.auth.login.post');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'admin\dashboardController@index')->name('admin.dashboard.index');
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'admin\postController@index')->name('admin.post.index');
        Route::post('/validate', 'admin\postController@validatePost')->name('admin.post.validate');
    });

    Route::group(['prefix' => 'petinformation'], function () {
        Route::get('/', 'admin\informationController@index')->name('admin.information.index');
        Route::get('/create', 'admin\informationController@create')->name('admin.information.create');
        Route::post('/create', 'admin\informationController@save')->name('admin.information.save');
    });
});


// =========================== PENGGUNA =================================
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', 'landing\authController@index')->name('pengguna.auth.login');
    Route::post('/login', 'landing\authController@postLogin')->name('pengguna.auth.postLogin');
    Route::get('/register', 'landing\authController@register')->name('pengguna.auth.register');
    Route::post('/register', 'landing\authController@postRegister')->name('pengguna.auth.postRegister');
    Route::get('/logout', 'landing\authController@logout')->name('pengguna.auth.logout');
});

Route::group(['prefix' => 'petinformation'], function () {
    Route::get('/', 'landing\informationController@index')->name('pengguna.information.index');
    Route::get('/detail/{id}', 'landing\informationController@detail')->name('pengguna.information.detail');

    Route::group(['prefix' => 'comment'], function () {
        Route::post('/save', 'landing\informationCommentController@save')->name('pengguna.information.comment.save');
        Route::post('/reply/save', 'landing\informationCommentController@reply')->name('pengguna.information.comment.reply');
    });
});

Route::group(['prefix' => 'timeline'], function () {
    Route::get('/', 'landing\liniMasaController@index')->name('pengguna.linimasa.index');
});

Route::group(['prefix' => 'account'], function () {
    Route::get('/{username}', 'landing\accountController@index')->name('pengguna.account.index');
    Route::post('/post/save', 'landing\postController@save')->name('pengguna.account.post.save');
    Route::post('/post/comment/save', 'landing\postCommentController@save')->name('pengguna.account.post.comment.save');
    Route::post('/post/comment/reply', 'landing\postCommentController@reply')->name('pengguna.account.post.comment.reply');

    Route::post('/message/save', 'landing\messageController@save')->name('pengguna.account.message.save');
});

Route::get('/message/try', 'landing\messageController@trySocket')->name('pengguna.try.soccet');
