<?php

namespace app\mobile\controller;

use app\common\lib\Uploader;
use think\Controller;
use think\facade\Db;
use app\common\validate\User as UserValidate;
use app\common\model\Category as CategoryModel;
// my order
use think\facade\Cache;
use think\exception\ValidateException;
use app\common\lib\Alicms;
use think\facade\Console;

class User extends Base

{
    //会员主页
    public function index()
    {

        $userSessionData = $this->isLogin();
        $user_id = $userSessionData['id'];
        //获取有没有搜索关键字，用于填充
        $search_key = input('request.search_key');
        $domain = $this->request->domain();
        //http://code0921.com/index/user/register?code=YJ1596269352
        $recommend_link = $domain . '/mobile/user/register?code=' . $userSessionData['code'];

        //  json_encode($userSessionData);
        //链接生成二维码并在新窗口打开
        /*echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
   <meta charset=\"UTF-8\">
   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
   <title>QR Code Generator</title>
   <!-- 在<head>标签中引入qrcode.js -->
   <script src=\"https://cdn.jsdelivr.net/npm/qrcode@1.4.4\"></script>
</head>
<body>

   <div id=\"qrcode\"></div>

   <script>
       // 要生成二维码的链接
       var targetUrl = '{$recommend_link}';

       // 创建二维码
       var qrcode = new QRCode(document.getElementById(\"qrcode\"), {
           text: targetUrl,
           width: 128,
           height: 128
       });

       // 在扫码后在新窗口打开链接
       function openLinkInNewWindow() {
           window.open(targetUrl, \"_blank\");
       }
   </script>

</body>
</html>";*/


        //点击按钮复制按钮内容
        /*<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Copy Link Example</title>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
</head>
<body>

<input type="text" value="https://example.com" id="copyInput" readonly>
<button id="copyButton" data-clipboard-target="#copyInput">复制链接</button>

<script>
    // 初始化 Clipboard.js
    var clipboard = new ClipboardJS('#copyButton');

    // 复制成功时的回调函数
    clipboard.on('success', function(e) {
        console.log('复制成功');
        e.clearSelection();  // 清除选中状态
    });

    // 复制失败时的回调函数
    clipboard.on('error', function(e) {
        console.error('复制失败');
    });
</script>

</body>
</html>*/
        $user_code = $userSessionData['code'];
        //成功推荐人数
        $all_count = Db::name('user')->where('recommender', '=', $user_code)->where('mer_count', '>=', 0)->select()->count();
        //当前用户(有效)推荐人数，所推荐的人至少采集过一个满足条件的商户
        $user_code = $userSessionData['code'];
        $user_count = Db::name('user')->where('recommender', '=', $user_code)->where('mer_count', '>', 0)->select()->count();
        //后续佣金逻辑
        $rewards = $user_count * 15;
    //  $userData = ['user_count' => $user_count, 'all_count' => $all_count, 'rewards' => $rewards];
        $userData = Db::name('user')->field('id,username,name,email,phone,avatar,status,unum,total,created_at,updated_at,last_login_time')->where('id',$userSessionData['id'])->find();
        //
        return json($userData);

        return view('', [
            'mer_Data' => $mer_Data,
            'search_key' => $search_key,
            'recommend_link' => $recommend_link,
            'userData' => $user_data
        ]);

        return view();
    }

