<?php
namespace Home\Controller;
class UserController extends CommonController {
	//构造方法
	public function __construct() {
		parent::__construct();
		$allow_action = array( //指定不需要检查登录的方法列表
			'login','captcha','register','checkNameOnly', 'checkCaptcha'
		);
		if($this->userInfo === false && !in_array(ACTION_NAME,$allow_action)){
			$this->error('请先登录。',U('User/login'));
		}
	}
	//会员中心
	public function index(){
		$this->display();
	}
	//用户登录
	public function login() {
		//处理表单
		if (IS_POST) {
			//判断验证码
			$this->checkVerify(I('post.captcha'));
			//判断用户名和密码
			$name = I('post.user','','trim');
			$pwd = I('post.pwd','','trim');
			$rst = D('member')->checkUser($name,$pwd);
			if($rst!==true){
				$this->error($rst);
			}
			$this->success('登录成功，请稍后',U('Index/index'));
			return;
		}
		$this->display();
	}
	//退出
	public function logout(){
		session('[destroy]');
		$this->success('退出成功',U('Index/index'));
	}
	//注册新用户
	public function register() {
		if(IS_POST){
			$this->checkVerify(I('post.captcha'));
			$rst = $this->create('member','add');
			if($rst===false){
				$this->error($rst->getError());
			}
			$this->success('用户注册成功',U('Index/index'));
			//注册后自动登录
			$name = I('post.user','','trim');
			$pwd = I('post.pwd','','trim');
			D('member')->checkUser($name,$pwd);
			return ;
		}
		$this->display();
	}
	//生成验证码
	public function captcha() {
		$verify = new \Think\Verify();
		return $verify->entry();
	}
	//检查验证码
    private function checkVerify($code, $id = '', $clear = true) {
        $verify = new \Think\Verify();
        $verify->reset = $clear;
        $rst = $verify->check($code, $id);
        if ($clear) {
            if ($rst !== true) {
                $this->error('验证码输入有误');
            }
        } else {
            if ($rst !== true) {
                return '0';
            }
        }
    }
	
	//查看收件地址
	public function addr(){
		$mid = $this->userInfo['mid'];
		$data['addr'] = D('member')->getAddr($mid);
		$this->assign($data);
		$this->display();
	}
	//修改收件地址
	public function addrEdit(){
		if(IS_POST){
			$mid = $this->userInfo['mid'];
			$rst = $this->create('member','save',2,"mid=$mid");
			if($rst===false){
				$this->error('修改失败');
			}
			$this->redirect('User/addr');
			return;
		}
		$this->addr();
	}
	public function checkNameOnly() {
        $data['user'] = I('post.user'); //获取查询的用户名
        if($data['user'] == ''){
            $find = '1';//用户名为空
        }else{
            $find = D('member')->where($data)->count(); //查询数据库，是否存在该用户名
        }
        echo $find; //返回查询结果，1表示存在，0表示不存在
    }
	public function checkCaptcha() {
        $captcha = I('post.captcha');
        echo $this->checkVerify($captcha, $id, false);
    }
    
}