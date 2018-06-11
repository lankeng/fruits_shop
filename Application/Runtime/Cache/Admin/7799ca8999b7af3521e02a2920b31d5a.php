<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>传智商城后台</title>
	<link href="/fruits_shop/Public/css/admin.css" rel="stylesheet" />
	<script src="/fruits_shop/Public/js/jquery.min.js"></script>
</head>
<body>
<div id="top">
	<h1 class="left">传智商城 后台管理系统</h1>
	<ul class="right">
		<li>欢迎您：<?php echo (session('admin_name')); ?></li>
		<li>|</li><li><a href="/fruits_shop/" target="_blank">前台首页</a></li>
		<li>|</li><li><a href="/fruits_shop/Admin/Login/logout">退出登录</a></li>
	</ul>
</div>
<div id="main">
	<div id="menu" class="left">
		<ul><li><a href="/fruits_shop/Admin/Index/index" id="Index_index">后台首页</a></li>
			<li><a href="/fruits_shop/Admin/Goods/add" id="Goods_add">商品添加</a></li>
			<li><a href="/fruits_shop/Admin/Goods/index" id="Goods_index">商品列表</a></li>
			<li><a href="/fruits_shop/Admin/Attribute/index" id="Attribute_index">商品属性</a></li>
			<li><a href="/fruits_shop/Admin/Category/index" id="Category_index">商品分类</a></li>
			<li><a href="/fruits_shop/Admin/Recycle/index" id="Recycle_index">回收站</a></li>
			<li><a href="/fruits_shop/Admin/Member/index" id="Member_index">会员管理</a></li>
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
<div class="title">商品属性列表</div>
<div class="title-btn left"><a href="/fruits_shop/Admin/Attribute/add/cid/<?php echo ($cid); ?>">添加属性</a></div>
<div class="data-list clear">请选择商品分类：
	<select name="cid">
		<?php if(empty($category)): ?><option value="-1">未选择</option><?php endif; ?>
		<?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>" <?php if(($v["cid"]) == $cid): ?>selected<?php endif; ?> ><?php echo str_repeat('--',$v['deep']).$v['cname'];?>
</option><?php endforeach; endif; ?>
	</select>
	<table border="1">
		<tr><th>属性名</th><th>属性默认值</th><th width="120">操作</th></tr>
		<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr><td><?php echo ($v["aname"]); ?></td><td><?php echo ($v["a_def_val"]); ?></td><td class="center">
<a  href="/fruits_shop/Admin/Attribute/revise/aid/<?php echo ($v["aid"]); ?>/cid/<?php echo ($v["cid"]); ?>">修改</a> 
<a  href="/fruits_shop/Admin/Attribute/del/aid/<?php echo ($v["aid"]); ?>/cid/<?php echo ($v["cid"]); ?>">删除</a></td></tr><?php endforeach; endif; ?>
	</table>
</div>
<script>
	$("select").change(function(){
		window.location.href = "/fruits_shop/Admin/Attribute/index/cid/" + $(this).val();
	});
	$("tr:odd").addClass("odd");
</script>

</body>
</html></div>
	</div>
</div>
<script>
	$("#<?php echo (CONTROLLER_NAME); ?>_<?php echo (ACTION_NAME); ?>").addClass("curr");
</script>
</body>
</html>