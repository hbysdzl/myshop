<?php
namespace Home\Controller;

use Home\Controller\BackController;
use Think\Verify;
class MemberController extends BackController{

    //发送短信验证码方法
    public function sendcode(){

        $tel=I('post.tel');
        if (!$tel) {
            $this->ajaxReturn(array('status'=>0,'error'=>'请填写注册的手机号码！'));
        }

        //开始发送短息
        $code=rand(1000,9999);
        $resurl=sendTemp($tel,array($code,'30'),'1');
        if(!$resurl){
            $this->ajaxReturn(array('status'=>0,'error'=>'发送失败，请稍后重试！'));
        }

        //发送成功保存到session中，并指定有效期
        $data=array(
                'code'=>$code,
                'time'=>time(),
                'limit'=>600
            );
        session('telcode',$data);
        $this->ajaxReturn(array('status'=>1));
    }

    public function test(){
       // var_dump(session('telcode'));
    }
    //会员注册
    public function regist(){

            if(IS_POST){//提交表单
                /*var_dump(I('post.'));
                die();*/
               $model=D('Member');
               if($model->create(I('post.'),1)){
                   if ($model->add()){
                       $this->ajaxReturn(array('status'=>'1'));
                       die();
                    }
                }
                $this->ajaxReturn(array('status'=>0,'error'=>$model->getError()));
            }

        //设置页面基本信息
        $this->setPageInfo('会员注册','会员注册','会员注册',0,array('login'));
        $this->display();
    }

    //完成会员注册的验证
    public function emailchk(){
        //接收验证码
        $code=I('get.code');
        if ($code){
            $MemberModel=M('member');
            $num=$MemberModel->where(array('email_code'=>array('eq',$code)))->find();
            if ($num){
                //设置这个账号已验证
                $MemberModel->where('id='.$num['id'])->setField('email_code','');
                $this->success('验证成功，现在可以去登录了！',U('login'));
            }
        }

    }

    //会员登录
    public function login(){
        if (IS_POST){
            $model=D('Member');
            if ($model->validate($model->_login_validate)->create(I('post.'),9)){
                if ($model->login()){
                   //判断session中是否有跳转地址
                   $returl=session('returnUrl');
                    if($returl){
                        session('returnUrl',null);
                        $this->ajaxReturn(array('status'=>2,'url'=>$returl));
                    }else {
                        $this->ajaxReturn(array('status'=>1));
                    }

                }
            }
            //$this->error($model->getError());
            $this->ajaxReturn(array('status'=>0,'error'=>$model->getError()));
        }

        //设置页面基本信息
        $this->setPageInfo('会员登录','会员登录','会员登录',0,array('login'));
        $this->display();
    }

    //登录状态

    public function ajaxChkLogin(){
            if (session('id')){
                $arr=array(
                    'ok'=>1,
                    'email'=>session('email')
                );
            }else {
                $arr=array(
                  'ok'=>0
                );
            }
            echo json_encode($arr);
    }

    //登录退出

    public function logout(){

        session('id',null);
        redirect('/');
    }
    //生成验证码
    public function chkcode(){
        $verfiy=new Verify(
            array(
                'length'=>2,
                'useNoise'=>false,

            ));
        $verfiy->entry();
    }

    //商品评论时登录
    public function saveAndLogin(){
        //获取ajax从哪里来的，并保存到session中
        session('returnUrl',$_SERVER['HTTP_REFERER']);
    }
}