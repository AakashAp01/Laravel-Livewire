<?php

namespace App\Livewire;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartButton extends Component
{

    public $cartCount = 2;    

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        $this->cartCount = CartItem::where('user_id', Auth::id())->count();
    }

    public function render()
    {

        return view('livewire.cart-button');
    }
}
