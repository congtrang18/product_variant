<?php

namespace App\Http\Controllers;

use App\Models\AttributeItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductVariantController extends Controller
{
    //
    public function productvariantcreate($id)
    {
        $product = Product::query()->findOrFail($id);
        $attribute = [];
        foreach ($product->attribute as $key => $value) {
            // dd($value->toArray());
            $attributeItems = json_decode($value->pivot->attribute_item_ids);
            $attribute[$value->name] = AttributeItem::query()->whereIn('id', $attributeItems)->get()->toArray();

            // dd($value->pivot->attribute_item_ids);
        }
        // dd($attribute['size']??[]);
        return view('productVariant.create', compact('attribute', 'product'));
    }
    public function productvariantstore(Request $request)
    {
        // dd($request->all());
        try {
            DB::transaction(function () use ($request) {
           
                foreach ($request->variant as $attribute_id => $attribute_item_id) {
                    // Tách attribute_id thành mảng
                    $attributeIds = explode('-', $attribute_id);

                    foreach ($attribute_item_id as $key => $value) {
                        // Tách attribute_item_id thành mảng
                        $attributeItemIds = explode('-', $key);

                        // Tạo mới ProductVariant
                        $productVariant = ProductVariant::query()->create([
                            'product_id' => $request->product_id,
                            'sku' => $value["sku"],
                            'quantity' => $value["quantity"],
                            'img' => $value["img"],
                            'price' => $value["price"],
                        ]);

                        // Gắn mối quan hệ giữa ProductVariant và Attribute
                        foreach ($attributeIds as $index => $attributeId) {
                            $productVariant->attribute()->attach($attributeId, [
                                'attribute_item_id' => $attributeItemIds[$index]
                            ]);
                        }
                    }
                }
                
            });
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
