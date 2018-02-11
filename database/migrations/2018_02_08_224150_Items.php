<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigInteger('id', false, true)->primary();
            $table->bigInteger('order_id', false, true)->nullable();
            $table->integer('item_id')->nullable();
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('price', 10, 4)->nullable();
            $table->decimal('tax_amount', 10, 4)->nullable();
            $table->decimal('row_total', 10, 4)->nullable();
            $table->decimal('price_incl_tax', 10, 4)->nullable();
            $table->decimal('total_incl_tax', 10, 4)->nullable();
            $table->decimal('tax_percent', 10, 4)->nullable();
            $table->integer('amount_package')->nullable();
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
        Schema::dropIfExists('items');
    }
}