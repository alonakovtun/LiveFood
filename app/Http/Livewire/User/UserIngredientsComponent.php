<?php

namespace App\Http\Livewire\User;

use App\Models\Ingredient;
use Livewire\Component;
use Livewire\WithPagination;

class UserIngredientsComponent extends Component
{
    use WithPagination;

    public function deleteIngredient($id){
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        session()->flash('message', 'Ingredient has been deleted successfully!');
    }
    public function render()
    {
        $ingredients = Ingredient::leftJoin('user_ingredients', 'ingredients.id', '=', 'user_ingredients.ingredient_id')
        ->where('user_ingredients.user_id', \Auth::id())
        ->paginate(10);
        return view('livewire.user.user-ingredients-component',['ingredients'=>$ingredients])->layout('layouts.base');
    }
}
