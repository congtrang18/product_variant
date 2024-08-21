<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'attribute_id',
        'attribute_item_id',
        'sku',
        'price',
        'quantity',
        'img',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }
    public function attributeItem(){
        return $this->belongsTo(AttributeItem::class);
    }

}
