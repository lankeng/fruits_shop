<?php
namespace Admin\Model;
use Think\Model;
class GoodsAttrModel extends Model{
	//添加数据
	public function addData($data,$gid){
		//整理数组
		$data = $this->getAttrArr($data,$gid);
		//批量添加
		return $this->addAll($data);
	}
	//获得商品属性信息
	public function getData($cid,$gid){
		//拼接完整表名
		$goodsAttr = C('DB_PREFIX').'goods_attr';
		$attr =  C('DB_PREFIX').'attribute';
		//执行SQL查询
		$sql = "select ga.gaid,a.aid,ga.avalue,a.aname,a.a_def_val from $attr as a
			left join (select gaid,gid,aid,avalue from $goodsAttr where gid=$gid) as ga
			on ga.aid=a.aid where a.cid=$cid";
		$data = $this->query($sql);
		valToArr($data,'a_def_val');
		return $data;
	}
	//修改数据
	public function saveData($data,$gid){
		//整理数组
		$data = $this->getAttrArr($data,$gid);
		//批量修改
		foreach($data as $v){
			//判断gaid
			$where = array('aid' => $v['aid'],'gid' => $v['gid'],);
			$gaid = $this->where($where)->getField('gaid');
			//gaid不存在时添加
			if($gaid==null){
				$rst = $this->add($v);
				if($rst===false) return false;
				continue;
			}
			//gaid存在时保存
			$rst = $this->where($where)->setField('avalue',$v['avalue']);
			if($rst===false) return false;
		}
		return true;
	}
	//整理数组，将 attr[aid]=>value 转为 []=>array(aid,avalue,gid) ）
	private function getAttrArr($data,$gid){
		$new_data = array();
		foreach($data as $k=>$v){
			$new_data[] = array(
				'aid' => $k,
				'avalue' => $v,
				'gid' => $gid,
			);
		}
		return $new_data;
	}
}
