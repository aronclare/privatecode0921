<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2024/3/21
 * Time: 17:49
 */

namespace app\mobile\controller;


//namespace app\index\controller;

use think\facade\Config;

use think\facade\Request;

use think\facade\Db;

use think\facade\Session;
use think\facade\Validate;


class Order extends Base

{
    //购物车-确认订单页面
    //订单预览
    function index()
    {
        //  $sessionUserData=$this->isLogin();
        $sessionUserData['id'] = 47;
        //  $addressDefaultData=Db::name('address')->where('user_id',$sessionUserData['id'])->where('isdefault',1)->find();


        $addressDatas = Db::name('address')->where('user_id', $sessionUserData['id'])->limit(3)->order('id desc')->select();

        foreach ($addressDatas as $addressData) {
            $addressData['name'] = $addressData['shou_name'];
            $addressData['province'] = $addressData['province'];
            $addressData['city'] = $addressData['city'];
            $addressData['county'] = $addressData['district'];
            $addressData['address'] = $addressData['shou_address'];
            $addressData['phone'] = $addressData['shou_mobile'];
            $addressData['is_default'] = $addressData['isdefault'];

            unset($addressData['isdefault'], $addressData['shou_name'], $addressData['district'], $addressData['shou_address'], $addressData['shou_mobile']);
            $address[] = $addressData;
        }

        $cartData = [];
        $cartDataTmp = Db::name('cart')->where('user_id', $sessionUserData['id'])->where('status', 1)->order('id desc')->select()->toArray();
        //var_dump($cartDataTmp);die;
        if ($cartDataTmp) {

            foreach ($cartDataTmp as $k => $v) {
                $cartData[$k]['id'] = $v['id'];
                $cartData[$k]['is_checked'] = $v['status'];
                $cartData[$k]['goods_id'] = $v['goods_id'];
                $cartData[$k]['price'] = $v['amount'];
                $cartData[$k]['sku'] = $this->getAttrBySku($v['sku']);
                $goodsData = Db::name('goods')->field('goods_id,goods_name,goods_thumb,goods_price,single_standard')->find($v['goods_id']);
                $cartData[$k]['created_at'] = $v['created_at'];
                $cartData[$k]['updated_at'] = $v['created_at'];
                $cartData[$k]['user_id'] = $sessionUserData['id'];
                $cartData[$k]['num'] = $v['num'];

                $cartData[$k]['goods'] = $goodsData;

                if ($goodsData['single_standard'] == 1) {
                    $cartData[$k]['goods_price'] = $goodsData['goods_price'];
                } else {
                    $cartData[$k]['goods_price'] = Db::name('goods_standard')->where('goods_id', $v['goods_id'])->where('sku', $v['sku'])->value('goods_price');
                }
            }
            $total_price = 0;
            return json(['address' => $address, 'carts' => $cartData]);
        }


        /*   var_dump($cartData);die;
           return view('',[
               'cartData'=>$cartData,
               'sessionUserData'=>$sessionUserData,
               'addressDefaultData'=>$addressDefaultData,
               'addressData'=>$addressData
           ]);*/

    }

