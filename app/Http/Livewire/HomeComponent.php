<?php

namespace App\Http\Livewire;

use App\Models\FoodCategories;
use App\Models\HomeSlider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $categories = FoodCategories::all();
        return view('livewire.home-component', ['sliders'=>$sliders, 'categories'=>$categories])->layout('layouts.base');
    }
}
