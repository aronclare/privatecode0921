<?php

namespace app\qingadmin\controller;

use think\facade\Db;
use think\facade\Request;



class Fenyong extends  Base

{
    

    //分佣
    //用户A(1)推荐用户B注册网站
    //用户A给他50积分
    //用户B给他30积分
    //A parent_id 0
    //B parent_id 1
    //
    public function index()

    {

      $userData=Db::name('user')->field('id,parent_id,username,time')->where('parent_id','<>',0)->paginate(20);

      return view('',[

         'userData'=>$userData,

        ]);



    }

  




}

