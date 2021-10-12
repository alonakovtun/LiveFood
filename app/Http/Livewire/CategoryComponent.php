<?php

namespace App\Http\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FoodCategories;

class CategoryComponent extends Component
{
    public $category_slug;
    public $sorting;
    public $pagesize;

    public function mount($category_slug){
        $this->sorting = "default";
        $this->pagesize = 6;
        $this->category_slug = $category_slug;
    }

    use WithPagination;
    public function render()
    {
        $category = FoodCategories::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->sorting == 'date-new'){
            $recipes = Recipe::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->sorting == 'date-old'){
            $recipes = Recipe::where('category_id', $category_id)->orderBy('created_at', 'ASC')->paginate($this->pagesize);
        }else{
            $recipes = Recipe::where('category_id', $category_id)->paginate($this->pagesize);
        }

        $categories = FoodCategories::all();
        return view('livewire.category-component', ['recipes'=>$recipes, 'categories'=>$categories, 'category_name'=>$category_name,])->layout('layouts.base');
    }
}
