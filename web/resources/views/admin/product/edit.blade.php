@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="{{ url('/admin/products/edit/' . $product->id) }}" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên Sản Phẩm</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control"  placeholder="Nhập tên sản phẩm">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ $product->price }}"  class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="discount" value="{{ $product->discount }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Mô Tả </label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            {{-- <div class="form-group">
                <label>Mô Tả</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div> --}}

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload" name="thumbnail">
                <div id="image_show">
                    <a href="{{ $product->thumbnail }}" target="_blank">
                        <img src="{{ $product->thumbnail }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumbnail" value="{{ $product->thumbnail }}" id="thumbnail">
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Số Lượng</label>
                        <input type="number" name="stock" value="{{ $product->stock }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Thương Hiệu</label>
                        <input type="text" name="brand" value="{{ $product->brand }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Chế Độ Kết Nối</label>
                        <input type="text" name="connectivity" value="{{ $product->connectivity }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Hỗ Trợ</label>
                        <input type="text" name="compatibility" value="{{ $product->compatibility }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Màu</label>
                        <input type="text" name="product_color" value="{{ $product->product_color }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Trọng Lượng</label>
                        <input type="text" name="weight" value="{{ $product->weight }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Kích Thước</label>
                        <input type="text" name="dimensions" value="{{ $product->dimensions }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Pin</label>
                        <input type="text" name="battery_life" value="{{ $product->battery_life }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Bảo Hành</label>
                <input type="number" name="warranty" value="{{ $product->warranty }}"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="menu">Ngày Phát Hành</label>
                <input type="date" name="release_date" value="{{ $product->release_date }}"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="menu">Tính Năng</label>
                <input type="text" name="features" value="{{ $product->features }}"  class="form-control" >
            </div>

            {{-- <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div> --}}

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        //CKEDITOR.replace('content');
    </script>
@endsection