<?php
namespace Home\Controller;
use Home\Controller\BackController;


//订单支付管理控制器
class PaymentController extends BackController{
    
    //订单提交
    public function payIndex(){
        
        //设置页面信息
        $this->setPageInfo('支付宝支付','支付宝支付','支付宝支付',0,array('success'), array());
        $this->display();
    }
}