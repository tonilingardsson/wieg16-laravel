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
            $table->integer('id', false, true);
            $table->string('email')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->tinyInteger('gender',false, true)->nullable();
            $table->bigInteger('customer_activated')->nullable();
            $table->bigInteger('group_id', false, true);
            $table->integer('company_id')->nullable();
            $table->string('customer_company')->nullable();
            $table->tinyInteger('default_billing')->nullable();
            $table->tinyInteger('default_shipping')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->date('created_at'); 
            $table->date('updated_at');
            $table->string('customer_invoice_email')->nullable();
            $table->text('customer_extra_text')->nullable();
            $table->integer('customer_due_date_period', false, true)->nullable();
            $table->integer('address_id', false, true)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
