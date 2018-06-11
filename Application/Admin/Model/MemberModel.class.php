<?php
namespace Admin\Model;
use Think\Model;
class MemberModel extends Model {
	/**
	 * 获得会员列表
	 * @param $field array 查询字段
	 * @param $where array 查询条件
	 * @param $order array 排序条件
	 * @return array 数据
	 */
	public function getList($field,$where,$order){
		//查询数据
		$count = $this->where($where)->count();
		$Page = new \Think\Page($count,5);
		$limit = $Page->firstRow.','.$Page->listRows;
		//取得数据
		$data['page'] = $Page->show();
		$data['list'] = $this->field($field)->where($where)->order($order)->limit($limit)->select();
		return $data;
	}
}
