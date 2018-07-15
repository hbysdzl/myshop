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
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>订单页面</title>
	<link rel="stylesheet" href="/Public/Home/style/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/header.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/home.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/order.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/footer.css" type="text/css">

	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/header.js"></script>
	<script type="text/javascript" src="/Public/Home/js/home.js"></script>
</head>
<body>
		<!-- 顶部导航 start -->
	<?php
$catModel = D('Goodscategory'); $catData = $catModel->getNavCatData(); ?>
<!-- 头部 start -->
	<div class="header w1210 bc mt15">
		<!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
		<div class="logo w1210">
			<h1 class="fl"><a href="index.html"><img src="/Public/Home/images/logo.png" alt="京西商城"></a></h1>
			<!-- 头部搜索 start -->
			<div class="search fl">
				<div class="search_form">
					<div class="form_left fl"></div>
					<form action="" name="serarch" method="get" class="fl">
						<input type="text" class="txt" value="请输入商品关键字" /><input type="submit" class="btn" value="搜索" />
					</form>
					<div class="form_right fl"></div>
				</div>
				
				<div style="clear:both;"></div>

				<div class="hot_search">
					<strong>热门搜索:</strong>
					<a href="">D-Link无线路由</a>
					<a href="">休闲男鞋</a>
					<a href="">TCL空调</a>
					<a href="">耐克篮球鞋</a>
				</div>
			</div>
			<!-- 头部搜索 end -->

			<!-- 用户中心 start-->
			<div class="user fl">
				<dl>
					<dt>
						<em></em>
						<a href="">用户中心</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							您好，请<a href="">登录</a>
						</div>
						<div class="uclist mt10">
							<ul class="list1 fl">
								<li><a href="">用户信息></a></li>
								<li><a href="">我的订单></a></li>
								<li><a href="">收货地址></a></li>
								<li><a href="">我的收藏></a></li>
							</ul>

							<ul class="fl">
								<li><a href="">我的留言></a></li>
								<li><a href="">我的红包></a></li>
								<li><a href="">我的评论></a></li>
								<li><a href="">资金管理></a></li>
							</ul>

						</div>
						<div style="clear:both;"></div>
						<div class="viewlist mt10">
							<h3>最近浏览的商品：</h3>
							<ul id="go">
							</ul>
						</div>
					</dd>
				</dl>
			</div>
			<!-- 用户中心 end-->

			<!-- 购物车 start -->
			<div class="cart fl">
				<dl>
					<dt>
						<a href="<?php echo U('Cart/CartList');?>">去购物车结算</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							购物车中还没有商品，赶紧选购吧！
						</div>
					</dd>
				</dl>
			</div>
			<!-- 购物车 end -->
		</div>
		<!-- 头部上半部分 end -->
		
		<div style="clear:both;"></div>

		<!-- 导航条部分 start -->
		<div class="nav w1210 bc mt10">
			<!--  商品分类部分 start-->
			<div class="category fl <?php if($show_nav!=1) echo 'cat1'; ?>"> <!-- 非首页，需要添加cat1类 -->
				<div class="cat_hd <?php if($show_nav!=1) echo 'off'; ?>">  <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
					<h2>全部商品分类</h2>
					<em></em>
				</div>
				
				<div class="cat_bd <?php if($show_nav!=1) echo 'none'; ?>">
				<!-- 循环顶级分类 -->
					<?php foreach ($catData as $k => $v): ?>
					<div class="cat <?php if($k==0) echo 'item1'; ?>">
						<h3><a href="<?php echo U('Search/Search' ,'', false);?>/cat_id/<?php echo ($v["cat_id"]); ?>" target="_blank"><?php echo ($v["cat_name"]); ?></a> <b></b></h3>
						<div class="cat_detail">
							<!-- 循环二级分类 -->
							<?php foreach ($v['children'] as $k1 => $v1): ?>
							<dl <?php if($k1==0) echo 'class="dl_1st"'; ?>>
								<dt><a href="<?php echo U('Search/Search' ,'', false);?>/cat_id/<?php echo ($v1["cat_id"]); ?>" target="_blank"><?php echo ($v1["cat_name"]); ?></a></dt>
								<dd>
									<!-- 循环三级分类 -->
									<?php foreach ($v1['children'] as $k2 => $v2): ?>
									<a href="<?php echo U('Search/Search' ,'', false);?>/cat_id/<?php echo ($v2["cat_id"]); ?>"><?php echo ($v2["cat_name"]); ?></a>
									<?php endforeach; ?>			
								</dd>
							</dl>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!--  商品分类部分 end--> 

			<div class="navitems fl">
				<ul class="fl">
					<li class="current"><a href="<?php echo U('Index/index');?>">首页</a></li>
					<li><a href="">电脑频道</a></li>
					<li><a href="">家用电器</a></li>
					<li><a href="">品牌大全</a></li>
					<li><a href="">团购</a></li>
					<li><a href="">积分商城</a></li>
					<li><a href="<?php echo U('Center/orderLst');?>">会员中心</a></li>
				</ul>
				<div class="right_corner fl"></div>
			</div>
		</div>
		<!-- 导航条部分 end -->
	</div>
	<!-- 头部 end-->
	
	<div style="clear:both;"></div>
