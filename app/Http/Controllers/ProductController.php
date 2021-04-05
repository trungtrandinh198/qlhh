<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepository;

class ProductController extends Controller
{
    protected $repossitory;
    public function __construct(ProductRepository $repository)
    {
        $this->repossitory =  $repository;
    }

    public function index()
    {
        $products = $this->repossitory->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $this->repossitory->create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]
        );

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories' ));
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $this->repossitory->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]
        , $product->id);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $this->repossitory->delete($product->id);

        return redirect()->route('admin.products.index');
    }
}
