<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoryAPIRequest;
use App\Http\Requests\API\UpdateCategoryAPIRequest;
use App\Models\Category;
use App\Repositories\Backend\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class CategoryAPIController
 * @package App\Http\Controllers\API
 */
class CategoryAPIController extends Controller
{
    /** @var  CategoryRepository */
    private $categoryRepository;
    /** @var  CategoryModel */
    private $categoryModel;

    public function __construct(
        CategoryRepository $categoryRepo,
        Category $category
    ) {
        $this->categoryRepository = $categoryRepo->skipCache(true);
        $this->categoryModel = $category;
    }

    /**
     * Display a listing of the Category.
     * GET|HEAD /categories
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->all();
        return response()->json([
            'data' => $categories,
            'Categorys retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Category in storage.
     * POST /categories
     *
     * @param CreateCategoryAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateCategoryAPIRequest $request)
    {
        $input = $request->all();
        $this->categoryRepository->create($input);
        return response()->json(['Category saved successfully']);
    }

    /**
     * Display the specified Category.
     * GET|HEAD /categories/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Category $category */
        //   $category = $this->categoryRepository->findByField('id',$id);
        $category = $this->categoryModel->find($id);
        return response()->json([
            'data' => $category,
            'Category retrieved successfully'
        ]);
    }

    /**
     * Update the specified Category in storage.
     * PUT/PATCH /categories/{id}
     *
     * @param  int $id
     * @param UpdateCategoryAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdateCategoryAPIRequest $request)
    {
        $input = $request->all();
        /** @var Category $category */
        $category = $this->categoryModel->find($id);
        $category = $this->categoryRepository->update($category, $input);
        return response()->json(['Category updated successfully']);
    }

    /**
     * Remove the specified Category from storage.
     * DELETE /categories/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Category $category */
        $category = $this->categoryModel->find($id);
        $category->delete();

        return response()->json('Category deleted successfully');
    }
}
