<?php
//设置字符集
//header("Content-Type:text/html; charset=utf-8");
namespace Pub\Controller;
use Think\Controller;

class IndexController extends Controller {
	
	//血糖展示
	public function index(){
		$openid = I('get.openid');

		$User = M('user');
		$cond['openid'] = $openid;
		$user_info = $User->where($cond)->find();
		$this->assign('user_info', $user_info);
		//var_dump($user_info);die;
		$devid = $user_info['devid'];
		if(!$devid){
			$this->redirect('Index/err');
		}
		$Test = M('test');
		$record = $Test->where('devid='.$devid)->order('time DESC')->limit(1)->select();
		$cond2['devid'] = $devid;
		$cond2['bgState'] = 2;
		$arr['max2'] = $Test->where($cond2)->max('bloodGlu');
		$arr['min2'] = $Test->where($cond2)->min('bloodGlu');
		$avg2 = $Test->where($cond2)->avg('bloodGlu');
		$arr['avg2'] = round($avg2, 2);
		
		$cond1['devid'] = $devid;
		$cond1['bgState'] = 1;
		$arr['max1'] = $Test->where($cond1)->max('bloodGlu');
		$arr['min1'] = $Test->where($cond1)->min('bloodGlu');
		$avg1 = $Test->where($cond1)->avg('bloodGlu');
		$arr['avg1'] = round($avg1, 2);
		
		//var_dump($arr);die;
	
		$this->assign('arr', $arr);
		$this->assign('record', $record);
		//var_dump($res1);die;
		
		$this->display();
		
		
	}
	
	//注册
	public function register(){
		$data = array();
		$data['openid'] = $_GET['openid'];
		$Register = M('register');
		
		$Shop = M('shop');
		$nums= $Shop->select();
	
		if (IS_POST) {
		
			$data['tel'] = $_POST['tel'];	
			$data['user'] = $_POST['user'];
			$data['sex'] = $_POST['sex'];
			$data['connection'] = $_POST['cond'];
			$data['province'] = $_POST['cho_Province'];
			$data['city'] = $_POST['cho_City'];
			$data['area'] = $_POST['cho_Area'];
			$data['addres'] = $_POST['addres'];
			$data['shop'] = $_POST['shop']; //门店名称
			
			$cond['openid'] = $_GET['openid'];
			
			$row = $Register->where($cond)->find();

			//var_dump($row);die;
			if ($row) {
				$this->error('该微信已注册，请勿重复注册!');
			}
			$Register->create($data, 'register');
			//var_dump($data);die;
			$res = $Register->add();
			$mobtel  = $data['tel'];
			$msg = "益康臻品云健康管理系统欢迎您的加入！今后将有专业的健康管理师一对一为您服务，健康专员将通过电话010-51758587联系您，请牢记该电话号码！【益康臻品】";//【56短信网】 可以换成自己的签名
			$msg = urlencode(iconv("UTF-8","gbk",$msg));
			
			$this->sendnote($mobtel,$msg);
			$this->redirect('Index/regis');
			
			

		} else {
			// 展示注册表单
			$this->assign('nums', $nums);
			$this->display();
		}
	}
	
	//注册成功发送短信
	public function sendnote($mobtel,$msg){
		
		//帐号配置文件
		$comid= "2957"; //企业ID
		$username= "ykzp"; //用户名
		$userpwd= "xj6xzhqg"; //密码
		$smsnumber= "10690"; //所用平台
		$url = "http://jiekou.56dxw.com/sms/HttpInterface.aspx?comid=$comid&username=$username&userpwd=$userpwd&handtel=$mobtel&sendcontent=$msg&sendtime=&smsnumber=$smsnumber";
		$string = file_get_contents($url);
		//var_dump($url);die;
		//return  $this->rstr($string);
	}
	
	//个人中心
	public function myhome(){
		$res = $_GET;
		//var_dump($_GET);die;
		
		$Register = M('register');
		$cond['openid'] = $_GET['openid'];
		
		$rows = $Register->where($cond)->select();
		//var_dump($rows);die;
		if(!$rows){
			$this->redirect('Index/err');
		}
		//var_dump($rows);die;
		$head['headimgurl'] = $_GET['headimgurl'];
		$this->assign('head', $head);
		$this->assign('rows', $rows);
		$this->display();
		
	}
	
