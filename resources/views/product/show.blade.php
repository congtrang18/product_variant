@extends('master')
@section('content')
    <h3 class="text-center">xem chi tiết</h3>
    <div class="row">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>

        <h2>Variants</h2>
        @foreach ($product->productvariant as $variant)
            <div>
                <h3>Variant SKU: {{ $variant->sku }}</h3>
                <p>Quantity: {{ $variant->quantity }}</p>
                <p>Price: {{ $variant->price }}</p>
                <img src="{{ $variant->img }}" alt="Variant Image">

                <h4>Attributes:</h4>
                <ul>
                    @foreach ($variant->attribute as $attribute)
                        <li>{{ $attribute->name }}:
                            @php
                                $attributeItemId = $attribute->pivot->attribute_item_id;
                                // Giả sử bạn có hàm getAttributeItemValue để lấy giá trị từ id
                                $attributeItemValue = \App\Models\AttributeItem::getAttributeItemValue($attributeItemId);
                            @endphp
                            {{ $attributeItemValue }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>
@endsection
