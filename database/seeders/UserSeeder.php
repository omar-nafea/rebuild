<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    User::factory()->create([
      "name" => "Admin",
      "email" => "OmarNN@gmail.com",
      "password" => bcrypt("passToOmar123"),
      "role" => "admin"
    ]);
    User::factory()->create([
      "name" => "Man Editor",
      "email" => "man@editor.com",
      "password" => bcrypt("12345678"),
      "role" => "editor"
    ]);
    User::factory()->create([
      "name" => "Woman Editor",
      "email" => "woman@editor.com",
      "password" => bcrypt("12345678"),
      "role" => "editor"
    ]);
  }
}
