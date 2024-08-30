@extends('master')
@section('content')
    <h3 class="text-center">xem chi tiết</h3>
    <div class="row">
        <table class="table table-hover">
            <tr>
                <td>product_name</td>
                <td>description</td>
                <td>variants</td>
               
            </tr>
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <ul>
                        @foreach ($product->productvariant as $variant)
                        <li>Variant SKU: {{ $variant->sku }}</li>
                        <li>Quantity: {{ $variant->quantity }}</li>
                        <li>Price: {{ $variant->price }}</li>

                        <li> <img src="{{ $variant->img }}" alt="Variant Image"></li>
                        <h6>Attributes:</h6>
                        <ul>
                            @foreach ($variant->attribute as $attribute)
                                <li>{{ $attribute->name }}:
                                    @php
                                        $attributeItemId = $attribute->pivot->attribute_item_id;

                                        $attributeItemValue = \App\Models\AttributeItem::getAttributeItemValue(
                                            $attributeItemId,
                                        );
                                    @endphp
                                    {{ $attributeItemValue }}
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                    </ul>
                   
                </td>

            </tr>
        </table>



    </div>
@endsection
