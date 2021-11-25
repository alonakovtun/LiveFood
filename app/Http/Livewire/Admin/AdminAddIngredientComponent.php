<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ingredient;
use Livewire\Component;

class AdminAddIngredientComponent extends Component
{
    public $name;


    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required'
        ]);
    }

    public function storeIngredient(){
        $this->validate([
            'name' => 'required'
        ]);

        $ingredient = new Ingredient();
        $ingredient->name = $this->name;
        $ingredient->save();

        session()->flash('message', 'Ingredient has been created successfully!');
        return redirect()->route('admin.ingredients');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-ingredient-component')->layout('layouts.base');;
    }
}
