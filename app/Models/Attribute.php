<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function attributeItems()
    {
        return $this->hasMany(AttributeItem::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class,"product_has_attributes")->withPivot('attribute_item_ids');
    }
    public function productvariant(){
        return $this->belongsToMany(ProductVariant::class,'product_variant_has_attributes')->withPivot('attribute_item_id');
    }
   
}
