<?php
	namespace Home\Controller;
	
	use Think\Controller;
	use Home\Controller\UploadController;
	class TestController extends Controller
	{
       	   //文件上传
       	   //$file1 原文件   $file2新文件
              public function index()
              {
              		$this->display();
              }
              public function upload()
              {
       	     $upload = new UploadController();
       	     $file = $_FILES['file']; //文件

       	     $tmp_name = $file['tmp_name'];
                   
                   $filename = time();
                   foreach($tmp_name as $key=>$value)
                   {
              	$filename++;
       	    	$pathinfo = pathinfo($file['name'][$key]);
       	    	$extension = $pathinfo['extension']; //扩展名
       	    	$newpath = '/origanization/project_img/'.date('Y-m-d',time()).'/'.$filename.'.'.$extension;
       	    	$upload->singUpload($value,$newpath);   	
                   }

              }
	}
?>