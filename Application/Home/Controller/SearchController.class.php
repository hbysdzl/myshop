<?php
//商品列表搜索页控制器
namespace Home\Controller;
use Home\Controller\BackController;

class SearchController extends BackController{
    
    //搜索页面
    public function Search(){
        
        $cat_id=I('get.cat_id');
        $goodsModel=M('goods');
        
        //初始化缓存
        S(array('type'=>'memcache','host'=>'127.0.0.1','port'=>'11211','prefix'=>'Searc'));
       
        /**-------------------获取当前分类的品牌--------------------------*/
        
        $gcModel=M('GoodsCat');
        $extGoodsId=$gcModel->field('GROUP_CONCAT(goods_id) goods_id')->where('cat_id='.$cat_id)->find();
        if($extGoodsId['goods_id']){
            $extGoodsId=" OR goods_id IN({$extGoodsId['goods_id']})";
        }else{
            $extGoodsId='';
        }
        //获取当前分类下所有的商品品牌id 并去重
        $goods_brand=$goodsModel->field('DISTINCT brand_id')->where(array('cat_id'=>array('exp',"=$cat_id $extGoodsId")))->select();
        $brand_arr=array();
        foreach ($goods_brand as $k=>$v){
            //获取品牌
            $brand=M('goodsbrand')->field('brand_id,brand_name')->where('brand_id='.$v['brand_id'])->find();
             
            $goods_brand[$k]['brand']=$brand['brand_name'];
            $goods_brand[$k]['brand_id']=$brand['brand_id'];
        }
         
        
        //从缓存中读取数据
        $_price=S('pir_cha');
        
        if ($_price==false){
            //计算这个分类下的商品7个价格区间范围
            $pirceSection=7;
            //取出扩展分类下的商品ID转换为字符串
            $gcModel=M('GoodsCat');
            $extGoodsId=$gcModel->field('GROUP_CONCAT(goods_id) goods_id')->where('cat_id='.$cat_id)->find();
            
            if($extGoodsId['goods_id']){
                $extGoodsId=" OR goods_id IN({$extGoodsId['goods_id']})";
            }else{
                $extGoodsId='';
            }
            
            //获取当前分类和扩展分类商品的最低价和最高价
            $price=$goodsModel->field('min(shop_price) minprice,max(shop_price) maxprice')->where(array('cat_id'=>array('exp',"=$cat_id $extGoodsId")))->select();
            
            //处理二维数组
            foreach ($price as $v){
                $maxprice=$v['maxprice'];
                $minprice=$v['minprice'];
            }
            //最低价和最高价分七段
            $_price=array();
            //计算每个段的价格区间
            $s_price=($maxprice - $minprice)/$pirceSection;
            $firstPrice=$minprice;
            for ($i=0;$i<$pirceSection;$i++){
                if($i<($pirceSection-1)){
                    $start=floor($firstPrice/10)*10;
                    $end=(floor(($firstPrice+$s_price)/10)*10-1);
                    //判断这个分类下在这个价格区间是否有商品
                    $where['shop_price']=array('between',"$start,$end");
                    $where['cat_id']=array('exp',"=$cat_id $extGoodsId");
                    $where['is_on_sale']=array('eq',1);
                    $where['is_delete']=array('eq',0);
                    $goodsNum=$goodsModel->where($where)->count();
                    $firstPrice+=$s_price;
                    if ($goodsNum==0){
                        continue;
                    }
                    $_price[]=$start.'-'.$end;
            
                }else {
                    $start=floor($firstPrice/10)*10;
                    $end=ceil($maxprice/10)*10;
                    //判断这个分类下在这个价格区间是否有商品
                    $where['shop_price']=array('between',"$start,$end");
                    $where['cat_id']=array('exp',"=$cat_id $extGoodsId");
                    $where['is_on_sale']=array('eq',1);
                    $where['is_delete']=array('eq',0);
                    $goodsNum=$goodsModel->where($where)->count();
                    $firstPrice+=$s_price;
                    if ($goodsNum==0){
                        continue;
                    }
                    $_price[]=$start.'-'.$end;
                }
            }
            //写入缓存
            S('pir_cha',$_price,500);
        }
        
        //从memcache中读取
        $searchData=S('search_cha');
        
        if ($searchData==false){
            //获取当前分类下可以搜索的属性列表
            $categroyModel=M('goodscategory');
            $cat_search_id=$categroyModel->field('search_attr_id')->find($cat_id);
            $cat_id_arr=implode(',',$cat_search_id);
             
            //根据属性Id获取对应的属性名称及值
            $searchData=M('goodsattribute')->field('attr_id,attr_name')->select($cat_id_arr);
            
            //获取所有属性下有商品的属性值并去重
            foreach ($searchData as $k=>$v){
                $gaData=M(GoodsAttr)->field('DISTINCT attr_value')->where(array('attr_id'=>array('eq',$v['attr_id'])))->select();
                //如果该属性下没有商品则不显示
                if(!$gaData){
                    unset($searchData[$k]);
                }else{
                    $searchData[$k]['attr_value']=$gaData;
                }
            } 
            //保存到memcache中
            S('search_cha',$searchData,500);
        }
        //接收价格搜索参数
        $pa=I('get.price');
        $price_p=$pa? 'price/'.$pa:'';
        
        //接收品牌搜索参数
        $ba=I('get.brand');
        $brand_p=$ba? 'brand/'.$ba:'';
        
        //获取分类商品
        $goodsModel=D('Goods');
        $Goods=$goodsModel->search_goods();
        $this->assign(array(
            'goods_brand'=>$goods_brand,
            '_price'=>$_price,
            'searData'=>$searchData,
            'Goods'=>$Goods,
            'cat_id'=>$cat_id,
            'price_p'=>$price_p,
            'brand_p'=>$brand_p
        ));
        //设置页面信息
        $this->setPageInfo('商品列表页','商品列表页','商品列表页',0,$css=array('list','common'),$js=array('list'));
        $this->display();
    }
}

