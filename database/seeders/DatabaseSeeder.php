<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Masih'
        ]);

        $categories = Category::factory()->createMany([
            ['name' => 'General', 'slug' => 'general'],
            ['name' => 'Front-end', 'slug' => 'front-end'],
            ['name' => 'Back-end', 'slug' => 'back-end'],
        ]);

        Post::factory(5)->create([
            'user_id' => $user,
            'category_id' => function () {
                return Category::all()->random()->id;
            },
        ]);
    }
}
