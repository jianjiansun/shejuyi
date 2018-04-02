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
       //传入参数 base64格式'/9j/4AAQSkZJRgABAQEASABIAAD/4QTkRXhpZgAATU0AKgAAAAgAEgEOAAIAAAAgAAAA5gEPAAIAAAAgAAABBgEQAAIAAAAgAAABJgESAAMAAAABAAEAAAEaAAUAAAABAAABRgEbAAUAAAABAAABTgEoAAMAAAABAAIAAAExAAIAAAAgAAABVgEyAAIAAAAUAAABdgITAAMAAAABAAIAAAIgAAQAAAABAAAAAAIhAAQAAAABAAAAAAIiAAQAAAABAAAAAAIjAAQAAAABAAAAAAIkAAQAAAABAAAAAQIlAAIAAAAgAAABiodpAAQAAAABAAABqoglAAQAAAABAAADKgAABGYgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgAE1laXp1ICAgICAgICAgICAgICAgICAgICAgICAgICAAbTEgbm90ZSAgICAgICAgICAgICAgICAgICAgICAgIAAAAABIAAAAAQAAAEgAAAABRmx5bWUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAyMDE1OjA0OjMwIDIwOjE1OjIyAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABaCmgAFAAAAAQAAAriCnQAFAAAAAQAAAsCIIgADAAAAAQAAAACIJwADAAAAAQCgAACQAAAHAAAABDAyMjCQAwACAAAAFAAAAsiQBAACAAAAFAAAAtyRAQAHAAAABAECAwCSBAAKAAAAAQAAAvCSBwADAAAAAQACAACSCAADAAAAAQD/AACSCQADAAAAAQAAAACSCgAFAAAAAQAAAvigAAAHAAAABDAxMDCgAQADAAAAAQABAACgAgAEAAAAAQAADCCgAwAEAAAAAQAAEGCgBQAEAAAAAQAAAwCkAgADAAAAAQAAAACkAwADAAAAAQAAAACkBAAFAAAAAQAAAyCkBgADAAAAAQAAAAAAAAAAAABOIwAPQkAAAAAWAAAACjIwMTU6MDQ6MzAgMjA6MTU6MjIAMjAxNTowNDozMCAyMDoxNToyMgAAAAAAAAAACgAAAX0' 
       //path 路劲
       public function base64Upload($base64,$path)
       {
	        $accessKey = "wHEzFcA6lp2GKlVaCi_aaR2TLr4Vkqg6UhJvMgsG";
			$secretKey = "Yy2yJPJ3r8Ze6wXZoa-MjtbIwV8nDUwBbtRqPHZV";
			$bucket = "xiaoheiwu";

	        $auth = new Auth($accessKey, $secretKey);  
	        $upToken = $auth->uploadToken($bucket);  
	        $rand = rand(1111,9999);  
	        $now = time();  
	        $name = $path;  
	        $bodyKey = base64_encode($name);  
	        $str = $base64; 
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
	                return true; //上传成功
	            }else{  
	                 return false; //上传失败
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