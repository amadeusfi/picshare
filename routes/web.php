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
    return view('welcome');
});

Auth::routes();

//
Route::get('/home', 'HomeController@index')->name('home');
//Album Create 
Route::get('/albums/create', 'AlbumController@create')->middleware('auth');

Route::post('/albums/store', 'AlbumController@store')->middleware('auth');
//list all albums
Route::get('/albums', 'AlbumController@index')->middleware('auth');
//albums of an user

Route::get('/getalbums', 'AlbumController@getAlbums')->middleware('auth');

Route::get('/albums/create', 'AlbumController@create')->name('album.create')->middleware('auth');
//
Route::put('albums/{id}/edit', 'AlbumController@update')->middleware('auth');
