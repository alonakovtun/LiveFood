<?php

namespace App\Http\Livewire;

use App\Models\Favorite;
use App\Models\FoodCategories;
use App\Models\HomeSlider;
use App\Models\Recipe;
use Livewire\Component;

class HomeComponent extends Component
{
    public function addToFavorites($id){
        $recipe = Recipe::find($id);
        $recipe->addFavorite();
        session()->flash('message', 'Recipe has been added successfully!');
    }

    public function render()
    {

        // $recipe = Recipe::select('recipes.id')->get();
        $sliders = HomeSlider::where('status', 1)->get();
        $categories = FoodCategories::all();
       
        $lrecipes = Recipe::select('*')->orderBy('created_at', 'DESC')->get()->take(6);
        // $exists = Favorite::where('favoriteable_id', $recipe->id)
        // ->whereIn('user_id', [\Auth::id()])
        // ->exists();

        return view('livewire.home-component', [
            'sliders'=>$sliders, 
            'categories'=>$categories,
            'lrecipes'=>$lrecipes,
            // 'exists' => $exists
            ])->layout('layouts.base');
    }
}
