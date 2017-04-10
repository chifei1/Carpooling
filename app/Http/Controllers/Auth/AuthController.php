<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Input;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Controllers\Auth\Redirect;
use Auth,Config,Crypt,Request;
use App\Http\Model\Member;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function qq() {
//        $login_url =  "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101386777&redirect_uri=http://trust.ecosysnet.com/wap/index&state=ecosysnet";
//        header("Location:$login_url");
        return redirect("https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101387125&redirect_uri=".urlencode('http://trust.ecosysnet.com/wap/index')."&state=ecosysnet");//https://graph.qq.com/oauth2.0/authorize
        //return \Socialite::with('qq')->redirect();
        // return \Socialite::with('weibo')->scopes(array('email'))->redirect();

        //   access_token=2C011A20A9E00682AA9B86C68177C292&expires_in=7776000&refresh_token=9A6DC40EFEA0B5EA34EF5087C2C9809C

    }


    public function qqcallback()
    {
        $input = Input::all();
        if ($input['code']) {
            session('code', $input['code']);
            session('state', $input['state']);
            $response = file_get_contents("https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101387125&client_secret=87e66eb1b0be7563a7fc9a490d2995c2&code=" . $input['code'] . "&redirect_uri=" . urlencode('http://trust.ecosysnet.com/wap/index'));

            $res = explode('&', $response);
            $_res = explode('=', $res['0']);
            $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" . $_res['1'];
            $str = file_get_contents($graph_url);

            if (strpos($str, "callback") !== false) {
                $lpos = strpos($str, "(");
                $rpos = strrpos($str, ")");
                $str = substr($str, $lpos + 1, $rpos - $lpos - 1);
            }
            $user = json_decode($str);

            $url = "https://graph.qq.com/user/get_user_info?access_token=" . $_res['1'] . "&oauth_consumer_key=101387125&openid=" . $user->openid;

            $info = $this->curl($url);
            session('qqinfo', $info);
        }
    }

        public function curl($url,$method="GET") {
            //初始化116

            $header[]= 'Content-Type: application/json';
            $header[]= "X-HTTP-Method-Override: $method";

            $ch = curl_init(); //初始化CURL句柄
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_URL, $url); //设置请求的URL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //设为TRUE把curl_exec()结果转化为字串，而不是直接输出
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); //设置请求方式
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_TIMEOUT,5);

            $result = curl_exec($ch);//执行预定义的CURL
            $returnData = [];
            if(!curl_errno($ch)) {
                $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
                $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $body = substr($result, $headerSize);
                $header = substr($result,0,$headerSize);
                $returnData['body'] = json_decode($body,true);
                $returnData['header'] = $header;
                $returnData['code'] = $httpcode;
            } else {
                $returnData['code'] = 500;
            }
            curl_close($ch);
            return $returnData;
        }


        public function getQqregister() {
            return view('wap/qqregister');
        }           


        //登陆
        public function getMyLogin() {
            return view('wap/login');
        }

        //退出登陆
        public function getLogout() {
            session(['user'=> '']);
            return redirect('wap/indexs');
        }

        public function postMylogin() {
            $input = Input::all();
            if($input['phone_number'] == "" || $input['password'] == "") {
                return back()->with('msg','请输入用户名或者密码！');
            }

            $obj = Member::where('phone',$input['phone_number'])->get()->toArray();
            if(!$obj)  {
                return back()->with('msg','用户不存在！');
            }
            if($obj['0']['phone'] != $input['phone_number'] || Crypt::decrypt($obj['0']['password'])!= $input['password']){
                return back()->with('msg','用户名或者密码错误！');
            }
            session(['user'=>$obj]);
            return redirect('wap/indexs');

        }

        public function getMyregister()
        {
            return view('wap/register');
        }

        public function postMyregister()
        {
            $input = Input::all();
            if($input['password'] != $input['password_confirm']) {
                return back()->with('msg','密码输入不一致');
            }
            $obj = Member::where('phone',$input['phone_number'])->get()->toArray();
            if($obj)  {
                return back()->with('msg','该手机号已注册');
            }
            $obj = Member::where('phone',$input['qq'])->get()->toArray();
            if($obj)  {
                return back()->with('msg','QQ号已被使用');
            }
            if($input['phone_number'] == "" || $input['qq'] == "" || $input['nickname'] == "" || $input['password'] == "" ) {
                return back()->with('msg','请输入必填信息');
            }
            $res = Member::create([
                'qq' => $input['qq']  ,
                'qqname' => $input['qq_name'] ,
                'nickname' => $input['nickname'] ,
                'password' => Crypt::encrypt($input['password']) ,
                'phone' => $input['phone_number']
            ]);
            if($res) {
                $obj = Member::where('phone',$input['phone_number'])->get()->toArray();
            }else{
                return back()->with('msg','注册失败');
            }
            session(['user'=>$obj]);
            return redirect('wap/indexs');
        }

//    public function postLogin()
//    {
//        $input = Input::all();
//        if( empty($remember)) {  //remember表示是否记住密码
//            $remember = 0;
//        } else {
//            $remember = $input['_token'];
//        }
//        //如果要使用记住密码的话，需要在数据表里有remember_token字段
//        if (Auth::attempt(['phone' => $input['phone_number'], 'password' => $input['password']], $remember)) {
//            return redirect()->intended('wap/index');
//        }
//        return redirect('wap/login')->withInput()->with('msg', '用户名或密码错误');
//    }

//    public function postLogin(Request $request)
//    {
//        $request = new Request;
//        $name = $request->input('phone');
//        $password = $request->input('password');
//        if( empty($remember)) {  //remember表示是否记住密码
//            $remember = 0;
//        } else {
//            $remember = $request->input('remember');
//        }
//        //如果要使用记住密码的话，需要在数据表里有remember_token字段
//        if (Auth::attempt(['phone' => $name, 'password' => $password], $remember)) {
//            return redirect()->intended('/');
//        }
//        return redirect('login')->withInput($request->except('password'))->with('msg', '用户名或密码错误');
//    }


    }
