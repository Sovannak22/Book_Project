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
//     return view('home_page');
// })->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('books','BookController');
Route::get('/missstore','BookController@erroMissingStore');
Route::get('/searchBooks','BookController@search');
// Book by ajax with category id
Route::get('/productCat','BookController@booksCategory');
Route::resource('stores','StoreController');
Route::get('/managestore/{id}','StoreController@manage');

// Cart Route
Route::get('/addBookToCart','CartController@addBookToCart');
Route::get('/cart','CartController@show');



Route::get('/test',function(){
    return view('layouts.store_2');
});



Route::get('/', 'PostController@index')->name('feeds')->middleware('auth');

Route::post('/store', 'PostController@store')->name('feeds.store');
Route::get('/post/{id}', 'PostController@show')->name('feeds.show');
Route::get('/like/{id}', 'PostController@like')->name('feeds.like');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
