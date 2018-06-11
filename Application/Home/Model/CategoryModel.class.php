<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {
	//获得分类列表
	public function getList($max_deep=3){
		$data = $this->select();
		$data==null && $data = array();
		return $this->tree($data,0,0,$max_deep);
	}
	//递归实现按照父子关系排序分类
	private function tree(&$list, $pid=0, $deep=0, $max_deep=3) {
	   $result = array();//当前子分类的列表
		foreach($list as $row) {
		  if ($row['pid'] == $pid) {
			//判断是否达到最大深度
			if ($deep < $max_deep-1) {
				//递归查找
				$row['child'] = $this->tree($list, $row['cid'], $deep + 1, $max_deep);
			}
			$result[] = $row;
		  }
		}
	   return $result;
	}
	//向上查找父分类
	public function getPidList($cid){
		$pcat = array();
		while($cid){
			$cat = $this->field('cid,cname,pid')->where("cid=$cid")->find();
			$pcat[] = array(
				'cid' => $cat['cid'],
				'cname' => $cat['cname'],
			);
			$cid = $cat['pid'];
		}
		return array_reverse($pcat);
	}
}
