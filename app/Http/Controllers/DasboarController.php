<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Http\Request;

class DasboarController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $totalCategory = $this->categoryRepository->count();
        $totalProduct = $this->productRepository->count();

        return view('admin.index', compact('totalCategory', 'totalProduct'));
    }
}
