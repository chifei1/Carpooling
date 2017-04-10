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

<div class="content">
    
    <ul class="list">
        <!---->
        <div class="cardexplain">
            <li class="nob">
                <div class="beizhu"><a><h3 style="text-align:center;">免责声明</h3><br /> &nbsp;&nbsp;&nbsp;&nbsp;本平台不能对任何人提供任何形式的担保，所有信息仅供参考，不承担由此产生的任何民事及法律责任。用户使用本平台即视为同意该免责声明，有异议者或对本声明不认同者请勿使用本平台，谢谢。</a></div>
            </li>

            <li class="nob">
                <div class="beizhu"><a><h3 style="text-align:center;">拼车要注意什么</h3><br />(一)确认身份，因为拼车双方都是互不相识的，我们如何能相信对方呢?所以必须知道对方的确切身份;<br />(二)拼车时，要核对对方身份，记下对方电话号码、对方住址、单位、职业情况等信息，查看过身份证、驾驶证等。最后不要忘了查看车况和保险记录;<br />(三)如果是多人拼车，还要对有人迟到、毁约情况做出商定等，毕竟拼车图的就是方便，不能因为谁而耽误了大家;<br />(四)双方出发前会尽量了解清楚对方的底细，到时也会小心看管好自己的财物，相信世界上还是好人多，应该不会有什么问题;<br />(五)拼车前应和车主仔细交流，在交易前就确定费用、行车路线、搭车时间等情况，减少不必要的纠纷;</a></div>
            </li>

        </div>
        <!---->
    </ul>
</div>
@include('wap.footer')

</body>
</html>