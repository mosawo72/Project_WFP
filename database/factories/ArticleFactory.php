<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
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
            'user_id' => User::factory()->admin(),
            'title' => fake()->sentence(6),
            'content' => fake()->paragraphs(5, true),
            'image' => null,
            'category' => fake()->randomElement([
                'Nutrisi',
                'Olahraga',
                'Kesehatan Mental',
                'Penyakit',
                'Tips Kesehatan',
                'Gaya Hidup',
            ]),
            'status' => fake()->randomElement(['draft', 'published']),
        ];
    }

    /**
     * Set the article status to published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
        ]);
    }

    /**
     * Set the article status to draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
        ]);
    }
}