	//用户关注页面
	public function carefor(){
		$openid = ($_GET);
		$Register = M('register');
		$User = M('User');
		
		$cond['openid'] = $openid['id'];
		$rows = $Register->where($cond)->select();
		$user = $User->where($cond)->select();
		//var_dump($user);die;
		
		$this->assign('rows', $rows);
		$this->assign('user', $user);
		$this->display();
	}
	
	//健康报告
	public function health_report(){
		//var_dump($_GET);die;
		$openid['openid'] = $_GET['id'];
		$Register = M('register');		
		$cond['openid'] = $openid['openid'];
		$rows = $Register->where($cond)->select();
		//var_dump($rows);die;
		$this->assign('rows', $rows);
		$this->display();
	}
	
	//按月查看月报表
	public function month_look(){

		$cond['openid'] = $_GET['openid'];
		$get = $_GET['date'];		
		$y = substr($get,0,4);
		$m = substr($get,5,2);

		$User = M('user');
		$Test = M('test');
		$user_info = $User->where($cond)->find();
		//$this->assign('user_info', $user_info);		
		$devid = $user_info['devid'];
		$firstday = date($y.'-'.$m.'-01', strtotime(date("Y-m-d")));
		$lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
		
		$cond['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond['devid'] = $devid;
		$month = $Test->where($cond)->select();
		$arr['max'] = $Test->where($cond)->max('bloodGlu');
		$arr['min'] = $Test->where($cond)->min('bloodGlu');
		$avg = $Test->where($cond)->avg('bloodGlu');
		$arr['avg'] = round($avg, 1);
		$bloodglu = array_column($month,'bloodglu');
		$arr['count'] = count($bloodglu);
		
		$arr['bad'] = $arr['avg'] - 6.2;
		if($arr['bad'] > 0){
			$arr['hint'] = '高';
		}else{
			$arr['hint'] = '低';
		}
		
///////////////////////////////////////////////////////////////////////用于第三页		
		$condavg1['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$condavg1['devid'] = $devid;
		$condavg1['bgState'] = 1;//餐后
		$result1 = $Test->where($condavg1)->avg('bloodGlu');
		$temp1 = $Test->where($condavg1)->select();
		$arr['max1'] = $Test->where($condavg1)->max('bloodGlu');
		$arr['min1'] = $Test->where($condavg1)->min('bloodGlu');
		$arr['condavg1'] = round($result1, 1);
		$arr['total1'] = $Test->where($condavg1)->count();
		$bloodglu1 = array_column($temp1,'bloodglu');
		foreach($bloodglu1 as $v){
			if( $v > 3.9 && $v < 7.7 ){
				$arr['normal1'] ++;  //正常次数
			}
		}
		$arr['abnormal1'] = $arr['total1'] - $arr['normal1'];  //异常次数 餐后
		//var_dump($arr['normal'],$bloodglu1);die;
	
		$condavg2['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$condavg2['devid'] = $devid;
		$condavg2['bgState'] = 2;//餐前
		$result2 = $Test->where($condavg2)->avg('bloodGlu');
		$temp2 = $Test->where($condavg2)->select();
		$arr['max2'] = $Test->where($condavg2)->max('bloodGlu');
		$arr['min2'] = $Test->where($condavg2)->min('bloodGlu');
		$arr['condavg2'] = round($result2, 1);	
		$arr['total2'] = $Test->where($condavg2)->count();
		$bloodglu2 = array_column($temp2,'bloodglu');
		foreach($bloodglu2 as $v){
			if( $v > 6.7 && $v < 8.9 ){
				$arr['normal2'] ++; //正常次数
			}
		}
		$arr['abnormal2'] = $arr['total2'] - $arr['normal2']; //异常次数 餐前
		
////////////////////////////////////////////////////////////////////////////////////

		//月初
		$cond1['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond1['devid'] = $devid;
		$cond1['bgState'] = 1;//餐后
		$month1 = $Test->where($cond1)->order('time asc')->limit(1)->select();
		$bloodglu1 = array_column($month1,'bloodglu');
		$test_time1 = array_column($month1,'time');	
		$cond2['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond2['devid'] = $devid;
		$cond2['bgState'] = 2;//餐前
		$month2 = $Test->where($cond2)->order('time asc')->limit(1)->select();
		$bloodglu2 = array_column($month2,'bloodglu');

		//月末
		$con1['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$con1['devid'] = $devid;
		$con1['bgState'] = 1;//餐后
		$mmonth1 = $Test->where($con1)->order('time desc')->limit(1)->select();
		$mbloodglu1 = array_column($mmonth1,'bloodglu');
		$mtest_time1 = array_column($mmonth1,'time');		
		$con2['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$con2['devid'] = $devid;
		$con2['bgState'] = 2;//餐前
		$mmonth2 = $Test->where($con2)->order('time desc')->limit(1)->select();
		$mbloodglu2 = array_column($mmonth2,'bloodglu');
				
		
		$this->assign('arr', $arr);
		$this->assign('bloodglu1', $bloodglu1);
		$this->assign('test_time1', $test_time1);
		$this->assign('bloodglu2', $bloodglu2);
		
		$this->assign('mbloodglu1', $mbloodglu1);
		$this->assign('mtest_time1', $mtest_time1);
		$this->assign('mbloodglu2', $mbloodglu2);
		
		//var_dump($mmonth1,$mmonth2);die;
		$this->display();
	}
	
	//用户信息修改
	public function resive(){
		$openid = $_GET;
		//var_dump($openid);die;
		$Register = M('register');		
		$cond['openid'] = $openid['id'];
		$rows = $Register->where($cond)->select();
		
		$User = M('User');
		$res = $User->where($cond)->getField('devid');
		
		$con['devid'] = $res;
		$res = $User->where($con)->select();//将来用于展示用户列表
		$quantity['num'] = count($res);
			
		if (IS_POST) {
	
			$result = $Register->create();
            $result = $Register->save();
            //重定向
            $this->redirect('success');

        } else {

            $this->assign('rows', $rows);
			$this->assign('quantity', $quantity);
			$this->display();
        }
	}
	
	
	//月报表
	public function month(){
		$cond['openid'] = $_GET['openid'];
		$User = M('user');
		$Test = M('test');
		$user_info = $User->where($cond)->find();
		//$this->assign('user_info', $user_info);		
		$devid = $user_info['devid'];
		$firstday = date('Y-m-01', strtotime(date("Y-m-d")));
		$lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
		$cond['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond['devid'] = $devid;
		$month = $Test->where($cond)->select();
		$arr['max'] = $Test->where($cond)->max('bloodGlu');
		$arr['min'] = $Test->where($cond)->min('bloodGlu');
		$avg = $Test->where($cond)->avg('bloodGlu');
		$arr['avg'] = round($avg, 1);
		$bloodglu = array_column($month,'bloodglu');
		$arr['count'] = count($bloodglu);

		$cond1['devid'] = $devid;
		$cond1['bgState'] = 1;
		$month1 = $Test->where($cond1)->select();
		$mbloodglu1 = array_column($month1,'bloodglu');
		$this->assign('bloodglu', $bloodglu);
		//var_dump($res);die;
		$this->assign('arr', $arr);
		$this->display();
		
	}
	
	
	//统计图表
	public function cartogram(){
		//var_dump($_GET);die;
		
		$cond['openid'] = $_GET['openid'];
		$User = M('user');
		
		$user_info = $User->where($cond)->find();
		$this->assign('user_info', $user_info);
		//var_dump($user_info);die;
		$devid = $user_info['devid'];
		if(!$devid){
			$this->redirect('Index/err');
		}
		$Test = M('test');
////////////////////////////////////////////////////////////////////////////// 日记录
		$cond3['devid'] = $devid;
		$firstday = date('Y-m-d 00:00:00');
		$lastday = date('Y-m-d 23:59:59');
		$cond3['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond3['bgState'] = 2;//餐前
		$record2 = $Test->where($cond3)->select();	//var_dump($record2);die;
		$bloodglu2 = array_column($record2,'bloodglu');
		$bloodglu2 = json_encode($bloodglu2);
		foreach($record2 as $k=>$val){
			$dtimearr2[] = $val['time'];
		  
		}
		

		$cond4['devid'] = $devid;
		$firstday = date('Y-m-d 00:00:00');
		$lastday = date('Y-m-d 23:59:59');
		$cond4['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond4['bgState'] = 1;//餐后
		$record1 = $Test->where($cond4)->select();	//var_dump($record1);die;
		$bloodglu1 = array_column($record1,'bloodglu');
		$bloodglu1 = json_encode($bloodglu1);
		foreach($record1 as $k=>$val){
			$dtimearr1[] = $val['time'];
		  
		}
		
		if(count($dtimearr1) > count($dtimearr2)){
			$dtime = $dtimearr1;
		}else{
			$dtime = $dtimearr2;
		}
		
		$dtime = json_encode($dtime);
		$this->assign('bloodglu2', $bloodglu2);
		$time = date('Y-m-d');
		$this->assign('time', $time);
		$this->assign('dtime', $dtime);
		$this->assign('bloodglu1', $bloodglu1);
		//var_dump($record1);die;
//////////////////////////////////////////////////////////////////////////////月记录

		$firstday = date('Y-m-01', strtotime(date("Y-m-d")));
		$lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
		$cond2['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond2['devid'] = $devid;
		$cond2['bgState'] = 2;//餐前
		$month2 = $Test->where($cond2)->select();
		$arr['max2'] = $Test->where($cond2)->max('bloodGlu');
		$arr['min2'] = $Test->where($cond2)->min('bloodGlu');
		$avg2 = $Test->where($cond2)->avg('bloodGlu');
		$arr['avg2'] = round($avg2, 1);
		$mbloodglu2 = array_column($month2,'bloodglu');
		//$mtime2 = array_column($month2,'time');
		foreach($month2 as $k=>$val){
			$timearr2[] =  date('Y-m-d',strtotime($val['time']));
		  
		}
		$mbloodglu2 = json_encode($mbloodglu2);
		
		
		$cond1['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond1['devid'] = $devid;
		$cond1['bgState'] = 1;
		$month1 = $Test->where($cond1)->select();
		$arr['max1'] = $Test->where($cond1)->max('bloodGlu');
		$arr['min1'] = $Test->where($cond1)->min('bloodGlu');
		$avg1 = $Test->where($cond1)->avg('bloodGlu');
		$arr['avg1'] = round($avg1, 1);
		$mbloodglu1 = array_column($month1,'bloodglu');
		//$mtime1 = array_column($month1,'time');		
		foreach($month1 as $k=>$val){
			$timearr1[] =  date('Y-m-d',strtotime($val['time']));
		  
		}		
		$mbloodglu1 = json_encode($mbloodglu1);
		if(count($timearr1) > count($timearr2)){
			$time = $timearr1;
		}else{
			$time = $timearr2;
		}
		foreach($time as $v){
			$times[] = date('m-d',strtotime($v));
		}
		
		//var_dump($times);die;
		$mtime = json_encode($times);			
		//var_dump($mtime);die;
		$month = date('Y-m');
		//$month = json_encode($month);
		$this->assign('mbloodglu2', $mbloodglu2);
		$this->assign('mtime', $mtime);
		$this->assign('month', $month);
		$this->assign('mbloodglu1', $mbloodglu1);

///////////////////////////////////////////////////////////////////////////////////////周记录
		
		$startday = date('Y-m-d', strtotime('-6 days'));		
		$stopday = date('Y-m-d H:i:s');
		$endday = date('Y-m-d');
	
		$weekcond2['testTime'] = array(array('gt',$startday),array('lt',$stopday)) ;
		$weekcond2['devid'] = $devid;

		$week = $Test->where($weekcond2)->select();
		
		$sday = $day = $startday;
		$flag = [];
		$temp = [];
		while( $sday <= $stopday ){
			
			$flag[$sday] = [1 => false, 2 => false];
			$temp[] = substr($sday, -2, 2);
			$sday = date( 'Y-m-d' , strtotime('+1 day', strtotime($sday)) );
			
		}

		$eatbefore = $eatAfter = [];
		while( $day <= $stopday ){
			foreach($week as $k => $v){
				if( substr($v['time'], 0, 10) == $day ){
					if( $v['bgstate'] == 1 ){	// 饭后
						$eatbefore[$day] = $v['bloodglu'];
						$flag[$day][1] = true;
					}
					if( $v['bgstate'] == 2 ){	// 饭前
						$eatAfter[$day] = $v['bloodglu'];
						$flag[$day][2] = true;
					}
				}
				if( $flag[$day][1] == false ){
					$eatbefore[$day] = 0;
				}
				if( $flag[$day][2] == false ){
					$eatAfter[$day] = 0;
				}
				
			}
			$day = date( 'Y-m-d' , strtotime('+1 day', strtotime($day)) );
		}

		/*
		$time = array_column($week,'time');
		foreach($time as $k=>$v){
			$wtime[] = date('Y-m-d', strtotime($v));
		}		
		$wtime =  array_unique($wtime);
		*/
		//$wtime = array_keys( $flag );
		
		/*
		foreach($week as $k=>$val){
			if($val['bgstate'] == 2){
				$wbloodglu2[] = $val;
			}else{
				$wbloodglu1[] = $val;
			}
		  
		}
		foreach($wtime as $k=>$v){
			$temp[] = $v;
		}
		
		//var_dump($wbloodglu2,$wbloodglu1);die;
		$wbloodglu2 = array_column($wbloodglu2,'bloodglu');
		$wbloodglu1 = array_column($wbloodglu1,'bloodglu');
		

		$wbloodglu1 = json_encode($wbloodglu1);
		$wbloodglu2 = json_encode($wbloodglu2);
		$temp = json_encode($temp);
		*/
		$wbloodglu1 = json_encode( array_values($eatbefore) );
		$wbloodglu2 = json_encode( array_values($eatAfter) );
		$temp = json_encode($temp);

		$this->assign('wbloodglu1', $wbloodglu1);
		$this->assign('wbloodglu2', $wbloodglu2);
		$this->assign('temp', $temp);

		$this->assign('startday',$startday);
		$this->assign('endday',$endday);
		//var_dump($temp);die;	
////////////////////////////////////////////////////////////////////////////////////////年记录
		$firstday = date('Y-01-01');
		$lastday = date('Y-m-d H:i:s');		
		$cond2['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond2['devid'] = $devid;
		$cond2['bgState'] = 2;//餐前
		$year2 = $Test->where($cond2)->select();
		$ybloodglu2 = array_column($year2,'bloodglu');
		foreach($year2 as $k=>$val){
			$yeararr2[] =  date('Y-m-d',strtotime($val['time']));
		  
		}
		
		
		$cond1['testTime'] = array(array('gt',$firstday),array('lt',$lastday)) ;
		$cond1['devid'] = $devid;
		$cond1['bgState'] = 1;//餐后
		$year1 = $Test->where($cond1)->select();
		$ybloodglu1 = array_column($year1,'bloodglu');
		foreach($year1 as $k=>$val){
			$yeararr1[] =  date('Y-m-d',strtotime($val['time']));
		  
		}
		
		if(count($yeararr1) > count($yeararr2)){
			$ytime = $yeararr1;
		}else{
			$ytime = $yeararr2;
		}
		
		$ybloodglu1 = json_encode($ybloodglu1);
		$ybloodglu2 = json_encode($ybloodglu2);
		$ytime = json_encode($ytime);
		$year = date('Y');
		$this->assign('ybloodglu1', $ybloodglu1);
		$this->assign('ybloodglu2', $ybloodglu2);
		$this->assign('ytime', $ytime);
		$this->assign('year', $year);
		$this->assign('firstday',$firstday);
		$this->assign('lastday',$lastday);
		//var_dump($year1);die;
////////////////////////////////////////////////////////////////////////////////////////
		$this->assign('arr', $arr);
		$this->display();
		
	}
	
	
	//设备详情
	public function device(){
		//var_dump($_GET);die;
		$openid = ($_GET);
		$this->assign('openid', $openid);
		//var_dump($openid);die;
		$this->display();
	}

	public function gyyy(){
		$this->display();
	}
	
	
	//取消关注
	public function unfollow(){
		$this->display();
	}
	
	//操作指南
	public function handle(){
		$this->display();
	}
	
	//试问问答
	public function question(){
		$this->display();
	}

	//二维码展示
	public function img(){
		//var_dump($_GET);die;
		$openid = ($_GET);
		$User = M('User');
		$cond['openid'] = $openid['id'];
		$res = $User->where($cond)->getField('devid');
		$url['code_url'] = "http://test.ykzp.com/wechat/Public/code_img/".$res.".jpg";
		//var_dump($url);die;
		$this->assign('url', $url);
		$this->display();
	}
}