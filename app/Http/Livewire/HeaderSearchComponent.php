<?php

namespace App\Http\Livewire;

use App\Models\FoodCategories;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search;

    public function mount(){
        $this->fill(request()->only('search', 'recipe_cat', 'recipe_cat_id'));
    }

    public function render()
    {
        return view('livewire.header-search-component');
    }
}
