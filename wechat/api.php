<?php
header("Content-type: text/html; charset=utf-8");
define("ACCESS_TOKEN", "YkeqBme3EV9PrSViaxdrSccKd3MF5n9tcB3MWGPiKTe-La7p4M1dA6EecA9TZMYlYDyIVcxrQUDzVH56Gh7YV7Gkvl3wDqU1baBNEfR8sxefiPbKgBWg63knZ9eqzccqYSBgACATNW");


//创建菜单
function createMenu($data){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tmpInfo = curl_exec($ch);
if (curl_errno($ch)) {
  return curl_error($ch);
}

curl_close($ch);
return $tmpInfo;

}

//获取菜单
function getMenu(){
return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".ACCESS_TOKEN);
}

//删除菜单
function deleteMenu(){
return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".ACCESS_TOKEN);
}


$data = '{
     "button":[
     {
          "type":"view",
          "name":"健康数据",
          "url": "http://www.soso.com/"
      },
      {
           "name":"预约问诊",
           "sub_button":[
            {
               "type":"view",
               "name":"国医预约",
               "url": "http://www.baidu.com/"
            },
            {
               "type":"view",
               "name":"在线问诊",
               "url": "http://www.baidu.com/"
            }]
       },
      {
           "name":"我的健康",
           "sub_button":[
            {
               "type":"view",
               "name":"稀缺产品",
               "url": "http://www.baidu.com/"
            },
            {
               "type":"view",
               "name":"个人中心",
               "url": "http://www.soso.com/"
            }]
       }]
}';



echo createMenu($data);