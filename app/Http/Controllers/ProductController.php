<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Product::with(["category", 'attribute', 'attribute.attributeItems'])->latest('id')->paginate(3);
        $attributeitem=[

        ];
        foreach ($data as  $item) {
            foreach ($item->attribute as $item) {
                $attributeitem[$item->pivot->product_id][$item->pivot->attribute_id]=json_decode($item->pivot->attribute_item_ids);
            }
        }
        // dd($attributeitem);
        $dataAttributeItem=[];
        foreach ($attributeitem as $product_id => $item) {
            foreach ($item as $attribute_id => $attribute_item_id) {
                // dd($attribute_id);
                $dataAttributeItem[$product_id][$attribute_id]=AttributeItem::query()->whereIn('id',$attribute_item_id)->get()->toArray();
            }
        }
        // dd($dataAttributeItem);

        return view('product.index', compact('data','dataAttributeItem'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::query()->pluck('name', 'id');
        $attribute = Attribute::with(['attributeItems'])->get();
        // $attribute=Attribute::query()->pluck('name','id');
        // dd($attribute->toArray());   
        return view('product.create', compact('category', 'attribute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            DB::transaction(function () use ($request) {
                // dd($request->all());
                $product = Product::query()->create([
                    'category_id' => $request->input('category_id'),
                    'name' => $request->input('name'),
                    // Storage::put('public/img', $request->input('img'))
                    'img' => "img11",
                    'description' => $request->input('description'),
                ]);


                foreach ($request->input('attribute_item') as $attributeName => $attributeValues) {
                    // dd($attributeName,
                    // $attributeValues);
                    // Tìm attribute_id tương ứng với attributeName
                    // dd(array_search($attributeName,
                    // array_keys($request->input('attribute_item'))));
                    // dd($request->input('attribute_id'));
                    $attributeId = $request->input('attribute_id')[array_search(
                        $attributeName,
                        array_keys($request->input('attribute_item'))
                    )];
                    //  dd($attributeId);

                    if ($attributeId) {

                        $product->attribute()->attach($attributeId, ['attribute_item_ids' => json_encode($attributeValues)]);
                    }
                }



                //                 

            });
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product=Product::with(['productvariant','productvariant.attribute'])->findOrFail($id);
        
        // dd($product->toArray());

       
        
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
