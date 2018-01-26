<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('id');
            $table->string('email');
            $table->string('firstName');
            $table->string('lastName');
            $table->tinyInteger('gender');
            $table->bigInteger('customer_activated');
            $table->bigInteger('group_id');
            $table->integer('company_id');
            $table->string('customer_company');
            $table->tinyInteger('default_billing');
            $table->tinyInteger('default_shipping');
            $table->tinyInteger('is_active');
            $table->date('created_at');
            $table->date('updated_at');
            $table->string('customer_invoice_email');
            $table->text('customer_extra_text');
            $table->integer('customer_due_date_period');
            $table->integer('address_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
