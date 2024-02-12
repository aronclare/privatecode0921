<?php
namespace app\qingadmin\controller;

use app\BaseController;
use think\facade\Db;

class Config extends Base
{
    public function index()
    {
        $configData1=Db::name('config')->where('config_type',1)->select();
        $configData2=Db::name('config')->where('config_type',2)->select();

        if(request()->isPost()){
            $data=input('post.');
            foreach($data as $k=>$v){
               Db::name('config')->where('id',$k)->update(['value'=>$v]);
            }
        
            return alert('操作成功','index',6);
        }
      
       
        return view('',[
            'configData1'=>$configData1,
            'configData2'=>$configData2
        ]);
    }

    //清空runtime下的缓存
    public function del_cache(){
        //$path=runtime_path();//应用运行时目录runtime/qingadmin
        $path=root_path().'runtime';//runtime
        delFileByDir($path);
        //return alert('清空缓存成功','index/index',6);
        return alert('清空缓存成功','/qingadmin/index/welcome',6);
    }


    //通知消息列表
    public function notice(){
        $noticeData=Db::name('notice')->order('id desc')->paginate(10);
        return view('',[

            'noticeData'=>$noticeData,

        ]);
    }

    //发送通知消息
    public function notice_send(){

        if(request()->isPost()) {

            $data=input('post.');

            $data['time']=time();

            $id=Db::name('notice')->insertGetId($data);

            return alert('操作成功','notice',6,3);

        }
        return view();
    }

    //查看消息
    public function notice_edit(){
        $id=request()->param('id');
        $noticeData=Db::name('notice')->find($id);
        
        if(request()->isPost()) {

            $data=input('post.');

            Db::name('notice')->update($data);


            return alert('操作成功','notice',6,3);

        }
        return view('',[
            'noticeData'=>$noticeData
        ]);
    }
   
}
