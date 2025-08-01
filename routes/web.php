<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceFeatureController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProjectAssetController;
use App\Http\Controllers\ProjectDocumentController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PublicAssetController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobPostingController;
use App\Http\Controllers\Admin\CareerNewsController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\ClientDetailController;

// NOTE: Removed line causing error
// use App\Http\Controllers\Developer\DeveloperController;

Route::get('/', [UserController::class, 'create'])->name('login');





// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




        

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', fn() => view('dashboard'))
            ->name('dashboard');
        Route::resource('users', UserController::class)->except(['show']);
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('assign_permissions', AssignPermissionController::class);
        Route::resource('assign_roles', AssignRoleController::class);
    });

    // User Routes
    Route::middleware(['role:client'])->prefix('client')->name('client.')->group(function () {
      Route::get('/dashboard',[ClientDashboardController::class, 'dashboard'])->name('dashboard');
      Route::resource('client-details', ClientDetailController::class);
       Route::post('/profile/update', [ClientDetailController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo/upload', [ClientDetailController::class, 'uploadPhoto'])->name('image.store');
    });
    Route::middleware(['role:lawyer'])->prefix('lawyer')->name('lawyer.')->group(function () {
        // Add user-specific routes here
    });
});

// Auth Routes
require __DIR__ . '/auth.php';
