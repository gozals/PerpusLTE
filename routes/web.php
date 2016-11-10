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
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');

Route::get('/home', 'HomeController@index');

Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');

Route::group(['prefix'=>'admin', 'middleware'=>['auth' , 'authorize']], function () {
    Route::resource('authors', 'AuthorController');
    Route::resource('books', 'BooksController');
    Route::resource('members', 'MembersController');

    Route::get('statistics', [
        'as'   => 'statistics.index',
        'uses' => 'StatisticsController@index'
    ]);

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::get('/role_permission', 'RolePermissionController@index');
    Route::post('/role_permission', 'RolePermissionController@store');

    Route::get('export/books', [
        'as'   => 'export.books',
        'uses' => 'BooksController@export'
    ]);
    Route::post('export/books', [
        'as'   => 'export.books.post',
        'uses' => 'BooksController@exportPost'
    ]);
    Route::get('template/books', [
        'as'   => 'template.books',
        'uses' => 'BooksController@generateExcelTemplate'
    ]);
    Route::post('import/books', [
        'as'   => 'import.books',
        'uses' => 'BooksController@importExcel'
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

