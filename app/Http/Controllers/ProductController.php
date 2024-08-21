<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $category = Category::query()->pluck('name', 'id');
        // dd($category);
        $attributes = Attribute::query()->whereIn('name', ['size áo', 'màu'])->with(['attributeItem'])->get();



        $attributeMap = [];
        $variants = [];

        foreach ($attributes as  $attribute) {
            // dd($attribute);
            $attributeMap[$attribute->name . "-" . $attribute->id] = $attribute->attributeItem->pluck('value', 'id')->toArray();
        }
        foreach ($attributeMap as $key => $value) {
            dd($value);
        }
        // dd($variants);

        dd($attributeMap);


        // foreach ($sizes as $sizeId => $sizeValue) {
        //     foreach ($colors as $colorId => $colorValue) {
        //         $variants["$sizeId-$colorId"] = [
        //             'size' => $sizeValue,
        //             'color' => $colorValue,
        //         ];
        //     }
        // }

        // dd($variants);
        // foreach ($attributeMap as $key => $value) {
        //    dd($value);

        // }

        return view('create', compact('category', 'variants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
