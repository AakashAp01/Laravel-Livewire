<div class="max-w-sm mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
    @if($isLogin)
    <h2 class="text-2xl font-semibold mb-6 ">Sign Up</h2>
    <!-- Form -->
    <form wire:submit.prevent="signUp">
        <div class="mb-4">
            <label for="signup-name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" wire:model="name" id="signup-name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="signup-email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model="email" id="signup-email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="signup-password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" wire:model="password" id="signup-password" autocomplete="new-password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 focus:outline-none">Sign Up</button>
        </div>
    </form>
    <hr class="m-3">
    <p>Already have account ? <button class="underline text-blue-500" wire:click="switchLogin">Log In</button></p>
    @else

    <h2 class="text-2xl font-semibold mb-6">Log In</h2>

    <!-- Form -->
    <form wire:submit.prevent="logIn">
        <div class="mb-4">
            <label for="login-email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model="email" id="login-email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label for="login-password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" wire:model="password" id="login-password" autocomplete="current-password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 focus:outline-none">Log In</button>
        </div>
    </form>
    <hr class="m-3">
    <p>Don't have account ? <button class="underline text-blue-500" wire:click="switchLogin ">Sign Up</button></p>
    @endif
</div>
