<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

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
        // dd(request());
        if (request('search') == null) {
            $menus = Menu::paginate(8);
        } else {
            $menus = Menu::where('nama', 'like', '%' . request('search') . '%')->paginate(8);
        }
        return view('belanja', compact('menus'));
    }
}