<?php
namespace Admin\Controller;
//回收站控制器
class RecycleController extends CommonController {
	//查看回收站中的商品
	public function index() {
		//获得请求参数
		$data['cid'] = I('get.cid',0,'int');
		//获得分类列表
		$data['category'] = D('category')->getList();
		//获得商品列表
		$data['goods'] = D('goods')->getList(
			//待查询字段
			'gid,cid,identifier,gname',
			//查询条件
			array('recycle'=>'yes','cid'=>$data['cid']),'gid desc'
		);
		//视图
		$this->assign($data);
		$this->display();
	}
	//还原
	public function undel(){
		//获得请求参数
		$gid = I('get.gid',0,'int');
		//操作数据
		$rst = M('goods')->where("gid=$gid")->save(array('recycle'=>'no'));
		if($rst===false){
			$this->error('还原失败');
		}
		//跳转
		$cid = I('get.cid',0,'int');
		$this->success('还原成功', U('Goods/index',"cid=$cid"));
	}
	//删除（从回收站彻底删除）
	public function del() {
		$gid = I('get.gid',0,'int'); 
		//删除商品
		$rst = D('goods')->delAll($gid);
		if($rst===false){
			$this->error('删除商品失败');
		}
		//删除商品属性
		$rst = M('goodsAttr')->where("gid=$gid")->delete();
		if($rst===false){
			$this->error('删除商品关联属性失败');
		}
		//跳转
		$cid = I('get.cid',0,'int');
		$this->success('删除成功', U('index',"cid=$cid"));
	}
    //批量还原
    public function undelSelect(){
        $gids = implode(",",  I('post.gid'));
        $where['gid'] = array('in', $gids);
        $res = M('goods')->where($where)->save(array('recycle' => 'no'));
        if($res === false){
            $this->error("还原失败");
        }
        $cid = I('get.cid', 0, 'int');
        $this->success('还原成功', U('Goods/index', "cid=$cid"));
    }
}
