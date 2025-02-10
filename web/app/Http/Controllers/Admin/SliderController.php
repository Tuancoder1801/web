<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function create()
    {
        return view('admin.slider.add', [
            'title' => 'Thêm Slider mới'
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'thumbnail' => 'required',
            'url' => 'required'
        ]);

        $this->slider->insert($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.slider.list', [
            'title' => 'Danh Sách Slider Mới Nhất',
            'sliders' => $this->slider->get()
        ]);
    }

    public function show(Slider $slider)
    {
        return view('admin.slider.edit', [
            'title' => 'Chỉnh Sửa Slider',
            'slider' => $slider
        ]);
    }

    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'thumbnail' => 'required',
            'url' => 'required'
        ]);

        $result = $this->slider->update($request, $slider);

        if ($result) {
            return redirect('/admin/sliders/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa Slider Thành Công'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa Slider Không Thành Công' 
        ]);
    }
}
