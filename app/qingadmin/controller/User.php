<?php

namespace app\qingadmin\controller;

use think\facade\Db;
use think\facade\Request;

class User extends  Base

{


    /**

     * 正常的用户列表

     * 手机号搜索

     */

    public function index() {



        //获取有没有搜索关键字，用于填充

        $search_key=input('request.search_key');



        $userData=Db::name('user')->alias('a')->where('a.mobile','like','%'.$search_key.'%')->order('id desc')->paginate(10);



        return view('', [

            'userData' => $userData,

            'search_key'=>$search_key

        ]);

    }

    //编辑会员信息
    public function edit() {



        //获取有没有搜索关键字，用于填充

        $id =input('request.id');



        $userData=Db::name('user')->find($id);


     //   var_dump($userData);die;

        $userData['table_name'] = '用户表';





        return view('', [

            'userData' => $userData,

        ]);

    }

    //删除会员
    public function delete(){
        $id =input('request.id');

        $userData=Db::name('user')->where('id','=',$id)->delete();

        $search_key=input('request.search_key');

        $userData=Db::name('user')->alias('a')->where('a.mobile','like','%'.$search_key.'%')->order('id desc')->paginate(10);

        return view('index', [

            'userData' => $userData,

            'search_key'=>$search_key

        ]);
    }









}

