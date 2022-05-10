<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;

use Livewire\Component;

class CartTotal extends Component
{
    public $cartTotal;
    public $cartCount;

    protected $listeners = ['updateTotal' => 'mount'];

    public function mount()
    {
        $this->cartTotal = Cart::priceTotal();
        $this->cartCount = Cart::count();
    }
    public function render()
    {
        return view('livewire.cart-total');
    }
}