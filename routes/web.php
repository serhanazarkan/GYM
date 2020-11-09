<?php

use App\Http\Controllers\InstallController;
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
Route::get('/install', [App\Http\Controllers\InstallController::class, 'index'])->name('install.index');
Route::post('/install', [App\Http\Controllers\InstallController::class, 'add_user'])->name('install.add_user');;

Route::get('/', function () {
    return view('site.home.welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resources([
    'admin/blog' => App\Http\Controllers\Dashboard\Blog\BlogController::class,
]);

Route::resources([
    'admin/blog/posts' => App\Http\Controllers\Dashboard\Blog\BlogPostController::class,
]);

Route::post('/admin/blog/category', [App\Http\Controllers\Dashboard\Blog\BlogController::class, 'store_category'])->name('blog.store_category');
Route::put('/admin/blog/category/update', [App\Http\Controllers\Dashboard\Blog\BlogController::class, 'update_category'])->name('blog.update_category');
Route::delete('/admin/blog/category/delete', [App\Http\Controllers\Dashboard\Blog\BlogController::class, 'delete_category'])->name('blog.delete_category');

/*
Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
*/
