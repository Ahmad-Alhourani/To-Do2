<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCommentAPIRequest;
use App\Http\Requests\API\UpdateCommentAPIRequest;
use App\Models\Comment;
use App\Repositories\Backend\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Person;
use App\Models\Todo;

/**
 * Class CommentAPIController
 * @package App\Http\Controllers\API
 */
class CommentAPIController extends Controller
{
    /** @var  CommentRepository */
    private $commentRepository;
    /** @var  CommentModel */
    private $commentModel;

    public function __construct(
        CommentRepository $commentRepo,
        Comment $comment
    ) {
        $this->commentRepository = $commentRepo->skipCache(true);
        $this->commentModel = $comment;
    }

    /**
     * Display a listing of the Comment.
     * GET|HEAD /comments
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $comments = $this->commentRepository->all();
        return response()->json([
            'data' => $comments,
            'Comments retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Comment in storage.
     * POST /comments
     *
     * @param CreateCommentAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateCommentAPIRequest $request)
    {
        $input = $request->all();
        $this->commentRepository->create($input);
        return response()->json(['Comment saved successfully']);
    }

    /**
     * Display the specified Comment.
     * GET|HEAD /comments/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Comment $comment */
        //   $comment = $this->commentRepository->findByField('id',$id);
        $comment = $this->commentModel->find($id);
        return response()->json([
            'data' => $comment,
            'Comment retrieved successfully'
        ]);
    }

    /**
     * Update the specified Comment in storage.
     * PUT/PATCH /comments/{id}
     *
     * @param  int $id
     * @param UpdateCommentAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdateCommentAPIRequest $request)
    {
        $input = $request->all();
        /** @var Comment $comment */
        $comment = $this->commentModel->find($id);
        $comment = $this->commentRepository->update($comment, $input);
        return response()->json(['Comment updated successfully']);
    }

    /**
     * Remove the specified Comment from storage.
     * DELETE /comments/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Comment $comment */
        $comment = $this->commentModel->find($id);
        $comment->delete();

        return response()->json('Comment deleted successfully');
    }
}