    //地址列表、添加地址
    public function address()
    {
        //   $sessionUserData = $this->isLogin();
        $sessionUserData['id'] = 47;
        $addressData = Request::post();

        $url = Request::url();
        if (preg_match('/\/address\/(\d+)$/', $url, $matches)) {
            $update_id = $matches[1];
        }

        if (!empty($addressData)) {
            $data['shou_name'] = $addressData['name'];
            $data['province'] = $addressData['province'];
            $data['city'] = $addressData['city'];
            $data['district'] = $addressData['county'];
            $data['shou_address'] = $addressData['address'];
            $data['shou_mobile'] = $addressData['phone'];
            $data['isdefault'] = $addressData['is_default'];


            // 定义验证规则
            $validate = Validate::rule([
                'shou_address' => 'require|max:255',    // 地址必须存在，最大长度为255个字符
                'shou_name' => 'require|max:50',     // 收货人姓名必须存在，最大长度为50个字符
                'shou_mobile' => ['require', 'regex' => '/^1[3-9]\d{9}$/'],  // 电话号码必须存在，并且符合中国大陆手机号码格式
                'province' => 'require',
                'city' => 'require',
                'district' => 'require'
            ])->message([
                'shou_address.require' => '地址不能为空',
                'shou_address.max' => '地址不能超过255个字符',
                'province.require' => '省份不能为空',
                'city.require' => '城市不能为空',
                'district.require' => '地方区域不能为空',
                'shou_name.require' => '收货人姓名不能为空',
                'shou_name.max' => '收货人姓名不能超过50个字符',
                'shou_mobile.require' => '电话号码不能为空',
                'shou_mobile.regex' => '电话号码格式不正确',
            ]);

            // 验证数据
            if (!$validate->check($data)) {
                return json(['message' => 'The given data was invalid', 'error' => $validate->getError()], 400);
            } else {


                //添加地址
                $data['user_id'] = $sessionUserData['id'];
                $data['created_at'] = time();
                $data['updated_at'] = time();

                //如果用户首次添加地址自动设为默认地址
                $addressData = Db::name('address')->where('user_id', $sessionUserData['id'])->find();
                if (!$addressData) {
                    $data['isdefault'] = 1;
                }

                //如果添加的地址为默认地址则将原来的地址默认状态设为0
                if ($data['isdefault'] == 1) {
                    $addressData = Db::name('address')->where('user_id', $sessionUserData['id'])->update(['isdefault' => 0]);
                }

                //更新地址
                if (!empty($update_id)) {
                    unset($data['created_at']);
                    $addressData = Db::name('address')->where('id', $update_id)->where('user_id', $sessionUserData['id'])->update($data);
                } else {


                    $addressData = Db::name('address')->insert($data);
                    if (!$addressData) {
                        return json(['status' => 400, 'message' => '地址添加失败！']);
                    }
                    return json(['status' => 200, 'message' => '地址添加成功！']);
                }
            }
        }
        //地址列表
        $addressDatas = Db::name('address')->where('user_id', $sessionUserData['id'])->limit(3)->order('isdefault desc')->select();
        foreach ($addressDatas as $addressData) {
            $addressData['name'] = $addressData['shou_name'];
            $addressData['county'] = $addressData['district'];
            $addressData['address'] = $addressData['shou_address'];
            $addressData['phone'] = $addressData['shou_mobile'];
            $addressData['is_default'] = $addressData['isdefault'];
            unset($addressData['isdefault'], $addressData['shou_name'], $addressData['district'], $addressData['shou_address'], $addressData['shou_mobile']);
            $address[] = $addressData;
        }

        return json(['status' => 1, 'data' => $address]);

    }

    //地址删除
    public function addressDelete()
    {
        // $id = input('id');
        $url = Request::url();
        if (preg_match('/\/addressDelete\/(\d+)$/', $url, $matches)) {
            $id = $matches[1];
        }
        //删除地址
        $addressDelete = Db::name('address')->where('id', $id)->delete();
        if ($addressDelete) {
            return json(['status' => 1, 'message' => '地址删除成功！']);
        }
    }

