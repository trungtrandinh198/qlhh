<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DasboarController extends Controller
{
    public function index()
    {
        $totalCategory = Category::all()->count();
        $totalProduct = Product::all()->count();

        return view('admin.index', ['totalCategory'=>$totalCategory, 'totalProduct'=>$totalProduct]);
    }
}
