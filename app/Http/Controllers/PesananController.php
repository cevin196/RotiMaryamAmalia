<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::where('status', '0')->get();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        return view('admin.pesanan.create');
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

    public function destroy(Pesanan $pesanan)
    {
        //
    }
}