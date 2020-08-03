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

// Route::get('/', function () {
//     return view('welcome');
// });
//Display all albums from DB
Route::get('/', 'FrontendController@index');

Auth::routes();

//
Route::get('/home', 'HomeController@index')->name('home');

//list all albums
Route::get('/albums', 'AlbumController@index')->middleware('auth');
//albums of an user

Route::get('/getalbums', 'AlbumController@getAlbums')->middleware('auth');

Route::get('/albums/create', 'AlbumController@create')->name('album.create')->middleware('auth');


//Album Create 
Route::post('/albums/store', 'AlbumController@store')->middleware('auth');
//
Route::put('albums/{id}/edit', 'AlbumController@update')->middleware('auth');
//delete
Route::delete('/albums/{id}/delete', 'AlbumController@destroy')->middleware('auth');
//upload Component
Route::get('upload/images/{id}', 'GalleryController@create')->middleware('auth');
//
Route::post('uploadImage', 'GalleryController@upload')->middleware('auth');
//
Route::get('getimages', 'GalleryController@images');
//Delete image in Album
Route::delete('/image/{id}', 'GalleryController@destroy')->middleware('auth');
//
Route::get('/albums/{slug}/{id}', 'GalleryController@viewAlbum')->name('view.album');



//

//List all album of user
Route::post('/follow', "FollowController@followUnfollow");
