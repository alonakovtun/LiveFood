<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FoodCategories;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = FoodCategories::paginate(10);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
