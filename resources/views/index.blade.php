@extends('master')
@section('content')
    <table class="table table-hover">
        <a href="{{route("product.create")}}">thêm mới</a>
        <tr>
            <td>id</td>
            <td>product_name</td>
            <td>image</td>
            <td>category_name</td>
            <td>size</td>
            <td>color</td>
            <td>quantity</td>
            <td>chức năng</td>
           
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->product_name}}</td>
            <td>{{$item->image}}</td>
            <td>{{$item->category_name}}</td>
            {{-- <td>{{size}}</td>
            <td>{{color}}</td>
            <td>{{quantity}}</td> --}}
            <td>chức năng</td>
           
        </tr>
        @endforeach
        {{$data->links()}}
    </table>
@endsection