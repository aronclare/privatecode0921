<?php

namespace app\index\controller;

use think\Controller;
use think\facade\Db;
use think\facade\Cache;
use app\common\validate\User as UserValidate;
use think\exception\ValidateException;
use app\common\lib\Alicms;
use app\common\lib\Uploader;
use think\facade\Console;
class User extends  Base

{

    public function index(){
        $sessionUserData=$this->isLogin();
        $collectCount=Db::name('collect')->where('user_id',$sessionUserData['id'])->count();


        return view('',[
            'left_menu'=>0,
            'collectCount'=>$collectCount
        ]);

    }


     //修改会员资料
     public function info(){

        $sessionUserData=$this->isLogin();

        $userData=Db::name('user')->find($sessionUserData['id']);

        return view('',[

            'userData'=>$userData,
            'left_menu'=>41
        ]); 
    }

     //头像上传
     public function upload(){
        $upload=new Uploader();
        $upload->upload();
    }

    //会员签到
    public function sign(){
        $sessionUserData=$this->isLogin();

        //先检测今天是否签到
        $scoreData=Db::name('score')->where('user_id',$sessionUserData['id'])->whereDay('time')->where('source',1)->order('id desc')->find();
        if(!empty($scoreData)){
            return alert('你今天已经签到了','index',5);
        }

        $res=Db::name('score')->insert([
            'user_id'=>$sessionUserData['id'],
            'time'=>time(),
            'score'=>10,
            'info'=>'签到赚取积分'
        ]);
        if($res){
            return alert('签到成功','index',6);
        }else{
            return alert('签到失败','index',5);
        }
    }




    

    //修改会员资料更新

    public function index_update(){


        if(request()->isPost()){

            $sessionUserData=$this->isLogin();

            $user_id=$sessionUserData['id'];

            $data = input('post.');

            unset($data['file']);

            //validate校验
            $validate=new \app\common\validate\User();
            if(!$validate->scene('info')->check($data)){
                return alert($validate->getError(),'info',5,3);
            }


            //更新数据库操作
            $res=Db::name('user')->where('id',$user_id)->update($data);


            if($res){

                return alert('操作成功！','index',6,3);

            }else{

                return alert('操作失败！','index',5,3);

            }

        }

        

        

    }

    //全网昵称唯一
    public function checkUsername(){
       $data=input('post.');
       $userData=Db::name('user')->where('username',$data['username'])->where('id','<>',$data['id'])->find();
       if($userData){
           return json(['code'=>1]);
       }else{
            return json(['code'=>0]);
       }
    }


    //会员退出
    public function login_out(){
        session('sessionUserData',null);
        return redirect('/');
    }

    //会员登录
    public function login()
    {
        $sessionUserData=session('sessionUserData');
        if(!empty($sessionUserData)){
            return redirect('index');
        }

        if(request()->isPost()){
            $data=input('post.');
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


            $token = fsdklfdjslfdksjlfksjflskfjlskfslkfwqerwrelwkxvxvmx;
            return alert('登录成功','index',6);

        }else{
            return view();
        }

    }



    //微信扫码登录
    public function wechat(){
        $appid='wx868f988d79a4f25b';
        $REDIRECT_URI=urlEncode('http://www.xxx.cn/index/user/weixin.html');
        $url='https://open.weixin.qq.com/connect/qrconnect?appid='.$appid.'&redirect_uri='.$REDIRECT_URI.'&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect';
        return redirect($url);
    }

