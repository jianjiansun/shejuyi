<?php
namespace Home\Controller;
use Think\Controller;
class CommunityController extends Controller {
    public function index(){

      $this->assign("isidentify",1);
      $this->display();
    }
}
?>