<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->dateTime('invoice_date')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->integer('customer_id')->nullable();
            $table->decimal('goods_total_excl_vat', 12, 4)->nullable();
            $table->decimal('goods_vat', 12, 4)->nullable();
            $table->decimal('shipping_excl_vat', 12, 4)->nullable();
            $table->decimal('shipping_vat', 12, 4)->nullable();
            $table->decimal('total_payable', 12, 4)->nullable();
            $table->boolean('invoiced')->nullable();
            $table->string('invoice_number')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}