    //微信扫码登录后处理
    public function weixin(){
       
        $code=input('get.code');
        $appid='wx868f988d79a4f25b';
        $appsecret='a2b426f2882b6a1398b8312cc1de037b';
        $url='https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code';

        //$res=file_get_contents($url);
        // {"access_token":"35_HINwxRbVGwM3R4PbOyoINNVTzH5S8tNqsATXDYGh9NUQWj7Z7lbYjOzVb_tl80JrdlKfihY0e4CtFpjobLHW14P_YRWOWKMnx5pIB8BhOqY","expires_in":7200,"refresh_token":"35_uIxPmh4MHNn-2r9-GBPn2ZRt9H0coLrwO3R-sefGEoB_AcisodzL_NZAuTH4ABCJty0pOUV41dAWJqzi5UUAxoxwsz18T3T6d_mCjsFU24o","openid":"oP19r1PgUR1_k4Efu8tSoJBdRn78","scope":"snsapi_login","unionid":"oO0Bhv0llJvwqSMmA0OwS8q-NBn4"} 

        //json转数组
        $res=json_decode(file_get_contents($url),true);

        // [
        //     "access_token" => "35_e50x27-4SDubvqqlS-PrajOIbKtN7sxV6od5x3yF_mjhbgijjbwcT-ZZcklLk8KoehCqLt0OXWqW8wetPKLk-JLkNtiki5OtS1Me9QNWkJM"
        //     "expires_in" => 7200
        //     "refresh_token" => "35_nFXGDJ1JTO7z9rHG0Ziec-NRnoWvzAPLaLg5DhOetngglknNZtjfDoU6ydd3FlcgOOS9D9o8XBPLa4ibsF9W-3KXQYLsNMaxZD1MH2TZK3g"
        //     "openid" => "oP19r1PgUR1_k4Efu8tSoJBdRn78"
        //     "scope" => "snsapi_login"
        //     "unionid" => "oO0Bhv0llJvwqSMmA0OwS8q-NBn4"
        // ]
        $access_token=$res['access_token'];
        $openid=$res['openid'];
        $url='https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid;
        
        //$userInfo=file_get_contents($url);//json格式
        // {"openid":"oP19r1PgUR1_k4Efu8tSoJBdRn78","nickname":"阿芹","sex":2,"language":"zh_CN","city":"Texas","province":"Shandong","country":"CN","headimgurl":"http:\/\/thirdwx.qlogo.cn\/mmopen\/vi_32\/Q0j4TwGTfTIrKg5HHPu3UA5bria41g6a8W76DibHwK2lwwAteR4KO8nEH1cpBhjcbD7b61SGOHuicMLrUBvTHNmKg\/132","privilege":[],"unionid":"oO0Bhv0llJvwqSMmA0OwS8q-NBn4"}
        
        //json转数组
        $userInfo=json_decode(file_get_contents($url),true);
        // $userInfo=[
        //     "openid" => "oP19r1PgUR1_k4Efu8tSoJBdRn78",
        //     "nickname" => "阿芹",
        //     "sex" => 2,
        //     "language" => "zh_CN",
        //     "city" => "Texas",
        //     "province" => "Shandong",
        //     "country" => "CN",
        //     "headimgurl" => "http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIrKg5HHPu3UA5bria41g6a8W76DibHwK2lwwAteR4KO8nEH1cpBhjcbD7b61SGOHuicMLrUBvTHNmKg/132",
        //     "privilege" => [],
        //     "unionid" => "oO0Bhv0llJvwqSMmA0OwS8q-NBn4",
        // ];

        //halt($userInfo);
    
        //数据库查找unionid=oO0Bhv0llJvwqSMmA0OwS8q这个用户，在数据库中是否存在？
        //存在：就更新下最后一次登录时间、存缓存，跳转到用户主页
        //不存在，第一次微信扫码登录，跳转到绑定手机号页面，输入手机号，提交过来
        //提交后处理：186手机号，查找186是否在数据库中，
        //186在数据库中，一直手机号登录，第一次微信登陆，绑定
        //186没有在数据库中，手机号、微信注册入库……
        
        $userData=Db::name('user')->where('unionid',$userInfo['unionid'])->find();
        if(empty($userData)){
            //绑定手机号
            session('wechatData',$userInfo);
            return redirect('wechat_mobile');

        }else{
            //直接跳转到会员主页
            Db::name('user')->where('unionid',$userInfo['unionid'])->update(['last_login_time'=>time()]);
            session('sessionUserData',$userData);
            return redirect('index');
        }

    }


    //会员注册
    public function register()

