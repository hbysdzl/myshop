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
    <span class="action-span"><a href="<?php echo ($_bitlink); ?>"><?php echo ($_btnName); ?></a></span>
    <span class="action-span1"><a href="__GROUP__">管理中心</a></span>
    <span id="search_id" class="action-span1"> -<?php echo ($_title); ?>  </span>
    <div style="clear:both"></div>
</h1>

<!-- 页面中的内容 -->

<!-- 搜索 -->
<div class="form-div search_form_div">
    <form method="GET" name="search_form">
		<p>
			商品名称：
	   		<input type="text" name="goods_name" size="25" value="<?php echo I('get.goods_name'); ?>"/>
			主分类名称：
	   		<input type="text" name="cat_id" size="15" value="<?php echo I('get.cat_id'); ?>"/>
			品牌名称：
	   		<input type="text" name="brand_id" size="15" value="<?php echo I('get.brand_id'); ?>"/>
			本店价：
	   		从 <input id="shop_pricefrom" type="text" name="shop_pricefrom" size="15" value="<?php echo I('get.shop_pricefrom'); ?>" />
		    到 <input id="shop_priceto" type="text" name="shop_priceto" size="15" value="<?php echo I('get.shop_priceto'); ?>" />
		</p>
		<p>
			是否热卖：
			<input type="radio" value="-1" name="is_hot" <?php if(I('get.is_hot', -1) == -1) echo 'checked="checked"'; ?> /> 全部
			<input type="radio" value="1" name="is_hot" <?php if(I('get.is_hot', -1) == '1') echo 'checked="checked"'; ?> /> 是
			<input type="radio" value="0" name="is_hot" <?php if(I('get.is_hot', -1) == '0') echo 'checked="checked"'; ?> /> 否


			是否新品：
			<input type="radio" value="-1" name="is_new" <?php if(I('get.is_new', -1) == -1) echo 'checked="checked"'; ?> /> 全部
			<input type="radio" value="1" name="is_new" <?php if(I('get.is_new', -1) == '1') echo 'checked="checked"'; ?> /> 是
			<input type="radio" value="0" name="is_new" <?php if(I('get.is_new', -1) == '0') echo 'checked="checked"'; ?> /> 否
			是否精品：
			<input type="radio" value="-1" name="is_best" <?php if(I('get.is_best', -1) == -1) echo 'checked="checked"'; ?> /> 全部
			<input type="radio" value="1" name="is_best" <?php if(I('get.is_best', -1) == '1') echo 'checked="checked"'; ?> /> 是
			<input type="radio" value="0" name="is_best" <?php if(I('get.is_best', -1) == '0') echo 'checked="checked"'; ?> /> 否
			是否上架：
			<input type="radio" value="-1" name="is_on_sale" <?php if(I('get.is_on_sale', -1) == -1) echo 'checked="checked"'; ?> /> 全部
			<input type="radio" value="1" name="is_on_sale" <?php if(I('get.is_on_sale', -1) == '1') echo 'checked="checked"'; ?> /> 上架
			<input type="radio" value="0" name="is_on_sale" <?php if(I('get.is_on_sale', -1) == '0') echo 'checked="checked"'; ?> /> 下架
		</p>
		<p>
			商品类型：
	   		<input type="text" name="type_id" size="15" value="<?php echo I('get.type_id'); ?>" />
			添加时间：
	   		从 <input id="addtimefrom" type="text" name="addtimefrom" size="15" value="<?php echo I('get.addtimefrom'); ?>" />
		    到 <input id="addtimeto" type="text" name="addtimeto" size="15" value="<?php echo I('get.addtimeto'); ?>" />
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >商品名称</th>
            <th >本店价</th>
            <th >赠送积分</th>
            <th >赠送经验值</th>
            <th >兑换积分数</th>
            <th >是否促销</th>
            <th >促销价</th>
            <th >logo原图</th>
            <th >是否热卖</th>
            <th >是否新品</th>
            <th >是否精品</th>
            <th >是否上架</th>
            
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>
			<tr class="tron">
				<td><?php echo $v['goods_name']; ?></td>
				<td><?php echo $v['shop_price']; ?></td>
				<td><?php echo $v['jifen']; ?></td>
				<td><?php echo $v['jyz']; ?></td>
				<td><?php echo $v['jifen_price']; ?></td>
				<td><?php echo $v['is_promote']; ?></td>
				<td><?php echo $v['promote_price']; ?></td>
				<td><?php ShowImage($v['sm_logo'],50); ?></td>
				<td><?php echo $v['is_hot']; ?></td>
				<td><?php echo $v['is_new']; ?></td>
				<td><?php echo $v['is_best']; ?></td>
				<td><?php echo $v['is_on_sale']; ?></td>
			
		        <td align="center">
		        	<a href="<?php echo U('yuan?goods_id='.$v['goods_id'].'&p='.I('get.p')); ?>" onclick="return confirm('确定要还原吗？');" title="还原">还原</a> |
	                <a href="<?php echo U('delete?goods_id='.$v['goods_id'].'&p='.I('get.p')); ?>" onclick="return confirm('确定要删除吗？');" title="回收站">删除</a>
		        </td>
	        </tr>
        <?php endforeach; ?>
		<?php if(preg_match('/\d/', $page)): ?>
        <tr><td align="right" nowrap="true" colspan="99" height="30"><?php echo $page; ?></td></tr>
        <?php endif; ?>
	</table>
</div>
<script>
$('#addtimefrom').datepicker(); $('#addtimeto').datepicker(); </script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>