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

        	<form action="/admin/link" method='get'>
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                        <!-- <option value="10" @if(isset($_GET['num']) && $_GET['num'] == 10)  selected="selected" @endif>
                            10
                        </option>
                        <option value="25"  @if(isset($_GET['num']) && $_GET['num'] == 25)  selected="selected" @endif>
                            25
                        </option>
                        <option value="30"  @if(isset($_GET['num']) && $_GET['num'] == 30)  selected="selected" @endif>
                            30
                        </option> -->

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
                    链接名称:
                    <!-- <input type="text" name='username' value="{{isset($_GET['username']) ? $_GET['username'] : ''}}" aria-controls="DataTables_Table_1"> -->

                    <input type="text" name='lname' value="{{$request->lname}}" aria-controls="DataTables_Table_1">

                    链接地址:
                    <input type="text" name='lurl' value='{{$request->lurl}}'>

                </label>

                <button class='btn btn-info'>搜索</button>
            </div>
            </form>

					

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                            名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                          图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">
                            地址
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">
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
                        <td class="">
                            {{$v->id}}
                        </td>
                        <td class="lname">
                            {{$v->lname}}
                        </td>
                        <td class=" ">
                           <img src="{{$v->lpic}}">
                        </td>
                        <td class="lurl">
                            {{$v->lurl}}
                        </td>
                       
                      
                        <td class=" ">
                            <a href="/admin/link/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/link/{{$v->id}}" method='post' style='display:inline'>
                            	{{csrf_field()}}

                            	{{method_field("DELETE")}}
                            	<button class='btn btn-danger'>删除</button>

                            </form>
                        </td>
                    </tr>
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
                当前页码是{{$res->currentPage()}} 从{{$res->firstItem()}} 到 {{$res->lastItem()}} 一共{{$res->total()}}条数据
				<!-- 
				每页显示几条数据 
                {{$res->count()}}  
				显示当前的页码
				 {{$res->currentPage()}}
				//limit 从哪start
				 {{$res->firstItem()}}
				//判断
                {{$res->hasMorePages()}}
				//limit 到哪stop
                {{$res->lastItem()}}
				//显示最后的页码
                {{$res->lastPage()}}
				//显示下一页的url
                {{$res->nextPageUrl()}}

                {{$res->perPage()}}
				
				//显示上一页的url
                {{$res->previousPageUrl()}}
				//显示总数据
                {{$res->total()}}
				//显示当前的页码的url
                {{$res->url($res->currentPage())}}
-->
               
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

	//双击用户名进行修改
	$('.lname').dblclick(function(){

		//获取用户名
		var lm = $(this).text().trim();

		//创建input
		var ipu = $('<input type="text" />');
		$(this).empty();
		$(this).append(ipu);
		ipu.val(lm);
		ipu.select();
		var tds = $(this);

		//失去焦点
		ipu.blur(function(){
			//获取input框里面的值
			var lv = $(this).val();
			//获取id
			var ids = $(this).parents('tr').find('td').eq(0).text().trim();

			// console.log(id);
			$.get('/admin/lkajax',{lv:lv,ids:ids},function(data){

				// console.log(data);
				if(data == 1){

					//让输入框消失  但是输入框里面的值留下
					tds.text(lv);
				} else {

					tds.text(lm);
				}
			})
		})
	})
</script>

@stop