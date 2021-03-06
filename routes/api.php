<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', [PostController::class, 'index']);
// Route::resource('posts', PostController::class);
Route::get('post/{post:slug}', [PostController::class, 'show']);
Route::post('post/create', [PostController::class, 'store']);
Route::put('post/update/{post:slug}', [PostController::class, 'update']);
Route::delete('post/{post:id}', [PostController::class, 'destroy']);


Route::get('categories', [CategoryController::class, 'index']);

