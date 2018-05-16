<?php
	namespace Home\Controller;
    header("Access-Control-Allow-Origin:*");
	use Think\Controller;
    use Org\Geetest\Geetest;
	class LoginController extends Controller{
		public function login()
		{
			//判断是否存在session
			//登陆者的类型
			$type = I("get.type"); //1 社会组织 2 社区
		    $link = '';
            $userInfo = session('userInfo');
			if(!empty($userInfo))
			{
			   $userInfo = session('userInfo');
			   if(array_key_exists('sjy_origanization_login_id',$userInfo))
			   {
				if($type == 1)
				{
				   $link = 'origanization';
				}
			   }
			   if(array_key_exists('sjy_community_login_id',$userInfo))
			   {
				if($type == 2)
				{
				   $link = 'community';
				}
			   }
			}
			$this->assign('link',$link);
			$this->assign("type",$type);
			$this->display();
		}
		//执行注册
		public function doregister()
		{
			
			$ret['state'] = 0;
			$ret['msg'] = '注册失败，请重试';
            //收集表单信息
            $phone = I('post.phone'); //手机号
            $password = trim(I('post.password')); //密码
            $repassword = trim(I('post.repassword'));//确认密码
            $type = I('post.type');   //类型 社区2 社会组织1
            if(empty($phone)||empty($password))
    		{
    			$ret['state'] = -1;
    			$ret['msg'] = '账号或密码不能为空';
    			$this->ajaxReturn($ret);
    		}
            if($password!==$repassword)
            {
            	$ret['state'] = 1;
            	$ret['msg'] = '密码和确认密码不一致';
            	$this->ajaxReturn($ret);
            }
            //查询手机号是否唯一
            if($this->isregistered($phone,$type))
            {
            	$ret['state'] = 2;
            	$ret['msg'] = '该手机号已注册';
            	$this->ajaxReturn($ret);
            }
            //执行注册
            $password = md5($password);
            //社会组织
            if($type == 1)
            {
            	 $res = M("origanization_user_info")->add(array("sjy_origanization_login_id"=>$phone,'password'=>$password,"sjy_origanization_user_image"=>"http://p33g9t7dr.bkt.clouddn.com/Uploads/touxiang/moren.png",'sjy_origanization_user_register_time'=>date('Y-m-d H:i:s',time())));
            }
            //社区
            if($type == 2)
            {
                 $res = M("community_user_info")->add(array("sjy_community_login_id"=>$phone,'password'=>$password,"sjy_community_user_image"=>"http://p33g9t7dr.bkt.clouddn.com/Uploads/touxiang/moren.png",'sjy_community_user_register_time'=>date('Y-m-d H:i:s',time())));
            }
            if(!empty($res))
            {
            	$ret['state'] = 3;  //注册成功
            	$ret['msg'] = '';
            	if($type == 1)
    			{
    				$userInfo =  M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone))->find();
                    session('figure',1);  //社会组织
    			}
    			if($type == 2)
    			{
    				$userInfo=M("community_user_info")->where(array("sjy_community_login_id"=>$phone))->find();
                    session('figure',2);  //社区
    			}

    			session("userInfo",$userInfo);
    			$this->ajaxReturn($ret);
            }   		


		}
    	//执行登录验证
    	public function dologin()
    	{
    		$ret['state'] = 0;
    		$ret['msg'] = '登录失败，请重试';
            $verify = $this->reVerify(I('post.geetest_challenge'), I('post.geetest_validate'), I('post.geetest_seccode'));
            if(!$verify)
            {
                $ret['state'] = -2;
                $ret['msg'] = '验证失败,请重试';
                $this->ajaxReturn($ret);
            }

    		$phone = I("post.phone");  //手机号
    		$type = I("post.type");  //类型                 
    		$password = I("post.password");  //密码
                $password = md5($password);
    		//账号或密码不能为空
    		if(empty($phone)||empty($password))
    		{
    			$ret['state'] = -1;
    			$ret['msg'] = '账号或密码不能为空';
    			$this->ajaxReturn($ret);
    		}

    		//社会组织登陆
    		if($type == 1)
    		{   //先查询，如果没查到则新增
                
    			$val = M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone,'password'=>$password))->find();
                
    			//账号或密码错误
    			if(empty($val))
    			{
    				$ret['state'] = 1;
    				$ret['msg'] = '账号或密码错误！';
    			}else{
    				$ret['msg'] = '';
    				$ret["state"] = 2;   //查到数据
    			}
    		}
            
    		//社区登陆
    		if($type == 2)
    		{
    			$val = M("community_user_info")->where(array("sjy_community_login_id"=>$phone,'password'=>$password))->find();
    			if(empty($val))
    			{
    				$ret['state'] = 1;
    				$ret['msg'] = '账号或密码错误！';
    			}
    			else{
    				$ret['msg'] = '';
    				$ret["state"] = 2;   //查到数据
    			}
    		}

    		if($ret["state"] == 2){
    			if($type == 1)
    			{
    				$userInfo =  M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone))->find();
                    session('figure',1);  //社会组织
    			}
    			if($type == 2)
    			{
    				$userInfo=M("community_user_info")->where(array("sjy_community_login_id"=>$phone))->find();
                    session('figure',2);  //社区
    			}

    			session("userInfo",$userInfo);
                
    		}

    		$this->ajaxReturn($ret);
    	}

    	//判断手机号是否已注册
    	//手机号 类型（社区，社会组织） 社会组织1 社区2
    	public function isregistered($phone,$type)
    	{
    		//查询社会组织
            
    		$res =  M("origanization_user_info")->where(array("sjy_origanization_login_id"=>$phone))->find();
    		
    		//查询社区
    		$val =  M("community_user_info")->where(array("sjy_community_login_id"=>$phone))->find();
    	
    		if(!empty($res)||!empty($val))
    		{
    			return true;    //查到
    		}else{
    			return false;   //没查到
    		}
    	}

        //geetest验证
        public function verify()
        {
            $verify = new Geetest(C('CAPTCHA_ID'),C("PRIVATE_KEY"));
            $user_id = $_SESSION['user_id'];
            if(!isset($user_id)){
              $_SESSION['user_id']=uniqid();// 生成一个唯一ID
            }
            $data = array(
                "user_id" => $_SESSION['user_id'], # 网站用户id
                "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
                "ip_address" => $_SERVER['REMOTE_ADDR'] # 请在此处传输用户请求验证时所携带的IP
            );

            $status = $verify->pre_process($data, 1);
            $_SESSION['gtserver'] = $status;
            $_SESSION['user_id'] = $data['user_id'];
            echo $verify->get_response_str();
        }
        //二次验证
        public function reVerify($geetest_challenge, $geetest_validate, $geetest_seccode)
        {
           // var_dump($_SESSION['gtserver']);die;

            //var_dump($geetest_challenge.'----'.$geetest_validate.'----'.$geetest_seccode);die;
            $verify = new Geetest(C('CAPTCHA_ID'),C("PRIVATE_KEY"));
  
            // 比如你设置了一个验证码是否验证通过的标识
            $code_flag=false;

            $data = array(
                "user_id" => $_SESSION['user_id'], # 网站用户id
                "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
                "ip_address" => $_SERVER['REMOTE_ADDR'] # 请在此处传输用户请求验证时所携带的IP
            );
              
            // 这里获取你之前设置的user_id，传送给极验服务器做校验
            
            if ($_SESSION['gtserver'] == 1) {
                $result = $verify->success_validate($geetest_challenge, $geetest_validate, $geetest_seccode, $data);
                
                if ($result) {
                    $code_flag=true;
               }
            }else{
               if ($verify->fail_validate($geetest_challenge,$geetest_validate,$geetest_seccode)) {
                    $code_flag=true;
              }
            }
              
            // 如果验证码验证成功，再进行其他校验
            if($code_flag){

               return true;
            }else{
               return false;
            }
        }

	}
?>