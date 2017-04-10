<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = 'members';
    protected $fillable = array(
        'id',
        'qq',
        'qqname',
        'phone',
        'nickname',
        'username',
        'password',
        'open_id' ,
        'created_at',
        'updated_at'
    );
}