    {   
        
        if(request()->isPost()){
            $data=input('post.');
            $code=input('get.code');//推荐码
            // try {
            //     validate(UserValidate::class)
            //     ->scene('register')
            //     ->check($data);
            // } catch (ValidateException $e) {
            //     // 验证失败 输出错误信息
            //     return alert($e->getError(),'register',5);
            // }

            //判断该手机号状态
            $userData=Db::name('user')->where('mobile',$data['mobile'])->find();
            if($userData['status']==1){
                return alert('该手机号已经注册过了，请登录','login',5);
            }
            if($userData['status']==-1){
                return alert('该手机账号已经封号，请更换其他账号','register',5);
            }

            $smscode='123456';
            //$smscode=Cache::store('redis')->get($data['mobile']);
            //redis
            if($data['smscode']!=$smscode){
                return alert('手机验证码错误','register',5);
            }

            //密码加密
            $data['password']=$this->password_salt($data['password']);
            $data['time']=time();
            $data['code']='YJ'.time();
            $data['username']=$data['mobile'];
            unset($data['smscode']);
            
            

            if($code){

                Db::startTrans();
                try {
                    $newUserId=Db::name('user')->insertGetId($data);
                    $this->fenyongScore($newUserId,$code);
  
                    // 提交事务
                    Db::commit();
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    return alert('注册失败','register',5);
                }
               
                return alert('注册成功，请登录','login',6);
                
               
            }else{
                $newUserId=Db::name('user')->insertGetId($data);
                if($newUserId){
                    return alert('注册成功，请登录','login',6);
                }else{
                    return alert('注册失败','register',5);
                }
                
            }
            
           
        }else{
            return view();
        }
        

    }

   
    //推荐返佣积分逻辑
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



    //微信登录绑定手机号
    public function wechat_mobile(){
        
        //微信扫码后的用户数据
        $wechatData=session('wechatData');
        if(empty($wechatData)){
            return alert('请登录','login',5);
        }

        if(request()->isPost()){

            $data=input('post.');//表单提交数据

            //validate验证
            try {
                validate(UserValidate::class)
                ->scene('bind_mobile')
                ->check($data);
            } catch (ValidateException $e) {
                // 验证失败 输出错误信息
                return alert($e->getError(),'wechat_mobile',5);
            }


            //验证码
            $smscode='123456';
            //$smscode=Cache::store('redis')->get($data['mobile']);
            //redis
            if($data['smscode']!=$smscode){
                return alert('手机验证码错误','wechat_mobile',5);
            }

            

            $userData=Db::name('user')->where('mobile',$data['mobile'])->find();
            if(empty($userData)){
                //新用户，插入记录
                Db::name('user')->insert([
                    'mobile'=>$data['mobile'],
                    'username'=>$data['mobile'],
                    'unionid'=>$wechatData['unionid'],
                    'last_login_time'=>time(),
                    'face'=>$wechatData['headimgurl'],
                ]);

                $userData=Db::name('user')->where('mobile',$data['mobile'])->find();
                session('sessionUserData',$userData);
                return redirect('edit_password');

            }else{
                //老用户绑定，更新记录
                Db::name('user')->where('mobile',$data['mobile'])->update(['last_login_time'=>time(),'unionid'=>$wechatData['unionid']]);
                session('sessionUserData',$userData);
                return redirect('index');
            }

            
            
            
        }else{
            return view();
        }

        
    }



    //修改密码
    public function edit_password(){
        $sessionUserData=$this->isLogin();

        if(request()->isPost()){
            $data=input('post.');
            //validate验证
            try {
                validate(UserValidate::class)
                ->scene('edit_password')
                ->check($data);
            } catch (ValidateException $e) {
                // 验证失败 输出错误信息
                return alert($e->getError(),'edit_password',5);
            }

            $password=$this->password_salt($data['password']);
            $res=Db::name('user')->where('id',$sessionUserData['id'])->update(['password'=>$password]);
            if($res){
                return alert('操作成功','index',6);
            }else{
                return alert('操作失败','login',5);
            }

        }else{
            return view('',[
                'left_menu'=>42
            ]);
        }
    }

