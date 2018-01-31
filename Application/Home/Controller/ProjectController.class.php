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
        //社会组织项目管理
        public function origanizationProjectManger()
        {
        	$this->display();
        }


        //邀请我
        public function invite()
        {
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
            //查询sjy_project表，按照邀请时间倒序排列
            $where = array(
            		"origanization_id"=>$origanization_code,
            		'status'=>0
            );
        	$info = M('project')->where($where)->order('invitate_time desc')->select();
        	//查询社会项目表，获得项目详情
        	foreach($info as $key=>$value)
        	{
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		//根据$project_info['sjy_community_project_status']判断状态 0 正在征集 >=1征集结束
        		if($project_info['sjy_community_project_status']==0&&time()<=strtotime($project_info['sjy_community_project_end_time']))
        		{
        			$info[$key]['status_desc'] = '投标期';
        		}else if($project_info['sjy_community_project_status']>=1||time()>strtotime($project_info['sjy_community_project_end_time'])){
        			$info[$key]['status_desc'] = '投标结束';
        		}
        		$info[$key]['project_detail'] = $project_info;
        	}
        	$this->ajaxReturn($info);
        }



        //投标中
        public function sendProjectBook()
        {
        	//状态正在竞标 未中标
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	//查询sjy_project表
        	$where = array(
            		"origanization_id"=>$origanization_code,
            		'status'=>1
            );
            //按照投递时间倒序排列
        	$info = M('project')->where($where)->order('send_project_book_time desc')->select();
        	//查询项目详情
        	foreach($info as $key=>$value)
        	{
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		//根据$project_info['sjy_community_project_status']判断状态 0 正在竞标 >=1 竞标失败
        		if($project_info['sjy_community_project_status']==0&&time()<=strtotime($project_info['sjy_community_project_start_time']))
        		{
        			$info[$key]['status_desc'] = '正在竞标';
        		}else if($project_info['sjy_community_project_status']>=1||time()>strtotime($project_info['sjy_community_project_start_time'])){
        			$info[$key]['status_desc'] = '竞标失败';
        		}
        		$info[$key]['project_detail'] = $project_info;
        	}
        	$this->ajaxReturn($info);
        }



        //待开始
        public function waitStart()
        {
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	//查询sjy_project表
        	$where = array(
            		"origanization_id"=>$origanization_code,
            		'status'=>2
            );
            //按照社区同意时间倒序排列
        	$info = M('project')->where($where)->order('community_agreen_project_start_time desc')->select();
        	//查询项目详情
        	foreach($info as $key=>$value)
        	{
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		$info[$key]['project_detail'] = $project_info;
        	}
        	$this->ajaxReturn($info);
        }



        //正在执行中
        public function ingProject()
        {
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	//[10,99] 正在执行中 其中99提交结项目申请
        	$info = M('project')->where(array('origanization_id'=>$origanization_id,'status'=>array('between',[10,99])))->order('project_start_time desc')->select();
        	//查询项目详情
        	foreach($info as $key=>$value)
        	{
        		
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		if($value['status'] == 99)
        		{
        			$info[$key]['status_desc'] = '结项中';
        		}else if(($value['status']>=10&&$value['status']<=98)&&time()>strtotime($project_info['sjy_community_project_end_time']))
        		{
        			$info[$key]['status_desc'] = '已延期';
        		}else{
        			$info[$key]['status_desc'] = '正在执行';
        		}
        		$info[$key]['project_detail'] = $project_info;
        	}
        	$this->ajaxReturn($info);
        }



        //已完成的项目
        public function completeProject()
        {
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	//已完成的项目
        	$info = M('project')->where(array('origanization_id'=>$origanization_id,'status'=>100))->order('project_start_time desc')->select();
        	//查询项目详情
        	foreach($info as $key=>$value)
        	{
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		$info[$key]['project_detail'] = $project_info;
        	}
        	$this->ajaxReturn($info);
        }


        //社会组织投递项目书
        public function sendProjectBook()
        {
        	$project_id = I('get.id'); //项目id
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	//项目信 息
        	$project_info = M('community_project_info')->where(array('sjy_id'=>$project_id))->find();
        	//检测该项目是否可以投递
        	$res = $this->checkSendProjectBook($project_id,$project_info);
        	if($res['state']!=1)
        	{
        		$this->ajaxReturn($res);
        	}else{
        		//执行项目书发送
        		$this->file_upload($project_id,$project_info);
        	}
        }
        //检测该机构是否可以投递该项目
        public function checkSendProjectBook($project_id,$project_info)
        {
        	$res['state'] = 1;
            $res['errorInfo'] = '';
        	$project_id = $project_id; //项目id
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	if(empty($origanization_code))
        	{
        		$res['state'] = 2;
        		$res['errorInfo'] = '尚未加入机构，无法发送';
        		return $res;
        	}else{
        		//是否过了招标期 是否有人中标
        		//首先检测是否有人中标
        		if($project_info['sjy_community_project_status']==0)
        		{
        			if(time()>strtotime($project_info['sjy_community_project_collect_end_time']))
        			{
        				$res['state'] = 3;
        				$res['errorInfo'] = '该项目已过征集期，无法发送';
        				return $res;
        			}else if(time()<strtotime($project_info['sjy_community_project_collect_start_time'])){
        				$res['state'] = 4;
        				$res['errorInfo'] = '暂未到项目征集期，无法发送';
        				return $res;
        			}else{
        				return $res;
        			}
        		}else{
        			if($project_info['sjy_community_project_status']==1||$project_info['sjy_community_project_status']==3)
        			{
	        			$res['state'] = 5;
	        			$res['errorInfo'] = '该项目正在执行中,无法发送';
	        			return $res;
	        		}else{
	        			$res['state'] = 6;
	        			$res['errorInfo'] = '该项目已结束，无法发送';
	        			return $res;
	        		}

        		}
        	}
        }


        //发送项目书
	    function file_upload($project_id,$project_info)
	    {
	    	//执行上传文件前检测
	    	//文件扩展名检测    
    	    $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('pdf', 'docx', 'doc');// 设置附件上传类型
		    $upload->rootPath  =     './Uploads/project_book/'; // 设置附件上传根目录
		    $upload->savePath  =     ''; // 设置附件上传（子）目录
		    // 上传文件 
		    $info   =   $upload->upload();
                            
		    if(!$info) {// 上传错误提示错误信息
		        $this->ajaxReturn($upload->getError());
		    }
			$filename = $info["file"]['name'];
	    	//文件大小检测
			$path = "/Uploads/project_book/".$info["file"]['savepath'].$info["file"]['savename'];
	    	//社区id'
	    	$community_id = $project_info['sjy_community_id'];
	    	//发送者id
	    	$userId = session("userInfo")["sjy_id"];
	    	//发送时间
	    	$time = date("Y-m-d H:i:s");
	    	//项目id
	    	$project_id = $project_id;
	    	//社会组织id
	    	$origanization_id = session("userInfo")["sjy_origanization_user_origanization_code"];
	    	//将信息插入sjy_project表  首先去找有没有该条记录，有并且status=1，则不操作sjy_project表 除此之外则操作该表
	    	$isupload = M("project")->where(array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id))->find();
	    	//需要新增 之前没有项目联系过
	    	if(empty($isupload))
	    	{
	    		$data["project_id"] = $project_id;
		    	$data["community_id"] = $community_id;
		    	$data["origanization_id"] = $origanization_id;
		    	$data['status'] = 1;  //已经发送项目书
	    		$res = M("project")->add($data);
	    	}else{
	    		
	    	}
	    	//将信息插入项目书表
	    	$param['sjy_project_id'] = $project_id;
	    	$param['sjy_origanization_id'] = $origanization_id;
	    	$param['sjy_community_id'] = $community_id;
	    	$param['sjy_project_book_send_time'] = $time;
	    	$param['sjy_project_path'] = $path;
	    	$param['sjy_project_book_name'] = $filename;
            $param['project_book_send_people'] = session('userInfo')['sjy_origanization_user_real_name'];  //项目书发送者
            $param['project_book_send_people_id'] = session('userInfo')['sjy_id'];  //发送者id            
	    	$val = M('project_book')->add($param);
	    	$this->ajaxReturn(array("state"=>1,"errorInfo"=>"发送成功"));
	    }
	}
?>