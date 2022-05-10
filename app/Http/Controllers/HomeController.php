<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('dashboard', compact('menus'));
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function belanja()
    {

        return view('belanja');
    }

    public function keranjang()
    {
        return view('keranjang');
    }

    public function checkoutIndex()
    {
        $cart = Cart::content();
        return view('checkout', compact('cart'));
    }

    public function checkoutPost()
    {
    }
}