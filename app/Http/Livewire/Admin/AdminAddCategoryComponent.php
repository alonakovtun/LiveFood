<?php

namespace App\Http\Livewire\Admin;

use App\Models\FoodCategories;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:food_categories'
        ]);
    }

    public function storeCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:food_categories'
        ]);

        $category = new FoodCategories();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();

        session()->flash('message', 'Category has been created successfully!');
        return redirect()->route('admin.categories');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
