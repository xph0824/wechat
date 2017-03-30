<?php
namespace Home\Controller;
use Think\Controller;
session_start();

class IndexController extends Controller {

    public function __construct(){

    }
	
    public function index(){
        //获得参数 signature nonce token timestamp echostr
        $nonce     = $_GET['nonce'];
        $token     = 'wechat';
        $timestamp = $_GET['timestamp'];
        $echostr   = $_GET['echostr'];
        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);
        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        if( $str  == $signature && $echostr ){
            //第一次接入weixin api接口的时候
            echo  $echostr;
            exit;
        }else{
           
            $this->reponseMsg();
        }

    }


    //消息处理函数
    public function reponseMsg(){
        //1.获取到微信推送过来post数据（xml格式）
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        //2.处理消息类型，并设置回复类型和内容

        $postObj = simplexml_load_string( $postArr );

        //判断该数据包是否是订阅的事件推送
        if( strtolower( $postObj->MsgType) == 'event'){
            //如果是关注 subscribe 事件
            if( strtolower($postObj->Event == 'subscribe') ){
				
				
                //回复用户消息(纯文本格式)
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
				$access_token= $this->getWxAccessToken();
				$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$postObj->FromUserName;
				$res = $this->http_curl($url,'get','json');
				//$res = var_dump($res);
				
				$str = $postObj->EventKey;
				$str = substr($str,-9);
				
				$this->definedItem();	
				
				
				$data = array();
				$data['openid'] = $res['openid']; 
				$data['nickname'] = $res['nickname'];
				$data['city'] = $res['city'];
				$data['province'] = $res['province'];
				$data['country'] = $res['country']; 
				$data['subscribe_time'] = $res['subscribe_time']; 
				$data['devid'] = $str; //仪器编号
				
				$UserInfo = M('User');
				$cond['openid'] = $data['openid'];

				$res = $UserInfo->where($cond)->find();
				
				if(!$res && !empty($str)){
					$UserInfo->data($data)->add();
				}
				

				
				
                $time     = time();
                $msgType  =  'text';
                // $content  = '欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                // $template = "<xml>
                            // <ToUserName><![CDATA[%s]]></ToUserName>
                            // <FromUserName><![CDATA[%s]]></FromUserName>
                            // <CreateTime>%s</CreateTime>
                            // <MsgType><![CDATA[%s]]></MsgType>
                            // <Content><![CDATA[%s]]></Content>
                            // </xml>";
                // $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
				    $arr=array(
                            array('title'=>'请注册，测量值异常时获得专业指导',
                                'description'=>'填写基本信息，当您的测量值出现异常波动时，更容易获得我们专业人员针对性的指导,请核对仪器ID是否为：'.$data['devid'],
                                'picUrl'=>'http://www.ykzp.com/Public/index/img/wechatRegister.jpg',
                                'url'=>'http://test.ykzp.com/wechat/index.php/Pub/Index/register?openid='.$data['openid']),
                         );
                    //$content = '<a href="http://www.soso.com/">百度</a>';
                    $template = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <ArticleCount>".count($arr)."</ArticleCount>
                                <Articles>";
                    foreach($arr as $k=>$v){
                        $template .= "<item>
                                <Title><![CDATA[".$v['title']."]]></Title>
                                <Description><![CDATA[".$v['description']."]]></Description>
                                <PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
                                <Url><![CDATA[".$v['url']."]]></Url>
                                </item>";
                    }

                    $template .="</Articles>
                                </xml>";
                    $info = sprintf($template, $toUser,$fromUser,$time,'news');
                echo $info;


            }
        }
        //根据用户输入消息进行回复
        else if(strtolower( $postObj->MsgType) == 'text'){
            $toUser   = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $time     = time();
            $msgType  =  'text';
            //$content  = 'imooc is very good'.$postObj->FromUserName.'-'.$postObj->ToUserName;
            $template = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            </xml>";
            switch( trim($postObj->Content) ){
                case 1:
                    $content = '您输入的数字是1';
                break;
                case 2:
                    $content = '您输入的数字是2';
                break;
				default:
                    $content = '请拨打 010-51758587 或留下您的联系方式, 客服人员会尽快与您取得联系!';
                break;
               
            }

            $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
            echo $info;
        }

	}




    //$url  接口url string
    //$type 请求类型string
    //$res  返回类型string
    //$arr= 请求参数string
    public function http_curl($url,$type='get',$res='json',$arr=''){

        //1.初始化curl
        $ch  =curl_init();
        //2.设置curl的参数
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在 
		
        if($type == 'post'){
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在 
        }
        //3.采集
        $output =curl_exec($ch);

        //4.关闭
        curl_close($ch);
        if($res=='json'){
            if(curl_error($ch)){
                //请求失败，返回错误信息
                return curl_error($ch);
            }else{
                //请求成功，返回错误信息

                return json_decode($output,true);
            }
        }
		
        var_dump( $output );
    }


    //获取微信服务器IP地址
    public function  getWxServerIp(){
        $accessToken ="Y7cYto0UvJz1U-9NpN04lhQuBkO5BO7Sim6hCZ0GkZlLLfisnvXLjg6VTX_v7veESGX24zAIlu31GD5YXjQFWd5AYXkQTv5a1iGIwk9oxL4gPeWC3fCciWTp2e5ftVZvUXFcAHAHKS";
        $url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=".$accessToken;
        $ch  =curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $res =curl_exec($ch);
        //5.关闭curl
        curl_close($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }
        $arr=json_decode($res,true);
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";
    }

	
	//返回 access_token 并写入文件
	public function getWxAccessToken() {
	
		$tokenFile = "./access_token.txt";//缓存文件名
		$data = json_decode(file_get_contents($tokenFile));
		if ($data->expire_time < time() or !$data->expire_time) {
			echo '重新获取的';
			$AppId = 'wx531371cf0425661d***';
			$AppSecret = '142e64f0d55e79af7e3db6015938ae8d***';
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$AppId."&secret=".$AppSecret;
			$res = $this->http_curl($url,'get','json');
			$access_token = $res['access_token'];
			
			if($access_token) {
				
				$data_new['expire_time'] = time() + 7000;
				$data_new['access_token'] = $access_token;
				$fp = fopen($tokenFile, "w");
				fwrite($fp, json_encode($data_new));
				fclose($fp);
			}

		} else {
			echo '读取文件的';
			$access_token = $data->access_token;
		}
		var_dump($data->expire_time,time(),$access_token);
		return $access_token;
	}
	
	//生成二维码	
	public function getCode(){
		
        $access_token= $this->getWxAccessToken();

         //永久		
        //$qrcode = '{"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": "100811205"}}}';
        for($i=100811587; $i<100811588; $i++){
            $scene_str = strval($i);
            $qrcode = '{"action_name": "QR_LIMIT_STR_SCENE", "action_info": {"scene": {"scene_str": '.$scene_str.'}}}';
            $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$access_token";
            $result = $this->https_post($url,$qrcode);
			
            $jsoninfo = json_decode($result, true);
            $ticket = $jsoninfo["ticket"];
            $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".urlencode($ticket);
            $return_content = $this->downLoad($url);
			//var_dump($return_content);die;
            $filename = 'Public/code/'.$scene_str.'.jpg';  
			
            $fp= @fopen($filename,"a"); //将文件绑定到流 
			  
            $res = fwrite($fp,$return_content);
			if($res){
				echo $scene_str."成功<br/>";
			}
        }       		
    }

	public function downLoad($url){
 			  
			$ch = curl_init ();  
			curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );  
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );  
			curl_setopt ( $ch, CURLOPT_URL, $url );  
			ob_start ();  
			curl_exec ( $ch );  
			$return_content = ob_get_contents ();  
			ob_end_clean ();  
			  
			$return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );  
			return $return_content;  		
	}
		  
	public function https_post($url, $data = null){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($curl);
		curl_close($curl);
		//var_dump($output);
		return $output;
	}
	
	
	
    public function getDetailInfo(){
        //1.获取code
        //由于变量是url,而这个变量还需要放到url中,故转码
		$appid = 'wx531371cf0425661d***';
        $redirect_uri = urlencode('http://test.ykzp.com/wechat/index.php/Home/index/getUserInfo');
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect';
		var_dump($url);die;
        //获取用户的openid
        header('location:' . $url);
    }
	
	//获取用户详细信息
    public function getUserInfo(){
        header('content-type:text/html;charset=utf-8');
		$appid = 'wx531371cf0425661d***';
		$appsecret = '142e64f0d55e79af7e3db6015938ae8d***';
        //2.获取网页授权access_token
        $code = $_GET['code'];
		$state = $_GET['state'];
		
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $appid
            . '&secret=' . $appsecret
            . '&code=' . $code . '&grant_type=authorization_code';
        $res = $this->http_curl($url, 'get');
        $openid = $res['openid'];

        $access_token = $res['access_token'];
        //3.拉取用户详细信息
        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token='
            . $access_token . '&openid=' . $openid . '&lang=zh_CN';
        $res = $this->http_curl($url);

        if($state == 1){
			header('Location: http://test.ykzp.com/wechat/index.php/Pub/Index/index?openid='.$res['openid']);
		}elseif($state == 2){
		header('Location: http://test.ykzp.com/wechat/index.php/Pub/Index/myhome?openid='.$res['openid'].'&headimgurl='.$res['headimgurl']);
		}
    }
	
	
	
	//删除菜单
	public function delMenu(){
		
		header('content-type:text/html;charset=utf-8');
		$access_token= $this->getWxAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$access_token;
        $data =  $this->http_curl($url,'get','json');
		
        if ($data['errcode']==0) {
			
            return true;
        }else{
            return false;
        }

    }

    public function  definedItem(){
        //创建微信菜单
        header('content-type:text/html;charset=utf-8');
        $access_token= $this->getWxAccessToken();
        $url ='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;	
		
		$appid = 'wx531371cf0425661d***';
        $redirect_uri = urlencode('http://test.ykzp.com/wechat/index.php/Home/index/getUserInfo');
		
		$postArr=array(
            'button'=>array(
                array(
                    'name'=>urlencode('血糖数据'),
                    'type'=>'view',
                    'url'=>'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect',
                ),
                array(
                    'name'=>urlencode('健康指导'),
                    'sub_button'=>array(
                        array(
                            'name'=>urlencode('国医预约'),
							'type'=>'view',
							'url'=>'http://h.eqxiu.com/s/7botOlhm',
                        ),//第一个二级菜单
                        array(
                            'name'=>urlencode('在线问诊'),
							'type'=>'view',
							'url'=>'http://www8.53kf.com/m.php?cid=72052991',
                        ),//第二个二级菜单
						 array(
                            'name'=>urlencode('风险评估'),
							'type'=>'view',
							'url'=>'http://test.ykzp.com/wechat/index.php/Pub/Index/sular_text',
                        ),
                    )
                ),
                array(
                    'name'=>urlencode('福利'),
                    'sub_button'=>array(
                        array(
                            'name'=>urlencode('往期福利'),
							'type'=>'view',
							'url'=>'https://h5.youzan.com/v2/showcase/mpnews?alias=YZ0qsEbghz',
                        ),//第一个二级菜单
						array(
                            'name'=>urlencode('同仁堂益平茶'),
							'type'=>'view',
							'url'=>'http://mp.weixin.qq.com/s/fE4nzuAMcci3_k4F3Jdfhw',
                        ),
                        array(
                            'name'=>urlencode('无糖食品'),
							'type'=>'view',
							'url'=>'https://h5.youzan.com/v2/tag/1asv0tcei',
                        ),//第二个二级菜单
						array(
                            'name'=>urlencode('微商城'),
                            'type'=>'view',
                            'url'=>'https://kdt.im/0W2H_r',
                        ),
                        array(
                            'name'=>urlencode('我的账户'),
                            'type'=>'view',
                            'url'=>'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=snsapi_userinfo&state=2#wechat_redirect',
                        ),
                    )
                ),//第三个一级菜单
        ));
		
		
        echo  $postJson = urldecode(json_encode($postArr));
        $res = $this->http_curl($url,'post','json',$postJson);
        var_dump($res);
    }

	
	public function sendTemplateMsg(){
		$res = $_POST;
		if( $res['bgState'] == 1 ){
			$temp = '餐后';
			//$msg = '餐后1小时血糖应小于8.9mmol/L,餐后2小时应小于6.7mmol/L。';
			if( $res['bloodGlu'] < 3.9 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/afterLow?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '偏低';
			}elseif( 7.7 > $res['bloodGlu'] && $res['bloodGlu']>= 3.9 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/afterNormal?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '正常';
			}elseif( 11.1 > $res['bloodGlu'] && $res['bloodGlu']>= 7.8 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/afterHight?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '偏高';
			}elseif( $res['bloodGlu'] >= 11.1 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/afterHightSerious?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '严重偏高';
			}
			
		}else{
			$temp = '餐前';
			$msg = '对照标准：餐前血糖 3.9-6.1mmol/L。';
			if( $res['bloodGlu'] < 3.9 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/beforeLow?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '偏低';
			}elseif( 6.1 > $res['bloodGlu'] && $res['bloodGlu'] >= 3.9 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/beforeNormal?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '正常';
			}elseif( 7.0 > $res['bloodGlu'] && $res['bloodGlu'] >= 6.1 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/beforeHigh?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '偏高';
			}elseif( $res['bloodGlu'] >= 7.0 ){
				$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Suggest/beforeHighSerious?bloodGlu=".$res['bloodGlu']."&time=".$res['time'];
				$state = '严重偏高';
			}
			
		}
		
        //1.获取accessToken
        $access_token = $this->getWxAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
        //2.组装数据
        $array = array(
            "touser"=>$res['openid'],
            "template_id"=>"bg05k0xfBOEGhsAma9S7Jx6Bi-ckrOR7n_ZVMbQU5qM",
            "url"=>$url_temp,
            "topcolor"=>"#FF0000",
            'data' => array(
                "first" => array("value"=>"您好，".$res['name']."刚刚测量了血糖，结果如下：","color"=>"#173177"),
                "keyword1" => array("value"=>$res['bloodGlu']."mmol/L","color"=>"#173177"),
                "keyword2" => array("value"=>$temp.$state,"color"=>"#173177"),
                "remark" => array("value"=>"今天血糖".$state."。".$msg,"color"=>"#173177"),
            ),
        );
        //3.将数组->json
        $postJson = json_encode($array);
        //4.调用curl
        $res = $this->http_curl($url,'post','json',$postJson);
        var_dump($res);
    }
	
	//用于推送月末记录
	public function sendMonthlyMsg(){

       
		
        $Test = M('test');
		$User = M('user');
		$user_info = $User->select();
		$openid = array_column($user_info,'openid');
		$devid = array_column($user_info,'devid');

        $startTime=date('Y-m-01', strtotime(date("Y-m-d")));
        $stopTime = date('Y-m-d', strtotime("$startTime +1 month -1 day"));
        $cond['testTime'] = array(array('gt',$startTime),array('lt',$stopTime)) ;
	
        $res = $Test->field('devid, openid, bloodglu')->join('right join __USER__ b using(devid)')->where($cond)->select();
 
        //1.获取accessToken
        $access_token = $this->getWxAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
        //2.组装数据
		$dd = date('Y-m-d H:i:s');
		foreach($openid as $val){
			$url_temp = "http://test.ykzp.com/wechat/index.php/Pub/Index/month?openid=".$val;
			$array = array(
				"touser"=>$val,
				"template_id"=>"5Z1lQfhe_cSf81B78zgjKZK2zX-GM0TiaraZfyZPHnw",
				"url"=>$url_temp,
				"topcolor"=>"#FF0000",
				'data' => array(
					"first" => array("value"=>"益康臻品提醒您：","color"=>"#173177"),
					"keyword1" => array("value"=>$val.'您本月的健康报告已生成。',"color"=>"#173177"),
					"keyword2" => array("value"=>$dd,"color"=>"#173177"),
					"remark" => array("value"=>"点击详情查看专家建议及报告","color"=>"#173177"),
				),
			);
			//3.将数组->json
			$postJson = json_encode($array);
			//4.调用curl
			$res = $this->http_curl($url,'post','json',$postJson);
			var_dump($res);
		}
      
        
    }
	

}