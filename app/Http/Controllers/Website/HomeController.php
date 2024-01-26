<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $categoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this ->categoryService = $categoryService;
        $this ->productService = $productService;

    }
    public function index()
    {
        $categories = $this->categoryService->getCategories();
        $product = $this->productService->getLimitProducts();
        return view('website.welcome', compact('categories', 'product'));
    }
    
    public function about()
    {
        return view('website.about');
    }
    

}
