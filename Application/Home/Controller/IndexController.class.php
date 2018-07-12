<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;

class IndexController extends BackController {
    
    public function index(){
        echo date('Y-m-d H:i:s','1531360553
           ');
        $this->setPageInfo("京东商城","描述","京东首页",1,array('index'),array('index'));  
        $goodsModel=D('Goods');
        //疯狂抢购
        $goods_promote=$goodsModel->get_is_promote();
        //热卖商品
        $goods_hot=$goodsModel->get_is_hot();
       //精品推荐
        $goods_best=$goodsModel->get_is_best();
        
        //新品上架
        $goods_new=$goodsModel->get_is_new();
        
        //电脑办公类别
        $goods_cat=M('goodscategory');
        $goods_cat_list=$goods_cat->where('parent_id=20')->select();
        
       //电脑办公推荐商品
       
       $cat_id=array();
       foreach ($goods_cat_list as $k=>$v){//取出当前分类的类别ID
           $cat_id[]=$v['cat_id'];
       }
        $tuijian_diannao=$goodsModel->get_diannao($cat_id);
       
        $this->assign('tuijian_diannao', $tuijian_diannao);
        $this->assign('goods_cat_list',$goods_cat_list);
        $this->assign('goods_new',$goods_new);
        $this->assign('goods_best',$goods_best);
        $this->assign('goods_promote',$goods_promote);
        $this->assign('goods_hot',$goods_hot);
	    $this->display();
    }
    
    public function test(){
        //测试
        $this->setPageInfo("测试","测试","测试",0,array('a','b','c'),array('d','e','f'));
        $this->display();
    }
}