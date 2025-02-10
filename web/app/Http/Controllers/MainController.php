<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;

class MainController extends Controller
{
    protected $category;
    protected $slider;
    protected $product;

    public function __construct(CategoryService $category, SliderService $slider, ProductService $product)
    {
        $this->category = $category;
        $this->slider = $slider;
        $this->product = $product;
    }


    public function index()
    {
        return view('main', [
            'title' => 'Shop Tay Cầm',
            'categories' => $this->category->show(),
            'sliders' => $this->slider->show(),
            'products' => $this->product->get(),
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }
}
