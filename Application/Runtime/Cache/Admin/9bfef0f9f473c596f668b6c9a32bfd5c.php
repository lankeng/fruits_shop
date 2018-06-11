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
<div class="title">商品分类列表</div>
<div class="title-btn left"><a href="/fruits_shop/Admin/Category/add">添加分类</a></div>
<div class="data-tree clear">
	<?php function getdiv(&$list, $p_id=0){ ?>
	<?php if(is_array($list)): foreach($list as $key=>$v): if(($v["pid"]) == $p_id): ?><div><?php echo ($v["cname"]); ?> <a href="#" onclick="add_line(this,<?php echo ($v["cid"]); ?>)">添加</a> <a 
href="/fruits_shop/Admin/Category/revise/cid/<?php echo ($v["cid"]); ?>">修改</a> <a href="#"
onclick="del(this,<?php echo ($v["cid"]); ?>)">删除</a>
				<?php getdiv($list, $v['cid']);?>
			</div><?php endif; endforeach; endif; ?>
	<?php }getdiv($data);?>
</div>
<script>
	$(".data-tree").on("click","#new_div :button",function(){
		var cname = $("#new_cname").val();
		var pid = $("#new_pid").val();
		var div = $(this);
		$.post("/fruits_shop/Admin/Category/addAjax",{cname: cname, pid: pid},function(msg){
			if (msg === false) {alert('添加失败');return false;}
			var html = "<div>" + cname;
			html += ' <a href="#" onclick="add_line(this,'+msg+')">添加</a> ';
			html += '<a href="/fruits_shop/Admin/Category/revise/cid/'+msg+'")">修改</a> ';
			html += '<a href="#" onclick="del(this,'+msg+')">删除</a></div>';
			div.parent().parent().append(html);
			div.parent().remove();
        },'json');
	});
	function add_line(obj, id){
		var html = '<div id="new_div">子分类：<input type="text" id="new_cname" />';
		html += '<input type="button" value="提交" />';
		html += '<input type="hidden" value="'+id+'" id="new_pid" /></div>';
		if($("#new_div").val()===undefined){
			$(obj).parent().append(html);
			$("#new_cname").focus();
		}else{
			$("#new_div").remove();
		}
	}
	function del(obj, id) {
		$.get("/fruits_shop/Admin/Category/remove", {cid: id}, function (msg) {
			if (msg.flag === true) {
				$(obj).parent().remove();
			}else{
				alert(msg.msg);
			}
		}, "json");
	}
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