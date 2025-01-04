<div class="container w-auto mx-auto py-10 px-4">
    
    <!-- Header -->
    <header class="text-center mb-8">
        <h1 class="text-5xl font-extrabold text-gray-800">Dashboard</h1>
        <p class="text-gray-600 mt-2">Welcome to your personalized dashboard</p>
    </header>

    <!-- User Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto mb-8">
        <h2 class="text-4xl font-semibold text-gray-800 mb-4 text-center">{{ $name }}</h2>

        <!-- Buttons Section -->
        <div class="flex justify-center space-x-4 mt-6">
            <button
                wire:click="sayName"
                class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition">
                Click Me
            </button>
            <button
                wire:click="logOut"
                class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-red-600 transition">
                Log Out
            </button>
        </div>
        <!-- User Table -->
        <div class="bg-white rounded-lg p-6 max-w-4xl mx-auto">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6 ">User List</h3>
    
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left text-gray-700">#</th>
                        <th class="px-4 py-2 text-left text-gray-700">Name</th>
                        <th class="px-4 py-2 text-left text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index=>$user)
                        <tr class="border-t">
                            <td class="px-4 py-2 text-gray-700">{{$index+1}}</td>
                            <td class="px-4 py-2 text-gray-700">{{$user->name ?? '--'}}</td>
                            <td class="px-4 py-2 text-gray-700">{{$user->email ?? '--'}}</td>
                            <td class="px-4 py-2 text-gray-700">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600" wire:click="viewUser({{ $user->id }})">V</button>
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">U</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">D</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
     <!-- Modal -->
    @if($viewuser)
     <div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg max-w-lg w-full">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">User Details</h3>
            <hr>
            <p class="text-xl font-medium text-gray-700 mb-4">Name : {{$seeuser->name }}</p>
            <p class="text-lg text-gray-600 mb-6">Email : {{$seeuser->email}}</p>
            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" wire:click="viewUser">Close</button>
        </div>
    </div>
    @endif
</div>
