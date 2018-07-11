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
    <form name="main_form" method="POST" action="/index.php/Admin/Goodsattribute/edit/attr_id/3.html" enctype="multipart/form-data" >
    	<input type="hidden" name="attr_id" value="<?php echo $data['attr_id']; ?>" />
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">属性名称：</td>
                <td>
                    <input  type="text" name="attr_name" value="<?php echo $data['attr_name']; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label">属性类别：</td>
                <td>
                	<?php if($data['attr_type']==1):?>
                    <input  type="radio" name="attr_type" value="1" checked="checked"/>可选
                    <input  type="radio" name="attr_type" value="0" />唯一
                    <?php else:?>
                   	<input  type="radio" name="attr_type" value="1" />可选
                    <input  type="radio" name="attr_type" value="0" checked="checked"/>唯一
                    <?php endif;?>

                </td>
            </tr>
            <tr>
                <td class="label">可选属性值：</td>
                <td>
                    <textarea rows="4" cols="35" name="attr_option_values" ><?php echo $data['attr_option_values'];?></textarea>
                    每项用‘ ，’隔开填写
                </td>
                </td>
            </tr>
            <tr>
                <td class="label">所属商品类型：</td>
                <td>
                     <select name="type_id">
                     <option value="">--请选择--</option>
                     <?php foreach($type as $v):?>
                     <?php if($v[type_id]==$data['type_id']):?>
                     <option value="<?php echo $v['type_id']?>" selected="selected"><?php echo $v['type_name']?></option>
                     <?php else:?>
                      <option value="<?php echo $v['type_id']?>"><?php echo $v['type_name']?></option>
                     <?php endif;?>
                     <?php endforeach;?>
                     </select>
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
</script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>