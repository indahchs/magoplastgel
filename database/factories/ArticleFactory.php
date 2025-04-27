<?php

namespace Database\Factories;

use App\Models\Article;
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

    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'user_id' => "9d08582d-0b84-4862-91a5-fd9581490c12",
            'article_category_id' => "7d08582d-0b84-4862-91a5-fd9581490c20",
            'title' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'slug' => fake()->slug(),
            'thumbnail' => 'content/kahjrwvmVAwwHO6sYzHni2LwvkYNwE1eTboazDqR.jpg',
            'body' => '<p>' . fake()->realText($maxNbChars = 2000, $indexSize = 2) . '</p>',
            'status' => fake()->randomElement(['publish', 'draft', 'pending']),
            'tags' => fake()->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
