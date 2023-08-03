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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'RatingMemberController@index')->name('rating_members');;
Route::get('/create', 'RatingMemberController@create')->name('rating_members.create');
Route::post('/store', 'RatingMemberController@store')->name('rating_members.store');
Route::get('/show', 'RatingMemberController@show')->name('rating_members.show');
Route::get('/edit', 'RatingMemberController@edit')->name('rating_members.edit');
Route::get('/destroy', 'RatingMemberController@destroy')->name('rating_members.destroy');

