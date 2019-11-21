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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', 'MemberController@store');
Route::get('/register', 'MemberController@create');

// Route::get('/login', 'MemberController@login');

Route::get('/home', 'MemberController@index');

Route::get('/manage/movies', 'MovieController@index');

Route::get('/manage/members', 'MemberController@index');