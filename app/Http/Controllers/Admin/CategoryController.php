<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        // $listCate = Category::get();
        return view('admin.category.index');
    }

    public function search(Request $request)
    {
        $data = $this->categoryService->searchCategory($request->searchName);
        return view('admin.category.table', ['data' => $data]);
    }

    public function create(StoreCategoryRequest $request)
    {
        $this->categoryService->createCategory($request);
        return response()->json('ok');
    }

    public function update(StoreCategoryRequest $request)
    {
        $this->categoryService->updateCategory($request);
        return response()->json('ok');
    }

    public function delete($id)
    {
        $this->categoryService->deleteCategory($id);
        return response()->json('ok');
    }
}