    //创建订单,购物车购买
    //提交订单
    function order_create()
    {
        $postdata = Request::post();
        //   $data = json_encode($data,true);
        // var_dump($data);die;
        // 确定保存文件的路径，当前路径下的 post_data.txt 文件
        //   $filePath = app()->getRootPath() . 'post_data.txt';
        //  file_put_contents($filePath, $data);die;
        //  $sessionUserData = session('sessionUserData');
        $sessionUserData['id'] = 47;

        /*  if(empty($sessionUserData)){
              return json(['msg'=>'请登录','status'=>-2]);
          }
          //order $data
          $data['address_id']=input('post.address_id');
          if(!intval($data['address_id'])){
              return json(['msg'=>'请完善收货地址信息','status'=>0]);
          }*/
        $data['address_id'] = $postdata['address_id'];
        $data['pay_method'] = $postdata['pay_method'];//支付方式   input('post.pay_method')
        $data['user_id'] = $sessionUserData['id'];
        $data['time'] = time();
        $data['content'] = '留言类容'; //留言
        $data['out_trade_no'] = md5(time() . 'ab'); //订单号
        //order_goods $data2
        $total_price = 0;
        $cartDataTmp = Db::name('cart')->where('user_id', $sessionUserData['id'])->where('status', 1)->order('id desc')->select()->toArray();
        //var_dump($cartDataTmp);die;
        if (empty($cartDataTmp)) {
            return json(['status' => 400, 'message' => '订单异常']);
        }
        foreach ($cartDataTmp as $k => $v) {
            $data2[$k]['goods_id'] = $v['goods_id'];
            $data2[$k]['amount'] = $v['amount'];  //商品数量
            $data2[$k]['sku'] = $this->getAttrBySku($v['sku']);
            $goodsData = Db::name('goods')->find($v['goods_id']);
            $data2[$k]['post_money'] = $goodsData['post_money'];   //post_money为邮费
            if ($goodsData['single_standard'] == 1) {
                $data2[$k]['goods_price'] = $goodsData['goods_price'];
            } else {
                $data2[$k]['goods_price'] = Db::name('goods_standard')->where('goods_id', $v['goods_id'])->where('sku', $v['sku'])->value('goods_price');
            }
            $price = $data2[$k]['goods_price'] * $v['num'];
            $total_price = $total_price + $price + $goodsData['post_money'];
        }
        $data['total_price'] = $total_price;  //总金额
        //var_dump($data2);die;
        //入库
        Db::startTrans();
        try {
            $order_id = Db::name('order')->insertGetId($data);
            //  var_dump($order_id);die;
            if ($order_id) {
                foreach ($data2 as $k => $v) {
                    $v['order_id'] = $order_id;
                    $res = Db::name('order_goods')->insertGetId($v);  //写入订单商品数据
                }
            }
            //删除购物车信息
            Db::name('cart')->where('user_id', $sessionUserData['id'])->where('status', 1)->delete();
            //减少库存操作
            //提交事务
            Db::commit();
        } catch (\Exception $e) {
            //echo $e;
            // 回滚事务
            Db::rollback();
            return json(['msg' => '订单异常', 'status' => -3]);
        }
        //此处获得order_id 可根据order_id查询 订单号
        $orderno = Db::name('order')->where('id', $order_id)->find();
        return json(['orderno' => $orderno['out_trade_no'], 'pay_method' => 'USDT']);


        if ($order_id && $res) {
            //微信支付
            if ($data['pay_method'] == 1) {
                return json(['msg' => '订单提交成功！', 'status' => 1, 'out_trade_no' => $data['out_trade_no']]);
            }
            //支付宝支付
            if ($data['pay_method'] == 2) {
                return json(['msg' => '订单提交成功！', 'status' => 2, 'out_trade_no' => $data['out_trade_no']]);
            }
        }
    }

