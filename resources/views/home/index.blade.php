@extends('layout.homes')

@section('title',$title)

@section('content')
	
			<div class="banner">
              <!--轮播 -->
				<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
					<ul class="am-slides">
						@foreach($lunbo as $k => $v)
						<li class="banner1"><a href="{{$v->url}}"><img src="{{$v->pic}}" /></a></li>
						@endforeach
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="shopNav">
				<div class="slideall">
			        
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
						<!-- 引入静态方法 -->
	        			@php
							use App\Http\Controllers\Home\HomeController;

							$res = HomeController::getCateMessage(0);
						@endphp

						<!--侧边导航 -->
						<!-- 遍历分类 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">						
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											@foreach($res as $v )
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/homes/images/bamboo.png"></i><a class="ml-22" title="点心">{{$v->title}}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														
														<div class="area-bg">
															
															<div class="menu-srot">
																
																<div class="sort-side">
																	@foreach($v->sub as $vv)
																	<dl class="dl-sort">
																		<dt><span title={{$vv->id}}>{{$vv->title}}</span></dt>
																		@foreach($vv->sub as $vvv)
																		<dd><a title="{{$vvv->title}}" href="/homes/search?cid={{$vvv->id}}"><span>{{$vvv->title}}</span></a></dd>
																		@endforeach
																	</dl>
																	@endforeach
																</div>														
															</div>															
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
											@endforeach
										</ul>
									</div>
								</div>

							</div>
						</div>
						<!--轮播 -->
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>


					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/homes/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/homes/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/homes/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/homes/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						
						<div class="mod-vip">
						@php 
    					$user = DB::table("homes") -> where("hid", session("hid")) -> first();
						@endphp
						@if($user)
						<div class="m-baseinfo">
							<a href="/home/person">
								<img src="{{$user->pic}}">
							</a>
							<em>
								Hi,<span class="s-name">{{$user->username}}</span>
								<a href="#"><p>点击更多优惠活动</p></a>									
							</em>
						</div>
						
						
						<div class="member-logout">
							<a class="am-btn-warning btn" style="width:200px;" href="/home/person">欢迎您,{{$user->username}}</a>
						</div>
    					@else
    					<div class="m-baseinfo">
							<a href="#">
								<img src="/homes/images/getAvatar.do.jpg">
							</a>
							<em>
								Hi,<span class="s-name">请登录~</span>
								<a href="#"><p>点击更多优惠活动</p></a>									
							</em>
						</div>
						<div class="member-logout">
								<a class="am-btn-warning btn" href="/home/login">登录</a>
								<a class="am-btn-warning btn" href="/home/register">注册</a>
						</div>
						@endif
							<span class="marqueen-title">商城头条</span>
						<div class="demo">
							<ul id="news">
								@foreach($news as $news_v)							    
								<li ><a target="_blank" href="JavaScript:viod(0)"><span style="color:red">[{{$news_v->title}}]</span>{{$news_v->content}}</a></li>
								@endforeach
							</ul>
                        	<div class="advTip"><img src="/homes/images/advTip.jpg"/></div>
						</div>
					</div>
					<!-- 新闻滚动 -->
					<script>
						//setinterval
						setInterval(function(){
							//最后一个慢慢隐藏插入到第一条 
							$('#news li').last().hide().slideDown(2000).prependTo('#news');
						},3500);
					</script>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" ">
							<img src="/homes/images/566.png" style="margin-top: -15px;margin-right: 5px;" width="245px" height="145px"></img>
							<p>今日<br><br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain ">
								<a href=""><img src="/homes/images/tj.png "></a>
							</div>
						</div>						
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain ">
								<img src="/homes/images/tj1.png "></img>
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain ">
								<img src="/homes/images/tj2.png "></img>
							</div>
						</div>

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a class="more-link " href="# ">全部活动</a>
                            </span>
						</div>
					 	
					  <div class="am-g am-g-fixed ">
						 @foreach ($homeadv as $k => $v)
						<div class="am-u-sm-3 ">
							<div class="icon-sale one " ></div>
								<h4 style="font-weight:900;"> {{$v->title}} </h4>							
							<div class="activityMain">
								<img src="{{$v->pic}}"></img>
							</div>
							<!-- <div class="info " style="background:orange;">
								<h3 >春节送礼优选</h3>
							</div>	 -->													
						</div>
						@endforeach													
					  </div> 
                   </div>
					<div class="clear "></div>

					<!-- 遍历 分类表 -->
                 	
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>小店的存货都在这....</h4>
							<h3>你是我的优乐美么？不，我是你小鱼干</h3>
							<div class="today-brands ">								
							</div>
							<span class="more ">
                    <a class="more-link " href="# ">就这些啦......^_^</a>
                        </span>
						</div>
					</div>
					<div class="am-g am-g-fixed flood method3 ">
						<ul class="am-thumbnails ">
							<!-- 遍历商品表 -->
							@foreach($goods as $v)
								@if($v->status == 1)								
									<li style="margin-left: 35px;margin-top: 6px;">
										<div class="list " >
											<a href="/home/details?id={{$v->id}}">
												<img src="{{$v->imgs}}"  width="188px" height="188px"  / >
												<div class="pro-title ">{{$v->gname}}</div>
												<span class="e-price ">￥{{$v->price}}</span>	
											</a>
										</div>
									</li>
								@endif									
							@endforeach
						</ul>

					</div>
					
					
@stop

@section('js')

@stop

					