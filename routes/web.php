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

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

Route::prefix('sliders')->controller(SliderController::class)->group(function () {
    Route::get('/', 'index')->name('slider.index');
    Route::get('create', 'create')->name('slider.create');
    Route::post('store', 'store')->name('slider.store');
    Route::get('{slider}/edit', 'edit')->name('slider.edit');
    Route::put('{slider}', 'update')->name('slider.update');
    Route::delete('{slider}', 'destroy')->name('slider.destroy');
});

Route::prefix('features')->controller(FeatureController::class)->group(function () {
    Route::get('/', 'index')->name('feature.index');
    Route::get('create', 'create')->name('feature.create');
    Route::post('store', 'store')->name('feature.store');
    Route::get('{feature}/edit', 'edit')->name('feature.edit');
    Route::put('{feature}', 'update')->name('feature.update');
    Route::delete('{feature}', 'destroy')->name('feature.destroy');
});

Route::prefix('about-us')->controller(AboutUsController::class)->group(function () {
    Route::get('/', 'index')->name('about-us.index');
    Route::get('{aboutUs}/edit', 'edit')->name('about-us.edit');
    Route::put('{aboutUs}', 'update')->name('about-us.update');
});

Route::prefix('contact-us')->controller(ContactUsController::class)->group(function () {
    Route::get('/', 'index')->name('contact-us.index');
    Route::get('{contactUs}/show', 'show')->name('contact-us.show');
    Route::delete('{contactUs}', 'destroy')->name('contact-us.destroy');
});

Route::prefix('footer')->controller(FooterController::class)->group(function () {
    Route::get('/', 'index')->name('footer.index');
    Route::get('{footer}/edit', 'edit')->name('footer.edit');
    Route::put('{footer}', 'update')->name('footer.update');
});

Route::prefix('categories')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('category.index');
    Route::get('create', 'create')->name('category.create');
    Route::post('store', 'store')->name('category.store');
    Route::get('{category}/edit', 'edit')->name('category.edit');
    Route::put('{category}', 'update')->name('category.update');
    Route::delete('{category}', 'destroy')->name('category.destroy');
});

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('product.index');
    Route::get('create', 'create')->name('product.create');
    Route::post('store', 'store')->name('product.store');
    Route::get('show/{product}', 'show')->name('product.show');
    Route::get('{product}/edit', 'edit')->name('product.edit');
    Route::put('{product}', 'update')->name('product.update');
    Route::delete('{product}', 'destroy')->name('product.destroy');
});

Route::prefix('coupons')->controller(CouponController::class)->group(function () {
    Route::get('/', 'index')->name('coupon.index');
    Route::get('create', 'create')->name('coupon.create');
    Route::post('store', 'store')->name('coupon.store');
    Route::get('{coupon}/edit', 'edit')->name('coupon.edit');
    Route::put('{coupon}', 'update')->name('coupon.update');
    Route::delete('{coupon}', 'destroy')->name('coupon.destroy');
});
