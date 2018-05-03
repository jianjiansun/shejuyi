<?php
	namespace Home\Controller;
        header('content-type:text/html;charset=utf-8');
	use Home\Controller\BaseController;
	use Think\Controller;
	use Home\Controller\UploadController;
	class SearchController extends BaseController
	{
		//社会组织搜索社区发布的项目
		public function searchCommunityProject()
		{
			//接收参数
			$search_body = I('get.search_body')?I('get.search_body'):""; //搜索框里输入的内容
            
			$type = I('get.type')?I('get.type'):"";  //二次筛选的条件
                        
            $page = I('get.page')?I('get.page'):1; //页码

            $offset = ($page-1)*10;  
            
            $xs = new \XS('demo'); // 建立 XS 对象，项目名称为：demo
            $search = $xs->search; // 获取 搜索对象
           // $docs = $search->search('郭淑青');
           // var_dump($docs);die;
 			if(empty($type)){
	            $docs = $search->setQuery($search_body)->setLimit($offset,10)->search();
                $count = $search->setQuery($search_body)->count();
            }else{
	            $docs = $search->setQuery($search_body)->addRange('sjy_community_project_service_area_id', $type, $type)->setLimit($offset,10)->search();
                $count = $search->setQuery($search_body)->addRange('sjy_community_project_service_area_id', $type, $type)->count();
           }
                       
           foreach($docs as $key=>$value)
           {
              echo $value->sjy_id;die;
           }
		}
	}
