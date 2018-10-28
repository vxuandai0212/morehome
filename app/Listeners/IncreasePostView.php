<?php

namespace App\Listeners;

use App\Events\UserViewedPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Session\Store;

class IncreasePostView
{
    private $session;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(UserViewedPost $event)
    {
        $post = $event->post;
        if (!$this->isPostViewed($post))
	    {
	        $post->increment('view_count');
	        $this->storePost($post);
	    }
    }

    private function isPostViewed($post)
	{
	    $viewed = $this->session->get('viewed_posts', []);

	    return array_key_exists($post->id, $viewed);
	}

	private function storePost($post)
	{
	    $key = 'viewed_posts.' . $post->id;

	    $this->session->put($key, time());
	}
}
