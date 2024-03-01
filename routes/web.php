<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'index'])->name('index');
Route::get('/create', [MovieController::class, 'create'])->name('films.create');
Route::post('/films', [MovieController::class, 'store'])->name('films.store');
Route::delete('/{id}', [MovieController::class, 'destroy'])->name('films.destroy');
Route::get('/{id}/edit', [MovieController::class, 'edit'])->name('films.edit');
Route::put('/{id}/update', [MovieController::class, 'update'])->name('films.update');
Route::post('/{id}/publish', [MovieController::class, 'publish'])->name('films.publish');
Route::put('/{id}/toggle-publish', [MovieController::class, 'togglePublish'])->name('films.togglePublish');

Route::get('/rest-genres', [GenreController::class, 'rest_index']);
Route::get('/rest-genres/{id}', [GenreController::class, 'rest_show']);
Route::get('/rest-movies', [MovieController::class, 'rest_index']);
Route::get('/rest-movies/{id}', [MovieController::class, 'rest_show']);

