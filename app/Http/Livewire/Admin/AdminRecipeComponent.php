<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeWithIngredients;
use Livewire\Component;
use Livewire\WithPagination;

class AdminRecipeComponent extends Component
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
        $ingredients = RecipeWithIngredients::all();
        return view('livewire.admin.admin-recipe-component', ['recipes'=>$recipes], ['ingredients'=>$ingredients])->layout('layouts.base');
    }
}
