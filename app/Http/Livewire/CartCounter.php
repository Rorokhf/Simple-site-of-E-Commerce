<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\order\cart;

class CartCounter extends Component
{
    // protected $listeners = ['cart_updated' => 'render'];

    // public function render()
    // {
    //     $cart_count = cart::content()->count();

    //     return view('livewire.cart-counter', compact('cart_count'));
    // }
}
