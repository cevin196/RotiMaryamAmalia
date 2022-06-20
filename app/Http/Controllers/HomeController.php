<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
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
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('dashboard', compact('menus'));
    }

    public function adminHome()
    {
        $menuCount = Menu::count();
        $pesananCount = Pesanan::whereMonth('created_at', Carbon::now()->month)->where('status', 'capture')->get()->count();
        $pesananSelesaiCount = Pesanan::whereMonth('created_at', Carbon::now()->month)->where('status', 'selesai')->get()->count();
        return view('admin.home', compact('menuCount', 'pesananCount', 'pesananSelesaiCount'));
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


    public function checkoutPost(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
        ]);

        $carts = Cart::content();
        $total = Cart::priceTotal(0, ',', '');

        $pesanan = new Pesanan;
        do {
            $refrence_id = mt_rand(1000000000, 9999999999);
        } while (Pesanan::where('nomor_pesanan', $refrence_id)->exists());
        $pesanan->nomor_pesanan = $refrence_id;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = Carbon::now();
        $pesanan->nama = $request->nama;
        $pesanan->alamat = $request->alamat;
        $pesanan->email = $request->email;
        $pesanan->catatan = $request->catatan;
        $pesanan->telepon = $request->telepon;
        $pesanan->total = $total;
        $pesanan->save();

        foreach ($carts as $cart) {
            $pesanan->menus()->attach($cart->id, ['qty' => $cart->qty, 'harga' => $cart->price]);
        }

        Cart::destroy();

        return redirect(route('pesanan', $pesanan->id));
    }

    public function listPesanan()
    {
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->get();
        foreach ($pesanans as $pesanan) {
            if ($pesanan->status != "settlement" && $pesanan->status != "none") {
                $this->statusUpdate($pesanan);
            }
        }
        return view('listPesanan', compact('pesanans'));
    }


    public function pesanan($id)
    {
        // dd('test');
        $pesanan = Pesanan::find($id);

        if ($pesanan->user_id != Auth::user()->id) {
            return redirect(route('list-pesanan'));
        }

        if ($pesanan->snap_token ==  null) {
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
                    'order_id' => $pesanan->nomor_pesanan,
                    'gross_amount' => $pesanan->total,
                ),
                'customer_details' => array(
                    'name' => $pesanan->nama,
                    'email' => $pesanan->email,
                    'phone' => $pesanan->telepon,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $pesanan->snap_token = $snapToken;
            $pesanan->update();
        }

        return view('pesanan', compact('pesanan'));
    }

    public function refresh()
    {
    }
    public function statusUpdate(Pesanan $pesanan)
    {
        $curl = curl_init();
        $serverKey = base64_encode("SB-Mid-server-QklHfV3m4Pobw_rvpGqf_o9-" . ":");

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $pesanan->nomor_pesanan . "/status",
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
            $pesanan->status = $result->transaction_status;
            $pesanan->update();
        }
    }

    public function pesananStore(Request $request)
    {
        // $this->statusCheck();
        $statusMessage = json_decode($request->paymentResponse);


        $pesanan = Pesanan::find($request->pesanan_id);
        $pesanan->status = $statusMessage->transaction_status;
        $pesanan->update();

        return redirect(route('list-pesanan'));
    }
}