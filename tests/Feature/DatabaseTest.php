<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;
    public function PostModel_NewPostCreated_PostExistsInDatabase(): void
    {
        $post = Post::factory()->create();
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
        ]);
    }

    public function PostsUserRelationship_ThreePostsPerUser_UserIdInPostsTable(): void
    {
        $user = User::factory()->has(Post::factory()->count(3))->create();
        $this->assertDatabaseCount('posts', 3);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('posts', [ 'user_id' => $user->id ]);
    }

    public function Authentication_NoUsersOrPostsInDatabase_DatabaseIsEmpty(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
    }
}
