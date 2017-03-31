<?php

use App\Adherent;
use App\Order;
use Carbon\Carbon;

Auth::routes();

/**
 * Not logged in
 */
Route::get('/', 'GuestController@index')->name('home');
Route::group(['prefix' => 'password'], function () {
    Route::get('/create/{token}', 'PasswordController@create')->name('password.create');
});

/**
 * Logged in as PARENT
 */
Route::group(['prefix' => 'parent'], function () {
    Route::get('/', 'ParentController@index')->name('parent.index');
});

/**
 * Logged in as ADMIN
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource('adherents', 'AdherentController', ['as' => 'admin']);
    Route::resource('orders', 'OrderController', ['as' => 'admin']);
    Route::resource('books', 'BooksController', ['as' => 'admin']);
    Route::resource('configuration', 'ConfigurationController', ['as' => 'admin']);

    Route::resource('contribution', 'ContributionController', ['as' => 'admin']);
});

/**
 * TEST ROUTES
 */
Route::group(['prefix' => 'test'], function () {
    Route::get('/', 'TestController@index')->name('test.index');
});