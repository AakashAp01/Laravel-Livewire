<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $products;

    public function addToCart($id){

        $product = Product::find($id);

        if (!$product) {
            session()->flash('error', 'Product not found!');
            return;
        }

        $cart = new CartItem();
        $cart->product_id = $product->id;
        $cart->user_id = Auth::id();
        $cart->quantity = 1;
        $cart->save();

        session()->flash('success', 'Product added to cart successfully!');

       
    }

    public function mount()
    {
        $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
