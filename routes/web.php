<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('courses', [CourseController::class, 'index'])->name('courses');
Route::get('course/{course:slug}', [CourseController::class, 'detail'])->name('course');
Route::get('page/{page:slug}', [HomeController::class, 'page'])->name('page');
Route::get('faculties', [FacultyController::class, 'index'])->name('faculties');
Route::get('faculty/{faculty}', [FacultyController::class, 'detail'])->name('faculty');

Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::post('queries', [QueryController::class, 'store'])->name('queries.store');

Route::middleware(['auth'])->group(function () {
    Route::prefix('carts')->name('carts.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::get('/add/{id}', [CartController::class, 'addtoCart'])->name('add');
        Route::get('/update', [CartController::class, 'updateCart'])->name('update');
        Route::get('/delete', [CartController::class, 'deleteFromCart'])->name('delete');
    });
    Route::prefix('wishlists')->name('wishlists.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::get('remove/{course}', [WishlistController::class, 'detachFromWishlist'])->name('remove');
        Route::get('move-to-cart/{course}', [WishlistController::class, 'moveToCart'])->name('move_to_cart');
        Route::get('{course}', [WishlistController::class, 'toggle'])->name('toggle');
    });

    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout.store');

    Route::get('checkout/{order}/success',[CheckoutController::class,'success'])->name('checkout.success');

    Route::post('/checkout/verify-coupon', [CheckoutController::class,'verifyCoupon'])->name('checkout.verify-coupon');
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
