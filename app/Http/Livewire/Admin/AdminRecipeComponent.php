<?php

namespace App\Http\Livewire\Admin;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class AdminRecipeComponent extends Component
{
    use WithPagination;
    public function deleteRecipe($id){
        $recipe = Recipe::find($id);
        $recipe->delete();
        session()->flash('message', 'Recipe has been deleted successfully!');
    }
    public function render()
    {
        $recipes = Recipe::paginate(10);
        return view('livewire.admin.admin-recipe-component', ['recipes'=>$recipes])->layout('layouts.base');
    }
}
