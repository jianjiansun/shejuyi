<?php
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\Controller;
use Home\Controller\UploadController;
class CommunityController extends BaseController {
       public function __construct()
       {
           //检测社区已经同意的项目，并且已经到项目开始日期，但是社会组织没有主动点击开始项目，默认将该项目开始
           parent::__construct();
           if(isset(session('userInfo')['sjy_community_user_community_code']))
           {
                $info = M('project')->where(array('status'=>2,'community_id'=>session('userInfo')['sjy_community_user_community_code']))->select();
                foreach($info as $key=>$value)
                {
                    //查询社会组织没有主动点击开始项目
                    $starttime = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->getField('sjy_community_project_start_time');
                    //当前时间大于项目开始时间
                    if(time()>=strtotime($starttime))
                    {
                        //将该项目改为社会组织同意（默认同意）
                          //开启事务
                            $model = M();
                            $model->startTrans();

                            //更新项目状态  sjy_project
                            $data['status'] = 10;  //开始做项目
                            $data['community_agreen_project_start_time'] = $starttime;  //项目开始时间
                            // $data['project_start_people'] = session('userInfo')['sjy_origanization_user_real_name']; //同意人
                            // $data['project_start_people_id'] = session('userInfo')['sjy_id'];  //同意人id
                            $res = M('project')->where(array('sjy_id'=>$value['sjy_id']))->save($data);

                           //更新sjy_community_project_info表
                            // $data = array(
                            //         "sjy_community_project_origanization"=>$value['origanization_id'],
                            //         "sjy_community_project_origanization_name"=>M('origanization_base_info')->where(array('sjy_id'=>$value['origanization_id']))->getField('sjy_origanization_name')
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
    	//社会组织列表
        public function index(){
             $this->display();
        }
        //社会组织列表
        public function getoriganizationlist()
        {
           $page = I('get.page')==""?1:I('get.page');  //当前页码数
           $start = ($page-1)*10;  //开始页码数
           $city = session('cityid');  //城市
           if($city==null)
           {
                $city = 110000;  //默认北京市
           }
           //该城市下社会组织
           $origanization_id = M('origanization_position_info')->field('sjy_origanization_id')->where(array('sjy_origanization_city'=>$city))->select();
           $ids = [];
           foreach($origanization_id as $key=>$value)
           {
              $ids[] = $value['sjy_origanization_id'];
           }
           // var_dump($ids);die;
           if(!empty($ids)){
           		$origanization_info = M('origanization_base_info')->where(array('sjy_origanization_id'=>array('in',$ids)))->limit($start,10)->select();
              //社会组织地址信息
              foreach($origanization_info as $key=>$value)
              {
                $address = M('origanization_position_info')->where(array('sjy_origanization_id'=>$value['sjy_id']))->find();
                $origanization_info[$key]['address'] = $address;
              }
           }else{
    	   		$origanization_info = [];
           }
           $alloriganization = M('origanization_base_info')->where(array('sjy_origanization_id'=>array('in',$ids)))->count();

           $pages = ceil($alloriganization/10);  //总页码数
           $data = $origanization_info;   //数据
           
           //返回
           $res['pages'] = $pages;  //总页码数
           $res['data'] = $data;    //具体数据
           $this->ajaxReturn($res);  //执行返回 
        }
        //显示社区认证页面
        public function communityIdentify()
        {
            //根据ip地址查询区号
            // $url = 'http://pv.sohu.com/cityjson?ie=utf-8';
            // $cityinfo = file_get_contents($url);
            //取出城市id
            // preg_match("/[0-9]{6}/", $cityinfo,$match);
            $cityid = session("cityid")==null?110000:session("cityid");

            //根据城市id查询区号
            $phonecode = M('cities')->where(array('cityid'=>$cityid))->getField('phonecode');

            $this->assign('phonecode',$phonecode);

            $this->display();
        }

        //执行社区认证
        public function doCommunityIdentify()
        {
            $community_name = I("post.community_name"); //社区名字
            $province = I("post.province");             //社区所在省份编号
            $city = I("post.city");                     //社区所在城市编号
            $area = I("post.area");                     //社区所在区/县编号
            $street = I("post.town");                 //社区所在街道编号
            $street_name = I("post.town_name");       //街道名字
            $address = I("post.address");               //社区地址
            $community_telephone  = I("post.telephone");                  //社区联系电话
            $manger_name = I("post.manger_name");         //运营人员姓名
            $id_number = I("post.id_number");            //运营人身份证号
            //判断是否是直辖市
            $municipality = array("110000","120000","310000","500000");//北京，天津，上海，重庆 
            if(in_array($province,$municipality))
            {
                $area = $city;
                $city = $province;
            }
            $community_identify_img = I('post.community_identify_img'); //社区证明图片
            $logo_img = I('post.logo_img');  //社区logo
            //初始化返回变量
            $ret["state"] = 0;
            //检测非空项
            if(empty($community_name))
            {
                $ret["errorInfo"] = "社区名字没有填写";
            }
            if(empty($community_identify_img))
            {
              $ret['errorInfo'] = '社区证明未上传';
            }
            if(empty($logo_img))
            {
              $ret['errorInfo'] = '社区logo未上传';
            }
            if(empty($community_telephone))
            {
                $ret["errorInfo"] = "社区固定电话未填写";
            }
            if(empty($province)||empty($city)||empty($area)||empty($street)||empty($address))
            {
                $ret["errorInfo"] = "请补全社区地址信息";
            }
            if(empty($manger_name))
            {
                $ret["errorInfo"] = "请填写社区运营者姓名";
            }
            if(empty($id_number))
            {
                $ret["errorInfo"] = "请填写社区运营者身份证号";
            }
            //检测社区名字是否重复
            if(!$this->checkCommunityName($community_name))
            {
                $ret["errorInfo"] = "社区名字重复";
            }
            //检测身份证号是否重复 在社区用户表和社会组织用户表检测
            if(!$this->checkidnumber($id_number))
            {
                $ret["errorInfo"] = "该身份证号已被使用";
            }
            //如果数据有错则不执行插入
            if(!empty($ret["errorInfo"]))
            {
                $this->ajaxReturn($ret);
                die;
            }
             //执行图片上传  
                $base64_data = array($community_identify_img,$logo_img);                     
                foreach ($base64_data as $key => $value) {
                  $base64_image_content = $value;
                  if($key==0)
                  {
                    $folder = 'community_identify_img';  //社区证明照片存放地址
                  }else{
                    $folder = 'logo_img';         //logo存放地址
                  }            
                  if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                                     $type = $result[2];
                                     $new_file = "./Uploads/community/".$folder."/".date('Ymd',time())."/";

                                     if(!file_exists($new_file))
                                     {
                                            //检查是否有该文件夹，如果没有就创建，并给予最高权限
                                              mkdir($new_file, 0700);
                                     }
                                     $new_file = $new_file.time().".{$type}";
                                     if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                                            $imgpath = "/Uploads/community/".$folder."/".date('Ymd',time())."/".time().".{$type}";  
                                            if($key==0)
                                            {
                                                $base_info['sjy_community_identify_img_path'] = $imgpath;  //社区证明照片
                                            }else{
                                                 $base_info['sjy_community_logo_img_path'] = $imgpath; //社区logo
                                            }          
                                    }
                             }
                        }
            //执行社区信息插入
            //开启事务
            $model = M();
            $model->startTrans();

            $user = M("community_user_info");

            //更新街道表
            $data = array();
            $data["streetid"] = $street;  //街道编码
            $data["street"] = $street_name; //街道名字
            $data["areaid"] = $area;   //区/县编码
            //查询该街道信息是否已在数据库中存在
            if(!M("streets")->where(array("streetid"=>$street))->find())
            {
                $res = M("streets")->add($data);  //街道信息入库 维护
            }
            else
            {
                $res = 1;
            }

            //社区基本信息
            $community_base_info = M("community_base_info");
            $base_info["sjy_community_name"] = $community_name;  //社区名字
            if(!empty($community_telephone))
            {
               $tel_code = I('post.tel_code');  //电话区号
               $community_telephone = $tel_code.'-'.$community_telephone;
            }else{
               $community_telephone = '';
            }
            $base_info["sjy_community_phone"] = $community_telephone;   //社区固定电话
            $base_info['sjy_community_isidentify'] = 1;                 //社区已认证
            $base_info['sjy_community_admin_id'] = session('userInfo')['sjy_id']; //社区管理员id
            $base_info['sjy_community_register_time'] = date("Y-m-d H:i:s"); //社区认证时间
            //插入社区基本信息，并取得社区自增id
            $community_id = $community_base_info->add($base_info);
    	      $community_base_info->where(array("sjy_id"=>$community_id))->save(array("sjy_community_code"=>$community_id));
            //写入社区地理信息
            $province_name = M("provinces")->where(array("provinceid"=>$province))->getField("province");
            $city_name = M("cities")->where(array("cityid"=>$city))->getField("city");
            $area_name = M("areas")->where(array("areaid"=>$area))->getField("area");
            $street_name = M("streets")->where(array("streetid"=>$street))->getField("street");

            $community_position_info = M("community_position_info");
            $position_info["sjy_community_province"] = $province;
            $position_info["sjy_community_province_name"] = $province_name;
            $position_info["sjy_community_city"] = $city;
            $position_info['sjy_community_city_name'] = $city_name;
            $position_info["sjy_community_area"] = $area;
            $position_info["sjy_community_area_name"] = $area_name;
            $position_info["sjy_community_street"] = $street;
            $position_info["sjy_community_street_name"] = $street_name;
            $position_info["sjy_community_address"] = $address;
            $position_info["sjy_community_id"] = $community_id;
            $community_position = $community_position_info->add($position_info);

            // 更改社区管理者用户信息
            $user_info["sjy_community_user_real_name"] = $manger_name;
            $user_info["sjy_community_user_community_code"] = $community_id;
            $user_info["sjy_community_user_id_card"] = $id_number;
            // //将其角色改为社区管理者
            $user_info["sjy_community_user_role"] = 1;
            $user_info["sjy_community_user_isidentify"] = 1;   //认证
            $userinfores = $user->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->save($user_info);
            //如果都成功则提交事务
            if($res&&$community_id&&$community_position&&$userinfores)
            {
                $model->commit();
                $ret["state"] = 1;
                $this->ajaxReturn($ret);
            }
            else
            {
                $model->rollback();
                $ret["errorInfo"] = '系统错误,请联系管理员';
                $this->ajaxReturn($ret);
            }
        }

        //执行个人认证
        public function doCommunityPersonIdentify()
        {
            $ret["state"] = 0;
            $ret['errorInfo'] = '';
            $data["sjy_community_user_real_name"] = I("post.real_name");  //用户真实姓名
            $data["sjy_community_user_id_card"] = I("post.id_card");   //用户身份证号
            $data['sjy_community_id_card_img'] = I('post.id_card_img'); //身份证图片
            $data['sjy_community_user_wechat'] = I('post.wechat');  //微信号
            //非空校验
            if(empty($data['sjy_community_user_real_name']))
            {
              $ret['errorInfo'] = '姓名不能为空';
            }
            if(empty($data['sjy_community_user_id_card']))
            {
              $ret['errorInfo'] = '身份证号我不能为空';
            }
            if(empty($data['sjy_community_id_card_img']))
            {
              $ret['errorInfo'] = '身份证图片不能为空';
            }
            //检测身份证号是否重复 在社区用户表和社会组织用户表检测
            if(!$this->checkidnumber($data["sjy_community_user_id_card"]))
            {
                $ret["errorInfo"] = "该身份证号已被使用";
            }
            //如果数据有错则不执行插入
            if(!empty($ret["errorInfo"]))
            {
                $this->ajaxReturn($ret);
                die;
            }
            //身份证图片存储
              //上传照片  
              $base64_image_content =  $data['sjy_community_id_card_img'];        
              if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                                 $type = $result[2];
                                 $new_file = "./Uploads/community/id_card/".date('Ymd',time())."/";

                                 if(!file_exists($new_file))
                                 {
                                        //检查是否有该文件夹，如果没有就创建，并给予最高权限
                                          mkdir($new_file, 0700);
                                 }
                                 $new_file = $new_file.time().".{$type}";
                                 if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                                        $imgpath = "/Uploads/community/id_card/".date('Ymd',time())."/".time().".{$type}";
                                        $data["sjy_community_id_card_img"] = $imgpath;  //身份证图片
                                 
                                }
                         }
            $data["sjy_community_user_isidentify"] = 1;  //认证
            $res = M("community_user_info")->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->save($data);
            if($res)
            {
                $ret["state"] = 1;  
                $ret['errorInfo'] = ''; 
            }else{
                $ret['errorInfo'] = '请联系管理员';
            }
            $this->ajaxReturn($ret);
        }
        //社区名唯一性检测
        public function checkCommunityName($community_name)
        {
            $community_base_info = M("community_base_info");
            $res = $community_base_info->where(array("sjy_community_name"=>$community_name))->find();
            if(!empty($res))
            {
                //社区名字重复
                return false;
            }
            else
            {
                //社区名字没有重复
                return true;
            }
        }

