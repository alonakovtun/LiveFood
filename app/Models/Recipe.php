<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Recipe extends Model
{
    use HasFactory;
    use Commentable;

    protected $table = "recipes";

    public function category(){
        return $this->belongsTo(FoodCategories::class, 'category_id');
    }
}
