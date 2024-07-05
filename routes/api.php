<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GitHubController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);

Route::apiResource('products', ProductController::class);

Route::post('github/popular-repos', [GitHubController::class, 'getPopularRepos']);
Route::post('github/largest-repo', [GitHubController::class, 'getLargestRepo']);