<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo ($page_title); ?></title>
	<meta name="keywords" content="<?php echo ($page_keywords); ?>" />
	<meta name="description" content="<?php echo ($page_description); ?>" />
	
	<link rel="stylesheet" href="/Public/Home/style/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/header.css" type="text/css">
	
	<?php foreach ($page_css as $k => $v): ?>
	<link rel="stylesheet" href="/Public/Home/style/<?php echo ($v); ?>.css" type="text/css">
	<?php endforeach; ?>
	
	<link rel="stylesheet" href="/Public/Home/style/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/footer.css" type="text/css">
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
	<script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/Home/js/header.js"></script>
	
    <script type="text/javascript" charset="utf-8" src="/Public/Home/js/gt.js"></script>
	<?php foreach ($page_js as $k => $v): ?>
	<script type="text/javascript" src="/Public/Home/js/<?php echo ($v); ?>.js"></script>
	<?php endforeach; ?>
</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li id="login"></li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	<div style="clear:both;"></div>

	<!-- 内容 -->
	
<style>
 .show {display: block;}
 .hide {display: none;}
 #notice {color: red;}
</style>
<!-- 登录主体部分start -->
	<div class="login w990 bc mt10">
		<div class="login_hd">
			<h2>用户登录</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="" method="post">
					<ul>
						<li>
							<label for="">Email：</label>
							<input type="text" class="txt" name="email" />
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" />
						</li>
						<li>
							<div style="float:left;padding-top:15px;">验证码：</div>
							<div id="embed-captcha" style="padding-left:60px;"></div>
	    					<p id="wait" class="show">正在加载验证码......</p>
	    					<p id="notice" class="hide">请先完成验证</p>	
						</li>
						<!--  <li>
							<label for="">&nbsp;</label>
							<img onclick="this.src='<?php echo U('chkcode'); ?>#'+Math.random();" style="cursor:pointer;" src="<?php echo U('chkcode'); ?>" alt="" />
							<span>看不清？<a onclick="$(this).parent().prev('img').trigger('click');" href="javascript:void(0);">换一张</a></span>
						</li>
						-->
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>

				<div class="coagent mt15">
					<dl>
						<dt>使用合作网站登录商城：</dt>
						<dd class="qq"><a href=""><span></span>QQ</a></dd>
						<dd class="weibo"><a href=""><span></span>新浪微博</a></dd>
						<dd class="yi"><a href=""><span></span>网易</a></dd>
						<dd class="renren"><a href=""><span></span>人人</a></dd>
						<dd class="qihu"><a href=""><span></span>奇虎360</a></dd>
						<dd class=""><a href=""><span></span>百度</a></dd>
						<dd class="douban"><a href=""><span></span>豆瓣</a></dd>
					</dl>
				</div>
			</div>
			
			<div class="guide fl">
				<h3>还不是商城用户</h3>
				<p>现在免费注册成为商城用户，便能立刻享受便宜又放心的购物乐趣，心动不如行动，赶紧加入吧!</p>

				<a href="regist.html" class="reg_btn">免费注册 >></a>
			</div>

		</div>
	</div>
	<!-- 登录主体部分end -->
<div style="clear:both;"></div>

	<!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<div class="bnav1">
			<h3><b></b> <em>购物指南</em></h3>
			<ul>
				<li><a href="">购物流程</a></li>
				<li><a href="">会员介绍</a></li>
				<li><a href="">团购/机票/充值/点卡</a></li>
				<li><a href="">常见问题</a></li>
				<li><a href="">大家电</a></li>
				<li><a href="">联系客服</a></li>
			</ul>
		</div>
		
		<div class="bnav2">
			<h3><b></b> <em>配送方式</em></h3>
			<ul>
				<li><a href="">上门自提</a></li>
				<li><a href="">快速运输</a></li>
				<li><a href="">特快专递（EMS）</a></li>
				<li><a href="">如何送礼</a></li>
				<li><a href="">海外购物</a></li>
			</ul>
		</div>

		
		<div class="bnav3">
			<h3><b></b> <em>支付方式</em></h3>
			<ul>
				<li><a href="">货到付款</a></li>
				<li><a href="">在线支付</a></li>
				<li><a href="">分期付款</a></li>
				<li><a href="">邮局汇款</a></li>
				<li><a href="">公司转账</a></li>
			</ul>
		</div>

		<div class="bnav4">
			<h3><b></b> <em>售后服务</em></h3>
			<ul>
				<li><a href="">退换货政策</a></li>
				<li><a href="">退换货流程</a></li>
				<li><a href="">价格保护</a></li>
				<li><a href="">退款说明</a></li>
				<li><a href="">返修/退换货</a></li>
				<li><a href="">退款申请</a></li>
			</ul>
		</div>

		<div class="bnav5">
			<h3><b></b> <em>特色服务</em></h3>
			<ul>
				<li><a href="">夺宝岛</a></li>
				<li><a href="">DIY装机</a></li>
				<li><a href="">延保服务</a></li>
				<li><a href="">家电下乡</a></li>
				<li><a href="">京东礼品卡</a></li>
				<li><a href="">能效补贴</a></li>
			</ul>
		</div>
	</div>
	<!-- 底部导航 end -->
<script type="text/javascript">
//极验验证码
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
	
	   //jqureyForm插件提交表单
	$('form').submit(function(){
		$(this).ajaxSubmit({
			type:"post",
			url:"<?php echo U('login');?>",
			dataType:"json",
			success:function(msg){
				if(msg.status==1){
					//成功跳转首页
					var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
					setTimeout(function(){
						location.href="<?php echo U('Index/index');?>";
					},1500);
				}else if(msg.status==2){
					//成功跳转评论页面
					var index = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
					setTimeout(function(){
						location.href=msg.url;
					},1500);
					
				}else{
				//错误提示
					layer.alert('<h4 style="color:red;">'+msg.error+'</h4>', {
						  skin: 'layui-layer-molv', //样式类名
						  closeBtn: 1
						});
				}
			}		
		});
		
		//阻止表单提交
		return false;
	});


</script>
	
	<!-- 底部导航 end -->
	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2018-2020 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="/Public/Home/images/xin.png" alt="" /></a>
			<a href=""><img src="/Public/Home/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="/Public/Home/images/police.jpg" alt="" /></a>
			<a href=""><img src="/Public/Home/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->

</body>
<script type="text/javascript">

//AjaX判断登录状态
$.ajax({
	type: "get",
	url: "<?php echo U('Member/ajaxChkLogin');?>",
	dataType: "json",
	success:function(data){
		if(data.ok==1){
			var html="您好！，"+data.email+"  <a href='<?php echo U('Member/logout');?>' style='cursor:pointer;'>[退出]</a>";
		}else{
			var html="您好!，欢迎来到京西！[<a href='<?php echo U('Member/login');?>'>登录</a>] [<a href='<?php echo U('Member/regist');?>'>免费注册</a>]";
		}
		$('#login').html(html);
	}
	
});
</script>

</html>