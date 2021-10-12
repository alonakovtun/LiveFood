<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FoodCategories;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 6;
        $this->fill(request()->only('search'));
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == 'date-new'){
            $recipes = Recipe::where('name', 'like', '%'.$this->search. '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->sorting == 'date-old'){
            $recipes = Recipe::where('name', 'like', '%'.$this->search. '%')->orderBy('created_at', 'ASC')->paginate($this->pagesize);
        }else{
            $recipes = Recipe::where('name', 'like', '%'.$this->search. '%')->paginate($this->pagesize);
        }

        $categories = FoodCategories::all();
        
        return view('livewire.search-component', ['recipes'=>$recipes, 'categories'=>$categories])->layout('layouts.base');
    }
}
