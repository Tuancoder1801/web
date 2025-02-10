@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tiêu Đề</th>
                <th>Đường Dẫn</th>
                <th>Ảnh</th>
                <th>Sắp Xếp</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật</th>
                <th style="width: 50px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>{{$slider->url}}</td>
                <td><a href="{{ $slider->thumbnail }}" target="_blank"><img src="{{ $slider->thumbnail }}" height="40px"></a></td>
                <td>{{$slider->sort_by}}</td>
                <td>{{$slider->active}}</td>
                <td>{{$slider->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}" >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{$slider->id}}, '/admin/sliders/destroy')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sliders->links() !!}
@endsection