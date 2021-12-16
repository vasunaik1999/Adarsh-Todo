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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Todo routes
Route::get('/todo','App\Http\Controllers\TodoController@index')->name('todo.index');
Route::get('/todo/create','App\Http\Controllers\TodoController@create')->name('todo.create');
Route::post('/todo/store','App\Http\Controllers\TodoController@store')->name('todo.store');
Route::get('/todo/{todo}/edit','App\Http\Controllers\TodoController@edit')->name('todo.edit');
Route::put('/todo/{todo}/update','App\Http\Controllers\TodoController@update')->name('todo.update');
Route::get('/todo/{todo}/delete','App\Http\Controllers\TodoController@destroy')->name('todo.delete');
Route::get('/todo/{todo}/mark-complete','App\Http\Controllers\TodoController@markComplete')->name('todo.mark.complete');
Route::get('/todo/{todo}/mark-incomplete','App\Http\Controllers\TodoController@markIncomplete')->name('todo.mark.incomplete');
Route::get('/todo/deleted-records','App\Http\Controllers\TodoController@deletedRecords')->name('todo.deleted-records');