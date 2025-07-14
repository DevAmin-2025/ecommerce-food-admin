<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'sliders'], function () {
    Route::get('/', [SliderController::class, 'index'])->name('slider.index');
    Route::get('create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('{slider}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('{slider}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
});

Route::group(['prefix' => 'features'], function () {
    Route::get('/', [FeatureController::class, 'index'])->name('feature.index');
    Route::get('create', [FeatureController::class, 'create'])->name('feature.create');
    Route::post('store', [FeatureController::class, 'store'])->name('feature.store');
    Route::get('{feature}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::put('{feature}', [FeatureController::class, 'update'])->name('feature.update');
    Route::delete('{feature}', [FeatureController::class, 'destroy'])->name('feature.destroy');
});

Route::group(['prefix' => 'about-us'], function () {
    Route::get('/', [AboutUsController::class, 'index'])->name('about-us.index');
    Route::get('{aboutUs}/edit', [AboutUsController::class, 'edit'])->name('about-us.edit');
    Route::put('{aboutUs}', [AboutUsController::class, 'update'])->name('about-us.update');
});

Route::group(['prefix' => 'contact-us'], function () {
    Route::get('/', [ContactUsController::class, 'index'])->name('contact-us.index');
    Route::get('{contactUs}/show', [ContactUsController::class, 'show'])->name('contact-us.show');
    Route::delete('{contactUs}', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');
});

Route::group(['prefix' => 'footer'], function () {
    Route::get('/', [FooterController::class, 'index'])->name('footer.index');
    Route::get('{footer}/edit', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('{footer}', [FooterController::class, 'update'])->name('footer.update');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