    //全部设置为已读
    public function read_all(){
        //1、一刀切：把notice_read当前用户记录全部删除，notice(type 0)_全部插入notice_read
        //2、补丁：找到已读的notice_id，并转成字符串 1,2,3,再找出notice不在notin1,2,3,找到结果.再把4，5插入notice_read


        $userData = $this->isLogin();

        //查找当前用户已读数据
        $noticeIsreadData=Db::name('notice_read')->field('notice_id')->where('user_id',$userData['id'])->select()->toArray();

        //转一维数组
        $noticeIsreadData=array_column($noticeIsreadData,'notice_id');

        //找出没有读的id
        $noticeData=Db::name('notice')->where('type',0)->whereNotIn('id',$noticeIsreadData)->select();

        //插入的已读数据表中
        foreach($noticeData as $k=>$v){
            Db::name('notice_read')->insert([
                'user_id'=>$userData['id'],
                'notice_id'=>$v['id']
            ]);
        }
    }

    //全部设置为已读，私信
    public function read_all_private(){
        $userData = $this->isLogin();
        $noticeIsreadData=Db::name('notice_read')->field('notice_id')->where('user_id',$userData['id'])->select()->toArray();
        $noticeIsreadData=array_column($noticeIsreadData,'notice_id');//转一维数组

        $noticeData=Db::name('notice')->where('type',1)->whereFindInSet('user_id',$userData['id'])->whereNotIn('id',$noticeIsreadData)->select();
        foreach($noticeData as $k=>$v){
            Db::name('notice_read')->insert([
                'user_id'=>$userData['id'],
                'notice_id'=>$v['id']
            ]);
        }
    }

    //消息通知，集体通知
    public function notice(){

        $sessionUserData=$this->isLogin();

        //全体消息列表
        $noticeData=Db::name('notice')->where('type',0)->paginate(10);

        $noticeReadData=Db::name('notice_read')->field('notice_id')->where('user_id',$sessionUserData['id'])->select()->toArray();
        $noticeReadData=array_column($noticeReadData,'notice_id');

        return view('',[
            'left_menu'=>43,
            'noticeData'=>$noticeData,
             'noticeReadData'=>$noticeReadData
        ]);

       
    }

    //消息通知，私信
    public function notice_private(){

        $sessionUserData=$this->isLogin();

        //私信消息列表
        $noticeData=Db::name('notice')->where('type',1)->whereFindInSet('user_id',$sessionUserData['id'])->paginate(10);

        $noticeReadData=Db::name('notice_read')->field('notice_id')->where('user_id',$sessionUserData['id'])->select()->toArray();
        $noticeReadData=array_column($noticeReadData,'notice_id');

        return view('',[
            'left_menu'=>43,
            'noticeData'=>$noticeData,
             'noticeReadData'=>$noticeReadData
        ]);


       
    }

    //消息详情
    public function notice_article(){
        $id=input('id');
        $noticeData=Db::name('notice')->find($id);
        $sessionUserData=$this->isLogin();

        //检测id合法性
        $noticeData=Db::name('notice')->find($id);
        if(empty($noticeData)){
            return redirect('notice');
        }

        //标记为已读
        $noticeReadData=Db::name('notice_read')->where('user_id',$sessionUserData['id'])->where('notice_id',$id)->find();
        if(empty($noticeReadData)){
            Db::name('notice_read')->insert([
                'user_id'=>$sessionUserData['id'],
                'notice_id'=>$id
            ]);
        }

        return view('',[
            'noticeData'=>$noticeData,
            'left_menu'=>43,

		]);
    }


    //申请发票
    //两个延伸功能：1、公司信息保存成数据表  2、把电子发票发送邮箱，pdf上传，直接下载pdf
    public function fapiao(){
        $sessionUserData=$this->isLogin();

        //订单数据 1、当前用户 2、已支付 3、没有开过发票

        $orderData=Db::name('order')->where('user_id',$sessionUserData['id'])->where('status',1)->where('isfapiao',0)->paginate(10);
        return view('',[
            'left_menu'=>44,
            'orderData'=>$orderData
		]);
    }

