<?php
	namespace Home\Controller;
	use Think\Controller;
	use Home\Controller\BaseController;
	class HomeController extends BaseController
	{
		//展示社区详情页
		public function displayCommunityHome()
		{
			if(session('userInfo')['sjy_community_user_community_code'])
        	{
        		$id = session('userInfo')['sjy_community_user_community_code'];
        	}else{
            	$id = I('get.id'); //社区id
            }
	    	$this->assign('id',$id);
	    	$this->display();
		}
		//获得社区信息接口
	    public function getCommunityInfo()
	    {
	    	//社区信息
	    	$id = I("get.id");
	    	//查询社区信息
	        $community_info = M('community_base_info')->where(array('sjy_id'=>$id))->find();
	        //社区地址信息
	        $community_info['address_info'] = M('community_position_info')->where(array('sjy_community_id'=>$id))->find();
	    	//社区展示图片
	    	$community_images = M("community_images")->where(array("sjy_community_code"=>$community_info['sjy_community_code']))->getField('sjy_community_images');
            $community_info['community_images'] = $community_images;
	    	$this->ajaxReturn($community_info);
	    }
	    //查看社会组织主页
        public function displayOriganizationHome()
        {
        	if(session('userInfo')['sjy_origanization_user_origanization_code'])
        	{
        		$id = session('userInfo')['sjy_origanization_user_origanization_code'];
        	}else{
            	$id = I('get.id'); //社会组织id
            }
            $this->assign("id",$id);
            $this->display();
        }
        //获得社会组织信息接口
        public function getOriganizationInfo()
        {
            //社会组织信息  判断从哪里查看社会组织信息。自己查看自己的，不用id，其他人查看得传id
            $id = I('get.id');

            //查询社会组织信息
            $origanization_info = M('origanization_base_info')->where(array('sjy_id'=>$id))->find();
            //社区地址信息
            $origanization_info['address_info'] = M('origanization_position_info')->where(array('sjy_origanization_id'=>$id))->find();
            //社区展示图片
            $origanization_images = M("origanization_images")->where(array("sjy_origanization_code"=>$origanization_info['sjy_origanization_code']))->getField('sjy_origanization_images');
            $origanization_info['origanization_images'] = $origanization_images;
            $this->ajaxReturn($origanization_info);
        }

	}
?>