<?php
    namespace App\Events\Backend\Comment;

    use Illuminate\Queue\SerializesModels;
    /**
    * Class CommentCreated.
    */
    class CommentCreated
    {
            use SerializesModels;
            /**
            * @var
            */


            public $comment ;

            /**
            * @param $comment
            */
            public function __construct($comment)
            {
                 $this->comment = $comment;
            }
    }
