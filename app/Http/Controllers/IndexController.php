<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use view,Auth,Cookie,Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Model\Member;
use App\Http\Model\Chengche;
use App\Http\Model\Pinche;
use App\Http\Model\Order;


class IndexController extends Controller
{

    //首页 找车主
    public function getIndex() {
        $data = Pinche::where('overtime','>',time())->where('status',1)->orderBy('overtime','ASC')->get()->toArray();
        return view('wap/index',['data'=> $data]);
    }
    //按地点查询 （找车主）
    public function postOwner() {
        $input = Input::all();
        if($input['start'] == '' && $input['end'] != '') {
            $data = Pinche::where('overtime','>',time())->where(['end'=>$input['end'],'status'=>1])->orderBy('overtime','ASC')->get()->toArray();
        }elseif ($input['start'] != '' && $input['end'] == '') {
            $data = Pinche::where('overtime','>',time())->where(['start'=>$input['start'],'status'=>1])->orderBy('overtime','ASC')->get()->toArray();
        }elseif ($input['start'] == "" && $input['end'] == "") {
            $data = Pinche::where('overtime','>',time())->where('status','1')->orderBy('overtime','ASC')->get()->toArray();
        }else{
            $data = Pinche::where('overtime','>',time())->where(['start'=>$input['start'],'end'=>$input['end'],'status'=>1])->orderBy('overtime','ASC')->get()->toArray();
        }

        return view('wap/index',['data'=> $data]);
    }

    //车主发布
    public function getOwnerrelease()  {
        $user_info = session('user');
        return view('wap/fabu5',['userinfo'=>$user_info['0']]);
    }

    public function postOwnerrelease()  {
        $input = Input::all();
        if(!$input['start'] || !$input['end'] || !$input['name'] || !$input['phone'] || !$input['money'] || !$input['zuowei'] || !$input['gameover'] ) {
            return back()->with('msg','请输入必填信息！');
        }
        $res = Pinche::create([
            'mid' => session('user')['0']['id']     ,
            'start' => $input['start'] ,
            'end' => $input['end'] ,
            'name' => $input['name'] ,
            'phone' => $input['phone'] ,
            'money' => $input['money'] ,
            'zuowei' => $input['zuowei'] ,
            'block' => $input['zuowei'] ,
            'chexing' => $input['chexing'] ,
            'overtime' => strtotime($input['gameover'])  ,
            'tujing' => $input['tujing'] ,
            'status' => 1 ,
            'cont' => $input['cont']
        ]);
        if($res) {
            return back()->with('msg','发布成功！');
        }else {
            return back()->with('msg','发布失败！');
        }
    }
    //车主发布详情
    public function getInfo() {
        $input = Input::all();
        $data = Pinche::where('id',$input['id'])->get()->toArray();
        $other_info = Member::join('order', 'members.id', '=', 'order.mid')
            ->where('order.record_id',$input['id'])
            ->where('order.status',1)
            ->where('order.order_type',1)
            ->select('members.nickname as nickname ','members.qqname as qqname ', 'members.phone as phone ', 'order.num as num')
            ->get()
            ->toArray();
            $res = Order::where(['record_id'=>$input['id'],'mid'=>session('user')['0']['id']])->first();
        if($res) {
            $res = $res->status;
        }
        return view('wap/info',['data'=>$data,'id'=>session('user')['0']['id'],'other_info'=>$other_info,'b_res'=>$res]);
    }

    //车主撤销
    public function Ownercancel()
    {
        $input = Input::all();
        Pinche::where('id',$input['id'])->update(['status'=>2]);
        return redirect('wap/indexs');
    }

