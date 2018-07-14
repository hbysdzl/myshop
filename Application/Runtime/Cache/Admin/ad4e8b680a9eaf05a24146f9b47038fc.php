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


<style type="text/css">
.main-div table {background: #BBDDE5;}
</style>
    
       <div class="list-div">
            <table width="100%" cellpadding="3" cellspacing="1">
            <tbody>
                <tr>
                    <th colspan="4">订单信息</th>
                </tr>
                <tr>
                    <td align="right" width="18%">订单号:</td>
                    <td align="left" width="34%"><?php echo ($arr["id"]); ?></td>
                    <td align="right" width="15%">订单金额:</td>
                    <td align="left"><?php echo ($arr["total_price"]); ?></td>
                </tr>
                <tr>
                    <td align="right" width="18%">下单时间:</td>
                    <td align="left" width="34%"><?php echo date('Y-m-d H:i:s',$arr['addtime'])?></td>
                    <td align="right" width="15%">会员:</td>
                    <td align="left"><?php echo ($arr["email"]); ?></td>
                </tr>
                <tr>
                	<td align="right" width="18%">支付宝交易号:</td>
                    <td align="left" width="34%"><?php echo ($arr["alipaid"]); ?></td>
                    <td align="right" width="18%">收货人:</td>
                    <td align="left" width="34%"><?php echo ($arr["shr_name"]); ?></td>
                    
                </tr>
                <tr>
                    <td align="right" width="18%">联系电话:</td>
                    <td align="left" width="34%"><?php echo ($arr["shr_tel"]); ?></td>
                    <td align="right" width="15%">收货地址:</td>
                    <td align="left"><?php echo ($arr["shr_province"]); ?>,<?php echo ($arr["shr_city"]); ?>,<?php echo ($arr["shr_area"]); ?>,<?php echo ($arr["shr_address"]); ?></td>
                </tr>
                <tr>
                    <td align="right" width="18%">商品详情:</td>
                    <td align="left" width="34%">
                    	<ul style="list-style: decimal">
            			<?php foreach($arr['goods_name'] as $k1=>$v1):?>
	            		<li>
	            			<span><?php echo ($v1); ?>;</span>
	            			<?php foreach($arr['sttr'] as $k2=>$v2):?>
	            				<?php $v2=str_replace('<br/>',';',$v2);?>
		            			<?php if($k2==$k1):?>
		            			<span><?php echo ($v2); ?>；</span>
		            			<?php endif;?>
	            			<?php endforeach;?>
	            			<?php foreach($arr['number'] as $k3=>$v3):?>
	            				<?php if($k3==$k1):?>
	            				<span>购买数量:<?php echo ($v3); ?></span>
	            				<?php endif;?>
	            			<?php endforeach;?>
	            		</li>
            		<?php endforeach;?>
            	</ul>
                    </td>
                    <td align="right" width="15%">订单状态:</td>
                    <td align="left">
                    	<?php if($arr['pay_status']==0):?>
		            		待支付
		            	<?php elseif($arr['pay_status']==1 && $arr['post_status']==0):?>
		            		已支付，待发货
		            	<?php elseif($arr['post_status']==1):?>
		            		待收货
		            	<?php else:?>
		            		已确认收货
		            	<?php endif;?>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
     <form action="/index.php/Admin/Order/delive/orderid/37.html" method="post" name="theForm" enctype="multipart/form-data">
        <div class="list-div">
            <table width="100%" cellpadding="3" cellspacing="1">
                <tr>
                    <th colspan="4">发货信息</th>
                </tr>
                <tr>
                    <td class="label">快递公司:</td>
                    <td>
                    	<select name="com">
                    		<option value="sf">顺丰</option>
                    		<option value="sto">申通</option>
                    		<option value="yt">圆通</option>
                    		<option value="yd">韵达</option>
                    		<option value="tt">天天快递</option>
                    		<option value="zto">中通</option>
                    	</select>                       
                    </td>
                </tr>
                <tr>
                    <td class="label">快递单号:</td>
                    <td>
                        <input type='text' name='no'  value='<?php echo ($arr["no"]); ?>' /> 
                    </td>
                </tr>
            </table>
        </div>
        <input type="hidden" name="id" value="<?php echo ($arr["id"]); ?>">
        <input type="hidden" name="post_status" value=1>
        <div class="button-div">
            <input type="submit" value=" 确定 " />
            <input type="reset" value=" 重置 " />
        </div>
    </form>


<div class="list-div">
   <table width="100%" cellpadding="3" cellspacing="1">
     <tbody>
         <tr>
             <th colspan="4">地图信息</th>
         </tr>
         <tr>
             <td>
             <div class="list-div" id="container" style="width:100%;height:300px;"></div>
             </td>
         </tr>        
     </tbody>
  </table>
</div>

<!-- 创建收货地址地图 -->
<script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp"></script>
<script>
//初始化地图函数 
function init() {
	//定义变量获取地图显示的容器
	var option={'zoom':15,};//定义具体的缩放
    var map = new qq.maps.Map(document.getElementById("container"),option );//实例化地图核心类初始化地图
       
   // var center=map.panTo(new qq.maps.LatLng(39.916527,116.397128));// 地图的具体位置坐标 
    
    //地址解析后的回调函数
    var callbacks={
    	    complete:function(result){
    	        map.setCenter(result.detail.location);
    	        
    	        
    	       /* var marker = new qq.maps.Marker({
    	            map:map,
    	            position: result.detail.location
    	        });
    	        var marker = new qq.maps.Label({
    	            position: result.detail.location,
    	            map: map,
    	            content:'文本标注'
    	        });*/
    	      //实例化覆盖物
    	        var infoWin = new qq.maps.InfoWindow({
    	            map: map
    	        });
    	        infoWin.open();
    	        infoWin.setContent('<div style="width:-50px;padding-top:10px;">收货位置</div>'); //  自定义内容
    	        infoWin.setPosition(result.detail.location);//指定具体位置
    	    },
    	}
    	//实例化地图解析类
   	geocoder = new qq.maps.Geocoder(callbacks);
  		//调用相关方法将实际地址解析为经纬度坐标
   	geocoder.getLocation("<?php echo ($arr["shr_province"]); ?>,<?php echo ($arr["shr_city"]); ?>,<?php echo ($arr["shr_area"]); ?>,<?php echo ($arr["shr_address"]); ?>");
    	
} 

//调用
init();
</script>


<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。
</div>
<!-- 导入列表样式 -->
<script type="text/javascript" charset="utf-8" src="/Application/Admin/Public/Js/tron.js"></script>