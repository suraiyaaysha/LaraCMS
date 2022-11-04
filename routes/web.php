<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', 'HomeController@index');
Route::get('/', [HomeController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Asa
Route::get('/admin', function() {
    return view('admin.index');
})->middleware('admin');

// Route::resource('/admin/pages/', 'Admin\PagesController');
// Route::get('/admin/pages', [App\Http\Controllers\Admin\PagesController::class, 'index'])->name('admin.pages');
// Route::get('/admin/pages/create', [App\Http\Controllers\Admin\PagesController::class, 'create'])->name('admin.pages.create');
// Route::get('/admin/pages/create', [App\Http\Controllers\Admin\PagesController::class, 'create']);
// Route::get('/admin/pages/edit/{$id}', [App\Http\Controllers\Admin\PagesController::class, 'edit'])->name('admin.pages.edit');

Route::resource('admin/pages', PagesController::class, [
    'except'=>['show']
])->middleware('admin');

Route::resource('admin/blog', BlogController::class, [
    'except'=>['show']
])->middleware('admin');

Route::resource('admin/users', UsersController::class,
// ['except'=>['create','store','show']
// ]
)->middleware('admin');

// Route::get('/home', 'HomeController@index')->name('home');
