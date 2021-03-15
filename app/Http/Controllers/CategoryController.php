<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function index(){
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function create(){
        return view('admin.category.add');
    }

    function store(Request $request){
       $request->validate([
            'name' => 'required|max:225',
            'description'=> 'required:double'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function edit($id){
        $category = Category::find($id);
        return view('admin.category.update',['category'=>$category]);
    }

    function update(Request $request){
        $request->validate([
            'name' => 'required|max:225',
            'description'=> 'required:double'
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function destroy($id){
        $category = Category::find($id);
        $category->delete();

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

}
