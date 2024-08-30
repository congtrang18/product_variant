<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'sku',
        'quantity',
        'img',
        'price',
    ];
    public function attribute()
    {
        return $this->belongsToMany(Attribute::class, 'product_variant_has_attributes')
        ->withPivot('attribute_item_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
