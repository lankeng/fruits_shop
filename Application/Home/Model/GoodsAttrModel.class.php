<?php
namespace Home\Model;
use Think\Model;
class GoodsAttrModel extends Model {
	//获得商品属性信息
	public function getData($cid,$gid){
		//拼接完整表名
		$goodsAttr = C('DB_PREFIX').'goods_attr';
		$attr =  C('DB_PREFIX').'attribute';
		//执行SQL查询
		$sql="select ga.avalue,a.aname from $attr as a
				left join (select aid,avalue from $goodsAttr where gid=$gid) as ga
				on ga.aid=a.aid where cid=$cid";
		$data = $this->query($sql);
		return $data;
	}
}
