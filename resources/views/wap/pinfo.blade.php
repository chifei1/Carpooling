<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale = 1.0,maximum-scale = 1.0,width=device-width" />
    <meta content="telephone=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>拼车平台</title>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/wap/css/common.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/wap/css/style.css')}}"/>
    <link href="{{asset('resources/views/wap/css/fans.css?v=1.1')}}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .tdzjp{color: #999999;padding:0 0 0 10px; font-size:16px; font-weight:normal;text-align: left;}
    </style>
</head>
<body>
<div class="toplink">
    <div class="con">
        <a class="back"  onclick="javascript:window.history.back();"><img src="{{asset('resources/views/wap/images/back.png')}}" /></a>
        <h2 class="ind">拼车平台</h2>
        <a href="index.php" class="home"><img src="{{asset('resources/views/wap/images/home1.png')}}"/></a>
    </div>
</div>
<div class="nav">
    <a href="index"><button id="cum"><img src="{{asset('resources/views/wap/images/owner.png')}}" align="top" /><span>找车主</span></button></a>
    <a href="people"><button id="owner"><img src="{{asset('resources/views/wap/images/cum.png')}}" align="top" /><span>找乘客</span></button></a>
</div>
<div class="content">
    <div class="ttl">
        <img src="{{asset('resources/views/wap/images/coin1.png')}}" /><span>乘客信息</span>

    </div>
    <ul class="list">
        <!---->
        <div class="cardexplain">
            <ul class="round">
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>从：</th>
                            <td><span class="tdzjp">{{$data['0']['start']}}</span></td>
                            <th>到：</th>
                            <td><span class="tdzjp">{{$data['0']['end']}}</span></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>联系人</th>
                            <td><span class="tdzjp">{{$data['0']['name']}}</span></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>电话</th>
                            <td><a class="tel" href="tel:{{$data['0']['phone']}}"><span class="tdzjp">{{$data['0']['phone']}} </span>点击拨号</a></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>费用</th>
                            <td><span class="tdzjp">{{$data['0']['money']}}（元）</span></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>人数</th>
                            <td><span class="tdzjp">{{$data['0']['chengke']}} 人</span></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>出发时间</th>
                            <td><span class="tdzjp">{{date("Y-m-d H:i",$data['0']['overtime'])}}</span></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>途径</th>
                            <td><span class="tdzjp">{{$data['0']['tujing']}}</span></td>
                        </tr>
                    </table>
                </li>
                <li>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                        <tr>
                            <th>描述</th>
                            <td><span class="tdzjp">{{$data['0']['cont']}}</span></td>
                        </tr>
                    </table>
                </li>
                <li></li>
            </ul>

            @if($id == $data['0']['mid'])
                <a href="passengercancel?id={{$data['0']['id']}}">
                    <ul>
                        <button style="background: #ffc24d none repeat scroll 0 0; border: medium none; display: block; margin: auto; height: 3rem;text-align: center; width: 49%;">
                            <span style="color: #fff; display: inline-block; font-size: 1.2rem; margin-left: 0rem;">已出发</span>
                        </button>
                    </ul>
                </a>
            @endif
        </div>
        <!---->
    </ul>
</div>
@include('wap.footer')
</body>
</html>