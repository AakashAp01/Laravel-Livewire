<div class="bg-gray-100 p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Shopping Cart</h2>
    @include('components.alert')

    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2 text-left">Image</th>
                <th class="px-4 py-2 text-left">Product</th>
                <th class="px-4 py-2 text-center">Price</th>
                <th class="px-4 py-2 text-center">Quantity</th>
                <th class="px-4 py-2 text-center">Total</th>
                <th class="px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
            <tr class="border-t">
                <td class="px-4 py-2"><img src="{{ $item->product->image }}" alt="" class="rounded-xl"  height="40" width="70" ></td>
                <td class="px-4 py-2">{{ $item->product->name }}</td>
                <td class="px-4 py-2 text-center">${{ number_format($item->product->price, 2) }}</td>
                <td class="px-4 py-2 text-center">
                    <button 
                        wire:click="decrementQuantity({{ $item['id'] }})" 
                        class="bg-gray-300 text-gray-800 px-2 py-1 rounded-md hover:bg-gray-400">
                        -
                    </button>
                    <span class="px-4">{{ $item['quantity'] }}</span>
                    <button 
                        wire:click="incrementQuantity({{ $item['id'] }})" 
                        class="bg-gray-300 text-gray-800 px-2 py-1 rounded-md hover:bg-gray-400">
                        +
                    </button>
                </td>
                <td class="px-4 py-2 text-center">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                <td class="px-4 py-2 text-center">
                    <button 
                        wire:click="removeItem({{ $item['id'] }})" 
                        wire:confirm="Are you sure you want to remove this product?"
                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                        Remove
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    

    <!-- Totals Section -->
    <div class="mt-6 bg-white p-4 rounded-lg shadow-md">
        <div class="flex justify-between mb-2">
            <span class="text-gray-800 font-semibold">Total Quantity:</span>
            <span class="text-gray-800">{{ $totalQuantity }}</span>
        </div>
        <div class="flex justify-between mb-2">
            <span class="text-gray-800 font-semibold">Subtotal:</span>
            <span class="text-gray-800">${{ number_format($subtotal, 2) }}</span>
        </div>
        <div class="flex justify-between mb-2">
            <span class="text-gray-800 font-semibold">Tax (10%):</span>
            <span class="text-gray-800">${{ number_format($tax, 2) }}</span>
        </div>
        <div class="flex justify-between font-bold text-lg">
            <span class="text-gray-800">Grand Total:</span>
            <span class="text-gray-800">${{ number_format($grandTotal, 2) }}</span>
        </div>
    </div>

    <!-- Checkout Button -->
    <div class="mt-6 text-right">
        <button 
            wire:click="checkout" 
            class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600">
            Checkout
        </button>
    </div>
</div>

