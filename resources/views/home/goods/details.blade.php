<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>{{$title}}</title>

		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/homes/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="/homes/css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="/homes/css/style.css" rel="stylesheet" />

		<script type="text/javascript" src="/homes/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/homes/basic/js/quick_links.js"></script>

		<script type="text/javascript" src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="/homes/js/jquery.imagezoom.min.js"></script>
		<script type="text/javascript" src="/homes/js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="/homes/js/list1.js"></script>
		<link rel="stylesheet" type="text/css" href="/homes/alerts/sweetalert.css"/>
        <script type="text/javascript" src="/homes/alerts/jquery.js"></script> 
        <script src="/homes/alerts/sweetalert.min.js"></script>
	</head>

	<body>


		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				@php 
        		$userss = DB::table("homes") -> where("hid", session("hid")) -> first();
    			@endphp
				@if($userss)
					<ul class="message-l">
						<div class="topMessage">
							<div class="menu-hd">
								<a href="/home/person" target="_top" class="h">欢迎您,{{$userss->username}}</a>&nbsp;&nbsp;<a href="/home/logout" target="_top">退出</a>
							</div>
						</div>
					</ul>
    			@else
					<ul class="message-l">
						<div class="topMessage">
							<div class="menu-hd">
								<a href="/home/login" target="_top" class="h">亲，请登录</a>
								<a href="/home/register" target="_top">免费注册</a>
							</div>
						</div>
					</ul>
				@endif

			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="/home/person" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				@php
					$count = DB::table('shopcar') -> where('hid',session('hid')) -> count();
				@endphp

				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="/home/carts" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">@if(isset($count)) {{$count}} @endif</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="/home/collection" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/homes/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/homes/images/logobig.png" /></li>
				</div>
				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<!-- <form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form> -->
					<form action="/home/search">
						<input id="searchInput" name="gname" type="text" placeholder="只要小店有的,都给你" autocomplete="off" >
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
            <b class="line"></b>
			<div class="listMain">

				<!--分类-->
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>你的小店
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="/">首页</a></li>
					<li><a href="/">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<!-- <script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script> -->
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="/homes/images/01.jpg" title="pic" />
								</li>
								<li>
									<img src="/homes/images/02.jpg" />
								</li>
								<li>
									<img src="/homes/images/03.jpg" />
								</li>
							</ul>
						</div>
					</section>
				</div>
				<!--放大镜-->
