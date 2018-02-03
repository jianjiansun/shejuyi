<?php
	namespace Home\Controller;
	use Think\Controller;
  use Home\Controller\BaseController;
	class ChangeprovinceController extends BaseController
	{
	      //选择城市
      public function index()
      {
      	$this->display();
      }
         //设置城市
	    public function setcity()
	    {
	         $cityid = I("post.cityid")?I('post.cityid'):0;
             if($cityid)
            {
                 session("cityid",$cityid);
                 $this->ajaxReturn(array('state'=>1,'errorInfo'=>''));
            }else{
                  $this->ajaxReturn(array('state'=>0,'errorInfo'=>'城市设置失败，请重新设置'));
               }
	    }
	}
?>