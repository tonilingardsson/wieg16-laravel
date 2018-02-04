<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'email',
        'firstName',
        'lastName',
        'gender',
        'customer_activated',
        'group_id',
        'company_id',
        'customer_company',
        'default_billing',
        'default_shipping',
        'is_active',
        'created_at',
        'updated_at',
        'customer_invoice_email',
        'customer_extra_text',
        'customer_due_date_period',
        'address_id'
    ];

    public function address() {
        return $this->hasOne(CustomerAddress::class);
    }

    public function order() {
        return $this->hasMany(Order::class);
    }

    public function company() {
        return $this->hasMany(Company::class);
    }

}


