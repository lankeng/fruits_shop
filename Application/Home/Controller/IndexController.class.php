<?php
namespace Home\Controller;
class IndexController extends CommonController {
	//前台首页
	public function index(){
		//获得分类列表
		$data['cate'] = D('category')->getList();
		//获得推荐商品
		$data['best'] = M('goods')->field(
			'gid,gname,price,thumb' //取出商品id，商品名，商品价格，商品图片
		)->where(array(
			'is_best'=>'yes',  //是推荐商品
			'status'=>'yes',   //已上架
			'recycle'=>'no',   //不在回收站中
		))->limit(5)->select();
		//视图
		$this->assign($data);
		$this->display();
	}
	//前台商品列表页
	public function find(){
		//获得请求参数
		$cid = I('get.cid',0,'int');
		//利用过滤器获得商品
		$data = D('Goods')->getByFilter(
			//待查询字段
			'gid,gname,price,thumb',
			//查询条件（不在回收站中，已上架，属于指定分类）
			array('recycle'=>'no','status'=>'yes','cid'=>$cid)
		);
		//获得分类名
		$data['cname'] = M('category')->where("cid=$cid")->getField('cname');
		//视图
		$data['cid'] = $cid;
		$this->assign($data);
		$this->display();
	}
	//前台商品信息页
	public function goods(){
		layout(false);
		$gid = I('get.id',0,'int');
		//得到商品信息
		$data['goods'] = M('goods')->field(
			'cid,gname,price,thumb,description,stock,identifier'
		)->where(array( //根据gid取得商品，且该商品未被删除，已上架。
			'gid'=>$gid,'recycle'=>'no','status'=>'yes'
		))->find();
		if(empty($data['goods'])){ //判断商品是否存在
			$this->error('该商品不存在或已下架！');
			return;
		}
		$cid = $data['goods']['cid']; //取得该商品所在分类
		//取出商品分类信息
		$data['pcats'] = D('category')->getPidList($cid);
		//取出商品属性信息
		$data['attr'] = D('goodsAttr')->getData($cid,$gid);
		//视图
		$data['gid'] = $gid;
		$this->assign($data);
		$this->display();
	}
}
