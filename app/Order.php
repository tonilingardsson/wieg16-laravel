<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'increment_id',
        'id',
        //'created_at',
     //   'updated_at',
        'customer_id',
        'customer_email',
        'status',
        'marking',
        'grand_total',
        'subtotal',
        'tax_amount',
        'billing_address_id',
        'shipping_address_id',
        'shipping_method',
        'shipping_amount',
        'shipping_tax_amount',
        'shipping_description',
        'items_id',
        'invoice_id'
    ];
    public function customerAddresses() {
        return $this->belongsTo(CustomerAddress::class);
    }
    public function items(){
        return $this->hasMany(Item::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function companies() {
        return $this->hasOne(Company::class);
    }
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
