<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// if route being hit, index, start store, update, destroy function in ItemController
Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item')->group(function() {
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});
