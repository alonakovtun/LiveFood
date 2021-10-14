<?php

namespace App\Http\Livewire\Admin;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\FoodCategories;

class AdminEditRecipeComponent extends Component
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
            'category_id' => 'required'
        ]);
    }

    public function updateRecipe(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required'
        
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

        session()->flash('message', 'Recipe has been created successfully!');
    }

    public function render()
    {
        $categories = FoodCategories::all();
        return view('livewire.admin.admin-edit-recipe-component', ['categories'=>$categories])->layout('layouts.base');
    }
}
