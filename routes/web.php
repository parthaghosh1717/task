<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Admin Dashboard....
Route::get('/admin-dashboard', 'DashboardController@adminDashboard')->name('admin.dahboard');

// publishers Routs....
Route::get('/publishers-list', 'Publishers\PublishersController@publishersList')->name('publishers.list');
Route::get('/add-publishers', 'Publishers\PublishersController@create')->name('add.publishers');
Route::post('store-publishers','Publishers\PublishersController@store')->name('store.publishers');
Route::get('edit-publishers/{id?}','Publishers\PublishersController@edit')->name('edit.publisher');
Route::get('delete-publishers/{id?}','Publishers\PublishersController@destroy')->name('delete.publisher');


// Books Routs....
Route::get('/books-list', 'Books\BooksController@booksList')->name('books.list');
Route::get('/add-books', 'Books\BooksController@create')->name('add.books');
Route::post('store-book','Books\BooksController@store')->name('store.book');
Route::get('book-details/{id?}','Books\BooksController@show')->name('view.book');
Route::get('edit-book/{id?}','Books\BooksController@edit')->name('edit.book');
Route::get('delete-book/{id?}','Books\BooksController@destroy')->name('delete.book');




