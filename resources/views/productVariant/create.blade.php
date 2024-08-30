@extends('master')
@section('content')
    <h3 class="text-center">
        thêm mới productVariant
    </h3>
    <form action="{{ route('productvariantstore') }}" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="row">
            <h3>product variant</h3>
            <table class="table table-hover">
                <tr>
                    {{-- @if (isset($attribute['size'])) --}}
                        <td>size</td>
                    {{-- @endif --}}
                    {{-- @if (isset($attribute['color'])) --}}
                        <td>color</td>
                    {{-- @endif --}}
                    
                    <td>sku</td>
                    <td>quantity</td>
                    <td>img</td>
                    <td>price</td>

                </tr>

               
                {{-- @foreach ($attribute['size']  as $sizes)
                    
                    @foreach ($attribute['color']  as $colors)
                       

                        <tr>
                            <td>{{ $sizes['value'] }}</td>
                            <td>{{ $colors['value'] }}</td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][sku]">
                            </td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][quantity]">
                            </td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][img]">
                            </td>
                            <td><input type="text" class="form form-control"
                                    name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][price]">
                            </td>
                        </tr>
                    @endforeach
                @endforeach --}}
                @isset($attribute['size'])
    @foreach ($attribute['size'] as $sizes)
        @isset($attribute['color'])
            @foreach ($attribute['color'] as $colors)
                <tr>
                    <td>{{ $sizes['value'] }}</td>
                    <td>{{ $colors['value'] }}</td>
                    <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][sku]"></td>
                    <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][quantity]"></td>
                    <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][img]"></td>
                    <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] . '-' . $colors['attribute_id'] }}][{{ $sizes['id'] . '-' . $colors['id'] }}][price]"></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>{{ $sizes['value'] }}</td>
                <td>N/A</td>
                <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] }}-color][{{ $sizes['id'] }}-0][sku]"></td>
                <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] }}-color][{{ $sizes['id'] }}-0][quantity]"></td>
                <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] }}-color][{{ $sizes['id'] }}-0][img]"></td>
                <td><input type="text" class="form form-control" name="variant[{{ $sizes['attribute_id'] }}-color][{{ $sizes['id'] }}-0][price]"></td>
            </tr>
        @endisset
    @endforeach
@endisset

@isset($attribute['color'])
    @if(!isset($attribute['size']))
        @foreach ($attribute['color'] as $colors)
            <tr>
                <td>N/A</td>
                <td>{{ $colors['value'] }}</td>
                <td><input type="text" class="form form-control" name="variant[size-{{ $colors['attribute_id'] }}][0-{{ $colors['id'] }}][sku]"></td>
                <td><input type="text" class="form form-control" name="variant[size-{{ $colors['attribute_id'] }}][0-{{ $colors['id'] }}][quantity]"></td>
                <td><input type="text" class="form form-control" name="variant[size-{{ $colors['attribute_id'] }}][0-{{ $colors['id'] }}][img]"></td>
                <td><input type="text" class="form form-control" name="variant[size-{{ $colors['attribute_id'] }}][0-{{ $colors['id'] }}][price]"></td>
            </tr>
        @endforeach
    @endif
@endisset



            </table>

        </div>
        <div class="mt-3">
            <button class="btn btn-success">thêm moi</button>
        </div>

    </form>
@endsection
