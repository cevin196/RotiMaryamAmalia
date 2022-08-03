<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*------------------------------------------
--------------------------------------------
All Guest Route list
--------------------------------------------
--------------------------------------------*/

Auth::routes();
Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::view('/kontak-kami', 'contact')->name('kontak-kami');
Route::view('/about', 'about')->name('about');


/*------------------------------------------
--------------------------------------------
All Customer Route list
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/belanja', [HomeController::class, 'shop'])->name('shop');
    Route::get('/keranjang', [HomeController::class, 'cart'])->name('cart');
    Route::get('/checkout-index', [HomeController::class, 'checkoutIndex'])->name('checkout.index');
    Route::post('/checkout-post', [HomeController::class, 'checkoutPost'])->name('checkout.post');
    Route::get('/list-pesanan', [HomeController::class, 'orderList'])->name('order-list');
    Route::get('pesanan/{id}', [HomeController::class, 'order'])->name('order');
    Route::post('pesanan', [HomeController::class, 'orderStore'])->name('user.order.store');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('/admin/menu', MenuController::class);
    Route::resource('/admin/order', OrderController::class);
    Route::get('/admin/pesanan/print/{order}', [OrderController::class, 'print'])->name('order.print');
    Route::put('/admin/pesanan/selesai/{pesanan}', [OrderController::class, 'done'])->name('order.done');
    Route::get('admin/riwayat-pesanan', [OrderController::class, 'history'])->name('riwayat');
    Route::get('admin/edit-akun/', [UserController::class, 'adminEditProfil'])->name('admin.editAkun');
    Route::put('admin/update-profil/{user}', [UserController::class, 'adminUpdateProfil'])->name('admin.updateAkun');
    Route::put('admin/change-password/', [UserController::class, 'changePassword'])->name('admin.changePassword');
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/city', CityController::class);
});