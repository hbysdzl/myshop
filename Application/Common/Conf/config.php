<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'php2018',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'php2018_',    // 数据库表前缀
    //存放文件的目录
    'IMG_ROOTPATH'          =>'./Public/Upload/',
    //防止XXS攻击配置函数
    'DEFAULT_FILTER'        =>  'trim,removeXSS', // 默认参数过滤方法 用于I函数...
    //用来MD5加密字符串
    'MD5_KEY' => 'fdsa#@90#_jl329$9lfds!129',
    //跳转的模板文件
    //'TMPL_ACTION_ERROR'     =>  'Public::error', // 默认错误跳转对应的模板文件
    //'TMPL_ACTION_SUCCESS'   =>  'Public::success', // 默认成功跳转对应的模板文件
    /* -----------图片路径------------*/
    'IMG_URL' => '/Public/Upload/',

    /************** 发邮件的配置 ***************/
    'MAIL_ADDRESS' => 'hbdzlaa@163.com',   // 发件人的email
    'MAIL_FROM' => '京西商城',      // 发件人昵称
    'MAIL_SMTP' => 'smtp.163.com',      // 邮件服务器的地址
    'MAIL_LOGINNAME' => 'hbdzlaa@163.com',//邮件账号
    'MAIL_PASSWORD' => 'duanzonglai123',//第三方授权码
);