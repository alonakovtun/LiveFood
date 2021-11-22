<?php

namespace App\Http\Livewire\User;

use App\Models\FoodCategories;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeWithIngredients;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\UserRecipe;

class UserAddRecipeComponent extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $slug = '';
    public string $short_description = '';
    public string $description = '';
    public $image = null;
    public int $category_id = 0;
    public $ingredients_array = [];

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }


    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:recipes',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required'
        ]);
    }

    public function addRecipe(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:recipes',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required'
        
        ]);
        $recipe = new Recipe();
        $recipe->name = $this->name;
        $recipe->slug = $this->slug;
        $recipe->short_description = $this->short_description;
        $recipe->description = $this->description;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('recipes', $imageName);
        $recipe->image = $imageName;
        $recipe->category_id = $this->category_id;
        $recipe->save();
        
        foreach ($this->ingredients_array as $ingredient) {
            RecipeWithIngredients::create([
                'recipe_id' => $recipe->id,
                'ingredient_id' => $ingredient
            ]);
        }

        if (!empty($recipe->id)) {
            UserRecipe::create([
                'recipe_id' => $recipe->id,
                'user_id' => \Auth::id()
            ]);
        }
        
        session()->flash('message', 'Recipe has been created successfully!');

        return redirect()->route('user.recipes');
    }

    public function render()
    {
        $categories = FoodCategories::all();
        $ingredients = Ingredient::all();
        
        return view('livewire.user.user-add-recipe-component', ['categories' => $categories,'ingredients' => $ingredients])->layout('layouts.base');
    }
}
