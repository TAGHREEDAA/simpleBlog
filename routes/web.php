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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::group(['middleware' => ['admin'], 'prefix' => 'admin/', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('posts', 'PostsController');
    Route::resource('categories','CategoriesController');
    Route::get('datatables/posts','PostsController@getAjaxData')->name('datatables.posts');
    Route::get('datatables/categories','CategoriesController@getAjaxData')->name('datatables.categories');
});


Route::get('/', 'HomeController@index')->name('home');

Route::resource('categories','CategoriesController');
Route::resource('posts','PostsController');
