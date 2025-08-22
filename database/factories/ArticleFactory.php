<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'content' => $this->faker->paragraph,
            'author_id' => \App\Models\User::factory(),
            'time_to_read' => $this->faker->numberBetween(1, 10),
            'is_published' => $this->faker->boolean,
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
