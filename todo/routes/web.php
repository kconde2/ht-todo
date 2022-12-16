<?php

use App\Http\Controllers\TodoDeleteAllController;
use App\Http\Controllers\TodoDeleteController;
use App\Http\Controllers\TodoEditController;
use App\Http\Controllers\TodoFormController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TodoToggleController;
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

Route::get('/', TodoListController::class)->name('todo-list');
Route::get('/form/{id?}', TodoFormController::class)->whereUuid('id')->name('todo-form');
Route::post('/add', TodoEditController::class)->name('todo-add');
Route::put('/edit/{id?}', TodoEditController::class)->whereUuid('id')->name('todo-edit');
Route::put('/toggle/{id}', TodoToggleController::class)->name('todo-toggle');
Route::delete('/delete/{id}', TodoDeleteController::class)->name('todo-delete');
Route::delete('/delete-all', TodoDeleteAllController::class)->name('todo-delete-all');
