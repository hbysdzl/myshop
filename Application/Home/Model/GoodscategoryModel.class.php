<?php
namespace Home\Model;
use Think\Model;

class GoodscategoryModel extends Model{
    
    //获取分类树的数据
    public function getNavCatData(){
         $data=array();
        $allcat=$this->select();
         
         //获取所有顶级分类
        foreach ($allcat as $k=>$v){
            if($v['parent_id']==0){
                
                //取出顶级分类的二级分类
                foreach ($allcat as $k1=>$v1){
                    if ($v1['parent_id']==$v['cat_id']){
                        
                        //取出二级分裂下的三级分类
                        foreach ($allcat as $k2=>$v2){
                            if ($v2['parent_id']==$v1['cat_id']){
                                $v1['children'][]=$v2;
                            }
                        }
                        $v['children'][]=$v1;
                    }
                    
                }
                $data[]=$v;
            }
        }
        
        return $data;
    }
}