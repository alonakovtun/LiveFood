<?php

namespace App\Http\Livewire\User;

use App\Models\Favorite;
use App\Models\Recipe;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FavouriteComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $user = User::favorite();
        
        return view('livewire.user.favourite-component', [ 'user' =>  $user])->layout('layouts.base');
    }
}
