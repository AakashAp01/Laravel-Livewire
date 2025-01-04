<?php
 
namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
 
class MyName extends Component
{
 
    public $name;
    public $viewuser = false;
    public $seeuser;
 
    public function sayName()
    {
        $this->name = 'Aakash Prajapati';
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function viewUser($id = null){
        $this->seeuser = User::find($id);                
        $this->viewuser = !$this->viewuser;
    }
 
    public function render()
    {
        $authUser = Auth::user();
        $users = User::all();

        return view('livewire.my-name',compact('authUser','users'));
    }
}