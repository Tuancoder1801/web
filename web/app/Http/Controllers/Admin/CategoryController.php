<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Request\Category\CategoryRequest;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function create()
    {   
        return view('admin.category.add', [
            'title' => 'Thêm danh mục mới',
            //'Categories' => $this->categoryService
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.category.list', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'categories' => $this->categoryService->getAll()
        ]);
    }

    public function show(Category $category)
    {
        return view('admin.category.edit', [
            'title' => 'Chỉnh sửa danh mục: ' . $category->name,
            'category' => $category,
            'categories' => $this->categoryService->getParent()
        ]);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $this->categoryService->update($request, $category);

        return redirect('/admin/categories/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request);

        if($result)
        {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        
        return response()->json([
            'error' => true,
        ]);
    }
}
