<?php
	namespace Home\Controller;
	use Think\Controller;
	use Home\Controller\BaseController;
	use Home\Controller\UploadController;
	class OriganizationController extends BaseController{
		public function __construct()
		{
			//检测社区已经同意的项目，并且已经到项目开始日期，但是社会组织没有主动点击开始项目，默认将该项目开始
			parent::__construct();
			if(isset(session('userInfo')['sjy_origanization_user_origanization_code']))
			{
				 $info = M('project')->where(array('status'=>2,'origanization_id'=>session('userInfo')['sjy_origanization_user_origanization_code']))->select();
				 foreach($info as $key=>$value)
				 {
					 //查询社会组织没有主动点击开始项目
					 $starttime = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->getField('sjy_community_project_start_time'); //项目计划开始时间
					 //当前时间大于项目开始时间
					 if(time()>=strtotime($starttime))
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
							 $res = M('project')->where(array('sjy_id'=>$value['sjy_id']))->save($data);
 
							//更新sjy_community_project_info表
							 // $data = array(
								// 	 "sjy_community_project_origanization"=>$value['origanization_id'],
								// 	 "sjy_community_project_origanization_name"=>M('origanization_base_info')->where(array('sjy_id'=>$value['origanization_id']))->getField('sjy_origanization_name')
							 // );
							 // $val = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->save($data);
 
							 //更新进度表 插入第一个信息
							 $rate['sjy_projectrate_title']= '项目开始';
							 $rate['sjy_project_id']= $value['project_id'];
							 $rate['sjy_project_rate_con']='开始做项目';
							 $rate['create_time'] = date('Y-m-d H:i:s');
							 $rate['sjy_origanization_id'] = $value['origanization_id'];
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
			}
		}
		//社区项目展示页
		public function index()
		{
			 //社区项目分类
			 $service_object = M('service_object')->select();
			 $this->assign('service_object',$service_object);
			 //项目总数
			 $project_num = M('community_project_info')->count();
			 $this->assign('project_num',$project_num);
			 //社区总数
			 $community_num = M('community_base_info')->count();
			 $this->assign('community_num',$community_num);
			 //社会组织总数
			 $origanization_num = M('origanization_base_info')->count();
			 $this->assign('origanization_num',$origanization_num);
		     $this->display();
		}
        //搜索 分页
        public function getprojectlist()
        {
          $page = I('get.page')==null?1:I('get.page'); //页码 默认第一页   
          $start = ($page-1)*10;                       //每页显示数量 10
            
	   	  //城市
     	  $cityid = session("cityid")==null?110000:session("cityid");
     	   //查询城市下社区发布项目信息;
          $project_info = M('community_project_info')->where(array('cityid'=>$cityid))->limit($start,10)->select();
          //根据项目信息查询社区信息
          foreach($project_info as $key=>$value)
          {
          	  //社区基本信息
           	  $community_info = M('community_base_info')->where(array('sjy_id'=>$value['sjy_community_id']))->find();
           	  //社区地址
           	  $address = M('community_position_info')->where(array('sjy_community_id'=>$value['sjy_community_id']))->find();
           	  //项目是否有图片(项目主图)
           	  //查询项目图片表
           	  $imgpath = M('community_project_image')->where(array('sjy_community_project_id'=>$value['sjy_id'],'main'=>1))->getField('sjy_community_project_image');
           	  //判断是否存在
           	  if(empty($imgpath))
           	  {
                 $imgpath = '/wefgerfrehb.jpg';
           	  } 
           	  $project_info[$key]['community_info']=$community_info;  //项目所属社区信息
           	  $project_info[$key]['address'] = $address;    //社区地址信息
           	  $project_info[$key]['project_image_path']=$imgpath;  //社区项目图片
           }
           $allprojectinfo = M('community_project_info')->where(array('cityid'=>$cityid))->count();
           $pages = ceil($allprojectinfo/10);  //总页码数
           //返回数据
           $res['pages'] = $pages; //总页码数
           $res['count'] = $allprojectinfo;
	       $res['data'] = $project_info;  //项目信息
	      
	       $this->ajaxReturn($res);
    
        }
        //选择城市
        public function changeProvice()
        {
        	$this->display();
        }
        //显示认证页面
        public function origanizationIdentify()
        {
        	//根据ip地址查询区号
			// $url = 'http://pv.sohu.com/cityjson?ie=utf-8';
			// $cityinfo = file_get_contents($url);
            //取出城市id
			// preg_match("/[0-9]{6}/", $cityinfo,$match);
			$cityid = session("cityid")==null?110000:session("cityid");
            
			//根据城市id查询区号
			$phonecode = M('cities')->where(array('cityid'=>$cityid))->getField('phonecode');
            // var_dump($phonecode);die;
			$this->assign('phonecode',$phonecode);
            //社会组织服务领域
            $service_area = M('origanization_type')->select();
            $this->assign('service_area',$service_area);
        	$this->display();
        }
		//执行社会组织认证
		public function doOriganizationIdenty()
		{
			$doc = new \XSDocument();//迅搜文档对象
			//接收社会组织认证参数
			$origanization_name = I("post.origanization_name");  //社会组织名字
			$province = I("post.province");             //社会组织所在省份
			$city = I("post.city");                     //社会组织所在城市
			$area = I("post.area");                     //社会组织所在区
			//判断是否是直辖市
			$municipality = array("110000","120000","310000","500000");//北京，天津，上海，重庆 
			if(in_array($province,$municipality))
			{
				$area = $city;
				$city = $province;
			}
			$address = I("post.address");               //社会组织地址

	        $origanization_telephone  = I("post.telephone");                  //社会组织联系电话
	        //电话号码非空
	        if(!empty($origanization_telephone))
	        {
	        	 //电话号码 区号-电话号
	        	$tel_code = I('post.tel_code');  //电话区号
                $origanization_telephone = $tel_code."-".$origanization_telephone;
	        }else{
	        	$origanization_telephone = '';
	        }
	        $manger_name = I("post.manger_name");              //运营人员姓名
	        $id_number = I("post.id_number");       //运营人员身份证号
	        $origanization_type = I("post.origanization_type");   //社会组织类型
            //接收社会组织营业执照图片
            $business_licence_img = I('post.business_licence_img');
            $logo_img = I('post.logo_img');//logo照片

	        //非空验证
	          //初始化返回变量
	        $ret["state"] = 0;
	        //检测非空项
	        if(empty($origanization_name))
	        {
	            $ret["errorInfo"] = "社会组织名字没有填写";
	        }
	        if(empty($business_licence_img))
	        {
	        	$ret['errorInfo'] = '营业执照未上传';
	        }
	        if(empty($logo_img))
	        {
	        	$ret['errorInfo'] = 'logo未上传';
	        }
	        if(empty($origanization_telephone))
	        {
	            $ret["errorInfo"] = "社会组织固定电话未填写";
	        }
	        if(empty($province)||empty($city)||empty($area)||empty($address))
	        {
	            $ret["errorInfo"] = "请补全社会组织地址信息";
	        }
	        if(empty($manger_name))
	        {
	            $ret["errorInfo"] = "请填写社会组织运营者姓名";
	        }
	         if(empty($id_number))
	        {
	            $ret["errorInfo"] = "请填写社会组织运营者身份证号";
	        }
	        //检测社会组织名字是否重复
	        if(!$this->checkOriganizationName($origanization_name))
	        {
	            $ret["errorInfo"] = "社会组织名字重复";
	        }
            //检测身份证号是否重复 在社区用户表和社会组织用户表检测
            if(!$this->checkidnumber($id_number))
            {
            	$ret["errorInfo"] = "该身份证号已被使用";
            }

            //logo
            $time = time();
            $base64 = explode('base64,',$logo_img)[1];
            //文件名
            $path = '/Uploads/origanization/logo_img/'.date('Y-m-d',$time).'/'.$time.uniqid();
            $uploadObj = new UploadController();
            $base64res = $uploadObj->base64Upload($base64,$path);
            if($base64res)
            {
                 $imgpath = $path; //项目主图
                 //添加到数据库
                 $base_info['sjy_origanization_logo_img_path'] = 'http://p33g9t7dr.bkt.clouddn.com/'.$imgpath;
            }else{
                $ret["errorInfo"] = "logo上传出错,请重试";
            }
	        //如果数据有错则不执行插入
	        if(!empty($ret["errorInfo"]))
	        {
	            $this->ajaxReturn($ret);
	            die;
	        }
            //执行图片上传

            

            //社会组织营业执照,社会组织logo

            $base64_data = array($business_licence_img);                     
	        foreach ($base64_data as $key => $value) {
	            $base64_image_content = $value;
	            if($key==0)
	            {
	            	$folder = 'business_licence_img';  //营业执照照片存放地址
	            }else{
	            	// $folder = 'logo_img';         //logo存放地址
	            }            
                if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                                 $type = $result[2];
                                 $new_file = "./Uploads/origanization/".$folder."/".date('Ymd',time())."/";

                                 if(!file_exists($new_file))
                                 {
                                        //检查是否有该文件夹，如果没有就创建，并给予最高权限
                                          mkdir($new_file, 0700);
                                 }
                                 $new_file = $new_file.time().".{$type}";
                                 if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                                     $imgpath = "/Uploads/origanization/".$folder."/".date('Ymd',time())."/".time().".{$type}";  
                                      if($key==0)
                                       {
                                        	 $base_info['sjy_origanization_business_licence_path'] = $imgpath;  //社会组织营业执照图片
                                        }else{
                                        	 // $base_info['sjy_origanization_logo_img_path'] = $imgpath;  //社会组织logo图片
                                        }          
                                }
                         }
                    }
	        //开启事务 执行插入 更新
            $model = M();
            $model->startTrans();
	        $user = M("origanization_user_info");
	        //社会组织基本信息
	        $origanization_base_info = M("origanization_base_info");
	        $base_info["sjy_origanization_name"] = $origanization_name;  //社会组织名字
	        $base_info["sjy_origanization_type"] = $origanization_type; //社会组织类型
	        $base_info["sjy_origanization_phone"] = $origanization_telephone;   //社会组织固定电话
	        $base_info['sjy_origanization_isidentify'] = 1;                 //社会组织已认证
	        $base_info['sjy_origanization_admin_id'] = session('userInfo')['sjy_id'];  //管理者id
	        $base_info['sjy_origanization_register_time'] = date("Y-m-d H:i:s",time()); //注册时间
	        $base_info['sjy_origanization_type_name'] = M('origanization_type')->where(['sjy_id'=>$origanization_type])->getField('sjy_origanization_type_name');     //社会组织类型汉字
	        //插入社会组织基本信息，并取得社会组织自增id
	        $origanization_id = $origanization_base_info->add($base_info);


	        $origanization_base_info->where(array("sjy_id"=>$origanization_id))->save(array("sjy_origanization_code"=>$origanization_id));

	        //写入社会组织地理信息
	        $province_name = M("provinces")->where(array("provinceid"=>$province))->getField("province");
        	$city_name = M("cities")->where(array("cityid"=>$city))->getField("city");
        	$area_name = M("areas")->where(array("areaid"=>$area))->getField("area");
	        $origanization_position_info = M("origanization_position_info");
	        $position_info["sjy_origanization_province"] = $province;
	        $position_info["sjy_origanization_province_name"] = $province_name;
	        $position_info["sjy_origanization_city"] = $city;
	        $position_info['sjy_origanization_city_name'] = $city_name;
	        $position_info["sjy_origanization_area"] = $area;
	        $position_info['sjy_origanization_area_name'] = $area_name;
	        $position_info["sjy_origanization_address"] = $address;
	        $position_info["sjy_origanization_id"] = $origanization_id;

	        $origanization_position = $origanization_position_info->add($position_info);

	        // 更改社会组织管理者用户信息
	        $user_info["sjy_origanization_user_real_name"] = $manger_name;
	        $user_info["sjy_origanization_user_origanization_code"] = $origanization_id;
	        // //将其角色改为社会组织管理者
	        $user_info["sjy_origanization_user_role"] = 3;
	        //管理者身份证号
	        $user_info['sjy_origanization_user_id_card'] = $id_number;
	        $user_info['sjy_origanization_user_isidentify'] = 1;   //认证
	        $userinfores = $user->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->save($user_info);
	        //如果都成功则提交事务
	        if($origanization_id&&$origanization_position&&$userinfores)
	        {
	            $model->commit();
	            $ret["state"] = 1;
	            $ret['errorInfo'] = '';
	            //社会组织信息进入搜索服务
                $xs = new \XS('origanization');
                //项目id,项目标题 项目主图，项目所属社区名字 项目服务领域 服务领域id,项目需求简介，项目所在省市区，项目征集时间,项目开始时间，项目状态
                $search_data = array('sjy_id'=>$origanization_id,'sjy_origanization_name'=>$origanization_name,'sjy_origanization_type_id'=>$origanization_type,'sjy_origanization_type_name'=>$base_info['sjy_origanization_type_name'],'sjy_origanization_city_id'=>$city,'sjy_origanization_city_name'=>$city_name,'sjy_origanization_area_name'=>$area_name,'sjy_origanization_logo_img_path'=>$base_info['sjy_origanization_logo_img_path']);
                $doc->setFields($search_data);
                $xs->index->add($doc);
	            $this->ajaxReturn($ret);   //认证成功
	        }
	        else
	        {
	            $model->rollback();
	            $ret['errorInfo'] = '系统错误,请联系管理员';
	            $this->ajaxReturn($ret);  //认证失败
	        }


		}

		//社会组织名字不能重复
		public function checkOriganizationName($origanization_name)
		{
			  	$origanization_base_info = M("origanization_base_info");
		        $res = $origanization_base_info->where(array("sjy_origanization_name"=>$origanization_name))->find();
		        if(!empty($res))
		        {
		            //社会组织名字重复
		            return false;
		        }
		        else
		        {
		            //社会组织名字没有重复
		            return true;
		        }
		}
		//执行个人社工人认证
		public function doOriganizationPersonIdenty()
		{
			$ret["state"] = 0;
			$ret['errorInfo'] = '';
	        $data["sjy_origanization_user_real_name"] = I("post.real_name");  //用户真实姓名
	        $data["sjy_origanization_user_id_card"] = I("post.id_card");   //用户身份证号
	        $data['sjy_origanization_id_card_img'] = I('post.id_card_img'); //社工手持身份证号
	        $data['sjy_origanization_staff_identify_img'] = I('post.staff_img'); //社工证明图片
	        $data['sjy_origanization_user_wechat'] = I('post.wechat'); //社工微信号
            if(empty($data["sjy_origanization_user_real_name"]))
            {
            	$ret['errorInfo'] = '姓名不能为空';
            }
            if(empty($data["sjy_origanization_user_id_card"]))
            {
            	$ret['errorInfo'] = '身份证号不能为空';
            }
            if(empty($data['sjy_origanization_id_card_img']))
            {
            	$ret['errorInfo'] = '手持身份证照片未上传';
            }
            if(empty($data['sjy_origanization_staff_identify_img']))
            {
            	$ret['errorInfo'] = '社工证明未上传';
            }
             //检测身份证号是否重复 在社区用户表和社会组织用户表检测
            if(!$this->checkidnumber($data["sjy_origanization_user_id_card"]))
            {
            	$ret["errorInfo"] = "该身份证号已被使用";
            }
            //如果数据有错则不执行插入
	        if(!empty($ret["errorInfo"]))
	        {
	            $this->ajaxReturn($ret);
	            die;
	        }
	          //上传照片
             $base64_data = array($data['sjy_origanization_id_card_img'],$data['sjy_origanization_staff_identify_img']);
             foreach ($base64_data as $key => $value) {
              $base64_image_content = $value;
              if($key==0)
              {
                $folder = 'id_card';  //身份证照存放地址
              }else{
                $folder = 'staff_identify';   //社工证明照片存放地址      
              }            
              if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                                 $type = $result[2];
                                 $new_file = "./Uploads/origanization/".$folder."/".date('Ymd',time())."/";

                                 if(!file_exists($new_file))
                                 {
                                        //检查是否有该文件夹，如果没有就创建，并给予最高权限
                                          mkdir($new_file, 0700);
                                 }
                                 $new_file = $new_file.time().".{$type}";
                                 if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                                        $imgpath = "/Uploads/origanization/".$folder."/".date('Ymd',time())."/".time().".{$type}";
                                        if($key==0)
                                        {
                                        	$data['sjy_origanization_id_card_img'] = $imgpath;
                                        }else{
                                        	$data['sjy_origanization_staff_identify_img'] = $imgpath;
                                        }
                                 
                                }
                         }
                    }
	        $data["sjy_origanization_user_isidentify"] = 1;  //认证
	        $data["sjy_origanization_user_role"] = 5;    //普通个人社工
	        $res = M("origanization_user_info")->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->save($data);
	        if($res)
	        {
	            $ret["state"] = 1;
	            $ret['errorInfo'] = ''; 
	        }else{
	        	$ret["state"] = 0;
	            $ret['errorInfo'] = '请联系管理员'; 
	        }
	        $this->ajaxReturn($ret);
		}
		//社会组织发布项目
		public function send_project()
		{
			//服务对象
			$service_object = M("service_object")->select();
			$this->assign("service_object",$service_object);
			$origanization_desc = M('origanization_base_info')->where(array('sjy_id'=>session('userInfo')['sjy_origanization_user_origanization_code']))->getField('sjy_origanization_introduce');
			$this->assign('origanization_desc',$origanization_desc);
			$this->display();
		}
		//执行项目插入
	    public function doSendProject()
	    {
	    	
	        $ret["state"] = 0;
			$ret['errorInfo'] = '';
			$type = I('post.type'); //项目类型
            if(empty($type))
            {
            	$ret['errorInfo'] = '请选择项目类型';
            	$this->ajaxReturn($ret);
	            die;
            }
			
	        //接收数据
	        $project_name = I("post.project_name");  //项目名字
	        $server_area = I("post.server_area");  //项目服务领域 
	        $demand_describe=I("post.demand_describe");  //项目需求简介
	      
	        $plan_money = I('post.plan_money')&&($type==1||$type==2)?I('post.plan_money'):''; //项目预算
			$data['start_time'] = I("post.start_time")?I('post.start_time'):'';  //项目开始时间
			$data['danwei'] = I('post.danwei')?I('post.danwei'):''; //单位 1月 2年
			$data['project_background'] = I('post.project_background')?I('post.project_background'):''; //项目背景
			$data['project_goal'] = I('post.project_goal')?I('post.project_goal'):''; //项目目标及意义
			$data['project_experience'] = I('post.project_experience')&&($type==1||$type==2)?I('post.project_experience'):'';//已有基础及经验
			$data['project_way'] = I('post.project_way')?I('post.project_way'):'';//具体方法及途径
			$data['project_rate_plan'] = I('post.project_rate_plan')&&$type==2?I('post.project_rate_plan'):'';//实施进度及安排
			$data['project_desired_result'] = I('post.project_desired_result')?I('post.project_desired_result'):''; //预期效果
			$data['project_range'] = I('post.project_range')&&($type==2||$type==3)?I('post.project_range'):''; //涵盖范围及规模
			$data['project_innovate'] = I('post.project_innovate')&&($type==2||$type==3)?I('post.project_innovate'):'';//创新之处
	        


	        //非空校验
	        if(empty($project_name))
	        {
	            $ret["errorInfo"] = "项目名字不能为空";
	        }
	        if(empty($server_area))
	        {
	            $ret["errorInfo"] = "项目服务领域不能为空";
	        }
	        if(empty($demand_describe))
	        {
	            $ret["errorInfo"] = "项目说明不能为空";
	        }
	        if(empty($plan_money)&&($type==1||$type==2))
	        {
	            $ret["errorInfo"] = "项目预算不能为空";
			}
			if(empty($data['project_background']))
	        {
	            $ret["errorInfo"] = "项目项目背景不能为空";
	        }
	        if(empty($data['project_goal']))
	        {
	            $ret["errorInfo"] = "项目目标及意义不能为空";
	        }
	        if(empty($data['project_experience'])&&($type==1||$type==2))
	        {
	            $ret["errorInfo"] = "已有基础及经验不能为空";
	        }
	        if(empty($data['project_way']))
	        {
	            $ret["errorInfo"] = "项目具体方法及途径不能为空";
			}
			if(empty($data['project_rate_plan'])&&$type==2)
	        {
	            $ret["errorInfo"] = "项目实施进度及安排不能为空";
	        }
	        if(empty($data['project_desired_result']))
	        {

	            $ret["errorInfo"] = "项目预期效果不能为空";
	        }
	        if(empty($data['project_range'])&&($type==2||$type==3))
	        {
	            $ret["errorInfo"] = "项目涵盖范围及规模不能为空";
	        }
	        if(empty($data['project_innovate'])&&($type==2||$type==3))
	        {
	        	
	            $ret["errorInfo"] = "项目创新之处不能为空";
	        }
	        //如果出错，返回
	        if(!empty($ret["errorInfo"]))
	        {
	            $this->ajaxReturn($ret);
	            die;
	        }
	          $time = time();
             //插入项目图片
            //七牛云图片上传 
            $uploadObj = new UploadController();
            //项目主图 主图 base64格式 
            $main_image = I('post.main_image');
            if($main_image)
            {
	            $base64 = explode('base64,',$main_image)[1];
	            //文件名
	            $path = '/Uploads/origanization/projectimg/'.date('Y-m-d',$time).'/'.$time.uniqid();
	            $base64res = $uploadObj->base64Upload($base64,$path);
	            if($base64res)
	            {
	               $projectimg[] = $path; //项目主图
	            }else{
	                $this->ajaxReturn(array('state'=>0,'errorInfo'=>'项目主图上传失败,请重试！'));
	            }
	        }else{
	        	    $path = M('origanization_base_info')->where(array('sjy_id'=>session("userInfo")['sjy_origanization_user_origanization_code']))->getField('sjy_origanization_logo_img_path');
	        	    $projectimg[] = $path; //项目主图
	        }

            //项目相册
            //检测图片是否合法
            $project_images = $_FILES['project_images'];
            $num = count($project_images['name']);
            for($i=0;$i<$num;$i++)
            {
                $flag = $i+1;
                
                //图片大小不得超过2M
                if($project_images['size'][$i]>2097152)
                {
                    $this->ajaxReturn(array('state'=>0,'errorInfo'=>'第'.$flag.'张图大小超过2M'));
                }
                $file  = $project_images['tmp_name'][$i];//文件名
                
                $type  = $this->getImagetype($file); 
                $filetype = ['jpg', 'jpeg', 'gif', 'bmp', 'png'];
                if (!in_array($type, $filetype))
                { 
                    $this->ajaxReturn(array('state'=>0,'errorInfo'=>'第'.$flag.'张图不是图片类型！'));
                }
                $file_name = $time.uniqid();
                $newpath = '/Uploads/origanization/projectimg/'.date('Y-m-d',$time).'/'.$file_name.'.'.$type;
                
                $uploadres = $uploadObj->singUpload($file,$newpath);


                if($uploadres)
                {
                    $projectimg[] = $newpath; 
                }
            
            }
	        //项目所属社区id
	        $origanization = M("origanization_user_info")->where(array("sjy_id"=>session("userInfo")['sjy_id']))->getField("sjy_origanization_user_origanization_code");
	    
	        $model = M();
            $model->startTrans();
	    //换取项目服务对象
	        $server_area_name = M("service_object")->where(array("sjy_id"=>$server_area))->getField("service_object_name");
	        $data["sjy_origanization_id"] = $origanization;  //社区id
	        $data['sjy_origanization_name'] = M('origanization_base_info')->where(array("sjy_id"=>$origanization))->getField('sjy_origanization_name'); //社区名字
	        $data["sjy_origanization_project_title"] = $project_name;  //项目名字
	        $data["sjy_origanization_project_service_area"] = $server_area_name;  //项目服务领域
	        $data["sjy_origanization_project_service_area_id"] = $server_area;  //项目服务领域id
	        $data["sjy_origanization_project_info"] = $demand_describe;  //项目详情简介
	        $data['sjy_origanization_project_type'] = I('post.type'); //社会组织发布的项目类型  1申请项目 2 当前项目 3 历史项目
	        // $data["sjy_origanization_project_collect_start_time"] = $collect_start_time; //项目开始收集时间
	        // $data["sjy_origanization_project_collect_end_time"] = $collect_end_time;    //项目结束收集时间
	        
	        $data['sjy_origanization_project_plan_money'] = $plan_money;  //项目预算
	        $data['sjy_origanization_project_send_prople_id'] = session('userInfo')['sjy_id'];//发布人id
	        $data['sjy_origanization_project_send_prople_name'] = session('userInfo')['sjy_origanization_user_real_name'];//发布人名字
	        $data['sjy_origanization_project_send_time'] = date('Y-m-d H:i:s',time());//发布时间
	        //发布城市
	        $city = M('origanization_position_info')->where(['sjy_origanization_id'=>$origanization])->getField('sjy_origanization_city');
			$data['sjy_origanization_project_cityid'] = $city;

            
	        $res = M("origanization_project_info")->add($data);
	        

	         //插入项目图片
	         foreach ($projectimg as $key => $value) {
               $project_image[] = array('sjy_origanization_project_id'=>$res,'sjy_origanization_project_image'=>$value);
            }
            //插入项目图片
            //插入项目图片
            if(!empty($project_image))
            {
            	$rut = M('origanization_project_image')->addAll($project_image);
            }else{
                $rut = 1;
            }
            
	         if($res&&$rut)
            {
                $model->commit();
                $ret["state"] = 1;
                $ret['errorInfo'] = '发布成功';
            }else{
                $model->rollback();
                $ret["errorInfo"] = "发布失败,请重试";
            }
            $this->ajaxReturn($ret);
	    }
	   
	  
	    //社区项目进度接口 进度图片
	    public function getcommunityprojectrate()
	    {
	    	$id = I("get.id"); //项目id
	    	//查询该条项目信息
       	    $projectinfo = M("community_project_info")->where(array("sjy_id"=>$id))->find();
       	    if(!empty($projectinfo))
       	    {
	            //项目进度信息
	            $rateinfo = M('projectrate')->where(array('sjy_project_id'=>$id))->order(array('create_time'=>'desc'))->select();
	            //进度图片设置
	            foreach($rateinfo as $key=>$value)
	            {
	            	$rateinfo[$key]['sjy_project_rate_image'] = explode("||",$value); //大图=小图
	            }
            
                //项目发布信息加入项目进度表
       	    	$info = array("sjy_id"=>0,'sjy_projectrate_title'=>'项目发布',"sjy_project_rate_con"=>'项目征集中:'.$projectinfo['sjy_community_project_collect_start_time']."~".$projectinfo['sjy_community_project_collect_end_time'],"create_time"=>$projectinfo['sjy_community_project_send_time'],'sjy_project_rate_image'=>"");
       	    	array_unshift($rateinfo,$info);
       	    }
       	    else{
       	    	$rateinfo = array();
       	    }
            $this->ajaxReturn($rateinfo);
	    }
        //查看社区正在进行的项目
        public function getcommunityingproject()
        {
        	$page = I('get.page')==null?1:I('get.page'); //页码 默认第一页    
            //分页 每页15条
            $id = I('get.id');  //社区id
            
	    	$limit = 15;
	    	//每页开始下标
	    	$start = ($page-1)*$limit; 
	    	$limit = $start.",".$limit;
            //正在进行中的项目
	    	$project_info = M('community_project_info')->where(array("sjy_community_id"=>$id,"sjy_community_project_status"=>1))->select();
	    	//项目主图
	    	foreach($project_info as $key=>$value)
	    	{
	    		$main_image = M('community_project_image')->where(array('sjy_community_project_id'=>$value['sjy_id']))->getField('sjy_community_project_image');
	    		$project_info[$key]['project_images'] = $main_image; 
	    	}
	    	$pages = M('community_project_info')->where(array("sjy_community_id"=>$id,"sjy_community_project_status"=>1))->count();
	    	 //返回数据
            $res['pages'] = ceil($pages/15); //总页码数
	        $res['data'] = $project_info;  //项目信息
	    	$this->ajaxReturn($res);
        }
        //查看社区历史项目
        public function getcommunityoldproject()
        {
        	$page = I('get.page')==null?1:I('get.page'); //页码 默认第一页    
            //分页 每页15条
            $id = I('get.id');  //社区id
            
	    	$limit = 15;
	    	//每页开始下标
	    	$start = ($page-1)*$limit; 
	    	$limit = $start.",".$limit;
            //正在进行中的项目
	    	$project_info = M('community_project_info')->where(array("sjy_community_id"=>$id,"sjy_community_project_status"=>2))->select();
	    	//项目主图
	    	foreach($project_info as $key=>$value)
	    	{
	    		$main_image = M('community_project_image')->where(array('sjy_community_project_id'=>$value['sjy_id']))->getField('sjy_community_project_image');
	    		$project_info[$key]['project_images'] = $main_image; 
	    	}
	    	$pages = M('community_project_info')->where(array("sjy_community_id"=>$id,"sjy_community_project_status"=>2))->count();
	    	 //返回数据
            $res['pages'] = ceil($pages/15); //总页码数
	        $res['data'] = $project_info;  //项目信息
	    	$this->ajaxReturn($res);
        }
	    //发送项目书
	    function file_upload()
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
	    	$community_id = I("post.community_id");
	    	//发送者id
	    	$userId = session("userInfo")["sjy_id"];
	    	//发送时间
	    	$time = date("Y-m-d H:i:s");
	    	//项目id
	    	$project_id = I("post.project_id");
	    	//社会组织id
	    	$origanization_id = session("userInfo")["sjy_origanization_user_origanization_code"];
	    	// var_dump(session("userInfo"));die;
	    	// $origanization_id = M("origanization_base_info")->where(array("sjy_origanization_code"=>$origanization_id))->getField("sjy_id"); 

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
	    		$res = M("project")->where(array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id))->save(array("status"=>1));
	    	}

	    	
	    	//将信息插入项目书表
	    	$param['sjy_project_id'] = $project_id;
	    	$param['sjy_project_send_id'] = $userId; 
	    	$param['sjy_origanization_id'] = $origanization_id;
	    	$param['sjy_community_id'] = $community_id;
	    	$param['sjy_project_book_send_time'] = $time;
	    	$param['sjy_project_path'] = $path;
	    	$param['sjy_project_book_name'] = $filename;
                $param['project_book_send_people'] = session('userInfo')['sjy_origanization_user_real_name'];  //项目书发送者
            $param['project_book_send_people_id'] = session('userInfo')['sjy_id'];  //发送者id
                         
	    	$val = M('project_book')->add($param);

	    	
	    	$this->ajaxReturn(array("state"=>1,"msg"=>"发送成功"));
	    	
	   		
	    }

	    //升级我的机构
	    public function updateOriganizationInfo()
	    {
	    	
            
            $ret['state'] = 0;
            $ret['errorInfo'] = '';
            //开启事务
	        $model = M();
	        $model->startTrans();
            //机构id
            $origanization_code = session("userInfo")["sjy_origanization_user_origanization_code"];
	    	$phone = I("post.phone");  //固定电话
	    	$introduce = I("post.introduce");  //社区简介
			$tel_code = I('post.tel_code'); //区号
			$origanization_name = I('post.origanization_name');
			if(empty($origanization_name))
			{
				$ret['errorInfo'] = '机构名称不能为空';
				$this->ajaxReturn($ret);
			}
            $origanizationInfo = M("origanization_base_info")->where(array("sjy_id"=>$origanization_code))->find();
            if(!empty($phone))
            {
                $telphone = $tel_code."-".$phone;
            }else{
                $telphone = "";
            }
            $editInfo = array();
            if($origanization_name!=$origanizationInfo['sjy_origanization_name'])
            {
                $editInfo['sjy_origanization_name'] = $origanization_name;
            }
            if($telphone!=$origanizationInfo['sjy_origanization_phone'])
            {
                $editInfo['sjy_origanization_phone'] = $telphone;
            }
            if($introduce != $origanizationInfo['sjy_origanization_introduce'])
            {
                $editInfo['sjy_origanization_introduce'] = $introduce;
            }
            
            $editInfo['updatetime'] = time();
            //更改机构基本信息
            $res = M("origanization_base_info")->where(array("sjy_id" => $origanization_code))->save($editInfo);
            
            
            //更改地址信息
            $province = I("post.province");             //社会组织所在省份
            $city = I("post.city");                     //社会组织所在城市
            $area = I("post.area");                     //社会组织所在区
            //判断是否是直辖市
            $municipality = array("110000","120000","310000","500000");//北京，天津，上海，重庆
            if(in_array($province,$municipality))
            {
                $area = $city;
                $city = $province;
            }
            $address = I("post.address");               //社会组织地址
            //写入社会组织地理信息
            $province_name = M("provinces")->where(array("provinceid"=>$province))->getField("province");
            $city_name = M("cities")->where(array("cityid"=>$city))->getField("city");
            $area_name = M("areas")->where(array("areaid"=>$area))->getField("area");
            $origanization_position_info = M("origanization_position_info");
            $position_info["sjy_origanization_province"] = $province;
            $position_info["sjy_origanization_province_name"] = $province_name;
            $position_info["sjy_origanization_city"] = $city;
            $position_info['sjy_origanization_city_name'] = $city_name;
            $position_info["sjy_origanization_area"] = $area;
            $position_info['sjy_origanization_area_name'] = $area_name;
            $position_info["sjy_origanization_address"] = $address;
            $position_info['updatetime'] = time();
            $val = $origanization_position_info->where(array("sjy_origanization_id"=>$origanization_code))->save($position_info);
            if($res&&$val)
			{
				$ret['state'] = 1;
				$model->commit();
			}else{
            	$ret['errorInfo'] = '修改失败，请重试';
            	$model->rollback();
			}
			$this->ajaxReturn($ret);

	    }
	    //获得机构风采图
		public function getoriganizationimgs()
		{
            $images = M('origanization_images')->where(array('sjy_origanization_code'=>session('userInfo')['sjy_origanization_user_origanization_code']))->getField('sjy_origanization_images');
            $this->ajaxReturn($images);
		}
		//获得社会组织logo
		public function getoriganizationlogo()
		{
			$images = M('origanization_base_info')->where(array('sjy_origanization_code'=>session('userInfo')['sjy_origanization_user_origanization_code']))->getField('sjy_origanization_logo_img_path');
            $this->ajaxReturn($images);
		}
	    //升级机构风采图片
        public function uploadoriganizationimgs()
        {   
			
			$img = $_FILES['file']; //社会组织风采
           
			$time = time();
			
			if($img['size']>2097152)
			{
				$this->ajaxReturn(array('code'=>0,'msg'=>'机构风采图片超过2M'));
			}
			$file  = $img['tmp_name'];//文件名
			
			$type  = $this->getImagetype($file); 
			$filetype = ['jpg', 'jpeg', 'gif', 'bmp', 'png'];
			if (!in_array($type, $filetype))
			{ 
				$this->ajaxReturn(array('code'=>0,'msg'=>'机构风采图片类型错误'));
			}
			// $file_name = $time.uniqid();

		    
			// $newpath = '/Uploads/origanization/fengcai/'.date('Y-m-d',$time).'/'.$file_name.'.'.$type;
			
			$setting=C('UPLOAD_SITEIMG_QINIU');
		    $Upload = new \Think\Upload($setting);

		    $uploadres = $Upload->upload($_FILES);
		    
			//七牛云图片上传类
   //          $uploadObj = new UploadController();
			// $uploadres = $uploadObj->singUpload($file,$newpath);
			
			//上传成功
			if($uploadres)
			{
				$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
				$hasImg = M('origanization_images')->where(array('sjy_origanization_code'=>$origanization_code))->find();
				if(!empty($hasImg))
				{
					$val = M('origanization_images')->where(array('sjy_id'=>$hasImg['sjy_id']))->save(array('sjy_origanization_images'=>$uploadres['file']['url']));
				}else{
                    $val = M('origanization_images')->add(array('sjy_origanization_images'=>$uploadres['file']['url'],'sjy_origanization_code'=>$origanization_code));
				}

				if($val)
				{
					$this->ajaxReturn(array('code'=>0,'msg'=>'上传成功'));
				}
				else{
					$this->ajaxReturn(array('code'=>1,'msg'=>'请重试'));
				}
			}else{
					$this->ajaxReturn(array('code'=>1,'msg'=>'请重试'));
			}
        }
         //升级机构logo
        public function uploadoriganizationlogo()
        {   
			
			$img = $_FILES['logo']; //社会组织风采
           
            //七牛云图片上传类
            // $uploadObj = new UploadController();
			$time = time();
			
			if($img['size']>2097152)
			{
				$this->ajaxReturn(array('code'=>0,'msg'=>'logo图片超过2M'));
			}
			$file  = $img['tmp_name'];//文件名
			
			$type  = $this->getImagetype($file); 
			$filetype = ['jpg', 'jpeg', 'gif', 'bmp', 'png'];
			if (!in_array($type, $filetype))
			{ 
				$this->ajaxReturn(array('code'=>0,'msg'=>'logo图片类型错误'));
			}
			// $file_name = $time.uniqid();
			// $newpath = '/Uploads/origanization/logo/'.date('Y-m-d',$time).'/'.$file_name.'.'.$type;
			

			$setting=C('UPLOAD_SITEIMG_QINIU');
		    $Upload = new \Think\Upload($setting);

		    $uploadres = $Upload->upload($_FILES);
			// $uploadres = $uploadObj->singUpload($file,$newpath);
			
			//上传成功
			if($uploadres)
			{
				$origanization_code = session('userInfo')['sjy_origanization_user_origanization_code'];
				
                $val = M('origanization_base_info')->where(array('sjy_id'=>$origanization_code))->save(array('sjy_origanization_logo_img_path'=>$uploadres['logo']['url']));
				

				if($val)
				{
					$this->ajaxReturn(array('code'=>0,'msg'=>'上传成功'));
				}
				else{
					$this->ajaxReturn(array('code'=>1,'msg'=>'请重试'));
				}
			}else{
				    $this->ajaxReturn(array('code'=>1,'msg'=>'请重试'));
			}
        }
        //账号设置页面
        public function personInfo()
        {
        	$this->display();
        }
	    //修改个人头像
        public function douploadtouxiang()
        {
            //接到base64格式图片
            $time = time();
            $base64_image_content = I("post.img");
            $base64 = explode('base64,',$base64_image_content)[1];
            //文件名
            $path = '/Uploads/origanization/touxiang/'.date('Y-m-d',$time).'/'.$time.uniqid();
            $uploadObj = new UploadController();
            $base64res = $uploadObj->base64Upload($base64,$path);
            if($base64res)
            {
                 $touxiang = $path; //项目主图
                 //添加到数据库
                 $res = M('origanization_user_info')->where(array('sjy_id'=>session('userInfo')['sjy_id']))->save(array('sjy_origanization_user_image'=>$path));
                 if($res)
                 {
                    $this->ajaxReturn(array('state'=>1,'errorInfo'=>'上传成功！'));
                 }else{
                     $this->ajaxReturn(array('state'=>0,'errorInfo'=>'上传失败,请重试！'));
                 }
            }else{
                 $this->ajaxReturn(array('state'=>0,'errorInfo'=>'上传失败,请重试！'));
            }

        }
        //获得个人信息接口
        public function getpersoninfo()
        {
            $userInfo = M("origanization_user_info")->where(array("sjy_id"=>session("userInfo")['sjy_id']))->find();
            //根据机构id查询机构名字
            if(!empty($userInfo['sjy_origanization_user_origanization_code']))
            {
                $userInfo['sjy_origanization_name'] = M("origanization_base_info")->where(array("sjy_id"=>$userInfo['sjy_origanization_user_origanization_code']))->getField("sjy_origanization_name");
            }
            $this->ajaxReturn($userInfo);
        }
        //获得个头像
        public function getpersontouxiang()
        {
            $touxiang = $this->ajaxReturn(session('userInfo')['sjy_community_user_image']);
        }
	    //执行修改个人信息
	    public function updatePersonInfo()
	    {
	    	$ret['state'] = 0;
	    	$ret['errorInfo'] = "";
            $userInfo = M('origanization_user_info')->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->find();
	    	//邮箱
	    	$email = I("post.email")==null?null:I("post.email");
	    	//手机号
			$phone = I('post.phone')==null?null:I('post.phone');
			//微信号
			$wechat = I('post.wechat')==null?null:I('post.wechat');
            if(empty($phone))
            {
                $ret['errorInfo'] = '手机号必须填写';
                $this->ajaxReturn($ret);
            }
            $editInfo = array();

            if($email!=$userInfo['sjy_origanization_user_email'])
            {
                $editInfo['sjy_origanization_user_email']=$email;
            }
            if($phone!=$userInfo['sjy_origanization_login_id'])
            {
                $editInfo['sjy_origanization_login_id']=$phone;
            }
            if($wechat!=$userInfo['sjy_origanization_user_wechat'])
            {
                $editInfo['sjy_origanization_user_wechat']=$wechat;
            }
            //执行修改
            $res = 0;
            if(!empty($editInfo)) {
                //执行修改用户邮箱
                $res = M("origanization_user_info")->where(array("sjy_id" => session("userInfo")["sjy_id"]))->save($editInfo);
            }
	    	if($res||empty($editInfo))
	    	{
	    		$ret['state'] = 1;
	    		$this->ajaxReturn($ret);
	    	}else{
	    		$ret['errorInfo'] = '修改失败，请重试';
	    		$this->ajaxReturn($ret);
	    	}
	    }

	    //我的机构
	    public function myOriganization()
	    {
	    	$this->display();
	    }
	    //获得社会组织信息接口
        public function getOriganizationInfo()
        {
            //社会组织信息  判断从哪里查看社会组织信息。自己查看自己的，不用id，其他人查看得传id
            $id = session('userInfo')['sjy_origanization_user_origanization_code'];

            //查询社会组织信息
            $origanization_info = M('origanization_base_info')->where(array('sjy_id'=>$id))->find();
            //社区地址信息
            $origanization_info['address_info'] = M('origanization_position_info')->where(array('sjy_origanization_id'=>$id))->find();
            //社区展示图片
            $origanization_images = M("origanization_images")->where(array("sjy_origanization_code"=>$origanization_info['sjy_origanization_code']))->getField('sjy_origanization_images');
            $origanization_info['origanization_images'] = $origanization_images;
            $this->ajaxReturn($origanization_info);
        }
	    //获取员工列表
	    public function getStaffList()
	    {
	    	$data = array();
	    	//员工手机号 姓名 邮箱,wechat
	    	//机构id
	    	$origanization_code = session("userInfo")['sjy_origanization_user_origanization_code'];
	    	//分页 每页15条
	    	$limit = 15;
	    	//页码
	    	$page = I('get.page')?I('get.page'):1;
	    	//每页开始下标
	    	$start = ($page-1)*$limit; 
	    	$limit = $start.",".$limit;
	    	//查找该id下的员工
	  		$data = M('origanization_user_info')->where(array('sjy_origanization_user_origanization_code'=>$origanization_code))->limit($limit)->field('sjy_origanization_login_id,sjy_origanization_user_wechat,sjy_origanization_user_real_name,sjy_origanization_user_email')->select();
	    	//总页码数
	    	$pages = M('origanization_user_info')->where(array('sjy_origanization_user_origanization_code'=>$origanization_code))->count();
	    	$datas['data']=$data;
	    	$datas['pages']=ceil($pages/15);
	    	$this->ajaxReturn($datas);
	    }

	    //删除员工
	    public function delStaff()
	    {
	    	$state = 0;
	    	$errorInfo = "";
	    	$phone = I("post.phone");
	    	//修改该员工所在机构为null
	    	$res = M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone))->save(array("sjy_origanization_user_origanization_code"=>NULL));
	    	if($res)
	    	{
	    		$state = 1;
	    	}else{
	    		$errorInfo = '删除失败，请重试';
	    	}

	    	$this->ajaxReturn(array("state"=>$state,'errorInfo'=>$errorInfo));
	    }
	    // 根据手机号查找员工
	    public function searchNameByPhone()
	    {
	    	 $state = 0;
             $name = "";
             $errorInfo = '';
             $image = '';
             $phone = I("post.phone");
             //根据手机号查找
             $info = M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone))->find();
             if($info)
             {
                     if($info['sjy_origanization_user_origanization_code'])
                     {
                             $state = 2;  //该用户已经加入其他组织
                             $errorInfo = '该用户已加入其它组织';
                             if($info['sjy_origanization_user_origanization_code'] == session("userInfo")['sjy_origanization_user_origanization_code'])
                             {
                                     $state = 3;  //已加入本社会组织
                                     $errorInfo = '该用户已加入本组织';
                             }
                     }
                     else
                     {
                             if($info["sjy_origanization_user_real_name"])
                             {
                                     $name = $info["sjy_origanization_user_real_name"];
                                     $name = substr_replace($name,"*",3,3);
                                     $image = $info['sjy_origanization_user_image'];
                                     $state = 1;    //已认证
                             }else{
                                     $state = -1;   //未认证
                                     $errorInfo = '该用户尚未认证';
                             }
                     }
             }else{
                         $state = 99;
                         $errorInfo = '未找到该用户';
             }

            $this->ajaxReturn(array("state"=>$state,'image'=>$image,"name"=>$name,'errorInfo'=>$errorInfo));

	    }
	    //执行员工增加
	    public function doAddStaff()
	    {
	    	$state = 0;
	    	$errorInfo = "";
	    	$phone = I("post.phone");
	    	$user_info = "";
	    	//修改状态
	    	//获取当前管理员管理的机构代码
	    	$origanization_code = session("userInfo")['sjy_origanization_user_origanization_code'];
	    	
	    	$res = M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone))->save(array("sjy_origanization_user_origanization_code"=>$origanization_code));
	    	if($res)
	    	{
	    		$state = 1;
	    		$user_info = M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone))->field('sjy_origanization_login_id,sjy_origanization_user_wechat,sjy_origanization_user_real_name,sjy_origanization_user_email')->find();
	    	}else{
	    		$errorInfo = '添加失败，请重试';
	    	}
	    	
	    	$this->ajaxReturn(array("state"=>$state,'errorInfo'=>$errorInfo,"user_info"=>$user_info));
	        
	    }
	 
	    //注销
        public function logout()
	    {
			session('userInfo',null);
			session('figure',null);
			session('city',null);
	        header("Location:/");
	    }
       
        //身份证号是否重复
        public function checkidnumber($idnumber)
        {
        	//社会组织用户表是否存在该身份证号
        	$res1 = M('origanization_user_info')->where(array('sjy_origanization_user_id_card'=>$idnumber))->find();
        	//社区表中是否存在该身份证号
        	$res2 = M('community_user_info')->where(array('sjy_community_user_id_card'=>$idnumber))->find();
        	if(!empty($res1)||!empty($res2))
        	{
        		return false;  //找到相同身份证号的
        	}else{
        		return true;   //没有找到相同身份证号的
        	}
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
       
       
	
	}
?>
