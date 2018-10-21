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



Route::get('/admin', 'Backend\DashboardController@index')->name('backend.dashboard');
Route::get('/admin/articles', 'Backend\ArticlesController@index')->name('backend.articles');
Route::get('/admin/articles/create', 'Backend\ArticlesController@create')->name('backend.articles.create');
Route::get('/admin/articles/edit/{id}', 'Backend\ArticlesController@edit')->name('backend.articles.edit');
Route::get('/admin/articles/destroy/{id}', 'Backend\ArticlesController@destroy')->name('backend.articles.destroy');