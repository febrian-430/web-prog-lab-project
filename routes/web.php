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

use App\Http\Controllers\SavedMovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    Route::post('/register', 'MemberController@store');
    Route::get('/register', 'MemberController@create');
});
// Route::get('/login', 'MemberController@login');


Route::group(['middleware' => ['admin']], function () {
    Route::prefix('/manage')->group(function () {



        Route::group(['prefix' => 'genres'], function(){
            Route::get('/', 'GenreController@index');
            Route::get('/add', 'GenreController@create');
            Route::post('/add', 'GenreController@store');
            Route::get('/{genre}', 'GenreController@show');

            Route::get('/{genre}/edit', 'GenreController@edit');
            Route::put('/{genre}', 'GenreController@update');

            Route::delete('/{genre}','GenreController@destroy');
        });

        Route::group(['prefix' => 'members'], function(){
            Route::get('/', 'MemberController@index');
            Route::get('/add', 'MemberController@create');
            Route::post('/add', 'MemberController@store');
            Route::get('/{member}', 'MemberController@show');

            Route::get('/{member}/edit', 'MemberController@edit');
            Route::put('/{member}', 'MemberController@update');

            Route::delete('/{member}', 'MemberController@destroy');
        });

        Route::group(['prefix' => 'movies'], function () {
            Route::get('/', 'MovieController@index');
            Route::get('/add', 'MovieController@create');
            Route::post('/add', 'MovieController@store');
            Route::get('/{movie}', 'MovieController@show');

            Route::get('/{movie}/edit', 'MovieController@edit');
            Route::put('/{movie}', 'MovieController@update');

            Route::delete('/{movie}', 'MovieController@destroy');
        });
    });
});



Auth::routes(['register' => false]);

Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/{movie}', 'SavedMovieController@store');
    Route::delete('/{movie}', 'SavedMovieController@destroy');
});


Route::group(['prefix' => 'inbox'], function () {
    Route::get('/', 'MessageController@index');
    Route::delete('/{message}', 'MessageController@destroy');
});

Route::group(['prefix' => 'member'], function () {
    Route::get('/{member}', 'MemberController@show')->name('member');
    Route::post('/{member}', 'MessageController@store');

    Route::get('/{member}/edit', 'MemberController@edit_self');
    Route::post('/{member}/edit', 'MemberController@update_self');
});

Route::group(['prefix' => 'movie'], function () {
    Route::get('/{movie}', 'MovieController@show')->name('movie');
    Route::post('/{movie}', 'CommentController@store');
    Route::delete('/{movie}/{comment}/delete', 'CommentController@destroy');

    Route::post('/{movie}/save', 'SavedMovieController@storeFromShow');
    Route::delete('/{movie}/unsave', 'SavedMovieController@destroyFromShow');
});

Route::group(['prefix' => 'saved'], function () {
    Route::get('/', 'SavedMovieController@index');
    Route::delete('/{movie}', 'SavedMovieController@destroy');
});




