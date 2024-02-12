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