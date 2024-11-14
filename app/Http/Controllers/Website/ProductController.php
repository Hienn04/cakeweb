<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productServices;
    protected $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productServices = $productService;
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

    public function details($id)
    {
        $productDetail =  $this->productServices->find($id);

        $relatedProducts = Product::where('category_id', $productDetail->category_id)->where('id', '!=', $id)->take(5)->get();
        // return $relatedProducts;

        return view('website.product.details', [
            'productDetail' => $productDetail,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    public function listCate($id) {
        $listPro = Product::where("category_id", $id)->get();
        $nameCate = Category::where('id', $id)->first();
        // return $listPro;

        return view('website.product.productCate', [
            'listPro' => $listPro,
            'nameCate' => $nameCate,
        ]);
    }
}
