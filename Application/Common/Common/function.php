<?php
use Think\Upload;
use Behavior\ShowPageTraceBehavior;

//发送邮件
function sendMail($to, $title, $content){
    require_once ('./Api/PHPMailer_v5.1/class.phpmailer.php');
    $mail = new PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送HTML代码做为邮件的内容
    $mail->IsHTML(TRUE);
    // 是否需要身份验证
    $mail->SMTPAuth=TRUE;
    $mail->CharSet='UTF-8';
    /*  邮件服务器上的账号是什么 */
    $mail->From='hbdzlaa@163.com';
    $mail->FromName='我的商城';         //发件人的昵称
    $mail->Host='smtp.163.com';
    $mail->Username='hbdzlaa@163.com'; //邮箱名
    $mail->Password='duanzonglai123';  //第三方客户端授权码
    // 发邮件端口号默认25
    $mail->Port = 25;
    // 收件人
    $mail->AddAddress($to);
    // 邮件标题
    $mail->Subject=$title;
    // 邮件内容
    $mail->Body=$content;
    return($mail->Send());
}


//选择性的实体转义，防止xxs恶意攻击
function removeXSS($val){
    static $obj = null;
    if($obj === null)
    {
        require('./HTMLPurifier/HTMLPurifier.includes.php');
        $config = HTMLPurifier_Config::createDefault();
        // 保留a标签上的target属性
        $config->set('HTML.TargetBlank', TRUE);
        $obj = new HTMLPurifier($config);
    }
    return $obj->purify($val);
}
//图片上传调用
function UploadOne($imgname,$dirname,$thumb=array()){
    //上传LOGO
    if($_FILES[$imgname]['error']==0){
        //设置配置信息
        $config = array(
            'exts'          =>  array('jpg','png','gif'), //允许上传的文件后缀
            'autoSub'       =>  true, //自动子目录保存文件
            'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath'      =>     './Public/Upload/', //保存根路径
            'savePath'      =>  $dirname, //保存路径
            'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
            'saveExt'       =>  '', //文件保存后缀，空则使用原后缀
        );
        $upload=new Upload($config);
        $info=$upload->uploadOne($_FILES[$imgname]);
        if(!info){
            //上传失败则获取错误信息
            return array('img'=>0,'error' => $upload->getError(),);
        }else {
            $ret['img']=1;
            $ret['images'][0]=$info['savepath'].$info['savename'];//原图地址
             //判断是否生成缩略图生成缩略图
            if($thumb){
                $images=new \Think\Image();//实例化
                foreach ($thumb as $k=>$v){
                    $images->open($upload->rootPath.$ret['images'][0]);//打开图片地址
                    $ret['images'][$k+1]=$info['savepath'].'sm_'.$k.'_'.$info['savename'];//拼凑缩略图文件名
                    $images->thumb($v[0], $v[1])->save($upload->rootPath.$ret['images'][$k+1]);//生成并保存

                }
            }
        }
    }
    return $ret;
}

//模板中显示图片
function ShowImage($url,$width='',$height=''){
    $url='/Public/Upload/'.$url;
    if ($width){
        $width="width='$width'";
    }
    if ($height){
        $height="height='$height'";
    }
    echo "<img src='$url' $width $height>";
}
//删除图片
function deleteImage($images){
    //取出图片所在目录
    $rp=C('IMG_ROOTPATH');
    foreach ($images as $v){
        @unlink($rp.$v);
    }
}

//判断批量上传的文件表单中是否存在文件
function hasImage($imgName){
    foreach ($_FILES[$imgName]['error'] as $v){
        if($v==0)
            return true;
    }
    return false;
}