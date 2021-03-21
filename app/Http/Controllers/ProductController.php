<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\EditProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', ['products'=>$products]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.add', ['categories'=>$categories]);
    }

    public function store(CreateProductRequest $request)
    {
        Product::create(
            array(
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'categoryId' => $request->category
        ));


        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::all();

        return view('admin.product.update', ['product'=>$product, 'categories'=>$categories]);
    }

    public function update(EditProductRequest $request)
    {


        Product::where('id', $request->id)->first()->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'categoryId' => $request->category
            ]
        );

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();

        return redirect()->route('admin.products.index');
    }
}
