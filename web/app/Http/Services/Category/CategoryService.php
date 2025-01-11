<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CategoryService
{       
    public function getParent($id = 0)
    {
        return Category::where('id', 0)->get();
    }
    
    public function create($request)
    {
        try {
            $category = Category::create([
                'name' => (string)$request->input('name'),
            ]);

            // Đặt thông báo thành công trước khi return
            Session::flash('success', 'Tạo Danh Mục Thành Công');
            return $category;
        } catch (\Exception $err) {
            // Đặt thông báo lỗi
            Session::flash('error', $err->getMessage());
            return false;
        }
    }
}