    //找乘客
    public function getPeople() {
        $data = Chengche::where('overtime','>',time())->where('status',1)->orderBy('overtime','ASC')->get()->toArray();
        return view('wap/qiu',['data'=> $data]);
    }
    //按地点查询      (找乘客)
    public function postPeople() {
        $input = Input::all();
        if($input['start'] == '' && $input['end'] != '') {
            $data = Chengche::where('overtime','>',time())->where(['end'=>$input['end'],'status'=>1])->orderBy('overtime','ASC')->get()->toArray();
        }elseif ($input['start'] != '' && $input['end'] == '') {
            $data = Chengche::where('overtime','>',time())->where(['start'=>$input['start'],'status'=>1])->orderBy('overtime','ASC')->get()->toArray();
        }elseif ($input['start'] == "" && $input['end'] == "") {
            $data = Chengche::where('overtime','>',time())->where('status','1')->orderBy('overtime','ASC')->get()->toArray();
        }else{
            $data = Chengche::where('overtime','>',time())->where(['start'=>$input['start'],'end'=>$input['end'],'status'=>1])->orderBy('overtime','ASC')->get()->toArray();
        }
         return view('wap/qiu',['data'=> $data]);
    }
    //乘客发布
    public function getRelease()  {
        $user_info = session('user');
        return view('wap/fabu',['userinfo'=>$user_info['0']]);
    }

    public function postRelease()  {
        $input = Input::all();
        if(!$input['start'] || !$input['end'] || !$input['name'] || !$input['phone'] || !$input['money'] || !$input['chengke'] || !$input['gameover'] ) {
            return back()->with('msg','请输入必填信息！');
        }
        $res = Chengche::create([
            'mid' => session('user')['0']['id']    ,
            'start' => $input['start'] ,
            'end' => $input['end'] ,
            'name' => $input['name'] ,
            'phone' => $input['phone'] ,
            'money' => $input['money'] ,
            'chengke' => $input['chengke'] ,
            'overtime' => strtotime($input['gameover'])  ,
            'tujing' => $input['tujing'] ,
            'status' => 1 ,
            'cont' => $input['cont']
        ]);
        if($res) {
            return back()->with('msg','发布成功！');
        }else {
            return back()->with('msg','发布失败！');
        }
    }

    //乘客发布详情
    public function getPinfo() {
        $input = Input::all();
        $data = Chengche::where('id',$input['id'])->get()->toArray();
        return view('wap/pinfo',['data'=>$data,'id'=>session('user')['0']['id']]);
    }

    //乘客撤销
    public function Passengercancel()
    {
        $input = Input::all();
        Chengche::where('id',$input['id'])->update(['status'=>2]);
        return redirect('wap/people');
    }




    public function getNew() {
        $info = Member::where('id',session('user')['0']['id'])->first();
        return view('wap.personal',['info'=>$info]);
    }

    //乘客预定座位
    public function postReservedseat()  {
        $input = Input::all();
        $dataId = Order::where([
            'mid'=>session('user')['0']['id'] ,
            'order_type' => 1 ,
            'status' => 1
        ])->limit(1)->get()->toArray();
        if(count($dataId) == 0) {
            $res = Order::create([
                'mid' => session('user')['0']['id'] ,
                'record_id' => $input['id'] ,
                'record_name' => $input['name'] ,
                'order_type' => 1 ,
                'status' => 1 ,
                'num' => $input['num']
            ]);
            if(!$res) {
                return back()->with('msg','预定失败！');
            }
            $blocks = $input['yuzuo'] -  $input['num'];
            $res_f = Pinche::where('id',$input['id'])->update(['block' => $blocks]);
            if(!$res_f) {
                return back()->with('msg','预定失败！');
            }
            $value = array("status"=>"0","msg"=>"预定成功");
            echo json_encode($value);
        }else{
            $value = array("status"=>"0","msg"=>"您已经有预定信息，不能再次预定");
            echo json_encode($value);
        }

    }

    //乘客取消预定
    public function getCancelreservation() {
            $input = Input::all();
            if($input) {
                $num = Order::where(['mid'=>$input['m_id'],'order_type'=>1,'record_id'=>$input['p_id'],'status'=>1])->first();
                $_num = Pinche::where('id',$input['p_id'])->first();
                $new_num = $_num->block +  $num->num;
                Pinche::where('id',$input['p_id'])->update(['block'=>$new_num]);
                Order::where(['mid'=>$input['m_id'],'order_type'=>1])->where('record_id',$input['p_id'])->delete();
                $value = array("status"=>"0","msg"=>"取消预定成功");
                echo json_encode($value);
            }

    }


    public function getMap() {
        return  view('wap.map');
    }

}
