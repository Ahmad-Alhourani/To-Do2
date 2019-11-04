<?php
namespace App\Listeners\Backend;

/**
 * Class CommentEventListener.
 */
/**
 * Class CommentCreated.
 */
class CommentEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Comment Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Comment  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Comment Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Comment\CommentCreated::class,
            'App\Listeners\Backend\CommentEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Comment\CommentUpdated::class,
            'App\Listeners\Backend\CommentEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Comment\CommentDeleted::class,
            'App\Listeners\Backend\CommentEventListener@onDeleted'
        );
    }
}
