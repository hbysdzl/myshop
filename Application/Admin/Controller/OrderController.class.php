<?php
/*
 *后台订单管理控制器
 * */

namespace Admin\Controller;
use Admin\Controller\BackController;

class OrderController extends BackController{
    
    //订单列表
    public function index(){
        
        $this->setBent('商品列表', ' ', ' ');
        
        //获取订单信息
        $orderModel=M('');
        $sql="SELECT a.*,b.goods_id,goods_number,goods_price,c.email,GROUP_CONCAT(d.goods_name) goods_name,
                GROUP_CONCAT(b.goods_attr_str) sttr,GROUP_CONCAT(logo) logo,GROUP_CONCAT(goods_number) number  
                from php2018_order as a LEFT JOIN php2018_order_goods as b on a.id=b.order_id LEFT JOIN php2018_member as c on a.member_id=c.id 
                LEFT JOIN php2018_goods as d on b.goods_id=d.goods_id GROUP BY a.id";
        $info=$orderModel->query($sql);
        
        foreach ($info as $k=>$v){
            //将商品名称，logo,属性组合为二维数组
            $gooods_name=explode(',',$v['goods_name']);
            $goods_arr=explode(',',$v['sttr']);
            $logo=explode(',',$v['logo']);
            $number=explode(',',$v['number']);
            $info[$k]['goods_name']=$gooods_name;
            $info[$k]['sttr']=$goods_arr;
            $info[$k]['logo']=$logo;
            $info[$k]['number']=$number;
        }
       /* var_dump($info);
        die();*/
        $this->assign('info',$info);
        $this->display();
    }
    
    //订单发货
    public function delive(){
        
        if(IS_GET){
            //显示模板
            $orderID=I('get.orderid');
            $this->setBent('订单发货', ' ', ' ');
            
            //获取订单信息
            $orderModel=M('');
            $sql="SELECT a.*,b.goods_id,goods_number,goods_price,c.email,GROUP_CONCAT(d.goods_name) goods_name,
                GROUP_CONCAT(b.goods_attr_str) sttr,GROUP_CONCAT(logo) logo,GROUP_CONCAT(goods_number) number
                from php2018_order as a LEFT JOIN php2018_order_goods as b on a.id=b.order_id LEFT JOIN php2018_member as c on a.member_id=c.id
                LEFT JOIN php2018_goods as d on b.goods_id=d.goods_id where a.id={$orderID} GROUP BY a.id";
            $info=$orderModel->query($sql);
            foreach ($info as $k=>$v){
                //将商品名称，logo,属性组合为二维数组
                $gooods_name=explode(',',$v['goods_name']);
                $goods_arr=explode(',',$v['sttr']);
                $logo=explode(',',$v['logo']);
                $number=explode(',',$v['number']);
                $info[$k]['goods_name']=$gooods_name;
                $info[$k]['sttr']=$goods_arr;
                $info[$k]['logo']=$logo;
                $info[$k]['number']=$number;
            }
            
            //转换为一维数组
            $arr=array();
            foreach ($info as $k=>$v){
                foreach ($v as $k1=>$v2){
                    $arr[$k1]=$v2;
                }
                
            }
            /* var_dump($arr);
             die();*/
            $this->assign('arr',$arr);
            $this->display();
        }else{
        
            //发货
            $orderID=I('post.id');
            $orderModel=M('order');
            $info=$orderModel->field('post_status')->find($orderID);
            if($info['post_status']!=0){
                $this->error('该订单已完成发货');
            }
            if($orderModel->create(I('post.'),2)){
                if($orderModel->save()){
                    $this->success('发货成功',U('index'));
                    die();
                }
            }
            $this->error($orderModel->getError());
        }
    }
}