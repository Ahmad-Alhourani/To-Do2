<?php
namespace App\Events\Backend\Todo;

use Illuminate\Queue\SerializesModels;
/**
 * Class TodoCreated.
 */
class TodoCreated
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
