<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () {
    Route::resource('authors', 'AuthorController');
    Route::resource('books', 'BooksController');
    Route::resource('members', 'MembersController');

    Route::get('statistics', [
        'as'   => 'statistics.index',
        'uses' => 'StatisticsController@index'
    ]);
});

Route::get('books/{book}/borrow', [
    'middleware' => ['auth'],
    'as'         => 'guest.books.borrow',
    'uses'       => 'BooksController@borrow'
]);

Route::put('books/{book}/return', [
    'middleware' => ['auth'],
    'as'         => 'member.books.return',
    'uses'       => 'BooksController@returnBack'
]);

