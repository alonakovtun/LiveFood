<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class RecipeDetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function render()
    {
        $recipe = Recipe::where('slug', $this->slug)->first();
        $related_recipes = Recipe::where('category_id', $recipe->category_id)->inRandomOrder()->limit(4)->get();
        return view('livewire.recipe-details-component', 
        ['recipe'=>$recipe],
        ['related_recipes'=>$related_recipes],
        )->layout('layouts.base');
    }
}
