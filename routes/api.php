<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\WorkExperienceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(ResumeController::class)->prefix('resumes')->group(function () {
        Route::post('/', 'store');
        Route::get('/', 'getAll');
        Route::delete('/{id}', 'destroy')->where(['id' => '[0-9]+']);
        Route::get('/{id}', 'show')->where(['id' => '[0-9]+']);
        Route::post('/{resume}/work-experience/{work_id}', 'addWorkExperience');
    });


    Route::patch('/contact-information/{id}', [ContactInformationController::class, 'update']);

    Route::controller(WorkExperienceController::class)->prefix('work-experiences')->group(function (){
        Route::post('/', 'store');
        Route::get('/', 'getAll');
        Route::put('/{id}', 'update')->where(['id' => '[0-9]+']);
    });
});
