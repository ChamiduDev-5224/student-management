<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// students routes
Route::get('/', [StudentController::class, 'index'])->name('std_home');
Route::get('stdCreate', [StudentController::class, 'create'])->name('std_create');
Route::get('stdEdit/{id}', [StudentController::class, 'edit'])->name('std_edit');
//student data routes
Route::post('stdStore', [StudentController::class, 'store'])->name('std_store');
Route::put('stdUpdate/{id}', [StudentController::class, 'update'])->name('std_update');
Route::delete('stdDelete/{id}', [StudentController::class, 'destroy'])->name('std_delete');

