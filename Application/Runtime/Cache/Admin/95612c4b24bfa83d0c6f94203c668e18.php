<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>传智商城后台</title>
	<link href="/itcast_shop/Public/css/admin.css" rel="stylesheet" />
	<script src="/itcast_shop/Public/js/jquery.min.js"></script>
</head>
<body>
<div id="top">
	<h1 class="left">传智商城 后台管理系统</h1>
	<ul class="right">
		<li>欢迎您：<?php echo (session('admin_name')); ?></li>
		<li>|</li><li><a href="/itcast_shop/" target="_blank">前台首页</a></li>
		<li>|</li><li><a href="/itcast_shop/Admin/Login/logout">退出登录</a></li>
	</ul>
</div>
<div id="main">
	<div id="menu" class="left">
		<ul><li><a href="/itcast_shop/Admin/Index/index" id="Index_index">后台首页</a></li>
			<li><a href="/itcast_shop/Admin/Goods/add" id="Goods_add">商品添加</a></li>
			<li><a href="/itcast_shop/Admin/Goods/index" id="Goods_index">商品列表</a></li>
			<li><a href="/itcast_shop/Admin/Attribute/index" id="Attribute_index">商品属性</a></li>
			<li><a href="/itcast_shop/Admin/Category/index" id="Category_index">商品分类</a></li>
			<li><a href="/itcast_shop/Admin/Recycle/index" id="Recycle_index">回收站</a></li>
			<li><a href="/itcast_shop/Admin/Member/index" id="Member_index">会员管理</a></li>
		</ul>
	</div>
	<div id="content">
		<div class="item"><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<div class="title">商品分类添加</div>
<div class="data-edit clear">
	<form method="post">
	<table>
		<tr><th>分类名称：</th><td><input type="text" name="cname" /></td></tr>
		<tr><th>上级分类：</th><td><select name="pid">
			<option value="0">顶级分类</option>
			<?php if(is_array($category)): foreach($category as $key=>$v): ?><option 
value="<?php echo ($v["cid"]); ?>"><?php echo str_repeat('--',$v['deep']).$v['cname'];?></option><?php endforeach; endif; ?>
		</select></td></tr>
		<tr class="tr_btn center">
			<td colspan="2"><input type="submit" value="确定" /><input type="reset" 
value="重置" /></td>
		</tr>
	</form>
</div>

</body>
</html></div>
	</div>
</div>
<script>
	$("#<?php echo (CONTROLLER_NAME); ?>_<?php echo (ACTION_NAME); ?>").addClass("curr");
</script>
</body>
</html>