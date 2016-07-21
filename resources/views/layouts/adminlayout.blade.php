<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Go-Jek Admin Pages</title>
    {{ Html::style('assets/css/bootstrap.min.css') }}
    {{ Html::style('assets/font-awesome/css/font-awesome.css') }}
    {{ Html::style('assets/css/animate.css') }}
    {{ Html::style('assets/css/style.css') }}
    @yield('cssloc')
     <link rel="icon" href="{{ url('assets/image/icon.png')}}" type="image/png" />
</head>

<body>

<div id="wrapper">

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            {{-- {{ Html::image('assets/image/icon.png', 'image', array('class' => 'img-responsive')) }} --}}
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}<b class="caret"></b></strong>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('/Profile') }}">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    Go-Jek
                </div>
            </li>
            <li class="{{ set_active('Admin')}}">
                <a href="{{ url('/Admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Home </span></a>
            </li>
{{--             <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Demo</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="active"><a href="graph_flot.html">How to create an Event</a></li>
                    <li><a href="graph_morris.html">How to create an Event</a></li>
                    <li><a href="graph_rickshaw.html">How to create an Event</a></li>
                </ul>
            </li> --}}
        </ul>

    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{ url('/logout') }}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{$header['first']}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/Admin') }}">{{$header['second']}}</a>
            </li>
            <li class="active">
                <strong>{{$header['third']}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
@yield('content')
</div>
<div class="footer" >
    <div>
        <strong>Copyright</strong> Michael &copy; 2016
    </div>
</div>

</div>
</div>
<!-- Mainly scripts -->
 {{ Html::script('assets/js/jquery-2.1.1.js') }}
 {{ Html::script('assets/js/bootstrap.js') }}
 {{ Html::script('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}
 {{ Html::script('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}
 {{ Html::script('assets/js/inspinia.js') }}
 {{ Html::script('assets/js/plugins/pace/pace.min.js') }}
 {{ Html::script('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}
 @yield('jsloc')
</body>

</html>
