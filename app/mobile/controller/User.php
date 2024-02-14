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


        //  var_dump($userSessionData);die;
            //获取有没有搜索关键字，用于填充
            $search_key=input('request.search_key');

            $mer_Data=Db::name('merchant')->alias('a')->where('a.store_name','like','%'.$search_key.'%')->where('user_id','=',"$user_id")->order('add_time desc')->paginate(10);




       //    var_dump($mer_Data);die;
            return view('', [

                'mer_Data' => $mer_Data,

                'search_key'=>$search_key

            ]);


            //显示商户列表或者汽车列表
            //var_dump($_POST);die;
            //return alert('用户名错误','index',5);

            return view();
        }


    public function merchant_add(){

        $userSessionData = $this->isLogin();

        if(request()->isPost()){

            $data=request()->post();

            //时间戳插件 添加入库的是需要把2020-05-20 12：12：12 转成时间戳入库 strtotime
            //编辑的时候，把时间戳转成时间格式 2020-05-20 12：12：12

           /* if(!empty($data['time1'])){
                $data['time1']=strtotime($data['time1']);
            }else{
                $data['time1']=time();//当前时间戳
            }

            if(!empty($data['time2'])){
                $data['time2']=strtotime($data['time2']);
            }else{
                $data['time2']=time();//当前时间戳
            }*/

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

            $res=Db::name('merchant')->insert($data);
            if($res){
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
            }


           // var_dump($data);die;

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


        $user_Data=Db::name('user')->find($userSessionData['id']);

        return view('',[

            'user_Data'=>$user_Data,

        ]);

        return view();
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
            }


            // var_dump($data);die;

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

                try {
                    validate(UserValidate::class)
                        ->scene('login')
                        ->check($data);
                } catch (ValidateException $e) {
                    // 验证失败 输出错误信息
                    return alert($e->getError(),'login',5);
                }

                //验证码用户名
                $userData=Db::name('user')->where('mobile',$data['mobile'])->find();
                if(!$userData){
                    return alert('手机号不存在或者错误','login',5);
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
                return view();
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




        public  function login_out(){

            session('sessionUserData',null);

            $this->redirect('/mobile/user/login');

        }




}

