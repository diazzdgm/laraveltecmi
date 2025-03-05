<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuperHero>
 */
class SuperHeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'universe_id' => fake()->numberBetween(1,2),
            'gender_id' => fake()->numberBetween(1,3),
            'name' => fake()->name(),
            'real_name' => fake()->userName(),
            'picture' => fake()->imageUrl(640,480,'superheroes')
        ];
    }
}
