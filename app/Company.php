<?php
/**
 * Created by PhpStorm.
 * User: lingardssonluna
 * Date: 2018-01-29
 * Time: 17:21
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'company_name',
    ];

    public function customers(){
        return $this->hasMany(Customer::class);
    }
}