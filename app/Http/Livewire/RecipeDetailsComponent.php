<?php

namespace App\Http\Livewire;

use App\Models\Favorite;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\User;
use App\Models\UserRecipe;
use CreateFavoritesTable;
use Livewire\Component;

class RecipeDetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function addToFavorite($id){
        $recipe = Recipe::find($id);
        $recipe->addFavorite();
        session()->flash('message', 'Recipe has been added successfully!');
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

        $exists = Favorite::where('favoriteable_id', $recipe->id)
        ->whereIn('user_id', [\Auth::id()])
        ->exists();
        

        
        return view('livewire.recipe-details-component', [
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'related_recipes' => $related_recipes,
            'category' => object_get($recipe, 'category.name', '-'),
            'user' => object_get($recipe, 'username', 'Unknown'),
            'exists' => $exists,
        ])->layout('layouts.base');
    }
}
