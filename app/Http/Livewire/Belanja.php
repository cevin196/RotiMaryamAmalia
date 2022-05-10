<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class Belanja extends Component
{
    use WithPagination;

    public $cart;
    public $kataKunci = '';

    public function tambahKeranjang($menuId)
    {
        $menu = Menu::find($menuId);
        Cart::add(
            $menu->id,
            $menu->nama,
            1,
            $menu->harga,
        );

        $this->emit('updateTotal');
    }

    public function render()
    {
        $this->cart = Cart::content();
        $menus = Menu::where('nama', 'like', '%' . $this->kataKunci . '%')->paginate(8);

        return view('livewire.belanja', compact('menus'));
    }
}