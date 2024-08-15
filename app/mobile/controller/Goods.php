<?php

namespace app\mobile\controller;

use app\common\model\Category as CategoryModel;
use think\facade\Request;
use think\Controller;
use think\facade\Db;

class Goods extends  Base{
    public function index(){


        $goods_id=input('goods_id');

        $goodsData=Db::name('goods')->find($goods_id);
        if(empty($goodsData) || $goodsData['goods_status']!=1){
            return json(['status' => 0, 'message' => '没有该商品或者该商品已经下架!']);
        }

        //更新点击量
        $click=$goodsData['click']+1;
        Db::name('goods')->where('goods_id',$goods_id)->update(['click'=>$click]);

        //商品图集
        $goodsImg=Db::name('goods_img')->where('goods_id',$goods_id)->select();

        //商品详情
        //$goodsContent=Db::name('goods_content')->where('goods_id',$goods_id)->find();

        // 使用联合查询（JOIN）获取商品及其详情
        /*$goodsContents = Db::name('goods')
        ->alias('p')
        ->join('goods_content pd', 'p.goods_id = pd.goods_id')->Join('collect c', 'pd.goods_id = c.goods_id')->group('pd.goods_id')
        ->field('p.goods_id, p.goods_name, p.goods_price， COUNT(c.id) as collects_count, p.stock, p.selnumber,p.goods_cate_id, p.goods_thumb, pd.content')
        ->select();*/


        // 查询每个商品及其被收藏的次数
        $goodsContents = Db::name('goods')
            ->alias('p')->join('goods_content gc','gc.goods_id = p.goods_id')
            ->Join('collect c', 'gc.goods_id = c.goods_id')
            ->field('p.goods_id, p.goods_name, p.goods_price,p.is_recommend, COUNT(c.goods_id) as collection_count, gc.content, p.stock, p.selnumber, p.goods_cate_id, p.goods_thumb')
            ->where('p.goods_id',$goods_id)
            ->group('p.goods_id')
            ->find();


        //获取当前域名
        //构造user_id
        //  $userSessionData = $this->isLogin();
        $user_data = session('sessionUserData');
        $goodsContents['user_id'] = $user_data['id'];

        return json([ 'goods_details' => $goodsContents]);
        var_dump($goodsContents);die;

        foreach ($goodsContents as $goodsContent){

            $goodsContent['user_id'] = $user_data['id'];
            $goodsContentdata[]=$goodsContent;
        }


        var_dump($goodsContentdata);die;

        //商品被收藏的次数 collects_count  需传入goods_id  并统计goods_id数量
        //$collects_count = Db::name('collect')->where('goods_id',$goodsContent['goods_id'])->count();


        // 查询每个商品及其被收藏的次数

        $products = Db::name('goods')
            ->alias('p')
            ->leftJoin('collect c', 'p.goods_id = c.goods_id')
            ->field('p.goods_id, p.goods_name, p.goods_price, COUNT(c.goods_id) as collects_count')
            ->group('p.goods_id')
            ->select();


        var_dump($products);die;
        //   var_dump($goodsContentdata);die;

        $domain = Request::domain();
        /* foreach ($goodsContents as $goodsContent){

             $goodsContent['user_id'] = $user_id;
             $goodsContent['goods_thumb'] = $domain.$goodsContent['goods_thumb'];
             $newSlides[] = $goodsContent;
         }*/
        //   var_dump($newSlides);die;

        //当前位置
        $positionData=$this->getPositionByCatId($goodsData['goods_cate_id']);
        //商品SKU的获取
        $goodsStandarData=Db::name('goods_standard')->field('sku')->where('goods_id',$goods_id)->select()->toArray();
        $standardList=[];
        $skuDefaultStr='';



        if($goodsStandarData){
            $skuDefaultStr=$this->getAttrBySku($goodsStandarData[0]['sku']);

            $skuStr='';
            foreach($goodsStandarData as $k=>$v){
                $skuStr=$skuStr.','.$v['sku'];
            }
            $skuArr=explode(',',$skuStr);
            $skuArr=array_unique($skuArr);
            $skuArr=array_filter($skuArr);
            foreach($skuArr as $k=>$v){
                $standardTmp[]=Db::name('standard_value')->field('a.standard_id,a.standard_value,a.id,b.name')->alias('a')->join('standard b','a.standard_id=b.id')->where('a.id',$v)->find($v);
            }
            $standtmp1=second_array_unique_bykey($standardTmp,'standard_id');
            foreach($standtmp1 as $k=>$v){
                foreach($standardTmp as $k1=>$v1){
                    if($v['standard_id']==$v1['standard_id']){
                        $standardList[$k]['name']=$v1['name'];
                        $standardList[$k]['standard'][]=$v1;
                    }
                }
            }

            //halt($standardList);
        }

        //判断收藏状态
        $sessionUserData=session('sessionUserData');
        $collectData=Db::name('collect')->where('goods_id',$goods_id)->where('user_id',$sessionUserData['id'])->find();
        if(!empty($collectData)){
            $iscollect=1;
        }else{
            $iscollect=0;
        }

        //插入浏览记录,只保留3条浏览记录
        try{
            $sessionUserData=session('sessionUserData');

            if($sessionUserData){
                //当前用户浏览足迹总数
                $totalCount=Db::name('user_trace')->where('user_id',$sessionUserData['id'])->count();

                //当前浏览的商品
                $currentTrace=Db::name('user_trace')->where('user_id',$sessionUserData['id'])->where('goods_id',$goods_id)->find();

                if($totalCount==3){
                    //删除最旧的记录
                    //插入新的浏览记录
                    //当前的，更新时间
                    if(empty($currentTrace)){

                        $traceData=Db::name('user_trace')->where('user_id',$sessionUserData['id'])->order('time asc')->find();
                        Db::name('user_trace')->delete($traceData['id']);
                        Db::name('user_trace')->insert([
                            'user_id'=>$sessionUserData['id'],
                            'goods_id'=>$goods_id,
                            'time'=>time(),
                        ]);
                    }else{
                        Db::name('user_trace')->where('user_id',$sessionUserData['id'])->where('goods_id',$goods_id)->update([
                            'time'=>time(),
                        ]);
                    }
                }else{
                    //当前记录是否在数据表中，
                    //有：更新时间
                    //没有：插入记录

                    if(empty($currentTrace)){
                        Db::name('user_trace')->insert([
                            'user_id'=>$sessionUserData['id'],
                            'goods_id'=>$goods_id,
                            'time'=>time(),
                        ]);
                    }else{
                        Db::name('user_trace')->where('user_id',$sessionUserData['id'])->where('goods_id',$goods_id)->update([
                            'time'=>time(),
                        ]);
                    }
                }

            }
        } catch (\Exception $e){
            trace($e->getMessage(), 'error');
        }




        return view('',[
            'goodsData'=>$goodsData,
            'iscollect'=>$iscollect,
            'goodsImg'=>$goodsImg,
            'goodsContent'=>$goodsContent,
            'positionData'=>$positionData,
            'standardList'=>$standardList,
            'skuDefaultStr'=>$skuDefaultStr
        ]);
    }



