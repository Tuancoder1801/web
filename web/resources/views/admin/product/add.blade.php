@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên Sản Phẩm</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Nhập tên sản phẩm">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ old('price') }}"  class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="discount" value="{{ old('discount') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Mô Tả </label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            {{-- <div class="form-group">
                <label>Mô Tả</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div> --}}

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload" name="thumbnail">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumbnail" id="thumbnail">
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Số Lượng</label>
                        <input type="number" name="stock" value="{{ old('stock') }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Thương Hiệu</label>
                        <input type="text" name="brand" value="{{ old('brand') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Chế Độ Kết Nối</label>
                        <input type="text" name="connectivity" value="{{ old('connectivity') }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Hỗ Trợ</label>
                        <input type="text" name="compatibility" value="{{ old('compatibility') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Màu</label>
                        <input type="text" name="product_color" value="{{ old('product_color') }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Trọng Lượng</label>
                        <input type="text" name="weight" value="{{ old('weight') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Kích Thước</label>
                        <input type="text" name="dimensions" value="{{ old('dimensions') }}"  class="form-control" >
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Pin</label>
                        <input type="text" name="battery_life" value="{{ old('battery_life') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Bảo Hành</label>
                <input type="number" name="warranty" value="{{ old('warranty') }}"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="menu">Ngày Phát Hành</label>
                <input type="date" name="release_date" value="{{ old('release_date') }}"  class="form-control" >
            </div>

            <div class="form-group">
                <label for="menu">Tính Năng</label>
                <input type="text" name="features" value="{{ old('features') }}"  class="form-control" >
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
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        //CKEDITOR.replace('content');
    </script>
@endsection