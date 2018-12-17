@extends('layout.person')

@section('title',$title)

@section('content')
			@if(session('success'))
					
	                <div class="mws-form-message success">
	                    <cenetr><li style='list-style:none;font-size:20px;text-align: center;'>{{session('success')}}</li></cneter>
	                </div>

            @endif

            @if(session('error'))
                <div class="mws-form-message error">
                    <li style='list-style:none;font-size:20px;text-align: center;'>{{session('error')}}</li>
                </div>
            @endif
            <script>
   				 $('.mws-form-message').delay(1000).fadeOut(2000);
			</script>
<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
								<li><a href="#tab2">交易完成</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>
									<!-- 所有订单 -->
									<div class="order-main">
										<div class="order-list">
											
											<!--交易成功-->
											@foreach ($data as $k=>$v)
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<input type="hidden" name="" id="shanchu" oid="{{$v->oid}}">
													<span>成交时间：{{$v->addtime}}</span>
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="/home/details?id={{$v->gid}}" class="J_MakePoint">
																		<img src="{{$v->imgs}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info" style="margin-top:-100px;">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$v->name}}</p>
																			<p class="info-little">规格：{{$v->leixing}}
																				<br/>包装：{{$v->size}} </p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$v->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->price*$v->cnt+10}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	@if ($v->status == '0')
																	<p class="Mystatus">交易成功</p>
																	@elseif($v->status == '1')
																	<p class="Mystatus">正在运送</p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	@elseif($v->status == '2' || $v->status == '5')
																	<p class="Mystatus">等待发货</p>
																	@endif
																	<p class="order-info" oid="{{$v->oid}}"><a href="javascript:void(0);">订单详情</a></p>
																</div>
															</li>
															@if($v->status == '0')
															<li class="td td-change">
																<button class="am-btn am-btn-danger anniu" oid="{{$v->oid}}" onclick="shanchu(this)">
																	删除订单</button>
															</li>
															@elseif($v->status == '1')
															<li class="td td-change">
																<button type="button" oid="{{$v->oid}}" onclick="shouhuo(this)" class="am-btn am-btn-danger anniu">确认收货</button>
															</li>
															@elseif($v->status == '2')
															<li class="td td-change tixing" oid="{{$v->oid}}">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
															@elseif($v->status == '5')
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货成功</div>
															</li>
															@elseif($v->status == '4')
															<li class="td td-change">
																<a href="/home/comments?oid={{$v->oid}}"><div class="am-btn am-btn-danger anniu">
																	我要评价</div></a>
															</li>
															@endif
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>

									</div>

								</div>
								
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											@foreach ($data as $kk=>$vv)
											@if($vv->status == '2' || $vv->status == '5')
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$vv->oid}}</a></div>
													<span>成交时间：{{$vv->addtime}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="{{$vv->imgs}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info" style="margin-top:-100px;">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vv->name}}</p>
																			<p class="info-little">口味：{{$vv->leixing}}
																				<br/>规格：{{$vv->size}}</p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vv->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vv->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$vv->price*$vv->cnt+10}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">买家已付款</p>
																	<p class="order-info" oid="{{$vv->oid}}"><a href="javascript:void(0);">订单详情</a></p>
																</div>
															</li>
															@if($vv->status == '2')
															<li class="td td-change tixing" oid="{{$vv->oid}}">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货</div>
															</li>
															@else
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	提醒发货成功</div>
															</li>
															@endif
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
										</div>
									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											@foreach($data as $k => $v)
											@if($v->status == '1')
											<div class="order-status3">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<span>成交时间：{{$v->addtime}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="{{$v->imgs}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info" style="margin-top:-100px;">
																		<a href="#">
																			<p>{{$v->name}} </p>
																			<p class="info-little">口味：{{$v->leixing}}
																				<br/>规格：{{$v->size}}</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$v->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->price*$v->cnt+10}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">卖家已发货</p>
																	<p class="order-info" oid="{{$v->oid}}"><a href="javascript:void(0);">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																	<p class="order-info"><a href="#">延长收货</a></p>
																</div>
															</li>
															<li class="td td-change">
																<button type="button" oid="{{$v->oid}}" onclick="shouhuo(this)" class="am-btn am-btn-danger anniu">确认收货</button>
															</li>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
										</div>
									</div>
								</div>

								<div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											<!--不同状态的订单	-->
											
											@foreach($data as $k=>$v)
											@if($v->status == '4')
											<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<span>成交时间：{{$v->addtime}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="{{$v->imgs}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info" style="margin-top:-100px;">
																		<a href="#">
																			<p>{{$v->name}}</p>
																			<p class="info-little">口味：{{$v->leixing}}
																				<br/>规格：{{$v->size}} </p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$v->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$v->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
													
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->price*$v->cnt+10}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info" oid="{{$v->oid}}"><a href="javascript:void(0);">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="/home/comments?oid={{$v->oid}}">
																	<div class="am-btn am-btn-danger anniu" id="comment">
																		评价商品</div>
																</a>
																<!-- <a href="#">
																	<div class="am-btn am-btn-danger anniu" id="comment">
																		评价商品</div>
																</a> -->
															</li>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach

										</div>

									</div>

								</div>

								<div class="am-tab-panel am-fade" id="tab2">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											@foreach ($data as $kk=>$vv)
											@if($vv->status == '0')
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$vv->oid}}</a></div>
													<span>成交时间：{{$vv->addtime}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="{{$vv->imgs}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info" style="margin-top:-100px;">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>{{$vv->name}}</p>
																			<p class="info-little">口味：{{$vv->leixing}}
																				<br/>规格：{{$vv->size}}</p>
																			
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vv->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vv->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$vv->price*$vv->cnt+10}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易完成</p>
																	<p class="order-info" oid="{{$vv->oid}}"><a href="javascript:void(0);">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<button class="am-btn am-btn-danger anniu" oid="{{$vv->oid}}" onclick="shanchu(this)">
																	删除订单</button>
															</li>
														</div>
													</div>
												</div>
											</div>
											@endif
											@endforeach
										</div>
									</div>
								</div>
							</div>
						
						</div>
					</div>
				</div>

@stop

@section('js')
<script type="text/javascript">
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	// 订单详情
	$('.order-info').click(function(){
		// alert('1234');
		var oid = $(this).attr('oid');
		window.location.href='/home/orderxiang?oid='+oid;
	});	

	function shouhuo(oid)
	{
		var oid = $(oid).attr("oid");
		// alert(oid);
		alert('收货成功,如果对该商品还算满意的话就去给个好评吧o(∩_∩)o');
		window.location.href='/home/shouorder?oid='+oid;
	}
		
	function shanchu(oid)
	{
		var oid = $(oid).attr("oid");
		// alert(oid);
		var aa = confirm('您确定要删除吗');
		if(aa) {
			window.location.href='/home/shanorder?oid='+oid;
		}else{
			return false;
		}
	}

	// 订单提醒发货
	$('.tixing').click(function(){
		var oid = $(this).attr('oid');
			// alert('12312345');
		$.post('/home/tixing',{oid:oid},function(data){
			if(data == 1){
				alert('提醒发货成功');
			}else{
				alert('提醒失败,请检查您的网络');
			}
		})
	});

</script>
@stop
