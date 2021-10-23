<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminEditUserComponent extends Component
{
    public $user_role;
    public $user_id;

    public function mount($user_id){
        $user = User::find($user_id);

        $this->user_role = $user->utype;
    }

    public function updateUser(){
        $user = User::find($this->user_id);

        $user->utype = $this->user_role;

        $user->save();
        session()->flash('message', 'User role has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-user-component')->layout('layouts.base');
    }
}
