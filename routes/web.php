<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Public Routes
Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Subject Routes
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
    
    // Student-specific Subject Routes
    Route::get('/available-subjects', [SubjectController::class, 'availableSubjects'])->name('subjects.available');
    Route::post('/subjects/{subject}/take', [SubjectController::class, 'takeSubject'])->name('subjects.take');
    Route::delete('/subjects/{subject}/leave', [SubjectController::class, 'leaveSubject'])->name('subjects.leave');
    
    // Task Routes
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/subjects/{subject}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/subjects/{subject}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    
    // Solution Routes
    Route::get('/solutions/{solution}', [SolutionController::class, 'show'])->name('solutions.show');
    Route::post('/tasks/{task}/solutions', [SolutionController::class, 'store'])->name('solutions.store');
    Route::put('/solutions/{solution}/evaluate', [SolutionController::class, 'evaluate'])->name('solutions.evaluate');
});