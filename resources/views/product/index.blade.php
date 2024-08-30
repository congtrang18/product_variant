@extends('master')
@section('content')
    <div class="row">
        <h3 class="text-center">danh sách sản phẩm</h3>
        <a href="{{ route('product.create') }}">thêm mới sản phẩm</a>
        <table class="table table-hover">
            <tr>
                <td>id</td>
                <td>name</td>
                <td>img</td>
                <td>description</td>
                <td>category_name</td>
                <td>attribute_name</td>


                <td>chức năng</td>
            </tr>
            @foreach ($data as $items)
                <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->name }}</td>

                    <td>{{ $items->img }}</td>
                    <td>{{ $items->description }}</td>
                    <td>{{ $items->category->name }}</td>
                    <td>
                        <ol>
                            @foreach ($items->attribute as $item)
                                <li>{{ $item->name }}
                                    @foreach ($dataAttributeItem as $product_id => $value)
                                        @if ($product_id == $items->id)
                                            <ul>
                                                @foreach ($value as $attribute_id => $attributes)

                                                    @if ($attribute_id == $item->id)
                                                       @foreach ($attributes as $attribute_item)
                                                       <li>{{ $attribute_item['value'] }}</li>
                                                       @endforeach
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                </li>
                            @endforeach
                        </ol>
                    </td>
                    <td><a href="{{route('productvariantcreate',$items->id)}}">Thêm mới product_variant</a><br>
                        <a href="{{route('product.show',$items->id)}}">xem chi tiết</a>
                    </td>



                </tr>
            @endforeach
           {{$data->links()}} 
        </table>
    </div>
@endsection
