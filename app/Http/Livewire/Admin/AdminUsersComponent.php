<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class AdminUsersComponent extends Component
{
    use WithPagination;

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User has been deleted successfully!');
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.admin-users-component', ['users'=>$users])->layout('layouts.base');
    }
}
