<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_post_model(): void
    {
        $post = Post::factory()->create();
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
        ]);
    }
}