<!-- 
				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									// $(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>
							<div class="tb-booth tb-pic tb-s310">
								<a href="{{$goods->imgs}}"><img src="/homes/images/01_mid.jpg" alt="细节展示放大镜特效" rel="/homes/images/01.jpg" class="jqzoom" /></a>
							</div>

							<div class="tb-booth tb-pic tb-s310">
								<a href="{{$goods->imgs}}"><img src="{{$goods->imgs}}" alt="细节展示放大镜特效" rel="{{$goods->gims}}" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
								
								@foreach($gimg as $v)
								<li>
									<div class="tb-pic tb-s40">
										<a href="#"><img src="{{$v->gimg}}" mid="{{$v->gimg}}" big="{{$v->gimg}}"></a>
									</div>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="clear"></div>
					</div> -->
					<!-- 放大镜 开始-->
						<link rel="stylesheet" type="text/css" href="/homes/fdj/css/normalize.css" /><!--CSS RESET-->
						<link href="/homes/fdj/src/jquery.exzoom.css" rel="stylesheet" type="text/css"/>
							<style>
							    #exzoom {
							        width: 400px;
							        /*height: 400px;*/
							        margin: 20px auto;
							    }
							</style>
							<div class="item-inform">		
							<div  class="clearfixLeft" id="clearcontent" > 
								<div class="exzoom" id="exzoom">
								    <!--大图区域-->
								    <div class="exzoom_img_box">
								        <ul class='exzoom_img_ul'>
								        	@foreach($gimg as $v)
								            	<li><img src="{{$v->gimg}}"/></li>
								            @endforeach
								        </ul>
								    </div>
								    <!--缩略图导航-->
								    <center><div class="exzoom_nav"></div></center>
								    <!--控制按钮-->
								    <p class="exzoom_btn">
								        <a href="javascript:void(0);" class="exzoom_prev_btn"> &lt; </a>
								        <a href="javascript:void(0);" class="exzoom_next_btn"> &gt; </a>
								    </p>
								</div>	 
							</div>
							</div>
							
							<script src="/homes/fdj/js/jquery-1.11.0.min.js" type="text/javascript"></script>
							<script src="/homes/fdj/src/jquery.exzoom.js"></script>
						    	<script type="text/javascript">
							    $("#exzoom").exzoom({
							        autoPlay: false,
							    });//方法调用，务必在加载完后执行
							</script>
						<!-- 放大镜结束 -->
					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>	
				 				{{$goods->gname}}
	          				</h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>¥</em><b class="sys_item_price">{{$goods->price-2}}</b>  </dd>                                 
								</li>
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice">{{$goods->price}}</b></dd>									
								</li>
								<div class="clear"></div>
							</div>


							<!--销量-->
							<ul class="tm-ind-panel">
								<li class="tm-ind-item tm-ind-sellCount canClick">
									<div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">1015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">6015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count" id="ping">640</span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>

										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="" method="post">

												<div class="theme-signin-left">
													@php
														$color = $goods->color;
														$arr = explode(',',$color);												
													@endphp
													<div class="theme-options">
														<div class="cart-title">口味</div>
														<ul>
															@foreach( $arr as $v)
															<li class="sku-line leixing" leixing="{{$v}}" id="kouwei" style="margin-left: 15px">
																<input class="lx" type="radio" name="leixing"  style="display: none;">{{$v}}
																<i></i>  
															</li>
															@endforeach
														</ul>
													</div>
													<style>
														/*input[type="radio"] {
															  width: 20px;
															  height: 20px;
															}*/
													</style>
													
													<div class="theme-options">
														<div class="cart-title">包装</div>
														<!-- 遍历尺寸 -->
														@php
															$size = $goods->size;
															$arr = explode(',',$size);
															
														@endphp
														<ul>
															@foreach($arr as $v)
															<li class="sku-line size" size="{{$v}}" style="margin-left: 15px">
																<input type="radio" name="size"  style="display: none;">{{$v}}
																<i></i>
															</li>

															@endforeach
														</ul>
													</div>
													<script>
														$('.sku-line').click(function(){
															// alert('123');
															// $('#lx').prop('checked',true);
															// $(this).siblings().removeClass('selected');
															// $(this).siblings().find('input[type=radio]').prop('checked',false);
															// console.log($(this).siblings());
															// console.log($(this).siblings());

															// $(this).addClass('selected');
															$(this).find('input[type=radio]').prop('checked',true);
															// $(this).find('input[type=radio]')[0].checked = true;
															// console.log($(this).find('input[type=radio]'));
															// $(this).child().attr('checked',true);
															// $("#lx").attr('checked',true);
															// $(this).children().attr('checked',true);
														})
													</script>
													<script>
														
													</script>
													<div class="theme-options">
														<div class="cart-title number">库存</div>
														<li>
															<input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="" type="text" value="1" style="width:45px;" />
															<input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden"><span class="jianshu" value="{{$goods->stock}}">{{$goods->stock}}</span>件</span>
														</li>

													</div>
													<!-- 库存问题 -->

													<script>
														//先获取库存
														var stock = $('.jianshu').html();
														// console.log(stock);
														//转换int类型
														var bian2 = parseInt(stock);
														//点击+号 触发函数
														$("#add").click(function(){
															// alert(123);
															//获取中间框的值
															bian = $('#text_box').val();
															//装换类型 再+2
															bian1 = parseInt(bian)+2;
															// console.log(parseInt(bian)+1);
															//如果 中间的值大于> 库存值
															if(bian1 > bian2){
																// alert(123);
																//把中间的值固定到库存数  
																$("#text_box").val(bian2-1);
															}
														
														})

														
													</script>
		
													<script>
														// 获取库存的件数
														var b = $(".jianshu").text();
														// $('#add').removeAttr('disabled');
														// console.log(b);
														$("#text_box").change(function(){
															// console.log(b)
															a = $(this).val()
															// console.log(a);
															c = parseInt(a);
															d = parseInt(b);
															// console.log(typeof(c));
															// console.log(typeof(d));
															if(c > d){
																// alert(123);
																$(this).val(d);
																// alert('小店的库存可能不够啦');
																 swal("OMG!", "小店的库存可能不够啦", "error");
																// $('#add').attr('disabled',true);
																// $('#min').removeAttr('disabled');
															}
														})
													</script>
													<div class="clear"></div>

													<div class="btn-op">
														<div class="btn am-btn am-btn-warning">确认</div>
														<div class="btn close am-btn am-btn-warning">取消</div>
													</div>
												</div>
												<div class="theme-signin-right">
													<div class="img-info">
														<img src="/homes/images/songzi.jpg" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥39.00</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
													</div>
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">店铺优惠</dt>
									<div class="gold-list">
										<p>购物满2件打8折，满3件7折<span>点击领券<i class="am-icon-sort-down"></i></span></p>
									</div>
								</div>
								<div class="clear"></div>
								<div class="coupon">
									<dt class="tb-metatit">优惠券</dt>
									<div class="gold-list">
										<ul>
											<li>不好意思.....</li>
											<!-- <li>敬请期待</li> -->
											<li>程序员正在努力</li>
											
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pay">
							<div class="pay-opt">
							<a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a><span class="am-icon-heart am-icon-fw">收藏</span></a>
							
							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="javascript:void(0);">立即购买</a>
								</div>
							</li>
							@if(session('hid'))
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" href="javascript:void(0);"><i></i>加入购物车</a>
									<input type="hidden" name="id" value="{{$goods->id}}">
								</div>
							</li>
							@else
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket2" title="加入购物车" href="javascript:void(0);"><i></i>加入购物车</a>
								</div>
							</li>
							@endif
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy2" title="点此加入收藏" href="javascript:void(0);">加入收藏</a>
								</div>
							</li>
						</div>
					</div>

					<div class="clear"></div>

				</div>
				<!--优惠套装-->
				<div class="match">
					<div class="match-title">优惠套装</div>
					<div class="match-comment">
						<ul class="like_list">
							@foreach($cuxiao as $v)
							@if($v->status == 2)
							<li style="margin: 15px">
								<div class="s_picBox">
									<a class="s_pic" href="/home/details?id={{$v->id}}"><img src="{{$v->imgs}}" width="160px" height="160px"></a>
								</div> <a class="txt" target="_blank" href="/home/details?id={{$v->id}}">风味特产小吃</a>
								<div class="info-box"> <span class="info-box-price">¥ {{$v->price}}</span> <span class="info-original-price">￥ 199.00</span> </div>
							</li>
							@endif
							@endforeach
							<!-- <li class="plus_icon"><i>+</i></li> -->
							<!-- <li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="/homes/images/cp2.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">ZEK 原味海苔</a>
								<div class="info-box"> <span class="info-box-price">¥ 8.90</span> <span class="info-original-price">￥ 299.00</span> </div>
							</li> -->
							<!-- <li class="plus_icon"><i>=</i></li>
							<li class="total_price">
								<p class="combo_price"><span class="c-title">套餐价:</span><span>￥35.00</span> </p>
								<p class="save_all">共省:<span>￥463.00</span></p> <a href="#" class="buy_now">立即购买</a> </li>
							<li class="plus_icon"><i class="am-icon-angle-right"></i></li> -->
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						    <ul >					    
						     	<div class="mt">            
						            <h2>看了又看</h2>        
					            </div>
						     	
