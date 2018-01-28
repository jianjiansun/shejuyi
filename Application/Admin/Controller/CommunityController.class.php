<?php
	namespace Admin\Controller;
	use Think\Controller;
	class CommunityController extends Controller
	{
		//社区列表画面
		public function index()
		{
			$this->dispaly();
		}
		//社区列表接口
		public function getcommunitylist()
		{
			//当前页码
			$page = I('get.page')?I('get.page'):1;
			$length = 15;
			$start = ($page-1)*$length;
			$limit = $start.','.$length;
			//查询社区列表
			$community = M('community_base_info')->limit($limit)->select();
			//获取社区其他信息
			//城市 地址 管理员姓名 联系电话（社区）管理员手机号 社区里工作人员数量 社区项目总数 社区注册时间
			foreach($community as $key=>$value)
			{
				//查询城市
				$position_info = M('community_position_info')->where(array('sjy_community_id'=>$value['sjy_id']))->find();
				$community[$key]['city'] = $position_info['sjy_community_city_name']; //城市名
				$community[$key]['street'] = $position_info['sjy_community_street_name'];//街道名
				//查询管理员信息
				$admin_info = M('community_user_info')->where(array('sjy_id'=>$value['sjy_community_admin_id']))->find();
				$community[$key]['admin_name'] = $admin_info['sjy_community_user_real_name']; //社区管理员姓名
				$community[$key]['admin_phone'] = $admin_info['sjy_community_login_id']; //社区管理员手机号;
				//社区工作人员总数
				$community[$key]['staff_number'] = M('community_user_info')->where(array('sjy_community_user_community_code'=>$value['sjy_id']))->count();
				//社区发布的项目总数
				$community[$key]['project_number'] = M('community_project_info')->where(array('sjy_community_id'=>$value['sjy_id']))->count();

			}
			//社区总数
			$pages = M('community_base_info')->count();
			$pages = ceil($pages)/15;
		}
		//社区工作人员画面
		public function communitypeople()
		{

			$this->dispaly();
		}
		//获得社区工作人员列表接口
		public function getcommunityproplelist()
		{
			//当前页码
			$page = I('get.page')?I('get.page'):1;
			$length = 15;
			$start = ($page-1)*$length;
			$limit = $start.','.$length;
			//社区id
			$community_id = I('get.community_id');
			//查询社区工作人员信息
			//基本信息以及该员工发布的项目数量
			$staff_info = M('community_user_info')->where(array('sjy_community_user_community_code'=>$community_id))->limit($limit)->select();
			foreach($staff_info as $key=>$value)
			{
				//查询该员工发布了多少项目
				$staff_info[$key]['project_number'] = M('community_project_info')->where(array('sjy_community_project_send_people_id'=>$value['sjy_id']))->count();
			}
			//员工总数
			$pages = M('community_base_info')->count();
			$pages = ceil($pages)/15;

		}
		//项目列表画面
		public function communityproject()
		{
			$this->dispaly();
		}
		//社区项目接口 
		public function getcommunityprojectlist()
		{
			//1 查询所有项目  type=1
			//2 根据社区id获取项目 type=2
			//3 根据员工id获取项目 type=3
			$type = I('get.type');
			//获取所有项目
			if($type == 1)
			{
				$data = $this->getallproject();
			}
			//根据社区id获取项目
			if($type == 2)
			{
				$community_id = I('get.community_id');
				$data = $this->getprojectbycommunityid($community_id);
			}
			//根据员工id获取项目
			if($type == 3)
			{
				$staff_id = I('get.staff_id');
				$data = $this->getprojectbystaffid($staff_id);
			}

		}

		//获取所有项目
		public function getallproject()
		{
			//当前页码
			$page = I('get.page')?I('get.page'):1;
			$length = 15;
			$start = ($page-1)*$length;
			$limit = $start.','.$length;
			//查询项目
			//项目名字 项目发布社区 项目发布人 项目发布时间 项目状态 项目方 操作
			$project_info = M('community_project_info')->limit($limit)->select();
			//查询项目状态
			foreach($project_info as $key=>$value)
			{
				$status = $value['sjy_community_project_status'];
				if( $status == 0){
					$project_info[$key]['status'] = '征集中';
				}else if($status == 1){
					$project_info[$key]['status'] = '执行中';
				}else if($status == 2)
				{
					$project_info[$key]['status'] = '已完成';
				}else if($status == 3){
 					$project_info[$key]['status'] = '已延期';
				}else if($status == -1){
					$project_info[$key]['status'] = '已失败'; 
				}
				
			}
			//项目总数
			$pages = M('community_project_info')->count();
			$pages = ceil($pages)/15;
		} 
		//根据社区id获取项目信息
		public function getprojectbycommunityid($community_id)
		{
			//当前页码
			$page = I('get.page')?I('get.page'):1;
			$length = 15;
			$start = ($page-1)*$length;
			$limit = $start.','.$length;
			//查询项目
			$project_info = M('community_project_info')->where(array('sjy_community_id'=>$community_id))->limit($limit)->select();
			//项目总数
			$pages = M('community_project_info')->where(array('sjy_community_id'=>$community_id))->count();
			$pages = ceil($pages)/15;
		}
		//根据发布者id查询项目
		public function getprojectbystaffid($staff_id)
		{
			//当前页码
			$page = I('get.page')?I('get.page'):1;
			$length = 15;
			$start = ($page-1)*$length;
			$limit = $start.','.$length;
			//查询项目
			$project_info = M('community_project_info')->where(array('sjy_community_project_send_prople_id'=>$staff_id))->limit($limit)->select();
			//项目总数
			$pages = M('community_project_info')->where(array('sjy_community_project_send_prople_id'=>$staff_id))->count();
			$pages = ceil($pages)/15;
		}

	}