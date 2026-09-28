<?php

use Illuminate\Support\Facades\Route;

Route::get('areas', [AreaController::class, 'index'])->name('areas');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('area.show');
Route::get('computers', [ComputerController::class, 'index'])->name('computers');
Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('training-centers');
Route::get('teachers', [TeacherController::class, 'index'])->name('teachers');
Route::get('courses', [CourseController::class, 'index'])->name('courses');
Route::put('courses/{course}/image', [CourseController::class, 'updateImage'])->name('courses.updateImage');
Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentices');
