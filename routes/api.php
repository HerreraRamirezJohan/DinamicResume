<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\ResumeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/resume/create', [ResumeController::class, 'store']);
    Route::delete('/resume/delete/{id}', [ResumeController::class, 'destroy'])
    ->where(['id' => '[0-9]+']);
    Route::get('/resume/{id}', [ResumeController::class, 'show'])
    ->where(['id' => '[0-9]+']);

    Route::patch('/contact-information/update/{id}', [ContactInformationController::class, 'update']);
});
