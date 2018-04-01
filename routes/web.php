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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
[
    'prefix' => 'asset_categories',
], function () {

    Route::get('/', 'AssetCategoriesController@index')
         ->name('asset_categories.asset_category.index');

    Route::get('/create','AssetCategoriesController@create')
         ->name('asset_categories.asset_category.create');

    Route::get('/show/{assetCategory}','AssetCategoriesController@show')
         ->name('asset_categories.asset_category.show')
         ->where('id', '[0-9]+');

    Route::get('/{assetCategory}/edit','AssetCategoriesController@edit')
         ->name('asset_categories.asset_category.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'AssetCategoriesController@store')
         ->name('asset_categories.asset_category.store');
               
    Route::put('asset_category/{assetCategory}', 'AssetCategoriesController@update')
         ->name('asset_categories.asset_category.update')
         ->where('id', '[0-9]+');

    Route::delete('/asset_category/{assetCategory}','AssetCategoriesController@destroy')
         ->name('asset_categories.asset_category.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'users',
], function () {

    Route::get('/', 'UsersController@index')
         ->name('users.user.index');

    Route::get('/create','UsersController@create')
         ->name('users.user.create');

    Route::get('/show/{user}','UsersController@show')
         ->name('users.user.show')
         ->where('id', '[0-9]+');

    Route::get('/{user}/edit','UsersController@edit')
         ->name('users.user.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'UsersController@store')
         ->name('users.user.store');
               
    Route::put('user/{user}', 'UsersController@update')
         ->name('users.user.update')
         ->where('id', '[0-9]+');

    Route::delete('/user/{user}','UsersController@destroy')
         ->name('users.user.destroy')
         ->where('id', '[0-9]+');

});
