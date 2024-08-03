<?php
namespace app\mobile\controller;

use app\common\lib\Uploader;
use think\Controller;
use think\facade\Db;

use app\common\validate\User as UserValidate;

use app\common\model\Category as CategoryModel;


class User extends  Base

{
        //会员主页
        public function index(){

            $userSessionData = $this->isLogin();
            $user_id =  $userSessionData['id'];
         //   print_r($userSessionData);die;
           // var_dump($userSessionData);die;
            //获取有没有搜索关键字，用于填充
            $search_key=input('request.search_key');
            $mer_Data=Db::name('merchant')->alias('a')->where('a.store_name','like','%'.$search_key.'%')->where('user_id','=',"$user_id")->order('add_time desc')->paginate(10);

            $domain = $this->request->domain();
            //http://code0921.com/index/user/register?code=YJ1596269352
            $recommend_link = $domain.'/mobile/user/register?code='.$userSessionData['code'];

/*{
	"id": 22493,
	"name": "admin",
	"email": "admin@gmail.com",
	"phone": null,
	"avatar": null,
	"openid": null,
	"total": 10,
	"unum": 0,
	"avatar_url": "https://api.shop.eduwork.cn/imgs/avatar.png",
	"is_locked": 0,
	"created_at": "2024-07-20 09:24:14",
	"updated_at": "2024-07-20 09:24:14"
}*/
/*
 * ^ "{"id":2,"username":"admin123456","password":"a8a5c404e3927315ccb6e028d4372ac8","last_login_time":1721630964,
 * mobile":"15100000001","status":1,"time":1707983653,"face":null,"unionid":null,"email":"admin@qq.com","sex":3,"xingzuo":null,
 * "parent_id":0,"code":"YJ1596269352","nicname":null,"real_name":"\u8001\u4e5d","id_front_pic":"\\public\\upload\/20240215\\6b53bbb474985ab7357d235becfc999b.png",
 * "id_back_pic":"\\public\\upload\/20240215\\ad49bd1fdcfe4ab4753d84ac7f891eeb.png","self_pic":"\\public\\upload\/20240215\\d6122dcbd4ea95cb83bb12dee5463f63.png",
 * "add_time":null,"update_time":1707980452,"check_status":0,"referral_code":null,"id_number":"513232198710160820","remark":"\u8be5\u4f1a\u5458\u6761\u4ef6\u4e0d\u9519\uff0c\u5ba1\u6838\u901a\u8fc7\u3002",
 * "cash_address":"usdtqwrqrqqrqrqrqrqwrqwsfsfs","submit_ip":"127.0.0.1","recommender":"","mer_count":7} ◀"*/

            $userdata= [];
            $userdata['id'] =  $userSessionData['id'];
            $userdata['name'] =  $userSessionData['real_name'];
            $userdata['email'] = $userSessionData['username'];
            $userdata['phone'] = $userSessionData['mobile'];
            $userdata['openid'] = $userSessionData['unionid'];
            $userdata['total'] = 10;
            $userdata['unum'] = 0;
            $userdata['avatar_url'] = 'https://baidu.com';
            if ($userSessionData['status']==1){
                $userdata['is_locked'] =0;
            }else{
                $userdata['is_locked'] =1;
            }
            $userdata['created_at'] = $userSessionData['add_time'];
            $userdata['updated_at'] = $userSessionData['update_time'];



           return json_encode($userdata);


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
            $user_code =  $userSessionData['code'];
            //成功推荐人数
            $all_count = Db::name('user')->where('recommender','=',$user_code)->where('mer_count','>=',0)->select()->count();
            //当前用户(有效)推荐人数，所推荐的人至少采集过一个满足条件的商户
            $user_code =  $userSessionData['code'];
            $user_count = Db::name('user')->where('recommender','=',$user_code)->where('mer_count','>',0)->select()->count();

            //后续佣金逻辑
            $rewards = $user_count*15;
            $user_data =['user_count'=>$user_count,'all_count'=>$all_count,'rewards'=>$rewards];
            //var_dump($mer_Data);die;
            return view('', [
                'mer_Data' => $mer_Data,
                'search_key'=>$search_key,
                'recommend_link'=>$recommend_link,
                'user_data'=>$user_data
            ]);

            return view();
        }

    public function merchant_add(){
        $userSessionData = $this->isLogin();

        if(request()->isPost()){

            $data=request()->post();

            $data['submit_ip'] = $this->request->ip();
            $data['user_id'] = $userSessionData['id'];
            $data['add_time'] = time();

            // 上传图片
            $store_pic = $this->request->file('store_pic');
            $payment_code_pic = $this->request->file('payment_code_pic');

            if (empty($store_pic) || empty($payment_code_pic)){

                 return alert('图片不能为空!','index',5);
            }
            $upload = new Uploader();
            $store_pic_path = $upload->uploadimg($store_pic);
            $payment_path = $upload->uploadimg2($payment_code_pic);

            $path1 = json_decode($store_pic_path,true);
            $path2 = json_decode($payment_path,true);
             //获取图片路径
            $data['store_pic'] = $path1['path'];
            $data['payment_code_pic'] = $path2['path'];

            $res_mer=Db::name('merchant')->insert($data);


            if($res_mer){
                $userdata =Db::name('user')->where('username','=',$userSessionData['username'])->find();
                $userdata['mer_count'] = $userdata['mer_count']+1;
                $user_res=Db::name('user')->update($userdata);  //更新商户个数

                return alert('操作成功','index',6);
            }else{
                return alert('操作失败','index',5);
            }
        }
        return view();
    }



