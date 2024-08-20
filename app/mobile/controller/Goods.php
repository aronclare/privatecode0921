<?php

namespace app\mobile\controller;

use app\common\model\Category as CategoryModel;
use think\facade\Request;
use think\Controller;
use think\facade\Db;
use think\response\Json;


class Goods extends  Base{

    //商品详情
    public function index(){

        $url = Request::url();

        // 使用正则表达式从 URL 中提取 ID
        if (preg_match('/\/index\/(\d+)$/', $url, $matches)) {
            $goods_id = $matches[1];
        }

       // $goods_id=$id; input('id');
        $goodsData=Db::name('goods')->find($goods_id);
        if(empty($goodsData) || $goodsData['goods_status']!=1){
            return json(['status' => 0, 'message' => '没有该商品或者该商品已经下架!']);
        }

        //更新点击量
        $click=$goodsData['click']+1;
        Db::name('goods')->where('goods_id',$goods_id)->update(['click'=>$click]);

        // 使用联合查询（JOIN）获取商品及其详情
        /*$goodsContents = Db::name('goods')
        ->alias('p')
        ->join('goods_content pd', 'p.goods_id = pd.goods_id')->Join('collect c', 'pd.goods_id = c.goods_id')->group('pd.goods_id')
        ->field('p.goods_id, p.goods_name, p.goods_price， COUNT(c.id) as collects_count, p.stock, p.selnumber,p.goods_cate_id, p.goods_thumb, pd.content')
        ->select();*/

        // 查询每个商品及其被收藏的次数
        $goodsContents = Db::name('goods')
            ->alias('p')->leftjoin('goods_content gc','gc.goods_id = p.goods_id')
            ->leftJoin('collect c', 'gc.goods_id = c.goods_id')
            ->field('p.goods_id, p.goods_name, p.goods_price, p.is_recommend, p.goods_status, p.created_at, p.updated_at, COUNT(c.goods_id) as collection_count, gc.content, p.stock, p.selnumber, p.goods_cate_id, p.goods_thumb')
            ->where('p.goods_id',$goods_id)
            ->group('p.goods_id')
            ->find();
        //获取当前域名
        //构造user_id

        //  $userSessionData = $this->isLogin();
       // $user_data = session('sessionUserData');
        $goodsContents['user_id'] = 47 ;

        //商品是否被当前用户收藏
        $is_collect = Db::name('collect')
            ->where('goods_id',$goods_id)
            ->where('user_id',$goodsContents['user_id'])
            ->find();

        if ($is_collect){
            $goodsContents['is_collect'] = 1;
        }else{
            $goodsContents['is_collect'] = 0;
        }

        //查询该商品图片集pics
        $pics = Db::name('goods_img')
            ->field('id, image, goods_id')
            ->where('goods_id',$goods_id)
            ->select();

        $goodsContents['pics'] =$pics;

        //查询该商品所有评论
        //comments
        $comments = Db::name('comment')
            ->alias('c')
            ->Join('user u', 'c.user_id = u.id')
            ->field('c.id, u.name, u.avatar, c.content, c.goods_id, c.user_id')
            ->where('c.goods_id',$goods_id)
            ->select();

        // 获取当前域名
        $domain = Request::domain();

        $goodsContents['goods_thumb'] =$domain.$goodsContents['goods_thumb'];
        $goodsContents['comments'] =$comments;



        return json([ 'goods' => $goodsContents,'like_goods'=>[]]);

        //商品被收藏的次数 collects_count  需传入goods_id  并统计goods_id数量
        //$collects_count = Db::name('collect')->where('goods_id',$goodsContent['goods_id'])->count();
        // 查询每个商品及其被收藏的次数
        $products = Db::name('goods')
            ->alias('p')
            ->leftJoin('collect c', 'p.goods_id = c.goods_id')
            ->field('p.goods_id, p.goods_name, p.goods_price, COUNT(c.goods_id) as collects_count')
            ->group('p.goods_id')
            ->select();

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
    //收藏is_collect
    public function  collect(){
        //收藏接口可无返回值
        $url = Request::url();
        // 使用正则表达式从 URL 中提取 ID
        if (preg_match('/\/collect\/(\d+)$/', $url, $matches)) {
            $id = $matches[1];
        }
        $goods_id= $id;
        //判断收藏状态
        //$sessionUserData=session('sessionUserData');
        $sessionUserData['id'] = 47;
        $collectData=Db::name('collect')->where('goods_id',$goods_id)->where('user_id',$sessionUserData['id'])->find();
        //  var_dump($collectData);die;
        if(!empty($collectData)){
            //则取消收藏  删除收藏记录
            $collectData=Db::name('collect')->where('goods_id',$goods_id)->where('user_id',$sessionUserData['id'])->delete();
            if ($collectData){
                return json(['status' =>'1', 'message' => '取消收藏成功!']);
            }
        }else{
            //为空则插入收藏记录
            $collect = ['goods_id'=>$goods_id,'time'=>time(),'user_id'=>$sessionUserData['id']];
            $collectData=Db::name('collect')->insert($collect);
            if ($collectData){
                return json(['status' => '1', 'message' => '收藏成功!']);
            }
        }
    }



    //商品列表
    public function  goods(){
        //传递分类参数 根据条件销量、推荐、价格、评论查询对应商品  tabs切换点击条件   category_id切换分类
        //1、商品分页列表
        $name = input('tabs');
        $category_id  = input('category_id');
        if (!empty($category_id)){

            if($name==""){
                //默认
                $goodslist = Db::name('goods')
                    ->alias('p')
                    ->field('p.goods_id, p.goods_name, p.goods_price, p.goods_thumb, p.goods_cate_id, p.selnumber, p.time')
                    ->where('goods_cate_id',$category_id)
                    ->select();
            }
            if ($name ==1){
                //销量排序
                $goodslist = Db::name('goods')
                    ->alias('p')
                    ->field('p.goods_id, p.goods_name, p.goods_price, p.goods_thumb, p.goods_cate_id, p.selnumber, p.time')
                    ->where('goods_cate_id',$category_id)
                    ->order('selnumber desc')
                    ->select();
            }

            if ($name ==2){
                //推荐  is_recommend = 1
                $goodslist = Db::name('goods')
                    ->alias('p')
                    ->field('p.goods_id, p.goods_name, p.goods_price, p.goods_thumb, p.goods_cate_id, p.selnumber, p.time')
                    ->where('goods_cate_id',$category_id)
                    ->where('is_recommend',1)
                    ->select();
            }
            if ($name ==3){
                //价格排序
                $goodslist = Db::name('goods')
                    ->field('goods_id, goods_name, goods_price, goods_thumb, goods_cate_id, selnumber, time')
                    ->where('goods_cate_id',$category_id)
                    ->order('goods_price desc')->select();
            }
            if($name ==4){
                // 获取按评论数量排序的商品列表
                // $goodsList = Db::table('goods')
                $goodslist = Db::name('goods')
                    ->alias('g')
                    ->join('comment c', 'g.goods_id = c.goods_id')
                    ->field('g.*, COUNT(c.goods_id) as comment_count')
                    ->where('goods_cate_id',$category_id)
                    ->group('g.goods_id')
                    ->order('comment_count', 'desc')
                    ->select();
            }
        }else{
            if($name==""){

                //  var_dump($name);die;

                //默认
                $goodslist = Db::name('goods')
                    ->alias('p')
                    ->field('p.goods_id, p.goods_name, p.goods_price, p.goods_thumb, p.goods_cate_id, p.selnumber, p.time')
                    ->select();
            }
            if ($name ==1){
                //销量排序
                $goodslist = Db::name('goods')
                    ->alias('p')
                    ->field('p.goods_id, p.goods_name, p.goods_price, p.goods_thumb, p.goods_cate_id, p.selnumber, p.time')
                    ->order('selnumber desc')
                    ->select();
            }

            if ($name ==2){
                //推荐  is_recommend = 1
                $goodslist = Db::name('goods')
                    ->alias('p')
                    ->field('p.goods_id, p.goods_name, p.goods_price, p.goods_thumb, p.goods_cate_id, p.selnumber, p.time')
                    ->where('is_recommend',1)
                    ->select();
            }
            if ($name ==3){
                //价格排序
                $goodslist = Db::name('goods')
                    ->field('goods_id, goods_name, goods_price, goods_thumb, goods_cate_id, selnumber, time')
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
        }

        //0 默认 1销量 2推荐 3价格 4评论
        $domain = Request::domain();
        foreach ($goodslist as $slide){
            $slide['goods_thumb'] = $domain.$slide['goods_thumb'];
            $newGoods[] = $slide;
        }
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

        return json(['goods'=>['data'=>$newGoods],'categories'=>$cate]);
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