<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesananController;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/', function () {
    $menus = Menu::all();
    return view('dashboard', compact('menus'));
})->name('dashboard');
Route::get('/tentang-kami', [HomeController::class, 'tentangKami'])->name('tentang-kami');
Route::view('/kontak-kami', 'contact')->name('kontak-kami');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/belanja', [HomeController::class, 'shop'])->name('shop');
    Route::get('/keranjang', [HomeController::class, 'cart'])->name('cart');
    // Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('/checkout-index', [HomeController::class, 'checkoutIndex'])->name('checkout.index');
    Route::post('/checkout-post', [HomeController::class, 'checkoutPost'])->name('checkout.post');
    Route::get('/list-pesanan', [HomeController::class, 'orderList'])->name('order-list');
    // Route::get('user/pesanan/', [HomeController::class, 'pesanan'])->name('user-pesanan');
    Route::get('pesanan/{id}', [HomeController::class, 'order'])->name('order');
    Route::post('pesanan', [HomeController::class, 'orderStore'])->name('user.order.store');
    // Route::get('refresh-status-pesanan/{orderId}', [HomeController::class, 'refresh'])->name('user.order.refresh');
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
    Route::get('/admin/pesanan/selesai/{pesanan}', [OrderController::class, 'done'])->name('order.done');
    Route::get('admin/riwayat-pesanan', [OrderController::class, 'history'])->name('riwayat');
    Route::get('admin/edit-akun/', [UserController::class, 'adminEditProfil'])->name('admin.editAkun');
    Route::put('admin/update-profil/{user}', [UserController::class, 'adminUpdateProfil'])->name('admin.updateAkun');
    Route::put('admin/change-password/', [UserController::class, 'changePassword'])->name('admin.changePassword');
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/city', CityController::class);
});