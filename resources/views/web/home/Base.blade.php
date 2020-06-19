<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    {{--    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">--}}


    <title>体面的网站后台页面html源码模板 - 代码库</title>

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('web/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('web/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('web/css/paper-dashboard.css')}}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('web/css/demo.css')}}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{route('home')}}" class="simple-text">
                    {{auth()->user()->name}}
                </a>
            </div>

            <ul class="nav">

                <li class="active">
                    <a href="dashboard.html">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="{{route('article.index')}}">
                        <i class="ti-user"></i>
                        <p>素材管理</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.info')}}">
                        <i class="ti-user"></i>
                        <p>个人信息</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>




    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>


                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">


                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            @if ($errors->any())
                <div class="alert alert-danger" id="msg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="container-fluid">

                @yield('content')


            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="#">Creative Tim</a>. More Templates <a href="http://www.dmaku.com/moban.html" target="_blank" title="html模板">html模板</a> - Collect from <a href="http://www.dmaku.com/moban.html" title="网页模板" target="_blank">网页模板</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>


<script src="{{asset('web/js/jquery-1.10.2.js')}}" type="text/javascript"></script>

<script src="{{asset('web/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{asset('web/js/bootstrap-checkbox-radio.js')}}"></script>

{{--layui--}}
<script src="https://cdn.bootcdn.net/ajax/libs/layui/2.5.6/layui.all.js"></script>
@yield('myJS')

<script type="text/javascript">

    $('#msg').show();
    setTimeout(function () {
        $('#msg').hide();
    },5000)


</script>



</html>
