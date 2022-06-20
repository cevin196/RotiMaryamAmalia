<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::whereMonth('created_at', Carbon::now()->month)->where('status', 'capture')->get();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $menus = Menu::where('status', 1)->get();
        return view('admin.pesanan.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $validated =  $request->validate([
            'nama' => 'required',
            'tanggal' => 'required|date',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $pesanan = new Pesanan;
        do {
            $refrence_id = mt_rand(1000000000, 9999999999);
        } while (Pesanan::where('nomor_pesanan', $refrence_id)->exists());
        $pesanan->nomor_pesanan = $refrence_id;
        $pesanan->tanggal = $request->tanggal;
        $pesanan->nama = $request->nama;
        $pesanan->telepon = $request->telepon;
        $pesanan->alamat = $request->alamat;
        $pesanan->email = $request->email;
        $pesanan->catatan = $request->catatan;
        $pesanan->total = $request->total;
        $pesanan->status = 'capture';
        $pesanan->save();

        foreach ($request->detailPesanans as $detailPesanan) {
            $pesanan->menus()->attach(
                $detailPesanan['menu_id'],
                ['qty' => $detailPesanan['qty'], 'harga' => $detailPesanan['harga']]
            );
        }

        return redirect(route('pesanan.index'))->with('success', 'Berhasil tambah pesanan!');
    }

    public function show(Pesanan $pesanan)
    {
        return view('admin.pesanan.show', compact('pesanan'));
    }

    public function edit(Pesanan $pesanan)
    {
        return view('admin.pesanan.edit', compact('pesanan'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
    }

    public function selesai($pesananId)
    {
        $pesanan = Pesanan::find($pesananId);
        $pesanan->status = "selesai";
        $pesanan->update();

        return redirect(route('pesanan.index'))->with('success', 'Pesanan Selesai!');
    }

    public function print(Pesanan $pesanan)
    {
        return view('admin.pesanan.print', compact('pesanan'));
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->menus()->detach();
        $pesanan->delete();
        return redirect(route('pesanan.index'))->with('success', 'Berhasil hapus pesanan!');
    }
}