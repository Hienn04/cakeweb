<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productServices;
    protected $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productServices= $productService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getCategories();
        return view('website.product.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $products = $this->productServices->searchProduct('', $request->categoryId, $request->paginate, $request->status);
        return view('website.product.listProducts', compact('products'));
    }
}
