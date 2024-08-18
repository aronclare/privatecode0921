<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

//echo '111';die;
// 设置 CORS 头部信息
/*header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
header("Access-Control-Allow-Credentials: true");*/


// 允许所有来源
header('Access-Control-Allow-Origin: *');
// 允许的 HTTP 方法
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// 允许的请求头
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Authorization');
// 允许发送凭证（如 Cookies）
header('Access-Control-Allow-Credentials: true');

require __DIR__ . '/vendor/autoload.php';

// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);


