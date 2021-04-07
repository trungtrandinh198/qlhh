<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $repository)
    {
        $this->categoryRepository = $repository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', 5);
        $categories = $this->categoryRepository->paginate($limit);

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {

       $this->categoryRepository->create($request->validated());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(EditCategoryRequest $request, Category $category)
    {

       $this->categoryRepository->update($request->validated(), $category->id);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category->id);

        return redirect()->route('admin.categories.index');
    }

}

