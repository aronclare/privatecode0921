<?php

namespace app\qingadmin\controller;

use think\facade\Request;

use think\facade\Env;
use think\facade\Db;
class Ad extends  Base

{


	public function index() {
		$where=[];
		$type_id=input('type_id');
		if($type_id){
			$where=[
				['a.type_id','=',$type_id],
			];
		}
		$adData=Db::name('ad')->alias('a')->join('ad_type b','a.type_id=b.id')->where($where)->paginate(10);
		$typeData=Db::name('ad_type')->select();

		return view('', [

			'type_id' => $type_id,
			'typeData'=>$typeData,
			'adData' => $adData,

		]);

	}



    public function add() {

		if(request()->isPost()) {

			// 入库的逻辑

			$data = input('post.');

			$id = Db::name('Ad')->insert($data);

			if($id){
				return alert('操作成功','index',6,3);
			}else{
				return alert('操作失败','index',5,3);
			}

		}else {

			// 获取推荐位类别

		    $types =Db::name('ad_type')->select();
		    $adData['thumb']='';
		    $adData['id']=0;

			return view('', [

				'types' => $types,
				'adData'=>$adData

			]);

		}

	}



	//编辑广告位

	public function edit(){

		$id=Request::instance()->param('id');

		$adData=Db::name('Ad')->find($id);


		// 获取推荐位类别

		$types =Db::name('Ad_type')->select();



		if(request()->isPost()){

			$data=input('post.');

			
            $res=Db::name('Ad')->where('id',$data['id'])->update($data);

            if($res){
				return alert('操作成功','index',6,3);
			}else{
				return alert('操作失败','index',5,3);
			}

		}

		return view('', [

				'types' => $types,
				'adData'=>$adData,
			]);

	}



	//广告分组列表
	public function ad_type(){
		$adTypeData=Db::name('ad_type')->order('id desc')->select();
		return view('', [
				'adTypeData' => $adTypeData,
			]);
	}


	//添加广告分组
	public function ad_type_add(){
		if(request()->isPost()) {
			$data = input('post.');
			$res=Db::name('ad_type')->insert($data);
			if($res){
				return alert('操作成功','index',6,3);
			}else{
				return alert('操作失败','index',5,3);
			}
		}

		return view();

	}


	//修改广告分组
	public function ad_type_edit(){
		if(request()->isPost()) {
			$data = input('post.');
			$res=Db::name('ad_type')->update($data);
			if($res){
				return alert('操作成功','index',6,3);
			}else{
				return alert('操作失败','index',5,3);
			}
		}
		$id=request()->param('id');
		$adTypeData=Db::name('ad_type')->find($id);
		return view('', [
				'adTypeData' => $adTypeData,
			]);

	}

	public function ad_type_del(){
		$id=request()->param('id');
		$res=Db::name('ad_type')->delete($id);
		if($res){
			return alert('操作成功','index',6,3);
		}else{
			return alert('操作失败','index',5,3);
		}
	}

	public function del(){
		$id=Request::instance()->param('id');
		$image=Db::name('ad')->where('id',$id)->value('image');
		delFile($image);//删除文件
		$res=Db::name('ad')->where('id',$id)->delete();
		if($res){
			return alert('操作成功','index',6,3);
		}else{
			return alert('操作失败','index',5,3);
		}
	}
	





}

