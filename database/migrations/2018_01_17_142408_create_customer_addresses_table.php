<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->integer('id', false, true);
            $table->integer('customer_id', false, true);
            $table->integer('customer_address_id')->nullable();
            $table->string('email')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
-           $table->string('postcode')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('telephone')->nullable();
            $table->string('country_id')->nullable();
            $table->tinyInteger('address_type')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
}
