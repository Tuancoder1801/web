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

    public function getAll()
    {
        return Category::OrderByDesc('id')->paginate(20);
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

    public function update($request, $category)
    {   
        // if($request->input('parent_id') != $menu->id)
        // {
        //     $menu->parent_id = (int)$request->input('parent_id');
        // }

        $category->name = (string) $request->input('name');
        // $menu->parent_id = (string)$request->input('parent_id');
        // $menu->description = (int)$request->input('description');
        // $menu->content = (string)$request->input('content');
        // $menu->active = (string)$request->input('active');
        $category->save();

        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $category = Category::where('id', $id)->first();

        // if($category)
        // {
        //     return Category::where('id', $id)->orWhere('parent_id', $id)->delete();
        // }

        if ($category) {
            // Xóa danh mục nếu tồn tại
            $category->delete();
            return true; // Trả về true nếu xóa thành công
        }

        return false;
    }
}
