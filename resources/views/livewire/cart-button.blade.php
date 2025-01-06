<a href="/cart" wire:navigate class="hover:bg-gray-700 px-3  rounded-md text-lg flex items-center">
    Cart
    @if($cartCount > 0)
        <span class="bg-red-500 text-white text-sm font-bold rounded-full ml-2 px-2 py-1">
            {{ $cartCount }}
        </span>
    @endif
</a>