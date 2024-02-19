<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2024/2/11
 * Time: 15:10
 */

namespace app\qingadmin\controller;


use think\facade\Db;

class Merchant  extends  Base
{



    //merchant list
    public function index(){


        //获取有没有搜索关键字，用于填充

        $search_key=input('request.search_key');

        $mer_Data=Db::name('merchant')->alias('a')->where('a.store_name','like','%'.$search_key.'%')->order('id desc')->paginate(10);


        return view('', [

            'mer_Data' => $mer_Data,

            'search_key'=>$search_key

        ]);

    }

    public function add(){


        return view();
    }




    public function edit(){

        $id=input('request.id');

        $mer_data=Db::name('merchant')->find($id);

        return view('', [

            'mer_data' => $mer_data

        ]);
    }
    public function save_edit(){

        if(request()->isPost()){

            $data=request()->post();

            $data['time'] = time();

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

                $res=Db::name('merchant')->update($data);

                if($res){
                    return alert('操作成功','index',6);
                }else{
                    return alert('操作失败','index',5);
                }
            }

        }
    }


    public function delete(){
        $id =input('request.id');

        Db::name('merchant')->where('id','=',$id)->delete();

        $search_key=input('request.search_key');

        $mer_Data=Db::name('merchant')->alias('a')->where('a.store_name','like','%'.$search_key.'%')->order('id desc')->paginate(10);

        return view('index', [

            'userData' => $mer_Data,

            'search_key'=>$search_key

        ]);

    }

    //car list

    public function car_index(){

        //获取有没有搜索关键字，用于填充

        $search_key=input('request.search_key');

        $car_Data=Db::name('merchant')->alias('a')->where('a.car_number','like','%'.$search_key.'%')->order('id desc')->paginate(10);


        return view('', [

            'car_Data' => $car_Data,

            'search_key'=>$search_key

        ]);

    }

    public function car_add(){


        return view();
    }


    public function car_edit(){
        $id=input('request.id');

        $car_Data=Db::name('merchant')->find($id);

        return view('', [

            'car_Data' => $car_Data

        ]);

    }


    public function car_update(){

        if(request()->isPost()){

            $data=request()->post();

            $data['time'] = time();

            if (!empty($_FILES['car_pic']['name'])){
                // 上传图片
                $store_pic = $this->request->file('car_pic');
                $upload = new Uploader();
                $store_pic_path = $upload->uploadimg($store_pic);

                $path1 = json_decode($store_pic_path,true);

                //获取图片路径
                $data['car_pic'] = $path1['path'];
            }else{

                $res=Db::name('merchant')->update($data);

                if($res){
                    return alert('操作成功','index',6);
                }else{
                    return alert('操作失败','index',5);
                }

            }

        }
    }


    public function car_delete(){



        $id =input('request.id');
      Db::name('merchant')->where('id','=',$id)->delete();

        $search_key=input('request.search_key');

        $car_Data=Db::name('merchant')->alias('a')->where('a.mobile','like','%'.$search_key.'%')->order('id desc')->paginate(10);

        return view('', [

            'car_Data' => $car_Data,

            'search_key'=>$search_key

        ]);


    }


}