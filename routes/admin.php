<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\Ebook\CategoryController as EbookCategoryController;
use App\Http\Controllers\Admin\Ebook\EbookDownloadController;
use App\Http\Controllers\Admin\OrderController;
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

Route::middleware(['auth', GatesMiddleware::class, ReferrerMiddleware::class])->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::prefix('ebooks')->name('ebooks.')->group(function () {
            Route::get('downloads', [EbookDownloadController::class, 'index'])->name('downloads.index');
            Route::get('downloads/{download}', [EbookDownloadController::class, 'show'])->name('downloads.show');
            Route::delete('downloads/{download}', [EbookDownloadController::class, 'destroy'])->name('downloads.destroy');
            Route::resource('categories', EbookCategoryController::class);
            Route::get('categories/{category}/status', [EbookCategoryController::class, 'statusToggle'])
                ->name('categories.status');

            Route::get('/', [EbookCategoryController::class, 'ebooks'])->name('index');
            Route::get('/create', [EbookCategoryController::class, 'ebookCreate'])->name('create');
            Route::post('/create', [EbookCategoryController::class, 'ebookStore'])->name('store');
            Route::get('/{category}', [EbookCategoryController::class, 'ebookShow'])->name('show');
            Route::get('/{category}/edit', [EbookCategoryController::class, 'ebookEdit'])->name('edit');
            Route::put('/{category}', [EbookCategoryController::class, 'ebookUpdate'])->name('update');
            Route::delete('/{category}', [EbookCategoryController::class, 'ebookDestroy'])->name('destroy');
        });

        Route::resource('categories', CategoryController::class);
        Route::get('categories/{category}/status', [CategoryController::class, 'statusToggle'])->name('categories.status');

        Route::resource('courses', CourseController::class);
        Route::get('courses/{course}/status', [CourseController::class, 'statusToggle'])->name('courses.status');

        Route::get('profile/edit', [AdminController::class, 'profileEdit'])->name('profile.edit');
        Route::post('profile/update', [AdminController::class, 'profileUpdate'])->name('profile.update');

        Route::resource('orders', OrderController::class);
        Route::resource('coupons', CouponController::class);
        Route::get('orders/{order}/status', [OrderController::class, 'statusToggle'])->name('orders.status');
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
        Route::resource('faculties', \App\Http\Controllers\Admin\FacultyController::class);
        Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class);
        Route::get('settings/notices', [\App\Http\Controllers\Admin\SettingController::class, 'notices'])->name('settings.notices');
        Route::post('settings/notices', [\App\Http\Controllers\Admin\SettingController::class, 'noticeStore'])->name('settings.notices.store');
        Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);
    });
