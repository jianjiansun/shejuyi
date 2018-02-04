<?php
	namespace Home\Controller;
    header("Access-Control-Allow-Origin:*");
    use Think\Controller;
    class BaseController extends Controller 
    {
        public $showname = "";  //显示的名字
        public $ismanger = '';  //是否是管理员
        public $code = ""; //是否有社区
        public $role = ''; //角色
        public $user_image = '';//用户头像
        public $islogin = "";  //是否登陆
        public $isidentify = ""; //是否认证
    	//初始化 登录检测 没有登录禁止访问
    	public function __construct()
    	{
    		parent::__construct();
    		//登录检测
    		if(empty(session('userInfo')))
    		{
    			$this->redirect("/");  //没有登录跳转到跟目录
                die;
    		}
            //检测用户是否登录
            $userInfo  = session("userInfo");

            if(!empty($userInfo))
            {
                    $this->islogin = 1;   //已登录

                    if(session('figure') == 2)
                    {     
                            $userInfo = M('community_user_info')->where(array('sjy_id'=>session('userInfo')['sjy_id']))->find();
                            session('userInfo',$userInfo);                
                            //查询该用户是否认证
                            $this->isidentify = session("userInfo")["sjy_community_user_isidentify"];  //是否认证
                            $this->user_image = session("userInfo")['sjy_community_user_image'];       //用户图片
                            //查询该用户是否是管理员
                            $this->role = session("userInfo")["sjy_community_user_role"];   //是否是管理员
                            if($this->role == 1)
                            {
                                $this->ismanger = 1; //管理员 社会组织
                            }
                            //查询该用户是否有所属社区，没有社区 不允许发项目
                            $this->code = M('community_user_info')->where(array('sjy_id'=>session('userInfo')['sjy_id']))->getField('sjy_community_user_community_code');   
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
                    }
                    
                    //社会组织登录
                    if(session('figure') == 1)
                    {
                           $userInfo = M('origanization_user_info')->where(array('sjy_id'=>session('userInfo')['sjy_id']))->find();
                           session('userInfo',$userInfo);
                           //查询该用户是否认证

                            $this->isidentify = session("userInfo")["sjy_origanization_user_isidentify"];  //是否认证

                            $this->user_image = session("userInfo")['sjy_origanization_user_image'];       //用户图片
                            //查询该用户是否是管理员
                            $this->role = session("userInfo")["sjy_origanization_user_role"];   //是否是管理员
                            if($this->role == 3)
                            {
                                $this->ismanger = 1; //管理员 社会组织
                            }
                            //查询该用户是否有所属社区，没有社区 不允许发项目
                            $this->code = $userInfo['sjy_origanization_user_origanization_code'];   
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
                    $this->assign('code',$this->code);   //用户所属编号
                    $this->assign('figure',session('figure'));   //用户所属编号

            }else{
                $this->redirect("/");
            }
    	}
    }
?>