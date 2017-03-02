<?php

use App\Adherent;
use App\Order;
use Carbon\Carbon;

Auth::routes();

Route::get('/', 'GuestController@index')->name('home');

Route::group(['prefix' => 'parent'], function () {
    Route::get('/', 'ParentController@index')->name('parent.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource('adherents', 'AdherentController', ['as' => 'admin']);
    Route::get('/orders', 'AdminController@orders')->name('admin.orders');
    Route::get('/books', 'AdminController@books')->name('admin.books');
});

Route::group(['prefix' => 'test'], function () {
    Route::get('/', 'TestController@index')->name('test.index');
    Route::get('/antoine', 'TestController@antoine')->name('admin');
});