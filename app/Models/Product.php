<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'img',
        'description',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attribute()
    {
        return $this->belongsToMany(Attribute::class, 'product_has_attributes')->withPivot('attribute_item_ids');
    }
    public function productvariant()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
