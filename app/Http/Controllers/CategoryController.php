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

        return view('admin.category.index', ['categories'=>$categories]);
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(CreateCategoryRequest $request)
    {
        $request->validate();

        Category::create(
            array(
                'name'=>$request->name,
                'description'=>$request->description
            )
        );

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.category.update', ['category'=>$category]);
    }

    public function update(EditCategoryRequest $request)
    {
        $request->validate();

        Category::where('id', $request->id)->first()->update(
            [
                'name' => $request->name,
                'description' => $request->description
            ]
        );

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('admin.categories.index');
    }

}
