<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Ingredient;
use App\Models\UserIngredient;

class UserAddIngredientsComponent extends Component
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

        if (!empty($ingredient->id)) {
            UserIngredient::create([
                'ingredient_id' => $ingredient->id,
                'user_id' => \Auth::id()
            ]);
        }

        session()->flash('message', 'Ingredient has been created successfully!');
        return redirect()->route('user.ingredients');
    }

    public function render()
    {
        return view('livewire.user.user-add-ingredients-component')->layout('layouts.base');
    }
}
