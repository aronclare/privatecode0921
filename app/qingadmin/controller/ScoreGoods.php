<?php

namespace app\qingadmin\controller;

use think\facade\Request;
use think\facade\Db;


class ScoreGoods extends  Base

{


    //列表

    public function index()

    {

        $searchkey=input('searchkey');
        $where=[];

        if(input('searchkey')){
   
           $where[] = [
   
                        ['title', 'like', '%'.$searchkey.'%'],
   
                    ];
   
        }

     $scoreGoodsData=Db::name('score_goods')->where($where)->order('listorder asc')->order('id desc')->paginate(10);

      return view('',[

         'scoreGoodsData'=>$scoreGoodsData,
         'searchkey'=>$searchkey

        ]);



    }



    /*添加*/

    public function add(){



        if(request()->isPost()){

           $data=request()->post();

           $data['time']=time();

           $res=Db::name('score_goods')->insert($data);



           if($res){

                return alert('操作成功！','index',6,3);

            }else{

                return alert('操作失败！','index',5,3);

            }

        }



        $scoreGoodsData=Array(

            'id' =>'0',

            'thumb' =>''

        );



       return view('',[

         'scoreGoodsData'=>$scoreGoodsData,

        ]);

    }





    /*修改文章*/

    public function edit()

    {

        $id=$id=input('id');



        $scoreGoodsData=Db::name('score_goods')->find($id);



        if(request()->isPost()){



            $data=input('post.');

            


            $res=Db::name('score_goods')->update($data);



            if($res){

                return alert('操作成功！','index',6,3);

            }else{

                return alert('操作失败！','index',5,3);

            }


        }



        return view('',[
            'scoreGoodsData'=>$scoreGoodsData
        ]);

    }





    public function update(){

      //处理post过来的数据

       if(request()->isPost()){

         $data=request()->post();

         //分类缩略图

         if(!empty($data['thumb'])){



            foreach ($data['thumb'] as $k => $v) {



                if($k==0){



                       $data['thumb']=$v;//选第一张作为封面图

                   }


               }



          }

         $data['time']=time();

         $res=Db::name('article')->update($data);

         if($res){

            return alert('操作成功！','index',6,3);

        }else{

            return alert('操作失败！','index',5,3);

        }

       }

    }

    

    //文章删除操作，删除文章的同时删除文章缩略图、删除该文章附加表信息

    public function delect(){

      $id=input('id');



      $archives=Db::name('archives')->field('thumb,model_id')->find($id);

      if($archives['thumb']){

          $litpicSrc='/'.$archives['thumb'];

          if(file_exists($litpicSrc)){

              @unlink($litpicSrc);

          }

      }

      

      $models=Db::name('model')->field('table_name')->find($archives['model_id']);

      $table=$models['table_name'];//附加表名称

      $res=Db::name($table)->where(array('aid'=>$id))->delete();//删除该文章的附加表信息

      $res=Db::name('archives')->delete($id);//删除主表信息

      if($res){

            $this->success('删除成功');

         }else{

            $this->error('删除失败');

         } 

    }



}

