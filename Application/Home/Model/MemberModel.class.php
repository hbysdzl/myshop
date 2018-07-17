<?php
namespace Home\Model;
use Think\Model;
use Think\Verify;


class MemberModel extends Model{


    //注册允许接收的字段
    protected  $insertFields=array('mustclick','email','password','face','cpassword','code','tel','telcode');


    //注册时表单的验证规则
    protected  $_validate = array(
        array('mustclick','require',"请阅读并同意注册协议", 1),
        array('email', 'require', '请输入邮箱', 1),
		array('email', '', '该email已注册', 1, 'unique'),
        //array('email', 'email,', 'email格式不正确', 1),
        array('password', 'require', '密码不能为空', 1),
        array('password', '6,20', '密码必须是6-20位字符!', 1, 'length'),
        array('cpassword', 'password', '两次密码输入不一致', 1, 'confirm'),
        array('code', 'require', '验证码不能为空', 1),
        array('code', 'chk_code', '验证码不正确', 1, 'callback',1),
    );

    //用户登录表单验证规则
        public  $_login_validate = array(
            array('email', 'require', '请输入邮箱', 1),
            //array('email', 'email,', 'email格式不正确', 1),
            array('password', 'require', '密码不能为空', 1),
            array('password', '6,20', '密码必须是6-20位字符!', 1, 'length'),
    );

    //调用验证码类进行验证
    protected function chk_code($code){
        $verify=new Verify();
        return $verify->check($code);
    }
    //在会员记录插入到数据库之前
    protected function _before_insert(&$data, $options){

        $data['addtime']=time();//注册时间
        $data['email_code']=md5(uniqid());//生成emali用的验证码
        $data['password']=md5($data['password'].C('MD5_KEY'));//对用户的密码进行加密
        $data['telcode']=I('post.telcode');
		//验证短信验证码
		if(!$data['tel']){
			$this->error="请输入短信验证码";
			return false;
			}
		$ga=session('telcode');
		if(!$ga){
			$this->error="请发送短信验证码";
			return false;
		}
		if($ga['time']+$ga['limit']<time()){
			$this->error="验证码已过期，请重新验证!";
			return false;
		}
		if($ga['code']!=$data['telcode']){
		    echo $ga['code'];
		    echo $data['telcode'];
		    die();
			$this->error="短信验证码错误！";
			return false;
		}
		unset($data['telcode']);
    }

    //会员注册之后
    protected function _after_insert(&$data, $options){
        //把生成的验证码发送到用户邮箱中完成验证
        $content="欢迎成为本站会员,请点击已下连接完成验证<br/>
                <a href='http://www.shop.com/index.php/Home/Member/emailchk/code/{$data['email_code']}'>点击完成验证</a>";
        sendMail($data['email'],'注册会员验证', $content);
    }

    //会员登录
    public function login(){

        $email=$this->email;
        $password=$this->password;

        // $user=$this->where(array('email'=>array('eq',$email)))->find();
        //调用自定义接口登录
        $data=array(
            'c'=>'User',
            'a'=>'login',
            'username'=>$email,
            'password'=>$password
        );
        $res=get_api_data($data);
        if($res['status']==0){
            $this->error=$res['error'];
            return false;
        }
        //保存用户信息
        $user=$res['result'];
        //将用户信息存入sissen
        session('id',$user['id']);
        session('email',$user['email']);
        session('jyz',$user['jyz']);
        //获取当前登录会员的级别其折扣率
        $ml=M('NumberLevel')->field('level_id,rate')->where("{$user['jyz']} between bottom_num and top_num")->find();
        session('level_id',$ml['level_id']);//当前会员的级别
        session('rate',$ml['rate']/100);//当前会员级别的折扣率
        //将购物中的COOKIE数据转移到数据库
        $cartModel=D('Cart');
        $cartModel->MoveDataDb();
        return true;
       
       /* if ($user){//判断账号是否存在

            if (empty($user['email_code'])){//判断是否通过email验证
                    
                if($user['password']==md5($password.C('MD5_KEY'))){
                    //将用户信息存入sissen
                    session('id',$user['id']);
                    session('email',$user['email']);
                    session('jyz',$user['jyz']);
                    //获取当前登录会员的级别其折扣率
                    $ml=M('NumberLevel')->field('level_id,rate')->where("{$user['jyz']} between bottom_num and top_num")->find();

                    session('level_id',$ml['level_id']);//当前会员的级别
                    session('rate',$ml['rate']/100);//当前会员级别的折扣率

                    //将购物中的COOKIE数据转移到数据库
                    $cartModel=D('Cart');
                    $cartModel->MoveDataDb();
                    return true;
                }else {
                    $this->error='密码错误';
                    return false;
                }
            }else {
                $this->error="请登录邮箱进行email验证";
            }
        }else {
            $this->error="账号不存在";
        }*/
    }
}