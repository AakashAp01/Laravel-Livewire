<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logOut()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
