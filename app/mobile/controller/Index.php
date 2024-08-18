<?php

namespace app\mobile\controller;

use think\facade\Request;
use think\Controller;
use think\facade\Db;
use app\common\model\Category as CategoryModel;
class Index extends  Base{

    public function index(){

        $bannerData=Db::name('ad')->where('type_id',1)->select();

     //   $goodsData5=Db::name('goods')->where('ishot',1)->limit(8)->order('goods_id desc')->order('listorder asc')->where('goods_status',1)->select();

        // 获取当前域名
        $domain = Request::domain();

        //分类显示
        //商品数据
        $goods = Db::name('goods')->field('goods_id,goods_name,goods_price,
            stock,selnumber,goods_thumb,description,collects_count,cover_url')->select();

        foreach ($goods as $slide){
            $slide['goods_thumb'] = $domain.$slide['goods_thumb'];
            $newGoods[] = $slide;
        }

        //goods数据商品中包含条件查询  goods_price
        //  /*              {name:'默认'},
        //					{name:'销量'},
        //					{name:'推荐'},
        //					{name:'最新'}*/


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