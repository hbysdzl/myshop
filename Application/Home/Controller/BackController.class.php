<?php

 namespace Home\Controller;
 use Think\Controller;
 
 class BackController extends Controller{
     
     //设置页面信息
     protected  function setPageInfo($keywords,$description,$title,$showNav=0,$css=array(),$js=array()){
         $this->assign('page_keywords',$keywords);//关键字
         $this->assign('page_description',$description);//网站描述
         $this->assign('page_title',$title);//网站标题
         $this->assign('show_nav',$showNav);//导航菜单闭合
         $this->assign('page_css',$css); 
         $this->assign('page_js',$js);
     }
 }
