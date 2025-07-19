<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Models\Transaction;

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

Route::prefix('sliders')->controller(SliderController::class)->name('slider.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('{slider}/edit', 'edit')->name('edit');
    Route::put('{slider}', 'update')->name('update');
    Route::delete('{slider}', 'destroy')->name('destroy');
});

Route::prefix('features')->controller(FeatureController::class)->name('feature.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('{feature}/edit', 'edit')->name('edit');
    Route::put('{feature}', 'update')->name('update');
    Route::delete('{feature}', 'destroy')->name('destroy');
});

Route::prefix('about-us')->controller(AboutUsController::class)->name('about-us.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{aboutUs}/edit', 'edit')->name('edit');
    Route::put('{aboutUs}', 'update')->name('update');
});

Route::prefix('contact-us')->controller(ContactUsController::class)->name('contact-us.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{contactUs}/show', 'show')->name('show');
    Route::delete('{contactUs}', 'destroy')->name('destroy');
});

Route::prefix('footer')->controller(FooterController::class)->name('footer.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{footer}/edit', 'edit')->name('edit');
    Route::put('{footer}', 'update')->name('update');
});

Route::prefix('categories')->controller(CategoryController::class)->name('category.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('{category}/edit', 'edit')->name('edit');
    Route::put('{category}', 'update')->name('update');
    Route::delete('{category}', 'destroy')->name('destroy');
});

Route::prefix('products')->controller(ProductController::class)->name('product.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('show/{product}', 'show')->name('show');
    Route::get('{product}/edit', 'edit')->name('edit');
    Route::put('{product}', 'update')->name('update');
    Route::delete('{product}', 'destroy')->name('destroy');
});

Route::prefix('coupons')->controller(CouponController::class)->name('coupon.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('{coupon}/edit', 'edit')->name('edit');
    Route::put('{coupon}', 'update')->name('update');
    Route::delete('{coupon}', 'destroy')->name('destroy');
});

Route::prefix('orders')->controller(OrderController::class)->name('order.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('{order}/edit', 'edit')->name('edit');
    Route::put('{order}', 'update')->name('update');
});

Route::get('transactions', function () {
    $transactions = Transaction::latest()->paginate(10);
    return view('transactions.index', compact('transactions'));
})->name('transactions');
