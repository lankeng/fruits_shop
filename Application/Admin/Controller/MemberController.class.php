<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends Controller{
	public function index(){
		//取出会员信息
		$data = D('member')->getList(
			'mid,user,phone,email',
			array(),'mid desc'
		);//page：分页，list：列表
		$this->assign($data);
		$this->display();
	}
}