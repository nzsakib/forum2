<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadsTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function guest_may_not_create_threads()
    {
        $this->get('threads/create')
                ->assertRedirect('/login');
     
        $this->post('/threads')
                ->assertRedirect('/login');
	}

    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
    	$this->signIn();

    	$thread = create('App\Thread');

    	$response = $this->post('/threads', $thread->toArray());

    	$this->get($response->getTargetUrl())
				->assertSee($thread->title)
    			->assertSee($thread->body);
    }
}
