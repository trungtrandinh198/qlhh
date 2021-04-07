<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\EditProductRequest;
use App\Models\Product;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepossitory;
    protected $categoryRepository;
    public function __construct(ProductRepository $productRepossitory, CategoryRepository $categoryRepository)
    {
        $this->productRepossitory =  $productRepossitory;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', 5);
        $products = $this->productRepossitory->paginate($limit);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $this->productRepossitory->create($request->validated());

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->all();

        return view('admin.products.edit', compact('product', 'categories' ));
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $this->productRepossitory->update($request->validated(), $product->id);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $this->productRepossitory->delete($product->id);

        return redirect()->route('admin.products.index');
    }
}
