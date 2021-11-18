<?php

namespace App\Http\Livewire\User;

use App\Models\Recipe;
use App\Models\RecipeWithIngredients;
use Livewire\Component;
use Livewire\WithPagination;

class UserRecipeComponent extends Component
{
    use WithPagination;
    public function deleteRecipe($id){
        $recipe = Recipe::find($id);
        $recipe->delete();
        session()->flash('message', 'Recipe has been deleted successfully!');
    }
    public function render()
    {
        $recipes = Recipe::paginate(10);
        return view('livewire.user.user-recipe-component', ['recipes'=>$recipes])->layout('layouts.base');
    }
}
