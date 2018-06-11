<?php
namespace Home\Model;
use Think\Model;
class ShopcartModel extends Model {
	//添加到购物车
	public function addCart($gid,$mid,$num){
		//判断购物车中是否已经有该类商品
		$rst = $this->where("gid=$gid and mid=$mid")->field('scid,num')->find();
		if($rst){ //存在时数量增加
			$num += $rst['num'];
			return $this->where('scid='.$rst['scid'])->save(array('num'=>$num));
		} //不存在时添加到购物车
		return $this->add(array(
			'mid' => $mid,'gid' => $gid,'num' => $num,
		));
	}
	//从购物车获得商品信息
	public function getList($mid){
		//拼接完整表名
		$goods = C('DB_PREFIX').'goods';
		$cart =  C('DB_PREFIX').'shopcart';
		$sql = "select g.gname,g.price,c.scid,c.addTime,c.gid,c.num from $cart as c
					left join $goods as g
					on g.gid=c.gid
					where mid=$mid";
		return $this->query($sql);
	}
}
