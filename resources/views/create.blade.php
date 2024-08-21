@extends('master')
@section('content')
    <h1 class="text-center">Thêm mới</h1>
    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <h3>sản phẩm</h3>
            <div class="mt-3">
                <label for="">product_name</label>
                <input class="form form-control" type="text" name="name">
            </div>
            <div class="mt-3">
                <label for="">image</label>
                <input class="form form-control" type="file" name="img">
            </div>
            <div class="mt-3">
                <label for="">price</label>
                <input class="form form-control" type="text" name="price">
            </div>
            <div class="mt-3">
                <label for="">description</label>
                <input class="form form-control" type="text" name="description">
            </div>
            <div class="mt-3">
                <label for="">danh mục</label>

                <select class="form form-select" name="category_id">
                    @foreach ($category as $id => $name)
                        {{-- @dd($name) --}}
                        {{-- <a href="?category_id={{$id}}"> --}}
                            <option id="category_id={{ $id }}" value="{{ $id }}">{{ $name }}
                            </option>
                        {{-- </a> --}}
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <h3>biến thể sản phẩm</h3>
            <table class="table table-hover">
                <tr>
                    <td>size</td>
                    <td>màu</td>
                    <td>sku</td>
                    <td>price</td>
                    <td>quantity</td>
                    <td>image</td>

                </tr>
                @foreach ($variants as $key=>$item)

                {{-- @dd($key) --}}
                    <tr>
                        <td>{{ $item['size'] }}</td>
                        <td>{{ $item['color'] }}</td>
                        <td><input type="text" value="{{ strtoupper(Str::random(8)) }}" class="form form-control" name="variant[{{$key}}]['sku']"></td>
                        <td><input type="text" value="12000" class="form form-control" name="variant[{{$key}}]['price']"></td>
                        <td><input type="text" value="2" class="form form-control" name="variant[{{$key}}]['quantity']"></td>
                        <td><input type="file" class="form form-control" name="variant[{{$key}}]['img']"></td>

                    </tr>

                @endforeach
            </table>

        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-success">thêm mới</button>
        </div>
    </form>
@endsection
