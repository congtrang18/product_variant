<?php

use App\Models\Attribute;
use App\Models\AttributeItem;
use App\Models\ProductVariant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_variant_has_attributes', function (Blueprint $table) {
          $table->foreignIdFor(ProductVariant::class)->constrained();
          $table->foreignIdFor(Attribute::class)->constrained();
          $table->foreignIdFor(AttributeItem::class)->constrained();
          $table->primary(['product_variant_id','attribute_id','attribute_item_id']);



           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant_has_attributes');
    }
};
