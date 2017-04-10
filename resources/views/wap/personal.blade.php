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
    <script type="text/javascript" src="{{asset('resources/views/wap/js/jquery-1.11.1.min.js')}}"></script>
    <link href="{{asset('resources/views/wap/css/fans.css?v=1.1')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('resources/views/wap/css/mobiscroll.custom-2.6.2.min.css')}}" media="all" />
    <script src="{{asset('resources/views/wap/js/mobiscroll.custom-2.6.2.min.js')}}" type="text/javascript"></script>
    <style>
        .footFix{width:100%;text-align:center;position:fixed;left:0;bottom:0;z-index:99;}
        #footReturn a, #footReturn2 a {
            display: block;
            line-height: 41px;
            color: #fff;
            text-shadow: 1px 1px #282828;
            font-size: 14px;
            font-weight: bold;
        }
        #footReturn, #footReturn2 {
            z-index: 89;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            width: 100%;
            outline: 0 none;
            overflow: visible;
            Unknown property name.-moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
            height: 41px;
            opacity: .95;
            border-top: 1px solid #181818;
            box-shadow: inset 0 1px 2px #b6b6b6;
            background-color: #515151;
            Invalid property value.background-image: -ms-linear-gradient(top,#838383,#202020);
            background-image: -webkit-linear-gradient(top,#838383,#202020);
            Invalid property value.background-image: -moz-linear-gradient(top,#838383,#202020);
            Invalid property value.background-image: -o-linear-gradient(top,#838383,#202020);
            background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#838383),to(#202020));
            Invalid property value.filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
            Unknown property name.-ms-filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
        }
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

<div class="content">

    <ul class="list">
        <!---->
        <div class="cardexplain" >
            <div style="margin: 0px;padding: 0px; width: 100%; height: 120px; text-align:center; display:table;">
                <span style="display:table-cell; vertical-align:middle;"><img src="{{asset('resources/views/wap/images/user.jpg')}}" alt="" style="height: 100px; width: 150px; "></span>
            </div>
            {{--<li class="nob">--}}
                {{--<div class="beizhu " style="font-size: 20px; margin-bottom: 0px; display: block;text-align: center;"><a >个人中心</a></div>--}}
            {{--</li>--}}
            <ul class="round">
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>姓名</th>
                                <td><input style="border:0;" name="name"  class="px" id="name" value="{{$info->nickname}}" readonly="readonly"  type="text" placeholder="请补全信息"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>QQ</th>
                                <td><input style="border:0;" name="qq"  class="px" id="name" value="{{$info->qq}}"  type="text" readonly="readonly" placeholder="请补全信息"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>QQ名称</th>
                                <td><input style="border:0;" name="qqname"  class="px" id="name" value="{{$info->qqname}}" readonly="readonly"  type="text" placeholder="请补全信息"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>电话</th>
                                <td><input style="border:0;" name="phone"  class="px" id="name" value="{{$info->phone}}" readonly="readonly"  type="text" placeholder="请补全信息"></td>
                            </tr>
                        </table>
                    </li>
                    
                    
                    <div class="footReturn">
                        <a href="logout"><button id="submit"  type="submit" class="submit" style="margin: auto; width: 100%;">退出登录</button></a>
                        <div class="window" id="windowcenter">
                            <div id="title" class="wtitle"><span class="close" id="alertclose"></span></div>
                            <div class="content">
                                <div id="txt"></div>
                            </div>
                        </div>
                    </div>
            </ul>
        </div>
        <!---->
    </ul>
</div>
@include('wap.footer')
</body>
</html>