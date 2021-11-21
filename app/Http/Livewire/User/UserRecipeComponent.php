<?php

namespace App\Http\Livewire\User;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class UserRecipeComponent extends Component
{
    use WithPagination;

    public int $user_id = 0;

    public function deleteRecipe($id){
        $recipe = Recipe::find($id);
        $recipe->delete();
        session()->flash('message', 'Recipe has been deleted successfully!');
    }
    public function render()
    {
        $recipes = Recipe::leftJoin('user_recipes', 'recipes.id', '=', 'user_recipes.recipe_id')
            ->where('user_recipes.user_id', \Auth::id())
            ->paginate(10);
            
        return view('livewire.user.user-recipe-component', ['recipes' => $recipes])->layout('layouts.base');
    }
}
