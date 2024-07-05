<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LogicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/authenticate', [AuthController::class, 'authenticate']);

Route::prefix('api')->group(function () {
    
    Route::post('/check-palindrome', [LogicController::class, 'checkPalindrome']);
    Route::post('/process-array', [LogicController::class, 'processArray']);

    Route::prefix('github')->group(function () {
        Route::get('/{user}/popular-repos', [GitHubController::class, 'getPopularRepos']);
        Route::get('/{user}/largest-repo', [GitHubController::class, 'getLargestRepo']);
    });

    Route::middleware('jwt.auth')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/{id}', [UserController::class, 'show']);
            Route::put('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
        });
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index']);
            Route::post('/', [ProductController::class, 'store']);
            Route::get('/{id}', [ProductController::class, 'show']);
            Route::put('/{id}', [ProductController::class, 'update']);
            Route::delete('/{id}', [ProductController::class, 'destroy']);
        });

    });
});