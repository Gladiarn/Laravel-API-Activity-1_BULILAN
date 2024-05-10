<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Retrieve all students
Route::get('/students', [StudentController::class, 'index']);

// Retrieve a single student
Route::get('/students/{id}', [StudentController::class, 'find']);

// Create a new student
Route::post('/students', [StudentController::class, 'store']);

// Update an existing student
Route::patch('/students/{id}', [StudentController::class, 'update']);

// Delete a student
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
