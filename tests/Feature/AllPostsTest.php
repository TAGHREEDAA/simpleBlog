<?php

namespace Tests\Feature;

use App\Category;
use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AllPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_posts()
    {
        $this->withoutExceptionHandling();

        // setup: to create post you need user_id and category_id
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        // create post
        $post = factory(Post::class)->create([
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);


        // go to home page
        $response = $this->get('/');

        // it should preview all posts title, category, description
        $response->assertSee($post->title);
        $response->assertSee(str_limit($post->description, 100));
        $response->assertSee($post->category->name);

        $response->assertStatus(200);
    }
}
