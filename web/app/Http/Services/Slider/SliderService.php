<?php


namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function insert($request)
    {
        try {
            Slider::create($request->input());
            Session::flash('success', 'Thêm Slider mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Slider không thành công');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Slider::orderByDesc('id')->paginate(15);
    }

    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập Nhật Slider Thành Công');
        } catch (\Exception  $err) {
            Session::flash('error', 'Cập Nhật Slider Không Thành Công');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $path = str_replace('/storage/', '', $slider->thumbnail);  // Loại bỏ '/storage' và lấy đường dẫn thực tế
            $path = storage_path('app/public/' . $path);  // Thêm 'app/public/' để trỏ đến đúng thư mục

            unlink($path);  // Dùng unlink thay vì Storage::delete
            $slider->delete();
            Log::info('File đã xóa thành công: ' . $path);
            return true;
        }

        return false;
    }

    public function show()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }
}
