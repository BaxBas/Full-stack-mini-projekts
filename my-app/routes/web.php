<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GradeController;


// ----------------- priekšmeti -----------------
Route::get('/', [SubjectController::class, 'index'])->name('index');

Route::get('/subjects/{id}', [SubjectController::class, 'show'])->name('subjects.index');

Route::get('/create/subject', [SubjectController::class, 'create'])->name('subjects.create');

Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');

Route::get('/update/subject/{id}', [SubjectController::class, 'edit'])->name('subjects.edit');

Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update');

Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');


// ----------------- grupas -----------------
Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');

Route::get('/create/group', [GroupController::class, 'create'])->name('groups.create');

Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');

Route::get('/update/group/{id}', [GroupController::class, 'edit'])->name('groups.edit');

Route::put('/groups/{id}', [GroupController::class, 'update'])->name('groups.update');

Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');

// ----------------- atzīmes -----------------
Route::get('/create/grade/{id}', [GradeController::class, 'create'])->name('grades.create');

Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');

Route::get('/update/grades/{id}', [GradeController::class, 'edit'])->name('grades.edit');

Route::put('/grades/{id}', [GradeController::class, 'update'])->name('grades.update');

Route::delete('/grades/{id}', [GradeController::class, 'destroy'])->name('grades.destroy');