<?php

namespace App\Http\Livewire\User;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\FoodCategories;
use App\Models\Ingredient;
use App\Models\RecipeWithIngredients;

class UserEditRecipeComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $image;
    public $category_id;
    public $newimage;
    public $recipe_id;
    public $ingredients_array = [];

    public function mount($recipe_slug){
        $recipe = Recipe::where('slug', $recipe_slug)->first();
        $this->name = $recipe->name;
        $this->slug = $recipe->slug;
        $this->short_description = $recipe->short_description;
        $this->description = $recipe->description;
        $this->image = $recipe->image;
        $this->category_id = $recipe->category_id;
        $this->recipe_id = $recipe->id;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'ingredients_array' => 'required'
        ]);
    }

    public function updateRecipe(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'ingredients_array' => 'required'
        
        ]);

        $recipe = Recipe::find($this->recipe_id);

        $recipe->name = $this->name;
        $recipe->slug = $this->slug;
        $recipe->short_description = $this->short_description;
        $recipe->description = $this->description;

        if($this->newimage){
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('recipes', $imageName);
            $recipe->image = $imageName;
        }

        $recipe->category_id = $this->category_id;
        $recipe->save();

        RecipeWithIngredients::where('recipe_id', $recipe->id)->delete();

        foreach ($this->ingredients_array as $ingredient) {
            RecipeWithIngredients::create([
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient
            ]);
        }


        session()->flash('message', 'Recipe has been updated successfully!');
        return redirect()->route('user.recipes');
    }

    public function render()
    {
        $categories = FoodCategories::all();
        $selected_ingredients = Ingredient::select('ingredients.name', 'ingredients.id')
            ->leftJoin('recipe_with_ingredients', 'ingredients.id', '=', 'recipe_with_ingredients.ingredient_id')
            ->where('recipe_with_ingredients.recipe_id', $this->recipe_id)
            ->get();
        $all_ingredients = Ingredient::all();

        $a = [];

        foreach ($selected_ingredients as $selected_ingredient) {
            $a[] = $selected_ingredient->id;
        }

        return view('livewire.user.user-edit-recipe-component', ['categories' => $categories, 'selected_ingredients' => $a, 'all_ingredients' => $all_ingredients])->layout('layouts.base');
    }
}