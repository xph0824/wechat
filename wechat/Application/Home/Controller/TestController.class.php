<?php
namespace Home\Controller;
use Think\Controller;



class TestController extends Controller {
		 //��ȡ�û���ϸ��Ϣ
    public function test(){
        $UserInfo = M('User');
		var_dump($UserInfo);
    }


}