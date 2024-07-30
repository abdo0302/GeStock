<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FournissurController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//client
Route::middleware("auth:sanctum")->group(function(){
    Route::post('/client', [ClientController::class, 'store']);
    Route::get('/clients', [ClientController::class, 'show_all']);
    Route::get('/client/{id}', [ClientController::class, 'show']);
    Route::post('/client/update/{id}', [ClientController::class, 'update']);
    Route::delete('/client/{id}', [ClientController::class, 'destroy']);
});

//fournissur
Route::middleware("auth:sanctum")->group(function(){
    Route::post('/fournissur', [FournissurController::class, 'store']);
    Route::get('/fournissurs', [FournissurController::class, 'show_all']);
    Route::get('/fournissur/{id}', [FournissurController::class, 'show']);
    Route::post('/fournissur/update/{id}', [FournissurController::class, 'update']);
    Route::delete('/fournissur/{id}', [FournissurController::class, 'destroy']);
});

//categories
Route::middleware("auth:sanctum")->group(function(){
    Route::post('/categori', [CategoryController::class, 'store']);
    Route::get('/categories', [CategoryController::class, 'show_all']);
    Route::get('/categori/{id}', [CategoryController::class, 'show']);
    Route::post('/categori/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/categori/{id}', [CategoryController::class, 'destroy']);
});

//product
Route::middleware("auth:sanctum")->group(function(){
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/products', [ProductController::class, 'show_all']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    Route::post('/product/update/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
});