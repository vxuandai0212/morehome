<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class CheckCommentCount
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $comment_limit = 4;
        // now
        $time = time();

        $comment_count = $request->session()->get('comment_count');
    
        if ($comment_count === $comment_limit && $time < $request->session()->get('block_time')) {
            return response()->json([
                'message' => 'Ngày hôm nay bạn đã comment quá lượt cho phép!'
            ], 403);
        }
        if ($comment_count === $comment_limit && $time > $request->session()->get('block_time')) {
            $request->session()->put('comment_count', 0);
            $request->session()->put('block_time', $time);
        }
        return $next($request);
    }
}
