@foreach (['success', 'error', 'warning', 'info'] as $msgType)
    @if (session()->has($msgType))
        <div id="sessionMessage" 
             class="p-4 mb-4 flex justify-between items-center rounded 
             {{ $msgType === 'success' ? 'bg-green-500 text-white' : '' }}
             {{ $msgType === 'error' ? 'bg-red-500 text-white' : '' }}
             {{ $msgType === 'warning' ? 'bg-yellow-500 text-black' : '' }}
             {{ $msgType === 'info' ? 'bg-blue-500 text-white' : '' }}">
            <span>{{ session($msgType) }}</span>
            <button 
                class="px-3 py-1 rounded ml-4 
                {{ $msgType === 'success' ? 'bg-green-700 hover:bg-green-800 text-white' : '' }}
                {{ $msgType === 'error' ? 'bg-red-700 hover:bg-red-800 text-white' : '' }}
                {{ $msgType === 'warning' ? 'bg-yellow-700 hover:bg-yellow-800 text-black' : '' }}
                {{ $msgType === 'info' ? 'bg-blue-700 hover:bg-blue-800 text-white' : '' }}" 
                onclick="document.getElementById('sessionMessage').remove()">
                &times;
            </button>
        </div>
    @endif
@endforeach
