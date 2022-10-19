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

// Asa
Route::get('/admin', function() {
    return 'you are an admin, editor, author';
})->middleware('admin');

// Route::resource('/admin/pages/', 'Admin\PagesController');
Route::get('/admin/pages', [App\Http\Controllers\Admin\PagesController::class, 'index'])->name('admin.pages');
Route::get('/admin/pages/create', [App\Http\Controllers\Admin\PagesController::class, 'create'])->name('admin.pages.create');
Route::get('/admin/pages/edit/{$id}', [App\Http\Controllers\Admin\PagesController::class, 'edit']);

// Route::get('/home', 'HomeController@index')->name('home');
