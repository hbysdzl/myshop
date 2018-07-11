<?php
//登录后台操作控制器
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller{
    public function login(){
        if(IS_POST){
            $model=D('Login');
            //采用动态的验证方式！(调用模型类的validate方法)
            if($model->validate($model->_login_validate)->create()){
                if(true===$model->login()){

                    //直接跳转
                    $this->redirect('Index/index');
                }
            }
            $this->error($model->getError());
        }
        
        $this->display();
    }
    //生成验证码图片
    public function chkcode(){
        //设置验证码生成效果
        $config =	array(
            'useImgBg'  =>  true,           // 使用背景图片
            'fontSize'  =>  25,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  true,            // 是否添加杂点
            'imageH'    =>  45,               // 验证码图片高度
            'imageW'    =>  200,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
        );
        $Verify =new Verify($config);
        $Verify->entry();

    }
}