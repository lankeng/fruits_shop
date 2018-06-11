<?php
namespace Home\Model;
use Think\Model;
class AttributeModel extends Model {
	//取出属性数据
	public function getData($where){
		$data = $this->field('aid,aname,a_def_val')->where($where)->select();
		$data==null && $data= array();
		//整理数据
		valToArr($data,'a_def_val',true);
		return $data;
	}
}