<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAreaController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminApprenticeController;
use App\Http\Controllers\Admin\AdminComputerController;
use App\Http\Controllers\Admin\AdminTrainingCenterController;
use App\Http\Controllers\Admin\AdminCourseTeacherController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('area.show');
Route::get('computers', [ComputerController::class, 'index'])->name('computers');
Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('training-centers');
Route::get('teachers', [TeacherController::class, 'index'])->name('teachers');
Route::get('courses', [CourseController::class, 'index'])->name('courses');
Route::put('courses/{course}/image', [CourseController::class, 'updateImage'])->name('courses.updateImage');
Route::get('apprentices', [ApprenticeController::class, 'index'])->name('apprentices.index');

Route::prefix('administracion')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('areas', AdminAreaController::class)->except('show');
    Route::resource('courses', AdminCourseController::class)->except('show');
    Route::resource('teachers', AdminTeacherController::class)->except('show');
    Route::resource('apprentices', AdminApprenticeController::class)->except('show');
    Route::resource('computers', AdminComputerController::class)->except('show');
    Route::resource('training-centers', AdminTrainingCenterController::class)->except('show');

    Route::get('course-teachers', [AdminCourseTeacherController::class, 'index'])->name('course-teachers.index');
});
