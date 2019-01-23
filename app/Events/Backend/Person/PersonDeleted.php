<?php namespace App\Events\Backend\Person;

use Illuminate\Queue\SerializesModels;
/**
 * Class PersonDeleted.
 */

class PersonDeleted
{
    use SerializesModels;
    /**
     * @var
     */

    public $man;

    /**
     * @param $man
     */
    public function __construct($man)
    {
        $this->man = $man;
    }
}
