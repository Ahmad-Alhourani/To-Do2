<?php namespace App\Events\Backend\Comment;

use Illuminate\Queue\SerializesModels;
/**
 * Class CommentUpdated.
 */
class CommentUpdated
{
    use SerializesModels;
    /**
     * @var
     */

    public $comment;

    /**
     * @param $comment
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }
}
