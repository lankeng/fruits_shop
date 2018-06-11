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
<div class="title">商品回收站列表</div>
<div class="data-list clear">请选择商品分类：
    <select name="cid">
        <option value="0">全部</option>
        <?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>" <?php if(($v["cid"]) == $cid): ?>selected<?php endif; ?> ><?php echo str_repeat('--',$v['deep']).$v['cname'];?></option><?php endforeach; endif; ?>
    </select>
    <table border="1">
        <form action="/fruits_shop/Admin/Recycle/undelSelect/cid/<?php echo ($cid); ?>" method="post">
            <tr><th width="120">商品编号</th><th>商品名</th><th width="140">操作</th></tr>
            <?php if(is_array($goods["list"])): foreach($goods["list"] as $key=>$v): ?><tr><td><input type="checkbox" name="gid[]" value="<?php echo ($v["gid"]); ?>" /><?php echo ($v["identifier"]); ?></td>
                    <td><?php echo ($v["gname"]); ?></td>
                    <td class="center"><a href="/fruits_shop/Admin/Recycle/undel/gid/<?php echo ($v["gid"]); ?>/cid/<?php echo ($cid); ?>">还原</a> <a href="/fruits_shop/Admin/Goods/revise/gid/<?php echo ($v["gid"]); ?>/cid/<?php echo ($cid); ?>" target="_blank" >修改</a> <a href="/fruits_shop/Admin/Recycle/del/gid/<?php echo ($v["gid"]); ?>/cid/<?php echo ($cid); ?>">删除</a></td>
                </tr><?php endforeach; endif; ?>
            <tr>
                <td colspan="2"><a href="#" onclick="checkedAll()">全选</a> <a href="#" onclick="notCheckedAll()">全不选</a> <a href="#" onclick="checkedOthers()">反选</a></td>
                <td colspan="3"><input type="submit" value="批量还原" /></td>
            </tr>
        </form>
    </table>
    <div class="pagelist"><?php echo ($goods["page"]); ?></div>
</div>
<script>
    $("select").change(function () {
        window.location.href = "/fruits_shop/Admin/Recycle/index/cid/" + $(this).val();
    });
    $(function () {
        $("tr:odd").addClass("odd");
    });

    //全选
    function checkedAll() {
        $(":checkbox").each(function () {
            $(this).prop("checked", true);
            $(this).attr("checked", true);
        });
    }
    //全不选
    function notCheckedAll() {
        $(":checkbox").each(function () {
            $(this).prop("checked", false);
            $(this).attr("checked", false);
        });
    }
    //反选
    function checkedOthers() {
        $(":checkbox").each(function () {
            if (this.checked) {
                $(this).prop("checked", false);
                $(this).attr("checked", false);
            } else {
                $(this).prop("checked", true);
                $(this).attr("checked", true);
            }
        });
    }
    //单个选择时的状态设置
    $(".check").click(function () {
        $(this).each(function (i, v) {
            if (!v.checked) {
                $(this).prop("checked", false);
                $(this).attr("checked", false);
            } else {
                $(this).prop("checked", true);
                $(this).attr("checked", true);
            }
        });
    });
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