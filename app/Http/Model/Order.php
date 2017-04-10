<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = array(
        'id',
        'mid',
        'record_id',
        'record_name',
        'order_type',
        'status',
        'num',
        'created_at',
        'updated_at'
    );
}
