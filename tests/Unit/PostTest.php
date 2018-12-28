<?php

namespace Tests\Unit;

use App\Post;
use App\Category;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    function test_post_belongs_to_category()
    {
        // setup: to create post you need user_id and category_id
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        // create post
        $post = factory(Post::class)->create([
            'category_id'=> $category->id,
            'user_id'=> $user->id,
        ]);

        // check post belongs to a category
        $this->assertInstanceOf(Category::class, $post->category);
    }


    function test_post_belongs_to_user()
    {
        // setup: to create post you need user_id and category_id
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        // create post
        $post = factory(Post::class)->create([
            'category_id'=> $category->id,
            'user_id'=> $user->id,
        ]);

        // check post belongs to a user
        $this->assertInstanceOf(User::class, $post->user);
    }
}
