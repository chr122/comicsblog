<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/posts/create', [PostController::class, 'category'])->name('create');
    Route::get('/posts/{post}', [PostController::class ,'show']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    // Route::post('/posts/{comment_id}/comments','CommentsController@store');
    Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');
    Route::get('/like/{id}', [PostController::class, 'like'])->name('post.like');
    Route::get('/unlike/{id}', [PostController::class, 'unlike'])->name('post.unlike');
    Route::get('/categories/{category}', [CategoryController::class,'index']);
    Route::get('/search', [PostController::class, 'index'])->name('post.search');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
