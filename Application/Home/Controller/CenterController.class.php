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
                $this->success('请先登陆',U('Member/login'));
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
        
        /**
         * 订单物流状态
         * */
        public function express(){
            $orderID=I('get.orderid');
            if(!$orderID){
                $this->error('参数错误');
            }
            $orderModel=M('order');
            $info=$orderModel->field('com,no')->find($orderID);
            //调用快递接口
            $key='899fe70f6da4ecf9667c897618bc71c4';
            $url="http://v.juhe.cn/exp/index?key=".$key."&com=".$info['com']."&no=".$info['no'];
            $data=file_get_contents($url);
            
            $data=json_decode($data,true);
            
            $this->assign('data',$data);
           
            $this->display();
            
        }
}