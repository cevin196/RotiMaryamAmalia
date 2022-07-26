<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public $cart;
    public $searchKey = '';

    public function addToCart($menuId)
    {
        $menu = Menu::find($menuId);
        Cart::add(
            $menu->id,
            $menu->name,
            1,
            $menu->price,
        );

        $this->emit('updateTotal');
    }

    public function render()
    {
        $this->cart = Cart::content();
        $menus = Menu::where('name', 'like', '%' . $this->searchKey . '%')->paginate(8);

        return view('livewire.shop', compact('menus'));
    }
}