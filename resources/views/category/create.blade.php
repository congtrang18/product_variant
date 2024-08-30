@extends('master')
@section('content')
    <h3 class="text-center">
        thêm mới danh mục
    </h3>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="row">
            <h3>danh mục</h3>
            <div class="mt-3">
                <label for="">name</label>
                <input class="form form-control" type="text" name="name">
            </div>

        </div>
        
        <div class="mt-3">
            <button class="btn btn-success" type="submit">thêm mới</button>
        </div>
    </form>
@endsection
