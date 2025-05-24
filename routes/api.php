<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FormController;

Route::prefix('v1')->group(function () {
    Route::get('/form-data', [FormController::class, 'getFormData']);
    Route::post('/submit', [FormController::class, 'submit']);
    Route::get('/responses', [FormController::class, 'getResponses']);
}); 