<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\TrainingCenterController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('areas', [AreaController::class, 'index'])->name('areas');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('area.show');
Route::get('computers', [ComputerController::class, 'index'])->name('computers');
Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('training-centers');
Route::get('teachers', [TeacherController::class, 'index'])->name('teachers');
Route::get('courses', [CourseController::class, 'index'])->name('courses');
Route::put('courses/{course}/image', [CourseController::class, 'updateImage'])->name('courses.updateImage');
Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentices');
