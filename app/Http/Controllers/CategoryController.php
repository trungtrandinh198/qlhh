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
            'description'=> 'required'
        ]);
        Category::create(
            array(
                'name'=>$request->name,
                'description'=>$request->description
            )
        );

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function edit($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.update',['category'=>$category]);
    }

    function update(Request $request){
        $request->validate([
            'name' => 'required|max:225',
            'description'=> 'required'
        ]);
        Category::where('id',$request->id)->first()->update(
            [
                'name' => $request->name,
                'description' => $request->description
            ]
        );

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

    function destroy($id){
        Category::where('id',$id)->delete();

        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }

}
