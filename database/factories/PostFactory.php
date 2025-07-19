<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3, true),
            'writer_id' => \App\Models\Writer::factory(),
            'published_at' => $this->faker->optional()->dateTimeThisYear(),
        ];
    }
} 