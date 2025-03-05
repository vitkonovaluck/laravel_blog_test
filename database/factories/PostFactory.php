<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'       => 'Пост про '.$this->faker->name,
            'content'     => $this->faker->paragraph(5),
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
        ];
    }
}
