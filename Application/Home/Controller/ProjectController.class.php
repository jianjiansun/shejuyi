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
            // //查询该项目是否状态为1，且当前时间大于项目开始时间且社会组织没有主动开始项目
            $info = M('project')->where(array('project_id'=>$id,'status'=>2))->find();
            if(!empty($info))
            {
                $starttime = M("community_project_info")->where(array("sjy_id"=>$id))->getfield('sjy_community_project_start_time');
                if(time()>strtotime($starttime))
                {
                    //将该项目改为社会组织同意（默认同意）
                          //开启事务
                          $model = M();
                          $model->startTrans();

                          //更新项目状态  sjy_project
                          $data['status'] = 10;  //开始做项目
                          $data['project_start_time'] = $starttime;  //项目开始时间
                          // $data['project_start_people'] = session('userInfo')['sjy_origanization_user_real_name']; //同意人
                          // $data['project_start_people_id'] = session('userInfo')['sjy_id'];  //同意人id
                          $res = M('project')->where(array('sjy_id'=>$info['sjy_id']))->save($data);

                         //更新sjy_community_project_info表
                          // $data = array(
                          //         "sjy_community_project_origanization"=>$info['origanization_id'],
                          //         "sjy_community_project_origanization_name"=>M('origanization_base_info')->where(array('sjy_id'=>$info['origanization_id']))->getField('sjy_origanization_name')
                          // );
                          // $val = M('community_project_info')->where(array('sjy_id'=>$id))->save($data);

                          //更新进度表 插入第一个信息
                          $rate['sjy_projectrate_title']= '项目开始';
                          $rate['sjy_project_id']= $id;
                          $rate['sjy_project_rate_con']='开始做项目';
                          $rate['create_time'] = date('Y-m-d H:i:s');
                          $rate['sjy_origanization_id'] = $info['origanization_id'];
                          // $rate['sjy_project_rate_write_people'] = session('userInfo')['sjy_origanization_user_real_name'];
                          // $rate['sjy_project_rate_write_people_id'] = session('userInfo')['sjy_id'];
                          $rut = M('projectrate')->add($rate);

                          if($res&&$rut)
                          {
                              $model->commit();
                          }else{
                              $model->rollback(); 
                          }
                }
            }
            // if($info['sjy_community_project_status']==1&&time()>strtotime($info['sjy_community_project_start_time'])&&empty())
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
       


        //社会组织项目管理
        public function origanizationProjectManger()
        {
        	$this->display();
        }


        //邀请我
        public function invite()
        {
            $page = I('get.page'); //页面
            $limit = 15;
            $start = ($page-1)*$limit; //开始
            $limit = $start.",".$limit;
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
            //查询sjy_project表，按照邀请时间倒序排列
            $where = array(
            		"origanization_id"=>$origanization_code,
            		'status'=>0
            );
        	$info = M('project')->where($where)->order('invitate_time desc')->limit($limit)->select();
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
        public function alreadySendProject()
        {
            $page = I('get.page')==null?1:I('get.page'); //页面
            $limit = 15;
            $start = ($page-1)*$limit; //开始
            $limit = $start.",".$limit;
        	//状态正在竞标 未中标
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	//查询sjy_project表
        	$where = array(
            		"origanization_id"=>$origanization_code,
            		'status'=>1
            );
            //按照投递时间倒序排列
        	$info = M('project')->where($where)->order('send_project_book_time desc')->limit($limit)->select();

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
            $count = M('project')->where($where)->count();
            $pages = ceil($count/15);
            $res = array(
                   'data'=>$info,
                   'pages'=>$pages
            );

        	$this->ajaxReturn($res);
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
        //社会组织就某个项目发送的项目书列表
        public function origanizationGetProjectBookList()
        {
            //社会组织id
            $origanization_id = session('userInfo')['sjy_origanization_user_origanization_code'];
            //项目id
            $project_id = I('get.project_id');
            //查询项目书
            $info = M('project_book')->where(array('sjy_project_id'=>$project_id,'sjy_origanization_id'=>$origanization_id))->select();
            $this->ajaxReturn($info);
        }


        //正在执行中
        public function ingProject()
        {
        	//社会组织id
            $origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
            
        	//[10,99] 正在执行中 其中99提交结项目申请
            $info = M('project')->where(array('origanization_id'=>$origanization_code,'status'=>array('between',[10,99])))->order('project_start_time desc')->select();
            
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

        //社会组织申请结项目
        public function endProjectApply()
        {
            $project_id = I('post.project_id'); //项目id
            $project_id = I('post.id');   //主键id sjy_project
            //修改状态
            $date = date('Y-m-d H:i:s',time());
            
            $res = M('project')->where(array('sjy_id'=>$id))->save(array('status'=>99,'project_apply_end_time'=>$date,'project_apply_end_people_id'=>session('userInfo')['sjy_id']));
           
            if($res)
            {
                $this->ajaxReturn(array('state'=>1,'errorInfo'=>''));
            }else{
                $this->ajaxReturn(array('state'=>0,'errorInfo'=>'请重试'));
            }
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
        	$project_id = I('get.project_id'); //项目id
            if(empty($project_id))
            {
                $this->ajaxReturn(array('state'=>9,'errorInfo'=>"上传错误,请重试"));
            }
        	//社会组织id
        	$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
        	//项目信息
        	$project_info = M('community_project_info')->where(array('sjy_id'=>$project_id))->find();
        	//检测该项目是否可以投递
        	$res = $this->checkSendProjectBook($project_id,$project_info);
        	if($res['state']!=1)
        	{
        		$this->ajaxReturn($res);
        	}else{
        		//执行项目书发送
        		$val = $this->file_upload($project_id,$project_info);
        		$this->ajaxReturn($val);
        	}
        }
        //检测该机构是否可以投递该项目
        public function checkSendProjectBook($project_id,$project_info)
        {
            // $project_id = 40;
            // $project_info = M('community_project_info')->where(array('sjy_id'=>40))->find();
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
        //社会组织增加项目进度
        public function addProjectRate()
        {
            $project_id = I('post.project_id'); //项目id
            $rate_title = I('post.rate_title'); //进度标题
            $rate_desc = I('post.rate_desc'); //进度详细内容
            //插入项目图片
            //base64数组
            $base64_data = I('post.project_rate_images');
            $imgs = array();
            $filename = time();
            foreach ($base64_data as $key => $value) {
            $result = '';
            $filename++;
            $base64_image_content = $value;
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = "./Uploads/origanization/project_rate/".date('Ymd',time())."/";
      
                    if(!file_exists($new_file))
                    {
                            //检查是否有该文件夹，如果没有就创建，并给予最高权限
                              mkdir($new_file, 0700);
                     }
                     $new_file = $new_file.$filename.".{$type}";
                     if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                            $url = "/Uploads/origanization/project_rate/".date('Ymd',time())."/".$filename.".{$type}";
                            $imgs[$key] = $url;
                    }
                 }
            }
            $rate_imgs = json_encode($imgs);
            //执行新增
            $data['sjy_projectrate_title'] = $rate_title;//进度标题
            $data['sjy_project_rate_image'] = $rate_imgs; //进度图片
            $data['sjy_project_rate_con'] = $rate_desc;//进度主要内容
            $data['sjy_project_id'] = $project_id; //项目id
            $data['create_time'] = date('Y-m-d H:i:s',time()); //创建时间
            $data['sjy_origanization_id'] = session('userInfo')['sjy_origanization_user_origanization_code']; //社会组织id
            $data['sjy_project_rate_write_people'] = session('userInfo')['sjy_origanization_user_real_name']; //进度发布者姓名
            $data['sjy_project_rate_write_people_id'] = session('userInfo')['sjy_id'];//进度发布者id

            $res = M('projectrate')->add($data);

            if($res)
            {
                $this->ajaxReturn(array('errorInfo'=>'','state'=>1)); //成功
            }else{
                $this->ajaxReturn(array('errorInfo'=>'填写失败,请重试','state'=>0)); //失败
            }
        }
        //发送项目书
	    public function file_upload($project_id,$project_info)
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
                return array("state"=>7,"errorInfo"=>$upload->getError());
		    }
			$filename = $info["file"]['name'];
	    	//路劲
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
	    	$model = M();
            $model->startTrans();
	    	//需要新增 之前没有项目联系过
	    	if(empty($isupload))
	    	{
	    		$data["project_id"] = $project_id;
		    	$data["community_id"] = $community_id;
		    	$data["origanization_id"] = $origanization_id;
		    	$data['status'] = 1;  //已经发送项目书
                $data['send_project_book_time'] = date('Y-m-d H:i:s',time());  //项目书最后发送时间
	    		$res = M("project")->add($data);
	    	}else{
	    		//更新项目书发送时间 //最后时间
                $res = M('project')->where(array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id))->save(array("send_project_book_time"=>date('Y-m-d H:i:s',time())));
	    	}
	    	//将信息插入项目书表
	    	$param['sjy_project_id'] = $project_id;     //项目id
	    	$param['sjy_origanization_id'] = $origanization_id;   //社会组织id
	    	$param['sjy_community_id'] = $community_id;           //社区id
	    	$param['sjy_project_book_send_time'] = $time;         //项目书发送时间
	    	$param['sjy_project_path'] = $path;                   //项目书路径
	    	$param['sjy_project_book_name'] = $filename;          //项目书名字
            $param['project_book_send_people'] = session('userInfo')['sjy_origanization_user_real_name'];  //项目书发送者
            $param['project_book_send_people_id'] = session('userInfo')['sjy_id'];  //发送者id            
	    	$val = M('project_book')->add($param);
		    if ($res&&$val){
			    // 提交事务
			    $model->commit(); 
			    return array("state"=>1,"errorInfo"=>"发送成功");
			}else{
			    // 事务回滚
			    $model->rollback(); 
			    return array("state"=>8,"errorInfo"=>"系统错误,请重试");
			}
	    	
	    }


        //社区项目管理页面展示
        public function communityProjectManger()
        {
            $this->display();
        }
        //邀请社会组织发送项目
        public function inviteOriganization()
        {
            //检测就该项目该社会组织是否已经发送项目书，是否已经邀请过
            $project_id = I('post.project_id');  //社区项目id
            //社区id
            $community_id = session('userInfo')['sjy_community_user_community_code'];
            //社会组织id
            $origanization_id = I('post.origanization_id');
            $where = array(
                'project_id'=>$project_id,
                'community_id'=>$community_id,
                'origanization_id'=>$origanization_id,
                'status'=>0
            );
            //是否邀请过
            $res = M('Project')->where($where)->find();
            if($res)
            {
                $this->ajaxReturn(array('state'=>2,'该项目已邀请过该机构'));
            }
            $where = array(
                'project_id'=>$project_id,
                'community_id'=>$community_id,
                'origanization_id'=>$origanization_id,
                'status'=>1
            );
            //是否已经发送项目书
            $val = M('Project')->where($where)->find();
            if($val)
            {
                $this->ajaxReturn(array('state'=>3,'该项目该机构已发送项目书'));
            }

            //将该项目信息插入sjy_project表
            $data["project_id"] = $project_id;
            $data["community_id"] = $community_id; 
            $data["status"] = 0;   //社区发送项目邀请 邀请对方发项目书
            $data['invitate_time'] = date('Y-m-d H:i:s',time());
            $data["origanization_id"] = $origanization_id;
            //插入sjy_project表
            $ress = M("project")->add($data);
            if($ress)
            {
                $this->ajaxReturn(array('state'=>1,'errorInfo'=>"邀请成功"));  //邀请成功
            }else{
                $this->ajaxReturn(array('state'=>4,'errorInfo'=>"邀请失败,请重试"));  //邀请成功
            }
               
        }
        //社区正在招标中的项目
        public function communityTenderProject()
        {
            $page = I('get.page')?I('get.page'):1; //页面
            $limit = 15;
            $start = ($page-1)*$limit; //开始
            $limit = $start.",".$limit;
            //在招标周期 且sjy_community_project_status=0的项目
            //社区id
            $community_code = session('userInfo')['sjy_community_user_community_code'];
            //正在征集中
            $data = array(
                  "sjy_community_project_status"=>0,
                  "sjy_community_project_collect_start_time"=>array('lt',date('Y-m-d',time())),
                  'sjy_community_project_start_time'=>array('gt',date('Y-m-d',time())) 
            );
            $info = M('community_project_info')->where($data)->limit($limit)->select();
            $count = M('community_project_info')->where($data)->count();
            $pages = ceil($count/15);
            $res = array(
                   'data'=>$info,
                   'pages'=>$pages
            );
            // var_dump($res);die;
            $this->ajaxReturn($res);
        }
        //意向机构，已经发送项目书的
        public function  intentOriganization()
        {
            $page = I('get.page')?I('get.page'):1; //页面
            $limit = 15;
            $start = ($page-1)*$limit; //开始
            $limit = $start.",".$limit;
            $project_id = I('get.id'); //项目id
            //社区id
            $community_id = session('userInfo')['sjy_community_user_community_code'];
            //根据项目id和社区id查询已经投递项目书的机构
            $data = array(
                   "community_id"=>$community_id,
                   'project_id'=>$project_id,
                   'status'=>1
            );
            $info = M('project')->where($data)->limit($limit)->select();
            //查询社会组织信息
            foreach($info as $key=>$value)
            {
                  $origanization_info = M('origanization_base_info')->where(array('sjy_id'=>$value['origanization_id']))->find();
                  $info[$key]['origanization_info'] = $origanization_info;                
            }
            $count = M('project')->where($data)->count();
            $res['data'] = $info;
            $res['pages'] = ceil($count/15);
            $this->ajaxReturn($res);
        }
        //查询意向机构发送的项目书
        public function projectBookList()
        {
            $page = I('get.page')?I('get.page'):1; //页面
            $limit = 15;
            $start = ($page-1)*$limit; //开始
            $limit = $start.",".$limit;

            $origanization_id = I('get.origanization_id'); //社会组织id
            $project_id = I('get.project_id');  //项目id
            $community_id = session('userInfo')['sjy_community_user_community_code'];//社区id
            //查询项目书列表
            $data = array(
                  'sjy_project_id'=>$project_id,
                  'sjy_origanization_id'=>$origanization_id,
                  'sjy_community_id'=>$community_id
            );
            $info = M('project_book')->where($data)->limit($limit)->select();
            $count = M('project_book')->where($data)->count();
            $res['pages'] = ceil($count/15);
            $res['data'] = $info;
            $this->ajaxReturn($res);
        }
        //社区同意社会组织做该项目
        public function agreeProject()
        {
            $project_id = I('post.project_id'); //项目id
            $origanization_id = I('post.origanization_id'); //社会组织id
            $community_id = session('userInfo')['sjy_community_user_community_code'];  //社区id
            //开启事务
            $model = M();
            $model->startTrans();

            $where = array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id,"status"=>1);
            $data = array("status"=>2,'community_agreen_project_start_time'=>date('Y-m-d H:i:s',time()),'community_agreen_project_start_people_id'=>session('userInfo')['sjy_id'],'community_agreen_project_start_people'=>session('userInfo')['sjy_community_user_real_name']);
            //修改sjy_project表
            $res = M("project")->where($where)->save($data);
            //修改sjy_community_project表
            $where = array('sjy_id'=>$project_id);
            //更新sjy_community_project_info表
                          $data = array(
                                'sjy_community_project_status'=>1,
                                "sjy_community_project_origanization"=>$origanization_id,
                                "sjy_community_project_origanization_name"=>M('origanization_base_info')->where(array('sjy_id'=>$origanization_id))->getField('sjy_origanization_name')
                          );

            $val = M("community_project_info")->where($where)->save($data);

            if($res&&$val)
            {
               $model->commit();
               $this->ajaxReturn(array('state'=>1,"errorInfo"=>""));    //社区同意开始做项目
            }else{
               $model->rollback();
               $this->ajaxReturn(array('state'=>0,"errorInfo"=>"同意失败,请重试"));    
            }
        }
        //社会组织主动点击开始项目 如果点击时间在原定项目周期之后，则该项目自动进入项目期
        public function origanizationStartProject()
        {
            $project_id = I('post.project_id'); //项目id
            $id = I('post.id'); //主键id project

            $origanization_id = session('userInfo')['sjy_origanization_user_origanization_code'];


            //开启事务
            $model = M();
            $model->startTrans();

            //更新项目状态  sjy_project
            $data['status'] = 10;  //开始做项目
            $data['project_start_time'] = date('Y-m-d H:i:s',time());  //项目开始时间
            $data['project_start_people'] = session('userInfo')['sjy_origanization_user_real_name']; //同意人
            $data['project_start_people_id'] = session('userInfo')['sjy_id'];  //同意人id

            $res = M('project')->where(array('sjy_id'=>$id))->save($data);

            //更新sjy_community_project_info表
            // $data = array(
            //       "sjy_community_project_origanization"=>$origanization_id,
            //       "sjy_community_project_origanization_name"=>M('origanization_base_info')->where(array('sjy_id'=>$origanization_id))->getField('sjy_origanization_name')
            // );
            // $val = M('community_project_info')->where(array('sjy_id'=>$project_id))->save($data);

            //更新进度表 插入第一个信息
            $rate['sjy_projectrate_title']= '项目开始';
            $rate['sjy_project_id']= $project_id;
            $rate['sjy_project_rate_con']='开始做项目';
            $rate['create_time'] = date('Y-m-d H:i:s');
            $rate['sjy_origanization_id'] = session('userInfo')['sjy_origanization_user_origanization_code'];
            $rate['sjy_project_rate_write_people'] = session('userInfo')['sjy_origanization_user_real_name'];
            $rate['sjy_project_rate_write_people_id'] = session('userInfo')['sjy_id'];
            $rut = M('projectrate')->add($rate);

            if($res&&$rut)
            {
                $model->commit();
                $this->ajaxReturn(array('state'=>1,"errorInfo"=>""));    //社会组织手动同意开始做项目
            }else{
                $model->rollback();
                $this->ajaxReturn(array('state'=>0,"errorInfo"=>"项目开始失败，请重试"));
            }
            
        }
        //查询待社会组织开始的项目
        public function waitOriganizationStart()
        {
            $community_id = session('userInfo')['sjy_community_user_community_code'];//社区id
            // var_dump(session('userInfo'));die;
            $where = array(
                'community_id'=>$community_id,
                'status'=>2,
            );
            $info = M('project')->where($where)->select();
            // var_dump($info);die;
            //查询项目信息
            foreach($info as $key=>$value)
            {
                $project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
                $info[$key]['project_info'] = $project_info;
            }
            $this->ajaxReturn($info);

        }
        //查询执行中项目
        public function communityIngProject()
        {
            //社区id
            $community_id = session('userInfo')['sjy_community_user_community_code'];
            //查询该社区下正在进行的项目
            //[10,98] 正在执行中 其中99提交结项目申请
            $info = M('project')->where(array('community_id'=>$community_id,'status'=>array('between',[10,99])))->order('project_start_time desc')->select();
            //查询项目详情
             //查询项目详情
             foreach($info as $key=>$value)
             {
                 $project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
                 $info[$key]['project_info'] = $project_info;
             }
            $this->ajaxReturn($info);
        }
        //查询结项中的项目
        public  function communityWaitCompleteProject()
        {
            //社区id
            $community_id = session('userInfo')['sjy_community_user_community_code'];
            $info = M('project')->where(array('status'=>99,'community_id'=>$community_id))->select();
            //查询项目详情
            foreach($info as $key=>$value)
            {
                $project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
                $info[$key]['project_info'] = $project_info;
            }
            $this->ajaxReturn($info);
        }
        //社区同意结项目，并给项目打分
        public function agreenEndProject()
        {
              $id = I('post.id');  //id 主见id(sjy_project表)
              $score = I('post.score');    //分数
              $project_id = I('post.project_id'); //项目id
              //开启事务
              $model = M();
              $model->startTrans();
              //更改sjy_project表
              $data['project_end_time']= date('Y-m-d H:i:s',time());//项目结束时间
              $data['status'] = 100;//完成项目
              $data['score'] = $score; //评分
              $data['peoject_agreen_end_people_id'] = session('userInfo')['sjy_id'];
              $res = M('project')->where(array('sjy_id'=>$id))->save($data);
              //更改sjy_community_project表
              $val = M('communit_project_info')->where(array('sjy_id'=>$project_id))->save(array('sjy_community_project_status'=>2));
              if($res&&$val)
              {
                 $model->commit();
                 $this->ajaxReturn(array('state'=>1,'errorInfo'=>''));
              }else{
                 $model->rollback();
                 $this->ajaxReturn(array('state'=>0,'errorInfo'=>'请重试'));
              }
              
        }
        //查询已完成的项目
        public function communityCompleteProject()
        {
             //社区id
            $community_id = session('userInfo')['sjy_community_user_community_code'];
            $info = M('community_project_info')->where(array('sjy_community_project_status'=>2))->select();
            $this->ajaxReturn($info);
        }
        //查看项目进度
        public function projectRate()
        {
            $project_id = I('get.project_id'); //项目id
            $rate = M('projectrate')->where(array('sjy_project_id'=>$project_id))->select(); //项目进度
            $this->ajaxReturn($rate);
        }
        //下载项目书
        public function downloadProjectBook()
        {
            header("Content-type: text/html;charset=utf-8");
            $project_book_id = I("get.id");  //项目书id
            $down_info = M("project_book")->find($project_book_id);
            $file_name=$down_info['sjy_project_book_name'];
            //用以解决中文不能显示出来的问题 
            $file_name = time().strrchr($file_name,".");
            $file_path=".".$down_info['sjy_project_path'];
            //首先要判断给定的文件存在与否 
            if(!file_exists($file_path)){
                echo "没有该文件文件";
                return ;
            }
            $fp=fopen($file_path,"r");
            $file_size=filesize($file_path);
            //下载文件需要用到的头 
            header("Content-type: application/octet-stream");
            header("Accept-Ranges: bytes");
            header("Accept-Length:".$file_size);
            header("Content-Disposition: attachment; filename=".$file_name);
            //向浏览器返回数据 
            echo fread($fp,$file_size);
            fclose($fp);
            exit();
        }
	}
?>