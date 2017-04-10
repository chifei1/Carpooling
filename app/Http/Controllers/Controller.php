<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use App\Http\Requests;
use view,Auth,Cookie,Crypt,Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Model\Member;
use App\Http\Model\Chengche;
use App\Http\Model\Pinche;
use App\Http\Model\Order;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

//    public function __construct()
//    {
//        if(Auth::check() == false){
//            return Redirect::guest('/');
//        }
//    }
//    
//    
	
	
}
