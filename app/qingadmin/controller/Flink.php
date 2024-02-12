<?php
namespace app\qingadmin\controller;

use app\BaseController;
use think\facade\Db;
use app\common\model\User;

class Flink extends Base
{

    //问题1：字段验证  validate
    //问题2：询问框：您是不是确定删除呢？
    //问题3：id 数据表 可以做删除 做成公共的删除方法
    //抽离成公共的删除方法base/del

    //列表
    public function index()
    {
        
        $flinkData=Db::name('flink')->paginate(10);//数据表名Data
        return view('',[
            'flinkData'=>$flinkData
        ]);
    }


    //添加数据
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            $res=Db::name('flink')->insert($data);
            if($res){
                return alert('操作成功','index','6');
            }else{
                return alert('操作失败','index','5');
            }
        }else{
            return view();
        }
    }

     //修改数据
     public function edit(){
        $id=input('id');
        $flinkData=Db::name('flink')->find($id);
        return view('',[
            'flinkData'=>$flinkData
        ]);
    }

    //修改更新
    public function update(){
        $data=input('post.');
        $res=Db::name('flink')->update($data);
            if($res){
                return alert('操作成功','index','6');
            }else{
                return alert('操作失败','index','5');
        }
    }


   
}
