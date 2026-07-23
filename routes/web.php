<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DigitalEngineerApiController;
use App\Http\Controllers\DigitalEngineerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/resume', [ResumeController::class, 'index'])->name('resume');
Route::get('/resume/download', [ResumeController::class, 'download'])->name('resume.download');

Route::match(['get', 'post'], '/contact', ContactController::class)->name('contact');

Route::get('/digital-engineer', DigitalEngineerController::class)->name('assistant');

Route::post('/api/digital-engineer', DigitalEngineerApiController::class)->name('api.assistant');
