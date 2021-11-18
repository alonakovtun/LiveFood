<?php

namespace App\Http\Livewire;

use App\Models\FoodCategories;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\User;
use Livewire\Component;

class RecipeDetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function render()
    {
        $categories = FoodCategories::all();
        $user = User::first();
        $recipe = Recipe::where('slug', $this->slug)->first();
        $ingredients = Ingredient::select('ingredients.name')
            ->leftJoin('recipe_with_ingredients', 'ingredients.id', '=', 'recipe_with_ingredients.ingredient_id')
            ->where('recipe_with_ingredients.recipe_id', $recipe->id)
            ->get();
        $related_recipes = Recipe::where('category_id', $recipe->category_id)->inRandomOrder()->limit(4)->get();
        
        return view('livewire.recipe-details-component', 
            ['recipe' => $recipe,
            'ingredients' => $ingredients,
            'related_recipes' => $related_recipes,
            'categories' => $categories,
            'user' => $user]
            
        )->layout('layouts.base');
    }
}
