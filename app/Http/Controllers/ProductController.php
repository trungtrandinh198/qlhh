<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }

    function create(){
        $categories = Category::all();
        return view('admin.product.add',['categories'=>$categories]);
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required|max:225',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        Product::create(
            array(
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'categoryId' => $request->category
        ));


        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }

    function edit($id){
        $product = Product::where('id',$id)->first();
        $categories = Category::all();
        return view('admin.product.update',['product'=>$product,'categories'=>$categories]);
    }

    function update(Request $request){
        $request->validate([
            'name' => 'required|max:225',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        Product::where('id',$request->id)->first()->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'categoryId' => $request->category
            ]
        );

        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }

    function destroy($id){
        Product::where('id',$id)->delete();

        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }
}
