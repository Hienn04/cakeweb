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

        // Sách mới
        $newbooks = Product::where('category_id', 1)->take(5)->get();

        // Sách văn học 
        $vanhoc = Product::where('category_id', 4)->take(5)->get();

        //sach thieu nhi
        $thieunhi = Product::where('category_id',2)->take(5)->get();


        //listCaetegory
        $listCate = Category::get();
        // return $listCate;


        // return $thieunhi;
        return view('website.welcome', compact('categories', 
        'product', 'newbooks', 'vanhoc', 'thieunhi', 'listCate'));
    }
    
    public function about()
    {
        return view('website.about');
    }
    

}
