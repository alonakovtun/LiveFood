<?php

namespace Database\Factories;

use App\Models\FoodCategories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FoodCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FoodCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name = $this->faker->unique()->words($nd=2, $asText=true);
        $slug = Str::slug($category_name);
        return [
            'name' => $category_name,
            'slug' => $slug
        ];
    }
}
