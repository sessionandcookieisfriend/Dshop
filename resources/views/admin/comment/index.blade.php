@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

        	<form action="/admin/comment" method='get'>
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                         <option value="10" @if($request->num == 10)  selected="selected" @endif>
                            10
                        </option>
                        <option value="25"  @if($request->num == 25)  selected="selected" @endif>
                            25
                        </option>
                        <option value="30"  @if($request->num == 30)  selected="selected" @endif>
                            30
                        </option>
                    </select>
                    条数据
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    订单号:
                    <input type="text" name='oid' value="{{$request->oid}}" aria-controls="DataTables_Table_1">
                    <!-- 作者: -->
                    内容：
                    <input type="text" name='content' value="{{$request->content}}" aria-controls="DataTables_Table_1">
              </label>
                <button class='btn btn-info'>搜索</button>
            </div>
            </form>

					

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 30px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="Browser: activate to sort column ascending">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            商品名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            商品图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            评论时间
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="Engine version: activate to sort column ascending">
                            好评度
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">
                            内容
                        </th>
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					@foreach($res as $k => $v)

					@if($k % 2 == 0)
					 	<tr class="odd">
					@else 
						<tr class="even">
					@endif

                  	<!-- <tr class='@if($k % 2 == 0) odd @else even @endif'> -->
                        <center> 
                        <td class=""  style=" text-align:center; ">
                            {{$v->id}}
                        </td>
                        <!-- 用户名 -->
                        <td class="uname" >
                            @foreach($user as $uv)
                                @if($uv->hid == $v->uid)
                                    {{$uv->username}}
                                @endif
                            @endforeach
                        </td>
                       
                        <td class=" "  style=" text-align:center; ">
                           <!-- 商品名字 -->
                            @foreach($goods as $gv)
                                @if($gv->id == $v->gid)
                                    {{$gv->gname}}
                                @endif
                            @endforeach
                        </td>
                         <td class=" "  style=" text-align:center; ">
                           <!-- 商品图片 -->
                            @foreach($goods as $gv)
                                @if($gv->id == $v->gid)
                                    <img src="{{$gv->imgs}}" alt="">
                                @endif
                            @endforeach
                        </td>
                        <td class=" "  style=" text-align:center; ">
                            {{$v->oid}}
                        </td>
                        <td class=" "  style=" text-align:center; ">
                            {{$v->addtime}}
                        </td>
                        <td class=" "  style=" text-align:center; ">
                            @if($v->star == 2)
                                好评
                            @elseif($v->star == 1)
                                一般
                            @else
                                差评
                            @endif
                        </td>
                         <td class=" "  style=" text-align:center; ">
                            {{$v->content}}
                        </td>
                        <td class=" "  style=" text-align:center; ">
                            <a href="/admin/comment/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/comment/{{$v->id}}" method='post' style='display:inline'>
                            	{{csrf_field()}}

                            	{{method_field("DELETE")}}
                            	<button class='btn btn-danger'>删除</button>

                            </form>
                        </td>
                    </tr>
                    </center>
                    @endforeach
                </tbody>
            </table>
			
			<style>
			.pagination li a{

				color: #fff;
			}
				.pagination li{
					float: left;
				    height: 20px;
				    padding: 0 10px;
				    display: block;
				    font-size: 12px;
				    line-height: 20px;
				    text-align: center;
				    cursor: pointer;
				    outline: none;
				    background-color: #444444;
				    
				    text-decoration: none;
				  
				    border-right: 1px solid rgba(0, 0, 0, 0.5);
				    border-left: 1px solid rgba(255, 255, 255, 0.15);
				   
				    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
				}

				.pagination  .active{
					    color: #323232;
					    border: none;
					    background-image: none;
					    background-color: #88a9eb;
					   
					    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
				}

				.pagination .disabled{
					color: #666666;
    				cursor: default;

				}
				
				.pagination{
					margin:0px;
				}
				
			</style>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                当前页{{$res->currentPage()}} 从{{$res->firstItem()}} 到 {{$res->lastItem()}} 一共{{$res->total()}}条数据
          
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				
				{{$res->appends($request->all())->links()}}

            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
	$('.mws-form-message').delay(1000).fadeOut(2000);	
</script>

@stop