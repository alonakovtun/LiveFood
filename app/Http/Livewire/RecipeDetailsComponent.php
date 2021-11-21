<?php

namespace App\Http\Livewire;

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
        $recipe = Recipe::select('recipes.id', 'recipes.name','recipes.description', 'recipes.image', 'recipes.category_id', 'recipes.created_at', 'recipes.short_description', 'users.name as username')
            ->leftJoin('user_recipes', 'recipes.id', '=', 'user_recipes.recipe_id')
            ->leftJoin('users', 'user_recipes.user_id', '=', 'users.id')
            ->where('slug', $this->slug)
            ->with('category')
            ->first();
            
        $ingredients = Ingredient::select('ingredients.name')
            ->leftJoin('recipe_with_ingredients', 'ingredients.id', '=', 'recipe_with_ingredients.ingredient_id')
            ->where('recipe_with_ingredients.recipe_id', $recipe->id)
            ->get();
            
        $related_recipes = Recipe::where('category_id', $recipe->category_id)
            ->where('id', '!=', $recipe->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
            
        return view('livewire.recipe-details-component', [
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'related_recipes' => $related_recipes,
            'category' => object_get($recipe, 'category.name', '-'),
            'user' => object_get($recipe, 'username', 'Unknown')
        ])->layout('layouts.base');
    }
}
