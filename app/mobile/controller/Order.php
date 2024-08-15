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
        $sessionUserData=$this->isLogin();

        $addressDefaultData=Db::name('address')->where('user_id',$sessionUserData['id'])->where('isdefault',1)->find();
        $addressData=Db::name('address')->where('user_id',$sessionUserData['id'])->where('isdefault',0)->limit(3)->order('id desc')->select();
        $cartData=[];
        $cartDataTmp=Db::name('cart')->where('user_id',$sessionUserData['id'])->where('status',1)->order('id desc')->select()->toArray();
        //var_dump($cartDataTmp);die;
        if($cartDataTmp){

            foreach($cartDataTmp as $k=>$v){
                $cartData[$k]['id']=$v['id'];
                $cartData[$k]['status']=$v['status'];
                $cartData[$k]['goods_id']=$v['goods_id'];
                $cartData[$k]['amount']=$v['amount'];
                $cartData[$k]['sku']=$this->getAttrBySku($v['sku']);
                $goodsData=Db::name('goods')->field('goods_id,goods_name,goods_thumb,goods_price,single_standard')->find($v['goods_id']);
                $cartData[$k]['created_at']=$v['created_at'];
                $cartData[$k]['updated_at']=$v['created_at'];
                $cartData[$k]['user_id']=$sessionUserData['id'];
                $cartData[$k]['num']=$v['num'];

                $cartData[$k]['goods'] = $goodsData;

                if($goodsData['single_standard']==1){
                    $cartData[$k]['goods_price']=$goodsData['goods_price'];
                }else{
                    $cartData[$k]['goods_price']=Db::name('goods_standard')->where('goods_id',$v['goods_id'])->where('sku',$v['sku'])->value('goods_price');
                }
            }
            $total_price=0;
            return json(['address' => $addressDefaultData, 'carts' =>$cartData]);
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
    public function  address(){

        $sessionUserData = $this->isLogin();
        $data = Request::post();

        if (!empty($data)){
            // 定义验证规则
            $validate = Validate::rule([
                'shou_address'    => 'require|max:255',    // 地址必须存在，最大长度为255个字符
                'shou_name'  => 'require|max:50',     // 收货人姓名必须存在，最大长度为50个字符
                'shou_mobile'=> ['require', 'regex' => '/^1[3-9]\d{9}$/'],  // 电话号码必须存在，并且符合中国大陆手机号码格式
                'province'   =>'require',
                'city'       =>'require',
                'district'   =>'require'
            ])->message([
                'shou_address.require'   => '地址不能为空',
                'shou_address.max'       => '地址不能超过255个字符',
                'province.require'   => '省份不能为空',
                'city.require'   => '城市不能为空',
                'district.require'   => '地方区域不能为空',
                'shou_name.require' => '收货人姓名不能为空',
                'shou_name.max'     => '收货人姓名不能超过50个字符',
                'shou_mobile.require'     => '电话号码不能为空',
                'shou_mobile.regex'       => '电话号码格式不正确',
            ]);

            // 验证数据
            if (!$validate->check($data)){
                return json(['message'=>'The given data was invalid','error' => $validate->getError()], 400);
            }

            if (!empty($data)){
                $data['user_id'] = $sessionUserData['id'];
                $data['create_at'] = time();
                $data['update_at'] = time();

                $addressData=Db::name('address')->insert($data);

                return json(['status'=>1,'message'=>'地址添加成功！']);
            }
        }

        //地址列表
        $addressData=Db::name('address')->where('user_id',$sessionUserData['id'])->limit(3)->order('id desc')->select();

        return json(['status' =>1, 'data' =>$addressData]);

    }


    public function addressUpdate(){
        $sessionUserData = $this->isLogin();
        //更新地址

        $data = Request::post();
        // 定义验证规则
        $validate = Validate::rule([
            'shou_address'    => 'require|max:255',    // 地址必须存在，最大长度为255个字符
            'shou_name'  => 'require|max:50',     // 收货人姓名必须存在，最大长度为50个字符
            'shou_mobile'=> ['require', 'regex' => '/^1[3-9]\d{9}$/'],  // 电话号码必须存在，并且符合中国大陆手机号码格式
            'province'   =>'require',
            'city'       =>'require',
            'district'   =>'require'
        ])->message([
            'shou_address.require'   => '地址不能为空',
            'shou_address.max'       => '地址不能超过255个字符',
            'province.require'   => '省份不能为空',
            'city.require'   => '城市不能为空',
            'district.require'   => '地方区域不能为空',
            'shou_name.require' => '收货人姓名不能为空',
            'shou_name.max'     => '收货人姓名不能超过50个字符',
            'shou_mobile.require'     => '电话号码不能为空',
            'shou_mobile.regex'       => '电话号码格式不正确',
        ]);
        // 验证数据
        if (!$validate->check($data)){
            return json(['message'=>'The given data was invalid','error' => $validate->getError()], 400);
        }

        $data['update_at'] = time();

        $addressData=Db::name('address')->where('id',$data['id'])->where('user_id',$sessionUserData['id'])->update($data);
        if ($addressData){
            return json(['status'=>1,'message'=>'地址修改成功！']);
        }

    }

    //地址删除
    public function addressDelete(){
        $id = input('id');
        //删除地址
        $addressDelete=Db::name('address')->where('id',$id)->delete();
        if ($addressDelete){
            return json(['status'=>1,'message'=>'地址删除成功！']);
        }

    }

        //创建订单,购物车购买
       //提交订单
    function order_create(){
        $sessionUserData=session('sessionUserData');


      /*  if(empty($sessionUserData)){
            return json(['msg'=>'请登录','status'=>-2]);
        }
        //order $data
        $data['address_id']=input('post.address_id');
        if(!intval($data['address_id'])){
            return json(['msg'=>'请完善收货地址信息','status'=>0]);
        }*/
        $data['address_id']= 2;

        $data['user_id']=$sessionUserData['id'];
        $data['time']=time();
        $data['pay_method']=input('post.pay_method');//支付方式
        $data['content']=input('post.content'); //留言
        $data['out_trade_no']=md5(time().'ab'); //订单号

        //order_goods $data2
        $total_price=0;
        $cartDataTmp=Db::name('cart')->where('user_id',$sessionUserData['id'])->where('status',1)->order('id desc')->select()->toArray();


     //   var_dump($cartDataTmp);die;
        if(empty($cartDataTmp)){
            return json(['msg'=>'订单异常','status'=>-1]);
        }


        foreach($cartDataTmp as $k=>$v){
            $data2[$k]['goods_id']=$v['goods_id'];
            $data2[$k]['amount']=$v['amount'];  //商品数量
            $data2[$k]['sku']=$this->getAttrBySku($v['sku']);
            $goodsData=Db::name('goods')->find($v['goods_id']);
            $data2[$k]['post_money']=$goodsData['post_money'];   //post_money为邮费
            if($goodsData['single_standard']==1){
                $data2[$k]['goods_price']=$goodsData['goods_price'];
            }else{
                $data2[$k]['goods_price']=Db::name('goods_standard')->where('goods_id',$v['goods_id'])->where('sku',$v['sku'])->value('goods_price');
            }

            $price=$data2[$k]['goods_price']*$v['amount'];
            $total_price=$total_price+$price+$goodsData['post_money'];

        }

            $data['total_price']=$total_price;  //总金额

        $order_id=Db::name('order')->insertGetId($data);

      //  var_dump($order_id);die;

        
        //入库
        Db::startTrans();
        try{
            $order_id=Db::name('order')->insertGetId($data);

          var_dump($order_id);die;
            if($order_id){
                foreach($data2 as $k=>$v){
                    $v['order_id']=$order_id;
                    $res=Db::name('order_goods')->insertGetId($v);
                }
            }
            //删除购物车信息
            Db::name('cart')->where('user_id',$sessionUserData['id'])->where('status',1)->delete();
            //减少库存操作
            //提交事务
            Db::commit();
        }catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return json(['msg'=>'订单异常','status'=>-1]);
        }

        if($order_id && $res){
            //微信支付
            if($data['pay_method']==1){
                return json(['msg'=>'订单提交成功！','status'=>1,'out_trade_no'=>$data['out_trade_no']]);
            }
            //支付宝支付
            if($data['pay_method']==2){
                return json(['msg'=>'订单提交成功！','status'=>2,'out_trade_no'=>$data['out_trade_no']]);
            }
        }
    }
    /* 从商品详情页直接购买，方法提交到这里
    ** 提交过来参数：goods_id、amount、sku   sku为产品规格 例如产品颜色，大小，型号
    */
    public function buy(){
        $sessionUserData=$this->isLogin();
        $goods_id=input('get.goods_id');
        $goodsData=Db::name('goods')->field('goods_id,goods_thumb,goods_name,goods_price,goods_status,post_money,single_standard')->find($goods_id);
        if(empty($goodsData) || $goodsData['goods_status']!=1){
            return alert('商品信息异常','/',5);
        }

        $sku=input('get.sku');
        $amount=input('get.amount');
        $goodsData['skustr']='';
        $goodsData['sku']='';
        if(!empty($sku) || $goodsData['single_standard']==2){
            $goodsStandardData=Db::name('goods_standard')->field('sku,goods_price')->where('goods_id',$goods_id)->where('sku',$sku)->find();
            $goodsData['goods_price']=$goodsStandardData['goods_price'];
            $goodsData['skustr']= $this->getAttrBySku($sku);
            $goodsData['sku']=$sku;
        }

        $goodsData['amount']=$amount;

        //收货信息
        $addressDefaultData=Db::name('address')->where('user_id',$sessionUserData['id'])->where('isdefault',1)->find();
        $addressData=Db::name('address')->where('user_id',$sessionUserData['id'])->where('isdefault',0)->limit(3)->order('id desc')->select();

        return view('',[
            'goodsData'=>$goodsData,
            'sessionUserData'=>$sessionUserData,
            'addressDefaultData'=>$addressDefaultData,
            'addressData'=>$addressData
        ]);

    }


    //buy直接购买确认订单
    public function order_create2(){

        $sessionUserData=session('sessionUserData');
        if(empty($sessionUserData)){
            return json(['msg'=>'请登录','status'=>-2]);
        }
        //order data
        //order_goods  data2
        $data['address_id']=input('post.address_id');

        if(!intval($data['address_id'])){
            return json(['msg'=>'请完善收货地址信息','status'=>0]);
        }

        $data['pay_method']=input('post.pay_method');
        $data['user_id']=$sessionUserData['id'];
        $data['time']=time();
        $data['content']=input('post.content');
        $data['out_trade_no']=md5(time().'ab');

        $sku=input('post.sku');
        $data2['amount']=$amount=input('post.amount');
        $data2['goods_id']=$goods_id=input('post.goods_id');
        $goodsData=Db::name('goods')->field('goods_price,post_money,goods_status,single_standard')->find($goods_id);
        if(empty($goodsData) || $goodsData['goods_status']!=1){
            return json(['msg'=>'订单异常','status'=>-1]);
        }
        if(!empty($sku) && $goodsData['single_standard']==2){
            $goodsStandardData=Db::name('goods_standard')->field('goods_price')->where('goods_id',$goods_id)->where('sku',$sku)->find();
            $data2['goods_price']=$goodsStandardData['goods_price'];
        }else{
            $data2['goods_price']=$goodsData['goods_price'];
        }
        $data2['sku']=$this->getAttrBySku($sku);
        $data2['post_money']=$goodsData['post_money'];

        //计算总价
        $data['total_price'] = $data2['goods_price']*$data2['amount']+$data2['post_money'];

        //入库
        Db::startTrans();
        try{
            $order_id=Db::name('order')->insertGetId($data);
            if($order_id){
                $data2['order_id']=$order_id;
                $res=Db::name('order_goods')->insertGetId($data2);

            }


            //减少库存操作

            //提交事务
            Db::commit();

        }catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return json(['msg'=>'订单异常','status'=>-1]);
        }

        //此处去支付
        if($order_id && $res){

            //微信支付
            if($data['pay_method']==1){
                return json(['msg'=>'订单提交成功！','status'=>1,'out_trade_no'=>$data['out_trade_no']]);
            }

            //支付宝支付
            if($data['pay_method']==2){
                return json(['msg'=>'订单提交成功！','status'=>2,'out_trade_no'=>$data['out_trade_no']]);
            }
        }
    }

    //获取用户订单状态
    public function get_pay_status(){
        $sessionUserData=session('sessionUserData');
        //没有登录
        if(empty($sessionUserData)){
            return json(['status'=>-2]);
        }
        $out_trade_no=input('post.out_trade_no');
        //订单异常
        $orderData=Db::name('order')->where('out_trade_no',$out_trade_no)->find();
        if(empty($orderData)){
            return json(['status'=>-1]);
        }
        //已经支付成功
        if($orderData['status']==1){
            return json(['status'=>1]);
        }
        //未支付
        return json(['status'=>0]);
    }
    //取消订单
    public  function order_cancel(){
        $mid = $this->is_login();    //用户user_id
        $id = input("request.id",0);  //订单id
        Db::name('order')->where("user_id={$mid} and id={$id}")->delete();
        Db::name('order_goods')->where("order_id={$id}")->delete();
        ajaxmsg('取消成功',1);
    }

    //查看订单物流信息
    public function showOrderPost(){
        $order_id=input("request.order_id",1);//订单号
        $postcode=input("request.postcode",1);//物流电话

        //获取订单信息填充
        $orderData=db('order')->field('shou_address,express_code,postcode')->where('id',$order_id)->find();
        //找下物流公司代号
        $expressCompanyCode=db('express')->field('code')->where('id',$orderData['express_code'])->find();

        header("Content-type:text/html;charset=utf-8");


        //veddor扩展调用
        vendor('express.bird');
        $config=array(
            'EBusinessID'=>'1321786',//请到快递鸟官网申请http://kdniao.com/reg
            'AppKey'=>'0cae0728-a610-42e3-98d2-6e954e0a771c',//请到快递鸟官网申请http://kdniao.com/reg
        );
        $obj=new \express_bird($config);

        $data=array(
            'OrderCode'=>$order_id,//订单编号
            'ShipperCode'=>$expressCompanyCode['code'],//快递类型
            'LogisticCode'=>$orderData['postcode']//物流单号
        );
        $res=$obj->getOrderTracesByJson($data);
        $res=json_decode($res);

        if(is_object($res)) {  //将对象转换为数组
            $array = (array)$res;
        }

        $echoData=array();
        foreach ($array['Traces'] as $k => $v) {

            if(is_object($v)) {

                $info[$k] = (array)$v;
            }
        }

        if(empty($info)){
            $info='';
        }else{

            $info=array_reverse($info);
        }

        ajaxmsg('true', 1, $info);
    }

}