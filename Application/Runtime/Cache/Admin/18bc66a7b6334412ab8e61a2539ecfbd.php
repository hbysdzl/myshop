<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理中心 - 商品列表 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Application/Admin/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Application/Admin/Public/Styles/main.css" rel="stylesheet" type="text/css" />
<!-- 时间插件 -->
<link href="/Public/datepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="/Public/datepicker/jquery-1.7.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/datepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/datepicker/datepicker_zh-cn.js"></script>
<!-- 插件结束 -->
<!-- 在线编辑器 -->
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<h1>
	<?php if($_btnName == ' '):?>
		<span class="action-span" style="display: none;"><a href="<?php echo ($_bitlink); ?>"><?php echo ($_btnName); ?></a></span>
	<?php else:?>
		<span class="action-span"><a href="<?php echo ($_bitlink); ?>"><?php echo ($_btnName); ?></a></span>
	<?php endif?>
    
    <span class="action-span1"><a href="<?php echo U('Index/index');?>">管理中心</a></span>
    <span id="search_id" class="action-span1"> -<?php echo ($_title); ?></span>
    <div style="clear:both"></div>
</h1>

<!-- 页面中的内容 -->

<div class="list-div" id="listDiv">
    <table cellpadding="3" cellspacing="1">
        <tr>
            <th width="3%">订单号</th>
            <th width="8%">下单时间</th>
            <th width="8%">会员</th>
            <th width="12%">支付宝交易号</th>
            <th width="5%">订单金额</th>
            <th width="8%">订单状态</th>
            <th width="5%">收货人</th>
            <th>收货地址</th>
            <th>操作</th>
        </tr>
        
        <?php foreach($info as $k=>$v):?>
        <tr>
            <td align="center"><?php echo ($v["id"]); ?></td>
            <td align="center"><?php echo date('Y-m-d H:i:s',$v['addtime'])?></td>
            <td><?php echo ($v["email"]); ?></td>
            <td><?php echo ($v["alipaid"]); ?></td>
            
            <td align="center">￥<?php echo ($v["goods_price"]); ?></td>
            <td align="center">
            	<?php if($v['pay_status']==0):?>
            		待支付
            	<?php elseif($v['pay_status']==1 && $v['post_status']==0):?>
            		已支付，待发货
            	<?php elseif($v['post_status']==1):?>
            		待收货
            	<?php else:?>
            		已确认收货
            	<?php endif;?>
            </td>
            <td align="center"><?php echo ($v["shr_name"]); ?></td>
            <td align="center"><?php echo ($v["shr_province"]); ?>,<?php echo ($v["shr_city"]); ?>,<?php echo ($v["shr_area"]); ?></td>
            <td align="center">
            <?php if($v['pay_status']==1):?>
            <a href="<?php echo U('delive','orderid='.$v['id']);?>">发货</a>
            <?php endif?>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>