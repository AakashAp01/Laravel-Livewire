<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    
    public $isLogin = false;

    public $name, $email, $password;

    public function switchLogin()
    {
        $this->isLogin = !$this->isLogin;
        $this->clearValidation();
        $this->reset(['name', 'email', 'password']);
    }


    public function signUp()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
    
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
    
        Auth::login($user);

        session()->flash('message', 'User registered successfully! Welcome to dashboard...');
        return redirect()->to('/dashboard');
    }

    public function logIn()
    {
        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

            session()->regenerate();
            session()->flash('message', 'Logged in successfully! Welcome to dashboard...');
            return redirect()->to('/dashboard');
        }
    
        session()->flash('error', 'The provided credentials do not match our records.');
    }
    
    public function render()
    {
        return view('livewire.login');
    }
}
