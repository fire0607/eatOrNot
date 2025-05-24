<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', [FormController::class, 'showForm']);
Route::post('/submit', [FormController::class, 'submit']);
Route::get('/thanks', [FormController::class, 'thankYou']);