    //发票表单
    public function fapiao_form(){
        $sessionUserData=$this->isLogin();

        $id=input('id');
        $orderData=Db::name('order')->field('total_price,out_trade_no')->find($id);
        if(empty($orderData)){
            return redirect('fapiao');
        }

        if(request()->isPost()){
            $data=input('post.');
            $data['time']=time();
            $data['money']=$orderData['total_price'];
            $data['out_trade_no']=$orderData['out_trade_no'];
            $data['user_id']=$sessionUserData['id'];

            //验证字段合法性
            //validate验证
            try {
                validate(UserValidate::class)
                ->scene('fapiao')
                ->check(['email'=>$data['email']]);
            } catch (ValidateException $e) {
                // 验证失败 输出错误信息
                return alert($e->getError(),'fapiao_form',5);
            }


            $res=Db::name('fapiao')->insert($data);
            if($res){
                return alert('操作成功','is_fapiao',6);
            }else{
                return alert('操作失败','fapiao',5);
            }
        }

        return view('',[
            'left_menu'=>44,
            'orderData'=>$orderData
		]);
    }

    //已开发票
    public function is_fapiao(){
        $sessionUserData=$this->isLogin();
        $fapiaoData=Db::name('fapiao')->where('user_id',$sessionUserData['id'])->paginate(10);
        return view('',[
            'left_menu'=>44,
            'fapiaoData'=>$fapiaoData
		]);
    }


    //积分商城
    public function score_shop(){
        $sessionUserData=$this->isLogin();
        $scoreGoodsData=Db::name('score_goods')->paginate(10);
        return view('',[
            'scoreGoodsData'=>$scoreGoodsData,
            'left_menu'=>32
        ]); 
    }

    //积分商品详情
    public function score_goods_detail(){
        $sessionUserData=$this->isLogin();
        $id=input('id');
       
        $scoreGoodsData=Db::name('score_goods')->find($id);
        if(empty($scoreGoodsData)){
            return alert('没有改商品','score_shop',5);
        }


        $total_socre=Db::name('score')->where('user_id',$sessionUserData['id'])->sum('score');
        return view('',[
            'scoreGoodsData'=>$scoreGoodsData,
            'total_socre'=>$total_socre,
            'left_menu'=>32
        ]); 
    }

    //积分换购
    public function score_exchange(){
        $sessionUserData=$this->isLogin();
        $id=input('id');
        $scoreGoodsData=Db::name('score_goods')->find($id);
        if(empty($scoreGoodsData)){
            return json(['status'=>-1,'msg'=>'没有该商品']);
        }
        $total_socre=Db::name('score')->where('user_id',$sessionUserData['id'])->sum('score');
        if($total_socre>$scoreGoodsData['score']){
            
            try{
                 //积分换购表
                Db::name('score_record')->insert([
                    'user_id'=>$sessionUserData['id'],
                    'score'=>$scoreGoodsData['score'],
                    'time'=>time(),
                    'goods_id'=>$id
                ]);

                Db::name('score')->insert([
                    'user_id'=>$sessionUserData['id'],
                    'score'=>0-$scoreGoodsData['score'],
                    'time'=>time(),
                    'info'=>'商品换购'
                ]);
            }catch (\Exception $e){
                return json(['status'=>-1,'msg'=>'服务端异常，换购失败']);
            }
           

            return json(['status'=>1,'msg'=>'商品换购成功']);

        }else{
            return json(['status'=>-1,'msg'=>'积分不足']);
        }

    }

    //我的积分
    public function myscore(){
        $sessionUserData=$this->isLogin();

        //总积分
        $total_socre=Db::name('score')->where('user_id',$sessionUserData['id'])->sum('score');
        
        $scoreData=Db::name('score')->order('id desc')->where('user_id',$sessionUserData['id'])->paginate(10);
        return view('',[
            'left_menu'=>32,
            'scoreData'=>$scoreData,
            'total_socre'=>$total_socre
        ]); 
    }
   

