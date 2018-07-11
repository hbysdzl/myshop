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
	<script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
	<script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/Home/js/header.js"></script>
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
	
<!-- 登录主体部分start -->
	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>用户注册</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="" method="post">
					<ul>
						<li>
							<label for="">Email：</label>
							<input type="text" class="txt" name="email" />
							<p>请输入正确的Email地址</p>
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" />
							<p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
						</li>
						<li>
							<label for="">确认密码：</label>
							<input type="password" class="txt" name="cpassword" />
							<p> <span>请再次输入密码</p>
						</li>
						<li>
							<label for="">验证码：</label>
							<input class="txt" type="text"  name="code" /><br />
						</li>
						<li>
							<label for="">&nbsp;</label>
							<img onclick="this.src='<?php echo U('chkcode'); ?>#'+Math.random();" style="cursor:pointer;" src="<?php echo U('chkcode'); ?>" alt="" />
							<span>看不清？<a onclick="$(this).parent().prev('img').trigger('click');" href="javascript:void(0);">换一张</a></span>
						</li>
						<li>
							<label for="">手机号码：</label>
							<input type="text" class="txt" id="phone" name="tel" />
							<p> <span>请填写手机号码</p>
						</li>
						<li>
							<label for="">短信验证码：</label>
							<input  type="text"  name="telcode" size="15" />
							<input  type="button" id="sendcode" value="点击发送" size="10" />
							<br/>
						</li>

						<li>
							<label for="">&nbsp;</label>
							<input name="mustclick" value='1' type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>


			</div>

			<div class="mobile fl">
				<h3>手机快速注册</h3>
				<p>中国大陆手机用户，编辑短信 “<strong>XX</strong>”发送到：</p>
				<p><strong>1069099988</strong></p>
			</div>

		</div>
	</div>
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
//jqureyForm插件提交表单
//实现使用jQueryForm实现表单提交
	$('form').submit(function(){
		//具体实现使用jqueryForm的方式ajax提交
		$(this).ajaxSubmit({
			url:"<?php echo U('regist');?>", //指定表单的提交地址
			type:'post',//表示具体的请求类型 post/get
			dataType:'json',//指定数据交互格式
			success:function(msg){
				if(msg.status==1){
					layer.alert('恭喜您！注册成功，请登录邮箱完成验证', {
						  skin: 'layui-layer-molv' //样式类名
						  ,closeBtn: 2
						
						});
				}else{
					
					layer.alert(msg.error, {
					  skin: 'layui-layer-molv' //样式类名
					  ,closeBtn: 2
					
					});
				}
			}
		});
		//阻止当前的表单默认的提交
		return false;
	});
//点击按钮发送验证码
	$('#sendcode').click(function() {
		//获取手机号码
		var code=$('#phone').val();
		$.ajax({
			type:"post",
			url:"<?php echo U('sendcode');?>",
			data:{tel:code},
			dataType:"json",
			success: function(msg){
					if (msg.status==1) {
						layer.tips('发送成功，注意查收！', '#sendcode', {
							  tips: [1, '#3595CC'],
							  time: 4000
							});
						
					}else{
						layer.tips(msg.error, '#phone', {
							  tips: [1, '#3595CC'],
							  time: 2000
							});
					}
			}
		});
	});

</script>
<!-- 登录主体部分end -->
	
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