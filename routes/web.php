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

Auth::routes();

Route::get('/', 'PagesController@index')->name('home');
Route::get('/home', 'PagesController@index')->name('homepage');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::post('/contact', 'PagesController@sendMessage')->name('sendMessage');
Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/articles/{id}', 'ArticlesController@show')->name('show')->where('id', '[0-9]+');
Route::get('/author/{name}', 'ArticlesController@author')->name('author');
Route::get('/articles/search', 'ArticlesController@search')->name('search');

//=> Backend Routes
Route::middleware(['auth'])->prefix('admin')->namespace('Backend')->group(function () {
    Route::get('/', 'DashboardController@index')->name('backend.dashboard');

    Route::prefix('articles')->group(function () {
        Route::get('/', 'ArticlesController@index')->name('backend.articles');
        Route::get('/create', 'ArticlesController@create')->name('backend.articles.create');
        Route::post('/store', 'ArticlesController@store')->name('backend.articles.store');
        Route::get('/edit/{id}', 'ArticlesController@edit')->name('backend.articles.edit');
        Route::post('/update/{id}', 'ArticlesController@update')->name('backend.articles.update');
        Route::get('/destroy/{id}', 'ArticlesController@destroy')->name('backend.articles.destroy');
    });
});