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
			账号：
	   		<input type="text" name="username" size="30" value="<?php echo I('get.username'); ?>" />
		</p>
		<p>
			是否启用 1：启用0：禁用：
	   		<input type="text" name="is_use" size="30" value="<?php echo I('get.is_use'); ?>" />
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1" style="text-align:center">
    	<tr>
            <th >账号</th>
            <th >密码</th>
            <th >是否启用</th>
			<th width="150">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['username']; ?></td>
				<td><?php echo $v['password']; ?></td>
				<td style="cursor:pointer" admin_id="<?php echo ($v["admin_id"]); ?>" class="is_use"><?php echo $v['is_use']==1?'启用':'禁用';?></td>
		        <td align="center">
		        	<a href="<?php echo U('edit?admin_id='.$v['admin_id'].'&p='.I('get.p')); ?>" title="编辑">编辑</a> 
                   <?php if($v['admin_id']>1):?>
                   |
	                <a href="<?php echo U('delete?admin_id='.$v['admin_id'].'&p='.I('get.p')); ?>" onclick="return confirm('确定要删除吗？');" title="移除">移除</a> 
                   <?php endif;?>
		        </td>
	        </tr>
        <?php endforeach; ?> 
		<?php if(preg_match('/\d/', $page)): ?>  
        <tr><td align="center" nowrap="true" colspan="99" height="30"><?php echo $page; ?></td></tr> 
        <?php endif; ?> 
	</table>
</div>
<script type="text/javascript">
// 为启用的td加一个事件
$(".is_use").click(function(){
	// 获取点击的记录的ID
	var id = $(this).attr("admin_id");
	if(id == 1)
	{
		alert("超级管理员不能修改！");
		return false;
	}
	var _this = $(this);
	$.ajax({
		type : "GET",
		url : "<?php echo U('ajaxUpdateIsuse', '', FALSE); ?>/admin_id/"+id,
		success : function(data)
		{
			if(data == 0)
				_this.html("禁用");
			else
				_this.html("启用");
		}
	});
});
</script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>