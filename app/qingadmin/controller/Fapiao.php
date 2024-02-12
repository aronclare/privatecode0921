<?php

namespace app\qingadmin\controller;

use think\facade\Db;
use think\facade\Request;



class Fapiao extends  Base

{
    //数据表字段code是纳税人识别号、社会统一信用代码。18位

    //发票

    public function index()

    {

      $fapiaoData=Db::name('fapiao')->order('id desc')->paginate(15);

      return view('',[

         'fapiaoData'=>$fapiaoData,

        ]);



    }



   



    /*修改*/

    public function edit(){

       //先取出填充的数据

       $id=Request::instance()->param('id');

       $fapiaoData=Db::name('fapiao')->find($id);       

       

       return view('',[

         'fapiaoData'=>$fapiaoData,



        ]);



    }




    //更新发票状态
    public function status(){

      $id=input('id');

      $res=Db::name('fapiao')->where('id',$id)->update([
         'status'=>1
      ]);
      
      //当前的发票信息
      $fapiaoData=Db::name('fapiao')->find($id);

      //修改订单发票状态，改成已经开具
      Db::name('order')->where('out_trade_no',$fapiaoData['out_trade_no'])->update([
        'isfapiao'=>1
      ]);

      return redirect('index');
    }

    

    

}

