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
    url = SCOPE.register_url;
    data = $("#x-form").serializeArray();
    request(url,data,'post','back');
}
// 登陆请求
function login(){
    url = SCOPE.login_url;
    data = $("#x-form").serializeArray();
    request(url,data,'post');
}
// 封装公用的请求函数
function request(url,data,type,action)
{
     $.ajax({
         type:type,
         url:url,
         data:data,
         success:function(data){
            if (action == 'back')
            {
                layer.msg(data.msg,{icon:1,time: 1000}, () => {
                    window.history.go(-1);                           
                });  
            } else
            {
                layer.msg(data.msg,{icon:1,time: 1000}, () => {
                    location.reload();                        
                });                  
            }
              
         },
         'error':function(data){
            layer.msg(data.responseJSON.msg);
        }
    })    
}
//公用修改状态
function updateStatus(value)
{
    url = SCOPE.status_url;
    data = {'id':$(value).attr('x-id'),'status':$(value).attr('x-status')};
    request(url,data,'get');    
}
//公用修改
function editData()
{
    url = SCOPE.edit_url;
    data = $("#x-form").serializeArray();
    request(url,data,'post','back');
}
//公用添加
function addData()
{
    url = SCOPE.add_url;
    data = $("#x-form").serializeArray();
    request(url,data,'post','back');

}
//公共删除
function delData(value)
{
    url = SCOPE.del_url;
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
