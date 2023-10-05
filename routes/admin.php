<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Takshak\Adash\Http\Middleware\ReferrerMiddleware;
use Takshak\Adash\Http\Middleware\GatesMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', GatesMiddleware::class, ReferrerMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);

    Route::get('categories/{category}/status', [CategoryController::class, 'statusToggle'])->name('categories.status');
    Route::resource('courses', CourseController::class);
    Route::get('courses/{course}/status', [CourseController::class, 'statusToggle'])->name('courses.status');

    Route::get('profile/edit', [AdminController::class, 'profileEdit'])->name('profile.edit');
    Route::post('profile/update', [AdminController::class, 'profileUpdate'])->name('profile.update');

    Route::resource('users', UserController::class);
    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('status-toggle/{user}', 'statusToggle')->name('status-toggle');
        Route::get('profile-img/remove/{user}', 'profileImgRemove')->name('users.profile_img.remove');
    });

    Route::resource('queries', QueryController::class);
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::get('login-to/{user:id}', [UserController::class, 'loginToUser'])->name('login-to');

    Route::resource('permissions', PermissionController::class)->except(['show']);
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('roles', [PermissionController::class, 'rolePermissions'])->name('roles.index');
        Route::post('{role}', [PermissionController::class, 'rolePermissionsUpdate'])->name('roles.update');
    });
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
});
