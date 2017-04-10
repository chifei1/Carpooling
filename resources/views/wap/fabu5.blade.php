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
    <script type="text/javascript">
        $(function () {
            var curr = new Date().getFullYear();
            var opt = {}

            opt.datetime = { preset : 'datetime', minDate: new Date(2013,1,10,9,22), maxDate: new Date(2035,7,30,15,44), stepMinute: 5  };
            $('#gameover').val('').scroller('destroy').scroller($.extend(opt['datetime'], {theme: 'android', mode: 'mixed', display: 'modal', lang: 'zh',dateFormat: 'yy-mm-dd',dateOrder: 'yymmdd' }));
        });

    </script>

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
    <a href="fabu5"><button id="cum"><img src="{{asset('resources/views/wap/images/owner.png')}}" align="top" /><span>车主发布</span></button></a>
    <a href="release"><button id="owner"><img src="{{asset('resources/views/wap/images/cum.png')}}" align="top" /><span>乘客发布</span></button></a>
</div>
<div class="content">
    <div class="ttl">
        <img src="{{asset('resources/views/wap/images/coin1.png')}}" /><span>车主发布</span>

    </div>
    <ul class="list">
        <!---->
        <div class="cardexplain">
            @if(session('msg'))
                <li class="nob">
                    <div class="beizhu" ><a>{{session('msg')}}</a></div>
                </li>
            @endif
            <ul class="round">
                <form action="pfabu5" method="post">
                    {{csrf_field()}}
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>从：</th>
                                <td><input name="start" class="dropdown-select" id="start" style="margin: 0px 1px 0px -30px; border:1px #FF7F00 solid; width: 100%;" placeholder="始发 (必填)">
                                </td>
                                <th style=" width: 32px; ">到：</th>
                                <td><input name="end" class="dropdown-select" id="end" style=" border:1px #FF7F00 solid; width: 80%;" placeholder="终点 (必填)">
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>联系人</th>
                                <td><input name="name"  class="px" id="name" value="{{$userinfo['nickname']}}"  type="text" placeholder="您的称呼（必填）"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>电话</th>
                                <td><input name="phone" class="px" id="phone" value="{{$userinfo['phone']}}" type="tel" placeholder="您的联系方式（必填）"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>费用</th>
                                <td><input name="money" class="px" id="money" type="text" placeholder="拼车费用（必填）"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>座位</th>
                                <td><input name="zuowei" class="px" id="zuowei" type="text" placeholder="空余座位数（必填）"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>车型</th>
                                <td><select name="chexing" class="dropdown-select" id="chexing" style="margin: 0 13%;">
                                        <option value="轿车">轿车</option>
                                        <option value="SUV">SUV</option>
                                        <option value="MPV">MPV</option>
                                        <option value="中型客车">中型客车</option>
                                        <option value="大型客车">大型客车</option>
                                        <option value="其他">其他</option>
                                    </select></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>出发时间</th>
                                <td><input type="text" class="px" name="gameover" id="gameover" placeholder="2017-03-14 02:35（必填）" />
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>途径</th>
                                <td><input name="tujing"  class="px" id="tujing" value=""  type="text" placeholder="路过的商业圈~"></td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="kuang">
                            <tr>
                                <th>描述</th>
                                <td><textarea rows="3" class="px" name="cont" id="cont" placeholder="从哪里到哪里去写清楚哦~"></textarea></td>
                            </tr>
                        </table>
                    </li>
                    <div class="footReturn">
                        <button id="submit"  type="submit" class="submit" style="margin: auto; width: 100%;">发布拼车信息</button>
                        <div class="window" id="windowcenter">
                            <div id="title" class="wtitle"><span class="close" id="alertclose"></span></div>
                            <div class="content">
                                <div id="txt"></div>
                            </div>
                        </div>
                    </div>
                    <li>
                        <div>
                            
                        </div>
                    </li>
                </form>

            </ul>
        </div>
        <!---->
    </ul>
</div>
@include('wap.footer')
<script type="text/javascript">

    $("#click").bind("click",
        function() {
            var btn = $(this);
            var start	  = $("#start").val();
            var end 	  = $("#end").val();
            var name 	  = $("#name").val();
            var phone	  = $("#phone").val();
            var money	  = $("#money").val();
            var zuowei	  = $("#zuowei").val();
            var tujing	  = $("#tujing").val();
            var cont	  = $("#cont").val();
            var gameover  = $("#gameover").val();
            var chexing	  = $("#chexing").val();
            if (name == '') {
                alert("请输入您的称呼");
                return
            }

            if (phone == '') {
                alert("请输入您的联系方式");
                return
            }

//            var submitData = {
//                start	  : start,
//                end		  : end,
//                name 	  : name,
//                phone	  : phone,
//                money	  : money,
//                zuowei	  : zuowei,
//                tujing    : tujing,
//                cont      : cont,
//                gameover  : gameover,
//                chexing	  : chexing
//            };
//            $.post('pfabu5', submitData,
//                function(data) {
//                    if(data==1){
//                        location.href = "index";
//                    }else{
//                        alert('稍后再试.');
//                    }
//                },
//                "json")
        });

</script>
</body>
</html>