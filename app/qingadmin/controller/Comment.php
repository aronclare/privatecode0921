<?php

namespace app\qingadmin\controller;

use think\facade\Db;
class Comment extends  Base

{

    /**

     * @return 评论管理

     */

    

    //商品评价

    public function index()

    {

      

      //获取有没有搜索关键字，用于填充

      $search_key=input('request.search_key');



      $commentData=Db::name('Comment')->alias('a')->field('a.*,b.mobile,b.username,c.goods_thumb,c.goods_id')

      ->join('user b','a.user_id=b.id')->join('goods c','a.goods_id=c.goods_id')->where('b.mobile','like','%'.$search_key.'%')->order('id desc')->paginate(10);



      return view('',[

         'commentData'=>$commentData,

         'search_key'=>$search_key

        ]);



    }



   

    public function del(){

       $id=input('get.id');

       if($id){

          $res=Db::name('comment')->where('id',$id)->delete();

          if($res){

            return alert('删除成功','index',6,3);

          }else{

            return alert('删除失败','index',5,3);

          }

       }

    }

    

    

}

