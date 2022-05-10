<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Keranjang extends Component
{

    public $cartTotal;
    public $keranjang;

    public function tambahQty($rowId)
    {
        $qty = (int) Cart::get($rowId)->qty + 1;
        Cart::update($rowId, $qty);

        $this->emit('updateTotal');
    }

    public function kurangQty($rowId)
    {
        $qty = (int) Cart::get($rowId)->qty - 1;
        if ($qty < 1) {
            $this->hapusItem($rowId);
        } else {
            Cart::update($rowId, $qty);
        }

        $this->emit('updateTotal');
    }

    public function hapusItem($rowId)
    {
        Cart::remove($rowId);
        $this->emit('updateTotal');
    }
    public function render()
    {
        $this->keranjang = Cart::content();
        $this->cartTotal = Cart::priceTotal();

        return view('livewire.keranjang');
    }
}