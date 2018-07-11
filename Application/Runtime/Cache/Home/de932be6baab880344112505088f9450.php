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
	

<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="/Public/Home/images/logo.png" alt="京西商城"></a></h2>
			<div class="flow fr flow2">
				<ul>
					<li>1.我的购物车</li>
					<li class="cur">2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	<div id="tishi" style="background:#f6cb62;width:500px;height:50px;position: absolute; left:700px;top:500px;display:none;text-align:center;font-size:18px;line-height:50px;">
		
	</div>
	<div style="clear:both;"></div>
<form action="" method="POST" name="order_form" id="order_form">
	<!-- 主体部分 start -->
	<div class="fillin w990 bc mt15">
		<div class="fillin_hd">
			<h2>填写并核对订单信息</h2>
		</div>

		<div class="fillin_bd">
			<!-- 收货人信息  start-->
			<div class="address">
				<h3>收货人信息 <a href="javascript:;" id="address_modify">[修改]</a></h3>
				<div class="address_info">
					<p>王超平  13555555555 </p>
					<p>北京 昌平区 西三旗 建材城西路金燕龙办公楼一层 </p>
				</div>

				<div class="address_select none">
					<ul>
						<li class="cur">
							<input type="radio" name="address" checked="checked"  />王超平 北京市 昌平区 建材城西路金燕龙办公楼一层 13555555555 
							<a href="">设为默认地址</a>
							<a href="">编辑</a>
							<a href="">删除</a>
						</li>
						<li>
							<input type="radio" name="address" />王超平 湖北省 武汉市  武昌 关山光谷软件园1号201 13333333333
							<a href="">设为默认地址</a>
							<a href="">编辑</a>
							<a href="">删除</a>
						</li>
						<li><input type="radio" name="address" class="new_address"  />使用新地址</li>
					</ul>	
						<ul>
							<li>
								<label for=""><span>*</span>收 货 人：</label>
								<input type="text" name="shr_name" class="txt" />
							</li>
							<li>
								<label for=""><span>*</span>所在地区：</label>
								<select name="shr_province" id="">
									<option value="">请选择</option>
									<option value="北京">北京</option>
									<option value="上海">上海</option>
									<option value="天津">天津</option>
									<option value="重庆">重庆</option>
									<option value="武汉">武汉</option>
								</select>

								<select name="shr_city" id="">
									<option value="">请选择</option>
									<option value="朝阳区">朝阳区</option>
									<option value="东城区">东城区</option>
									<option value="西城区">西城区</option>
									<option value="海淀区">海淀区</option>
									<option value="昌平区">昌平区</option>
								</select>

								<select name="shr_area" id="">
									<option value="">请选择</option>
									<option value="西二旗">西二旗</option>
									<option value="西三旗">西三旗</option>
									<option value="三环以内">三环以内</option>
								</select>
							</li>
							<li>
								<label for=""><span>*</span>详细地址：</label>
								<input type="text" name="shr_address" class="txt address"  />
							</li>
							<li>
								<label for=""><span>*</span>手机号码：</label>
								<input type="text" name="shr_tel" class="txt" />
							</li>
						</ul>
				</div>
			</div>
			<!-- 收货人信息  end-->

			<!-- 配送方式 start -->
			<div class="delivery">
				<h3>发货方式</h3>
				<div class="delivery_select">
					<table>
						<thead>
							<tr>
								<th class="col1">送货方式</th>
								<th class="col2">运费</th>
								<th class="col3">运费标准</th>
							</tr>
						</thead>
							<tr>
								
								<td><input type="radio" name="post_method" value="顺风" />顺风</td>
								<td>￥40.00</td>
								<td>每张订单不满499.00元,运费40.00元, 订单4...</td>
							</tr>
							<tr>
								
								<td><input type="radio" name="post_method" value="圆通" />圆通</td>
								<td>￥40.00</td>
								<td>每张订单不满499.00元,运费40.00元, 订单4...</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> 
			<!-- 配送方式 end --> 

			<!-- 支付方式  start-->
			<div class="pay">
				<h3>支付方式</h3>
				<div class="pay_select">
					<table> 
						<tr class="cur">
							<td class="col1"><input type="radio" name="pay_method" value="支付宝" />支付宝</td>
							<td class="col2">送货上门后再收款，支持现金、POS机刷卡、支票支付</td>
						</tr>
					</table>
				</div>
			</div>
			<!-- 支付方式  end-->

			<!-- 发票信息 start-->
			<div class="receipt">
				<h3>发票信息 <a href="javascript:;" id="receipt_modify">[修改]</a></h3>
				<div class="receipt_info">
					<p>个人发票</p>
					<p>内容：明细</p>
				</div>

				<div class="receipt_select none">
					
						<ul>
							<li>
								<label for="">发票抬头：</label>
								<input type="radio" name="type" checked="checked" class="personal" />个人
								<input type="radio" name="type" class="company"/>单位
								<input type="text" class="txt company_input" disabled="disabled" />
							</li>
							<li>
								<label for="">发票内容：</label>
								<input type="radio" name="content" checked="checked" />明细
								<input type="radio" name="content" />办公用品
								<input type="radio" name="content" />体育休闲
								<input type="radio" name="content" />耗材
							</li>
						</ul>						
					
					<a href="" class="confirm_btn"><span>确认发票信息</span></a>
				</div>
			</div>
			<!-- 发票信息 end-->

			<!-- 商品清单 start -->
			<div class="goods">
				<h3>商品清单</h3>
				<table>
					<thead>
						<tr>
							<th class="col1">商品</th>
							<th class="col2">规格</th>
							<th class="col3">价格</th>
							<th class="col4">数量</th>
							<th class="col5">小计</th>
						</tr>	
					</thead>
					<tbody>
				<?php $tp=0;?>			
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr goods_id="<?php echo ($vo["goods_id"]); ?>" goods_attr_id="<?php echo ($vo["goods_attr_id"]); ?>">
						<td class="col1"><a href="<?php echo U('Goods/goods','',false);?>/goods_id/<?php echo ($vo["goods_id"]); ?>"><?php echo showImage($vo['sm_logo'])?></a><strong><a href="<?php echo U('Goods/goods','',false);?>/goods_id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></strong></td>
						<td class="col2"><?php echo ($vo["goods_attr_str"]); ?></td>
						<td class="col3">￥<span><?php echo ($vo["price"]); ?></span>元</td>
						<td class="col4"><?php echo ($vo["goods_number"]); ?></td>
						<td class="col5">￥<span><?php  $tx=$vo['goods_number']*$vo['price'];echo $tx; $tp+=$tx?></span>元</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
				</tbody>
				</table>
			</div>
			<!-- 商品清单 end -->
		</div>

		<div class="fillin_ft">
			<a id="TijiaoOrder" href="javascript:void(0);"><span>提交订单</span></a>
			<p>应付总额：<strong>￥<?php echo ($tp); ?>元</strong></p>
			
		</div>
	</div>	
</form>

<script type="text/javascript">

//ajax提交订单
$('#TijiaoOrder').click(function(){
	var order_data=$('#order_form').serialize();
	$.ajax({
		type:"post",
		url:"<?php echo U('Order/xiaOrder');?>",
		data:order_data,
		dataType:"json",
		success:function(data){
			if(data.ok==1){
				//alert('订单提交成功');
				$('#tishi').html('!订单提交成功正在跳转');
				$('#tishi').fadeIn(1000);
				$('#tishi').fadeOut(2000);
				setTimeout(function(){
					location.href="<?php echo U('Payment/payIndex');?>";
				},3000);
				
			}else{
				//alert(data.error);
				$('#tishi').html('!'+data.error);
				$('#tishi').fadeIn(1000);
				$('#tishi').fadeOut(3000)
			 
			}
		}
	});
});
</script>
<!-- 主体部分 end -->
	
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