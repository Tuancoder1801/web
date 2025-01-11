<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Request\Category\CategoryRequest;
use App\Http\Services\Category\CategoryService;
use Illuminate\Http\Request;

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
}
