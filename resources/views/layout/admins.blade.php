<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/admin.css" media="screen">


<title>@yield('title')</title>

</head>

<body>

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<span style='color:white;font-family:华文彩云;font-size:20px;margin-left:25px;'>淘点货商城后台</span>
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
                @php 
                    $user = DB::table("user") -> where("id", session("uid")) -> first();
                @endphp
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src='{{$user->pic}}' alt="User Photo" style="margin:0px;height:30px;">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{$user->username}}
                    </div>
                    <ul>
                    	<li><a href="/admin/pic">修改头像</a></li>
                        <li><a href="/admin/changepass">修改密码</a></li>
                        <li><a href="/admin/logout">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<!-- <div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div> -->
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    
                    <li>
                        <a href="#"><i class="icon-users"></i>管理员管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/user/create">管理员添加</a></li>
                            <li><a href="/admin/user">浏览管理员</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-add-contact"></i>用户管理</a>
                        <ul class='closed'>
                            <!-- <li><a href="/admin/homeuser/create">用户添加</a></li> -->
                            <li><a href="/admin/homeuser">浏览用户</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-accessibility-2"></i>角色管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/role/create">角色添加</a></li>
                            <li><a href="/admin/role">浏览角色</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-key"></i>权限管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/permission/create">权限添加</a></li>
                            <li><a href="/admin/permission">浏览权限</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i>商品分类管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/cate/create">分类添加</a></li>
                            <li><a href="/admin/cate">分类浏览</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="icon-lollipop"></i>商品管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/goods/create">商品添加</a></li>
                            <li><a href="/admin/goods">商品浏览</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-comments"></i>商品评论管理</a>
                        <ul class='closed'>
                            <li><a href="JavaScript:void(0)">商品评论添加</a></li>
                            <li><a href="/admin/comment">商品评论浏览</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-pictures"></i>轮播图管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/lunbo/create">轮播图添加</a></li>
                            <li><a href="/admin/lunbo">轮播图列表</a></li>
                        </ul>

                    </li>
                    <li>
                        <a href="#"><i class="icon-folder-close"></i>订单管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/a_order">订单列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-television"></i>新闻管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/news/create">新闻添加</a></li>
                            <li><a href="/admin/news">浏览新闻</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="icon-pictures"></i>收货信息管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/address/create">添加收货信息</a></li>
                            <li><a href="/admin/address">浏览收货信息</a></li>
                        </ul>

                    </li>
                    <li>
                        <a href="#"><i class="icon-users"></i>友情链接管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/link/create">添加链接</a></li>
                            <li><a href="/admin/link">查看链接</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-calendar"></i>广告管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/advert/create">添加广告</a></li>
                            <li><a href="/admin/advert">查看广告</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/site"><i class="icon-tools"></i>网站配置</a>
                        <!-- <ul class='closed'>
                            <li><a href="/admin/link/create">添加链接</a></li>
                            <li><a href="/admin/link">查看链接</a></li>

                        </ul> -->
                    </li>          
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">

            @if(session('success'))
                <div class="mws-form-message success">
                    <li style='list-style:none;font-size:14px'>{{session('success')}}</li>
                </div>
            @endif

            @if(session('error'))
                <div class="mws-form-message error">
                    <li style='list-style:none;font-size:14px'>{{session('error')}}</li>
                </div>
            @endif

            @section('content')

            @show
            
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <!-- <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div> -->
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-3.3.1.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/admins/js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>
    <script>
        $('.mws-form-message').delay(2000).fadeOut(2000);
    </script>

    @section('js')

    
    @show

</body>
</html>