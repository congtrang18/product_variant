@extends('master')
@section('content')
    <h3 class="text-center">
        thêm mới thuộc tính
    </h3>
    <form action="{{ route('attribute.store') }}" method="post">
        @csrf
        <div class="row">
            <h3>Thuộc tính</h3>
            <div class="mt-3">
                <label for="">name</label>
                <input class="form form-control" type="text" name="attribute_name">
            </div>

        </div>
        <div class="row">
            <h3>giá trị Thuộc tính</h3>
            <div class="mt-3">
                <label for="">value</label>
                <input class="form form-control" type="text" name="attribute_item_value[]">
            </div>
            <div class="mt-3">
                <label for="">value</label>
                <input class="form form-control" type="text" name="attribute_item_value[]">
            </div>
            <div class="mt-3">
                <label for="">value</label>
                <input class="form form-control" type="text" name="attribute_item_value[]">
            </div>


        </div>
        <div class="mt-3">
            <button class="btn btn-success" type="submit">thêm mới</button>
        </div>
    </form>
@endsection
