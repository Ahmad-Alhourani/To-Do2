<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTodoAPIRequest;
use App\Http\Requests\API\UpdateTodoAPIRequest;
use App\Models\Todo;
use App\Repositories\Backend\TodoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class TodoAPIController
 * @package App\Http\Controllers\API
 */
class TodoAPIController extends Controller
{
    /** @var  TodoRepository */
    private $todoRepository;
    /** @var  TodoModel */
    private $todoModel;

    public function __construct(TodoRepository $todoRepo, Todo $todo)
    {
        $this->todoRepository = $todoRepo->skipCache(true);
        $this->todoModel = $todo;
    }

    /**
     * Display a listing of the Todo.
     * GET|HEAD /todos
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $todos = $this->todoRepository->all();
        return response()->json([
            'data' => $todos,
            'Todoes retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Todo in storage.
     * POST /todos
     *
     * @param CreateTodoAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateTodoAPIRequest $request)
    {
        $input = $request->all();
        $this->todoRepository->create($input);
        return response()->json(['Todo saved successfully']);
    }

    /**
     * Display the specified Todo.
     * GET|HEAD /todos/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Todo $todo */
        //   $todo = $this->todoRepository->findByField('id',$id);
        $todo = $this->todoModel->find($id);
        return response()->json([
            'data' => $todo,
            'Todo retrieved successfully'
        ]);
    }

    /**
     * Update the specified Todo in storage.
     * PUT/PATCH /todos/{id}
     *
     * @param  int $id
     * @param UpdateTodoAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdateTodoAPIRequest $request)
    {
        $input = $request->all();
        /** @var Todo $todo */
        $todo = $this->todoModel->find($id);
        $todo = $this->todoRepository->update($todo, $input);
        return response()->json(['Todo updated successfully']);
    }

    /**
     * Remove the specified Todo from storage.
     * DELETE /todos/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Todo $todo */
        $todo = $this->todoModel->find($id);
        $todo->delete();

        return response()->json('Todo deleted successfully');
    }
}
