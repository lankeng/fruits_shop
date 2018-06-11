<?php
namespace Admin\Controller;
//属性控制器
class AttributeController extends CommonController {
	//属性列表
	public function index() {
		//获得请求参数
		$cid = I('get.cid',0,'int');
		//获得分类列表
		$data['category'] = D('category')->getList();
		//默认选中第一个分类
		if($cid==0 && isset($data['category'][0]['cid'])){
			$cid = $data['category'][0]['cid'];
		}
		//获得属性信息
		$data['attr'] = M('attribute')->where("cid=$cid")->select();
		//视图
		$data['cid'] = $cid;
		$this->assign($data);
		$this->display();
	}
	//添加分类属性
	public function add(){
		//接收请求参数
		$cid = I('get.cid',0,'int');
		if($cid<=0){
			$this->error('请先添加分类',U('Category/add'));
		}
		//处理表单
		if(IS_POST){
			$rst = $this->create('attribute','add',1);
			if($rst===false){
				$this->error('添加失败');
			}
			$this->success('添加成功',U('index'));
			return;
		}
		$data['cid'] = $cid;
		$this->assign($data);
		$this->display();
	}
	//更新分类属性
	public function revise(){
		$aid = I('get.aid',0,'int');
		if(IS_POST){
			$rst = $this->create('attribute','save',2,"aid=$aid");
			if($rst===false){
				$this->error('修改失败');
			}
			$cid = I('get.cid',0,'int');
			$this->success('修改成功',U('index',"cid=$cid"));
			return;
		}
		$data = M('attribute')->where("aid=$aid")->find();
		$this->assign($data);
		$this->display();
	}
	//删除分类属性
	public function del(){
		$aid = I('get.aid',0,'int');
		M('attribute')->where("aid=$aid")->delete();
		//删除商品属性表中的关联属性值
		M('goodsAttr')->where("aid=$aid")->delete();
		//成功跳转
		$cid = I('get.cid',0,'int');
		$this->success('删除成功',U('index',"cid=$cid"));
	}
}
