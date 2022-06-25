<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('produtos', [ProductController::class, 'listProduct']);
Route::post('produtos', [ProductController::class, 'storeProduct']);
Route::put('produtos/{id}/editar', [ProductController::class, 'updateProduct']);
Route::delete('produtos/{id}', [ProductController::class, 'removeProduct']);