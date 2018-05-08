<?php
return array(
	//'配置项'=>'配置值'
	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '120.24.242.45', // 服务器地址
    'DB_NAME'               =>  'shejuyi',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'xiaoheiwu',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sjy_',    // 数据库表前缀
    'LAYOUT_ON'             =>   true,     //使用模板布局
    'TMPL_EXCEPTION_FILE'   =>  '/404.html',// 异常页面的模板文件
    'ERROR_PAGE'            =>  '/404.html', // 错误定向页面
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
