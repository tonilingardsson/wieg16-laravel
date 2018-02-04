<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'entity_id';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'entity_id',
        'entity_type_id',
        'attribute_set_id',
        'type_id',
        'sku',
        'has_options',
        'required_options',
        'status',
        'name',
        'amount_package',
        'price',
        'is_salable',
        'stock_item',
        'group_prices_id',
    ];

    public function groupPrice() {
        return $this->hasMany(GroupPrice::class);
    }
}
