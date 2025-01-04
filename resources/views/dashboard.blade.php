<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Styles / Scripts -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        @if (session()->has('message'))
            <div id="sessionMessage" class="bg-green-500 text-white p-4 mb-4 flex justify-between items-center rounded">
                <span>{{ session('message') }}</span>
                <button 
                    class="text-white bg-green-700 hover:bg-green-800 px-3 py-1 rounded ml-4" 
                    onclick="document.getElementById('sessionMessage').remove()">
                    &times;
                </button>
            </div>
        @endif
        <livewire:my-name />
        @livewireScripts
    </body>
</html>
