<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Menu;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::whereMonth('date', Carbon::now()->month)->where('status', 'settlement')->get();
        return view('admin.order.index', compact('orders'));
    }


    public function history()
    {
        $orders = Order::whereMonth('date', Carbon::now()->month)->where('status', 'done')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::where('status', 1)->get();
        $cities = City::all();
        return view('admin.order.create', compact('menus', 'cities'));
    }

    public function store(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ]);

        $order = new order;
        do {
            $refrence_id = mt_rand(1000000000, 9999999999);
        } while (Order::where('order_number', $refrence_id)->exists());
        $order->order_number = $refrence_id;
        $order->date = $request->date;
        $order->name = $request->name;
        $order->phone_number = $request->phone_number;
        $order->city_id = $request->city_id;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->notes = $request->notes;
        $order->total = $request->total;
        $order->status = 'settlement';
        $order->save();

        foreach ($request->orderDetails as $orderDetail) {
            $order->menus()->attach(
                $orderDetail['menu_id'],
                ['qty' => $orderDetail['qty']]
            );
        }

        return redirect(route('order.index'))->with('success', 'Berhasil tambah order!');
    }

    public function show(order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function edit(order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, order $order)
    {
        $validated =  $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'phone_number' => 'required|max:15',
            'address' => 'required',
        ]);

        $order->date = $request->date;
        $order->name = $request->name;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->notes = $request->notes;
        $order->total = $request->total;
        $order->status = 'settlement';
        $order->update();

        $order->menus()->detach();

        foreach ($request->orderDetails as $detailorder) {
            $order->menus()->attach(
                $detailorder['menu_id'],
                ['qty' => $detailorder['qty']]
            );
        }

        return redirect(route('order.index'))->with('success', 'Berhasil update order!');
    }

    public function done($orderId)
    {
        $order = Order::find($orderId);
        $order->status = "done";
        $order->update();

        return redirect(route('order.print', $order));
    }

    public function print(Order $order)
    {
        return view('admin.order.print', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->menus()->detach();
        $order->delete();
        return redirect(route('order.index'))->with('success', 'Berhasil hapus order!');
    }
}