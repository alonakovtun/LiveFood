<?php

namespace App\Http\Livewire\User;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class FavouriteComponent extends Component
{
    use WithPagination;

    public function DeleteFromFav($id){
        $recipe = Recipe::find($id);
        $recipe->removeFavorite();
        session()->flash('message', 'Recipe has been deleted successfully!');
    }

    public function render()
    {
            $user = \Auth::user();
            $favourites = $user->favorite(Recipe::class);


        return view('livewire.user.favourite-component', [ 'favourites' =>  $favourites])->layout('layouts.base');
    }
}
