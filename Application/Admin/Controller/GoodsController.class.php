<?php
namespace Admin\Controller;
//商品控制器
class GoodsController extends CommonController {
	//商品列表
    public function index() {
        //获得请求参数
        $data['cid'] = I('get.cid', 0, 'int');
        //获得分类列表
        $data['category'] = D('category')->getList();
        
        //处理排序
        $order = '';
        //收集待排序字段
        $data['get_order']['is_best'] = I('get.is_best');
        $data['get_order']['status'] = I('get.status');
        
        if($data['get_order']['is_best']!=''){
            $order = '`is_best` '.($data['get_order']['is_best']=='desc'?'desc':'asc').',';
            $data['get_order']['is_best'] = $data['get_order']['is_best']=='desc'?'asc':'desc';
        }else if($data['get_order']['status']!=''){
            $order = '`status` '.($data['get_order']['status']=='desc'?'desc':'asc').',';
            $data['get_order']['status'] = $data['get_order']['status']=='desc'?'asc':'desc';
        }
        $order .= 'gid desc';        
        //获得商品列表
        $data['goods'] = D('goods')->getList(
                //待查询字段
                'gid,cid,identifier,status,gname,is_best',
                //查询条件
                array('recycle' => 'no', 'cid' => $data['cid']), $order
        );
        //视图
        $this->assign($data);
        $this->display();
    }
	
	//添加商品-选择分类
	private function addNew(){
		//取得分类数据
		$data['category'] = D('category')->getList();
		//视图
		$this->assign($data);
		$this->display('new');
	}
	//添加商品-处理表单
	private function addAction($cid){
		//添加商品
		$gid = $this->create('goods','add');
		if($gid===false){
			$this->error("添加商品失败");
		}
		//保存属性数据;
		$data = I('post.attr');
		if($data!=''){
			$rst = D('goodsAttr')->addData($data,$gid);
			if($rst===false){
				$this->error("添加属性失败",U('Goods/revise',"gid=$gid&cid=$cid"));
			}
		}
		//保存上传文件
		if(!empty($_FILES['thumb']['name'])){
			$rst = D('goods')->uploadThumb($gid);
			if($rst!==true){
				$this->error($rst,U('Goods/revise',"gid=$gid&cid=$cid"));
			}
		}
		$this->success('保存成功',U('index',"cid=$cid"));
	}
	//修改商品-显示页面
	public function revise() {
		//获得请求参数
		$gid = I('get.gid',0,'int');
		//处理表单
		if (IS_POST){
			$this->reviseAction($gid);
			return;
		}
		//获取商品信息
		$data['goods'] = D('goods')->where("gid=$gid")->find();
		//获取商品属性数据
		$cid = $data['goods']['cid'];
		$data['attr'] = D('goodsAttr')->getData($cid,$gid);
		//视图
		$this->assign($data);
		$this->display();
	}
	//修改商品-处理表单
	private function reviseAction($gid){
		$cid = I('get.cid',0,'int');
		//修改商品基本信息
		$rst = $this->create('goods','save',2,array("gid=$gid"));
		if($rst===false){
			$this->error("修改商品失败");
		}
		//修改商品属性
		$data = I('post.attr');
		if($data){
			$rst = D('goodsAttr')->saveData($data,$gid);
			if($rst===false){
				$this->error('修改属性失败',U('Goods/revise',"gid=$gid&cid=$cid"));
			}
		}
		//保存上传文件
		if(!empty($_FILES['thumb']['name'])){
			$rst = D('goods')->uploadThumb($gid);
			if($rst!==true){
				$this->error($rst,U('Goods/revise',"gid=$gid&cid=$cid"));
			}
		}
		//跳转
		$this->success('修改成功',U('Goods/index',"cid=$cid"));
	}
	//快捷修改操作
	public function change(){
		//获得请求参数
		$gid = I('get.gid',0,'int');
		$action = I('get.');
		//准备待操作字段
		$allow_action=array('status','is_best');
		$field = array();
		foreach($allow_action as $v){
			if(isset($action[$v])){
				$field = array($v => $action[$v]);
				//反转字段值
				$field[$v] = $field[$v]=='yes' ? 'no' : 'yes';
				break;
			}
		}
		if(empty($field)){
			$this->error('请求参数有误');
		}
		//操作数据
		$rst = M('goods')->where("gid=$gid")->save($field);
		if($rst===false){
			$this->error('操作失败');
		}
		//跳转
		$cid = I('get.cid',0,'int');
		$this->redirect('Goods/index',"cid=$cid");
	}
	//删除商品
	public function del() {
		//获得请求参数
		$gid = I('get.gid',0,'int');
		//操作数据
		$rst = M('goods')->where("gid=$gid")->save(array('recycle'=>'yes'));
		if($rst===false){
			$this->error('删除失败');
		}
		//跳转
		$cid = I('get.cid',0,'int');
		$this->success('删除成功', U('Goods/index',"cid=$cid"));
	}
    //批量删除
    public function delSelect(){
        $gids = implode(",",  I('post.gid'));
        $where['gid'] = array('in', $gids);
        $res = M('goods')->where($where)->save(array('recycle' => 'yes'));
        if($res === false){
            $this->error("删除失败");
        }
        $cid = I('get.cid', 0, 'int');
        $this->success('删除成功', U('Goods/index', "cid=$cid"));
    }
}
