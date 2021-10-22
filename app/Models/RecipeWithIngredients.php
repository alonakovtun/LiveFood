<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeWithIngredients extends Model
{
    use HasFactory;

    protected $table = "recipe_with_ingredients";

    public function recipe(){
        return $this->belongsToMany(Recipe::class, 'recipe_id');
    }

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class, 'ingredient_id');
    }
}
