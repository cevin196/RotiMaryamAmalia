<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.city.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.city.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cities',
            'shipping_cost' => 'required'
        ]);

        City::create($request->only(['name', 'shipping_cost']));

        return redirect(route('city.index'))->with('success', 'Berhasil tambah kota!');
    }

    public function show(City $city)
    {
        return view('admin.city.show', compact('city'));
    }

    public function edit(City $city)
    {
        return view('admin.city.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => ['required', Rule::unique('cities')->ignore($city)],
            'shipping_cost' => 'required|integer'
        ]);

        $city->update($request->only(['name', 'shipping_cost']));
        return redirect(route('city.index'))->with('success', 'Berhasil update kota!');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect(route('city.index'))->with('success', 'Berhasil hapus kota!');
    }
}