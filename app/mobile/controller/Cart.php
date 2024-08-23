<?php

namespace app\mobile\controller;

use think\Controller;

use think\facade\Db;

use think\facade\Request;

use think\facade\Session;

class Cart extends Base

{

    //购物车商品列表（不分页）
    public function index()
    {
        //传user_id   获得购物车所有商品
        //    $userSessionData = $this->isLogin();
        $cartData = [];

        $userSessionData['id'] = 47;
        $cartDataTmp = Db::name('cart')->where('user_id', $userSessionData['id'])->order('id desc')->select()->toArray();

        //  var_dump($cartDataTmp);die;
        foreach ($cartDataTmp as $k => $v) {
            $cartData[$k]['id'] = $v['id'];
            $cartData[$k]['is_checked'] = $v['status'];
            $cartData[$k]['goods_id'] = $v['goods_id'];
            $cartData[$k]['amount'] = $v['amount'];
            $cartData[$k]['sku'] = $this->getAttrBySku($v['sku']);
            $goodsData = Db::name('goods')->find($v['goods_id']);
            $cartData[$k]['cover_url'] = $goodsData['goods_thumb'];
            $cartData[$k]['title'] = $goodsData['goods_name'];
            $cartData[$k]['stock'] = $goodsData['stock'];
            $cartData[$k]['description'] = $goodsData['description'];
            $cartData[$k]['num'] = $v['num'];

            $cartData[$k]['user_id'] = 47;
            $userSessionData['id'];


            if ($goodsData['single_standard'] == 1) {
                $cartData[$k]['price'] = $goodsData['goods_price'];
            } else {
                $cartData[$k]['price'] = Db::name('goods_standard')->where('goods_id', $v['goods_id'])->where('sku', $v['sku'])->value('goods_price');
            }
        }

        // 获取当前域名
        $domain = Request::domain();


        $newGoods = [];
        foreach ($cartData as $slide) {

            $slide['cover_url'] = $domain . $slide['cover_url'];
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
            $newGoods[] = $goods;

        }

        $total_price = 0;


        return json(['data' => $newGoods]);

        /*   return view('',[
               'total_price'=>$total_price,
               'cartData'=>$cartData
           ]);*/

    }

    //添加购物车
    public function add_to_cart()
    {
        $userSessionData = session('sessionUserData');
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
        $cartData = Db::name('cart')
            ->field('amount,id,num')
            ->where('user_id', $user_id)
            ->where('goods_id', $data['goods_id']);

        if (!empty($data['sku'])) {
            $cartData = $cartData->where('sku', $data['sku']);
        }
        $cartData = $cartData->find();


        // var_dump($cartData);die;
        //获取goods_id商品详细数据
        $goods = Db::name('goods')->field('goods_price,goods_name')->where('goods_id', $data['goods_id'])->find();

        if (!empty($cartData)) {
            //  $amount = $goods['amount']+$cartData['amount'];  // 总金额
            $res = Db::name('cart')->where('id', $cartData['id'])->update([
                // 'amount'=>$amount,
                'num' => $cartData['num'] + 1,
                'updated_at' => time()
            ]);
            if ($res) {
                return json(['status' => 200, 'message' => '添加购物车成功!']);
            } else {
                return json(['status' => 0, 'message' => '添加购物车失败!']);
            }
        } else {



            $res = Db::name('cart')->insert([
                'goods_id' => $data['goods_id'],
                'user_id' => $user_id,
                //   'sku'=>$data['sku'],
              //  'amount' =>1,
                'num' => 1,
                'created_at' => time()
            ]);

            if ($res) {
                return json(['status' => 200, 'message' => '添加购物车成功!']);
            } else {
                return json(['status' => 0, 'message' => '添加购物车失败!']);
            }
        }
    }

    //更改购物车清单状态，1：选中，0：未选中
    public function update_cart_status()
    {
        // $userSessionData = $this->isLogin();
        $userId = 47;

        $selectedCartIds = Request::post('cart_ids'); // 期望接收一个包含选中商品的购物车ID列表

        if (!is_array($selectedCartIds)) {
            return json(['status' => 'error', 'message' => '参数不是一个数组'], 400);
        }

        Db::startTrans(); // 开启事务处理
        try {
            // 将该用户的所有购物车商品标记为未选中
            Db::name('cart')
                ->where('user_id', $userId)
                ->update(['status' => 0]);

            // 将选中的商品标记为选中
            if (!empty($selectedCartIds)) {
                Db::name('cart')
                    ->where('user_id', $userId)
                    ->whereIn('id', $selectedCartIds)
                    ->update(['status' => 1]);
            }

            Db::commit(); // 提交事务
            return json(['status' => 'success', 'message' => '购物车商品选中成功！']);
        } catch (\Exception $e) {
            Db::rollback(); // 回滚事务
            return json(['status' => 'error', 'message' => '购物车商品选中失败！', 'error' => $e->getMessage()], 500);
        }

    }

    //购物车数量增减
    public function cart_num()
    {
      //  $userSessionData = $this->isLogin();
        //传入购物车列表id    商品金额
          $url = Request::url();
        if (preg_match('/\/cart_num\/(\d+)$/', $url, $matches)) {
            $cart_id = $matches[1];
        }

      /* $cartdata = Request::post();
       $cart_id = $cartdata['cart_id'];*/
      // var_dump($cart_id);die;



        $num = Request::put('num');

        $user_id = 47;
        $id = input('request.id');
        //更新数量
      //  $num = intval(input('request.num'));
        $res = Db::name("cart")->where('user_id',$user_id)->where('id', $cart_id)->update(['num' => $num]);
        if ($res) {
            return json(['status' => 'success', 'message' => '操作成功!']);
        } else {
            return json(['status' => 'error', 'message' => '操作失败!']);
        }

    }

    //购物车删除一条记录
    public function delete_to_cart()
    {

        //$userSessionData = $this->isLogin();
        //  $id = input('request.id',0);
        $url = Request::url();
        if (preg_match('/\/delete_to_cart\/(\d+)$/', $url, $matches)) {
            $goods_id = $matches[1];
        }

        $user_id = 47;
        $id = $goods_id;


        if ($id == 0) {
            return json(['status' => 0, 'message' => '非法数据!']);
        }

        $res = Db::name("cart")->where("id={$id} and user_id={$user_id}")->delete();

        if ($res) {
            return json(['status' => 200, 'message' => '操作成功!']);

        } else {
            return json(['status' => 200, 'message' => '操作失败!']);
        }

    }

    //清空购物车
    public function delete_all_cart()
    {

        $userSessionData = $this->isLogin();
        $id = input('request.id', 0);
        if ($id == 0) {
            return json(['status' => 0, 'message' => '非法数据!']);
        }
        $res = Db::name("cart")->where("user_id={$userSessionData['id']}")->delete();
        if ($res) {
            return json(['status' => 1, 'message' => '操作成功!']);
        } else {
            return json(['status' => 0, 'message' => '操作失败!']);
        }
    }

    //购物车全选，全不选，设置购物车清单选中状态

    public function update_allcart_status()
    {

        $userSessionData = $this->isLogin();

        $status = intval(input('request.status'));

        $res = Db::name("cart")->where("user_id={$userSessionData['id']}")->update(['status' => $status]);


        if ($res) {
            return json(['status' => 1, 'message' => '操作成功!']);
        } else {
            return json(['status' => 0, 'message' => '操作失败!']);
        }

    }

}

