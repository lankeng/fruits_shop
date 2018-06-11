<?php
namespace Admin\Controller;
//商品分类控制器
class CategoryController extends CommonController {
	//分类列表
	public function index() {
		//获得数据
		$data['data'] = M('category')->select();
		//视图
		$this->assign($data);
		$this->display();
	}
	//添加分类
	public function add(){
		//处理表单
		if(IS_POST){
			$rst = $this->create('category','add');
			if($rst===false){
				$this->error('添加分类失败');
			}
			$this->success('添加分类成功','index');
			return;
		}
		//视图
		$data['category'] = D('category')->getList(); //获得分类列表
		$this->assign($data);
		$this->display();
	}
	//AJAX-添加分类
	public function addAjax(){
		if(IS_POST){
			$rst = $this->create('category','add');
			$this->ajaxReturn($rst);
		}
	}
	//修改分类
	public function revise(){
		$cid = I('get.cid',0,'int');
		//处理表单
		if(IS_POST){
			//不允许将当前分类及其子孙分类作为父分类
			$ids = D('category')->getSubIds($cid);
			$pid = I('post.pid',0,'int');
			if(in_array($pid,$ids)){
				$this->error('不允许将当前分类及其子孙分类作为父分类');
			}
			//保存分类数据
			$rst = $this->create('category','save',2,"cid=$cid");
			if($rst===false){
				$this->error('修改分类失败');
			}
			$this->success('修改分类成功',U('index'));
			return;
		}
		//获取指定分类ID的数据
		$data['cate']=M('category')->where("cid=$cid")->find();
		//获取所有分类
		$data['category']=D('category')->getList();
		$this->assign($data);
		$this->display();
	}
	//AJAX-删除分类
	public function remove(){
		$cid = I('get.cid',0,'int');
		$Category = M('category');
		//判断是否为最底级分类
		if($Category->where("pid=$cid")->limit(1)->getField('cid')){
			$this->ajaxReturn(array('flag'=>false,'msg'=>'只允许删除最底层分类'));
		}
		//删除分类
		$rst = $Category->where("cid=$cid")->delete();
		//删除关联属性
		M('attribute')->where("cid=$cid")->delete();
		//删除关联商品（在商品回收站小节中讲解）
		D('goods')->delAllByCid($cid);
		//返回结果
		$this->ajaxReturn(array('flag'=>true));
	}
}
