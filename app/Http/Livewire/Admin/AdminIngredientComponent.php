<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ingredient;
use Livewire\Component;
use Livewire\WithPagination;

class AdminIngredientComponent extends Component
{
    use WithPagination;

    public function deleteIngredient($id){
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        session()->flash('message', 'Ingredient has been deleted successfully!');
    }
    public function render()
    {
        $ingredients = Ingredient::paginate(10);
        return view('livewire.admin.admin-ingredient-component',['ingredients'=>$ingredients])->layout('layouts.base');
    }
}
