<!DOCTYPE html>
<html>
@include('wap.header')
<body>
<div class="toplink">
    <div class="con">
        <a class="back"  onclick="javascript:window.history.back();"><img src="{{asset('resources/views/wap/images/back.png')}}" /></a>
        <h2 class="ind">拼车平台</h2>
        <a href="" class="home"><img src="{{asset('resources/views/wap/images/home1.png')}}"/></a>
    </div>
</div>
<div  class="banner" id="banner">
    <div id="shop_skin_index" >
        <div class="shop_skin_index_list banner" rel="edit-t01">
            <div class="img"></div>
        </div>		</div>
</div>
<div class="nav">
    <a href="index"><button id="cum"><img src="{{asset('resources/views/wap/images/owner.png')}}" align="top" /><span>找车主</span></button></a>
    <a href="people"><button id="owner"><img src="{{asset('resources/views/wap/images/cum.png')}}" align="top" /><span>找乘客</span></button></a>
</div>
<div class="content">
    <table width="90%" border="0" cellspacing="0" cellpadding="0" class="kuang" align="center">
        <form action="powner" method="post">
            {{csrf_field()}}
            <tr>
                <th>从：</th>
                <td>
                    <input name="start" class="dropdown-select" id="start" style="border:1px #FF7F00 solid;" placeholder="始发">

                </td>
                <th>&nbsp;到：</th>
                <td>
                    <input name="end" class="dropdown-select" id="end" style="border:1px #FF7F00 solid;" placeholder="终点">
                    </td>
                <td><input type="submit" value="查询" class="submit" style="margin-left:5px;"></td>
            </tr></form>
    </table>

    <div class="ttl">
        <img src="{{asset('resources/views/wap/images/coin1.png')}}" /><span>车主列表</span>
    </div>

    @foreach($data as $rows)
    <ul class="list">
        <a href="pinche?id={{$rows['id']}}">
            <li>
                <div class="left">
                    <div class="way">{{$rows['start']}} —— {{$rows['end']}}</div>
                    <div class="line">途经：{{$rows['tujing']}}</div>
                    <div class="time">出发时间：{{date("Y-m-d H:i",$rows['overtime'])}}</div>
                </div>
                <div class="right">
                    <div class="recommended">
                        {{--<a href="#" class="yuding">预定</a>--}}
                        <a href="#" class="jian">{{$rows['zuowei']}}座</a>
                        <span class="own">车主</span>
                    </div>
                    <a class="tel" href="tel::{{$rows['phone']}}"><img src="{{asset('resources/views/wap/images/tel.png')}}" /><span>拨号</span></a>
                </div>
            </li>
        </a>
    </ul>
    @endforeach

</div>
@include('wap.footer')
</body>

<script type='text/javascript' src="{{asset('resources/views/wap/js/flexslider.js')}}"></script>
<script type='text/javascript'>
    var domain={
        www:'',
        static:'',
        img:'',
        file:'',
        kf:''};
    var shop_skin_data = [{
        "PId": "50798",
        "SId": "2",
        "TradeId": "0",
        "MemberId": "1936",
        "ContentsType": "1",
        "Title": "\"\"",
        "ImgPath": ["['{{asset('resources/views/wap/images/1.jpg')}}','{{asset('resources/views/wap/images/2.jpg')}}']"],
        "Url": "[\"\",\"\",\"\",\"\",\"\"]",
        "Postion": "t01",
        "Width": "640",
        "Height": "320",
        "NeedLink": "1"
    }];
    $(document).ready(carpool_obj.banner_init);</script>
</html>