<script type="text/javascript">

//Ajax获取最近浏览的商品
var img_url="<?php echo C('IMG_URL')?>";
$.ajax({
	type: "get",
	url: "<?php echo U('Goods/ajaxgetRecentlygoods');?>",
	dataType: "json",
	success: function(data){
		
		//把商品信息显示到页面
		var str='';
		var str_a='';
		$(data).each(function(k,v){
			str+='<li><a href="<?php echo U('Goods/goods/','',false);?>/goods_id/'+v.goods_id+'"><img src="'+img_url+v.sm_logo+'" alt="" /></a></li>';
			str_a+='<dl><dt><a href="<?php echo U('Goods/goods/','',false);?>/goods_id/'+v.goods_id+'"><img src="'+img_url+v.sm_logo+'" alt="" /></a></dt><dd><a href="">'+v.goods_name+'</a></dd></dl>';
		});
		$('#go').html(str);
		$('#liuluan').html(str_a);
	}
});
</script>
	
	<div style="clear:both;"></div>

	<!-- 页面主体 start -->
	<div class="main w1210 bc mt10">
		<div class="crumb w1210">
			<h2><strong><?php echo session('email');?> </strong><span>> 我的订单</span></h2>
		</div>
		
		<!-- 左侧导航菜单 start -->
		<div class="menu fl">
			<h3><?php echo session('email');?></h3>
			<div class="menu_wrap">
				<dl>
					<dt>订单中心 <b></b></dt>
					<dd class="cur"><b>.</b><a href="">我的订单</a></dd>
					<dd><b>.</b><a href="">我的关注</a></dd>
					<dd><b>.</b><a href="">浏览历史</a></dd>
					<dd><b>.</b><a href="">我的团购</a></dd>
				</dl>

				<dl>
					<dt>账户中心 <b></b></dt>
					<dd><b>.</b><a href="">账户信息</a></dd>
					<dd><b>.</b><a href="">账户余额</a></dd>
					<dd><b>.</b><a href="">消费记录</a></dd>
					<dd><b>.</b><a href="">我的积分</a></dd>
					<dd><b>.</b><a href="">收货地址</a></dd>
				</dl>

				<dl>
					<dt>订单中心 <b></b></dt>
					<dd><b>.</b><a href="">返修/退换货</a></dd>
					<dd><b>.</b><a href="">取消订单记录</a></dd>
					<dd><b>.</b><a href="">我的投诉</a></dd>
				</dl>
			</div>
		</div>
		<!-- 左侧导航菜单 end -->

		<!-- 右侧内容区域 start -->
		<div class="content fl ml10">
			<div class="order_hd">
				<h3>我的订单</h3>
				<dl>
					<dt>便利提醒：</dt>
					<dd>待付款（<?php echo ($daiFuKuan); ?>）</dd>
					<dd>待确认收货（0）</dd>
					<dd>待自提（0）</dd>
				</dl>

				<dl>
					<dt>特色服务：</dt>
					<dd><a href="">我的预约</a></dd>
					<dd><a href="">夺宝箱</a></dd>
				</dl>
			</div>

			<div class="order_bd mt10">
				<table class="orders">
					<thead>
						<tr>
							<th width="10%">订单号</th>
							<th width="10%">收货人</th>
							<th width="20%">订单金额</th>
							<th width="20%">下单时间</th>
							<th width="10%">订单状态</th>
							<th width="10%">操作</th>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><a href=""><?php echo ($vo["id"]); ?></a></td>
							<td><?php echo ($vo["shr_name"]); ?></td>
							<td>￥<?php echo ($vo["total_price"]); ?></td>
							<td><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
							<td>
								<?php if($vo['pay_status']==0):?>
									待支付
								<?php elseif($vo['pay_status']==1 && $vo['post_status']==0):?>
									已支付，待发货
								<?php elseif($vo['post_status']==1):?>
									待收货
								<?php else:?>
									已完成
								<?php endif;?>
							</td>
							<td>
								<?php if($vo['pay_status']==0):?>
								<a href="<?php echo U('Payment/payIndex','order='.$vo['id']);?>">继续支付</a>
								<?php elseif($vo['pay_status']==1 && $vo['post_status']==1):?>
								<a href="<?php echo U('express','orderid='.$vo['id']);?>">查看物流</a></td>
								<?php else:?>
									我要催单
								<?php endif;?>
							</td>	
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody> 
				</table>
			</div>
		</div>
		<!-- 右侧内容区域 end -->
	</div>
	<!-- 页面主体 end-->

	<div style="clear:both;"></div>

	<!-- 底部导航 start -->
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
</body>
</html>
	
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