<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $products = Product::all();
        dd($products);
        //return view('admin.product.index','$products);
    }

    function add(){
        $categories = Product::all();
        dd($categories);
        //return view('admin.product.add','$categories);
    }

    function postAdd(Request $request){
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categoryId = $request->categoryId;
        $product->save();

        $products = Product::all();
        dd($products);
        //return view('admin.product.list','$products');
    }

    function update($id){
        $product = Product::find($id);
        dd($product);
        //return view('admin.product.edit','$product');
    }

    function postUpdate(Request $request){
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categoryId = $request->categoryId;
        $product->save();

        $products = Product::all();
        dd($products);
        //return view('admin.product.list','$products');
    }

    function delete(Request $id){
        $product = Product::find($id);
        $product->delete();

        $products = Product::all();
        dd($products);
        //return view('admin.product.list','$products');
    }
}