    //商品列表
    public function  goods(){
        //传递分类参数 根据条件销量、推荐、价格、评论查询对应商品
        //1、商品分页列表

        //$goodlist=Db::name('goods')->field('goods_id,goods_name,goods_price,goods_thumb,goods_cate_id,selnumber,time')->select();
        $goodslist = Db::name('goods')
            ->alias('p')
            //收藏查询

            ->field('p.goods_id, p.goods_name, p.goods_price, p.goods_thumb, p.goods_cate_id, p.selnumber, p.time, COUNT(co.goods_id) as comments_count')
            /*            ->Join('collect c', 'p.goods_id = c.goods_id')*/
            //评论查询
            ->Join('comment co','p.goods_id = co.goods_id')
            ->group('p.goods_id')
            ->select();

        // 查询每个商品及其被收藏的次数
        /* $goodsContents = Db::name('goods')
             ->alias('p')->join('goods_content gc','gc.goods_id = p.goods_id')
             ->Join('collect c', 'gc.goods_id = c.goods_id')
             ->field('p.goods_id, p.goods_name, p.goods_price,p.is_recommend, COUNT(c.goods_id) as collection_count, gc.content, p.stock, p.selnumber, p.goods_cate_id, p.goods_thumb')
             ->where('p.goods_id',$goods_id)
             ->group('p.goods_id')
             ->find();*/
      // var_dump($goodslist);die;
        //  $goods_id=input('goods_id');
        //2、分类列表   //该分类为多级分类
        $category_model = new CategoryModel();
        $cate=$category_model->getNavCateData();

        $data=['goodsList'=>$goodslist,'cate'=>$cate];
        return json($data);
    }


    //收藏is_collect
    public function  collect(){
        //收藏接口可无返回值
        $goods_id=input('goods_id');

        //判断收藏状态
        $sessionUserData=session('sessionUserData');
        $collectData=Db::name('collect')->where('goods_id',$goods_id)->where('user_id',$sessionUserData['id'])->find();

        if(!empty($collectData)){

            //则取消收藏  删除收藏记录
            $collectData=Db::name('collect')->where('goods_id',$goods_id)->where('user_id',$sessionUserData['id'])->delete();

            if ($collectData){
                return json(['is_collect' => 0, 'message' => '取消收藏成功!']);

            }
        }else{

            //为空则插入收藏记录

            $collect = ['goods_id'=>$goods_id,'time'=>time(),'user_id'=>$sessionUserData['id']];

            $collectData=Db::name('collect')->insert($collect);

            if ($collectData){
                return json(['is_collect' => 1, 'message' => '收藏成功!']);

            }



            //  var_dump($collectData);

        }


    }


    //通过sku获取价钱
    public function getPriceBySku(){
        $goods_id=input('post.goods_id');
        $sku=input('post.standard_value_id');
        if(!intval($goods_id) || empty($sku)){
            return json(['status'=>0,'msg'=>'请求异常']);
        }
        $goodsStandarData=Db::name('goods_standard')->where('goods_id',$goods_id)->where('sku',$sku)->find();
        if($goodsStandarData){
            return json(['status'=>1,'msg'=>'请求成功','goods_price'=>$goodsStandarData['goods_price'],'market_price'=>$goodsStandarData['market_price']]);
        }
        else{
            return json(['status'=>0,'msg'=>'请求异常']);
        }
    }

    //商品评价
    //评论追加 parent_id 
    public function goods_comment(){
        $goods_id=input('goods_id');
        $commentData=Db::view('comment', 'id,content,star,time')
        ->view('goods', 'goods_thumb', 'comment.goods_id=goods.goods_id')
        ->view('user', 'username,face', 'comment.user_id=user.id')
        ->where('comment.goods_id',$goods_id)
        ->paginate(10);

        $satify='100';
        //假如现在有5个评价，5*5=25，实际上总分只得20分。（20/25）*100
        $count=Db::name('comment')->where('goods_id',$goods_id)->count();
        if($count>1){
            $score=Db::name('comment')->where('goods_id',$goods_id)->sum('star');
            $totalScore=$count*5;//满分
            $satify=($score/$totalScore)*100;
            $satify=number_format($satify,2);
        }
        
       

        return view('',[
            'commentData'=>$commentData,
            'satify'=>$satify,
            'count'=>$count
        ]);
    }

}