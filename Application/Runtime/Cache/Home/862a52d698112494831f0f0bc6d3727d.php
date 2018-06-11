<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/fruits_shop/Public/css/fruit.css" />
	<title></title>
</head>
<body>
<div class="page">
			<div class="header">
				<div class="head">
					<div class="headleft">
						<span class="cha1">Vegetables & Fruits & Beverage </span>
						<span class="cha2">
							百果园
						</span>
						<?php if(isset($mid)): echo ($mname); ?>，欢迎来到百果园！[<a href="/fruits_shop/Home/User/logout">退出</a>]
						<?php else: ?>
						<span class="cha3">
							<a href="/fruits_shop/Home/User/login" style="color: darkgray;">登录</a>
						</span>
						<span class="cha4">
							|
						</span>
						<span class="cha5">
							<a href="/fruits_shop/Home/User/register" style="color: darkgray;">注册</a>
						</span><?php endif; ?>
					</div>
					<div class="headright">
						<a href="car.html"><img src="/fruits_shop/Public/image/mycar.jpg"/></a>
					</div>
				</div>
				<div class="nav">
					<ul>
						<li><a href="/fruits_shop/">首页</a></li>
						<li><a href="#">进口水果</a></li>
						<li><a href="#">新鲜蔬菜</a></li>
						<li><a href="#">健康搭配</a></li>
						<li><a href="#">特价专场</a></li>
					</ul>
					
				</div>
				<div class="">
					<form >						
						<input type="text" value="  新鲜水果" class="search"/>
					</form>
				</div>
			</div>
			<div class="content">
				<div class="detail1">
					<?php if(empty($goods["thumb"])): ?><img src="/fruits_shop/Public/image/preview2.jpg"  style="width:456px;height:300px;"/><?php else: ?><img src="/fruits_shop/Public/uploads/<?php echo ($goods["thumb"]); ?>"  style="width:456px;height:300px;"/><?php endif; ?>
				</div>	
				<div class="detail2">
					<div class="detail3">
						<p class="name1"><?php echo ($goods["gname"]); ?></p><br>
						<hr style="width: 800px;border: 1px dashed #A9A9A9;">
						<div  class="info left">
							<table>
								<tr>
									<th>售价：</th>
									<td>
										<span class="picenum2">
											￥<?php echo ($goods["price"]); ?>
										</span>
										<span class="picenum3">
											￥18.00
										</span>
									</td>
								</tr>
								<tr style="line-height: 30px">
									<th>商品编号：</th>
									<td><?php echo ($goods["identifier"]); ?></td>
								</tr>
								<tr style="line-height: 30px">
									<th>累计销量：</th>
									<td>1000</td>
								</tr>
								<tr style="line-height: 30px">
									<th>评价：</th>
									<td>1000</td>
								</tr>
								<tr style="line-height: 30px">
									<th>配送至：</th>
									<td>北京（免运费）</td>
								</tr>
								<tr style="line-height: 30px">
									<th>购买数量：</th>
									<td>
										<input type="button" value="-" class="cnt-btn" />
										<input type="text" value="1" id="num" class="num-btn" />
										<input type="button" value="+" class="cnt-btn" />
									</td>
								</tr>
								<tr>
									<td><a href="" class="resist" onclick="addCart()"><img src="/fruits_shop/Public/image/car.jpg"/>加入购物车</a></td>
									<td><a href="" class="buy">立即购买</a></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<img src="/fruits_shop/Public/image/footer.jpg"/>
			</div>
		</div>
<script>
	//购买数量加减
	$(".cnt-btn").click(function(){
		var num = parseInt($("#num").val());
		if ($(this).val() === '-') {
			if ( num=== 1) return;
			$("#num").val(num-1);
		}else if ($(this).val() === '+') {
			if (num === <?php echo ($goods["stock"]); ?>) return;
			$("#num").val(num+1);
		}
	});
	//自动纠正购买数量
	$("#num").keyup(function(){
		var num = parseInt($(this).val());
		if(num<1){ 
			$(this).val(1);
		}else if(num > <?php echo ($goods["stock"]); ?>){
			$(this).val(<?php echo ($goods["stock"]); ?>);
		}
	});
	//添加购物车
	function addCart(){
		var num = $("#num").val();
		window.location.href = '/fruits_shop/Home/Cart/add/gid/<?php echo ($gid); ?>/num/'+num;
	}
</script>
</body>
</html>