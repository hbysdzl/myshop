<?php
/*
 * 会员中心 显示订单信息控制器
 * */

namespace Home\Controller;
use Home\Controller\BackController;

class CenterController extends BackController{
 
        //订单列表
        public function orderLst(){
            
            //判断如果会员未登录则调回登陆页面
            if(!session('id')){
                $this->success('请先登陆',U('Member/Login'));
                return ;
            }
            
            //设置页面基本信息
            $this->setPageInfo('订单列表','订单列表','订单列表',0,array('cart'),array('cart1'));
            
            //获取当前会员的订单信息
            $user_id=session('id');
            $orderModel=M('order');
            $orderlist=$orderModel->where('member_id='.$user_id)->select();
            $this->assign('order_list',$orderlist);
            
            //获取待付款订单数量
            $where['member_id']=$user_id;
            $where['pay_status']=0;
            $daiFuKuan=$orderModel->where($where)->count();
            
            $this->assign('daiFuKuan',$daiFuKuan);
            $this->display();
        }
}