<?php

namespace Database\Factories;

use App\Models\Resto;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->text(),
            'rating' => $this->faker->numberBetween(1,5),
            'resto_id' => Resto::factory(),
            'review_id' => Review::factory(),
        ];
    }
}
