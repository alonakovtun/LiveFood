<?php

namespace App\Http\Livewire\Admin;

use App\Models\FoodCategories;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeWithIngredients;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddRecipeComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $image;
    public $category_id;
    public $ingredient_id;

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
        $recipe_with_ingredients = new RecipeWithIngredients();
        $recipe->name = $this->name;
        $recipe->slug = $this->slug;
        $recipe->short_description = $this->short_description;
        $recipe->description = $this->description;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('recipes', $imageName);
        $recipe->image = $imageName;
        $recipe->category_id = $this->category_id;
        $recipe_with_ingredients->recipe_id = $recipe->id;
        $recipe_with_ingredients->ingredient_id = $this->ingredient_id;
        

        $recipe->save();
        $recipe_with_ingredients->save();
        session()->flash('message', 'Recipe has been created successfully!');
    }

    public function render()
    {
        $categories = FoodCategories::all();
        $ingredients = Ingredient::all();
        return view('livewire.admin.admin-add-recipe-component', ['categories'=>$categories], ['ingredients'=>$ingredients])->layout('layouts.base');
    }
}
