@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th style="width: 100ch">Tên</th>
                {{-- <th>Active</th> --}}
                {{-- <th>Ngày Tạo</th>
                <th>Ngày Cập Nhật</th> --}}
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                {{-- <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td> --}}
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/categories/edit/{{$category->id}}" >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{$category->id}}, '/admin/categories/destroy')">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $categories->links() !!}
@endsection