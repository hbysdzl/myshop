<?php
namespace Home\Controller;

use Home\Controller\BackController;
class CommentController extends BackController{
    
    //发表评论
    public function add(){
        //判断是否登录
		$m_id=session('id');
		if(!$m_id){
			echo json_encode(array('ok'=>0,'error'=>'请先登录'));
			exit; 
		}
				
		if(IS_POST){
			$plModle=D('Comment');
			if($plModle->create(I('post.'),1)){
				
				if($plModle->add()){
				
					//获取当前会员的图像
					$face=M('member')->field('face')->find($m_id);
					$face=empty($face['face'])? '/Public/Home/images/a.jpg': '/Public/Upload'.$face['face'];
						
					echo json_encode(array(
									'ok'=>1,
									'content'=>I('post.content'),
									'addtime'=>date('Y-m-d H：i'),
									'face'=>$face,
									'satr'=>I('post.grade'),
									'user'=>session('email')
								));
								die();
				}
			}
			echo json_encode(array('ok'=>0,'error'=>$plModle->getError()));
		}
    }
	
	//分页获取评论内容
	public function ajaxConent(){
		$pageSize=5;//每页显示的数量
		$p=I('get.p');
		$offset=($p-1)*$pageSize;//分页偏移量
		$goods_id=I('get.goods_id');
		$CommentModel=M('comment');
		$data=$CommentModel->field('a.*,b.email,b.face,count(c.id) num')->alias('a')->join('LEFT JOIN php2018_member as b on a.member_id=b.id LEFT JOIN php2018_reply as c on a.id=c.comment_id')
		->group('a.id')->where(array('a.goods_id'=>array('eq',$goods_id)))->limit("$offset,$pageSize")->order('a.id desc')->select();
		
		//数据处理
		foreach($data as $k=>$v){
			$data[$k]['addtime']=date('Y-m-d H:i',$v['addtime']);
			$data[$k]['face']=$v['face']?'/Public/Upload'.$V['face']:'/Public/Home/images/a.jpg';
		}
		//var_dump($data);
		echo json_encode($data);
	}
	
	//获取商品的印象数据
	public function ajaxXy($goods_id){
	    
	    $data=M('impression')->where('goods_id='.$goods_id)->select();
	    echo json_encode($data);
	}
	
	//商品评论的回复
	public function ajaxReply(){
	    //判断是否登录
	    $m_id=session('id');
	    if(!$m_id){
	        echo json_encode(array('ok'=>0,'error'=>'必须先登录'));
	        die();
	    }
	    if(IS_POST){
	        $model=D('Reply');
	        if($model->field('content,comment_id')->create(I('post.'),1)){
	            if($model->add()){
	                //获取会员信息
	                $mem=M('member')->field('email,face')->find($m_id);
	                $face=empty($mem['face'])?'/Public/Home/images/a.jpg':'/Public/Upload/'.$mem['face'];
	                echo json_encode(array(
	                    'ok'=>1,
	                    'user'=>$mem['email'],
	                     'face'=>$face,
	                    'addtime'=>date('Y-m-d H：i'),
	                    'content'=>I('post.content')
	                ));
	                die();
	            }
	        }
	        echo json_encode(array('ok'=>0,'error'=>$model->getError()));
	    }
	}
}