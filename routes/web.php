<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[UserController::class,'countUser'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/user', [UserController::class, 'create'])->name('admin.user');

     Route::get('/dashboard', [DashboardController::class, 'create'])->name('admin.dashboard');
      Route::post('/user/create', [UserController::class, 'store'])->name('admin.store');
       Route::post('/user/index', [UserController::class, 'getData'])->name('admin.index');
    
});

require __DIR__.'/auth.php';
