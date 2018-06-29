function enter_from(){
    if(event.keyCode == 13){
        //回车提交
        login();
    }
}
function dialogmsg(str){
    layer.msg(str);
}
// 注册请求
function register(){
     $.ajax({
         type:'post',
         url:SCOPE.register_url,
         data:{'username':$('#username').val(),'password':$('#password').val(),'repassword':$('#repassword').val()},
         success:function(data){
            dialogmsg(data.msg);
                setTimeout(
                        ()=>
                        {
                        window.location.href=SCOPE.login_url;                    
                        },1000)
         },
         'error':function(data){
            dialogmsg(data.responseJSON.msg);
        }
    })
}
// 登陆请求
function login(){
     $.ajax({
         type:'post',
         url:SCOPE.login_url,
         data:{'username':$('#username').val(),'password':$('#password').val()},
         success:function(data){
            dialogmsg(data.msg);
                setTimeout(
                        ()=>
                        {
                        window.location.href=SCOPE.index_url;                    
                        },1000)
         },
         'error':function(data){
            dialogmsg(data.responseJSON.msg);
        }
    })
}
// 封装公用的请求函数
function request(url,data,type)
{
     $.ajax({
         type:type,
         url:url,
         data:data,
         success:function(data){
                layer.msg(data.msg,{icon:1,time: 1000}, () => {
                    location.reload();
                });

         },
         'error':function(data){
            layer.msg(data.responseJSON.msg);
        }
    })    
}
// 封装公用的请求函数
function requestBack(url,data,type)
{
    $.ajax({
        type:type,
        url:url,
        data:data,
        success:function(data){
            layer.msg(data.msg,{icon:1,time: 1000}, () => {
                window.history.go(-1);
        });

        },
        'error':function(data){
            layer.msg(data.responseJSON.msg);
        }
    })
}
//后台用户状态更新
function updateAdminStatus(value)
{
    url = SCOPE.status_url;
    data = {'id':$(value).attr('x-id'),'status':$(value).attr('x-status')};
    request(url,data,'get');
}
//后台用户状态更新
function updateRoleStatus(value)
{
    url = SCOPE.status_url;
    data = {'id':$(value).attr('x-id'),'status':$(value).attr('x-status')};
    request(url,data,'get');
}
//公用修改状态
function updateStatus(value)
{
    url = SCOPE.status_url;
    data = {'id':$(value).attr('x-id'),'status':$(value).attr('x-status')};
    request(url,data,'get');    
}
//添加后台用户
function addAdmin()
{
    url = SCOPE.add_url;
    data = {"username":$("#username").val(),"password":$("#password").val(),"repassword":$("#repassword").val(),"email":$("#email").val()};
    request(url,data,'post');    
}
//公用修改
function editData()
{
    url = COMMON.edit_url;
    data = $("#x-form").serializeArray();
    requestBack(url,data,'post');
}
//公用添加
function addData()
{
    url = COMMON.add_url;
    data = $("#x-form").serializeArray();
    requestBack(url,data,'post');

}
//公共删除
function delData(value)
{
    url = COMMON.del_url;
    data = {'id':$(value).attr('x-id')}
    layer.confirm('确认要删除么？', {
        btn: ['确认','取消'] //按钮
    }, function(){
        request(url,data,'get');
    },function(){
    });
}
//公用layer弹出层
function open_s(str)
{
    layer.open({
      type: 1,
      skin: 'layui-layer-rim', //加上边框
      area: ['420px', '240px'], //宽高
      content: str
    });    
}
