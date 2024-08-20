<?php

namespace app\mobile\controller;

use think\facade\Request;
use think\Controller;
use think\facade\Db;
use app\common\model\Category as CategoryModel;
class Index extends  Base{

    public function index(){

        $bannerData=Db::name('ad')->where('type_id',1)->select();
        //$goodsData5=Db::name('goods')->where('ishot',1)->limit(8)->order('goods_id desc')->order('listorder asc')->where('goods_status',1)->select();

        //分类显示
        //商品数据  按条件 0默认 1销量 2推荐 3最新 显示商品列表
        $name = input('tabs');  //接收条件参数

        if($name==""){

            //默认
            $goodslist = Db::name('goods')
                ->alias('p')
                ->field('goods_id,goods_name,goods_price,stock,selnumber,goods_thumb,description,collects_count,cover_url')
                ->select();
        }
        if ($name ==1){
            //销量排序
            $goodslist = Db::name('goods')
                ->alias('p')
                ->field('goods_id,goods_name,goods_price,stock,selnumber,goods_thumb,description,collects_count,cover_url')
                ->order('selnumber desc')
                ->select();
        }

        if ($name ==2){
            //推荐  is_recommend = 1
            $goodslist = Db::name('goods')
                ->alias('p')
                ->field('goods_id,goods_name,goods_price,stock,selnumber,goods_thumb,description,collects_count,cover_url')
                ->where('is_recommend',1)
                ->select();
        }
        if ($name ==3){
            //最新排序
            $goodslist = Db::name('goods')
                ->field('goods_id,goods_name,goods_price,stock,selnumber,goods_thumb,description,collects_count,cover_url')
                ->where('isnew',1)
                ->order('goods_price desc')->select();
        }
        if($name ==4){
            // 获取按评论数量排序的商品列表
            // $goodsList = Db::table('goods')
            $goodslist = Db::name('goods')
                ->alias('g')
                ->join('comment c', 'g.goods_id = c.goods_id')
                ->field('g.*, COUNT(c.goods_id) as comment_count')
                ->group('g.goods_id')
                ->order('comment_count', 'desc')
                ->select();
        }
      // $goods = Db::name('goods')->field('goods_id,goods_name,goods_price,stock,selnumber,goods_thumb,description,collects_count,cover_url')->select();

        // 获取当前域名
        $domain = Request::domain();

        foreach ($goodslist as $slide){
            $slide['goods_thumb'] = $domain.$slide['goods_thumb'];
            $newGoods[] = $slide;
        }

        //滚动数据
        $slides =  Db::name('ad')->field('id,title,url,thumb,status,seq,created_at,updated_at,img_url')->select();
        foreach ($slides as $slide){
            $slide['thumb'] = $domain.$slide['thumb'];
            $newSlides[] = $slide;
        }

        //链接links
        foreach ($slides as $slide){
            $slide['name'] = $slide['title'];
            $slide['thumb'] = $domain.$slide['thumb'];
            unset($slide['title']);
            $links[] = $slide;
        }

        $data = ['goods'=>['data'=>$newGoods],
                 'slides'=>$newSlides,
                 'links'=>$links ,
                ];
        return json($data);

        $category_model=new CategoryModel();
        $indexCate=$category_model->getNavCateData();



        return view('',[
            'goodsData5'=>$goodsData5,
            'indexCate'=>$indexCate,
            'bannerData'=>$bannerData
        ]);

    }

}