<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'customer_group_code',
        'tax_class_id'
    ];

}
