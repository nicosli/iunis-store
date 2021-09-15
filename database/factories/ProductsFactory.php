<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Providers;
use App\Models\Variants;
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
        $variants = Variants::pluck('id')->toArray();
        
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'price' => rand(700, 1000),
            'public_price' => rand(800, 2000),
            'stock' => rand(100, 1000),
            'barcode' => $this->faker->unique()->ean13(),
            
            'category_id' => rand(1, Categories::count()), 
            'provider_id' => rand(1, Providers::count()),
            'variant_id' => rand(1, Variants::count())//$this->faker->randomElement($variants)
        ];
    }
}
