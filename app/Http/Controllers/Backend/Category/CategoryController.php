<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Category\CreateCategory;
use App\Http\Requests\Backend\Category\UpdateCategory;
use App\Repositories\Backend\CategoryRepository;
use App\Events\Backend\Category\CategoryCreated;
use App\Events\Backend\Category\CategoryUpdated;
use App\Events\Backend\Category\CategoryDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Category;

use App\Models\TodoCategory;

class CategoryController extends Controller
{
    /** @var $categoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->categoryRepository->getPaginatedAndSortable(10);

        return view('backend.categories.index')->with('categories', $data);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        $todos = Todo::all();
        $selectedTodo = [];

        return view(
            'backend.categories.create',
            compact("todos", "selectedTodo")
        );
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategory $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateCategory $request)
    {
        $obj = $this->categoryRepository->create($request->only(["name"]));

        if (isset($request->all()['todos'])) {
            foreach ($request->all()['todos'] as $item) {
                if (is_null($item)) {
                    break;
                }
                $obj1 = new TodoCategory();
                $obj1->category_id = $obj->id;
                $obj1->todo_id = $item;
                $obj1->save();
            }
        }

        event(new CategoryCreated($obj));
        return redirect()
            ->route('admin.category.index')
            ->withFlashSuccess(__('alerts.frontend.category.saved'));
    }

    /**
     * Display the specified Category.
     *
     * @param Category $category
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Category $category)
    {
        return view('backend.categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param Category $category
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Category $category)
    {
        $todos = Todo::all();
        $selectedTodo = [];
        $related_items = TodoCategory::where(
            'category_id',
            '=',
            $category->id
        )->get();
        foreach ($related_items as $related_item) {
            array_push($selectedTodo, $related_item->todo_id);
        }

        return view(
            'backend.categories.edit',
            compact("todos", "selectedTodo")
        )->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param UpdateCategory $request
     *
     * @param Category $category
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $obj = $this->categoryRepository->update($request->all(), $category);

        if (isset($request->all()['todos'])) {
            $category->tasks()->detach();
            foreach ($request->all()['todos'] as $item) {
                if (is_null($item)) {
                    break;
                }
                $relate_item = new TodoCategory();
                $relate_item->category_id = $category->id;
                $relate_item->todo_id = $item;
                $relate_item->save();
            }
        }
        event(new CategoryUpdated($obj));
        return redirect()
            ->route('admin.category.index')
            ->withFlashSuccess(__('alerts.frontend.category.updated'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param Category $category
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Category $category)
    {
        $obj = $this->categoryRepository->delete($category);
        event(new CategoryDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.category.deleted'));
    }
}
