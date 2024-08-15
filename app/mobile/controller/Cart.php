<?php

namespace app\mobile\controller;

use think\Controller;

use think\facade\Db;

use think\facade\Request;

use think\facade\Session;





class Cart extends  Base

{

    //购物车商品列表（不分页）

    public function index(){
        //传user_id   获得购物车所有商品
        $userSessionData = $this->isLogin();
        $cartData=[];
        $cartDataTmp=Db::name('cart')->where('user_id',$userSessionData['id'])->order('id desc')->select()->toArray();

      //  var_dump($cartDataTmp);die;
        foreach($cartDataTmp as $k=>$v){
            $cartData[$k]['id']=$v['id'];
            $cartData[$k]['status']=$v['status'];
            $cartData[$k]['goods_id']=$v['goods_id'];
            $cartData[$k]['amount']=$v['amount'];
            $cartData[$k]['sku']=$this->getAttrBySku($v['sku']);
            $goodsData=Db::name('goods')->find($v['goods_id']);
            $cartData[$k]['goods_thumb']=$goodsData['goods_thumb'];
            $cartData[$k]['goods_name']=$goodsData['goods_name'];
            $cartData[$k]['num']=$v['num'];
            if($goodsData['single_standard']==1){
                $cartData[$k]['goods_price']=$goodsData['goods_price'];
            }else{
                $cartData[$k]['goods_price']=Db::name('goods_standard')->where('goods_id',$v['goods_id'])->where('sku',$v['sku'])->value('goods_price');
            }
        }

        $total_price=0;
        return json(['total_price' => $total_price, 'cartData' =>$cartData]);

        /*   return view('',[
               'total_price'=>$total_price,
               'cartData'=>$cartData
           ]);*/

    }


    //添加购物车

    public function add_to_cart(){

        $userSessionData =session('sessionUserData');
        if(empty($userSessionData)){
            return json(['status'=>0,'message'=>'请登录后再操作！']);
        }
        $data=input('post.');
        //先查找数据表有没有相同记录，有就更新数量，没有再插入记录    //sku为商品型号，大小，尺寸
        $cartData=Db::name('cart')->field('amount,id,num')->where('user_id',$userSessionData['id'])->where('goods_id',$data['goods_id'])->where('sku',$data['sku'])->find();


        if($cartData){

            $amount=$data['amount']+$cartData['amount'];  // 总金额
            $num  = 1;  //数量

            $res=Db::name('cart')->where('id',$cartData['id'])->update([
                'amount'=>$amount,
                'num'=>$cartData['num']+$num,
                'updated_at'=>time()
            ]);
            if($res){
                return json(['status'=>1,'message'=>'添加购物车成功!']);
            }else{
                return json(['status'=>0,'message'=>'添加购物车失败!']);
            }
        }else{
           $res= Db::name('cart')->insert([
                'goods_id'=>$data['goods_id'],
                'user_id'=>$userSessionData['id'],
                'sku'=>$data['sku'],
                'amount'=>$data['amount'],
                'num'=>1,
                'created_at'=>time()
            ]);
            
            if($res){
                return json(['status'=>1,'message'=>'添加购物车成功!']);
            }else{
                return json(['status'=>0,'message'=>'添加购物车失败!']);
            }
        }
    }

    //更改购物车清单状态，1：选中，0：未选中
    public function update_cart_status(){
        $userSessionData = $this->isLogin();

        $id = input('request.id');
        $status = intval(input('request.status'));
      $res =  Db::name("cart")->where('id',$id)->update(['status'=>$status]);

      if ($res==1){
          return json(['status'=>1,'message'=>'操作成功!']);
      }else{
          return json(['status'=>0,'message'=>'操作失败!']);
      }
    }

     //购物车删除一条记录
     public function delete_to_cart(){

        $userSessionData = $this->isLogin();

        $id = input('request.id',0);

        if($id == 0){
            return json(['status'=>0,'message'=>'非法数据!']);
        }

        $res = Db::name("cart")->where("id={$id} and user_id={$userSessionData['id']}")->delete();

        if($res){
            return json(['status'=>1,'message'=>'操作成功!']);

        }else{
            return json(['status'=>0,'message'=>'操作失败!']);
        }

    }
    //清空购物车

    public function delete_all_cart(){

        $userSessionData = $this->isLogin();
        $id = input('request.id',0);
        if($id == 0){
            return json(['status'=>0,'message'=>'非法数据!']);
        }
        $res = Db::name("cart")->where("user_id={$userSessionData['id']}")->delete();
        if($res){
            return json(['status'=>1,'message'=>'操作成功!']);
        }else{
            return json(['status'=>0,'message'=>'操作失败!']);
        }
    }

    //购物车全选，全不选，设置购物车清单选中状态

    public function update_allcart_status(){

        $userSessionData = $this->isLogin();

        $status = intval(input('request.status'));

        $res=  Db::name("cart")->where("user_id={$userSessionData['id']}")->update(['status'=>$status]);


        if($res){
            return json(['status'=>1,'message'=>'操作成功!']);
        }else{
            return json(['status'=>0,'message'=>'操作失败!']);
        }

    }

    //购物车数量增减

    public function update_cart_amount(){

        $userSessionData = $this->isLogin();
        //传入购物车列表id    商品金额
        $id = input('request.id');
            //更新金额
        $amount = intval(input('request.amount'));
            //更新数量
        $num = intval(input('request.num'));
        $res  =   Db::name("cart")->where('id',$id)->update(['amount'=>$amount,'num'=>$num]);
        if($res){
            return json(['status'=>1,'message'=>'操作成功!']);
        }else{
            return json(['status'=>0,'message'=>'操作失败!']);
        }

    }

}

