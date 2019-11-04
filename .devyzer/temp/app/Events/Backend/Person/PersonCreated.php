<?php
namespace App\Events\Backend\Person;

use Illuminate\Queue\SerializesModels;
/**
 * Class PersonCreated.
 */
class PersonCreated
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
