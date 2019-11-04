<?php
namespace App\Listeners\Backend;

/**
 * Class TodoEventListener.
 */
/**
 * Class TodoCreated.
 */
class TodoEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Todo Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Todo  Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Todo Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Todo\TodoCreated::class,
            'App\Listeners\Backend\TodoEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Todo\TodoUpdated::class,
            'App\Listeners\Backend\TodoEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Todo\TodoDeleted::class,
            'App\Listeners\Backend\TodoEventListener@onDeleted'
        );
    }
}
