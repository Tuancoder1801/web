<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Request\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get(),
        ]);
    }

    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm Sản Phẩm Mới',
            'categories' => $this->productService->getCategory()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->back();
    }

    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'product' => $product,
            'categories' => $this->productService->getCategory()
        ]);
    }
}
