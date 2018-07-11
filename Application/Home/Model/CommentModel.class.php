<?php
namespace Home\Model;
use Think\Model;

class CommentModel extends Model{
    
    //发表评论时允许提交的字段
    protected $insertFields=array('grade','content','goods_id');
    
    //自动验证表单
    protected $_validate=array(
        array('grade', 'require','请选择评分',1,'regex',1),
        array('content','require', '评价内容不能为空',1,'regex',1)
    );
    
    //添加之前
    protected function _before_insert(&$data,$option){
        $data['addtime']=time();
        $data['member_id']=session('id');
        
        //处理印象的数据
       $yx=I('post.yx');
       
        $yx=str_replace('，' , ',' ,$yx); //将逗号强制转换为英文
        //将印象用,号转换为数组循环插入
        $yx_arr=explode(',',$yx);
            
        $impModel=M('impression');
        foreach ($yx_arr as $k=>$v){
            
            //判断当前的印象是否存在
            $mp['goods_id']=$data['goods_id'];
            $mp['imp_name']=$v;
            $has= $impModel->field('id')->where($mp)->find();
            if ($has){
                $impModel->where('id='.$has['id'])->setInc('imp_count');
            }else {
                $impModel->add($mp);
            }
            
        }
    }
} 