<?php
namespace Pub\Controller;
use Think\Controller;
use Think\Model;


class SuggestController extends Controller{
	
	//²Íºó
	public function afterLow(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	public function afterHightSerious(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	public function afterHight(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	public function afterNormal(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	
	//²ÍÇ°
	public function beforeHigh(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	public function beforeHighSerious(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	public function beforeLow(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	public function beforeNormal(){
		$temp['bloodGlu'] = I('get.bloodGlu');
		$res['time'] = I('get.time');
		//var_dump($bloodGlu);die;
		$this->assign('temp', $temp);
		$this->assign('res', $res);

		$this->display();
	}
	
	

	public function member(){		

		$this->display();
	}
	

	public function share(){
	
		$this->display();
	}
	

	public function show(){

		$this->display();
	}
	
}