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
            $table->id();
            $table->foreignId('thing_id')->constrained();
            $table->unsignedBigInteger('gtin13')->unique()->nullable();
            $table->string('sku')->nullable(); // The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.
            $table->string('color')->nullable(); // The color of the product. TODO: consider validating with https://github.com/meodai/color-names and manipulating with https://github.com/spatie/color
            $table->string('pattern')->nullable(); // A pattern that something has, for example 'polka dot', 'striped', 'Canadian flag'. Values are typically expressed as text, although links to controlled value schemes are also supported.
            $table->string('slogan')->nullable(); // A slogan or motto associated with the item.
            $table->datetime('production_date')->nullable(); // The date of production of the item, e.g. vehicle.
            $table->datetime('purchase_date')->nullable(); // The date the item e.g. vehicle was purchased by the current owner.
            $table->datetime('release_date')->nullable(); // The release date of a product or product model. This can be used to distinguish the exact variant of a product.
            $table->timestamps();
            $table->softDeletes();
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
