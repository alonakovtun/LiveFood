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
use App\Models\UserRecipe;

class AdminAddRecipeComponent extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $slug = '';
    public string $short_description = '';
    public string $description = '';
    public $image = null;
    public $category_id = null;
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
            'category_id' => 'required',
            'ingredients_array' => 'required'
        ]);
    }

    public function addRecipe(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:recipes',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'ingredients_array' => 'required'
        
        ],
        [
            'category_id.required' => 'Please select category'
        ]);
        $recipe = new Recipe();
        /* $ingredients = new Ingredient(); */
        $recipe->name = $this->name;
        $recipe->slug = $this->slug;
        $recipe->short_description = $this->short_description;
        $recipe->description = $this->description;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('recipes', $imageName);
        $recipe->image = $imageName;
        $recipe->category_id = $this->category_id;
       /*  foreach ($this->ingredients_array as $ingredient) {
            $ingredients->name = $ingredient;
        } */
       
        $recipe->save();
        /* $ingredients->save(); */
        
        
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
        return redirect()->route('admin.recipes');
    }

    public function render()
    {
        $categories = FoodCategories::all();
        $ingredients = Ingredient::all();
        
        return view('livewire.admin.admin-add-recipe-component', ['categories' =>$categories,'ingredients' => $ingredients])->layout('layouts.base');
    }
}
