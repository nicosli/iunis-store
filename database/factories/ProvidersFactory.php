<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\Providers;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvidersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Providers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'address' => $this->faker->address(),
            'products_id' => rand(1, Products::count())
        ];
    }
}
