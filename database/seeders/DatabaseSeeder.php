<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); {
            \App\Models\Writer::factory(100)->create()->each(function ($writer) {
                \App\Models\Post::factory(1)->create(['writer_id' => $writer->id]);
            });
            \App\Models\Post::factory(100)->create();
        }
    }
}
