<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ingredient;
use Livewire\Component;

class AdminEditIngredientComponent extends Component
{
    public $ingredient_id;
    public $name;

    public function mount($ingredient_id){
        $this->ingredient_id = $ingredient_id;
        $ingredient = Ingredient::where('id', $ingredient_id)->first();
        $this->ingredient_id = $ingredient->id;
        $this->name = $ingredient->name;
    }

    public function updated($fields){
        $this->validateOnly($fields, [
            'name' => 'required'
        ]);
    }

    public function updateIngredient(){
        $this->validate([
            'name' => 'required'
        ]);
        $ingredient = Ingredient::find($this->ingredient_id);
        $ingredient->name = $this->name;
        $ingredient->save();

        session()->flash('message', 'Ingredient has been updated successfully!');
        return redirect()->route('admin.ingredients');

    }

    public function render()
    {
        return view('livewire.admin.admin-edit-ingredient-component')->layout('layouts.base');;
    }
}
