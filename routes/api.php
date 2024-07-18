<?php
// Inside routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Fetch all users
Route::get('/users', [UserController::class, 'index']);

// Create a new user
Route::post('/users', [UserController::class, 'store']);
