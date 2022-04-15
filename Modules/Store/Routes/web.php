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

Route::prefix('store')->group(function() {
    Route::get('/', 'StoreController@index')->name('store.index');
    Route::get('/login', 'StoreController@login')->name('store.login');
    Route::post('/auth', 'StoreController@auth')->name('store.auth');
    Route::post('/add/car', 'StoreController@addCar')->name('store.add.car');
    Route::get('/car/number', 'StoreController@countItemsCar')->name('count.items.car');
    Route::get('/car', 'StoreController@car')->name('car.index');
    Route::get('/car/process', 'StoreController@processCar')->name('car.process');
    Route::get('/car/delete/{id?}', 'StoreController@deleteCar')->name('car.delete');
});

