<?php
namespace app\common\model;
use think\Model;

class Ad extends Model
{
    protected $name = 'ad';//数据表
    public function search(){

        //根据url传过来的分类id
        $get_type_id=input('get.type_id');

        if(!is_numeric($get_type_id)){
            $type_id='';
        }
        $where='';
        if($type_id =$get_type_id)
            $where['type_id'] = array('eq', $get_type_id);

        $adData=$this->alias('a')->join('ad_type b','a.type_id = b.id')->field('a.*,b.name')->order('a.listorder asc')->where($where)->paginate(20);
        return $adData;      
    }

}