    public function myscore_record(){
        $sessionUserData=$this->isLogin();

        $scoreGoodsRecordData=Db::name('score_record')->alias('a')->field('a.*,b.thumb')->join('score_goods b','a.goods_id=b.id')->where('a.user_id',$sessionUserData['id'])->order('a.id desc')->paginate(10);
       
        //总积分
        $total_socre=Db::name('score')->where('user_id',$sessionUserData['id'])->sum('score');
        
        return view('',[
            'left_menu'=>32,
            'total_socre'=>$total_socre,
            'scoreGoodsRecordData'=>$scoreGoodsRecordData
        ]); 
    }


    //商品浏览足迹
    public function mytrace(){
        $sessionUserData=$this->isLogin();

        $mytraceData=Db::name('user_trace')->alias('a')->join('goods b','a.goods_id=b.goods_id')->where('a.user_id',$sessionUserData['id'])->order('a.time desc')->paginate(10);

        return view('',[
            'left_menu'=>26,
            'mytraceData'=>$mytraceData
        ]); 
    }

    //删除商品足迹
    public function delete_mytrace(){
        $sessionUserData=$this->isLogin();

        $id=input('id');

        //检测是否有该记录
        $traceData=Db::name('user_trace')->find($id);
        if(!empty($traceData)){
            Db::name('user_trace')->delete($id);
        }

        return redirect('mytrace');
    }

    //加入收藏
    public function add_goods_collect(){

        $sessionUserData=session('sessionUserData');

        //如果没有登录，则返回登录
        if(empty($sessionUserData)){
            return json(['status'=>0]);
        }

        $goods_id=input('post.goods_id');
        $goodsData=Db::name('goods')->find($goods_id);
        if(empty($goodsData)){
            return json(['status'=>-1]);
        }

        //当前收藏状态
        $collectData=Db::name('collect')->where('goods_id',$goods_id)->where('user_id',$sessionUserData['id'])->find();
        if($collectData){
            //取消收藏
            $res=Db::name('collect')->where('goods_id',$goods_id)->where('user_id',$sessionUserData['id'])->delete();
            if($res){
                return json(['status'=>2]);
            }else{
                return json(['status'=>-1]);
            }
        }else{
            //加入收藏
            $res=Db::name('collect')->insert([
                'user_id'=>$sessionUserData['id'],
                'goods_id'=>$goods_id,
                'time'=>time(),
            ]);
            if($res){
                return json(['status'=>1]);
            }else{
                return json(['status'=>-1]);
            }
        }

        
    }


    //我的收藏列表

    public function collect()

    {

        $sessionUserData = $this->isLogin();

        $collectData = Db::name("collect")->alias("a")

            ->join("goods b", "a.goods_id=b.goods_id")

            ->where("a.user_id",$sessionUserData['id'])

            ->field("a.*,b.goods_name,b.goods_thumb,goods_price,market_price")->order('time desc')

            ->paginate(10);

         return view('',[

            'collectData'=>$collectData,
            'left_menu'=>21

            ]);

    }



     //删除收藏

    public function delete_goods_collect()

    {

        $sessionUserData = $this->isLogin();

        $user_id=$sessionUserData['id'];

        $goods_id = input("request.goods_id", 'intval');

        $collectData=Db::name("collect")->where('user_id',$user_id)->where("goods_id",$goods_id)->find();
        if($collectData){
           Db::name("collect")->where('user_id',$user_id)->where("goods_id",$goods_id)->delete();
        }

        return redirect('collect');

    }


