<?php
namespace Home\Controller;
use Home\Controller\BackController;
class OrderController extends BackController{
    
    //订单列表
    public function OrderList(){
          
         /*------将选中的商品保存到session中，如果没有选中商品则不可进去此页面----*/        
        $bythis=I('post.bythis');
        if(!$bythis){
            //从session中取出
            $bythis=session('bythis');
            if(!$bythis){
                $this->error('请选择需要购买的商品');
            }
        }else{
            session('bythis',$bythis);
        }
        
        //如果未登录则跳转到登录页面
        $m_id=session('id');
        if (!$m_id){
            session('returnUrl',U('OrderList'));
            redirect(U('Member/login'));
        }
        
       
        //获取购物车中的商品
        $cartModel=D('Cart');
        $data=$cartModel->cartList();
        //处理被选中购买的商品
        $arr=array();
        foreach ($data as $k=>$v){
              $_v=$v['goods_id'].'-'.$v['goods_attr_id'];
              if (in_array($_v,session('bythis'))){
                  $arr[]=$v;
              }
        }
        
        $this->assign('data',$arr);
        //设置页面信息
        $this->setPageInfo('订单列表','订单列表','订单列表',0,array('fillin'), array('cart2'));
        $this->display();
    }
    
    //下订单
    public function xiaOrder(){ 
        //开始下订单
        if(IS_POST){
            $orderModel=D('Order');
            if($orderModel->create(I('post.'),1)){
                if($orderID=$orderModel->add()){
                    echo json_encode(array('ok'=>1,'orderID'=>$orderID));
                    die();
                }
            }
           echo json_encode(array('ok'=>0,'error'=>$orderModel->getError())); 
        }
    }
}