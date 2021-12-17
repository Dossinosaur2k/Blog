<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_u' => 1,
            'title' => $this->faker->text,
            'content' => $this->faker->sentence,
        ];
    }
}
