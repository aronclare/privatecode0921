var InterValObj; //timer变量，控制时间
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数

function sendMessage() {

  //检测手机号码
  var mobile = $(".J_mobile").val();
  if (mobile.length != 11 || !(/^1[34578]\d{9}$/.test(mobile))) {

    layui.use('layer', function(){
      var layer = layui.layer;
      
      layer.open({
        content: '请填写正确的手机号码'

      });
    });
    $(".J_mobile").focus();
    return false;
  }



  curCount = count;
  //设置button效果，开始计时
  $("#btnSendCode").attr("disabled", "true");
  $("#btnSendCode").val(curCount + "秒");
  InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次

  //向后台发送处理数据
  url = "/index/base/SendMobileCode";
  postData = { 'mobile': mobile };
  $.post(url, postData, function (result) {
    //相关的业务处理
    if (result.status == 1) {
      layui.use('layer', function(){
        var layer = layui.layer;
        layer.msg('手机验证码已经发送');
        
      });

    } else {
      alert("手机验证码发送失败");
      layer.open({
        content: '手机验证码发送失败'
        , skin: 'msg'
        , time: 2 //2秒后自动关闭
      });

      layui.use('layer', function(){
        var layer = layui.layer;
        layer.msg('手机验证码发送失败');
        
      });
    }
  }, 'json');

}

//timer处理函数
function SetRemainTime() {
  if (curCount == 0) {
    window.clearInterval(InterValObj);//停止计时器
    $("#btnSendCode").removeAttr("disabled");//启用按钮
    $("#btnSendCode").val("重新发送验证码");
  }
  else {
    curCount--;
    $("#btnSendCode").val(curCount + "秒");
  }
}