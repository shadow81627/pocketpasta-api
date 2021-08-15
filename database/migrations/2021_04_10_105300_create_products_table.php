<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // https://schema.org/Product
        Schema::create('products', function (Blueprint $table) {
            $table->thingFields();
            $table->unsignedBigInteger('gtin')->unique()->nullable();
            $table->string('size')->nullable()->comment("A standardized size of a product or creative work, specified either through a simple textual string (for example 'XL', '32Wx34L'), a QuantitativeValue with a unitCode, or a comprehensive and structured SizeSpecification; in other cases, the width, height, depth and weight properties may be more applicable.");
            $table->string('sku')->nullable()->comment('The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.');
            $table->string('color')->nullable()->comment('The color of the product.'); // @TODO: consider validating with https://github.com/meodai/color-names and manipulating with https://github.com/spatie/color
            $table->string('pattern')->nullable()->comment("A pattern that something has, for example 'polka dot', 'striped', 'Canadian flag'. Values are typically expressed as text, although links to controlled value schemes are also supported.");
            $table->string('slogan')->nullable()->comment('A slogan or motto associated with the item.');
            $table->datetime('production_date')->nullable()->comment('The date of production of the item, e.g. vehicle.');
            $table->datetime('purchase_date')->nullable()->comment('The date the item e.g. vehicle was purchased by the current owner.');
            $table->datetime('release_date')->nullable()->comment('The release date of a product or product model. This can be used to distinguish the exact variant of a product.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
