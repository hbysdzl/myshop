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
    <form name="main_form" method="POST" action="/index.php/Admin/Goodscategory/add.html" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
			<tr>
				<td class="label">请选择上级分类：</td>
				<td>
					<select name="parent_id">
						<option value="0">顶级分类</option>
						<?php foreach ($parentData as $k => $v): ?>
							<option value="<?php echo $v['cat_id']; ?>"><?php echo str_repeat('-', 8*$v['level']).$v['cat_name']; ?></option>
						<?php endforeach; ?>					
					</select>
				</td>
			</tr>
            <tr>
                <td class="label">分类名称：</td>
                <td>
                    <input  type="text" name="cat_name" value="" />
                </td>
            </tr>
             <tr>
                <td class="label">分类筛选属性：</td> 	
                <td>
                	<ul>
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
	$("select[name='type_id[]']").change(function(){
		var sel=$(this);
		//获取选择类型的id
		var type_id=sel.val();
		
		//ajax获取对应属性字符串
		var opt="<option value=''>--请选择属性--</option>";
		if(type_id!=''){
			$.ajax({
				type:"get",
				url:"<?php echo U('Goods/ajaxGetAttr','',false);?>/type_id/"+type_id,
				dataType:"json",
				success:function(data){
					//将获取的属性数据写入下拉框中
					
					
					$(data).each(function(k,v){
						opt+="<option value='"+v.attr_id+"'>"+v.attr_name+"</option>";
					});
					sel.next('select').html(opt); ////next取得一个包含匹配的元素集合中每一个元素紧邻的后面同辈元素的元素集合。
				}
			});
		}else{
			sel.next('select').html(opt);
		}
	});
	
	//点击克隆筛选属性
	function newadd(a){
		var li=$(a).parent();
		if(li.find('a').html()=='[+]'){
			var newli=li.clone(true);//设置为true以便复制元素的所有事件处理
			newli.find('a').html('[-]');
			li.after(newli);

		}else{
			li.remove();
		}
	}
</script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>