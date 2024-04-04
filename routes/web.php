<?php

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
// Ceci est une route qui retourne un fichier Json
// Route::get('/blog', function (Request $request) {
//     return [
//         "name" => $request->input('name', 'John Doe'),
//         "article" => "Article 1"
//     ];
// })->name('blog.index');
// // Ceci est une route qui retourne un fichier Json avec un param et un where qui sert à la recherche d'un article
// Route::get('/blog/{slig}-{id}', function (string $slug, string $id) {
//     return [
//         "slug" => $slug,
//         "id" => $id
//     ];
// })->where([
//     'id' => '[0-9]+',
//     'slug' => '[a-z0-9\-]+',
// ])
//     ->name('blog.show');

// On peut regrouper plusieurs routes elles ont le meme point commun par exemple, nos routes ont un meme prefix
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', function (Request $request) {
        return [
            "name" => $request->input('name', 'John Doe'),
            "article" => "Article 1"
        ];
    })->name('index');
    // Ceci est une route qui retourne un fichier Json avec un param et un where qui sert à la recherche d'un article
    Route::get('/{slig}-{id}', function (string $slug, string $id) {
        return [
            "slug" => $slug,
            "id" => $id
        ];
    })->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+',
    ])
        ->name('show');
});
