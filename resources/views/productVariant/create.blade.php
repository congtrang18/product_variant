@extends('master')
@section('content')
    <h3 class="text-center">
        thêm mới productVariant
    </h3>
    <form action="{{ route('productvariantstore') }}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="row">
            <h3>product variant</h3>
            <table class="table table-hover">
                <tr>
                    <td>size</td>
                    <td>color</td>
                    <td>sku</td>
                    <td>quantity</td>
                    <td>img</td>
                    <td>price</td>

                </tr>

                @foreach ($attribute['size']??[] as $sizes)
                    @foreach ($attribute['color']??[] as $colors)
                        <tr>
                            <td>{{ $sizes['value'] }}</td>
                            <td>{{ $colors['value'] }}</td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id']. '-' .$colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][sku]">
                            </td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id'] . '-' .$colors['attribute_id']}}][{{ $sizes['id'] . '-' . $colors['id'] }}][quantity]">
                            </td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id']. '-' .$colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][img]">
                            </td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id'] . '-' .$colors['attribute_id']}}][{{ $sizes['id'] . '-' . $colors['id'] }}][price]">
                            </td>
                        </tr>
                    @endforeach
                @endforeach


            </table>

        </div>
        <div class="mt-3">
            <button class="btn btn-success">thêm moi</button>
        </div>

    </form>
@endsection
