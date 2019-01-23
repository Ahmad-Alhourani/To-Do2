<?php

namespace App\Http\Controllers\Backend\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Comment\CreateComment;
use App\Http\Requests\Backend\Comment\UpdateComment;
use App\Repositories\Backend\CommentRepository;
use App\Events\Backend\Comment\CommentCreated;
use App\Events\Backend\Comment\CommentUpdated;
use App\Events\Backend\Comment\CommentDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Comment;

use App\Models\Person;
use App\Models\Todo;

class CommentController extends Controller
{
    /** @var $commentRepository */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Display a listing of the Comment.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->commentRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->commentRepository->getPaginatedAndSortable(10);

        return view('backend.comments.index')->with('comments', $data);
    }

    /**
     * Show the form for creating a new Comment.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        $men = Person::all();
        $selectedPerson = Person::first() ? Person::first()->_id : 0;

        $todos = Todo::all();
        $selectedTodo = Todo::first() ? Todo::first()->_id : 0;

        return view(
            'backend.comments.create',
            compact(
                "men",
                "selectedPerson",

                "todos",
                "selectedTodo"
            )
        );
    }

    /**
     * Store a newly created Comment in storage.
     *
     * @param CreateComment $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateComment $request)
    {
        $obj = $this->commentRepository->create(
            $request->only(["body", "person_id", "todo_id"])
        );

        event(new CommentCreated($obj));
        return redirect()
            ->route('admin.comment.index')
            ->withFlashSuccess(__('alerts.frontend.comment.saved'));
    }

    /**
     * Display the specified Comment.
     *
     * @param Comment $comment
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Comment $comment)
    {
        return view('backend.comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified Comment.
     *
     * @param Comment $comment
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Comment $comment)
    {
        $men = Person::all();
        $selectedPerson = $comment->man_id;

        $todos = Todo::all();
        $selectedTodo = $comment->todo_id;

        return view(
            'backend.comments.edit',
            compact("men", "selectedPerson", "todos", "selectedTodo")
        )->with('comment', $comment);
    }

    /**
     * Update the specified Comment in storage.
     *
     * @param UpdateComment $request
     *
     * @param Comment $comment
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateComment $request, Comment $comment)
    {
        $obj = $this->commentRepository->update($request->all(), $comment);

        event(new CommentUpdated($obj));
        return redirect()
            ->route('admin.comment.index')
            ->withFlashSuccess(__('alerts.frontend.comment.updated'));
    }

    /**
     * Remove the specified Comment from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Comment $comment)
    {
        $obj = $this->commentRepository->delete($comment);
        event(new CommentDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.comment.deleted'));
    }
}
