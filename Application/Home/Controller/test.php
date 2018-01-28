<?php
$accessKey = '58Lg-AxchuJG3Hr4UjgwWmL5LGJdlePRdn6666';  
        $secretKey = 'Hr47oR6Tdv-AMMvDrgdkuoYdiDScarRD7777';  
        $bucket = 'melvita';  
        $auth = new Auth($accessKey, $secretKey);  
        $upToken = $auth->uploadToken($bucket);  
        $rand = rand(1111,9999);  
        $now = time();  
        $name = 'melvita/'.$now.$rand;  
        $bodyKey = base64_encode($name);  
          
        $str= isset($_POST['imgstr'])?$_POST['imgstr']:false;//图片BASE64  
        if($str){  
            $qiniu = phpCurlImg("http://up-z1.qiniu.com/putb64/-1/key/".$bodyKey,$str,$upToken);  
            $qiniuArr = json_decode($qiniu,true);  
            if($qiniuArr['key']==$name){  
                setcookie('qiniuImg',$name,time()+1000);  
                $return['info']['code'] = 'S001';  
                $return['data']['name'] = '_286f67d5b83550bfed5b1ce8b3af0c63';  
                $return['data']['type'] = 'jpg';  
                $return['data']['filename'] = 'http://oog4uis9x.bkt.clouddn.com/'.$name;  
                $return['msg'] = '提交成功';  
            }else{  
                $return['status'] = 0;  
                $return['msg'] = '上传失败';  
            }  
        }else{  
            $return['status'] = 0;  
            $return['msg'] = '参数不全';  
        }  
  
function phpCurlImg($remote_server,$post_string,$upToken) {    
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
?>