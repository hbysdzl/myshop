<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Application/Admin/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Application/Admin/Public/Styles/main.css" rel="stylesheet" type="text/css" />
<script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/gt.js"></script>
<script type="text/javascript" src="/Application/Admin/Public/Js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/jquery.form.js"></script>
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/layer/layer.js"></script>
<style>
 .show {display: block;}
 .hide {display: none;}
 #notice {color: red;}
</style>
</head>
<body style="background: #278296;color:white">
<form method="post" action="/index.php/Admin/Login/login">
    <table cellspacing="0" cellpadding="0" style="margin-top:100px" align="center" >
        <tr>
            <td>
                <img src="/Application/Admin/Public/Images/login.png" width="178" height="256" border="0" alt="ECSHOP" />
            </td>
            <td style="padding-left: 50px">
                <table>
                    <tr>
                        <td>管理员姓名：</td>
                        <td>
                            <input type="text" name="username" />
                        </td>
                    </tr>
                    <tr>
                        <td>管理员密码：</td>
                        <td>
                            <input type="password" name="password" />
                        </td>
                    </tr>
                    <tr>
                        <td>验证码：</td>
                        <td>
                           <div id="embed-captcha"></div>
	    					<p id="wait" class="show">正在加载验证码......</p>
	    					<p id="notice" class="hide">请先完成验证</p> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                          <!--
                          <img onclick="this.src='<?php echo U('chkcode') ?>#'+Math.random();" src="/index.php/Admin/Login/chkcode" />
							 <a>看不清？换一张</a> 
                           -->  
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="checkbox" value="1" name="remember" id="remember" />
                            <label for="remember">请保存我这次的登录信息。</label>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" value="进入管理中心" class="button" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
</body>
<script>
    var handlerEmbed = function (captchaObj) {
        $("#embed-submit").click(function (e) {
            var validate = captchaObj.getValidate();
            if (!validate) {
                $("#notice")[0].className = "show";
                setTimeout(function () {
                    $("#notice")[0].className = "hide";
                }, 2000);
                e.preventDefault();
            }
        });
        // 将验证码加到id为captcha的元素里，同时会有三个input的值：geetest_challenge, geetest_validate, geetest_seccode
        captchaObj.appendTo("#embed-captcha");
        captchaObj.onReady(function () {
            $("#wait")[0].className = "hide";
        });
        // 更多接口参考：http://www.geetest.com/install/sections/idx-client-sdk.html
    };
	   $.ajax({
	        // 获取id，challenge，success（是否启用failback）
	        url: "<?php echo U('getverify','',false);?>/t/" + (new Date()).getTime(), // 加随机数防止缓存
	        type: "get",
	        dataType: "json",
	        success: function (data) {
	            console.log(data);
	            // 使用initGeetest接口
	            // 参数1：配置参数
	            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
	            initGeetest({
	                gt: data.gt,
	                challenge: data.challenge,
	                new_captcha: data.new_captcha,
	                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
	                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
	                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
	            }, handlerEmbed);
	        }
	    });
   
//jqurefrom提交表单
$('form').submit(function(){
	$(this).ajaxSubmit({
		type:"post",
		url:"<?php echo U('login');?>",
		dataType:"json",
		success:function(msg){
			if(msg.status==1){
				var index = layer.load(1, {
					  shade: [0.1,'#fff'] //0.1透明度的白色背景
					});
				setTimeout(function(){
					location.href="<?php echo U('Index/index');?>";
				},1000);
			}else{
				layer.msg(msg.error);
				 
			}
		}
	});
	//阻止表单提交
	return false;
});
</script>