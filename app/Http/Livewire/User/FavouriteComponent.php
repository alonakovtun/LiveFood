<?php

namespace App\Http\Livewire\User;

use App\Models\Favorite;
use App\Models\Recipe;
use Livewire\Component;

class FavouriteComponent extends Component
{
    public function render()
    {
        $favorites_recipes = Favorite::leftJoin('favorites', 'recipes.id', '=', 'favorites.favoriteable_id')
            ->where('favorites.user_id', \Auth::id())
            ->paginate(10);
        return view('livewire.user.favourite-component', [ 'favorites_recipes' =>  $favorites_recipes])->layout('layouts.base');
    }
}
