<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categoryIds = \App\Models\Category::pluck('id')->toArray();

    if (empty($categoryIds)) {
        // Optionally, throw an error or just return
        throw new \Exception('No categories found. Seed categories before posts.');
    }

    Post::factory()->count(50)->create()->each(function ($post) use ($categoryIds) {
        $categoryId = $categoryIds[array_rand($categoryIds)];
        $post->categories()->attach($categoryId);
    });
  }
}
