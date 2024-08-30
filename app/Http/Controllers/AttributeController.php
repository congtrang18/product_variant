<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeItem;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Attribute::with(["attributeItems"])->get();
        return view('attributes.index',compact('data'));
        // dd($data->toArray());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $attribute = Attribute::query()->create([
            'name' => $request->input('attribute_name')
        ]);
        foreach ($request->input('attribute_item_value') as  $value) {
            AttributeItem::query()->create([
                'attribute_id' => $attribute->id,
                'value' => $value
            ]);
        }
        return redirect()->route('attribute.index');
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
        $data=Attribute::query()->with(['attributeItems'])->findOrFail($id);
        return view('attributes.edit',compact('data'));
        // dd($data->toArray());
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
