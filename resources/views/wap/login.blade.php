<!DOCTYPE html>
<html lang="zh-CN">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>登录</title>
{{--<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101387125"   data-redirecturi="http://trust.ecosysnetcom/wap/index" charset="utf-8" data-callback="true"></script>--}}

{{--<script type="text/javascript"--}}
        {{--src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" charset="utf-8" data-callback="true"></script>--}}
<style type="text/css">
        body {
                background-color: #ffffff;
                margin:0;
                padding:0;
        }
        *{
                margin:0;
                padding:0;
        }
        #header {
                width:100%;
                height:45px;
                line-height: 45px;
                text-align: center;
                font-size: 18px;
                border-bottom: 1px solid #bbb;
                background-color: #ffffff;
        }
        .page {
                /*padding: 0 10px;*/
        }
        .wrap {
                /*margin-top: 20px;*/
        }
        .page > .wrap > .input-container {
                padding-top:15px;
        }
        .page >.wrap > .input-container > input {
                width:100%;
                height:45px;
                text-indent: 8px;
                box-sizing: border-box;
        }
        .page > .wrap > .input-container > .imageverify{
                padding-right: 100px;
        }

        label {
                font-family: 'Microsoft YaHei';
                font-size: 20px;
        }
        input {
                font-family: 'Microsoft YaHei';
                font-size: 18px;
                text-indent: 10px;
                outline: none;
        }
        .qi {
                text-align: justify;
                text-justify:distribute-all-lines;
                text-align-last: justify;
                text-indent:10px;
                width: 60px;
        }
</style>




<body>
<div id="header">
        {{--<a href="javascript:history.go(-1);" style="position: absolute; top:0px; left: 0px; height:45px;width: 60px;">--}}
        {{--<img src="/hnair/images/fh.png" alt="" style="height:24px;margin-top: 10px; margin-left: 10px;">--}}
        {{--</a>--}}
        <p style="font-size: 20px; font-family: 'Microsoft YaHei';letter-spacing: 5px;">登录</p>
</div>
<div class="login-container page">
        <form action="/wap/plogin" method="post" id="loginForm" class="wrap">
                {{csrf_field()}}
                <div style="margin:0 auto; border-bottom: 1px solid #dcdcdc;" class="input-container">

                        <!-- <input type="text" name="username" class="username" placeholder="用户名/邮箱/已验证手机" autocomplete="off"/> -->
                        <span style="width: 25%; display: inline-block;text-align: right;line-height: 45px;">
                                <label style="margin-right: 10px;" class="qi">手机号</label>
                        </span>

                        <div style="float: right;width: 75%;"><input type="text" name="phone_number" class="phone_number" placeholder="请输入手机号" autocomplete="off" style="width: 100%;height: 45px;border:none;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></div>

                </div>
                <div style="margin:0 auto; border-bottom: 1px solid #dcdcdc;" class="input-container">
                        <!-- <input type="text" name="username" class="username" placeholder="用户名/邮箱/已验证手机" autocomplete="off"/> -->
                        <span style="width: 25%; display: inline-block;text-align: right;line-height: 45px;">
                                <label style="margin-right: 10px; width: 69px; display: inline-block;" class="qi">密码</label>
                        </span>

                        <div style="float: right;width: 75%;">
                                <input type="password" name="password" class="password" placeholder="请输入密码" oncontextmenu="return false" onpaste="return false" style="width: 100%;height: 45px;border:none;"/>

                        </div>

                </div>
                @if(session('msg'))
                        <div style="width: 100%; margin: 0; padding: 0;">
                                <span style="display: block; width: 180px; color:red; margin: 0 auto;" >{{session('msg')}}</span>
                        </div>
                @endif
                <button id="submit" type="submit" style="width:80%; height:50px; margin-left: 10%;margin-top: 35%; background-color: #e63741;border: none;border-radius: 5px;color: #fff;font-size: 18px;font-family: 'Microsoft YaHei';">登 录</button>
        </form>
        <div style="width:100%;padding:0;margin-top:15px;">
                <a href="wap/register" style="text-decoration:none;" ><span style=" display: block; width:80%; height:50px; margin: 0 auto;background-color: #e63741;border: none;border-radius: 5px;color: #fff;font-size: 18px;font-family: 'Microsoft YaHei'; text-align: center;line-height: 50px; ">立即注册</span></a>
        </div>
        <div style="margin-top:15px; text-align: center; ">
                <a  onclick="toLogin()" ><span id="qqLoginBtn"></span>
                        <img src="{{asset('resources/views/wap/images/qq_login.png')}}">
                </a>
        </div>
        {{--<script type="text/javascript">--}}
            {{--QC.Login({--}}
                {{--btnId:"qqLoginBtn"    //插入按钮的节点id--}}
            {{--});--}}
        {{--</script>--}}


</div>




{{--<script>--}}
    {{--function toLogin()--}}
    {{--{--}}
        {{--//以下为按钮点击事件的逻辑。注意这里要重新打开窗口--}}
        {{--//否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口--}}
        {{--var A=window.open("auth/qq","TencentLogin",--}}
            {{--"width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");--}}
    {{--}--}}
{{--</script>--}}

</body>

</html>
