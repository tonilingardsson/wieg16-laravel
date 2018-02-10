<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPricesTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_prices', function (Blueprint $table) {
            $table->decimal('price', 10, 4);
            $table->tinyInteger('group_id')->index();
            $table->bigInteger('product_id', false, true)->index();
            $table->primary(['group_id', 'product_id']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_prices');
    }
}