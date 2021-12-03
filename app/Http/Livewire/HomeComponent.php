<?php

namespace App\Http\Livewire;

use App\Models\FoodCategories;
use App\Models\HomeSlider;
use App\Models\Recipe;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $categories = FoodCategories::all();
        $lrecipes = Recipe::orderBy('created_at', 'DESC')->get()->take(6);
        return view('livewire.home-component', [
            'sliders'=>$sliders, 
            'categories'=>$categories,
            'lrecipes'=>$lrecipes])->layout('layouts.base');
    }
}
