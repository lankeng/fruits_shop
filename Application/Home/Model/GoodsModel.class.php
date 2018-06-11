<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model {
	//利用分类获得商品
	public function getByFilter($field,$where) {
		//接收GET参数并SQL转义
		$filter = array_map(array($this->db,'escapeString'),I('get.'));
		$cid = $where['cid'];//获得cid
		//处理排序参数
		$order = 'gid desc';//默认为[最早上架]
		if(isset($filter['order'])){
			$allow_order = array(
				'price_asc' => 'price asc',//价格升序
				'price_desc' => 'price desc',//价格降序
			);
			isset($allow_order[$filter['order']]) && $order = $allow_order[$filter['order']];
		}
		//处理价格参数
		if (isset($filter['min_p'])) { //价格最小值
			$where[] = 'price >= '.(int)$filter['min_p'];
		}
		if (isset($filter['max_p']) && $filter['max_p'] != '0') { //价格最大值
			$where[] = 'price <= '.(int)$filter['max_p'];
		}
		//处理属性参数
		$data['attr'] = D('attribute')->getData("cid=$cid");
		foreach($data['attr'] as $v){  //取得参数中的合法过滤属性
			if(isset($filter['aid'.$v['aid']])){
				$attr_where[] = "(aid={$v['aid']} and avalue='{$filter['aid'.$v['aid']]}')";
			}
		}
		//取得符合条件的商品数量
		if(empty($attr_where)){  //属性过滤条件不存在时
			$count = $this->where($where)->count();
		}else{  //属性过滤条件存在时
			$attr_where_str = implode(' or ',$attr_where);
			$table_goodsAttr = C('DB_PREFIX').'goods_attr';//表名
			$attr_sql = "select count(*) from $table_goodsAttr where $attr_where_str group by gid having count(*)=".count($attr_where);
			$attr_sql = "select count(*) from ($attr_sql) as total";
			$count = $this->query($attr_sql);$count = $count[0]['count(*)'];
		}
		//实例化分页类
		$Page = new \Think\Page($count,12);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$limit = $Page->firstRow.','.$Page->listRows;
		$data['goods']['page'] = $Page->show();//分页链接导航
		$data['goods']['list'] = '';//商品列表初始值
		//取得符合属性过滤条件的商品ID
		if(!empty($attr_where)){  //属性过滤条件存在时
			$attr_sql = "select gid from $table_goodsAttr where $attr_where_str group by gid having count(*)=".count($attr_where)." limit $limit";
			foreach($this->query($attr_sql) as $row){ //执行SQL得到所有符合条件的gid
				$gids[] = $row['gid'];
			}
			if(empty($gids))  return $data; //未找到商品时直接返回
			$where[] = 'gid in (' . implode(', ', $gids) . ')'; //拼接查询条件
			$limit = '';//清空limit条件
		}
		//取得商品
		$data['goods']['list'] = $this->field($field)->where($where)->order($order)->limit($limit)->select();
		return $data;
	}
}