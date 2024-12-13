<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();
        $users = User::all();

        Post::factory()
            ->count(200)
            ->addAuthor($users)
            ->create()
            ->each(function ($post) use ($tags) {
                $postTags = $tags->random(rand(1, 3))->pluck('id');
                $post->tags()->attach($postTags);
            });
    }
}
