<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

use App\Services\Midtrans\CreateSnapTokenService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Mime\Encoder\Base64Encoder;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('dashboard');
    }

    public function dashboard()
    {
        $menus = Menu::all();
        return view('dashboard', compact('menus'));
    }

    public function adminHome()
    {
        $menuCount = Menu::count();
        $orderCount = Order::whereMonth('date', Carbon::now()->month)->where('status', 'capture')->get()->count();
        $completedOrderCount = Order::whereMonth('date', Carbon::now()->month)->where('status', 'selesai')->get()->count();
        return view('admin.home', compact('menuCount', 'orderCount', 'completedOrderCount'));
    }

    public function shop()
    {
        return view('shop');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkoutIndex()
    {

        $cart = Cart::content();
        $cities = City::all();

        return view('checkout', compact('cart', 'cities'));
    }


    public function checkoutPost(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        $carts = Cart::content();
        $total = Cart::priceTotal(0, ',', '');

        $order = new Order;
        do {
            $orderNumber = mt_rand(1000000000, 9999999999);
        } while (Order::where('order_number', $orderNumber)->exists());
        $order->order_number = $orderNumber;
        $order->user_id = Auth::user()->id;
        $order->date = Carbon::now();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->city_id = $request->city_id;
        $order->email = $request->email;
        $order->notes = $request->notes;
        $order->phone_number = $request->phone_number;
        $order->total = $total;
        $order->save();

        foreach ($carts as $cart) {
            $order->menus()->attach($cart->id, ['qty' => $cart->qty]);
        }

        Cart::destroy();

        return redirect(route('order', $order->id));
    }

    public function orderList()
    {
        $orders = Order::where('user_id', Auth::user()->id)->whereMonth('date', Carbon::now()->month)->get();
        foreach ($orders as $order) {
            if ($order->status != "settlement" && $order->status != "none") {
                $this->statusUpdate($order);
            }
        }
        return view('orderList', compact('orders'));
    }


    public function order($id)
    {
        $order = Order::find($id);
        $total = $order->total + $order->city->shipping_cost;

        if ($order->user_id != Auth::user()->id) {
            return redirect(route('order-list'));
        }

        if ($order->snap_token ==  null) {
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
                    'order_id' => $order->order_number,
                    'gross_amount' => $total,
                ),
                'customer_details' => array(
                    'name' => $order->name,
                    'email' => $order->email,
                    'phone' => $order->phone_number,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->snap_token = $snapToken;
            $order->update();
        }

        return view('order', compact('order'));
    }

    public function refresh()
    {
    }
    public function statusUpdate(Order $order)
    {
        $curl = curl_init();
        $serverKey = base64_encode("SB-Mid-server-QklHfV3m4Pobw_rvpGqf_o9-" . ":");

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $order->order_number . "/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Basic ' . $serverKey,
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo 'asdf';
            $result = json_decode($response);
            // dd($result);
            $order->status = $result->transaction_status;
            $order->update();
        }
    }

    public function orderStore(Request $request)
    {

        // $this->statusCheck();
        $statusMessage = json_decode($request->paymentResponse);
        $order = Order::find($request->order_id);
        $order->status = $statusMessage->transaction_status;
        $order->update();

        return redirect(route('order-list'));
    }
}