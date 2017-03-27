<?php
namespace Home\Controller;
use Think\Controller;



class TestController extends Controller {
		 //获取用户详细信息
    public function test(){
        $UserInfo = M('User');
		var_dump($UserInfo);
    }


}