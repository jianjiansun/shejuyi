<?php
	namespace Home\Controller;
	use Think\Controller;
	class TestController extends Controller
	{
       public function index()
       {
       		$this->display();
       } 
       public function haha()
       {
       	     var_dump($_FILES);
       	     var_dump($_POST);
       		// $this->file_upload();
       }
	   //发送项目书
	   public  function file_upload()
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
	  //   	//文件大小检测
			// $path = "/Uploads/project_book/".$info["file"]['savepath'].$info["file"]['savename'];
	  //   	//社区id'
	  //   	$community_id = $project_info['sjy_community_id'];
	  //   	//发送者id
	  //   	$userId = session("userInfo")["sjy_id"];
	  //   	//发送时间
	  //   	$time = date("Y-m-d H:i:s");
	  //   	//项目id
	  //   	$project_id = $project_id;
	  //   	//社会组织id
	  //   	$origanization_id = session("userInfo")["sjy_origanization_user_origanization_code"];
	  //   	//将信息插入sjy_project表  首先去找有没有该条记录，有并且status=1，则不操作sjy_project表 除此之外则操作该表
	  //   	$isupload = M("project")->where(array("project_id"=>$project_id,"community_id"=>$community_id,"origanization_id"=>$origanization_id))->find();
	  //   	$model = new Model();
   //          $model->startTrans();
	  //   	//需要新增 之前没有项目联系过
	  //   	if(empty($isupload))
	  //   	{
	  //   		$data["project_id"] = $project_id;
		 //    	$data["community_id"] = $community_id;
		 //    	$data["origanization_id"] = $origanization_id;
		 //    	$data['status'] = 1;  //已经发送项目书
	  //   		$res = M("project")->add($data);
	  //   	}else{
	  //   		$res = true;
	  //   	}
	  //   	//将信息插入项目书表
	  //   	$param['sjy_project_id'] = $project_id;
	  //   	$param['sjy_origanization_id'] = $origanization_id;
	  //   	$param['sjy_community_id'] = $community_id;
	  //   	$param['sjy_project_book_send_time'] = $time;
	  //   	$param['sjy_project_path'] = $path;
	  //   	$param['sjy_project_book_name'] = $filename;
   //          $param['project_book_send_people'] = session('userInfo')['sjy_origanization_user_real_name'];  //项目书发送者
   //          $param['project_book_send_people_id'] = session('userInfo')['sjy_id'];  //发送者id            
	  //   	$val = M('project_book')->add($param);
		 //    if ($res&&$val){
			//     // 提交事务
			//     $model->commit(); 
			//     return array("state"=>1,"errorInfo"=>"发送成功"));
			// }else{
			//     // 事务回滚
			//     $model->rollback(); 
			//     return array("state"=>7,"errorInfo"=>"系统错误,请重试"));
			// }
	    	
	    }
	}
?>