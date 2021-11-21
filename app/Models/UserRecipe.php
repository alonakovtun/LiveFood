<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecipe extends Model
{
    use HasFactory;

    protected $table = "user_recipes";
    protected $fillable = ['recipe_id', 'user_id'];
    public $timestamps = false;
}
