<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FoodCategories;

class DishRecipes extends Component
{
    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 6;
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == 'date-new'){
            $recipes = Recipe::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->sorting == 'date-old'){
            $recipes = Recipe::orderBy('created_at', 'ASC')->paginate($this->pagesize);
        }else{
            $recipes = Recipe::paginate($this->pagesize);
        }

        $categories = FoodCategories::all();
        
        return view('livewire.dish-recipes', ['recipes'=>$recipes, 'categories'=>$categories])->layout('layouts.base');
    }
}
