<?php

use App\Http\Controllers\BlogController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    // CREATE
    Route::get('/new', [BlogController::class, 'create'])->name('create');
    Route::post('/new', [BlogController::class, 'store'])->name('create');
    // UPDATE
    Route::get('/{post}/edit', [BlogController::class, 'edit'])->name('edit');
    Route::patch('/{post}/edit', [BlogController::class, 'update'])->name('update');
    // DELETE
    Route::get('/{slug}-{post}/delete', [BlogController::class, 'destroy'])->name('destroy');
    // SHOW
    Route::get('/{slug}-{post}', [BlogController::class, 'show'])->name('show');
});


