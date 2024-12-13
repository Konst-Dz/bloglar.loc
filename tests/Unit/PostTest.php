<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_belongs_to_user()
    {
        // Arrange
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        // Act
        $postUser = $post->user;

        // Assert
        $this->assertInstanceOf(User::class, $postUser);
        $this->assertEquals($user->id, $postUser->id);
    }

}
