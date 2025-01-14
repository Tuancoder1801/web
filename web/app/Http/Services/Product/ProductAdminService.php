<?php


namespace App\Http\Services\Product;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService
{
    public function getCategory()
    {
        return Category::select('id', 'name')->get();
    }

    protected function isValidPrice($request)
    {
        if (
            $request->input('price') != 0 && $request->input('discount') != 0
            && $request->input('discount') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('discount') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $data = [
                'category_id' => $request->input('category_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'thumbnail' => $request->input('thumbnail'),
                'stock' => $request->input('stock'),
                'brand' => $request->input('brand'),
                'connectivity' => $request->input('connectivity'),
                'compatibility' => $request->input('compatibility'),
                'product_color' => $request->input('product_color'),
                'weight' => $request->input('weight'),
                'dimensions' => $request->input('dimensions'),
                'battery_life' => $request->input('battery_life'),
                'warranty' => $request->input('warranty'),
                'release_date' => $request->input('release_date'),
                'features' => $request->input('features'),
            ];

            Product::create($data);

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Product::with('category_id')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
