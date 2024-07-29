<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    public function test_post_model(): void
    {
        $post = Post::factory()->create();
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
        ]);
    }

    public function test_posts_user_relationship(): void
    {
        $user = User::factory()->has(Post::factory()->count(3))->create();
        $this->assertDatabaseCount('posts', 3);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('posts', [ 'user_id' => $user->id ]);
    }
}
