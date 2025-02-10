<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                // Lấy tên gốc của file
                $name = $request->file('file')->getClientOriginalName();

                // Lưu file vào thư mục 'public/uploads/...'
                $path = $request->file('file')->storeAs(
                    'uploads/' . date("Y/m/d"),
                    $name
                );

                // Trả về đường dẫn có thể truy cập từ web
                return '/storage/' . str_replace('public/', '', $path);
            } catch (\Exception $error) {
                return false;
            }
        }

        return false;
    }
}
