<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as Cart2;
use Livewire\Component;

class Cart extends Component
{

    public $cartTotal;
    public $keranjang;

    public function plus($rowId)
    {
        $qty = (int) Cart2::get($rowId)->qty + 1;
        Cart2::update($rowId, $qty);

        $this->emit('updateTotal');
    }

    public function minus($rowId)
    {
        $qty = (int) Cart2::get($rowId)->qty - 1;
        if ($qty < 1) {
            $this->deletItem($rowId);
        } else {
            Cart2::update($rowId, $qty);
        }

        $this->emit('updateTotal');
    }

    public function deleteItem($rowId)
    {
        Cart2::remove($rowId);
        $this->emit('updateTotal');
    }
    public function render()
    {
        $this->keranjang = Cart2::content();
        $this->cartTotal = Cart2::priceTotal();

        return view('livewire.cart');
    }
}