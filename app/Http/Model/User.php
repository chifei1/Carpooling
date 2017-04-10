<?php

namespace App\Http\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'members';  //定义用户表名称
    protected $primaryKey = "id";    //定义用户表主键
    public $timestamps = false;         //是否有created_at和updated_at字段

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qq',
        'qqname',
        'phone',
        'nickname',
        'username',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