<!-- 							    <li class="first">
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="/homes/images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							    </li>	 -->
							    @foreach($likes as $v)			      
							    <li>
							      	<div class="p-img">                    
							      		<a  href="/home/details?id={{$v->id}}"> <img class="" src="{{$v->imgs}}"> </a>               
							      	</div>
							      	<div class="p-name"><a href="/home/details?id={{$v->id}}">
							      		{{$v->gname}}
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥{{$v->price}}</strong></div>
							    </li>	
							    @endforeach						      
						    </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">
										<span class="index-needs-dt-txt">宝贝详情</span></a>
								</li>

								<li>
									<a href="#">
										<span class="index-needs-dt-txt">全部评价</span></a>
								</li>
								<li>
									<a href="#">
										<span class="index-needs-dt-txt">猜你喜欢</span></a>
								</li>
							</ul>
							<div class="am-tabs-bd">

								<div class="am-tab-panel am-fade am-in am-active">
									<div class="J_Brand">

										<div class="attr-list-hd tm-clear">
											<h4>产品参数：</h4></div>
										<div class="clear"></div>
										<ul id="J_AttrUL">
											<li title="">产品名称:&nbsp;{{$goods->gname}}</li>
											<li title="">原料产地:&nbsp;巴基斯坦</li>
											<li title="">产地:&nbsp;湖北省武汉市</li>
											<li title="">配料表:&nbsp;进口松子、食用盐</li>
											<li title="">产品规格:&nbsp;210g</li>
											<li title="">保质期:&nbsp;180天</li>
											<li title="">产品标准号:&nbsp;GB/T 22165</li>
											<li title="">生产许可证编号：&nbsp;QS4201 1801 0226</li>
											<li title="">储存方法：&nbsp;请放置于常温、阴凉、通风、干燥处保存 </li>
											<li title="">食用方法：&nbsp;开袋去壳即食</li>
										</ul>
										<div class="clear"></div>
									</div>

									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节</h4>
										</div>
										<div class="twlistNews">
											{!!$goods->content!!}
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="am-tab-panel am-fade">
									
                                    <div class="actor-new">
                                    	<div class="rate">                
                                    		<strong id="onee">100<span>%</span></strong><br> <span>好评度</span>            
                                    	</div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                    			<q class="comm-tags"><span>味道不错</span><em>(21)</em></q>
                                    			<q class="comm-tags"><span>颗粒饱满</span><em>(186)</em></q>
                                    			<q class="comm-tags"><span>口感好</span><em>(182)</em></q>
                                    			<q class="comm-tags"><span>商品不错</span><em>(168)</em></q>
                                    			<q class="comm-tags"><span>香脆可口</span><em>(148)</em></q>
                                    			<q class="comm-tags"><span>个个开口</span><em>(192)</em></q>
                                    			<q class="comm-tags"><span>价格便宜</span><em>(119)</em></q>
                                    			<q class="comm-tags"><span>特价买的</span><em>(85)</em></q>
                                    			<q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>	
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num" id="all">(32)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-1">
												<div class="comment-info">
													<span>好评</span>
													<span class="tb-tbcr-num" id="a">(32)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-0">
												<div class="comment-info">
													<span>中评</span>
													<span class="tb-tbcr-num" id="b">(32)</span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li--1">
												<div class="comment-info">
													<span>差评</span>
													<span class="tb-tbcr-num" id="c">(32)</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>
									<!-- 如果商品的id == 评论的gid 显示数据 -->	
									@foreach($comment as $cv)
										<!-- 遍历评论表 -->
									@if($goods->id == $cv->gid)
									<ul class="am-comments-list am-comments-list-flip">
										<li class="am-comment">
											<!-- 评论容器 -->
											<!-- <a href="">
												<img class="am-comment-avatar" src="/homes/images/hwbn40x40.jpg" />											
											</a> -->
											<!-- 遍历用户表 -->
											@foreach($user as $uv)
												@if($uv->hid == $cv->uid)
													<a href="javascript:void(0)">
													<img class="am-comment-avatar" src="{{$uv->pic}}" />
													<!-- 评论者头像 -->
													</a>
												@endif
											@endforeach
											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<!-- 遍历用户表 -->
														@foreach($user as $uv)
															 @if($uv->hid == $cv->uid)
																<a href="#link-to-user" class="am-comment-author">{{$uv->username}}(匿名)</a>
																<!-- 评论者 -->
															@endif
														@endforeach
														评论于
														<time datetime="">{{$cv->addtime}}</time>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														@if($cv->star == 2)
															<span class="hao">好评</span>
														@elseif($cv->star == 1)
															<span class="zhong" >一般</span>
														@else
															<span class="cha" >差评</span>
														@endif
													</div>
												</header>
												<!-- 评论内容 -->
												
												<div class="am-comment-bd" id="commt">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content" style="font-size: 20px;">
															{{$cv->content}}
														</div>
														@foreach($order as $ov)
														@if($cv->oid == $ov ->oid)
														<div class="tb-r-act-bar" style="color:skyblue;margin-top: 20px;">
															口味:{{$ov->leixing}}&nbsp;&nbsp;数量:{{$ov->cnt}}件&nbsp;&nbsp;规格：{{$ov->size}}<br>
															商品名称: {{$goods->gname}}
														</div>
														@endif
														@endforeach
													</div>
												</div>
											</div>
										</li>
										
									</ul>
									<!-- <img src="/homes/comment/comment.gif" alt=""> -->
									@endif
									@endforeach
																<!-- 没有找到商品的页面			 -->
								<div class="cart-empty" style="display:none;margin-top:150px;margin-bottom:150px;  margin-left:100px;">
								    <div class="message">
								        <ul>
								            <li class="txt"	style="font-size:25px;font-family:华文彩云;">
								                还没有评论~，您来就是第一个~
								            </li>
								            <br>
								            <br>
								            <li class="mt10" style="margin-top:15px;">
								                <img src="/homes/comment/comment.gif" alt="">
								            </li>  
								        </ul>
								   	</div>
								</div>
								<script>
									 
								   function foots()
								   {
								   		// 没有找到评论的时候
								   		var num = $("#commt").length;
								   		// console.log(num);
								   		// 当商品的长度为0时
								   		if(num == 0){
								   			//
								   			$('.cart-empty').show();
								   			$("#commt").hide;
								   		}
								   }
								   foots();
								</script>
								<script>
									//好评
									hao= $(".hao").length;
									hao1 = '('+hao+')';
									$('#a').text(hao1);
									//中评
									zhong = $(".zhong").length;
									$('#b').text('('+zhong+')')
									//差评
									cha = $(".cha").length;
									$('#c').text('('+cha+')');
									//全部评论
									num = hao+zhong+cha;
									// console.log(num);
									$("#all").text('('+num+')');
									$("#ping").text(num);
									//好评度
									// var d =  (hao / num * 100).toFixed(0);
									//小数点后没有小数
									var e =  (hao / num * 100).toFixed(0);
									var d = e;
									// var e = hao / num * 100;
									// var d = e.toFixed(0);
									// var dd = round(d);
									// console.log(d);
									 // num
									 //如果d 不等于NaN 那么 
									if(d !== 'NaN'){
										$('#onee').text(d+'%');
									}else{
										$('#onee').text(100+'%');
									}
									
									// $('#twoo').text(%);
								</script>
								<!-- <script>
									
									d =  (num / hao) * 100;
									// console.log(d);
									$('#onee').text(d);
									$('#twoo').text(%);

								</script> -->
									<!-- <img src="/homes/comment/comment.gif" alt=""> -->
									<div class="clear"></div>
									<!-- 评价的分页 -->
									<!--分页 -->
									<!-- <ul class="am-pagination am-pagination-right"> -->
										<!-- <li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li> -->
										
									<!-- </ul> -->
									

									<div class="clear"></div>
									<!-- <div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div> -->
								</div>
								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
											@foreach($likes as $v)
											<li style="margin: 10px;">
												<div class="i-pic limit">
													<a href="/home/details?id={{$v->id}}">
													<img src="{{$v->imgs}}" width="212px" height="212px" />											
													
													<div class="p-name" style="margin-top: 30px">
							      					<h5>{{$v->gname}}</h5> 	
											    </div>
											</a>
							      	<div class="p-price">￥{{$v->price}}</strong></div>
												</div>
											</li>
											@endforeach
										</ul>
									</div>
									<div class="clear"></div>
									<!--分页 -->
									<!-- <ul class="am-pagination am-pagination-right">
										<li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									<div class="clear"></div> -->
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="footer">
							<div class="footer-hd">
								<p>
									@foreach($link as $v)
									<a href="{{$v->lurl}}" title="">
									<img src="{{$v->lpic}}" alt="" width="23px" height="23px" title="{{$v->lname}}">
									{{$v->lname}}</a>
									<b>|</b>
									@endforeach
								</p>
							</div>
							<div class="footer-bd">
								<p>
									<a href="#">关于我们</a>
									<a href="javascript:void(0)">合作伙伴</a>
									<a href="javascript:void(0)">联系我们</a>
									<a href="javascript:void(0)">网站地图</a>
									<em>© 2015-2025 Hengwang.com 版权所有.  <a href="/" title="淘点货"淘点货</a> - Collect from <a href="/" title="网页模板" target="_blank">更多商品</a></em>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--菜单 -->
			<div class=tip>
				<div id="sidebar">
					<div id="wrap">
						<div id="prof" class="item">
							<a href="#">
								<span class="setting"></span>
							</a>
							@php 
			        		$userss = DB::table("homes") -> where("hid", session("hid")) -> first();
			    			@endphp
							@if($userss)
							<div class="ibar_login_box status_login">
								<div class="avatar_box">
									<p class="avatar_imgbox"><img src="{{$userss->pic}}" height="80px" width="80px"></p>
									<ul class="user_info">
										@if($userss->integral == 0)
										<li style="font-size:25px;">{{$userss->username}}</li>
										<li>级&nbsp;别：普通会员</li>
										@elseif($userss->integral == 10)
										<li style="color:#cc0;font-size:25px;">{{$userss->username}}</li>
										<li style="color:#cc0;">级&nbsp;别：铜牌会员</li>
										@elseif($userss->integral == 20)
										<li style="color:#ccc;font-size:25px;">{{$userss->username}}</li>
										<li style="color:#ccc;">级&nbsp;别：银牌会员</li>
										@elseif($userss->integral == 30)
										<li style="color:yellow;font-size:25px;">{{$userss->username}}</li>
										<li style="color:yellow;">级&nbsp;别：金牌会员</li>
										@else
										<li style="color:red;font-size:25px;">{{$userss->username}}</li>
										<li style="color:red;">级&nbsp;别：钻石会员</li>
										@endif
									</ul>
								</div>
								<div class="login_btnbox">
									<a href="/home/order" class="login_order">我的订单</a>
									<a href="/home/collection" class="login_favorite">我的收藏</a>
								</div>
								<i class="icon_arrow_white"></i>
							</div>
							@endif
						</div>
						<div id="shopCart" class="item">
							<a href="/home/carts">
								<span class="message"></span>
							</a>
							<p class="cartss">
								购物车
							</p>
							<p class="cart_num">{{$count}}</p>
						</div>
						<div id="asset" class="item">
							<a href="javascript:void(0)">
								<span class="view"></span>
							</a>
							<div class="mp_tooltip">
								我的资产
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="foot" class="item">
							<a href="/home/footprint">
								<span class="zuji"></span>
							</a>
							<div class="mp_tooltip">
								我的足迹
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="brand" class="item">
							<a href="/home/collection">
								<span class="wdsc"><img src="/homes/images/wdsc.png" /></span>
							</a>
							<div class="mp_tooltip">
								我的收藏
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="broadcast" class="item">
							<a href="javascript:void(0)">
								<span class="chongzhi"><img src="/homes/images/chongzhi.png" /></span>
							</a>
							<div class="mp_tooltip">
								我要充值
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div class="quick_toggle">
							<li class="qtitem">
								<a href="javascript:void(0)"><span class="kfzx"></span></a>
								<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
							</li>
							<!--二维码 -->
							<li class="qtitem">
								<a href="#none"><span class="mpbtn_qrcode"></span></a>
								<div class="mp_qrcode" style="display:none;"><img src="/homes/images/weixin_code_145.png" /><i class="icon_arrow_white"></i></div>
							</li>
							<li class="qtitem">
								<a href="#top" class="return_top"><span class="top"></span></a>
							</li>
						</div>

						<!--回到顶部 -->
						<div id="quick_links_pop" class="quick_links_pop hide"></div>

					</div>

				</div>
				<div id="prof-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						我
					</div>
				</div>
				<div id="shopCart-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						购物车
					</div>
				</div>
				<div id="asset-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						资产
					</div>

					<div class="ia-head-list">
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">优惠券</div>
						</a>
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">红包</div>
						</a>
						<a href="#" target="_blank" class="pl money">
							<div class="num">￥0</div>
							<div class="text">余额</div>
						</a>
					</div>

				</div>
				<div id="foot-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						足迹
					</div>
				</div>
				<div id="brand-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						收藏
					</div>
				</div>
				<div id="broadcast-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						充值
					</div>
				</div>
			</div>

	</body>

