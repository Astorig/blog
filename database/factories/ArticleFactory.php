<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word(),
            'title' => $this->faker->title(),
            'description' => $this->faker->sentence(),
            'content' => $this->faker->sentence(),
            'user_id' => User::factory(),
        ];
    }
}