    /*修改*/

    public function merchant_edit(){
        //先取出填充的数据
        $id  =input('request.id');
        $mer_Data=Db::name('merchant')->find($id);
      //  var_dump($mer_Data);die;
        return view('',[
            'merdd_Data'=>$mer_Data,
        ]);
    }

    public function merchant_update(){

        if(request()->isPost()){

            $data=request()->post();

            $data['submit_ip'] = $this->request->ip();
            $data['update_time'] = time();
          //  var_dump($_FILES['store_pic']);die;

            if (!empty($_FILES['store_pic']['name']) || !empty($_FILES['payment_code_pic']['name'])){
                // 上传图片
                $store_pic = $this->request->file('store_pic');
                $payment_code_pic = $this->request->file('payment_code_pic');
                $upload = new Uploader();
                $store_pic_path = $upload->uploadimg($store_pic);
                $payment_path = $upload->uploadimg2($payment_code_pic);

                $path1 = json_decode($store_pic_path,true);
                $path2 = json_decode($payment_path,true);

                //获取图片路径
                $data['store_pic'] = $path1['path'];
                $data['payment_code_pic'] = $path2['path'];
            }else{
                return alert('图片不能为空','merchant_edit',5);

            }

            $res=Db::name('merchant')->update($data);

            if($res){
                return alert('操作成功','index',6);
            }else{
                return alert('操作失败','index',5);
            }
        }
    }
    //user data
    public function user_edit(){

        $userSessionData = $this->isLogin();


      //  var_dump($userSessionData);die;


        $user_Data=Db::name('user')->find($userSessionData['id']);

        return view('',[

            'user_Data'=>$user_Data,

        ]);

        return view();
    }


    //会员信息更新
    public  function  userinfo(){



    }

    public  function  user_update(){

        if(request()->isPost()){

            $data=request()->post();

            $data['submit_ip'] = $this->request->ip();
            $data['update_time'] = time();

            if (!empty($_FILES['id_front_pic']['name']) || !empty($_FILES['id_back_pic']['name'])|| !empty($_FILES['self_pic']['name'])){
                // 上传图片
                $store_pic = $this->request->file('id_front_pic');
                $payment_code_pic = $this->request->file('id_back_pic');
                $self_pic = $this->request->file('self_pic');


                $upload = new Uploader();
                $store_pic_path = $upload->uploadimg($store_pic);
                $payment_path = $upload->uploadimg2($payment_code_pic);
                $self_pic_path = $upload->uploadimg($self_pic);

                $path1 = json_decode($store_pic_path,true);
                $path2 = json_decode($payment_path,true);
                $path3 = json_decode($self_pic_path,true);

                //获取图片路径
                $data['id_front_pic'] = $path1['path'];
                $data['id_back_pic'] = $path2['path'];
                $data['self_pic'] = $path3['path'];

            }else{

                return alert('图片不能为空','user_edit',5);
            }

            // var_dump($data);die;

            $res=Db::name('user')->update($data);

            if($res){
                return alert('操作成功','index',6);
            }else{
                return alert('操作失败','user_edit',5);
            }
        }


    }

    public function car_edit(){
        //先取出填充的数据
        $id  =input('request.id');
        $cardd_Data=Db::name('merchant')->find($id);

        return view('',[

            'cardd_Data'=>$cardd_Data,

        ]);
    }

    public function car_update(){

        if(request()->isPost()){

            $data=request()->post();

            $data['submit_ip'] = $this->request->ip();
            $data['update_time'] = time();
            //  var_dump($_FILES['store_pic']);die;

            if (!empty($_FILES['car_pic']['name'])){
                // 上传图片
                $store_pic = $this->request->file('car_pic');
                $upload = new Uploader();
                $store_pic_path = $upload->uploadimg($store_pic);

                $path1 = json_decode($store_pic_path,true);

                //获取图片路径
                $data['car_pic'] = $path1['path'];
            }else{

                return alert('图片不能为空','car_edit',5);

            }


            $res=Db::name('merchant')->update($data);

            if($res){
                return alert('操作成功','index',6);
            }else{
                return alert('操作失败','index',5);
            }
        }
    }

        //登录
        public function login()

