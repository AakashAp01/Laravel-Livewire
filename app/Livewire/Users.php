<?php
 
namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
 
class Users extends Component
{
 
    public $viewuser = false;
    public $seeuser;
    use WithPagination;
    public $search = '';

    public function viewUser($id = null){
        $this->seeuser = User::find($id);                
        $this->viewuser = !$this->viewuser;
    }

    public function deleteUser($id = null){
        User::find($id)->delete();
        session()->flash('success', 'User Deleted Successfully.');
    }
 
    public function render()
    {
        $authUser = Auth::user();

        $query = User::query();

       if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        }
        $users = $query->paginate(5);

        return view('livewire.users',compact('authUser','users'));
    }
}