    //用户信息更新
    public function userUpdate()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $data['submit_ip'] = $this->request->ip();
            $data['update_time'] = time();
            //上传用户头像 avatar
            /* $avatar= $this->request->file('avatar');
             $upload = new Uploader();
             $avatarPath = $upload->uploadimg($avatar);
             $path = json_decode($avatarPath, true);
             //获取图片路径
             $data['avatar'] = $path['path'];*/
            $data['password'] = $this->password_salt($data['password']);
            $res = Db::name('user')->update($data);
            if ($res) {
                return json(['status' => 1, 'message' => '用户信息更新成功!']);
            } else {
                return json(['status' => 0, 'message' => '用户信息更新失败!']);
            }
        }
    }

    //更新用户头像 avatar   需传入id 和 图片
    public function avatar()
    {

        if (request()->isPost()){
            $data = request()->post();
            if (!empty($_FILES['avatar']['name'])) {
                // 上传图片
                $store_pic = $this->request->file('avatar');

                $upload = new Uploader();
                $store_pic_path = $upload->uploadimg($store_pic);
                $path1 = json_decode($store_pic_path, true);
                //获取图片路径
                $data['avatar'] = $path1['path'];
            } else {
                return json(['status' => 0, 'message' => '图片不能为空!']);
            }
            $res = Db::name('user')->update($data);

            if (!$res) {
                return json(['status' => 0, 'message' => '头像上传失败!']);
            }
        } else {
            return json(['status' => 0, 'message' => '请使用正确的请求方式!']);
        }
    }

    //登录
    public function login()

    {


        $sessionUserData = session('sessionUserData');

        if (!empty($sessionUserData)) {
            return redirect('index');
        }
        if (request()->isPost()) {

            $data = input('post.');


            if (!$data) {
                return json(['status' => 0, 'message' => '请输入用户名!']);

            }
            // mobile 15100000002   password 1234567
            //  var_dump($this->password_salt($data['password']));die;//admin123456    a8a5c404e3927315ccb6e028d4372ac8

            /*    try {
                    validate(UserValidate::class)
                        ->scene('login')
                        ->check($data);
                } catch (ValidateException $e) {
                    // 验证失败 输出错误信息
                    return alert($e->getError(),'login',5);
                }*/


            //  var_dump($data);die;
            //验证码用户名
            $userData = Db::name('user')->where('username', $data['username'])->find();
            if (!$userData) {


                return json(['status' => 0, 'message' => '用户名不存在或者错误']);
                //  return alert('用户名不存在或者错误','login',5);
            }

            //如果管理员有状态，status=1合法  0禁止
            if ($userData['status'] != 1) {

                return json(['status' => 0, 'message' => '您的账号被禁止登录']);

                //return alert('您的账号被禁止登录','login',5);
            }


            //密码校验
            if ($userData['password'] != $this->password_salt($data['password'])) {

                return json(['status' => 0, 'message' => '密码错误']);

                //   return alert('密码错误','login',5);
            }

            Db::name('user')->where('id', $userData['id'])->update(['last_login_time' => time()]);
            session('sessionUserData', $userData);


            /*
             * {
"access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5zaG9wLmVkdXdvcmsuY24vYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3MjI5MTY0NjIsImV4cCI6MTcyMzI3NjQ2MiwibmJmIjoxNzIyOTE2NDYyLCJqdGkiOiJBTERRRldmMVJMU3R3Z2duIiwic3ViIjoiMjI0OTMiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.FipkiSlC-bDqqm2_p9FnWGQfsAvmS4HBsmxAzWg4V4E",
"token_type": "Bearer",
"expires_in": 360000
}*/
            return json(['status' => 1, 'message' => '登录成功!', 'access_token' => '123456', 'token_type' => 'Bearer', 'expires_in' => '360000']);
            //  return alert('登录成功','index',6);
        } else {
            return json(['status' => 0, 'message' => '请使用正确的请求方式!']);
            // return view('login_username');
        }
    }

    //退出登录
    public function loginOut()
    {

        session('sessionUserData', null);

        return json(['status' => 1, 'message' => '您已成功退出!']);

        //   $this->redirect('/mobile/user/login');
    }

    //微信授权登录
    public function wechat_login()
    {
        $sessionUserData = session('sessionUserData');
        if (!empty($sessionUserData)) {
            return redirect('index');
        }

        $appid = 'wxff5b68b241a4fb11';//公众号基本配置中获取
        $redirect_uri = 'http://a.xx.cn/mobile/user/weixin_m.html';//用户授权后跳转处理的地址
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . $redirect_uri . "&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        return redirect($url);
    }

    //微信授权登录回调
    public function weixin_m()
    {
        $code = input('get.code');
        $appid = 'wxff5b68b241a4fb11';//公众号基本配置中获取
        $appsecret = '412a24b17e61310d589b8bf92f374ffc';
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $appid . "&secret=" . $appsecret . "&code=" . $code . "&grant_type=authorization_code";
        $res = json_decode(file_get_contents($url), true);//json转数组
        // array:6 [
        //     "access_token" => "37_3RRxoQZKuECSpCfGMYLcO-1ZXu_uhTkdku_m29u4XfSq9-Ve_0Fn5_K6vUBpkiL1iXRpEBepOfeMZZA7TGm-bg"
        //     "expires_in" => 7200
        //     "refresh_token" => "37_CjmxjzqBCqiIVH3aKjR22RQniCr_7DYYJYgodMONV5822FnfKuq0VwOS0B9dfucHf6GxTjXbczruwS5NIkGAWw"
        //     "openid" => "oaq-51XAHNaj9qUxVwYu3-elVTa0"
        //     "scope" => "snsapi_userinfo"
        //     "unionid" => "oO0Bhv6ZSw4ZYV60CMzi2p4eUO7s"
        // ]

        //拉取用户信息(需scope为 snsapi_userinfo)
        $user_url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "&lang=zh_CN";
        $userData = json_decode(file_get_contents($user_url), true);//json转数组
        halt($userData);
    }

    //用户注册
    public function register()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $code = input('get.code');//推荐码

            if (empty($data['username'])) {
                return json(['status' => 0, 'message' => '用户名不能为空，请输入用户名!']);
            }

            if (empty($data['password'])) {
                return json(['status' => 0, 'message' => '密码不能为空,请输入密码!']);
            }

            //判断该用户状态
            $userData = Db::name('user')->where('username', $data['username'])->find();
            if ($userData['status'] == 1) {
                return json(['status' => 0, 'message' => '该用户名已经注册过了，请登录!']);
            }
            if ($userData['status'] == -1) {
                return json(['status' => 0, 'message' => '该账户已经封号，请更换其他账号!']);
            }
            if (empty($data['username'])) {
                return json(['status' => 0, 'message' => '用户名不能为空，请输入用户名!']);
            }
            if (empty($data['password'])) {
                return json(['status' => 0, 'message' => '密码不能为空,请输入密码!']);
            }

            //密码加密
            $data['password'] = $this->password_salt($data['password']);
            $data['add_time'] = time();
            $data['time'] = time();
            $data['submit_ip'] = $this->request->ip();

            $data['code'] = 'YJ' . time();
            if ($code) {
                $data['recommender'] = $code;
            }
            //  var_dump($data);die;
            $newUserId = Db::name('user')->insertGetId($data);  //获取最后一条插入数据的id

            if ($newUserId) {
                return json(['status' => 1, 'message' => '注册成功，请登录!']);

            } else {
                return json(['status' => 0, 'message' => '注册失败!']);
            }

        } else {
            return json(['status' => 0, 'message' => '请输入用户名和密码!']);
        }

    }


    public function fenyongScore($newUserId, $code)
    {
        //推荐人数据
        $userDataT = Db::name('user')->where('code', $code)->find();

        //更新新用户的parent_id
        Db::name('user')->where('id', $newUserId)->update(['parent_id' => $userDataT['id']]);

        //添加新用户积分
        Db::name('score')->insert([
            'user_id' => $newUserId,
            'score' => 200,
            'time' => time(),
            'source' => 2,
            'info' => '新用户奖励'
        ]);

        //推荐人积分
        Db::name('score')->insert([
            'user_id' => $userDataT['id'],
            'score' => 100,
            'source' => 2,
            'time' => time(),
            'info' => '推荐返佣'
        ]);

        return true;

    }



    //我的订单  //订单列表
    public function myorder(){
        $sessionUserData = $this->isLogin();
        $this->clearOrderStatus0();

        $orderData=Db::view('order', 'id,total_price,status,time,out_trade_no,pay_method,iscomment')
            ->view('address', 'shou_name', 'address.id=order.address_id')
            ->where('order.user_id', $sessionUserData['id'])->order('order.id desc')
            ->paginate(['list_rows'=> 2,'query'=>request()->param()]);
        //分页
        $page = $orderData->render();

        $orderData1=$orderData->items();

        foreach($orderData1 as $k=>$v){
            $orderData1[$k]['goods']=Db::name('order_goods')->alias('a')->field('a.*,b.goods_name,b.goods_thumb')->join('goods b','a.goods_id=b.goods_id')->where('a.order_id',$v['id'])->select()->toArray();
        }








        var_dump($page);die;
        return json($orderData1);die;

        //halt($orderData1);
        return view('',[
            'left_menu'=>11,
            'page'=>$page,
            'orderData1'=>$orderData1,
            'searchkey'=>''
        ]);
    }


    //用户订单搜索
    public function myorder_search(){
        $sessionUserData = $this->isLogin();
        $this->clearOrderStatus0();
        $searchkey=input('searchkey');
        //先找出有该关键字的所有订单id ,order数据表中的id 1,2
        //order数据表中查id in 1，2 分页



        $orderDataTmp=Db::view('order', 'id')
            ->view('order_goods', 'goods_id', 'order.id=order_goods.order_id')
            ->view('goods', 'goods_name', 'order_goods.goods_id=goods.goods_id')
            ->where('order.user_id', $sessionUserData['id'])
            ->where('goods.goods_name','like','%'.$searchkey.'%')->order('order.id desc')
            ->select()->toArray();

        if(empty($orderDataTmp)){
            return alert('没有找到'.$searchkey.'相关搜索结果','myorder',5);
        }

        foreach($orderDataTmp as $k=>$v){
            $idArr[]=$v['id'];
        }
        $idStr=implode(',',$idArr);

        $orderData = Db::view('order', 'id,total_price,status,time,out_trade_no,pay_method,iscomment')
            ->view('address', 'shou_name', 'address.id=order.address_id')
            ->where('order.user_id', $sessionUserData['id'])
            ->where('order.id','in',$idStr)
            ->paginate(['list_rows'=> 1,'query'=>request()->param()]);


        //分页
        $page = $orderData->render();

        $orderData1=$orderData->items();

        foreach($orderData1 as $k=>$v){
            $orderData1[$k]['goods']=Db::name('order_goods')->alias('a')->field('a.*,b.goods_name,b.goods_thumb')->join('goods b','a.goods_id=b.goods_id')->where('a.order_id',$v['id'])->select()->toArray();
        }
        //halt($orderData1);

        return view('user/myorder',[
            'left_menu'=>11,
            'page'=>$page,
            'orderData1'=>$orderData1,
            'searchkey'=>$searchkey
        ]);
    }


    //清除24小时过时待支付订单
    public function clearOrderStatus0(){

        $sessionUserData = $this->isLogin();


        //待支付订单如何处理
        //1、被动处理
        //2、轮回 定时器 占资源
        //3、队列 redis

        //24小时是86400秒

        $time=time()-86400;
        $orderDataTmp=Db::name('order')->where('user_id',$sessionUserData['id'])->where('status',0)->where('time','<',$time)->select();
        foreach($orderDataTmp as $k=>$v){
            Db::name('order')->where('id',$v['id'])->delete();
            Db::name('order_goods')->where('order_id',$v['id'])->delete();
        }
    }

    //我的订单详情
    public function myorder_detail(){
        //0 待付款 取消订单 立即支付  订单详情
        //1 已经支付待发货  订单详情
        //4 待确认收货  确认收货  订单详情
        //2 已完成  商品评价  订单详情 联系客服  删除订单
        $sessionUserData = $this->isLogin();
        $id=input('id');
        //订单数据
        $orderData=Db::name('order')->find($id);
        if(empty($orderData)){
            return redirect('myorder');
        }

        //商品订单数据
        $orderGoodsData=Db::name('order_goods')->alias('a')->field('a.*,b.goods_name,b.goods_thumb')->join('goods b','a.goods_id=b.goods_id')->where('a.order_id',$orderData['id'])->select()->toArray();

        $post_money=0;
        $goods_price=0;

        //caculate price计算价格
        foreach($orderGoodsData as $k=>$v){
            $post_money=$v['post_money']+$post_money;
            $goods_price=$goods_price+$v['goods_price']*$v['amount'];
        }


        //post_money 每件商品省下的钱   累加得到总共省下的钱
        //收货信息

        $addressData=Db::name('address')->find($orderData['address_id']);



        var_dump($orderGoodsData);die;
        return view('',[
            'left_menu'=>11,
            'orderData'=>$orderData,
            'orderGoodsData'=>$orderGoodsData,
            'addressData'=>$addressData,
            'post_money'=>$post_money,
            'goods_price'=>$goods_price
        ]);
    }

    //我的订单--待收货4
    public function myorder4(){
        $sessionUserData = $this->isLogin();
        $orderData=Db::view('order', 'id,total_price,status,time,out_trade_no,pay_method')
            ->view('address', 'shou_name', 'address.id=order.address_id')
            ->where('order.user_id', $sessionUserData['id'])
            ->where('order.status',4)->order('order.id desc')
            ->paginate(['list_rows'=> 1,'query'=>request()->param()]);


        //分页
        $page = $orderData->render();

        $orderData1=$orderData->items();

        foreach($orderData1 as $k=>$v){
            $orderData1[$k]['goods']=Db::name('order_goods')->alias('a')->field('a.*,b.goods_name,b.goods_thumb')->join('goods b','a.goods_id=b.goods_id')->where('a.order_id',$v['id'])->select()->toArray();
        }
        //halt($orderData1);
        return view('',[
            'left_menu'=>12,
            'page'=>$page,
            'orderData1'=>$orderData1
        ]);
    }


    //我的订单--待支付0
    public function myorder0(){
        $sessionUserData = $this->isLogin();

        //清除24小时过时待支付订单
        $this->clearOrderStatus0();



        $orderData=Db::view('order', 'id,total_price,status,time,out_trade_no,pay_method')
            ->view('address', 'shou_name', 'address.id=order.address_id')
            ->where('order.user_id', $sessionUserData['id'])
            ->where('order.status',0)->order('order.id desc')
            ->paginate(['list_rows'=> 1,'query'=>request()->param()]);


        //分页
        $page = $orderData->render();

        $orderData1=$orderData->items();

        foreach($orderData1 as $k=>$v){
            $orderData1[$k]['goods']=Db::name('order_goods')->alias('a')->field('a.*,b.goods_name,b.goods_thumb')->join('goods b','a.goods_id=b.goods_id')->where('a.order_id',$v['id'])->select()->toArray();
        }
        //halt($orderData1);
        return view('',[
            'left_menu'=>13,
            'page'=>$page,
            'orderData1'=>$orderData1
        ]);
    }

    //我的订单-确认收货
    public function order_status2(){
        $id=input('id');
        $res=Db::name('order')->where('id',$id)->update(['status'=>2]);
        if($res){
            return alert('操作成功','myorder',6);
        }else{
            return alert('操作失败','myorder',5);
        }
    }

    //我的订单-取消订单-删除订单
    public function order_delete(){
        $id=input('id');
        $res=Db::name('order')->where('id',$id)->delete();
        Db::name('order_goods')->where('order_id',$id)->delete();
        if($res){
            return alert('操作成功','myorder',6);
        }else{
            return alert('操作失败','myorder',5);
        }
    }



    //我的订单发表评价
    public function myorder_comment(){
        $sessionUserData = $this->isLogin();
        $id=input('id');
        $orderData=Db::name('order')->find($id);

        //做下判断
        if(empty($orderData) || $orderData['status']!=2){
            return redirect('myorder');
        }

        //获取商品数据
        $orderGoodsData=Db::name('order_goods')->alias('a')->field('a.order_id,b.goods_id,b.goods_thumb')->join('goods b','a.goods_id=b.goods_id')->where('order_id',$id)->where('a.iscomment',0)->select();

        return view('',[
            'left_menu'=>11,
            'orderGoodsData'=>$orderGoodsData
        ]);
    }

    //我的评论-发布评论
    public function myorder_comment_add(){
        $sessionUserData = $this->isLogin();
        $data=input('post.');
        $data['time']=time();
        $data['user_id']=$sessionUserData['id'];
        $res=Db::name('comment')->insert($data);
        if($res){
            //更改order_goods表中评论状态
            Db::name('order_goods')->where('order_id',$data['order_id'])->where('goods_id',$data['goods_id'])->update(['iscomment'=>1]);

            //查找是否还有没有评论的商品，如果都评论了，更新order中的iscomment
            $orderGoods=Db::name('order_goods')->where('order_id',$data['order_id'])->where('iscomment',0)->find();
            if(empty($orderGoods)){
                Db::name('order')->where('id',$data['order_id'])->update(['iscomment'=>1]);
            }

            return alert('操作成功','myorder',6);
        }else{
            return alert('操作失败','myorder',5);
        }


        halt($data);

    }

    //我的评论列表
    public function comment_list(){
        $sessionUserData = $this->isLogin();
        $commentData=Db::view('comment', 'id,content,star,time')
            ->view('goods', 'goods_thumb,goods_id', 'comment.goods_id=goods.goods_id')
            ->view('user', 'username', 'comment.user_id=user.id')
            ->where('comment.user_id',$sessionUserData['id'])
            ->order('comment.id desc')
            ->paginate(10);

        return view('',[
            'left_menu'=>23,
            'commentData'=>$commentData
        ]);
    }

    //sleep
    //默认好评 默认收货
    //现在有1万个会员，自动判断到期，而且会给用户发消息
    //域名、主机、服务器
    //未支付订单的处理，过了1天仍然没有支付，那就自动取消订单
    //redis 有序队列
    //2
    //3
    public function text(){
        while(true){
            //order status 2 没有评论的，
            $this->comment_add_auto();
            //order status 4 已经发货的，15天用户也没有确认收货按钮，处理成已经收货完成，默认好评

            $this->order_status_auto();
            sleep(1);
        }
    }

    //已经确认收货，没有评论，默认添加评论
    public function comment_add_auto(){
        $time=time()-60*60*24;//一天24小时
        $orderGoodsData=Db::view('order_goods', 'id,order_id,goods_id')
            ->view('order', 'time', 'order_goods.order_id=order.id')
            ->where('order.status',2)
            ->where('order_goods.iscomment',0)
            ->where('order.time','<',$time)
            ->order('order.time asc')
            ->find();
        //好评 comment iscoment 1


        if($orderGoodsData){
            $sessionUserData = $this->isLogin();
            $data['order_id']=$orderGoodsData['order_id'];
            $data['user_id']=$sessionUserData['id'];
            $data['goods_id']=$orderGoodsData['goods_id'];
            $data['time']=time();
            $data['star']=5;
            $data['content']='好评';

            $res=Db::name('comment')->insert($data);
            if($res){
                //更改order_goods表中评论状态
                Db::name('order_goods')->where('order_id',$data['order_id'])->where('goods_id',$data['goods_id'])->update(['iscomment'=>1]);

                //查找是否还有没有评论的商品，如果都评论了，更新order中的iscomment
                $orderGoods=Db::name('order_goods')->where('order_id',$data['order_id'])->where('iscomment',0)->find();
                if(empty($orderGoods)){
                    Db::name('order')->where('id',$data['order_id'])->update(['iscomment'=>1]);
                }

            }
        }
    }

    //已经确认收货，没有评论，默认添加评论
    public function order_status_auto(){
        $time=time()-60*60*24;//一天24小时
        $orderGoodsData=Db::view('order_goods', 'id,order_id,goods_id')
            ->view('order', 'time', 'order_goods.order_id=order.id')
            ->where('order.status',4)
            ->where('order_goods.iscomment',0)
            ->where('order.time','<',$time)
            ->order('order.time asc')
            ->find();
        //好评 comment iscoment 1


        if($orderGoodsData){

            $sessionUserData = $this->isLogin();
            $data['order_id']=$orderGoodsData['order_id'];
            $data['user_id']=$sessionUserData['id'];
            $data['goods_id']=$orderGoodsData['goods_id'];
            $data['time']=time();
            $data['star']=5;
            $data['content']='好评';

            $res=Db::name('comment')->insert($data);
            Db::name('order')->where('id',$orderGoodsData['order_id'])->update(['status'=>2]);
            if($res){
                //更改order_goods表中评论状态
                Db::name('order_goods')->where('order_id',$data['order_id'])->where('goods_id',$data['goods_id'])->update(['iscomment'=>1]);

                //查找是否还有没有评论的商品，如果都评论了，更新order中的iscomment
                $orderGoods=Db::name('order_goods')->where('order_id',$data['order_id'])->where('iscomment',0)->find();
                if(empty($orderGoods)){
                    Db::name('order')->where('id',$data['order_id'])->update(['iscomment'=>1]);
                }

            }
        }
    }

    public function hello($name)
    {
        $output = Console::call('hello', [$name]);
        return $output->fetch();
    }



}

