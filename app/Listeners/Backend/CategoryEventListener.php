<?php
namespace App\Listeners\Backend;

/**
 * Class CategoryEventListener.
 */
/**
 * Class CategoryCreated.
 */
class CategoryEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Category Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Category  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Category Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Category\CategoryCreated::class,
            'App\Listeners\Backend\CategoryEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Category\CategoryUpdated::class,
            'App\Listeners\Backend\CategoryEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Category\CategoryDeleted::class,
            'App\Listeners\Backend\CategoryEventListener@onDeleted'
        );
    }
}
