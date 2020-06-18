<!DOCTYPE HTML>
<html>
<head>
    <title>admin-home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{asset('admin/js/jquery-2.1.4.min.js')}}"></script>
    <!-- //jQuery -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{asset('admin/css/icon-font.min.css')}}" type='text/css' />
    <!-- //lined-icons -->
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
    <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/layui/2.5.6/layui.all.js"></script>

</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="mother-grid-inner">


        @yield('content')

        <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block">

            </div>
            <!--inner block end here-->
            <!--copy rights start here-->
            <div class="copyrights">
                <p>Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://www.dmaku.com/moban.html">html模板</a></p>
            </div>
            <!--COPY rights end here-->
        </div>
    </div>
    <div class="sidebar-menu">
        <header class="logo1">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
        </header>
        <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
        <div class="menu">
            <ul id="menu" >
                <li><a href="{{route('admin.home')}}"><i class="fa fa-tachometer"></i> <span>home</span><div class="clearfix"></div></a></li>
                <li id="menu-academico" ><a href="{{route('user.index')}}"><i class="fa fa-envelope nav_icon"></i><span>用户列表</span><div class="clearfix"></div></a></li>
                <li><a href="{{route('admin.article.article_list')}}"><i class="fa fa-picture-o" aria-hidden="true"></i><span>素材列表</span><div class="clearfix"></div></a></li>
                <li id="menu-academico" ><a href="charts.html"><i class="fa fa-bar-chart"></i><span>推广</span><div class="clearfix"></div></a></li>
                <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Short Codes</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="icons.html">Icons</a></li>
                        <li id="menu-academico-avaliacoes" ><a href="typography.html">Typography</a></li>
                        <li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<!--js -->
<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<!-- /Bootstrap Core JavaScript -->
<!-- morris JavaScript -->
<script src="{{asset('admin/js/raphael-min.js')}}"></script>
<script src="{{asset('admin/js/morris.js')}}"></script>

@yield('myJS')
</body>
</html>