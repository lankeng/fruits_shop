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
<link href="/fruits_shop/Public/ueditor/themes/default/css/umeditor.min.css" rel="stylesheet" />
<script src="/fruits_shop/Public/ueditor/third-party/jquery.min.js"></script>
<script src="/fruits_shop/Public/ueditor/umeditor.config.js"></script>
<script src="/fruits_shop/Public/ueditor/umeditor.min.js"></script>
<script src="/fruits_shop/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(function () {
        UM.getEditor('myEditor');
    });
</script>
</head>
<body>
<div class="title">商品添加 - <?php echo ($cname); ?></div>
<div class="data-edit clear">
	<form method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo ($cid); ?>" name="cid" />
	<table>
		<tr><th>商品名：</th><td><input type="text" name="gname" /></td></tr>
		<tr><th>商品编号：</th><td><input type="text" name="identifier" /></td></tr>
		<tr><th>商品价格：</th><td><input type="text" name="price" /></td></tr>
		<tr><th>商品库存：</th><td><input type="text" name="stock"/></td></tr>
		<tr><th>商品图片：</th><td><input type="file" name="thumb" class="file" /></td></tr>
		<tr><th>是否上架：</th><td><select name="status"><option value="yes">是</option><option value="no">否</option></select></td></tr>
		<tr><th>首页推荐：</th><td><select name="is_best"><option value="no">否</option><option value="yes">是</option></select></td></tr>
		<tr><th>商品描述：</th><td><script type="text/plain" id="myEditor" name="description"><p>这里我可以写一些输入提示</p></script></td></tr>
		<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr><th><?php echo ($v["aname"]); ?>：</th><td><?php if(isset($v["a_def_val"]["1"])): ?><select name="attr[<?php echo ($v["aid"]); ?>]">
					<option value="0">未选择</option>
					<?php if(is_array($v["a_def_val"])): foreach($v["a_def_val"] as $key=>$vv): ?><option value="<?php echo ($vv); ?>"><?php echo ($vv); ?></option><?php endforeach; endif; ?>
				</select>
			<?php else: ?>
				<input type="text" name="attr[<?php echo ($v["aid"]); ?>]" value="<?php echo ($v["a_def_val"]["0"]); ?>" /><?php endif; ?></td></tr><?php endforeach; endif; ?>
		<tr class="tr_btn center">
			<td colspan="2"><input type="submit" value="确定" /><input type="reset" value="重置" /></td>
		</tr>
	</table>
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