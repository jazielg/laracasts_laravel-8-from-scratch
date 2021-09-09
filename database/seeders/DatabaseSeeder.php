<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My First Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem, ipsum dolor sit</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint temporibus facilis sed quasi, officia dolores dolorum aut doloribus similique blanditiis vel aliquid quae aspernatur nisi error minima ratione. Recusandae, maiores?</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Second Post',
            'slug' => 'my-second-post',
            'excerpt' => '<p>Lorem, ipsum dolor sit</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint temporibus facilis sed quasi, officia dolores dolorum aut doloribus similique blanditiis vel aliquid quae aspernatur nisi error minima ratione. Recusandae, maiores?</p>'
        ]);
    }
}
