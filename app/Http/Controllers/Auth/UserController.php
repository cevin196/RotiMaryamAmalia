<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $cities = City::all();
        return view('admin.user.edit', compact('user', 'cities'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telepon' => 'required',
        ]);
        $tipe = 0;
        if ($request->tipe == "on") {
            $tipe = 1;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->city_id = $request->city;
        $user->tipe = $tipe;
        $user->update();

        return redirect(route('user.index'))->with('success', 'User info updated!');
    }

    public function adminUpdateProfil(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect(route('admin.editAkun'))->with('success', 'User info updated!');
    }

    public function destroy(User $user)
    {
        //
    }

    public function adminEditProfil()
    {
        $user = Auth::user();
        return view('admin.editAkun', compact('user'));
    }

    public function changePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("success", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }
}