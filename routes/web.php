<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TagsController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/articles/tags/{tag}', [TagsController::class, 'index']);
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::get('/articles/{article:code}', [ArticlesController::class, 'show'])->name('articles.show');
Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.add');
Route::get('/articles/{article:code}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::patch('/articles/{article:code}', [ArticlesController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article:code}', [ArticlesController::class, 'destroy'])->name('articles.delete');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.add');
Route::get('/admin/feedback', [AdminController::class, 'index'])->name('feedback');

