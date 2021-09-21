<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\Variants;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariantsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variants::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(),
            'products_id' => rand(1, Products::count())
        ];
    }
}
