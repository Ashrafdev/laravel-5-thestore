<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ASHRAF">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>The Store</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/bower_components/components-font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

    <!--right slidebar-->
    {{--<link href="/css/slidebars.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-fileupload/bootstrap-fileupload.css"/>

    <!-- Custom styles for this template -->

    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet"/>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
@if(!Auth::guest())
    <section id="container">
        <!--header start-->
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="javascript:" class="logo">The <span>Store</span></a>
            <!--logo end-->

            <div class="top-nav">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
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
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                            <li><a href="{!! url('/logout') !!}"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>

                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
    @include('layouts.sidebar')

    <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!--state overview start-->
                @yield('content')

            </section>

        </section>
        <!--main content end-->

        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                {!! date('Y') !!} The Store.
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->

        @else
            <header class="header white-bg">
                <header class="header white-bg">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <!--logo start-->
                    <a href="javascript:" class="logo">The <span>Store</span></a>
                    <div class="horizontal-menu navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="{!! url('/home') !!}">Home</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li><a href="{!! url('/login') !!}">Login</a></li>
                                <li><a href="{!! url('/register') !!}">Register</a></li>
                            @endif
                        </ul>
                    </div>

                    <!--logo end-->

                </header>
                <section id="main-content">
                    <section class="wrapper site-min-height">
                        <!--state overview start-->
                        @yield('content')

                    </section>
                </section>
                <!--footer start-->
                <footer class="site-footer">
                    <div class="text-center">
                        {{ date('Y') }} &copy; The Store.
                        <a href="#" class="go-top">
                            <i class="fa fa-angle-up"></i>
                        </a>
                    </div>
                </footer>
                <!--footer end-->
            </header>
        @endif
    </section>

    <!-- jQuery 2.1.4 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/js/jquery.scrollTo.min.js"></script>
    <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/js/respond.min.js"></script>
    <script src="/js/slidebars.min.js"></script>
    <script src="/js/common-scripts.js"></script>
    <script type="text/javascript" src="/js/ga.js"></script>
    <script src="/js/jquery.stepy.js"></script>
    {{--<script src="/js/form-component.js"></script>--}}
    @stack('scripts')
    @yield('scripts')
</body>
</html>
