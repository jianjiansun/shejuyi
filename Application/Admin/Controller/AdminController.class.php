<?php
	namespace Admin\Controller;
	use Think\Controller;
	class AdminController extends Controller
	{
		//管理员列表画面
		public function index()
		{
			$this->display();
		}
		//获取管理员列表接口 layui数据表格形式返回
		public function getadminlist()
		{
			//当前页码数
			$page = I('get.page')?I('get.page'):1;
			//每页显示数量
			$length = 15;
			$start = ($page-1)*$length;
			$limit = $start.",".$length;
			//查询数据
			$data = M('admin')->limit($limit)->select();
			//总数据量
			$pages = M('admin')->count();
			$pages = ceil($pages)/15;

		}
		//管理员新增页面
		public function adminadd()
		{
			$this->display();
		}
		//执行管理员新增
		public function doadd()
		{
			//初始化json返回
			$res['state'] = 0;
			$res['errorInfo'] = '';
			//接收数据
			$data = I('post.');
			//管理员账号
			$login_name = $data['login_name'];
			//管理员密码
			$password = $data['password'];
			//确认密码
			$repassword = $data['repassword'];
			//管理员手机号
			$phone = $data['phone'];
			//管理员角色
			$role = $data['role'];
			//管理员所在城市
			$cityid = $data['city'];
			//管理员状态
			$status = $data['status'];
			//数据校验
			if(empty($data['login_name']))
			{
				$res['errorInfo'] = '管理员账号未填写';
			}
			if(empty($data['phone']))
			{
				$res['errorInfo'] = '管理员手机号未填写';
			}
			if(empty($data['password']))
			{
				$res['errorInfo'] = '管理员密码未填写';
			}
			if(empty($data['repassword']))
			{
				$res['errorInfo'] = '管理员确认密码未填写';
			}
			if($data['password']!=$data['repassword'])
			{
				$res['errorInfo'] = '两次密码不一致';
			}
			if(empty($data['role']))
			{
				$res['errorInfo'] = '管理员角色不能为空';
			}
			if(empty($data['cityid']))
			{
				$res['errorInfo'] = '管理员城市不能为空';
			}
			//验证不通过返回
			if(!empty($res['errorInfo']))
			{
				$this->ajaxReturn($res);
				die;
			}
			//执行管理员添加
			$ret = M('admin')->add($data);
			if($ret)
			{
				$res['state'] = 1;
			}else{
				$res['errorInfo'] = '添加失败,请重试';
			}
			$this->ajaxReturn($res);
		}
	}
?>