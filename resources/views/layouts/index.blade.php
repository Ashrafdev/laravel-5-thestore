<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ASHRAF">
    <meta name="keyword" content="">
    <title>The Store</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/bower_components/components-font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

    <link href="/css/theme.css" rel="stylesheet">
    <link rel="/stylesheet" href="/css/flexslider.css"/>
    <link href="/assets/bxslider/jquery.bxslider.css" rel="stylesheet"/>
    <link href="/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/assets/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="/assets/revolution_slider/rs-plugin/css/settings.css" media="screen">
    <!-- Custom styles for this template -->
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
        <ul class="nav navbar-right">
            <li><a href="{!! url('/logout') !!}"><button type="submit" class="btn btn-danger">Logout</button></a></li>
        </ul>
    @endif
</header>
<body>
@yield('content')
<div class="panel-body">
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-login" class="modal fade">
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
<!-- jQuery 2.1.4 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<!-- js placed at the end of the document so the pages load faster -->
<script class="include" type="text/javascript" src="/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/js/respond.min.js"></script>
<script src="/js/slidebars.min.js"></script>
<script src="/js/common-scripts.js"></script>
<script type="text/javascript" src="/js/ga.js"></script>
{{--<script src="/js/form-component.js"></script>--}}
<script src="/js/jquery.stepy.js"></script>
@yield('scripts')
@stack('scripts')
</body>
</html>
