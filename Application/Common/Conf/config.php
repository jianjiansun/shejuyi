<?php
return array(
	//'配置项'=>'配置值'
	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '39.106.171.98', // 服务器地址
    'DB_NAME'               =>  'shejuyi',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '89C4e3033e13',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sjy_',    // 数据库表前缀
    'LAYOUT_ON'             =>   true,     //使用模板布局

    'UPLOAD_SITEIMG_QINIU' => array ( 
                    'maxSize' => 5 * 1024 * 1024,//文件大小
                    'rootPath' => './',
                    'saveName' => array ('uniqid', ''),
                    'driver' => 'Qiniu',
                    'driverConfig' => array (
                            'accessKey' => 'wHEzFcA6lp2GKlVaCi_aaR2TLr4Vkqg6UhJvMgsG',
                            'secretKey' => 'Yy2yJPJ3r8Ze6wXZoa-MjtbIwV8nDUwBbtRqPHZV', 
                            'domain' => 'p33g9t7dr.bkt.clouddn.com',
                            'bucket' => 'xiaoheiwu', 
                    )
    )
);
