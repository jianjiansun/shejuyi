<?php
	namespace Admin\Controller;
	use Think\Controller;
	class LoginController extends Controller
	{
		//登录画面展示
		public function login()
		{
			$this->display();
		}
		//验证码
		public function verify()
		{
			//验证码配置
			$config =    array(
			    'fontSize'    =>    30,    // 验证码字体大小
			    'length'      =>    4,     // 验证码位数
			    'useNoise'    =>    false, // 关闭验证码杂点
			);
			//生成验证码
			$Verify = new \Think\Verify($config);
    		$Verify->entry();
		}
		//执行登录
		public function dologin()
		{
			$state = 0;
			$errorInfo = '';
			//接收数据
			$data = I('post.');

			//密码
			$password = $data['password'];
			//用户名
			$login_name = $data['login_name'];
			//验证码
			$code = $data['verify'];
			if(empty($password))
			{
				$errorInfo = '密码不能为空';
				$this->ajaxReturn(array('state'=>$state,'errorInfo'=>$errorInfo));
			}
			if(empty($login_name))
			{
				$errorInfo = '用户名不能为空';
				$this->ajaxReturn(array('state'=>$state,'errorInfo'=>$errorInfo));
			}
			if(empty($code))
			{
				$errorInfo = '验证码不能为空';
				$this->ajaxReturn(array('state'=>$state,'errorInfo'=>$errorInfo));
			}
			//验证码验证
			$verify = new \Think\Verify();
    		$res = $verify->check($code);
    		if(!$res)
    		{
    			$errorInfo = '验证码错误';
    			$this->ajaxReturn(array('state'=>$state,'errorInfo'=>$errorInfo));
    		}
    		//验证用户名密码是否正确
    		$admin = M('admin')->where(array('login_name'=>$login_name))->find();
    		if(empty($admin))
    		{
    			$errorInfo = '用户名或密码错误';
    			$this->ajaxReturn(array('state'=>$state,'errorInfo'=>$errorInfo));
    		}else{
    			if(md5($password)==$admin['password'])
    			{
    				$state = 1;
    				$errorInfo = '';
    			}else{
    				$state = 0;
    				$errorInfo = '用户名或密码错误';
    			}
    			$this->ajaxReturn(array('state'=>$state,'errorInfo'=>$errorInfo));
    		}


		}

	}
?>