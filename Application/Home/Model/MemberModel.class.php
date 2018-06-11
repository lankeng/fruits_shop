<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model {
	protected $insertFields = 'user,phone,email,pwd,consignee,address';
	protected $updateFields = 'user,phone,email,pwd,consignee,address';
	protected $_validate = array(
		array('user','require','用户名不能为空',1,'',1),
		array('pwd','require','密码不能为空',1,'',1),
		array('user','2,20','用户名位数不合法（2~20位）',1,'length',1),
		array('pwd','6,20','密码位数不合法（6~20位）',1,'length',1),
		array('user', '', '用户名已经存在', 1, 'unique', 1),
		array('email', 'email', '邮箱格式不正确', 1, 'regex', 2),
		array('phone', 11, '手机号码格式不正确', 1, 'length', 2),
		//......实际项目需要更多的验证规则，读者可以自行实现。
		array('user','/^[0-9a-zA-Z_\x{4e00}-\x{9fa5}]+$/u','用户名只能是汉字、字母、数字、下划线。',1,'',1),
		array('pwd','/^[\w]+$/','密码只能是字母、数字、下划线。',1,'',1),
		array('consignee','require','收件人不能为空',1,'',2),
		array('phone','require','手机号不能为空',1,'',2),
		array('address','require','收件地址不能为空',1,'',2),
	);
	//校验用户名和密码
	public function checkUser($name,$pwd) {
		$data = $this->field('mid,user,pwd,salt')->where(array('user'=>$name))->find();
		if($data===null){
			return '用户名不存在';
		}
		if($data['pwd']==$this->password($pwd,$data['salt'])){
			//密码正确
			session('user_name',$name);
			session('user_id',$data['mid']);
			return true;
		}
		return '密码错误';
	}
	//获取收件地址
	public function getAddr($mid){
		//取出数据
		$data = $this->field(
			'consignee,address,email,phone'  //收件人，收件地址，邮箱，手机号码
		)->where("mid=$mid")->find();
		//分割“收件地址”字符串
		$data['area'] = explode(',',$data['address'],4); //最多分割4次
		if(count($data['area'])!=4){
			$data['area'] = array('','请选择','请选择','');
		}
		return $data;
	}
	//密码加密函数
	private function password($pwd,$salt){
		return md5(md5($pwd).$salt);
	}
	//插入数据前的回调方法
	protected function _before_insert(&$data,$option) {
		$data['salt'] = substr(uniqid(), -6);
		$data['pwd'] = $this->password($data['pwd'],$data['salt']);
	}
}
