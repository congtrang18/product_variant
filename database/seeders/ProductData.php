<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // danh mục:áo,giày,túi sách
        Category::query()->create([
            'name'=>"áo"
        ]);
        Category::query()->create([
            'name'=>"giày"
        ]);
        Category::query()->create([
            'name'=>"túi sách"
        ]);
        // thuộc tính 1-size áo,2-size giày,3-màu
        Attribute::query()->create([
            'name'=>'size áo'
        ]);
        Attribute::query()->create([
            'name'=>'size giày'
        ]);
        Attribute::query()->create([
            'name'=>'màu'
        ]);
        // giá trị thuộc tính
        // size áo-1: S M L XL XXL
        // size giày-2: 38 39 40 41 42
        // màu: đen đỏ trắng xanh.
        $attribute=Attribute::query()->pluck('name','id');
        foreach ($attribute as $id => $name) {
            if ($id==1) {
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"S"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"M"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"L"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"XL"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"XXL"
                ]);
                
            }
            if ($id==2) {
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"38"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"39"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"40"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"41"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"42"
                ]);
            }
            if ($id==3) {
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"đen"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"đỏ"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"trắng"
                ]);
                AttributeItem::query()->create([
                    'attribute_id'=>$id,
                    'value'=>"xanh"
                ]);
               
            }

        }
        // producthasattribute


        
        
    }
}
