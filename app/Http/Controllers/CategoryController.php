<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {

        Category::create(
            [
                'name' => $request->name,
                'description' => $request->description
            ]
        );

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.categories.edit', compact('category'));
    }

    public function update(EditCategoryRequest $request, Category $category)
    {

        $category = Category::where('id', $category->id)->first();

        $category->update(
            [
                'name' => $request->name,
                'description' => $request->description
            ]
        );

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        Category::where('id', $category->id)->delete();

        return redirect()->route('admin.categories.index');
    }

}
