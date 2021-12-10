<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentsController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/tags/{tag}', [TagsController::class, 'index']);
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/articles/create', [ArticlesController::class, 'create'])->name('article.create');
Route::get('/articles/{article:code}', [ArticlesController::class, 'show'])->name('article.show');
Route::post('/articles', [ArticlesController::class, 'store'])->name('article.store');
Route::get('/articles/{article:code}/edit', [ArticlesController::class, 'edit'])->name('article.edit');
Route::patch('/articles/{article:code}', [ArticlesController::class, 'update'])->name('article.update');
Route::delete('/articles/{article:code}', [ArticlesController::class, 'destroy'])->name('article.destroy');

Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');
Route::post('/contacts', [ContactsController::class, 'store'])->name('contact.add');

Route::resource('/news', NewsController::class);

Route::post('/articles/{article:code}/comments', [CommentsController::class, 'article'])->name('comment.article');
Route::post('/news/{news}/comments', [CommentsController::class, 'news'])->name('comment.news');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('admin.feedback');
Route::get('/admin/articles', [AdminController::class, 'articles'])->name('admin.articles');
Route::get('/admin/articles/{article:code}', [AdminController::class, 'show'])->name('admin.articles.show');
Route::get('/admin/news', [AdminController::class, 'news'])->name('admin.news');

Route::view('/admin/reports', 'admin.reports.index')->name('admin.reports.index');
Route::get('/admin/reports/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
Route::get('/admin/reports/total', [AdminController::class, 'totalReport'])->name('admin.total');
Route::post('/admin/reports/total', [AdminController::class, 'storeTotalReport'])->name('admin.store.total');

Auth::routes();

