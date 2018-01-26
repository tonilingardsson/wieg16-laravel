<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    // Whitelisting all table fields
    protected $fillable = [
        'id',
        'customer_id',
        'customer_address_id',
        'email',
        'firstName',
        'lastName',
        'postcode',
        'street',
        'city',
        'telephone',
        'country_id',
        'address_type',
        'company',
        'country'
    ];
}
