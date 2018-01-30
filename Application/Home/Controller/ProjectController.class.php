<?php
	namespace Home\Controller;
	use Think\Controller;
	use Home\Controller\BaseController;
	class ProjectController extends BaseController
	{
		//展示社区项目详情页
		public function displayCommunityProject()
		{
			$id=I('get.id'); //项目id
	    	$this->assign('id',$id);
	    	$this->display();
		}
		//获得社区项目详情接口
	    public function getCommunityProject()
	    {
	    	//项目id
	    	$id = I("get.id"); 
	    	$origanization_info = "";
	    	//查询项目详情
	    	$projectinfo = M("community_project_info")->where(array("sjy_id"=>$id))->find();
	    	//社区地址信息
	    	$projectinfo['address'] = M('community_position_info')->where(array("sjy_community_id"=>$projectinfo['sjy_community_id']))->find(); 
            //项目图片
		    $projectinfo['project_image'] = M('community_project_image')->where(array('sjy_community_project_id'=>$id))->select();
		    
	 		$this->ajaxReturn($projectinfo);
	    }
	    //查看社区正在招标的项目
	    public  function  getCommunityTenderProject()
	    {
	    	$page = I('get.page')==null?1:I('get.page'); //页码 默认第一页    
            //分页 每页15条
            $id = I('get.id');  //社区id

	    	$limit = 15;
	    	//每页开始下标
	    	$start = ($page-1)*$limit; 
	    	$limit = $start.",".$limit;
        	//status=0 招标截止时间大于当前时间 正在招标中
	    	$project_info = M('community_project_info')->where(array("sjy_community_id"=>$id,"sjy_community_project_state"=>0,"sjy_community_project_collect_end_time"=>array("gt",date("Y-m-d H:i:s"))))->limit($limit)->select();
	    	//项目主图
	    	foreach($project_info as $key=>$value)
	    	{
	    		$main_image = M('community_project_image')->where(array('sjy_community_project_id'=>$value['sjy_id']))->getField('sjy_community_project_image');
	    		$project_info[$key]['project_images'] = $main_image; 
	    	}
	    	$pages = M('community_project_info')->where(array("sjy_community_id"=>$id,"sjy_community_project_status"=>0,"sjy_community_project_collect_end_time"=>array("gt",date("Y-m-d H:i:s"))))->count();
	    	 //返回数据
            $res['pages'] = ceil($pages/15); //总页码数
	        $res['data'] = $project_info;  //项目信息
	    	$this->ajaxReturn($res);
	    }
	    //查看社会组织项目详情
        public function displayProjectInfo()
        {
           $id = I('get.id');
           $this->assign('id',$id);
           $this->display();
        }
        //取得社会组织项目详情接口
        public function getProjectInfo()
        {
            //项目id
            $id = I("get.id"); 
            $origanization_info = "";
            //查询项目详情
            $projectinfo = M("origanization_project_info")->where(array("sjy_id"=>$id))->find();
            //社区地址信息
            $projectinfo['address'] = M('origanization_position_info')->where(array("sjy_origanization_id"=>$projectinfo['sjy_origanization_id']))->find(); 
            //项目图片
            $projectinfo['project_image'] = M('origanization_project_image')->where(array('sjy_origanization_project_id'=>$id))->select();
            $this->ajaxReturn($projectinfo);
        }
        //社区项目管理页面展示
        public function communityProjectManger()
        {
        	$this->display();
        }
        

	}
?>