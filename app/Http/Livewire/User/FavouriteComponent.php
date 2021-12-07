<?php

namespace App\Http\Livewire\User;

use App\Models\Recipe;
use Livewire\Component;

class FavouriteComponent extends Component
{
    public function render()
    {
        return view('livewire.user.favourite-component')->layout('layouts.base');
    }
}
