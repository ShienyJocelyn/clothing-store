<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clothes>
 */
class ClothesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => fake()->numberBetween(1,11),
            "category" => fake()->numberBetween(1,5),
            "product_name" => fake()->firstName(),
            "price" => fake()->buildingNumber(), 
            "description" => fake() ->text(),
            "seller_contact" => fake() ->e164PhoneNumber(), 
            'published_at' => now()
        ];
    }
}
