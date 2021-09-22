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

Route::get('/', 'landing\homeController@index')->name('home');

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
        Route::get('/create', 'admin\postController@create')->name('admin.post.create');
        Route::post('/create', 'admin\postController@save')->name('admin.post.save');
        Route::post('/validate', 'admin\postController@validatePost')->name('admin.post.validate');
    });

    Route::group(['prefix' => 'petinformation'], function () {
        Route::get('/', 'admin\informationController@index')->name('admin.information.index');
        Route::get('/create', 'admin\informationController@create')->name('admin.information.create');
        Route::post('/create', 'admin\informationController@save')->name('admin.information.save');
        Route::get('/edit/{id}', 'admin\informationController@edit')->name('admin.information.edit');
        Route::patch('/update/{id}', 'admin\informationController@update')->name('admin.information.update');
        Route::delete('/delete', 'admin\informationController@delete')->name('admin.information.delete');
    });

    Route::group(['prefix' => 'adopt'], function () {
        Route::get('/', 'admin\adoptController@index')->name('admin.adopt.index');
        Route::get('/submission', 'admin\adoptController@listSubmission')->name('admin.adopt.submission.index');
        Route::post('/submission/validate', 'admin\adoptController@validateSubmission')->name('admin.adopt.submission.validate');
    });

    Route::group(['prefix' => 'message'], function () {
        Route::get('/', 'admin\messageController@index')->name('admin.message.index');
        Route::post('/save', 'admin\messageController@save')->name('admin.message.save');
        Route::get('/fetch/{room_id}', 'admin\messageController@fetchByRoom')->name('admin.message.fetch.byroom');
        Route::post('/validate', 'admin\messageController@validatemessage')->name('admin.message.validate');
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

Route::group(['prefix' => 'adopt'], function () {
    Route::get('/form', 'landing\adoptController@showForm')->name('pengguna.adopt.form');
    Route::post('/form', 'landing\adoptController@saveForm')->name('pengguna.adopt.form.save');
});

Route::group(['prefix' => 'account'], function () {
    Route::get('/{username}', 'landing\accountController@index')->name('pengguna.account.index');
    Route::get('/profile/{username}', 'landing\accountController@profile')->name('pengguna.account.profile');
    Route::post('/profile/{username}', 'landing\accountController@postProfile')->name('pengguna.account.profile.save');

    Route::post('/post/save', 'landing\postController@save')->name('pengguna.account.post.save');
    Route::post('/post/comment/save', 'landing\postCommentController@save')->name('pengguna.account.post.comment.save');
    Route::post('/post/comment/reply', 'landing\postCommentController@reply')->name('pengguna.account.post.comment.reply');

    Route::post('/message/save', 'landing\messageController@save')->name('pengguna.account.message.save');
    Route::get('/message/fetchall', 'landing\messageController@fetchAll')->name('pengguna.account.message.fetchall');

    Route::get('/adopt/list', 'landing\adoptController@index')->name('pengguna.adopt.index');
    Route::get('/adopt/list/submission', 'landing\adoptController@listSubmission')->name('pengguna.adopt.index.submission.list');
    Route::post('/adopt/list/submission/jemput', 'landing\adoptController@Jemput')->name('pengguna.adopt.index.submission.jemput');
    Route::post('/adopt/list/submission/validatejemput', 'landing\adoptController@validateJemput')->name('pengguna.adopt.index.submission.validatejemput');
    Route::post('/adopt/list/submission/accept', 'landing\adoptController@acceptSubmission')->name('pengguna.adopt.index.submission.accept');

    Route::get('/adopt/mysubmission', 'landing\adoptController@userSubmissions')->name('pengguna.adopt.submission.index');

    Route::get('/animalsave/list', 'landing\animalSaveController@index')->name('pengguna.animalsave.index');
    Route::post('/animalsave/statusupdate', 'landing\animalSaveController@statusUpdate')->name('pengguna.animalsave.updatestatus');
});

Route::get('/message/try', 'landing\messageController@trySocket')->name('pengguna.try.soccet');
