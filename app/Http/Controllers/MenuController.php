<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time() . '.' . $request->picture->extension();

        $request->picture->move(public_path('menu'), $imageName);

        $menu = new Menu;
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->picture = $imageName;
        $menu->save();

        return redirect(route('menu.index'))->with('success', 'Menu berhasil ditambahkan!');
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time() . '.' . $request->picture->extension();

        $request->picture->move(public_path('menu'), $imageName);

        $menu->update($request->only(['name', 'description', 'price', 'picture']));

        return redirect(route('menu.index'))->with('success', 'Menu berhasil diubah!');
    }

    public function destroy(Menu $menu)
    {
        ($menu->picture != "") ? File::delete('menu/' . $menu->picture) : "";
        $menu->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}