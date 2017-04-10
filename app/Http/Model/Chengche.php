<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Chengche extends Model
{
    //
    protected $table = 'chengche' ;
    protected $fillable = array(
        'id' ,
        'mid' ,
        'start' ,
        'end' ,
        'tujing' ,
        'name' ,
        'phone' ,
        'money' ,
        'chengke' ,
        'cont' ,
        'created_at' ,
        'overtime' ,
        'updated_at' ,
        'status'
    );
}
