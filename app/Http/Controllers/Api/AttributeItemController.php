<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttributeItem;
use Illuminate\Http\Request;

class AttributeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        foreach ($request->input('attribute_item') as  $value) {
            AttributeItem::query()->create([
                'attribute_id' => $request->input('attribute_id'),
                'value' => $value
            ]);
        }
        return response()->json([
            'message'=>'thêm mới thành công',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