        {
            $sessionUserData=session('sessionUserData');
            if(!empty($sessionUserData)){
                return redirect('index');
            }
            if(request()->isPost()){

                $data=input('post.');
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
                $userData=Db::name('user')->where('username',$data['username'])->find();
                if(!$userData){
                    return alert('用户名不存在或者错误','login',5);
                }

                //如果管理员有状态，status=1合法  0禁止
                if($userData['status']!=1){
                    return alert('您的账号被禁止登录','login',5);
                }

                //密码校验
                if($userData['password']!=$this->password_salt($data['password'])){
                    return alert('密码错误','login',5);
                }

                Db::name('user')->where('id',$userData['id'])->update(['last_login_time'=>time()]);
                session('sessionUserData',$userData);

                return alert('登录成功','index',6);

            }else{
                return view('login_username');
            }
        }

        //微信授权登录
        public function wechat_login(){
            $sessionUserData=session('sessionUserData');
            if(!empty($sessionUserData)){
                return redirect('index');
            }
            
            $appid='wxff5b68b241a4fb11';//公众号基本配置中获取
            $redirect_uri='http://a.xx.cn/mobile/user/weixin_m.html';//用户授权后跳转处理的地址
            $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
            return redirect($url);
        }

        //微信授权登录回调
        public function weixin_m(){
            $code=input('get.code');
            $appid='wxff5b68b241a4fb11';//公众号基本配置中获取
            $appsecret='412a24b17e61310d589b8bf92f374ffc';
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appsecret."&code=".$code."&grant_type=authorization_code";
            $res=json_decode(file_get_contents($url),true);//json转数组
            // array:6 [
            //     "access_token" => "37_3RRxoQZKuECSpCfGMYLcO-1ZXu_uhTkdku_m29u4XfSq9-Ve_0Fn5_K6vUBpkiL1iXRpEBepOfeMZZA7TGm-bg"
            //     "expires_in" => 7200
            //     "refresh_token" => "37_CjmxjzqBCqiIVH3aKjR22RQniCr_7DYYJYgodMONV5822FnfKuq0VwOS0B9dfucHf6GxTjXbczruwS5NIkGAWw"
            //     "openid" => "oaq-51XAHNaj9qUxVwYu3-elVTa0"
            //     "scope" => "snsapi_userinfo"
            //     "unionid" => "oO0Bhv6ZSw4ZYV60CMzi2p4eUO7s"
            // ]

            //拉取用户信息(需scope为 snsapi_userinfo)
            $user_url="https://api.weixin.qq.com/sns/userinfo?access_token=".$res['access_token']."&openid=".$res['openid']."&lang=zh_CN";
            $userData=json_decode(file_get_contents($user_url),true);//json转数组
            halt($userData);
        }

        public function register(){


           /* if(request()->isPost()) {
                $data=input('post.');
                if (empty($data['username'])){
                    return alert('用户名不能为空，请输入用户名!','register',5);
                }
                if (empty($data['password'])){
                    return alert('密码不能为空,请输入密码！!','register',5);
                }
                $data['add_time'] = time();
                $data['submit_ip'] = $this->request->ip();
                $res=Db::name('user')->insert($data);
            }*/


            if(request()->isPost()){
                $data=input('post.');
                $code=input('get.code');//推荐码

                //判断该手机号状态
                $userData=Db::name('user')->where('username',$data['username'])->find();
                if($userData['status']==1){
                    return alert('该用户名已经注册过了，请登录','login',5);
                }
                if($userData['status']==-1){
                    return alert('该账户已经封号，请更换其他账号','register',5);
                }
                if (empty($data['username'])){
                    return alert('用户名不能为空，请输入用户名!','register',5);
                }
                if (empty($data['password'])){
                    return alert('密码不能为空,请输入密码！!','register',5);
                }

                //密码加密
                $data['password']=$this->password_salt($data['password']);
                $data['add_time']=time();
                $data['time']=time();



                $data['code']='YJ'.time();



                if ($code){
                    $data['recommender'] = $code;
                }


              //  var_dump($data);die;

                $newUserId =   Db::name('user')->insertGetId($data);



                if ($newUserId){
                    return alert('注册成功，请登录','login',6);

                }else{
                    return alert('注册失败','register',5);

                }

            }else{
                return view();
            }

         }

    public function fenyongScore($newUserId,$code){
        //推荐人数据
        $userDataT=Db::name('user')->where('code',$code)->find();

        //更新新用户的parent_id
        Db::name('user')->where('id',$newUserId)->update(['parent_id'=>$userDataT['id']]);

        //添加新用户积分
        Db::name('score')->insert([
            'user_id'=>$newUserId,
            'score'=>200,
            'time'=>time(),
            'source'=>2,
            'info'=>'新用户奖励'
        ]);

        //推荐人积分
        Db::name('score')->insert([
            'user_id'=>$userDataT['id'],
            'score'=>100,
            'source'=>2,
            'time'=>time(),
            'info'=>'推荐返佣'
        ]);

        return true;

    }


        public  function login_out(){

            session('sessionUserData',null);

            $this->redirect('/mobile/user/login');

        }




}

