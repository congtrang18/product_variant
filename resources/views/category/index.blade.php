@extends('master')
@section('content')
    <div class="row">
        <h3 class="text-center">danh sách danh mục</h3>
        <a href="{{route('category.create')}}">thêm mới danh mục</a>
        <table class="table table-hover">
            <tr>
                <td>id</td>
                <td>name</td>
               
                <td>chức năng</td>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    
                    <td>chức năng</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
