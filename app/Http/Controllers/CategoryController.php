<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function index(){
        $categories = Category::all();
        dd($categories);
        //return view('admin.category.index','$categories);
    }

    function add(){
        //return view('admin.category.add');
    }

    function postAdd(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $categories = Category::all();
        dd($categories);
        //return view('admin.category.index','$categories);
    }

    function update($id){
        $category = Category::find($id);
        dd($category);
        //return view('admin.category.edit','$category');
    }

    function postUpdate(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $categories = Category::all();
        dd($categories);
        //return view('admin.category.index','$categories);
    }

    function delete(Request $id){
        $category = Category::find($id);
        $category->delete();

        $categories = Category::all();
        dd($categories);
        //return view('admin.category.index','$categories);
    }

}
