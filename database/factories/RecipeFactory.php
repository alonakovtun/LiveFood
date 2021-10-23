<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $recipe_name = $this->faker->unique()->words($nd=4, $asText=true);
        $slug = Str::slug($recipe_name);

        return [
            'name' => $recipe_name,
            'slug' => $slug,
            'description' => $this->faker->text(1000),
            'short_description' => $this->faker->text(1000),
            'image'=> 'img-' . $this->faker->unique()->numberBetween(1,9).'.jpg',
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
