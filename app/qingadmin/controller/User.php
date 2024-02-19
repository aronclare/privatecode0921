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

    public  function  user_update(){

        if(request()->isPost()){

            $data=request()->post();

            $data['time'] = time();

            if (!empty($_FILES['id_front_pic']['name']) || !empty($_FILES['id_back_pic']['name'])|| !empty($_FILES['self_pic']['name'])){
                // 上传图片
                $store_pic = $this->request->file('id_front_pic');
                $payment_code_pic = $this->request->file('id_back_pic');
                $self_pic = $this->request->file('self_pic');


                $upload = new \app\common\lib\Uploader();
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

                $res=Db::name('user')->update($data);

                if($res){
                    return alert('操作成功','index',6);
                }else{
                    return alert('操作失败','edit',5);
                }

            }

        }


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

