<?php
	namespace Home\Controller;
	Vendor('qiniu.autoload');  //七牛入口文件引入 
	use Think\Controller;
	// 引入鉴权类
	use Qiniu\Auth;
	// 引入上传类
	use Qiniu\Storage\UploadManager;
	class UploadController extends Controller
	{
	   //文件上传
	   //$file1 原文件   $file2新文件
       public function singUpload($file1,$file2)
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
			$filePath = $file1;

			// 上传到七牛后保存的文件名 
			$key = $file2;

			// 初始化 UploadManager 对象并进行文件的上传。
			$uploadMgr = new UploadManager();

			// 调用 UploadManager 的 putFile 方法进行文件的上传。
			list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
			// echo "\n====> putFile result: \n";
			if ($err !== null) {
				return false;   //失败
			} else {
				return $ret;    //成功
			}

       }
       public function base64Upload()
       {
	        $accessKey = "wHEzFcA6lp2GKlVaCi_aaR2TLr4Vkqg6UhJvMgsG";
			$secretKey = "Yy2yJPJ3r8Ze6wXZoa-MjtbIwV8nDUwBbtRqPHZV";
			$bucket = "xiaoheiwu";

	        $auth = new Auth($accessKey, $secretKey);  
	        $upToken = $auth->uploadToken($bucket);  
	        $rand = rand(1111,9999);  
	        $now = time();  
	        $name = 'melvita/'.$now.$rand;  
	        $bodyKey = base64_encode($name);  
	        $str ='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';  
	        // $str= isset($_POST['imgstr'])?$_POST['imgstr']:false;//图片BASE64  
	        if($str){  
	            $qiniu = $this->phpCurlImg("http://up.qiniup.com/putb64/-1/key/".$bodyKey,$str,$upToken); 
	            
	            $qiniuArr = json_decode($qiniu,true);  
	            if($qiniuArr['key']==$name){  
	                // setcookie('qiniuImg',$name,time()+1000);  
	                // $return['info']['code'] = 'S001';  
	                // $return['data']['name'] = '_286f67d5b83550bfed5b1ce8b3af0c63';  
	                // $return['data']['type'] = 'jpg';  
	                // $return['data']['filename'] = 'http://oog4uis9x.bkt.clouddn.com/'.$name;  
	                var_dump('http://oog4uis9x.bkt.clouddn.com/'.$name); 
	            }else{  
	               var_dump('上传失败');
	            }  
	        }else{  
	            var_dump('参数不全');
	        }  
	  }
			public function phpCurlImg($remote_server,$post_string,$upToken)
			{    
			        $headers = array();  
			        $headers[] = 'Content-Type:image/png';  
			        $headers[] = 'Authorization:UpToken '.$upToken;  
			        $ch = curl_init();    
			        curl_setopt($ch, CURLOPT_URL,$remote_server);    
			        //curl_setopt($ch, CURLOPT_HEADER, 0);  
			        curl_setopt($ch, CURLOPT_HTTPHEADER ,$headers);  
			        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
			        //curl_setopt($ch, CURLOPT_POST, 1);  
			        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);  
			        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);  
			        curl_setopt($ch, CURLOPT_TIMEOUT, 30);  
			        $data = curl_exec($ch);    
			        curl_close($ch);    
			        return $data;    
			} 
	}
?>