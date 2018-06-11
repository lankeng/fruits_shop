<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model {
	protected $insertFields = 'cname,pid';
	protected $updateFields = 'cname,pid';
	protected $_validate = array(
		array('cname','require','分类名不能为空',1,'',3),
		array('pid','require','父级分类不能为空',1,'',3),
	);
	protected $_auto = array(
		array('cname','trim',3,'function'),
	);
	/**
	 * 获得分类列表
	 */
	public function getList(){
		$data = $this->select();
		$data==null && $data = array();
		$data = $this->tree($data);
		return $data;
	}
	/**
	 * 递归计算分类深度
	 */
	private function tree(&$list, $p_id = 0, $deep = 0) {
		//保存按顺序查找到的分类
		static $result = array();
		//按照p_id查找
		foreach ($list as $row) {
			if ($row['pid'] == $p_id) {
				$row['deep'] = $deep;
				$result[] = $row;
				$this->tree($list, $row['cid'], $deep + 1);
			}
		}
		return $result;
	}
	//获取指定分类下的所有子孙分类，包括自己
	public function getSubIds($pid){
		$data = $this->select();
		$data = $this->tree($data,$pid);
		$list = array();
		foreach($data as $row){
			$list[] = $row['cid'];
		}
		$list[] = $pid;
		return $list;
	}

}