    //订单USDT支付
    public function orderpay()
    {

        //接收订单号
        /* $url = Request::url();
          if (preg_match('/\/orderpay\/(\d+)$/', $url, $matches)) {
              $orderno = $matches[1];
          }*/
        $getdata = Request::post();
        /* $data = json_encode($getdata,true);
         // var_dump($data);die;
         // 确定保存文件的路径，当前路径下的 post_data.txt 文件
         $filePath = app()->getRootPath() . 'post_data.txt';
         file_put_contents($filePath,$data);*/

        $orderdata = Db::name('order')->where('out_trade_no', $getdata['params']['orderno'])->find();
        $total_price = $orderdata['total_price'];
        //   return json(['getdata'=>$orderdata]);
        //echo token(10);//测试随机数生成功能
//$amount = (double)$_GET["n"];//从URL参数中的n=*获取amount数据
        $amount = (double)$total_price;
        //echo $amount;
        $notify_url = 'https://your.domain';//Epusdt的异步回调地址，随便，无需管理的话
        $redirect_url = 'https://your.domain';//Epusdt的同步跳转地址,付款成功后跳转到这里
        $order_id = (string)$getdata['params']['orderno'];//生成随机数用于订单号
        //$order_id=(string)token(10);//生成随机数用于订单号
        $key = 'a005ce95dd';//Epusdt的自定义密钥
        $str = 'amount=' . $amount . '&notify_url=' . $notify_url . '&order_id=' . $order_id . '&redirect_url=' . $redirect_url . $key;//拼接字符串用于MD5计算
        $signature = md5($str);//用MD5算法计算签名
        $data = json_encode(array(
            'order_id' => $order_id,//生成数据包，用到了的数组转json的jsonencode
            'amount' => $amount,
            'notify_url' => $notify_url,
            'redirect_url' => $redirect_url,
            'signature' => $signature));
        $res = $this->curl_request('http://upay.ioom.life/api/v1/order/create-transaction', $data, 'post');//发起Curl请求并获取返回数据到变量
        // return json(['qr_code'=>$res]);
        /*string(379) "{"status_code":200,"message":"success","data":{"trade_id":"202408241724484414658662","order_id":"b5022fcf064c9414309a0e4772a2b46e","amount":99,"actual_amount":13.562,"token":"TCwDa3eXn68kZwx59vhB8MBXzdYT1PyH4c","expiration_time":1724485014,"payment_url":"https://upay.vook.life/pay/checkout-counter/202408241724484414658662"},"request_id":"b4ad0c43-3fee-46ab-97c7-98e38d1c6966"}
"
{"status_code":200,"message":"success","data":
        {"trade_id":"202408261724650454809376","order_id":"2cc07304e8568c94fcdafb4c79f70750",
        "amount":109,"actual_amount":14.932,
        "token":"TCwDa3eXn68kZwx59vhB8MBXzdYT1PyH4c","expiration_time":1724651054,
        "payment_url":"https://upay.vook.life/pay/checkout-counter/202408261724650454809376"},
        "request_id":"a88d8365-2873-41b8-9599-198f1cae9f0d"}\n' }

*/

        $str =  '{"status_code":200,"message":"success","data":{"trade_id":"202408261724652204553544","order_id":"674f63171d8989def104ebb2054a351c","amount":1610,"actual_amount":220.548,"token":"TCwDa3eXn68kZwx59vhB8MBXzdYT1PyH4c","expiration_time":1724652804,"payment_url":"https://upay.vook.life/pay/checkout-counter/202408261724652204553544"},"request_id":"ca117950-b5ee-4575-87dd-6d1fc9f0a657"}';
        $res_url = json_decode($res,true);
      //  var_dump($res_url['data']['payment_url']);die;


        return json(['qr_code' =>$res_url['data']['payment_url']]);
//var_dump($res);die;
//echo '<br/>换行符<br/>';
//echo $data;
//echo '<br/>换行符<br/>';
//echo $res;
        $arr = json_decode($res, true);//对返回数据进行json到数组的转换，用到了jsondecode
    }

