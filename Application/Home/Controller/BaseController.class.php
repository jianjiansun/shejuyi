<?php
	namespace Home\Controller;
    header("Access-Control-Allow-Origin:*");
    use Think\Controller;
    class BaseController extends Controller 
    {
        public $showname = "";  //显示的名字
        public $ismanger = '';  //是否是管理员
        public $code = ""; //是否有社区或社会组织
        public $role = ''; //角色
        public $user_image = '';//用户头像
        public $islogin = "";  //是否登陆
        public $isidentify = ""; //是否认证
        public $index = ''; //主页
        public $active=''; //项目动态
        public $origanization_name = ''; //社会组织名字
        public $community_name = ''; //社区名字
    	//初始化 登录检测 没有登录禁止访问
    	public function __construct()
    	{
    		parent::__construct();
    		//登录检测
            $userInfo_check = session('userInfo');
    		if(empty($userInfo_check))
    		{
    			$this->redirect("/");  //没有登录跳转到跟目录
                die;
    		}
            //检测用户是否登录
            $userInfo  = session("userInfo");

            if(!empty($userInfo))
            {
                    $this->islogin = 1;   //已登录
                    $figure = session('figure');
                    if($figure == 2)
                    {     
                            $userInfo = M('community_user_info')->where(array('sjy_id'=>session('userInfo')['sjy_id']))->find();
                            session('userInfo',$userInfo);                
                            //查询该用户是否认证
                            $this->isidentify = session("userInfo")["sjy_community_user_isidentify"];  //是否认证
                            $this->user_image = 'http://p33g9t7dr.bkt.clouddn.com/'.session("userInfo")['sjy_community_user_image'];       //用户图片
                            $this->code = session('userInfo')['sjy_community_user_community_code']; //社区编号
                            $this->index = "/Home/Community/index";  //社区主页
                            //查询该用户是否是管理员
                            $this->role = session("userInfo")["sjy_community_user_role"];   //是否是管理员
                            if($this->role == 1)
                            {
                                $this->ismanger = 1; //管理员 社会组织
                            }
                            // //查询该用户是否有所属社区，没有社区 不允许发项目
                            // $this->code = M('community_user_info')->where(array('sjy_id'=>session('userInfo')['sjy_id']))->getField('sjy_community_user_community_code');   
                            //没认证的显示登录手机号，认证后,显示姓名 管理员 姓名(管理员)
                            if(empty($this->isidentify))
                            {
                                $this->showname = session("userInfo")['sjy_community_login_id'];
                            }else{
                                $this->showname = session("userInfo")['sjy_community_user_real_name'];
                                if($this->ismanger == 1)
                                {
                                    $this->showname = $this->showname."(管理员)";
                                }
                            }
                            //社区是否有项目动态
                            if($this->code){
                                $where = array('community_id'=>$this->code,'status'=>array('between',array(1,99)));
                                $this->active = count(M('project')->where($where)->find());
                                $this->community_name = M('community_base_info')->where(array('sjy_id'=>$this->code))->getField('sjy_community_name');

                            }

                    }
                    
                    //社会组织登录
                    if($figure == 1)
                    {
                           $userInfo = M('origanization_user_info')->where(array('sjy_id'=>session('userInfo')['sjy_id']))->find();
                           session('userInfo',$userInfo);
                           //查询该用户是否认证

                            $this->isidentify = session("userInfo")["sjy_origanization_user_isidentify"];  //是否认证
                            
                            $this->user_image = 'http://p33g9t7dr.bkt.clouddn.com/'.session("userInfo")['sjy_origanization_user_image'];       //用户图片

                            $this->code = session('userInfo')['sjy_origanization_user_origanization_code']; //社会组织编号

                            $this->index = '/Home/Origanization/index';  //社会组织主页
                            //查询该用户是否是管理员
                            $this->role = session("userInfo")["sjy_origanization_user_role"];   //是否是管理员
                            if($this->role == 3)
                            {
                                $this->ismanger = 1; //管理员 社会组织
                            }
                            // //查询该用户是否有所属社区，没有社区 不允许发项目
                            // $this->code = $userInfo['sjy_origanization_user_origanization_code'];   
                            //没认证的显示登录手机号，认证后,显示姓名 管理员 姓名(管理员)
                            if(empty($this->isidentify))
                            {
                                $this->showname = session("userInfo")['sjy_origanization_login_id'];
                            }else{
                                $this->showname = session("userInfo")['sjy_origanization_user_real_name'];
                                if($this->ismanger == 1)
                                {
                                    $this->showname = $this->showname."(管理员)";
                                }
                            } 
                            //社会组织是否有项目动态
                            if($this->code){
                                $where = array('origanization_id'=>$this->code,'status'=>array('between',array(0,99)));
                                $this->active = count(M('project')->where($where)->find());
                                $this->origanization_name = M('origanization_base_info')->where(array('sjy_id'=>$this->code))->getField('sjy_origanization_name');

                            } 
                    }
                    $cityid = session("cityid");
                    if($cityid==null)
                    {
                       $cityid = 110000;
                    }
                    $city = M("cities")->where(array("cityid"=>$cityid))->getField('city');
                    //分配到前端显示
                    $this->assign("city",$city);
                    $this->assign('showname',$this->showname); //显示的名字
                    $this->assign('islogin',$islogin);  //是否登录  
                    $this->assign('role',$this->role); //角色
                    $this->assign('isidentify',$this->isidentify); //是否认证
                    $this->assign('ismanger',$this->ismanger);  //是否是管理员
                    $this->assign('user_image',$this->user_image);  //用户头像
                    $this->assign('code',$this->code);   //用户社区或者社会组织编号
                    $this->assign('figure',session('figure'));   //用户所属编号
                    $this->assign('index',$this->index); //主页
                    $this->assign('active',$this->active); //是否有提醒的项目
                    $this->assign('origanization_name',$this->origanization_name);
                    $this->assign('community_name',$this->community_name);


            }else{
                $this->redirect("/");
            }
    	}
    }
?>