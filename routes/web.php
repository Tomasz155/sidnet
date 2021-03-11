<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\AuthorController@dashboard');

Route::get('/authors', 'App\Http\Controllers\AuthorController@index');
Route::get('/authors/add', 'App\Http\Controllers\AuthorController@create');
Route::post('/authors', 'App\Http\Controllers\AuthorController@store');
Route::get('/authors/edit/{authorId}', 'App\Http\Controllers\AuthorController@edit');
Route::post('/authors/edit', 'App\Http\Controllers\AuthorController@update');
Route::get('/authors/delete/{authorId}', 'App\Http\Controllers\AuthorController@destroy');

Route::get('/publishers', 'App\Http\Controllers\PublisherController@index');
Route::get('/publishers/add', 'App\Http\Controllers\PublisherController@create');
Route::post('/publishers', 'App\Http\Controllers\PublisherController@store');
Route::get('/publishers/edit/{publisherId}', 'App\Http\Controllers\PublisherController@edit');
Route::post('/publishers/edit', 'App\Http\Controllers\PublisherController@update');
Route::get('/publishers/delete/{publisherId}', 'App\Http\Controllers\PublisherController@destroy');

Route::get('/books', 'App\Http\Controllers\BookController@index');
Route::get('/books/add', 'App\Http\Controllers\BookController@create');
Route::post('/books', 'App\Http\Controllers\BookController@store');
Route::get('/books/edit/{bookId}', 'App\Http\Controllers\BookController@edit');
Route::post('/books/edit', 'App\Http\Controllers\BookController@update');
Route::get('/books/delete/{bookId}', 'App\Http\Controllers\BookController@destroy');
