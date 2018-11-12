<?php

namespace App\Listeners;

use App\Events\UserCommentedPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Session\Store;

class IncreaseCommentCount
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

    /**
     * Handle the event.
     *
     * @param  UserCommentedPost  $event
     * @return void
     */
    public function handle(UserCommentedPost $event)
    {
        // 6 hours
        $throttleTime = 3600 * 6;
        $time = time();
        if (session('comment_count') === null) {
            session(['comment_count' => 1]);
            session(['block_time' => $time + $throttleTime]);
        } else {
            $count = session('comment_count');
            session(['comment_count' => $count + 1]);
            session(['block_time' => $time + $throttleTime]);
        }
    }
}
