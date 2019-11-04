<?php

namespace App\Http\Controllers\Backend\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Todo\CreateTodo;
use App\Http\Requests\Backend\Todo\UpdateTodo;
use App\Repositories\Backend\TodoRepository;
use App\Events\Backend\Todo\TodoCreated;
use App\Events\Backend\Todo\TodoUpdated;
use App\Events\Backend\Todo\TodoDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Todo;

use App\Models\TodoCategory;

class TodoController extends Controller
{
    /** @var $todoRepository */
    private $todoRepository;

    public function __construct(TodoRepository $todoRepo)
    {
        $this->todoRepository = $todoRepo;
    }

    /**
     * Display a listing of the Todo.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->todoRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->todoRepository->getPaginatedAndSortable(10);

        return view('backend.todos.index')->with('todos', $data);
    }

    /**
     * Show the form for creating a new Todo.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        $categories = Category::all();
        $selectedCategory = [];

        return view(
            'backend.todos.create',
            compact("categories", "selectedCategory")
        );
    }

    /**
     * Store a newly created Todo in storage.
     *
     * @param CreateTodo $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateTodo $request)
    {
        $obj = $this->todoRepository->create(
            $request->only(["title", "description", "deadline"])
        );

        if (isset($request->all()['categories'])) {
            foreach ($request->all()['categories'] as $item) {
                if (is_null($item)) {
                    break;
                }
                $obj1 = new TodoCategory();
                $obj1->todo_id = $obj->id;
                $obj1->category_id = $item;
                $obj1->save();
            }
        }

        event(new TodoCreated($obj));
        return redirect()
            ->route('admin.todo.index')
            ->withFlashSuccess(__('alerts.frontend.todo.saved'));
    }

    /**
     * Display the specified Todo.
     *
     * @param Todo $todo
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Todo $todo)
    {
        return view('backend.todos.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified Todo.
     *
     * @param Todo $todo
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Todo $todo)
    {
        $categories = Category::all();
        $selectedCategory = [];
        $related_items = TodoCategory::where('todo_id', '=', $todo->id)->get();
        foreach ($related_items as $related_item) {
            array_push($selectedCategory, $related_item->category_id);
        }

        return view(
            'backend.todos.edit',
            compact("categories", "selectedCategory")
        )->with('todo', $todo);
    }

    /**
     * Update the specified Todo in storage.
     *
     * @param UpdateTodo $request
     *
     * @param Todo $todo
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateTodo $request, Todo $todo)
    {
        $obj = $this->todoRepository->update($request->all(), $todo);

        if (isset($request->all()['categories'])) {
            $todo->categories()->detach();
            foreach ($request->all()['categories'] as $item) {
                if (is_null($item)) {
                    break;
                }
                $relate_item = new TodoCategory();
                $relate_item->todo_id = $todo->id;
                $relate_item->category_id = $item;
                $relate_item->save();
            }
        }
        event(new TodoUpdated($obj));
        return redirect()
            ->route('admin.todo.index')
            ->withFlashSuccess(__('alerts.frontend.todo.updated'));
    }

    /**
     * Remove the specified Todo from storage.
     *
     * @param Todo $todo
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Todo $todo)
    {
        $obj = $this->todoRepository->delete($todo);
        event(new TodoDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.todo.deleted'));
    }
}
