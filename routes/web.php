<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PopularPostsController;


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


Route::get('/', [PagesController::class, 'index']);
// Route::get('/', function(){
  
//     Redis::set("key1","testvalue");
//     return Redis::get('key1');
// });
Route::get('/blog', [PagesController::class, 'blog']);
// Route::get('/blog/popular', [PopularPostsController::class, 'index']);
Route::get('/blog/{id}', [PagesController::class, 'show'])->name('blog.show');
Route::resource('/blog/comments', App\Http\Controllers\CommentsController::class);
Route::get('/blog/filter/{category}', [PagesController::class, 'category_post'])->name('category.post');

Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function(){
  
    Route::resource('/', AdminController::class);
    Route::resource('/posts', App\Http\Controllers\PostsController::class);
    Route::resource('/category', App\Http\Controllers\CategoryController::class);
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class], 'create')->name('category.create');
    Route::resource('/users', App\Http\Controllers\UsersController::class);
    Route::resource('/banners', App\Http\Controllers\BannersController::class);
});