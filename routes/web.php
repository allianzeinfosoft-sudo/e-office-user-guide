<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CkeditorController;
use App\Models\Topic;

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
/* Guest */

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    
    Route::post('/topics', [TopicController::class,'store'])->name('topics.store');
    Route::get('/topics/{topic}/edit', [TopicController::class,'edit'])->name('topics.edit');
    Route::put('/topics/{topic}', [TopicController::class,'update'])->name('topics.update');
    Route::delete('/topics/{topic}', [TopicController::class,'destroy'])->name('topics.destroy');
});

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/topic/{topic}', [TopicController::class, 'show'])->name('topics.show');
Route::post('/ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');
Route::get('/articles/{article}/pdf/view', [ArticleController::class, 'view'])->name('articles.pdf.view');
Route::get('/articles/{article}/pdf/download', [ArticleController::class, 'download'])->name('articles.pdf.download');


