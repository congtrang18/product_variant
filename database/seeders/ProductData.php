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
            'name' => "áo"
        ]);
        Category::query()->create([
            'name' => "giày"
        ]);
        Category::query()->create([
            'name' => "túi sách"
        ]);
        // $category=Category::query()->pluck('name','id');
        // thuộc tính 1-size 2-color
        Attribute::query()->create([
            'name' => 'size'
        ]);

        Attribute::query()->create([
            'name' => 'color'
        ]);

        // giá trị thuộc tính
        // size áo-1: S M L XL XXL
        // size giày-2: 38 39 40 41 42
        // màu: đen đỏ trắng xanh.
        $attribute = Attribute::query()->pluck('name', 'id');

        foreach ($attribute as $id => $name) {
            if ($id == 1) {
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "S"

                ]);
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "M"

                ]);
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "L"

                ]);


                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "39"

                ]);
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "40"

                ]);
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "41"

                ]);
            }
            if ($id == 2) {
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "đen"

                ]);
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "trắng"

                ]);
                AttributeItem::query()->create([
                    'attribute_id' => $id,

                    'value' => "xanh"

                ]);
            }
        }

        // danh mục 1-áo,2-giày,3-túi sách
        $category = Category::query()->findOrFail(1);
        // $attributeitem=[1,2,3];
        // for ($i=1; $i < 2; $i++) { 
        $category->attributes()->attach(1, ['attribute_item_id' => 1, 'value' => 'S']);
        $category->attributes()->attach(1, ['attribute_item_id' => 2, 'value' => 'M']);
        $category->attributes()->attach(1, ['attribute_item_id' => 3, 'value' => 'L']);

        // }


        // for ($i=7; $i < 8; $i++) { 
        $category->attributes()->attach(2, ['attribute_item_id' => 7, 'value' => "đen"]);
        $category->attributes()->attach(2, ['attribute_item_id' => 8, 'value' => "trắng"]);
        $category->attributes()->attach(2, ['attribute_item_id' => 9, 'value' => 'xanh']);

        // }

        $category = Category::query()->findOrFail(2);

        // for ($i=4; $i < 7; $i++) { 
        $category->attributes()->attach(1, ['attribute_item_id' => 4, 'value' => '39']);
        $category->attributes()->attach(1, ['attribute_item_id' => 5, 'value' => '40']);
        $category->attributes()->attach(1, ['attribute_item_id' => 6, 'value' => '41']);

        // }


        // for ($i=7; $i < 10; $i++) { 
        $category->attributes()->attach(2, ['attribute_item_id' => 7, 'value' => "đen"]);
        $category->attributes()->attach(2, ['attribute_item_id' => 8, 'value' => "trắng"]);
        $category->attributes()->attach(2, ['attribute_item_id' => 9, 'value' => 'xanh']);
        // }


        $category = Category::query()->findOrFail(3);

        $category->attributes()->attach(2, ['attribute_item_id' => 7, 'value' => "đen"]);
        $category->attributes()->attach(2, ['attribute_item_id' => 8, 'value' => "trắng"]);
        $category->attributes()->attach(2, ['attribute_item_id' => 9, 'value' => 'xanh']);
    }
}
