<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        Comment::factory()
            ->count(100)
            ->addAuthor($users)
            ->pinToPost($posts)
            ->create();

    }
}
