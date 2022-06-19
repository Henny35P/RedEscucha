<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bienvenido', function () {
    return view('bienvenido');
});

Route::get('/reclamos', function () {
    return view('reclamos');
});

Route::get('/feedbackRespuesta', function () {
    return view('feedbackRespuesta');
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/create', [UserController::class, 'store']);
Route::put('/users/update/{id}', [UserController::class, 'update']);
Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);
//BANKS
Route::get('/comments', [CommentController::class, 'index']);
Route::get('/comments/{id}', [CommentController::class, 'show']);
Route::post('/comments/create', [CommentController::class, 'store']);
Route::put('/comments/update/{id}', [CommentController::class, 'update']);
Route::delete('/comments/delete/{id}', [CommentController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('comments', CommentController::class);

