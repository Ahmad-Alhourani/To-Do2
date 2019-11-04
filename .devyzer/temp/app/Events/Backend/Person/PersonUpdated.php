<?php namespace App\Events\Backend\Person;

use Illuminate\Queue\SerializesModels;
/**
 * Class PersonUpdated.
 */
class PersonUpdated
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
