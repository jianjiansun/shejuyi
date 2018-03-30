<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      //检测是否登录,已经登录则直接看到列表页
      $userinfo = session('userInfo');
      if(!empty($userinfo))
      {
      	  $figure = session("figure");
      	  if($figure==1)
      	  {
      	  	//社会组织
      	  	redirect(__MODULE__.'/Origanization/index');
      	  }elseif($figure==2)
      	  {
      	  	//社区
      	  	redirect(__MODULE__.'/Community/index');
      	  }else{
      	  	 session(null); //清除所有session
      	  }
      }else{
            $figure = '';
      }
      $this->assign('figure',$figure);
      $this->display();
    }
}
