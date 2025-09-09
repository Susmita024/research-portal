<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\ResearchPaperAdminController;
use App\Http\Controllers\User\ResearchPaperUserController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearchPaperController;

Route::get('/', [ResearchPaperController::class, 'index'])->name('papers.index');

Route::get('/papers/{paper}', [ResearchPaperController::class, 'show'])->name('papers.show');
Route::delete('/admin/papers/{paper}', [ResearchPaperAdminController::class, 'destroy'])->name('admin.papers.destroy');


Route::get('/home', function () {
    return view('index');
});

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [ResearchPaperUserController::class, 'index'])->name('dashboard');
    Route::get('/research/create', [ResearchPaperUserController::class, 'create'])->name('user.submit');
    Route::post('/research', [ResearchPaperUserController::class, 'store'])->name('user.research.store');
    Route::delete('/research/{id}', [ResearchPaperUserController::class, 'destroy'])->name('user.research.destroy');





    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/submit-paper', [ResearchPaperController::class, 'create'])->name('papers.create');
    Route::post('/submit-paper', [ResearchPaperController::class, 'store'])->name('papers.store');



});

Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', fn () => 'Welcome Admin!')->name('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

    Route::get('dashboard', [ResearchPaperAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('papers/{paper}/review', [ResearchPaperAdminController::class, 'edit'])->name('admin.papers.edit');
    Route::post('papers/{paper}/review', [ResearchPaperAdminController::class, 'update'])->name('admin.papers.update');

    Route::get('research/create', [ResearchPaperAdminController::class, 'create'])->name('admin.research.create');
    Route::post('research/store', [ResearchPaperAdminController::class, 'store'])->name('admin.research.store');
    
});


require __DIR__.'/auth.php';
