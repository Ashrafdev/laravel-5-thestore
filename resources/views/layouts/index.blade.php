<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ASHRAF">
    <meta name="keyword" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The Store</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    <link href="/bower_components/components-font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

    <link href="/css/theme.css" rel="stylesheet">
    <link rel="/stylesheet" href="/css/flexslider.css"/>
    <link href="/assets/bxslider/jquery.bxslider.css" rel="stylesheet"/>
    <link href="/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/css/gallery.css" />
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="full-width">

<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
    </div>
    <a href="{!! url('/') !!}" class="logo">The <span>Store</span></a>
    <div class="horizontal-menu navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="/">See All Ads</a></li>
            <li><a href="{!! url('/post_item') !!}">Post Item</a></li>
            @if(!Auth::check())
                <li><a href="#myModal-login" data-toggle="modal">Login</a></li>
                <li><a href="#myModal-signup" data-toggle="modal">Sign Up</a></li>
            @endif
        </ul>
    </div>
    @if(Auth::check())
        <div class="top-nav">
            <ul class="nav pull-right top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="username">
                            @if (Auth::user())
                                {!! Auth::user()->name !!}
                            @endif
                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="{!! url("/profile/".Auth::user()->id) !!}"><i class="fa fa-users" aria-hidden="true"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i>My Items</a></li>
                        <li><a href="{!! url('http://localhost/password/reset') !!}"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Reset Pass</a></li>
                        <li>
                            <a href="{!! url('/logout') !!}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-key" aria-hidden="true"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    @endif
</header>
<body>
@yield('content')
<div class="panel-body">
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-login"
                                 class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Login Form</h4>
                </div>
                <div class="modal-body">@include('auth.login')</div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-signup"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Sign Up</h4>
                </div>
                <div class="modal-body">@include('auth.register')</div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/slidebars.min.js"></script>
<script src="/js/common-scripts.js"></script>
<script type="text/javascript" src="/js/ga.js"></script>
<script src="/assets/fancybox/source/jquery.fancybox.js"></script>
<script src="/js/modernizr.custom.js"></script>
{{--<script src="/js/form-component.js"></script>--}}
<script src="/js/jquery.stepy.js"></script>
<script src="/js/gritter.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
@yield('scripts')
@stack('scripts')
</body>
</html>
