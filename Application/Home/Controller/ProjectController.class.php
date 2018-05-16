<?php
	namespace Home\Controller;
	use Think\Controller;
    use Home\Controller\BaseController;
    use Home\Controller\UploadController;
	class ProjectController extends BaseController
	{
		//展示社区项目详情页
		public function displayCommunityProject()
		{
            
            $id=I('get.id'); //项目id
            //查看该项目是否正在进行，正在进行则不能发送项目书
            $project_status = M('community_project_info')->where(array('sjy_id'=>$id))->getField('sjy_community_project_status');
            $this->assign('project_status',$project_status); //项目状态
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
        //展示社会组织项目详情页
        public function displayOriganizationProject()
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
        //取得社会组织项目详情接口
        public function getOriganizationProject()
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
            $origanization_code = session('userInfo')['sjy_origanization_user_origanization_code']; //社会组织编码
            //查询各个进度各有多少
            //邀请我
            $where = array('origanization_id'=>$origanization_code,'status'=>0);
            $invitenNum = M('project')->where($where)->count();
            //投标中
            $where = array('origanization_id'=>$origanization_code,'status'=>1);
            $sendNum = M('project')->where($where)->count();
            //待开始
            $where = array('origanization_id'=>$origanization_code,'status'=>2);
            $waitStatNum = M('project')->where($where)->count();
            //执行中
            $where = array('origanization_id'=>$origanization_code,'status'=>array('between',array(10,98)));
            $ingNum = M('project')->where($where)->count();
            //结项申请中
            $where = array('origanization_id'=>$origanization_code,'status'=>99);
            $applyEndNum = M('project')->where($where)->count();

            $this->assign('invitenNum',$invitenNum); //邀请我
            $this->assign('sendNum',$sendNum); //投标中
            $this->assign('waitStatNum',$waitStatNum); //待开始
            $this->assign('ingNum',$ingNum); //进行中
            $this->assign('applyEndNum',$applyEndNum); //申请结项中
        	$this->display();
        }
        //社会组织发布的项目
        public function origanizationSendProject()
        {
            //社会组织id
            $origanization_code = I('get.origanization_code')?I('get.origanization_code'):null;
            if(empty($origanization_code))
            {
                $origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
            }
            $project_info = M('origanization_project_info')->where(array('sjy_origanization_id'=>$origanization_code))->select();
            foreach($project_info as $key=>$value)
            {
                $project_info[$key]['main_image'] = M('origanization_project_image')->where(array('sjy_origanization_project_id'=>$value['sjy_id']))->getField('sjy_origanization_project_image');
            }
            $this->ajaxReturn($project_info);
        }
        //邀请我
        public function invite()
        {
            $page = I('get.page')?I('get.page'):1; //页面
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
        		if($project_info['sjy_community_project_status']==0&&time()<=strtotime($project_info['sjy_community_project_collect
                    _end_time']))
        		{
        			 $info[$key]['status_desc'] = '投标期';
        		}else if($project_info['sjy_community_project_status']>=1||time()>strtotime($project_info['sjy_community_project_collect
                    _end_time'])){
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
            $origanization_code = I('get.origanization_code')?I('get.origanization_code'):null;
            if(empty($origanization_code))
            {
                $origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
            }
        	//[10,99] 正在执行中 其中99提交结项目申请
            $info = M('project')->where(array('origanization_id'=>$origanization_code,'status'=>array('between',[10,98])))->order('project_start_time desc')->select();
            
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
                $info[$key]['main_image'] = M('community_project_image')->where(array('sjy_community_project_id'=>$value['project_id']))->getField('sjy_community_project_image');
        	}
        	$this->ajaxReturn($info);
        }
        //社会组织结项申请中
        public function ingcommunityagreenend()
        {
            //社会组织id
            $origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
            
        	//[99] 正在执行中 其中99提交结项目申请
            $info = M('project')->where(array('origanization_id'=>$origanization_code,'status'=>99))->order('project_start_time desc')->select();
            
        	//查询项目详情
        	foreach($info as $key=>$value)
        	{
        		
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		$info[$key]['project_detail'] = $project_info;
        	}
        	$this->ajaxReturn($info);
        }
        //社会组织申请结项目
        public function endProjectApply()
        {
            $project_id = I('post.project_id'); //项目id
            $id = I('post.id');   //主键id sjy_project
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

        //社会组织已完成的项目
        public function completeProject()
        {
            $origanization_code = I('get.origanization_code')?I('get.origanization_code'):null;
            if(empty($origanization_code))
            {
        	   //社会组织id
        	   $origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
            }
        	//已完成的项目
        	$info = M('project')->where(array('origanization_id'=>$origanization_code,'status'=>100))->order('project_start_time desc')->select();
            // var_dump($info);die;
            //查询项目详情
        	foreach($info as $key=>$value)
        	{
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		$info[$key]['project_info'] = $project_info;
                $info[$key]['main_image'] = M('community_project_image')->where(array('sjy_community_project_id'=>$value['project_id']))->getField('sjy_community_project_image');
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
            $is_identify = session('userInfo')['sjy_origanization_user_isidentify'];
           
        	if(empty($origanization_code)||empty($is_identify))
        	{
        		$res['state'] = 2;
        		$res['errorInfo'] = '尚未认证或尚未加入机构，无法发送';
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
        //显示社会组织添加项目进度页面
        public function displayAddProjectRate()
        {
            $project_id = I('get.project_id');
            $this->assign('project_id',$project_id);
            $this->display();
        }
        //社会组织增加项目进度
        public function addProjectRate()
        {
            
            $project_id = I('post.project_id'); //项目id
            $rate_title = I('post.rate_title'); //进度标题
            $rate_desc = I('post.rate_desc'); //进度详细内容
            if(empty($rate_desc)||empty($rate_title))
            {
                return false;
            }
            $rate_img = $_FILES['rate_img'];
            $num = count($rate_img['name']);
            
            //七牛云图片上传类
            $uploadObj = new UploadController();
            $time = time();
            //检测图片是否合法
            for($i=0;$i<$num;$i++)
            {
                $flag = $i+1;
                
                //图片大小不得超过2M
                if($rate_img['size'][$i]>2097152)
                {
                    $this->ajaxReturn(array('state'=>0,'errorInfo'=>'第'.$flag.'张图大小超过2M'));
                }
                $file  = $rate_img['tmp_name'][$i];//文件名
                
                $type  = $this->getImagetype($file); 
                $filetype = ['jpg', 'jpeg', 'gif', 'bmp', 'png'];
                if (!in_array($type, $filetype))
                { 
                    $this->ajaxReturn(array('state'=>0,'errorInfo'=>'第'.$flag.'张图不是图片类型！'));
                }
                $file_name = $time.uniqid();
                $newpath = '/Uploads/origanization/project_rate/'.date('Y-m-d',$time).'/'.$file_name.'.'.$type;
                
                $uploadres = $uploadObj->singUpload($file,$newpath);

                if($uploadres)
                {
                    $imgpath[] = $newpath; 
                }
            
            }
            $rate_imgs = implode($imgpath,'||');
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
                $this->ajaxReturn(array('errorInfo'=>'填写成功','state'=>1)); //成功
            }else{
                $this->ajaxReturn(array('errorInfo'=>'填写失败,请重试','state'=>0)); //失败
            }
        }
        //发送项目书
	    public function file_upload($project_id,$project_info)
	    {
            //检测用户是否有所属机构是否认证如果没有，则不允许发送
            //社会组织id
            $origanization_id = session("userInfo")["sjy_origanization_user_origanization_code"];
            // //认证
            // $is_identify = session('userInfo')['sjy_origanization_user_isidentify'];
            // if(empty($origanization_id)||empty($is_identify))
            // {
            //     return array("state"=>6,"errorInfo"=>"尚未认证或尚未加入任何组织,无法发送");
            // }
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
	    	
	    	
	    	//将信息插入sjy_project表  首先去找有没有该条记录，有并且status=1，则不操作sjy_project表 除此之外则操作该表
	    	$isupload = M("project")->where(array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id))->find();
	    	$model = M();
            $model->startTrans();
	    	//需要新增 之前没有项目联系过
	    	if(empty($isupload))
	    	{
                //没找到
	    		$data["project_id"] = $project_id;
		    	$data["community_id"] = $community_id;
		    	$data["origanization_id"] = $origanization_id;
		    	$data['status'] = 1;  //已经发送项目书
                $data['send_project_book_time'] = date('Y-m-d H:i:s',time());  //项目书最后发送时间
	    		$res = M("project")->add($data);
	    	}else{
                //找到了
	    		//更新项目书发送时间 //最后时间
                if($isupload['status']==0)
                {
                    
                    $res = M('project')->where(array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id))->save(array("send_project_book_time"=>date('Y-m-d H:i:s',time()),'status'=>"1"));
                }else
                {
                    
                    $res = M('project')->where(array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id))->save(array("send_project_book_time"=>date('Y-m-d H:i:s',time())));
                }

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
            $community_code = session('userInfo')['sjy_community_user_community_code']; //社会组织编码
            //查询各个进度各有多少
            
            //征集中
            $where = array('community_id'=>$community_code,'status'=>1);
            $collectNum = M('project')->where($where)->count();
            //待开始
            $where = array('community_id'=>$community_code,'status'=>2);
            $waitStatNum = M('project')->where($where)->count();
            //执行中
            $where = array('community_id'=>$community_code,'status'=>array('between',array(10,98)));
            $ingNum = M('project')->where($where)->count();
            //结项申请中
            $where = array('community_id'=>$community_code,'status'=>99);
            $applyEndNum = M('project')->where($where)->count();
            
            $this->assign('collectNum',$collectNum); //征集中
            $this->assign('waitStatNum',$waitStatNum); //待开始
            $this->assign('ingNum',$ingNum); //进行中
            $this->assign('applyEndNum',$applyEndNum); //申请结项中
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
            $origanization_id = I('post.origanization_code');
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
                $this->ajaxReturn(array('state'=>2,'errorInfo'=>'该项目已邀请过该机构'));
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
                $this->ajaxReturn(array('state'=>3,'errorInfo'=>'该项目该机构已发送项目书'));
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
        //社区主动邀请页面显示
        public function displayCommunityTendPorject()
        {
            $origanization_code = I('get.origanization_id'); //社会组织id
            $origanization_name = M('origanization_base_info')->where(array('sjy_id'=>$origanization_code))->getField('sjy_origanization_name');
            $this->assign('origanization_name',$origanization_name);
            $this->assign('origanization_code',$origanization_code);
            $this->display();
        }
        //社区正在招标中的项目
        public function communityTenderProject()
        {
            $page = I('get.page')?I('get.page'):1; //页面
            $community_code = I('get.community_code')?I('get.community_code'):null;  //社区id是否传递
            $limit = 15;
            $start = ($page-1)*$limit; //开始
            $limit = $start.",".$limit;
            //在招标周期 且sjy_community_project_status=0的项目
            //社区id
            if(empty($community_code))
            {
                $community_code = session('userInfo')['sjy_community_user_community_code'];
            }
            //正在征集中
            $data = array(
                  "sjy_community_project_status"=>0,
                  "sjy_community_project_collect_start_time"=>array('elt',date('Y-m-d',time())),
                  'sjy_community_project_collect_end_time'=>array('egt',date('Y-m-d',time())) 
            );
            $info = M('community_project_info')->where($data)->limit($limit)->select();
            
            foreach($info as $key=>$value)
            {
                $imgs = M('community_project_image')->where(array('sjy_community_project_id'=>$value['sjy_id'],))->find();
                //根据项目id和社区id查询已经投递项目书的机构
                $data = array(
                       "community_id"=>$community_code,
                       'project_id'=>$value['sjy_id'],
                       'status'=>1
                );
                $nums = M('project')->where($data)->count();
                $info[$key]['origanization_nums'] = $nums;
                $info[$key]['main_imgs'] = $imgs['sjy_community_project_image'];
            }
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
        
        //查询社区正在执行中项目
        public function communityIngProject()
        {
            $community_id = I('get.community_code')?I('get.community_code'):null;  //社区id

            if(empty($community_id))
            {
                //社区id
                $community_id = session('userInfo')['sjy_community_user_community_code'];
                $status = array(10,98);
            }else{
                $status = array(10,99);
            }
            //查询该社区下正在进行的项目
            //[10,98] 正在执行中 其中99提交结项目申请
            $info = M('project')->where(array('community_id'=>$community_id,'status'=>array('between',$status)))->order('project_start_time desc')->select();
            //查询项目详情
             //查询项目详情
             foreach($info as $key=>$value)
             {
                 $project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
                 $info[$key]['project_info'] = $project_info;

                 $imgs = M('community_project_image')->where(array('sjy_community_project_id'=>$value['project_id'],))->find();
               
                 $info[$key]['main_imgs'] = $imgs['sjy_community_project_image'];
            
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
              $data['project_agreen_end_people_id'] = session('userInfo')['sjy_id'];
             
              $res = M('project')->where(array('sjy_id'=>$id))->save($data);
              //更改sjy_community_project表
              $val = M('community_project_info')->where(array('sjy_id'=>$project_id))->save(array('sjy_community_project_status'=>2));
              if($res&&$val)
              {
                 $model->commit();
                 $this->ajaxReturn(array('state'=>1,'errorInfo'=>''));
              }else{
                 $model->rollback();
                 $this->ajaxReturn(array('state'=>0,'errorInfo'=>'请重试'));
              }
              
        }
        //查询社区已完成的项目
        public function communityCompleteProject()
        {
            $community_code = I('get.community_code')?I('get.community_code'):null;
            if(empty($community_code))
            {
                //社会组织id
        	   $community_code = session('userInfo')['sjy_community_user_community_code'];
            }

           
        	//已完成的项目
        	$info = M('project')->where(array('community_id'=>$community_code,'status'=>100))->order('project_start_time desc')->select();
        	//查询项目详情
        	foreach($info as $key=>$value)
        	{
        		$project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
        		$info[$key]['project_info'] = $project_info;

                $imgs = M('community_project_image')->where(array('sjy_community_project_id'=>$value['project_id'],))->find();
               
                $info[$key]['main_imgs'] = $imgs['sjy_community_project_image'];
        	}
        	$this->ajaxReturn($info);
        }
        //查看项目进度
        public function projectRate()
        {
            $project_id = I('get.project_id'); //项目id
            $rate = M('projectrate')->where(array('sjy_project_id'=>$project_id))->order('create_time desc')->select(); //项目进度
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
        //根据项目id获得项目图片
        public function  getProjectMainImg()
        {
            $project_id = I('get.project_id');
            $imgs = M('community_project_image')->where(array('sjy_community_project_id'=>$project_id))->find();
            $this->ajaxReturn($imgs);
        }
        //根据项目id获取项目所有图片
        public function getProjectAllImg()
        {
            $project_id = I('get.project_id');
            $imgs = M('community_project_image')->where(array('sjy_community_project_id'=>$project_id))->select();
            $this->ajaxReturn($imgs);
        }
        //*判断图片上传格式是否为图片 return返回文件后缀
        public function getImagetype($filename)
        {
            $file = fopen($filename, 'rb');
            $bin = fread($file, 2); //只读2字节
            fclose($file);
            $strInfo = @unpack('C2chars', $bin);
            $typeCode = intval($strInfo['chars1'].$strInfo['chars2']);
            // dd($typeCode);
            $fileType = '';
            switch ($typeCode) {
                case 255216:
                $fileType = 'jpg';
                break;
                case 7173:
                $fileType = 'gif';
                break;
                case 6677:
                $fileType = 'bmp';
                break;
                case 13780:
                $fileType = 'png';
                break;
                default:
                $fileType = '只能上传图片类型格式';
            }
            // if ($strInfo['chars1']=='-1' AND $strInfo['chars2']=='-40' ) return 'jpg';
            // if ($strInfo['chars1']=='-119' AND $strInfo['chars2']=='80' ) return 'png';
            return $fileType;
        }
        
        //base64
        // public function base64()
        // {
        //     $base64_data = I('post.project_rate_images');
        //     $imgs = array();
        //     $filename = time();
        //     foreach ($base64_data as $key => $value) {
        //     $result = '';
        //     $filename++;
        //     $base64_image_content = $value;
        //     if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
        //     $type = $result[2];
        //     $new_file = "./Uploads/origanization/project_rate/".date('Ymd',time())."/";
      
        //             if(!file_exists($new_file))
        //             {
        //                     //检查是否有该文件夹，如果没有就创建，并给予最高权限
        //                       mkdir($new_file, 0700);
        //              }
        //              $new_file = $new_file.$filename.".{$type}";
        //              if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
        //                     $url = "/Uploads/origanization/project_rate/".date('Ymd',time())."/".$filename.".{$type}";
        //                     $imgs[$key] = $url;
        //             }
        //          }
        //     }
        // }
	}
?>