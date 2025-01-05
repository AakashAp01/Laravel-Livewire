<div class="bg-slate-800 p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Products</h2>
    @include('components.alert')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mt-1">{{ $product->description }}</p>
                <p class="text-gray-800 font-bold mt-2">${{ number_format($product->price, 2) }}</p>
                <button 
                    wire:click="addToCart({{ $product->id }})" 
                    class="w-full bg-blue-500 text-white py-2 mt-4 rounded hover:bg-blue-600">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
