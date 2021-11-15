<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeWithIngredients extends Model
{
    use HasFactory;

    protected $table = "recipe_with_ingredients";
    protected $fillable = ['recipe_id', 'ingredient_id'];

    public function recipe(){
        return $this->hasMany(Recipe::class, 'recipe_id');
    }

    public function ingredients(){
        return $this->hasMany(Ingredient::class, 'ingredient_id');
    }
}
