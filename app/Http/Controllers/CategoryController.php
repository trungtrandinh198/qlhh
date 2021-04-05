<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{

    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $categories = $this->repository->all();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {

       $this->repository->create(
           [
                'name' => $request->name,
                'description' => $request->description
           ]
       );

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(EditCategoryRequest $request, Category $category)
    {

       $this->repository->update(
            [
                'name' => $request->name,
                'description' => $request->description
            ]
        , $category->id);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $this->repository->delete($category->id);

        return redirect()->route('admin.categories.index');
    }

}

