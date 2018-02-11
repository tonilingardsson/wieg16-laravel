<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('entity_id', false, true)->primary();
            $table->integer('entity_type_id')->nullable();
            $table->integer('attribute_set_id')->nullable();
            $table->string('type_id')->nullable();
            $table->string('sku')->nullable();
            $table->integer('has_options')->nullable();
            $table->integer('required_options')->nullable();
            $table->integer('status')->nullable();
            $table->string('name')->nullable();
            $table->integer('amount_package')->nullable();
            $table->decimal('price',10,4)->nullable();
            $table->integer('is_salable')->nullable();
            $table->integer('stock_item')->nullable();
            $table->string('group_prices_id')->nullable();
            $table->timestamps();
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