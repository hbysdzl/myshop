<?php
//商品详情控制器
namespace Home\Controller;

use Home\Controller\BackController;
use DoctrineTest\InstantiatorTestAsset\ArrayObjectAsset;
class GoodsController extends BackController{
    
    //商品详情页面
    public function goods($goods_id){
        
        //获取商品基本信息
        $goods=M('goods')->find($goods_id);       
        //设置页面信息
        $this->setPageInfo($goods['seo_keyword'],$goods['seo_description'],$goods['goods_name'].'-详情页',0,array('goods','common','jqzoom'), array('goods','jqzoom-core'));
        
        //获取商品相册信息
        $goods_pic=M('GoodsPics')->where(array('goods_id'=>array('eq',$goods_id)))->select();
        
        //获取商品单选属性信息
        $attrModel=M('GoodsAttr');
        $gaattr=$attrModel->alias('a')->field('a.*,b.attr_name,b.attr_type')->join('left join php2018_goodsattribute as b on a.attr_id=b.attr_id')
                 ->where(array('a.goods_id'=>array('eq',$goods_id),'b.attr_type'=>array('eq',1)))->select();
        //将二维数组转三维
        $goods_attr=array();
        foreach ($gaattr as $k=>$v){
           $goods_attr[$v['attr_name']][]=$v;
        }
        
        //获取商品唯一属性信息
        $w_attr=$attrModel->alias('a')->field('a.*,b.attr_name,b.attr_type')->join('left join php2018_goodsattribute as b on a.attr_id=b.attr_id')
        ->where(array('a.goods_id'=>array('eq',$goods_id),'b.attr_type'=>array('eq',0)))->select();
        $this->assign('w_attr',$w_attr);
        $this->assign('goods_attr',$goods_attr);
        $this->assign('goods_pic',$goods_pic);
        $this->assign('goods',$goods);
        $this->display();
    }
    
    
    //计算会员价格+最近浏览
    
    public function ajaxGetPrice(){
        /*----------------计算会员价格-------------------*/
        $goods_id=I('get.goods_id');
        $priceModel=D('Goods');
       
        
        /*----------------最近浏览----------------------*/        
      //在COOKIE中存放一个数组，保存最近浏览的10件商品的ID （数组需序列化）
      $recentDisplay=isset($_COOKIE['recentDisplay'])? unserialize($_COOKIE['recentDisplay']):array();
        
      //把浏览过的商品ID放到数组的最前面 并需要去重
      array_unshift($recentDisplay, $goods_id);      
      $recentDisplay=array_unique($recentDisplay);
      
      if(count($recentDisplay)>10){
          $recentDisplay=array_slice($recentDisplay,0,10);
      }
      
      //把处理好的数组序列化保存到COOKIE中
      $aMoth=30*86400;//有效期一个月
      setcookie('recentDisplay',serialize($recentDisplay),time() + $aMoth,'/');
      echo  $priceModel->getNumberPrice($goods_id);
    }
    
    //获取最近浏览商品
    public function ajaxgetRecentlygoods(){
        //先从cookie中取出浏览商品的ID
        $recentDisplay=isset($_COOKIE['recentDisplay'])? unserialize($_COOKIE['recentDisplay']):array();
        
        if ($recentDisplay){
            $recentDisplay_str=implode(',' , $recentDisplay);
            $recentModel=M('Goods');
            $goods=$recentModel->field('goods_id,goods_name,sm_logo')->where(array('goods_id'=>array('in',$recentDisplay_str)))->select();
            echo json_encode($goods);
        
        }
    }
    
    
    //ajax商品评论表单
    public function ajaxGetComment(){
        $ret=array('login'=>0);
        $m_id=session('id');
        if ($m_id){
            $ret['login']=1;
        }
        
        echo json_encode($ret);
    }
}