//JavaScript Document
$(function(){
    function submit(val){
        var id = $('#getId').attr('data-id');
        var yuzuo = parseInt($('#yuzuo').attr('data'));
        var name = $('#name').attr('data');
        if( val > yuzuo) {
            webToast("输入数量大于剩余座位的数量","bottom", 1000);
            return;
        }
        $.ajax({
            url:"yudingc",
            type:'post',
            dataType:'json',
            data:{num:val,id:id,yuzuo:yuzuo,name:name},
            success:function(data){
                if (data.status == 0) {
                    alert(data.msg);
                    location.reload();
                } else {
                    alert(data.msg);
                }
            },
            error: function () {
                alert("程序异常");
            }
        })
    };
    $('#reserve').on('click', function(){
        var html = "<label style='font-size: 16px;'>预定人数：<input class='confirm_input' placeholder='请输入'></label>";
        popTipShow.confirm('预定座位',html,['确 定','取 消'],
            function(e){
                //callback 处理按钮事件
                var button = $(e.target).attr('class');
                if(button == 'ok'){
                    var val =  parseInt($(".confirm_input").val());
                    if($.trim(val)==''){
                        webToast("请输入数量","bottom", 1000);
                        return;
                    }
                    this.hide();
                    submit(val)
                    //按下确定按钮执行的操作
                    //todo ....
                }

                if(button == 'cancel') {
                    this.hide();
                }
            }
        );
    });
    $('#cancel_reserve').on('click',function(){
        var _id = $('#getId').attr('data-id');
        var _mid = $('#getId').attr('m-id');
        $.ajax({
            url:"Cancelres?m_id="+_mid+"&p_id="+_id,
            type:'get',
            dataType:'json',
            //data:{num:val,id:id,yuzuo:yuzuo,name:name},
            success:function(data){
                if (data.status == 0) {
                    alert(data.msg);
                    location.reload();
                } else {
                    alert(data.msg);
                }
            },
            error: function () {
                alert("程序异常");
            }
        })
    });
});
