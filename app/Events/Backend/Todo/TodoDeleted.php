<?php namespace App\Events\Backend\Todo;

use Illuminate\Queue\SerializesModels;
/**
 * Class TodoDeleted.
 */

class TodoDeleted
{
    use SerializesModels;
    /**
     * @var
     */

    public $todo;

    /**
     * @param $todo
     */
    public function __construct($todo)
    {
        $this->todo = $todo;
    }
}
