<?php
namespace Home\Model;
use Think\Model;

class OrderModel extends Model{
    
    //允许接收的字段
    protected $insertFields=array('shr_name','shr_province','shr_city','shr_area','shr_tel','shr_address','post_method','pay_method');
    
    //自动验证表单
    
    protected $_validate=array(
        array('shr_name', 'require', '收货人姓名不能为空！', 1, 'regex', 1),
        array('shr_province','require','请选择省份', 1 ,'regex',1),
        array('shr_city','require','请选择城市', 1 ,'regex',1),
        array('shr_area','require','请选择地区', 1 ,'regex',1),
        array('shr_address','require','请填写收货人详细地址', 1 ,'regex',1),
        array('shr_tel','require','请填写收货人电话号码', 1 ,'regex',1),
        array('post_method','require','请选择发货方式', 1 ,'regex',1),
        array('pay_method','require','请选择支付方式', 1 ,'regex',1),
        
    );
    
    //提交之前
    protected function _before_insert(&$data, $options){
        //判断购物车中是否有商品
        $CartModel=D('Cart');
        $gaData=$CartModel->cartList();
        if(count(count($gaData))==0){
            $this->error="请选选择需要购买的商品才能下单";
            return false;
        }
        
        //加锁机制，避免高并发下单时库存量出错
        $this->tp=fopen('./order.lock','r');
        flock($this->fp, LOCK_EX);
        //循环购物车中的商品
        $bythis=session('bythis');
        $tp=0;
        foreach ($gaData as $k=>$v){
            //判断商品是否是被选中购买的商品
            if(!in_array($v['goods_id'].'-'.$v['goods_attr_id'],$bythis)){
                continue;
            }
            //计算总价格
            $tp+=$v['price']*$v['goods_number'];
        }
        //补全订单信息
        $data['member_id']=session('id');
        $data['addtime']=time();
        $data['total_price']=$tp;
        
        
    }
    
    //提交之后
   
    protected function _after_insert(&$data, $options){
        
        $bythis=session('bythis');
        //处理订单商品表并减少库存量
        $CartModel=D('Cart');
        $gaData=$CartModel->cartList();
        $gnModel=M('GoodsNumber');
        $ogModel=M('OrderGoods');
        
        foreach($gaData as $k=>$v){
            //未选中购买的商品无需处理
            if(!in_array($v['goods_id'].'-'.$v['goods_attr_id'],$bythis)){
                continue;
            }
            $where['goods_id']=$v['goods_id'];
            $where['goods_attr_id']=$v['goods_attr_id'];
            $rs=$gnModel->where($where)->setDec('goods_number',$v['goods_number']);
            if($rs===false){
                //回滚事物
                mysql_query('ROLLBACK');
                return false;
            }
            
            //插入到订单商品表
            $where['order_id']=$data['id'];
            $where['member_id']=session('id');
            $where['goods_attr_str']=$v['goods_attr_str'];
            $where['goods_price']=$v['price'];
            $where['goods_number']=$v['goods_number'];
            $rs=$ogModel->add($where);
            if ($rs===false){
                //回滚事物
                mysql_query('ROLLBACK');
                return false;
            }
          
        }
        
        mysql_query('COMMIT');//提交事物
        //释放锁机制
        flock($this->fp,LOCK_UN);
        fclose($this->fp);
        //清空购物车中所选择的购买的商品并删除session中保存的选中数据
        $CartModel->clearDb();
        session('bythis',null);
    }
}