     //优惠券
     public function coupons(){
        $sessionUserData = $this->isLogin();
        $time=time();

        //未使用，时间没有过期
        $couponsData0=Db::name('coupons_user')->alias('a')->field('b.*,a.status')->join('coupons b','a.coupons_id=b.id')->where('a.status',0)->where('a.user_id',$sessionUserData['id'])->order('id desc')->where('b.time2','>',$time)->select();

        //已经使用
        $couponsData1=Db::name('coupons_user')->alias('a')->field('b.*,a.status')->join('coupons b','a.coupons_id=b.id')->where('a.status',1)->where('a.user_id',$sessionUserData['id'])->order('id desc')->select();

        //时间过期的：包括已使用和未使用
        $couponsData2=Db::name('coupons_user')->alias('a')->field('b.*,a.status')->join('coupons b','a.coupons_id=b.id')->where('a.user_id',$sessionUserData['id'])->where('b.time2','<',$time)->order('id desc')->select();
        
        return view('',[
            'left_menu'=>24,
            'couponsData0'=>$couponsData0,
            'couponsData2'=>$couponsData2,
            'couponsData1'=>$couponsData1,
            ]);
    }

    //领取优惠券
    public function add_coupons(){

        $sessionUserData=session('sessionUserData');

        //如果没有登录，则返回登录
        if(empty($sessionUserData)){
            return json(['status'=>0]);
        }

        //判断是否有该优惠券
        $coupons_id=input('post.id');
        $couponsData=Db::name('coupons')->find($coupons_id);
        if(empty($couponsData) || $couponsData['status']!=1){
            return json(['status'=>-1]);
        }

        //查找是否领取优惠券
        $couponsUserrData=Db::name('coupons_user')->where('user_id',$sessionUserData['id'])->where('coupons_id',$coupons_id)->find();
        
        if($couponsUserrData){
            //已经领取了
            return json(['status'=>1]);
        }else{
            //领取优惠券
            $res=Db::name('coupons_user')->insert([
                'user_id'=>$sessionUserData['id'],
                'coupons_id'=>$coupons_id,
            ]);
            if($res){
                if($couponsData['count']==1){
                    Db::name('coupons')->where('id',$coupons_id)->update([
                        'count'=>0,
                        'status'=>0
                    ]);
                }else{
                    Db::name('coupons')->where('id',$coupons_id)->update([
                        'count'=>$couponsData['count']-1,
                    ]);
                }

                return json(['status'=>3]);
            }
        }

    }


    //地址列表
    public function address_list()

    {

        $sessionUserData = $this->isLogin();

        $addressData = Db::name("address")->where('user_id',$sessionUserData['id'])->paginate(10);
        return view('',[

            'addressData'=>$addressData,
            'left_menu'=>22

            ]);
        

    }

    //添加地址
    public function add_address_save(){
        $sessionUserData = $this->isLogin();
        
        $data=input('post.');
        $data['user_id']=$sessionUserData['id'];
       
        //validate自行验证字段合法性

        //第一次添加，当前地址就是默认
        //第n次添加，非默认
        $count=Db::name('address')->where('user_id',$sessionUserData['id'])->count();
        if($count==0){
            $data['isdefault']=1;//默认地址
        }
        $res=Db::name('address')->insert($data);
        if($res){
            return alert('操作成功！','address_list',6);
        }else{
            return alert('操作失败！','address_list',5);
        }

    }

    //设置默认地址
    public function address_set_default(){
        $sessionUserData = $this->isLogin();

        //接收id
        $id=input('id');

        $addressData=Db::name('address')->find($id);
        if($addressData['isdefault']==1 || empty($addressData)){
            return redirect('address_list');
        }

        Db::name('address')->where('user_id',$sessionUserData['id'])->update(['isdefault'=>0]);
        Db::name('address')->where('id',$id)->update(['isdefault'=>1]);
        return redirect('address_list');

    }

    //我的分佣
    public function fenyong(){
        $sessionUserData = $this->isLogin();
        $code='http://www.tp6.com/index/user/register?code='.$sessionUserData['code'];

        return view('',[
            'code'=>$code,
            'left_menu'=>25,

		]);
    }



    //我的订单
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
        
        $orderData=Db::view('order', 'id,total_price,status,time,out_trade_no,pay_method,iscomment')
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
        foreach($orderGoodsData as $k=>$v){
            $post_money=$v['post_money']+$post_money;
            $goods_price=$goods_price+$v['goods_price']*$v['amount'];
        }


        //收货信息
        $addressData=Db::name('address')->find($orderData['address_id']);


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




