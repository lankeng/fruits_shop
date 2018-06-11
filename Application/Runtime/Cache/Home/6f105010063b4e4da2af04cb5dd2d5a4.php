<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/fruits_shop/Public/css/fruit.css" />
	<link rel="stylesheet" type="text/css" href="/fruits_shop/Public/css/style.css" />
	<script src="/fruits_shop/Public/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="/fruits_shop/Public/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/fruits_shop/Public/js/jquery.banner.revolution.min.js"></script>
	<script type="text/javascript" src="/fruits_shop/Public/js/banner.js"></script>
	<title></title>
	<script type="text/javascript">
	        function deleteCurrentRow(obj){
	            var tr=obj.parentNode.parentNode;
	            var tbody=tr.parentNode;
	            tbody.removeChild(tr);
	        }
    </script>
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
				<div class="content1">
					<div class="food">
						<div class="food1">
							<p>所有食品分类</p>
						</div>
						<div class="food2">
							<ul>
								<li><a href="#">澳洲水果</a></li>
								<li><a href="#">奇异果</a></li>
								<li><a href="#">新奇士美国脐橙</a></li>
								<li><a href="#">苹果</a></li>
								<li><a href="#">澳洲水果</a></li>
								<li><a href="#">车厘子</a></li>
								<li><a href="#">热带水果</a></li>
							</ul>
						</div>
					</div>
					<div class="foodrun">
						<div class="wrapper">
							<div class="fullwidthbanner-container">
								<div class="fullwidthbanner">
									<ul>
										<li data-transition="3dcurtain-horizontal" data-slotamount="15" data-masterspeed="300">
											<img src="/fruits_shop/Public/image/slides/slide3.jpg" alt="" />									
										</li>
										<li data-transition="3dcurtain-vertical" data-slotamount="15" data-masterspeed="300" data-link="#">
											<img src="/fruits_shop/Public/image/slides/slide5.jpg" alt="" />
										</li>
										<li data-transition="papercut" data-slotamount="15" data-masterspeed="300" data-link="#">
											<img src="/fruits_shop/Public/image/slides/slide2.jpg" alt="" />
										</li>
										<li data-transition="turnoff" data-slotamount="15" data-masterspeed="300">
											<img src="/fruits_shop/Public/image/slides/slide1.jpg" alt="" />
										</li>	
										<li data-transition="flyin" data-slotamount="15" data-masterspeed="300">
											<img src="/fruits_shop/Public/image/slides/slide6.jpg" alt="" />	 
										</li>					
									</ul>
								</div>
							</div>
						</div>
						
						<div style="text-align:center;clear:both;">
						<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
						<script src="/follow.js" type="text/javascript"></script>
						</div>
					</div>
					<div class="car">
						<form action="" method="post" class="checkboxs" id="gou">
							<table cellpadding="0" cellspacing="0" id="shopcart">
									<tr>
										<th style="width: 950px;">名称</th>
										<th style="width: 120px;">价格</th>
										<th style="width: 170px;">数量</th>
										<th style="width: 130px;">小计</th>
										<th style="width: 130px;">操作</th>
									</tr>
									<?php if(is_array($cart)): foreach($cart as $key=>$v): ?><tr class="item">
										<td>
											<input type="checkbox" class="check" style="margin-left: 30px;position: relative;top: -20px;width: 15px;height: 15px;"/>
											<span class="name2">
												<?php echo ($v["gname"]); ?>
											</span>
										</td>
										<td class="num2">￥<span class="item-price"><?php echo ($v["price"]); ?></span></td>
										<td class="num2"><input class="setNum" type="button" value="-" /><input class="item-num" onkeyup="checkNum(this)" type="text" value="<?php echo ($v["num"]); ?>" name="num[]"/><input class="setNum"  type="button" value="+" /></td>
										<td class="num2"><span class="price">￥<span id="monery"></span></span><input type="hidden" id="totalPrice" name="totalPrice"/></td>
										<td class="num2"><a href="javascript:;" onclick='{if(confirm("确定要删除【订单1】这个流程吗?")) {deleteCurrentRow(this); }else {}}'><img src="/fruits_shop/Public/image/rubbish.jpg"/></a></td>
									</tr><?php endforeach; endif; ?>
							</table>
							<a href="javascript:void(0);" onclick="checkedAll()" class="btn">全选</a>
						</form>
					</div>
					<div class="car1">
						<p class="num3">商品总金额:<span style="margin-left: 50px;"><span class="price">￥<span id="monery"></span></span><input type="hidden" id="totalPrice" name="totalPrice"/></span></p><br>
						<p class="num3" style="margin-left: 20px;">优惠金额:<span style="margin-left: 50px;">￥0.00</span></p><br>
						<p class="num6">应付金额:<span class="num5"><span class="price">￥<span id="monery"></span></span><input type="hidden" id="totalPrice" name="totalPrice"/></span></p><br>
						<p class="num6">
							<span class="">
							<a href="index.html" style="color: #8A8A8A;">继续购物</a>
							</span>
							<a href="" class="subgo">结算订单</a>
						</p>
					</div>
				</div>
			</div>
			<div class="footer">
				<img src="/fruits_shop/Public/image/footer.jpg"/>
			</div>
		</div>
	</body>
	<script>
	//点击修改数量
	$(".setNum").click(function () {
		if ($(this).val() === '-') {
			if ($(this).next().val() !== '1') {
				var num = $(this).next().val() - 1;
				$(this).next().attr("value", num);
				$(this).next().val(num);
			}
		}else if ($(this).val() === '+') {
			if ($(this).prev().val() !== '100') {
				var num = parseInt($(this).prev().val()) + parseInt(1);
				$(this).prev().attr("value", num);
				$(this).prev().val(num);
			}
		}
		func();
	});
	//键盘修改数量
	function checkNum(obj) {
		//判断当前值是否合法   凡是不合法的都重置为1
		var num = $(obj).val();
		if (num <= 1 || num >= 100) {
			$(obj).val(1);
		}
		func();
	}
	//默认情况下，设置为全选状态
	$(function () {
		$(":checkbox").prop("checked", true);
		$(":checkbox").attr("checked", true);
		func();
	});
	//全选
	function checkedAll() {
		$(":checkbox").each(function () {
			if (this.checked) {
				$(this).prop("checked", false);
				$(this).attr("checked", false);
			} else {
				$(this).prop("checked", true);
				$(this).attr("checked", true);
			}
		});
		func();
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
		func();
	});
	//计算总价
	function func() {
		var price = 0;
		var num = 0;
		var totalnum = 0;
		$(".item").find(":checkbox:checked").each(function () {
			$(this).closest("tr").find(".item-num").each(function () {
				totalnum += parseInt($(this).val());
				num = parseInt($(this).val());
				$(this).closest("tr").find(".item-price").each(function () {
					price += parseInt($(this).text()) * num;
				});
			});
		});
		$("#monery").text(price);
		$("#num").text(totalnum);
		$("#totalPrice").attr("value",price);
	}
	--></script>
</body>
</html>