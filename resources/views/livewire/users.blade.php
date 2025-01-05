<div class="h-screen" >
    @include('components.alert')
    <!-- User Section -->
    <div class="bg-white rounded-lg  p-6 ">
      
        <!-- User Table -->
        <div class="bg-white rounded-lg p-6 ">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">User List</h3>
            <div class="mb-4 flex justify-between items-center max-w-xl">
            <!-- Filter Section -->
                <input type="text"
                wire:model.live="search"
                placeholder="Search by Name or Email"
                class="px-4 py-2 border rounded-md grow"
                />
            </div>

            <!-- User Table -->
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
                    @forelse($users as $index => $user)
                    <tr class="border-t">
                        <td class="px-4 py-2 text-gray-700">{{$index + 1}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$user->name ?? '--'}}</td>
                        <td class="px-4 py-2 text-gray-700">{{$user->email ?? '--'}}</td>
                        <td class="px-4 py-2 text-gray-700">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600" wire:click="viewUser({{ $user->id }})">V</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                             wire:confirm="Are you sure you want to delete this user?"
                             wire:click="deleteUser({{ $user->id }})">D</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-gray-700 text-center">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="mt-4">
                {{ $users->links(data: ['scrollTo' => false]) }}
            </div>
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