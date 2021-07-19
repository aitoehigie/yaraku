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

Route::resource('books', BookController::class);
Route::get('search', 'SearchController@search')->name('search');
Route::get('downloads', 'DataExportController@index');
Route::get('downloads/csv/{data_type}', 'DataExportController@download_csv');
Route::get('downloads/xml/{data_type}', 'DataExportController@download_xml');