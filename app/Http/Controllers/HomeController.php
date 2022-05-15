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
        $total = Cart::priceTotal(0, ',', '.');

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-QklHfV3m4Pobw_rvpGqf_o9-';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => (float)$total * 1000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
            "callbacks" => array(
                "finish" > "http://localhost:8000/"
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $snapURL = \Midtrans\Snap::getSnapUrl($params);

        return view('checkout', compact('cart', 'snapToken', 'snapURL'));
    }

    public function checkoutPost()
    {
    }
}