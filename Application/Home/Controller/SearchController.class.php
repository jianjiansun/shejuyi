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
	            $docs = $search->setQuery($search_body)->setLimit(10,$offset)->search();
                  
              $count = $search->setQuery($search_body)->count();
            }else{
	            $docs = $search->setQuery($search_body)->addRange('sjy_community_project_service_area_id', $type, $type)->setLimit(10,$offset)->search();
              $count = $search->setQuery($search_body)->addRange('sjy_community_project_service_area_id', $type, $type)->count();
           }
           $ret['count'] = $count;
                  
           foreach($docs as $key=>$value)
           {
              
              $ret['data'][$key]['sjy_id'] = $value->sjy_id;
              $ret['data'][$key]['sjy_community_name'] = $value->sjy_community_name;
              $ret['data'][$key]['community_info']['sjy_community_name'] = $value->sjy_community_name;
              $ret['data'][$key]['sjy_community_project_title'] = $value->sjy_community_project_title;
              $ret['data'][$key]['sjy_community_project_service_area'] = $value->sjy_community_project_service_area;
              $ret['data'][$key]['project_image_path'] = $value->project_image_path;
              $ret['data'][$key]['address']['sjy_community_province_name'] = $value->sjy_community_province;
              $ret['data'][$key]['address']['sjy_community_city_name'] = $value->sjy_community_city;
              $ret['data'][$key]['address']['sjy_community_area_name'] = $value->sjy_community_area;
              $ret['data'][$key]['address']['sjy_community_street_name'] = $value->sjy_community_street;
           }
           if(empty($docs))
           {
              $ret['data'] = array();
           }
           $this->ajaxReturn($ret);
		}
    //总数据数量
    public function getCount()
    {
      //接收参数
      $search_body = I('get.search_body')?I('get.search_body'):""; //搜索框里输入的内容
      
      $type = I('get.type')?I('get.type'):"";  //二次筛选的条件

      
      $xs = new \XS('demo'); // 建立 XS 对象，项目名称为：demo
      $search = $xs->search; // 获取 搜索对象
     // $docs = $search->search('郭淑青');
     // var_dump($docs);die;
      if(empty($type)){
              $count = $search->setQuery($search_body)->count();
            }else{
              $count = $search->setQuery($search_body)->addRange('sjy_community_project_service_area_id', $type, $type)->count();
           }
           $this->ajaxReturn($count);
    }
	}
