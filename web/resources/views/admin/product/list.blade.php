@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Giá Gốc</th>
                <th>Giá Giảm</th>
                <th>Mô Tả</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Thương Hiệu</th>
                <th>Chế Độ Kết Nối</th>
                <th>Hỗ Trợ</th>
                <th>Màu</th>
                <th>Trọng Lượng</th>
                <th>Kích Thước</th>
                <th>Pin</th>
                <th>Bảo Hành</th>
                <th>Ngày Phát Hành</th>
                <th>Tính Năng</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->thumbnail}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->connectivity}}</td>
                <td>{{$product->compatibility}}</td>
                <td>{{$product->product_color}}</td>
                <td>{{$product->weight}}</td>
                <td>{{$product->dimensions}}</td>
                <td>{{$product->battery_life}}</td>
                <td>{{$product->warranty}}</td>
                <td>{{$product->release_date}}</td>
                <td>{{$product->features}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}" >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{$product->id}}, '/admin/products/destroy')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection