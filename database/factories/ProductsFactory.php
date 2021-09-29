<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Providers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence($nbWords = 20, $variableNbWords = true),
            'price' => rand(700, 1000),
            'public_price' => rand(800, 2000),
            'stock' => rand(100, 1000),
            'reviews' => rand(500, 1000),
            'stars' => rand(1, 5),
            'barcode' => $this->faker->unique()->ean13(),
            'image' => $this->faker->imageUrl($width = 400, $height = 400),
            'category_id' => rand(1, Categories::count())
        ];
    }
}