</html>
<script type="text/javascript">
	$('.cartss').bind('click',function(){
		location.href="/home/carts";
	})

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var leixing = '';
	var size = '';
	// 获取类型
	$(".leixing").click(function(){
		leixing = $(this).attr('leixing');
		// alert(leixing)
	});

	// 获取size大小
	$(".size").click(function(){
		size = $(this).attr('size');
		// alert(size);
	});

	id = $("input[name=id]").val();

	// 判断是否有登陆
	$("#LikBasket2").click(function(){
		alert('请先去登陆...');
		location.href="/home/login";
	})

	// 拿到商品信息加入购物车
	$("#LikBasket").click(function(){
		if(!(leixing && size)){
			// alert('请选择商品参数');
			swal("OMG!", "请先选择商品参数", "error");

			return false;
		}
		// 获取购买的数量
		var num = $("#text_box").val();

		// 使用ajax get方式加入购物车
		$.get('/home/addCar',{id:id,num:num,leixing:leixing,size:size},function(data){
			if (data == 1) {
				alert('添加成功,快去购物车看看吧');
			}else{
				alert('添加失败,请重新选择商品');
			}
		});
		// window.location.href="/home/addCar?id="+id+"&num="+num+"&leixing="+leixing+"&size="+size;
	});

	// 拿到商品的信息加入收藏
	$("#LikBuy2").click(function(){
		$.post('/home/shoucang',{gid:id},function(data){
			if(data == 2){
				alert('该商品已经在我的收藏中了...');
			}else if(data == 1){
				alert('收藏成功,小的就在收藏中等您了.')
			}else{
				 alert('收藏失败,请先去登陆.');
			}
		})
	})

	// 拿到商品信息立即购买进入付款页面
	$("#LikBuy").click(function(){
		if(!(leixing && size)){
			alert('请先选择商品参数');
			// swal("OMG!", "请先选择商品参数", "error");
			return false;
		}
		// 获取购买的数量
		var num = $("#text_box").val();

		window.location.href="/home/liGo?id="+id+"&num="+num+"&leixing="+leixing+"&size="+size;
	})
</script>