    public function curl_request($url, $data = null, $method = 'post', $header = array("content-type: application/json"), $https = true, $timeout = 5)
    {
        $method = strtoupper($method);
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_URL, $url);//访问的URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//只获取页面内容，但不输出
        if ($https) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//https请求 不验证证书
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//https请求 不验证HOST
        }
        if ($method != "GET") {
            if ($method == 'POST') {
                curl_setopt($ch, CURLOPT_POST, true);//请求方式为post请求
            }
            if ($method == 'PUT' || strtoupper($method) == 'DELETE') {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); //设置请求方式
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//请求数据
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); //模拟的header头
        //curl_setopt($ch, CURLOPT_HEADER, false);//设置不需要头信息
        $result = curl_exec($ch);//执行请求
        curl_close($ch);//关闭curl，释放资源
        return $result;
    }

    //随机数生成函数
    public function token($length)
    {
        $str = md5(time());
        $token = substr($str, 15, $length);
        return $token;
    }


    /* 从商品详情页直接购买，方法提交到这里
    ** 提交过来参数：goods_id、amount、sku   sku为产品规格 例如产品颜色，大小，型号
    */
    public function buy()
    {
        $sessionUserData = $this->isLogin();
        $goods_id = input('get.goods_id');
        $goodsData = Db::name('goods')->field('goods_id,goods_thumb,goods_name,goods_price,goods_status,post_money,single_standard')->find($goods_id);
        if (empty($goodsData) || $goodsData['goods_status'] != 1) {
            return alert('商品信息异常', '/', 5);
        }

        $sku = input('get.sku');
        $amount = input('get.amount');
        $goodsData['skustr'] = '';
        $goodsData['sku'] = '';
        if (!empty($sku) || $goodsData['single_standard'] == 2) {
            $goodsStandardData = Db::name('goods_standard')->field('sku,goods_price')->where('goods_id', $goods_id)->where('sku', $sku)->find();
            $goodsData['goods_price'] = $goodsStandardData['goods_price'];
            $goodsData['skustr'] = $this->getAttrBySku($sku);
            $goodsData['sku'] = $sku;
        }

        $goodsData['amount'] = $amount;

        //收货信息
        $addressDefaultData = Db::name('address')->where('user_id', $sessionUserData['id'])->where('isdefault', 1)->find();
        $addressData = Db::name('address')->where('user_id', $sessionUserData['id'])->where('isdefault', 0)->limit(3)->order('id desc')->select();

        return view('', [
            'goodsData' => $goodsData,
            'sessionUserData' => $sessionUserData,
            'addressDefaultData' => $addressDefaultData,
            'addressData' => $addressData
        ]);

    }

    //buy直接购买确认订单
    public function order_create2()
    {

        $sessionUserData = session('sessionUserData');
        if (empty($sessionUserData)) {
            return json(['msg' => '请登录', 'status' => -2]);
        }
        //order data
        //order_goods  data2
        $data['address_id'] = input('post.address_id');

        if (!intval($data['address_id'])) {
            return json(['msg' => '请完善收货地址信息', 'status' => 0]);
        }

        $data['pay_method'] = input('post.pay_method');
        $data['user_id'] = $sessionUserData['id'];
        $data['time'] = time();
        $data['content'] = input('post.content');
        $data['out_trade_no'] = md5(time() . 'ab');

        $sku = input('post.sku');
        $data2['amount'] = $amount = input('post.amount');
        $data2['goods_id'] = $goods_id = input('post.goods_id');
        $goodsData = Db::name('goods')->field('goods_price,post_money,goods_status,single_standard')->find($goods_id);
        if (empty($goodsData) || $goodsData['goods_status'] != 1) {
            return json(['msg' => '订单异常', 'status' => -1]);
        }
        if (!empty($sku) && $goodsData['single_standard'] == 2) {
            $goodsStandardData = Db::name('goods_standard')->field('goods_price')->where('goods_id', $goods_id)->where('sku', $sku)->find();
            $data2['goods_price'] = $goodsStandardData['goods_price'];
        } else {
            $data2['goods_price'] = $goodsData['goods_price'];
        }
        $data2['sku'] = $this->getAttrBySku($sku);
        $data2['post_money'] = $goodsData['post_money'];

        //计算总价
        $data['total_price'] = $data2['goods_price'] * $data2['amount'] + $data2['post_money'];

        //入库
        Db::startTrans();
        try {
            $order_id = Db::name('order')->insertGetId($data);
            if ($order_id) {
                $data2['order_id'] = $order_id;
                $res = Db::name('order_goods')->insertGetId($data2);

            }

            //减少库存操作

            //提交事务
            Db::commit();

        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return json(['msg' => '订单异常', 'status' => -1]);
        }

        //此处去支付
        if ($order_id && $res) {

            //微信支付
            if ($data['pay_method'] == 1) {
                return json(['msg' => '订单提交微信支付成功！', 'status' => 1, 'out_trade_no' => $data['out_trade_no']]);
            }

            //支付宝支付
            if ($data['pay_method'] == 2) {
                return json(['msg' => '订单提交支付宝支付成功！', 'status' => 2, 'out_trade_no' => $data['out_trade_no']]);
            }

            //usdt支付
            if ($data['pay_method'] == 3) {


                return json(['msg' => '订单提交usdt支付成功！', 'status' => 2, 'out_trade_no' => $data['out_trade_no']]);
            }

        }
    }

    //获取用户订单状态
    public function get_pay_status()
    {
        $sessionUserData = session('sessionUserData');
        //没有登录
        if (empty($sessionUserData)) {

            return json(['status' => 0, 'message' => '请登录后再操作!']);
        }
        $out_trade_no = input('post.out_trade_no');
        //订单异常
        $orderData = Db::name('order')->where('out_trade_no', $out_trade_no)->find();
        if (empty($orderData)) {
            return json(['status' => 0, 'message' => '订单异常，该订单号不存在!']);
        }
        //待支付
        if ($orderData['status'] == 0) {
            return json(['status' => 0, 'message' => '订单待支付!']);
        }
        //已支付
        if ($orderData['status'] == 1) {
            return json(['status' => 1, 'message' => '订单已支付!']);
        }
        //已完成
        if ($orderData['status'] == 2) {
            return json(['status' => 1, 'message' => '订单已完成!']);
        }
        //待收货
        if ($orderData['status'] == 4) {
            return json(['status' => 1, 'message' => '订单待收货!']);
        }


    }

    //取消订单
    public function order_cancel()
    {
        $mid = $this->is_login();    //用户user_id
        $id = input("request.id", 0);  //订单id
        $res1 = Db::name('order')->where("user_id={$mid} and id={$id}")->delete();
        $res2 = Db::name('order_goods')->where("order_id={$id}")->delete();


        if ($res1 && $res2) {
            return json(['status' => 1, 'message' => '订单取消成功!']);

        } else {
            return json(['status' => 0, 'message' => '订单不存在或已经被取消!']);

        }

    }

    //我的订单//订单列表
    public function myorder()
    {
        // $sessionUserData = $this->isLogin();

        /* $url = Request::url();
         if (preg_match('/\/myorder\/(\d+)$/', $url, $matches)) {
             $status = $matches[1];
         }*/
        $status = Request::get('status');  //get只能接收get发来的请求
        //  $status = Request::post('status');
        //  $this->clearOrderStatus0();
        /*$sessionUserData['id']=*/
        $user_id = 47;
        $orderData = Db::view('order', 'id,total_price,status,time,out_trade_no,pay_method,iscomment')
            ->view('address', 'shou_name', 'address.id=order.address_id')
            ->where('order.user_id', $user_id)
            ->where('status', $status)
            ->order('order.id desc')
            ->paginate(['list_rows' => 6, 'query' => request()->param()]);
        //分页
        $page = $orderData->render();
        $orderData1 = $orderData->items();
        foreach ($orderData1 as $k => $v) {
            $orderData1[$k]['goods'] = Db::name('order_goods')->alias('a')->field('a.*,b.goods_name,b.goods_thumb')->join('goods b', 'a.goods_id=b.goods_id')->where('a.order_id', $v['id'])->select()->toArray();
            // 获取当前域名
            $domain = Request::domain();
            foreach ($orderData1[$k]['goods'] as $slide) {
                $slide['goods_thumb'] = $domain . $slide['goods_thumb'];
                $orderData2[$k]['goods'][] = $slide;
            }
        }
        return json(['data' => $orderData2]);
        //halt($orderData1);
        return view('', [
            'left_menu' => 11,
            'page' => $page,
            'orderData1' => $orderData1,
            'searchkey' => ''
        ]);
    }

    //我的订单详情
    public function myorder_detail()
    {
        //0 待付款 取消订单 立即支付  订单详情
        //1 已经支付待发货  订单详情
        //4 待确认收货  确认收货  订单详情
        //2 已完成  商品评价  订单详情 联系客服  删除订单
        $sessionUserData = $this->isLogin();
        $order_id = input('order_id');
        //订单数据
        $orderData = Db::name('order')->find($order_id);
        /* if(empty($orderData)){
             return redirect('myorder');
         }*/

        // var_dump($orderData);die;
        //商品订单数据
        $orderGoodsData = Db::name('order_goods')->alias('a')
            ->join('goods b', 'a.goods_id=b.goods_id')
            ->field('a.*,b.goods_name,b.goods_thumb')
            ->where('a.order_id', $orderData['id'])
            ->select()->toArray();
        $post_money = 0;
        $goods_price = 0;
        //caculate price计算价格
        foreach ($orderGoodsData as $k => $v) {
            $post_money = $v['post_money'] + $post_money;
            $goods_price = $goods_price + $v['goods_price'] * $v['amount'];
        }
        //post_money 每件商品省下的钱   累加得到总共省下的钱
        //收货信息
        $addressData = Db::name('address')->find($orderData['address_id']);
        // 获取当前域名
        $domain = Request::domain();
        foreach ($orderGoodsData as $slide) {
            $slide['goods_thumb'] = $domain . $slide['goods_thumb'];
            $newgoods[] = $slide;
        }

        return json(['goods' => $newgoods, 'addressData' => $addressData, 'goods_price' => $goods_price, 'post_money' => $post_money]);
        /* return view('',[
             'left_menu'=>11,
             'orderData'=>$orderData,
             'orderGoodsData'=>$orderGoodsData,
             'addressData'=>$addressData,
             'post_money'=>$post_money,
             'goods_price'=>$goods_price
         ]);*/
    }


    //查看订单物流信息
    public function showOrderPost()
    {
        $order_id = input("request.order_id", 1);//订单号
        $postcode = input("request.postcode", 1);//物流电话

        //获取订单信息填充
        $orderData = db('order')->field('shou_address,express_code,postcode')->where('id', $order_id)->find();
        //找下物流公司代号
        $expressCompanyCode = db('express')->field('code')->where('id', $orderData['express_code'])->find();

        header("Content-type:text/html;charset=utf-8");


        //veddor扩展调用
        vendor('express.bird');
        $config = array(
            'EBusinessID' => '1321786',//请到快递鸟官网申请http://kdniao.com/reg
            'AppKey' => '0cae0728-a610-42e3-98d2-6e954e0a771c',//请到快递鸟官网申请http://kdniao.com/reg
        );
        $obj = new \express_bird($config);

        $data = array(
            'OrderCode' => $order_id,//订单编号
            'ShipperCode' => $expressCompanyCode['code'],//快递类型
            'LogisticCode' => $orderData['postcode']//物流单号
        );
        $res = $obj->getOrderTracesByJson($data);
        $res = json_decode($res);

        if (is_object($res)) {  //将对象转换为数组
            $array = (array)$res;
        }

        $echoData = array();
        foreach ($array['Traces'] as $k => $v) {

            if (is_object($v)) {

                $info[$k] = (array)$v;
            }
        }

        if (empty($info)) {
            $info = '';
        } else {

            $info = array_reverse($info);
        }

        ajaxmsg('true', 1, $info);
    }


    /*namespace app\controller;

use think\Request;
use think\facade\Db;

class Cart
{
    public function updateSelection(Request $request)
    {
        // 获取请求中的用户ID和选中的购物车商品ID列表
        $userId = $request->post('user_id');
        $selectedCartIds = $request->post('selected_cart_ids'); // 期望接收一个包含选中商品的购物车ID列表

        if (empty($userId) || !is_array($selectedCartIds)) {
            return json(['status' => 'error', 'message' => 'Invalid user_id or selected_cart_ids'], 400);
        }

        Db::startTrans(); // 开启事务处理
        try {
            // 将该用户的所有购物车商品标记为未选中
            Db::name('cart')
                ->where('user_id', $userId)
                ->update(['selected' => 0]);

            // 将选中的商品标记为选中
            if (!empty($selectedCartIds)) {
                Db::name('cart')
                    ->where('user_id', $userId)
                    ->whereIn('id', $selectedCartIds)
                    ->update(['selected' => 1]);
            }

            Db::commit(); // 提交事务
            return json(['status' => 'success', 'message' => 'Cart selection updated successfully']);
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return json(['status' => 'error', 'message' => 'Failed to update cart selection', 'error' => $e->getMessage()], 500);
        }
    }
}
*/

    /*前端请求接口数据显示

            $postdata = Request::post();
            //   $data = json_encode($data,true);
            // var_dump($data);die;
            // 确定保存文件的路径，当前路径下的 post_data.txt 文件
            //   $filePath = app()->getRootPath() . 'post_data.txt';
            //  file_put_contents($filePath, $data);die;
    */

}