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

<div class="main-div">
    <form name="main_form" method="POST" action="/index.php/Admin/Goodscategory/edit/cat_id/31/p/1.html" enctype="multipart/form-data" >
    	<input type="hidden" name="cat_id" value="<?php echo $data['cat_id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
			<tr>
				<td class="label">上级权限：</td>
				<td>
					<select name="parent_id">
						<option value="0">顶级权限</option>
						<?php foreach ($parentData as $k => $v): ?> 
						<?php if($v['cat_id'] == $data['cat_id'] || in_array($v['cat_id'], $children)) continue ; ?> 
						<option <?php if($v['cat_id'] == $data['parent_id']): ?>selected="selected"<?php endif; ?> value="<?php echo $v['cat_id']; ?>"><?php echo str_repeat('-', 8*$v['level']).$v['cat_name']; ?></option>
						<?php endforeach; ?>					</select>
				</td>
			</tr>
            <tr>
                <td class="label">分类名称：</td>
                <td>
                    <input  type="text" name="cat_name" value="<?php echo $data['cat_name']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">筛选属性：</td>                
		       <td>
		       <ul>
		       		<?php if(isset($attrData)):?>
				       	<?php if(is_array($attrData)): $i = 0; $__LIST__ = $attrData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($key==0){ $gg='[+]'; }else{ $gg='[-]'; } ?>
				       		<li>
				       			   <a href="javascript:void(0)" onclick="newadd(this)"><?php echo ($gg); ?></a>
				                   <select name="type_id[]">
				                    <option value=''>--请选择类型--</option>
				                    <?php if(is_array($goodstype)): $i = 0; $__LIST__ = $goodstype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['type_id']==$vo1['type_id']):?>
				                    	<option value='<?php echo ($vo["type_id"]); ?>' selected='selected'><?php echo ($vo["type_name"]); ?></option>
				                    	<?php else:?>
				                    	<option value='<?php echo ($vo["type_id"]); ?>'><?php echo ($vo["type_name"]); ?></option>
				                    	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
				                    </select>
				                   <select name="search_attr_id[]" attr_id="<?php echo ($vo1["attr_id"]); ?>">
				                   		<option value=''>--请选择属性--</option>
				                   </select> 
				             </li><?php endforeach; endif; else: echo "" ;endif; ?>
				      <?php else:?>
				      	 <li>
                			<a href="javascript:void(0);" onclick="newadd(this)">[+]</a>
		                    <select name="type_id[]">
		                    	<option value="">--请选择类型--</option>
		                    	<?php if(is_array($goodstype)): $i = 0; $__LIST__ = $goodstype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type_id"]); ?>"><?php echo ($vo["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		                    </select>&nbsp&nbsp&nbsp
		                    <select name="search_attr_id[]">
		                    	<option value="">--请选择属性--</option>
		                    </select>
		                 </li>
				     <?php endif;?>
		        </ul>
		       </td>
            </tr>
            <tr>
                <td colspan="99" align="center">
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>
</div>
<script>
//ajax实现二级联动
$("select[name='type_id[]']").change(function(){
	//获取类型ID
	var sel=$(this);
	var type_id=sel.val();
	var opt="<option value=''>--请选择属性--</option>";
	if(type_id!=''){
		$.ajax({
			type:"get",
			url:"<?php echo U('Goods/ajaxGetAttr','',false);?>/type_id/"+type_id,
			dataType:"json",
			success:function(data){
				//获取原有的属性id
				var old_attr_id=sel.next('select').attr('attr_id');
				//将获取的数据放入到对应的下拉框中
				$(data).each(function(k,v){
					if(v.attr_id==old_attr_id){
						var ga='selected="selected"';
					}else{
						var ga='';
					}
					opt+="<option value='"+v.attr_id+"' "+ga+">"+v.attr_name+"</option>";
				});
				
				sel.next('select').html(opt);//取得一个包含匹配的元素集合中每一个元素紧邻的后面同辈元素的元素集合。
			}
		});
	}else{
		sel.next('select').html(opt);
	}
});

//实现点击克隆多个属性函数
function newadd(a){
	var li=$(a).parent();
	if(li.find('a').html()=='[+]'){
		//克隆一行
		var newli=li.clone(true);
		newli.find('a').html('[-]');
		//追加节点
		li.after(newli);
	}else{
		li.remove();
	}
}

//进入页面自动触发类型的change事件，获取属性
$("select[name='type_id[]']").trigger('change');
</script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>