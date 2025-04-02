<?php

use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\TourController as AdminTourController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\front\BuyController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\TourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

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

// Auth::routes();
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::put('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/tours', [TourController::class, 'index'])->name('tour.index');
Route::get('/tour/{id}', [TourController::class, 'show'])->name('tour.show');

Route::get('/order/{id}/show', [BuyController::class, 'show'])->name('buy.show');
Route::put('/order/{id}/store', [BuyController::class, 'store'])->name('buy.store');
Route::get('/order/{id}/confirmPay', [BuyController::class, 'confirmPay'])->name('buy.confirmPay');

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap'])->name("lang");


Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name("admin.home");

    Route::get('/contact', [AdminContactController::class, 'index'])->name("admin.contact.index");
    Route::get('/contact/{id}/delete', [AdminContactController::class, 'destroy'])->name("admin.contact.delete");
    
    Route::get('/order', [OrderController::class, 'index'])->name("admin.order.index");
    Route::get('/order/{id}/', [OrderController::class, 'show'])->name("admin.order.show");
    Route::get('/order/{id}/delete', [OrderController::class, 'destroy'])->name("admin.order.delete");

    Route::get('/tour', [AdminTourController::class, 'index'])->name("admin.tour.index");
    Route::get('/tour/create', [AdminTourController::class, 'create'])->name("admin.tour.create");
    Route::put('/tour/store', [AdminTourController::class, 'store'])->name("admin.tour.store");
    Route::get('/tour/{id}/edit', [AdminTourController::class, 'edit'])->name("admin.tour.edit");
    Route::get('/tour/{id}/show', [AdminTourController::class, 'show'])->name("admin.tour.show");
    Route::put('/tour/{id}/update', [AdminTourController::class, 'update'])->name("admin.tour.update");
    Route::get('/tour/{id}/delete', [AdminTourController::class, 'destroy'])->name("admin.tour.delete");

    Route::get('/media/{id}/create', [MediaController::class, 'create'])->name("admin.media.create");
    Route::put('/media/{id}/store', [MediaController::class, 'store'])->name("admin.media.store");
    Route::get('/media/{id}/edit', [MediaController::class, 'edit'])->name("admin.media.edit");
    Route::put('/media/{id}/update', [MediaController::class, 'update'])->name("admin.media.update");
    Route::get('/media/{id}/delete', [MediaController::class, 'destroy'])->name("admin.media.delete");
    
    Route::get('/gallery', [GalleryController::class, 'index'])->name("admin.gallery.index");
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name("admin.gallery.create");
    Route::put('/gallery/store', [GalleryController::class, 'store'])->name("admin.gallery.store");
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name("admin.gallery.edit");
    Route::put('/gallery/{id}/update', [GalleryController::class, 'update'])->name("admin.gallery.update");
    Route::get('/gallery/{id}/delete', [GalleryController::class, 'destroy'])->name("admin.gallery.delete");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
