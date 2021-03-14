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

    function add(){
        $categories = Category::all();
        return view('admin.product.add',['categories'=>$categories]);
    }

    function postAdd(Request $request){
        $request->validate([
            'name' => 'required|max:225',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categoryId = $request->category;
        $product->save();

        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }

    function update($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.update',['product'=>$product,'categories'=>$categories]);
    }

    function postUpdate(Request $request){
        $request->validate([
            'name' => 'required|max:225',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categoryId = $request->category;
        $product->save();

        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }

    function delete($id){
        $product = Product::find($id);
        $product->delete();

        $products = Product::all();
        return view('admin.product.index',['products'=>$products]);
    }
}
