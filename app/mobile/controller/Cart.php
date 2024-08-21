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
    //    $userSessionData = $this->isLogin();
        $cartData=[];

        $userSessionData['id'] =47;
        $cartDataTmp=Db::name('cart')->where('user_id',$userSessionData['id'])->order('id desc')->select()->toArray();

      //  var_dump($cartDataTmp);die;
        foreach($cartDataTmp as $k=>$v){
            $cartData[$k]['id']=$v['id'];
            $cartData[$k]['is_checked']=$v['status'];
            $cartData[$k]['goods_id']=$v['goods_id'];
            $cartData[$k]['amount']=$v['amount'];
            $cartData[$k]['sku']=$this->getAttrBySku($v['sku']);
            $goodsData=Db::name('goods')->find($v['goods_id']);
            $cartData[$k]['cover_url']=$goodsData['goods_thumb'];
            $cartData[$k]['title']=$goodsData['goods_name'];
            $cartData[$k]['stock']=$goodsData['stock'];
            $cartData[$k]['description']=$goodsData['description'];
            $cartData[$k]['num']=$v['num'];

            $cartData[$k]['user_id']= 47;$userSessionData['id'];


            if($goodsData['single_standard']==1){
                $cartData[$k]['price']=$goodsData['goods_price'];
            }else{
                $cartData[$k]['price']=Db::name('goods_standard')->where('goods_id',$v['goods_id'])->where('sku',$v['sku'])->value('goods_price');
            }
        }

        // 获取当前域名
        $domain = Request::domain();
        foreach ($cartData as $slide){
            $slide['cover_url'] = $domain.$slide['cover_url'];

            $goods['id'] = $slide['id'];
            $goods['is_checked'] = $slide['is_checked'];
            $goods['user_id'] = $slide['user_id'];
            $goods['num'] = $slide['num'];
            $goods['goods_id'] = $slide['goods_id'];

            $goods['goods']['goods_id'] = $slide['goods_id'];
            $goods['goods']['amount'] = $slide['amount'];
            $goods['goods']['price'] = $slide['price'];

            $goods['goods']['sku'] = $slide['sku'];
            $goods['goods']['cover_url'] = $slide['cover_url'];
            $goods['goods']['title'] = $slide['title'];
            $goods['goods']['stock'] = $slide['stock'];
            $goods['goods']['description'] = $slide['description'];

            $newGoods[]= $goods;

        }

        $total_price=0;


        return json(['data'=>$newGoods]);

        /*   return view('',[
               'total_price'=>$total_price,
               'cartData'=>$cartData
           ]);*/

    }

    //添加购物车
    public function add_to_cart(){
        $userSessionData =session('sessionUserData');
      /*  $url = Request::url();
        if (preg_match('/\/add_to_cart\/(\d+)$/', $url, $matches)) {
            $goods_id = $matches[1];
        }*/
        $user_id = 47;
        //数据中需包含 goods_id  sku  规格
       // $data=input('post.');
        $data = Request::post();
      /* if(empty($userSessionData)){
            return json(['status'=>0,'message'=>'请登录后再操作！']);
        }*/
        //先查找数据表有没有相同记录，有就更新数量，没有再插入记录    //sku为商品型号，大小，尺寸
       // $cartData=Db::name('cart')->field('amount,id,num')->where('user_id',$user_id)->where('goods_id',$data['goods_id'])->where('sku',$data['sku'])->find();
        $cartData=Db::name('cart')
            ->field('amount,id,num')
            ->where('user_id',$user_id)
            ->where('goods_id',$data['goods_id']);

        if (!empty($data['sku'])){
            $cartData = $cartData->where('sku',$data['sku']);
        }
        $cartData = $cartData->find();
        //获取goods_id商品详细数据
        $goods = Db::name('goods')->field('goods_price,goods_name')->where('goods_id',$data['goods_id'])->find();

        if($cartData){

          //  $amount = $goods['amount']+$cartData['amount'];  // 总金额
            $num  = 1;  //数量

            $res=Db::name('cart')->where('id',$cartData['id'])->update([
               // 'amount'=>$amount,
                'num'=>$cartData['num']+$num,
                'updated_at'=>time()
            ]);
            if($res){
                return json(['status'=>200,'message'=>'添加购物车成功!']);
            }else{
                return json(['status'=>0,'message'=>'添加购物车失败!']);
            }
        }else{

            $res= Db::name('cart')->insert([
                'goods_id'=>$data['goods_id'],
                'user_id'=>$user_id,
             //   'sku'=>$data['sku'],
                'amount'=>$goods['goods_price'],
                'num'=>1,
                'created_at'=>time()
            ]);
            
            if($res){
                return json(['status'=>200,'message'=>'添加购物车成功!']);
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

         //$userSessionData = $this->isLogin();
         //  $id = input('request.id',0);
         $url = Request::url();
         if (preg_match('/\/delete_to_cart\/(\d+)$/', $url, $matches)) {
             $goods_id = $matches[1];
         }

         $user_id = 47;
         $id = $goods_id;



        if($id == 0){
            return json(['status'=>0,'message'=>'非法数据!']);
        }

        $res = Db::name("cart")->where("id={$id} and user_id={$user_id}")->delete();

        if($res){
            return json(['status'=>200,'message'=>'操作成功!']);

        }else{
            return json(['status'=>200,'message'=>'操作失败!']);
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

