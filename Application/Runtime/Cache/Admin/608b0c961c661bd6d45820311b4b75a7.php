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

<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front">基本信息</span>
            <span class="tab-back">商品描述</span>
            <span class="tab-back">会员价格</span>
            <span class="tab-back">商品属性</span>
            <span class="tab-back">商品相册</span>
        </p>
    </div>
    <div id="tabbody-div">
	    <form name="main_form" method="POST" action="/index.php/Admin/Goods/edit/goods_id/73/p/1.html" enctype="multipart/form-data">
	        <!-- 基本信息 -->
	    	<table class="table_content" cellspacing="1" cellpadding="3" width="100%">
	    	<input type="hidden" name="goods_id" value="<?php echo ($editgoods["goods_id"]); ?>" />
	    	<input type="hidden" name="oldtype_id" value="<?php echo ($editgoods["type_id"]); ?>" />
	            <tr>
	                <td class="label">商品名称：</td>
	                <td>
	                    <input size="25" type="text" name="goods_name" value="<?php echo ($editgoods["goods_name"]); ?>" />
	                    <span class="required">*</span>
	                </td>
	            </tr>
	            <tr>
	                <td class="label">商品主分类：</td>
	                <td>
	                    <select name="cat_id">
			    			<option value="0">-选择主分类-</option>
							<?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($editgoods['cat_id'] == $vo['cat_id']): ?><option value="<?php echo ($vo["cat_id"]); ?>" selected="selected"><?php echo str_repeat('-',$vo['level']*3)?> <?php echo ($vo["cat_name"]); ?></option>
                               <?php else: ?>
                               <option value="<?php echo ($vo["cat_id"]); ?>"><?php echo str_repeat('-',$vo['level']*3)?> <?php echo ($vo["cat_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			    		</select>
			    		<span class="required">*</span>
	                </td>
	            </tr>
	            <tr>
	                <td class="label">扩展分类：</td>
	                <td>
	                	<input onclick="$(this).parent().append($(this).next('select').clone());" type="button" value="添加" />
                        <?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><select name="ext_cat_id[]">
			    				<option value="">-选择扩展分类-</option>
								<?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo1['cat_id'] == $vo['cat_id']): ?><option value="<?php echo ($vo["cat_id"]); ?>" selected="selected"><?php echo str_repeat('-',$vo['level']*4); echo ($vo["cat_name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($vo["cat_id"]); ?>"><?php echo str_repeat('-',$vo['level']*4); echo ($vo["cat_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			    		</select><?php endforeach; endif; else: echo "" ;endif; ?>
	                </td>
	            </tr>
	            <tr>
	                <td class="label">品牌：</td>
	                <td>
	                    <select name="brand_id">
			    			<option value="">--选择品牌--</option>
								<?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['brand_id']==$editgoods['brand_id']):?>
			    				<option value="<?php echo ($vo["brand_id"]); ?>" selected="selected"><?php echo ($vo["brand_name"]); ?></option>
			    				<?php else:?>
			    				<option value="<?php echo ($vo["brand_id"]); ?>"><?php echo ($vo["brand_name"]); ?></option>
			    				<?php endif; endforeach; endif; else: echo "" ;endif; ?>

			    		</select>
	                </td>
	            </tr>
	            <tr>
	                <td class="label">市场价：</td>
	                <td>
	                    ￥ <input  type="text" size="10" name="market_price" value="<?php echo ($editgoods["market_price"]); ?>" /> 元
	                </td>
	            </tr>
	            <tr>
	                <td class="label">本店价：</td>
	                <td>
	                    ￥ <input  type="text" size="10" name="shop_price" value="<?php echo ($editgoods["shop_price"]); ?>" /> 元
	                </td>
	            </tr>
	            <tr>
	                <td class="label">赠送积分：</td>
	                <td>
	                    <input  type="text" name="jifen" value="<?php echo ($editgoods["jifen"]); ?>" />
	                    如果不填和商品价格相同
	                </td>
	            </tr>
	            <tr>
	                <td class="label">赠送经验值：</td>
	                <td>
	                    <input  type="text" name="jyz" value="<?php echo ($editgoods["jyz"]); ?>" />
	                    如果不填和商品价格相同
	                </td>
	            </tr>
	            <tr>
	                <td class="label">兑换积分数：</td>
	                <td>
	                    <input  type="text" name="jifen_price" value="<?php echo ($editgoods["jifen_price"]); ?>" />
	                    如果不填代表不能使用积分兑换
	                </td>
	            </tr>
	            <tr>
	                <td class="label"><input value="1" name="is_promote" <?php echo $editgoods['is_promote']==1?"checked='checked'":''?> onclick="if($(this).attr('checked')) $('.promote_price').removeAttr('disabled');else $('.promote_price').attr('disabled', 'disabled');" type="checkbox" />促销价：</td>
	                <td>
	                    <input class="promote_price" disabled="disabled" type="text" name="promote_price" value="<?php echo ($editgoods["promote_price"]); ?>" />
	                </td>
	            </tr>
	            <tr>
	                <td class="label">促销开始时间：</td>
	                <td>
	                    <input class="promote_price" disabled="disabled" id="promote_start_time" type="text" name="promote_start_time" value="<?php echo date('Y-m-d',$editgoods['promote_start_time'])?>" />
	                </td>
	            </tr>
	            <tr>
	                <td class="label">促销结束时间：</td>
	                <td>
	                    <input class="promote_price" disabled="disabled" id="promote_end_time" type="text" name="promote_end_time" value="<?php echo date('Y-m-d',$editgoods['promote_end_time'])?>"/>
	                </td>
	            </tr>
	            <tr>
	                <td class="label">logo原图：</td>
                    <td width="100">
                    <?php echo ShowImage($editgoods['logo'],100)?><input type="file" name="logo" />
                    </td>
	   
	            </tr>
	            <tr>
	                <td class="label">是否热卖:</td>
                    <td>
	                	<input type="radio" name="is_hot" value="1" <?php echo $editgoods['is_hot']==1?"checked='checked'":''?> />是
	                	<input type="radio" name="is_hot" value="0" <?php echo $editgoods['is_hot']==0?"checked='checked'":''?> />否
	                </td>
	            </tr>
	            <tr>
	                <td class="label">是否新品：</td>
	                <td>
	                	<input type="radio" name="is_new" value="1" <?php echo $editgoods['is_new']==1?"checked='checked'":''?> />是
	                	<input type="radio" name="is_new" value="0" <?php echo $editgoods['is_new']==0?"checked='checked'":''?> />否
	                </td>
	            </tr>
	            <tr>
	                <td class="label">是否精品：</td>
	                <td>
	                	<input type="radio" name="is_best" value="1" <?php echo $editgoods['is_best']==1?"checked='checked'":''?> />是
	                	<input type="radio" name="is_best" value="0" <?php echo $editgoods['is_best']==0?"checked='checked'":''?> />否
	                </td>
	            </tr>
	            <tr>
	                <td class="label">是否上架：</td>
	                <td>
	                	<input type="radio" name="is_on_sale" value="1" <?php echo $editgoods['is_on_sale']==1?"checked='checked'":''?> />上架
	                	<input type="radio" name="is_on_sale" value="0" <?php echo $editgoods['is_on_sale']==0?"checked='checked'":''?> />下架
	                </td>
	            </tr>
	            <tr>
	                <td class="label">seo优化_关键字：</td>
	                <td>
	                    <input size="40" type="text" name="seo_keyword" value="<?php echo ($editgoods["seo_keyword"]); ?>" />
	                </td>
	            </tr>
	            <tr>
	                <td class="label">seo优化_描述：</td>
	                <td>
	                    <input size="40" type="text" name="seo_description" value="<?php echo ($editgoods["seo_description"]); ?>" />
	                </td>
	            </tr>
	            <tr>
	                <td class="label">排序数字：</td>
	                <td>
	                    <input size="5" type="text" name="sort_num" value="<?php echo ($editgoods["sort_num"]); ?>" />
	                </td>
	            </tr>
	        </table>
	        <!-- 描述 -->
	    	<table class="table_content" cellspacing="1" cellpadding="3" width="100%" style="display:none;">
	            <tr>
	            	<td>
	                	<textarea id="goods_desc" name="goods_desc"><?php echo ($editgoods["goods_desc"]); ?></textarea>
	                </td>
	            </tr>
	    	</table>
	    	<!-- 会员价格 -->
	    	<table class="table_content" style="text-align:center" cellspacing="1" cellpadding="3" width="100%" style="display:none;">
	    		<tr>
	    		<td style="font-size:18px;font-weight:bold;">
	    		会员价格（如果没有填会员价格就按折扣率计算价格，如果填了就按填的价格算，不再打折）
	    		</td>
	    		</tr>
                 <?php if(is_array($level)): $i = 0; $__LIST__ = $level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
	    			<td><?php echo ($v["level_name"]); ?>（<?php echo $v['rate']/10?> 折） ：￥<input type="text" size="10" name="ml[<?php echo ($v["level_id"]); ?>]" value="<?php echo ($v["price"]); ?>" /> 元</td>
	    		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	    	</table>
	    	<!-- 属性 -->
	    	<table style="text-align:center"class="table_content" cellspacing="1" cellpadding="3" width="100%" style="display:none;">
	    		<tr><td>
	    		商品类型：<select name="type_id">
	    				<option value="0">--选择类型--</option>
						<?php foreach($type as $vo):?>
							<?php if($vo['type_id']==$editgoods['type_id']):?>
	    						<option value="<?php echo $vo['type_id']?>" selected="selected"><?php echo $vo['type_name']?></option>
	    					<?php else:?>
	    						<option value="<?php echo $vo['type_id']?>"><?php echo $vo['type_name']?></option>
	    					<?php endif;?>
						<?php endforeach;?>
	    				</select>
	    		</td></tr>
	    		<tr><td id="attr_container">
	    			<!-- 所有出现过的属性ID存放数组 -->
	    			<?php $attrID=array();?>
	    			<?php if(is_array($attr)): $i = 0; $__LIST__ = $attr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><p style="text-align:left;margin-left:762px;">
	    			<?php echo ($v1["attr_name"]); ?>:
	    			<?php if($v1['attr_type']==1): if(in_array($v1['attr_id'],$attrID)){ $otp="[-]"; }else{ $otp="[+]"; $attrID[]=$v1['attr_id']; } ?>
	    				<a gaid=<?php echo ($v1["id"]); ?> href="javascript:void(0)" onclick="addnew(this)"><?php echo ($otp); ?></a>
	    			<?php endif;?>
	    			<?php
 if(empty($v1['attr_value'])){ $old=''; }else{ $old='old_'; } if($v1['attr_option_values']){ $arr=explode(',',$v1['attr_option_values']); echo "<select  name=".$old."ga[".$v1['attr_id']."][".$v1['id']."] ><option value=''>--请选择--</option>"; foreach($arr as $k=>$v2){ if($v2==$v1['attr_value']){ echo "<option selected=\"selected\" value='".$v2."'>".$v2."</option>"; }else{ echo "<option value='".$v2."'>".$v2."</option>"; } } echo "</select>"; }else{ echo "<input type='text' name=".$old."ga[".$v1['attr_id']."][".$v1['id']."] value=".$v1['attr_value'].">"; } if($v1['attr_type']==1){ $val="0.00"; $price=isset($v1['attr_price'])?$v1['attr_price']:$val; echo "属性价格：￥<input type='text' value=".$price." name=".$old."pir[".$v1['attr_id']."][".$v1['id']."] size='8'>"; } ?>
	    			</p><?php endforeach; endif; else: echo "" ;endif; ?>
	    		</td></tr>
	    	</table>
	    	<!-- 相册 -->
	    	<table class="table_content" cellspacing="1" cellpadding="3" width="100%" style="display:none;">
	    		<tr><td>
	    			<input onclick="$(this).parent().parent().parent().append('<tr><td><input type=\'file\' name=\'pics[]\' /></td></tr>');" type="button" value="添加一张图片" />
	    			</td></tr>
	    		<tr>
					<td>
					<ul id="pics_ul">
						<?php if(is_array($images)): $i = 0; $__LIST__ = $images;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li style="float:left"><?php showImage($v['sm_pic'])?>
							<input pic_id="<?php echo ($v["pic_id"]); ?>" type='button' value="删除" class="delimg">
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					</td>    		
	
	    		</tr>
	    	</table>
	    	<table cellspacing="1" cellpadding="3" width="100%">
	    		<tr>
	                <td align="center">
	                    <input type="submit" class="button" value=" 确定 " />
	                    <input type="reset" class="button" value=" 重置 " />
	                </td>
	            </tr>
	    	</table>
	    </form>
	</div>
</div>
<script>
// 点击按钮切换table
$("div#tabbar-div p span").click(function(){
	// 获取点击的是第几个按钮
	var i = $(this).index();
	// 显示第i个table
	$(".table_content").eq(i).show();
	// 隐藏其他的table
	$(".table_content").eq(i).siblings(".table_content").hide();
	// 把原来选中的取消选中状态
	$(".tab-front").removeClass("tab-front").addClass("tab-back");
	// 切换点击的按钮的样式为选中状态
	$(this).removeClass("tab-back").addClass("tab-front");
});

// 当选择类型时执行AJAX取出类型的属性
$("select[name=type_id]").change(function(){
	// 获取选中的类型的id
	var type_id = $(this).val();
	if(type_id != "")
	{
		$.ajax({
			type : "GET",
			// 大U生成的地址默认带后缀，如：/index.php/Admin/Goods/ajaxGetAttr.html/type_id/+type_id
			// 第三个参数就是去掉.html后缀否则TP会报错
			url : "<?php echo U('ajaxGetAttr', '', FALSE); ?>/type_id/"+type_id,
			dataType : "json",
			success : function(data)
			{
				var html = "";
				// 循环服务器返回的属性的JSON数据
				$(data).each(function(k,v){
					html += "<p>";
					html += v.attr_name + " : ";
					// 根据属性的类型生成不同的表单元素：
					// 1. 如果属性是可选的那么就有一个+号
					// 2. 如果属性有可选值就是一个下拉框
					// 3. 如果属性是唯一的就生成一个文本框
					if(v.attr_type == 1)
						html += " <a onclick='addnew(this);' href='javascript:void(0);'>[+]</a> ";
					// 判断是否有可选值
					if(v.attr_option_values == "")
						html += "<input type='text' name='ga["+v.attr_id+"][]' />";
					else
					{
						// 先把可选值转化成数组
						var _attr = v.attr_option_values.split(",");
						html += "<select name='ga["+v.attr_id+"][]'>";
						html += "<option value=''>请选择</option>";
						// 循环每个可选值构造option
						for(var i=0; i<_attr.length; i++)
						{
							html += "<option value='"+_attr[i]+"'>"+_attr[i]+"</option>";
						}
						html += "</select>";
					}
					if(v.attr_type == 1)
						html += " 属性价格：￥ <input size='8' name='attr_price["+v.attr_id+"][]' type='text' /> 元";
					html += "</p>";
				});
				$("#attr_container").html(html);
			}
		});
	}
	else
		$("#attr_container").html("");
});

// 点击+号
function addnew(a)
{
	// 选中a标签所在的p标签
	var p = $(a).parent();
	// 先获取A标签中的内容
	if($(a).html() == "[+]")
	{
		// 把p克隆一份
		var newP = p.clone();
		//取出name属性值将‘old’去掉 
		var old_name=newP.find('select').attr('name');
		var new_name=old_name.replace('old_','');
		newP.find('select').attr('name',new_name);
		
		//取出属性价格价格将old_去掉
		var old_pir=newP.find('input').attr('name');
		var new_pir=old_pir.replace('old_','');
		newP.find('input').attr('name',new_pir);
		// 把克隆出来的P里面的a标签变成-号
		newP.find("a").html("[-]");
		// 放在后面
		p.after(newP);
	}else
		//点击-号执行ajax删除对应属性
		if(confirm("确定要删除吗？")){
			//获取这条记录的ID
			var gaid=$(a).attr('gaid');
			$.get("<?php echo U('ajaxdeleteattr','',false);?>/gaid/"+gaid,function(data){
				p.remove();
				alert(data);
			});
		}
		
}
//删除图片
$(".delimg").click(function(){
	if(confirm("确定要删除吗？"))
	{
		// 获取图片的ID
		var pic_id = $(this).attr("pic_id");
		// 取出图片所在的LI标签
		var li = $(this).parent();
		$.ajax({
			type : "GET",
			url : "<?php echo U('ajaxDelImage', '', FALSE); ?>/pic_id/"+pic_id,
			success : function(data)
			{
				// ajax请求成功之后再把图片从页面上删除
				li.remove();
			}
		});
		
	}
});

//判断如果没有属性自动触发Ajax事件
<?php if(empty($attr)):?>
	$('select[name=type_id]').trigger("change");
<?php endif;?>
//在线编辑器
$("#promote_start_time").datepicker();
$("#promote_end_time").datepicker();
UE.getEditor('goods_desc', {
	"initialFrameWidth" : "70%",   // 宽
	"initialFrameHeight" : 300,      // 高
	"maximumWords" : 3000            // 最大可以输入的字符数量
});
</script>















<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>