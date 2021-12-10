<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;

class Recipe extends Model
{
    use HasFactory;
    use Commentable;
    use Favoriteable;

    protected $table = "recipes";

    public function category()
    {
        return $this->belongsTo(FoodCategories::class, 'category_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public static function favorite(){
        $user = \Auth::user();
        $user->favorite(Recipe::class); // returns a collection with the Posts the User marked as favorite
    }
}
