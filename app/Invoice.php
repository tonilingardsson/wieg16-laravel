<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'due_date',
        'customer_id',
        'goods_total_excl_vat',
        'goods_vat',
        'shipping',
        'shipping_vat',
        'total_payable',
        'invoiced',
        'invoice_number'
    ];
    public function customer() {
        return $this->hasOne(Customer::class);
    }
    public function order() {
        return $this->hasMany(Order::class);
    }
}
