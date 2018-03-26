<?php
	namespace Home\Controller;
	Vendor('qiniu.autoload');  //七牛入口文件引入 
	use Think\Controller;
	// 引入鉴权类
	use Qiniu\Auth;
	// 引入上传类
	use Qiniu\Storage\UploadManager;
	class TestController extends Controller
	{
       public function index()
       {
       		// 需要填写你的 Access Key 和 Secret Key
			$accessKey = "wHEzFcA6lp2GKlVaCi_aaR2TLr4Vkqg6UhJvMgsG";
			$secretKey = "Yy2yJPJ3r8Ze6wXZoa-MjtbIwV8nDUwBbtRqPHZV";
			$bucket = "xiaoheiwu";

			// 构建鉴权对象
			$auth = new Auth($accessKey, $secretKey);

			// 生成上传 Token
			$token = $auth->uploadToken($bucket);

			// 要上传文件的本地路径
			$filePath = './moren.png';

			// 上传到七牛后保存的文件名 
			$key = 'my/php/logo.png';

			// 初始化 UploadManager 对象并进行文件的上传。
			$uploadMgr = new UploadManager();

			// 调用 UploadManager 的 putFile 方法进行文件的上传。
			list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
			echo "\n====> putFile result: \n";
			if ($err !== null) {
				var_dump($err);
			} else {
				var_dump($ret);
			}

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