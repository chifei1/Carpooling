<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Pinche extends Model
{
    //
    protected $table = 'pinche';
    protected $fillable = array(
        'id' ,
      'mid'   ,
      'start'  ,
      'end'     ,
      'tujing'   ,
      'name'      ,
      'phone'      ,
      'money'       ,
      'zuowei'      ,
      'cont'        ,
      'chexing'     ,
      'created_at'     ,
      'overtime'    ,
      'uptime'      ,
        'block'  ,
        'updated_at'  ,
      'status'
    );
}
