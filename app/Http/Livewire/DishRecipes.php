<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class DishRecipes extends Component
{
    use WithPagination;
    public function render()
    {
        $recipes = Recipe::paginate(6);
        return view('livewire.dish-recipes', ['recipes'=>$recipes])->layout('layouts.base');
    }
}
