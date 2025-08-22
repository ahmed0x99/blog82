<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory(10)->create();
    //     User::create([
    //         'name' => "Ahmed Galal",
    //         "email" => "ahmed@gmail.com",
    //         "password" => Hash::make("1234")
    //     ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\Category::factory(5)->create();

        // \App\Models\Post::factory(10)->create();

        // \App\Models\Comment::factory(20)->create(); 
    }
}
