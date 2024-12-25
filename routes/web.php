<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('app_login_form');
Route::post('/login', [AuthController::class, 'login'])->name('app_login');
Route::post('/logout', [AuthController::class, 'logout'])->name('app_logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('app_register_form');
Route::post('/register', [AuthController::class, 'register'])->name('app_register');

Route::middleware('auth')->group(function () {
    Route::prefix('articles')->group(function () {

        Route::get('/articles', [ArticlesController::class, 'allArticles'])->name('articles.all');
        Route::get('/', [ArticlesController::class, 'articlePage'])->name('articles.list');
        Route::get('/create', [ArticlesController::class, 'articleCreate'])->name('articles.create');
        Route::post('/', [ArticlesController::class, 'articles'])->name('articles.store');
        Route::delete('/{id}', [ArticlesController::class, 'destroy'])->name('articles.delete');
        Route::get('/edit/{id}', [ArticlesController::class, 'editArticle'])->name('articles.edit');
        Route::put('/{id}', [ArticlesController::class, 'updateArticle'])->name('articles.update');
        Route::post('/articles/{id}/like', [ArticlesController::class, 'likeArticle'])->name('articles.like');
        Route::post('/articles/{article}/comments', [CommentController::class, 'comment'])->name('comment');
    });

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::get('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [AuthController::class, 'update'])->name('profile.update');
});
