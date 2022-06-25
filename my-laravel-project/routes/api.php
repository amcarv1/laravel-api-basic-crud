<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// products's routes
Route::get('produtos', [ProductController::class, 'listProduct']);
Route::post('produtos', [ProductController::class, 'storeProduct']);
Route::put('produtos/{id}/editar', [ProductController::class, 'updateProduct']);
Route::delete('produtos/{id}', [ProductController::class, 'removeProduct']);

// comments's routes
Route::post('comentarios', [CommentController::class, 'store']);
Route::get('comentarios', [CommentController::class, 'index']);
Route::put('comentarios/{id}/editar', [CommentController::class, 'update']);
Route::delete('comentarios/{id}', [CommentController::class, 'destroy']);