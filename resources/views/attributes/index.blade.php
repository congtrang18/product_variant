@extends('master')
@section('content')
    <div class="row">
        <h3 class="text-center">danh sách thuộc tính</h3>
        <a href="{{route('attribute.create')}}">thêm mới thuộc tính</a>
        <table class="table table-hover">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>attribute_item_value</td>
                <td>chức năng</td>
            </tr>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <ul>
                            @foreach ($item->attributeItems as $value)
                                {{ $value->value }}
                            @endforeach
                        </ul>
                    </td>
                    <td><a href="{{route('attribute.edit',$item->id)}}">sửa</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