        //社区发布项目页面显示
        public function send_project()
        {
            //服务对象
            $service_object = M("service_object")->select();
            $this->assign("service_object",$service_object);
            $this->assign('nowtime',date('Y-m-d',time()));
            $this->display();
        }
        //执行项目插入
        public function doSendProject()
        {
            
            $ret["state"] = 0;
            $ret['errorInfo'] = '';
            //接收数据
            $project_name = I("post.project_name");  //项目名字
            $server_area = I("post.server_area");  //项目服务领域 
            $demand_describe=I("post.demand_describe");  //项目需求简介
            $collect_start_time = I("post.collect_start_time");  //项目征集开始时间
            $plan_money = I('post.plan_money'); //项目预算
            $start_time = I("post.start_time");  //项目开始时间
            $time = explode('~',$collect_start_time);
            $collect_start_time = $time[0];
            $collect_end_time = $time[1]; //项目结束时间

            $time = explode('~', $start_time);
            $start_time = $time[0];
            $end_time = $time[1]; //项目结束时间
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
                $ret["errorInfo"] = "项目需求简介不能为空";
            }
            //项目周期不能在征集周期之前
            if(strtotime($start_time)<strtotime($collect_end_time))
            {
                 $ret['errorInfo'] = '项目开始时间必须大于项目征集时间';
            }
            if(empty($collect_start_time))
            {
                $ret["errorInfo"] = "项目征集时间不能为空";
            }
            if(empty($start_time))
            {
                $ret["errorInfo"] = "项目周期不能为空";
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
            $base64 = explode('base64,',$main_image)[1];
            //文件名
            $path = '/Uploads/community/projectimg/'.date('Y-m-d',$time).'/'.$time.uniqid();
            $base64res = $uploadObj->base64Upload($base64,$path);
            if($base64res)
            {
               $projectimg[] = $path; //项目主图
            }else{
                 $this->ajaxReturn(array('state'=>0,'errorInfo'=>'项目主图上传失败,请重试！'));
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
                $newpath = '/Uploads/community/projectimg/'.date('Y-m-d',$time).'/'.$file_name.'.'.$type;
                
                $uploadres = $uploadObj->singUpload($file,$newpath);


                if($uploadres)
                {
                    $projectimg[] = $newpath; 
                }
            
            }
            //项目所属社区id
            $community = M("community_user_info")->where(array("sjy_id"=>session("userInfo")['sjy_id']))->getField("sjy_community_user_community_code");
        
            $model = M();
            $model->startTrans();
        //换取项目服务对象
            $server_area_name = M("service_object")->where(array("sjy_id"=>$server_area))->getField("service_object_name");
            $data["sjy_community_id"] = $community;  //社区id
            $data['sjy_community_name'] = M('community_base_info')->where(array("sjy_id"=>$community))->getField('sjy_community_name'); //社区名字
            $data["sjy_community_project_title"] = $project_name;  //项目名字
            $data["sjy_community_project_service_area"] = $server_area_name;  //项目服务领域
            $data["sjy_community_project_service_area_id"] = $server_area;  //项目服务领域id
            $data["sjy_community_project_demand"] = $demand_describe;  //项目需求简介
            $data["sjy_community_project_collect_start_time"] = $collect_start_time; //项目开始收集时间
            $data["sjy_community_project_collect_end_time"] = $collect_end_time;    //项目结束收集时间
            $data["sjy_community_project_start_time"] = $start_time; //项目开始时间
            $data["sjy_community_project_end_time"] = $end_time; //项目结束时间
            $data['sjy_community_project_plan_money'] = $plan_money;  //项目预算
            $data['sjy_community_project_send_prople_id'] = session('userInfo')['sjy_id'];//发布人id
            $data['sjy_community_project_send_prople_name'] = session('userInfo')['sjy_community_user_real_name'];//发布人名字
            $data['sjy_community_project_send_time'] = date('Y-m-d H:i:s',time());//发布时间
            $data['sjy_community_project_status'] = 0; //项目征集中
            //发布城市
            $city = M('community_position_info')->where(['sjy_community_id'=>$community])->getField('sjy_community_city');
            $data['cityid'] = $city;
            $data['cityname'] = M('community_position_info')->where(['sjy_community_id'=>$community])->getField('sjy_community_city_name'); //项目所在城市名字
            $res = M("community_project_info")->add($data);
           
            foreach ($projectimg as $key => $value) {
               $project_image[] = array('sjy_community_project_id'=>$res,'sjy_community_project_image'=>$value);
            }
            //插入项目图片
            $rut = M('community_project_image')->addAll($project_image);
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
    //我发布的项目展示
   public function mysendproject()
   {
         //社区编号
         $community_id = session('userInfo')['sjy_community_user_community_code'];
         
         //查询出我发布的项目
         $info = M('community_project_info')->where(array('sjy_community_id'=>$community_id))->select();
         $i = 0;
         foreach($info as $key=>$value)
         {
              $i++;
              $info[$key]['id'] = $i;
              //项目周期
              $info[$key]['project_times'] = $value['sjy_community_project_start_time'].'~'.$value['sjy_community_project_end_time'];
              //项目收集周期
              $info[$key]['collect_times'] = $value['sjy_community_project_collect_start_time'].'~'.$value['sjy_community_project_collect_end_time'];
         }
         $res['data'] = $info;
         $res['count'] = count($info);
         $res['msg'] = '';
         $res['code'] = 0;
         $this->ajaxReturn($res); 
         
   }
   //提交编辑项目
   public function doeditproject()
   {
        $ret["state"] = 0;
        $ret["errorInfo"] = "";
        //接收数据
        $project_id = I("post.project_id");
        $project_name = I("post.project_name");  //项目名字
        $server_area = I("post.server_area");  //项目服务领域
        $demand_describe=I("post.demand_describe");  //项目需求简介
        $plan_money = I('post.plan_money');  //项目预算
        $collect_start_time = I("post.collect_start_time");  //项目征集开始时间
  
       
        $start_time = I("post.start_time");  //项目开始时间
        $time = explode('~',$collect_start_time);
        $collect_start_time = $time[0];
        $collect_end_time = $time[1]; //项目结束时间
 
        $time = explode('~', $start_time);
        $start_time = $time[0];
        $end_time = $time[1]; //项目结束时间

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
              $ret["errorInfo"] = "项目需求简介不能为空";
          }
         
          if(empty($collect_start_time))
          {
              $ret["errorInfo"] = "项目征集时间不能为空";
          }
  
         
          if(empty($start_time))
          {
              $ret["errorInfo"] = "项目开始时间不能为空";
          }

          //执行数据插入
          //换取项目服务对象
          $server_area = M("service_object")->where(array("sjy_id"=>$server_area))->getField("service_object_name");
          
          $data["sjy_community_project_title"] = $project_name;  //项目名字
          $data["sjy_community_project_service_area"] = $server_area;  //项目服务领域
          $data["sjy_community_project_demand"] = $demand_describe;  //项目需求简介
          $data['sjy_community_project_plan_money'] = $plan_money;  //项目预算
          $data["sjy_community_project_collect_start_time"] = $collect_start_time;
          $data["sjy_community_project_collect_end_time"] = $collect_end_time;
       
          $data["sjy_community_project_start_time"] = $start_time;
          $data["sjy_community_project_end_time"] = $end_time;

          //将数据插入
          $res = M("community_project_info")->where(array("sjy_id"=>$project_id))->save($data);
          //删除原有图片
          $previmgs = M('sjy_community_project_image')->where(array('sjy_community_project_id'=>$project_id))->select();
            if(!empty($previmgs))
            {
                //删除数据库
                $res = M('sjy_community_project_image')->where(array('sjy_community_project_id'=>$project_id))->delete();
                //删除图片
                if($res)
                {
                  foreach($previmgs as $key=>$value)
                  {
                       //查看文件是否存在，存在删除
                        $path = $value['sjy_community_project_image'];
                         if(file_exists('.'.$path))
                         {
                             unlink('.'.$path);
                         }
                  }
                }

            }
            //插入项目图片
            $base64_data = I('post.community_project_images');
            foreach ($base64_data as $key => $value) {
            $base64_image_content = $value;
           	if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                            $type = $result[2];
                            $new_file = "./Uploads/community/project/".date('Ymd',time())."/";

                            if(!file_exists($new_file))
                            {
                                   //检查是否有该文件夹，如果没有就创建，并给予最高权限
                                     mkdir($new_file, 0700);
                            }
                            $new_file = $new_file.time().".{$type}";
                            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                                   $url = "/Uploads/community/project/".date('Ymd',time())."/".time().".{$type}";
                                   M("community_project_image")->add(array("sjy_community_project_image"=>$url,'sjy_community_project_id'=>$project_id));
                           }
                    }else{
                        M("community_project_image")->add(array("sjy_community_project_image"=>$base64_image_content,'sjy_community_project_id'=>$project_id));
                    }
               }
            $ret["state"] = 1;
            $this->ajaxReturn($ret);
  }
    //编辑项目
    public function editproject()
    {
        session('community_del_edit_project_img',null);
        session('community_send_project_data',null);
          //项目id
        $project_id = I("get.id");  //项目id
          //查询项目信息
        $project_info = M("community_project_info")->find($project_id);
          //查询项目图片
        $project_imgs = M("community_project_image")->where(array("sjy_community_project_id"=>$project_id))->select();
        foreach($project_imgs as $key=>$value)
        {
                  $project_imgs[$key]['sjy_id'] = $value['sjy_id'].'o';
        }

        $service_object = M("service_object")->select();
         // var_dump($service_object);die;
        $time = $project_info['sjy_community_project_start_time']." "."~"." ".$project_info['sjy_community_project_end_time'];
        $collect_time = $project_info['sjy_community_project_collect_start_time']." "."~"." ".$project_info['sjy_community_project_collect_end_time'];
        $this->assign("time",$time);
        $this->assign('collect_time',$collect_time);
        $this->assign("service_object",$service_object);
        $this->assign("project_imgs",$project_imgs);
        $this->assign("project_info",$project_info);
        $this->display();
   }
       
       
        //查看社会组织正在进行的项目
        public function getoriganizationingproject()
        {
            $id = I('get.id'); //社会组织id
            //分页 每页15条
            $limit = 15;
            //页码
            $page = I('get.page')?I('get.page'):1;
            //每页开始下标
            $start = ($page-1)*$limit;
            $limit = $start.",".$limit;
            $now_project = M('project')->where(array('status'=>array('between',[10,99]),'origanization_id'=>$id))->limit($limit)->select();
            foreach($now_project as $key=>$value)
              {
                //项目信息
                $project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
                //项目图
                $community_project_image = M("community_project_image")->where(array("sjy_community_project_id"=>$value['project_id']))->find();
                $now_project[$key]['project_image'] = $community_project_image['sjy_community_project_image'];
                $now_project[$key]['project_info'] = $project_info;
              }
              $pages = M('project')->where(array('status'=>array('between',[10,99]),'origanization_id'=>$id))->count();
              $ret['data'] = $now_project;
              $ret['pages'] = ceil($pages/15);
              $this->ajaxReturn($ret);
        }
        //查看社会组织已完成的项目
        public function getoriganizationoldproject()
        {
            $id = I('get.id'); //社会组织id
            //分页 每页15条
            $limit = 15;
            //页码
            $page = I('get.page')?I('get.page'):1;
            //每页开始下标
            $start = ($page-1)*$limit;
            $limit = $start.",".$limit;
            $old_project = M('project')->where(array('status'=>'100','origanization_id'=>$id))->limit($limit)->select();
            foreach($old_project as $key=>$value)
            {
                //项目信息
                $project_info = M('community_project_info')->where(array('sjy_id'=>$value['project_id']))->find();
                //项目图
                $community_project_image = M("community_project_image")->where(array("sjy_community_project_id"=>$value['project_id']))->find();
                $old_project[$key]['project_image'] = $community_project_image['sjy_community_project_image'];
                $old_project[$key]['project_info'] = $project_info;
            }
            $pages = M('project')->where(array('status'=>'100','origanization_id'=>$id))->count();
            $ret['data'] = $old_project;
            $ret['pages'] = ceil($pages/15);
            $this->ajaxReturn($ret);
        }
        //查看社会组织已发布的项目
        public function getoriganizationsendproject()
        {
            $id = I('get.id');
            //分页 每页15条
            $limit = 15;
            //页码
            $page = I('get.page')?I('get.page'):1;
            //每页开始下标
            $start = ($page-1)*$limit;
            $limit = $start.",".$limit;
            $send_project = M('origanization_project_info')->where(array('sjy_origanization_id'=>$id))->$limit()->select();
           foreach($send_project as $key=>$value)
           {
            //项目图
            $origanization_project_image = M("origanization_project_image")->where(array("sjy_origanization_project_id"=>$value['project_id']))->find();
            $send_project[$key]['project_image'] = $origanization_project_image['sjy_origanization_project_image'];
           }
           $pages = M('origanization_project_info')->where(array('sjy_origanization_id'=>$id))->count();
           $ret['pages'] = ceil($pages/15);
           $ret['data'] = $send_project;
           $this->ajaxReturn($ret);

        }
    public function uploadCommunityImage()
    {
            //执行上传文件操作
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/community_image/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();
            
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功

                $url = $upload->rootPath.$info['file']["savepath"].$info['file']["savename"];
                $data["error"] = 0;
                $data["url"] = "/Uploads/community_image/".$info['file']["savepath"].$info['file']["savename"];
                //数据保存到数据库
                M("community_images")->add(array("sjy_community_code"=>session("userInfo")['sjy_community_user_community_code'],"sjy_community_images"=>$url));
                $this->ajaxReturn($data);
            }
    }

    //查询我的项目
    public function myproject()
    {
        $this->display();

    }
    public function reciveprojectbook()
    {
        $page = I("get.page");  //页码
        $limit = I("get.limit");
          //查询项目信息
        //我收到的项目书
        //查询哪些项目已经收到项目书
        $limit = ($page-1).",".$limit;
        $project_id = M("project")->where(array("community_id"=>session("userInfo")['sjy_community_user_community_code'],"status"=>1))->field("project_id")->limit($limit)->select();
        //降维
        $projectids = array();
        foreach($project_id as $key=>$value)
        {
            $projectids[] = $value["project_id"];
        }
        //根据项目id查询项目情况
        $project_info = array();
        static $k = 0;
        foreach($projectids as $key=>$value)
        {
            $k++;
            $info = M("community_project_info")->find($value);
            $info["ID"] = $k;
            $collect_time = $info['sjy_community_project_collect_start_time']."~".$info['sjy_community_project_collect_end_time'];
            $doing_time = $info['sjy_community_project_start_time']."~".$info['sjy_community_project_end_time'];
            $info["sjy_community_project_collect_time"] =  $collect_time;
            $info['sjy_community_project_doing_time'] = $doing_time;
            $project_info[] = $info;
        }
        $res['code'] = 0;
        $res['msg']  = "";
        $res['count'] = count($project_info);
        $res['data'] = $project_info;
        $this->ajaxReturn($res);
    }

  

        //修改个人头像
        public function douploadtouxiang()
        {
            //接到base64格式图片
            $base64_image_content = I("post.img");
            $ret["state"] = 0;
            $ret['url'] = '';
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                $type = $result[2];
                $new_file = "./Uploads/community/touxiang/".date('Ymd',time())."/";

                if(!file_exists($new_file))
                {
                    //检查是否有该文件夹，如果没有就创建，并给予最高权限
                     mkdir($new_file, 0700);
                }
                $file_name = time();
                $new_file = $new_file.$file_name.".{$type}";
                if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                    $ret["url"] = "/Uploads/community/touxiang/".date('Ymd',time())."/".$file_name.".{$type}";
                    
                    //取出原图片地址
                    $oldimage = M("community_user_info")->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->getField('sjy_community_user_image');
                    $res = M("community_user_info")->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->save(array("sjy_community_user_image"=>$ret['url']));
                    if($res)
                    {
                        //原图片如果不是默认,并且存在就删除
                        if(file_exists('.'.$oldimage))
                        {
                            if($oldimage!='/Uploads/touxiang/moren.png')
                            {
                                unlink('.'.$oldimage);
                            }
                        }
                        $ret['state'] = 1;
                    }else{
                        $ret['state'] = 0;
                        $ret['url'] = '';
                        $ret['errorInfo'] = '上传失败，请重试';
                    }
                    $this->ajaxReturn($ret);
                }else{
                    $ret['errorInfo'] = '上传失败,请重试';
                    $this->ajaxReturn($ret);
                }
            }else{
                $ret['errorInfo'] = '上传失败,请重试';
                $this->ajaxReturn($ret);
            }

        }
        public function myCommunity()
        {
          
            $this->display();
        }
        //获得社区信息接口
        public function getCommunityInfo()
        {
            //社区信息
            $id = session('userInfo')['sjy_community_user_community_code'];
            //查询社区信息
            $community_info = M('community_base_info')->where(array('sjy_id'=>$id))->find();
            //社区地址信息
            $community_info['address_info'] = M('community_position_info')->where(array('sjy_community_id'=>$id))->find();
            //社区展示图片
            $community_images = M("community_images")->where(array("sjy_community_code"=>$community_info['sjy_community_code']))->getField('sjy_community_images');
            $community_info['community_images'] = $community_images;
            $this->ajaxReturn($community_info);
        }
        //显示个人信息
        public function personInfo()
        {
            $this->display();
        }
        //获得个人信息接口
        public function getPersonInfo()
        {
            $userInfo = M("community_user_info")->where(array("sjy_id"=>session("userInfo")['sjy_id']))->find();
            //根据机构id查询机构名字
            if(!empty($userInfo['sjy_community_user_community_code'])) {
                $userInfo['sjy_community_name'] = M("community_base_info")->where(array("sjy_id" => $userInfo['sjy_community_user_community_code']))->getField("sjy_community_name");
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
            //查询用户基本信息
            $userInfo = M('community_user_info')->where(array("sjy_id"=>session("userInfo")["sjy_id"]))->find();
            //用户邮箱
            $email = I("post.email")==null?null:I("post.email");
            //用户微信号
            $wechat = I('post.wechat')==null?null:I('post.wechat');
            //用户手机号
            $phone = I('post.phone');
            if(empty($phone))
            {
                $ret['errorInfo'] = '手机号必须填写';
                $this->ajaxReturn($ret);
            }
            $editInfo = array();

            if($email!=$userInfo['sjy_community_user_email'])
            {
                $editInfo['sjy_community_user_email']=$email;
            }
            if($phone!=$userInfo['sjy_community_login_id'])
            {
                $editInfo['sjy_community_login_id']=$phone;
            }
            if($wechat!=$userInfo['sjy_community_user_wechat'])
            {
                $editInfo['sjy_community_user_wechat']=$wechat;
            }
            //执行修改
            $res = 0;
            if(!empty($editInfo)) {
                $res = M("community_user_info")->where(array("sjy_id" => session("userInfo")["sjy_id"]))->save($editInfo);
            }
            if($res||empty($editInfo))
            {
                $ret['state'] = 1;
                //修改成功
                $this->ajaxReturn($ret);

            }else{
                //修改失败
                $ret['errorInfo'] = '修改失败，请重试';
                $this->ajaxReturn($ret);
            }
        }


        //升级我的社区
        public function updateCommunityInfo()
        {
            $ret['state'] = 0;
            $ret['errorInfo'] = '';
            //社区id
            $community_code = session("userInfo")["sjy_community_user_community_code"];
            //查询社区基本信息
            $communityInfo = M("community_base_info")->where(array("sjy_id"=>$community_code))->find();
            $phone = I("post.phone")==null?null:I("post.phone");  //固定电话
            $introduce = I("post.introduce")==null?null:I("post.introduce");  //社区简介
            $tel_code = I('post.tel_code'); //区号
            $community_name = I('post.community_name'); //社区名字
            if(empty($community_name))
            {
                $ret['errorInfo'] = '社区名字不能为空';
                $this->ajaxReturn($ret);
            }
            if(!empty($phone))
            {
                $telphone = $tel_code."-".$phone;
            }else{
                $telphone = "";
            }

            $editInfo = array();
            if($community_name!=$communityInfo['sjy_community_name'])
            {
                $editInfo['sjy_community_name'] = $community_name;
            }
            if($telphone!=$communityInfo['sjy_community_phone'])
            {
                $editInfo['sjy_community_phone'] = $telphone;
            }
            if($introduce != $communityInfo['sjy_community_introduce'])
            {
                $editInfo['sjy_community_introduce'] = $introduce;
            }

            //更改机构基本信息
            $res = 0;
            if(!empty($editInfo)) {
                $res = M("community_base_info")->where(array("sjy_id" => $community_code))->save($editInfo);
            }
            if($res||empty($editInfo))
            {
                $ret['state'] = 1;
            }
            else{
                $ret['errorInfo'] = '修改失败，请重试';
            }
            $this->ajaxReturn($ret);
        }
        //获得社区风采
        public function getcommunityimgs()
        {
            $images = M('community_images')->where(array('sjy_community_code'=>session('userInfo')['sjy_community_user_community_code']))->getField('sjy_community_images');
            $this->ajaxReturn($images);
        }
        //升级社区风采图片
        public function uploadcommunityimgs()
        {
            $base64_image_content = I("post.file");
            //执行base64上传
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
                $type = $result[2];
                $new_file = "./Uploads/community/fengcai/".date('Ymd',time())."/";

                if(!file_exists($new_file))
                {
                    //检查是否有该文件夹，如果没有就创建，并给予最高权限
                     mkdir($new_file, 0700);
                }
                $file_name = time();
                $new_file = $new_file.$file_name.".{$type}";
                if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                    $ret["url"] = "/Uploads/community/fengcai/".date('Ymd',time())."/".$file_name.".{$type}";
                    $ret['error'] = 0;
                    //查询社区是否有风采
                    $has = M('community_images')->where(array("sjy_community_code"=>session("userInfo")['sjy_community_user_community_code']))->find();
                    if(empty($has)) {
                        $res = M("community_images")->add(array("sjy_community_code" => session("userInfo")['sjy_community_user_community_code'], "sjy_community_images" => $ret['url']));
                    }else{

                        $res = M('community_images')->where(array("sjy_community_code"=>session("userInfo")['sjy_community_user_community_code']))->save(array("sjy_community_images" => $ret['url']));
                        if($res)
                        {
                            //删除原先照片
                            $path = $has['sjy_community_images'];
                            if(file_exists('.'.$path))
                            {
                                unlink('.'.$path);
                            }
                        }
                    }
                    $rut['state'] = 0;
                    $rut['errorInfo'] = "";
                    if($res)
                    {
                       $rut['state'] = 1;
                    }else{
                        $rut['errorInfo'] = '修改失败，请重试';
                    }
                    $this->ajaxReturn($rut);
                }else{
                    $rut['state'] = 0;
                    $rut['errorInfo'] = '修改失败，请重试';
                    $this->ajaxReturn($rut);
                }
            }else{
                $rut['state'] = 0;
                $rut['errorInfo'] = '图片非法';
                $this->ajaxReturn($rut);
            }

        }
        //员工列表
        public function getStaffList()
        {
            $data = array();
            $pages = 1;
            //员工手机号 姓名 邮箱,wechat
            //机构id
            $community_code = session("userInfo")['sjy_community_user_community_code'];
            //分页 每页15条
            $limit = 15;
            //页码
            $page = I('get.page')?I('get.page'):1;
            //每页开始下标
            $start = ($page-1)*$limit; 
            $limit = $start.",".$limit;
            //查找该id下的员工
            $data = M('community_user_info')->where(array('sjy_community_user_community_code'=>$community_code))->limit($limit)->field('sjy_community_login_id,sjy_community_user_wechat,sjy_community_user_real_name,sjy_community_user_email')->select();
            //总页码数
            $pages = M('community_user_info')->where(array('sjy_community_user_community_code'=>$community_code))->count();
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
            $res = M("community_user_info")->where(array("sjy_community_login_id"=>$phone))->save(array("sjy_community_user_community_code"=>NULL));
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
            $state = 0; //用户不存在
            $name = "";
            $image = '';
            $errorInfo = '';
            $phone = I("post.phone");
            //根据手机号查找
            $info = M("community_user_info")->where(array("sjy_community_login_id"=>$phone))->find();
            if($info)
            {
                if($info['sjy_community_user_community_code'])
                {
                    $state = 2;  //该用户已经加入其他组织
                    $errorInfo = '该用户已经加入其他社区';
                    if($info['sjy_community_user_community_code'] == session("userInfo")['sjy_community_user_community_code'])
                    {
                        $state = 3;  //已加入本社会组织
                        $errorInfo = '该用户已经加入本社区';
                    }
                }
                else
                {
                    if($info["sjy_community_user_real_name"])
                    {
                        $name = $info["sjy_community_user_real_name"];
                        $name = substr_replace($name,"*",3,3);
                        $image = $info['sjy_community_user_image'];
                        $state = 1;    //已认证
                    }else{
                        $state = -1;   //未认证
                        $errorInfo = '该用户未认证';
                    }
                }
            }else{
                $state = 99;
                $errorInfo = '未找到该用户';
            }
            $this->ajaxReturn(array("state"=>$state,'errorInfo'=>$errorInfo,"name"=>$name,'image'=>$image));

        }
        //执行员工增加
        public function doAddStaff()
        {
            $state = 0;
            $errorInfo = "";
            $phone = I("post.phone");
            $user_info = '';
            //修改状态
            //获取当前管理员管理的机构代码
            $community_code = session("userInfo")['sjy_community_user_community_code'];
            
            $res = M("community_user_info")->where(array("sjy_community_login_id"=>$phone))->save(array("sjy_community_user_community_code"=>$community_code));
            if($res)
            {
                $state = 1;
                $user_info = M("community_user_info")->where(array("sjy_community_login_id"=>$phone))->field('sjy_community_login_id,sjy_community_user_wechat,sjy_community_user_real_name,sjy_community_user_email')->find();
            }else{
                $errorInfo = '添加失败，请重试';
            }
            
            $this->ajaxReturn(array("state"=>$state,'errorInfo'=>$errorInfo,'user_info'=>$user_info));
            
        }
    
	   //根据项目书id查询双方信息
        public function searchbybookid()
        {
            $project_book_id = I("post.project_book_id");
            //查询
            $info = M("project_book")->find($project_book_id);
            //项目名字
            $project_name = M("community_project_info")->where(array("sjy_id"=>$info['sjy_project_id']))->getField("sjy_community_project_title");
            $origanization_name = M("origanization_base_info")->where(array('sjy_id'=>$info['sjy_origanization_id']))->getField('sjy_origanization_name');
            $this->ajaxReturn(array('project_name'=>$project_name,'origanization_name'=>$origanization_name));
        }

      
	  

	 //注销
	public function logout()
	{
	   session('userInfo',null);
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
