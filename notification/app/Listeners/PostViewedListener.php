<?php

namespace App\Listeners;

use App\Events\ViewedPosstEvent;
use App\Models\User;
use App\Notifications\ViewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
class PostViewedListener
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(ViewedPosstEvent $event): void
    {
        $postAuthor = User::find($event->post->user_id);
        if ($postAuthor->id != Auth::id()){
            $post = $event->post;
            $post->increment('num_view');
            $postAuthor->notify(new ViewPost($event->viewer,$event->post));
        }
    }
}
