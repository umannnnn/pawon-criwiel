<?php

use App\Models\Menu;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminMailController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Beranda'
    ]);
});

Route::get('/gallery', function () {
    return view('gallery', [
        'title' => 'Galeri',
        'galleries' => Gallery::all()
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'Tentang Kami'
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Hubungi Kami'
    ]);
});

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/{menu:slug}', [MenuController::class, 'show'])->name ('menu.show');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard/mails', [AdminMailController::class, 'index'])->middleware('isAdmin');
Route::delete('/dashboard/mails/{message}', [AdminMailController::class, 'destroy'])->middleware('isAdmin');

Route::resource('/dashboard/galleries', AdminGalleryController::class)->middleware('isAdmin')->only([
    'index', 'store', 'update'
]);
Route::delete('/dashboard/galleries/{gallery}', [AdminGalleryController::class, 'destroy'])->middleware('isAdmin');

Route::get('/dashboard/menus/checkSlug', [AdminMenuController::class, 'checkSlug'])->middleware('isAdmin');
Route::resource('/dashboard/menus', AdminMenuController::class)->middleware('isAdmin');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('isAdmin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('isAdmin');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('auth/google', [LoginController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [LoginController::class, 'callbackGoogle']);

Route::resource('/dashboard/users', AdminUserController::class)->middleware('isAdmin')->only([
    'index', 'store', 'update'
]);
Route::delete('/dashboard/users/{user}', [AdminUserController::class, 'destroy'])->middleware('isAdmin');

Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::delete('/order/{order}', [OrderController::class, 'destroy']);
Route::put('/order/{order}/payment', [OrderController::class, 'payment']);

Route::get('/dashboard/orders', [AdminOrderController::class, 'index'])->middleware('isAdmin');
Route::put('/dashboard/orders/{order}/confirm', [AdminOrderController::class, 'confirm'])->middleware('isAdmin');
Route::delete('/dashboard/orders/{order}', [AdminOrderController::class, 'destroy'])->middleware('isAdmin');

