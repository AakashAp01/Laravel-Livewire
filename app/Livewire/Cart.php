<?php

namespace App\Livewire;

use App\Models\CartItem;
use Livewire\Component;
use Livewire\WithPagination;

class Cart extends Component
{
    use WithPagination;
    public $cartItems = [];
    public $subtotal = 0;
    public $tax = 0;
    public $grandTotal = 0;
    public $totalQuantity = 0;

    public function mount()
    {
        // Dummy data
        $this->cartItems = CartItem::get();
        $this->calculateTotals();
    }

    public function incrementQuantity($id){

        $cart = CartItem::find($id);
        if (!$cart) {
            session()->flash('error', 'Product not found!');
            return;
        }
        $cart->quantity++;
        $cart->save();
        $this->calculateTotals();
        session()->flash('success', 'Product added to cart successfully!');
    }

    public function decrementQuantity($id)
    {
        $cart = CartItem::find($id);
        if (!$cart) {
            session()->flash('error', 'Product not found!');
            return;
        }

        if ($cart->quantity > 1) {
            $cart->quantity--;
            $cart->save();
        } else {
            $cart->delete();
        }
        $this->calculateTotals();
        session()->flash('warning', 'Product remove from successfully!');
    }

    public function removeItem($id)
    {
        $cart = CartItem::find($id);
        if (!$cart) {
            session()->flash('error', 'Product not found!');
            return;
        }
        $cart->delete();
        $this->mount();
        session()->flash('info', 'Product remove from successfully!');
    }

    public function calculateTotals()
    {
        $this->subtotal = 0;
        $this->totalQuantity = 0;

        foreach ($this->cartItems as $item) {
            $this->subtotal += $item->product->price * $item->quantity;
            $this->totalQuantity += $item->quantity;
        }

        $this->tax = $this->subtotal * 0.10;
        $this->grandTotal = $this->subtotal + $this->tax;
    }

    public function checkout()
    {
        session()->flash('success', 'Checkout successful!');
        $this->cartItems = [];
        $this->calculateTotals();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
