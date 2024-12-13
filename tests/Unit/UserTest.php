<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_many_posts()
    {
        // Arrange
        $user = User::factory()->create();
        $post1 = Post::factory()->create(['user_id' => $user->id]);
        $post2 = Post::factory()->create(['user_id' => $user->id]);

        // Act
        $userPosts = $user->posts;

        // Assert
        $this->assertInstanceOf(Post::class, $userPosts->first());
        $this->assertEquals($user->id, $userPosts->first()->user->id);
        $this->assertEquals($user->id, $userPosts->last()->user->id);
    }

    public function test_user_post_is_null_if_no_post_exists()
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $userPost = $user->posts;

        // Assert
        $this->assertCount(0,$userPost);
    }
}
