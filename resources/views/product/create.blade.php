@extends('master')
@section('content')
    <h3 class="text-center">
        thêm mới sản phẩm
    </h3>
    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
       @csrf
        <div class="row">
            <h4>product</h4>
            <div class="mt-3">
                <label for="">name</label>
                <input class="form form-control" type="text" name="name">
            </div>
            <div class="mt-3">
                <label for="">img</label>
                <input class="form form-control" type="file" name="img">
            </div>
            <div class="mt-3">
                <label for="">description</label>
                <input class="form form-control" type="text" name="description">
            </div>
            <div class="mt-3">
                <label for="">category</label>
                <select class="form form-select" name="category_id" id="">
                    @foreach ($category as $id => $item)
                        <option value="{{ $id }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="">attribute</label>
                <select class="form form-select" multiple name="attribute_id[]" id="">
                    @foreach ($attribute as $key => $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        {{-- <select class="form form-select" name="" id="">
                                @foreach ($item->attributeItems as $attribute_item)
                                    <option value="{{$attribute_item->id}}">{{$attribute_item->value}}</option>
                                @endforeach
                            </select> --}}
                    @endforeach
                </select>

            </div>

            @foreach ($attribute as $item)
                <div class="mt-3">
                    <label for="">{{ $item->name }}</label>
                    <select class="form form-control" multiple name="attribute_item[{{ $item->name }}][]" id="">
                        @foreach ($item->attributeItems as $value)
                            <option value="{{ $value->id }}">{{ $value->value }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach



        </div>
        <div class="mt-3">
            <button class="btn btn-success">thêm moi</button>
        </div>

    </form>
@endsection
