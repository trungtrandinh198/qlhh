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

    function add(){
        return view('admin.category.add');
    }

    function postAdd(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function update($id){
        $category = Category::find($id);
        return view('admin.category.update',['category'=>$category]);
    }

    function postUpdate(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function delete(Request $id){
        $category = Category::find($id);
        $category->delete();

        $categories = Category::all();
        dd($categories);
        //return view('admin.category.index','$categories);
    }

}
