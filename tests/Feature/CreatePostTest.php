<?php

namespace Tests\Feature;

use App\Category;
use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{

    use RefreshDatabase;

    public function test_an_admin_can_create_post()
    {
        $this->withoutExceptionHandling();

        $admin = factory(User::class)->states('admin')->create();

        $user = $this->be($admin);

        // And Giving Post object
        $post = factory(Post::class)->make([
            'category_id' => factory(Category::class)->create()->id,
            'user_id' => $admin->id
        ]);

        // When the admin create Post
        $this->post('/admin/posts', $post->toArray());

        // When their redirect to posts
        $response = $this->get('/admin/posts' . $post->id);

        // Then their should see post
        $response->assertSee("Title","Description","Content","Category");
        $response->assertSee("Post Is Created Successfully");
    }

    public function test_a_user_can_not_create_post()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->be($user);

        // And Giving Post object
        $post = factory(Post::class)->make([
            'category_id' => factory(Category::class)->create()->id,
            'user_id' => $user->id
        ]);

        // When the admin create Post
        $this->post('/admin/posts', $post->toArray());

        // When their redirect to /
        $response = $this->get('/');

        // Then their should see the / page which has Categories menu and username in the navbar
        $response->assertSee('Categories');
        $response->assertSee($user->name);
    }

    public function test_an_admin_can_show_post_create()
    {
        $this->withoutExceptionHandling();

        $admin = factory(User::class)->states('admin')->create();

        $user = $this->be($admin);

        $response = $this->get('/admin/posts/create');

        // Then their should see post
        $response->assertSee('Title');
    }
}
