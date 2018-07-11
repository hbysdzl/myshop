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

<!-- 列表 -->
<div class="list-div" id="listDiv">
<form action="/index.php/Admin/Goods/goodsNumber/goods_id/75.html" method="POST">
	<table cellpadding="3" cellspacing="1">
      <tr>
      	<?php foreach($attr as $k=>$v):?>
      	<td><?php echo $v[0]['attr_name']?></td>
      	<?php endforeach;?>
      	<td>库存量</td>
      	<td>操作</td>
      </tr>
    <?php if($number):?>
      <?php foreach($number as $k0=>$v0): if($k0==0){ $opt='+'; }else{ $opt='-'; } ?>
	   	<tr>
	   		<input type="hidden" name="id" value="<?php echo ($v0["id"]); ?>" id="goods_number_id">
	  		 <?php foreach($attr as $k1=>$v1):?>
	   		<td>
	   		<select name="goods_attr_id[]" >
	   			<option value=>--请选择--</option>
	   			<?php foreach($v1 as $k2=>$v2): if(strpos(','.$v0['goods_attr_id'].',' , ','.$v2['id'].',' )!==false){ $select='selected="selected"'; }else{ $select=''; } ?>		
	   			<option value="<?php echo $v2['id']?>" <?php echo ($select); ?>><?php echo $v2['attr_value']?></option>
	   			<?php endforeach;?>
	   		</select>
	   		</td>
	   		<?php endforeach;?>
	   		<td><input type="text" name="goods_number[]" value="<?php echo $v0['goods_number']?>"></td>
      		<td><input type="button" value="<?php echo ($opt); ?>" onclick="addnew(this);"></td>
	  	 </tr>
	   <?php endforeach;?>
	   <?php else:?>
	   
	   <tr>
	  		<?php foreach($attr as $k1=>$v1):?>
	   		<td>
	   		<select name="goods_attr_id[]" >
	   			<option value=>--请选择--</option>
	   			<?php foreach($v1 as $k2=>$v2): if(strpos(','.$v0['goods_attr_id'].',' , ','.$v2['id'].',' )!==false){ $select='selected="selected"'; }else{ $select=''; } ?>		
	   			<option value="<?php echo $v2['id']?>" <?php echo ($select); ?>><?php echo $v2['attr_value']?></option>
	   			<?php endforeach;?>
	   		</select>
	   		</td>
	   		<?php endforeach;?>
	   		<td><input type="text" name="goods_number[]" value="<?php echo $v0['goods_number']?>"></td>
      		<td><input type="button" value="+" onclick="addnew(this);"></td>
	  	 </tr>
	   
	  <?php endif;?>
	  
	   <tr id="btn"><td colspan="<?php echo count($attr)+2; ?>" align="center"><input type="submit" value="保存"></td></tr>	
	</table>
</form>
</div>
<script type="text/javascript">
function addnew(btn){
	// 先获取点击的按钮所在的tr
	var tr = $(btn).parent().parent();
	if($(btn).val() == "+")
	{
		// 克隆tr
		var newtr = tr.clone();
		// 把+变-
		newtr.find(":button").val("-");
		newtr.find('#goods_number_id').val('');
		// 把到btn所在的TR前面
		$("#btn").before(newtr);
	}
	else
		tr.remove();
}
</script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>