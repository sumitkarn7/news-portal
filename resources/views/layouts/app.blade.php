<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>World || News</title>
    <!-- Stylesheets -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('frontend/css/color-themes/default-theme.css') }}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/x-icon">
    <!-- Responsive -->

    @yield('cs')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js') }}"></script><![endif]-->
<!--[if lt IE 9]><script src="{{ asset('frontend/js/respond.js') }}"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header -->
    <header class="main-header">
        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="clearfix">
                    <!--Top Left-->
                    @isset($latest_news)
                    <div class="top-left col-md-4 col-sm-12 col-xs-12">
                        <div class="trend">Trending: </div>
                        <div class="single-item-carousel owl-carousel owl-theme">
                            @foreach($latest_news as $news)
                                <div class="slide">
                                    <div class="text">{{ $news->title}}.</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endisset
                    <!--Top Right-->
                    <div class="top-right pull-right col-md-8 col-sm-12 col-xs-12">
                        <ul class="top-nav">
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="{{ route('contact') }}">Contacts</a></li>
                        </ul>
                        <ul class="social-nav">
                            <li><a href="{{ $social_site->facebook}}" target="_blank"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="{{ $social_site->twitter}}" target="_blank"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="{{ $social_site->gogle}}" target="_blank"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="{{ $social_site->linkedin}}" target="_blank"><span class="fa fa-linkedin-square"></span></a></li>
                            <li><a href="{{ $social_site->pinterest}}" target="_blank"><span class="fa fa-pinterest-p"></span></a></li>
                            @auth
                                <li><a href="{{ route(request()->user()->role) }}">{{ ucfirst(request()->user()->name)}} </a></li>
                            @else
                            <li><a href="{{ route('login') }}"><span class="fa fa-sign-in"> Login</span></a></li>
                            
                            <li><a href="{{ route('register') }}"><span class="fa fa-registered "> Register</span></a></li>
                            @endauth
                            <li><a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout').submit();"><span class="fa fa-sign-out"> Logout</span></a>
                                {{ Form::open(['url'=>route('logout'),'id'=>'logout']) }}
                                {{ Form::close() }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">

                    <div class="pull-left logo-outer">
                        <div class="logo" style="background:url({{ asset('Uploads/Header/'.$theme->header_logo) }}) no-repeat;"><a href="{{ route('homepage') }}"></a></div>
                    </div>

                    <div class="pull-right upper-right clearfix">
                        <div class="add-image">
                            <a href="{{ $promo->top_link}}" target="_blank"><img src="{{ asset('Uploads/Promo_top/'.$promo->top_place) }}" alt="" /></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Header Lower-->
        <div class="header-lower">
            <div class="auto-container">
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="bs-example-navbar-collapse-1">
                            <ul class="navigation clearfix">
                                <li class=""><a href="{{ route('homepage') }}">Home</a>
                                </li>
                                <li class="dropdown"><a href="#">News Menu</a>
                                @isset($category)
                                    <ul>
                                        @foreach($category as $cat)
                                        
                                        <li><a href="{{ route('category-detail',$cat->slug) }}">{{ $cat->title}}</a></li>

                                        @endforeach
                                    </ul>
                                @endisset
                                </li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="outer-box">

                        

                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu1">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="blog.html">
                                                <div class="form-group">
                                                    <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                        <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
                    </div>

                </div>

            </div>
        </div>
        <!--End Header Lower-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{ route('homepage')}}" style="background:url({{ asset('Uploads/Fav/'.$theme->fav_icon) }}) no-repeat;"class="img-responsive" title=""></a>
                </div>

                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li ><a href="{{ route('homepage') }}">Home</a>
                                </li>
                                <li class="dropdown"><a href="#">News Menu</a>
                                @isset($category)
                                    <ul>
                                        @foreach($category as $cat)
                                        
                                        <li><a href="{{ route('category-detail',$cat->slug) }}">{{ $cat->title}}</a></li>

                                        @endforeach
                                    </ul>
                                @endisset
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->

    </header>
    <!--End Header Style Two -->

    <!-- Hidden Navigation Bar -->
    <section class="hidden-bar left-align">

        <div class="hidden-bar-closer">
            <button><span class="qb-close-button"></span></button>
        </div>

        <!-- Hidden Bar Wrapper -->
        <div class="hidden-bar-wrapper">
            <div class="logo">
                <a href="index.html"></a>
            </div>
            <!-- .Side-menu -->
            <div class="side-menu">
                <!--navigation-->
                <ul class="navigation clearfix">
                <li ><a href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="dropdown"><a href="#">News Menu</a>
                    @isset($category)
                        <ul>
                        @foreach($category as $cat)
                                        
                            <li><a href="{{ route('category-detail',$cat->slug) }}">{{ $cat->title}}</a></li>

                        @endforeach
                        </ul>
                    @endisset
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <!-- /.Side-menu -->

            <!--Options Box-->
            <div class="options-box">
              

                <!--Social Links-->
                <ul class="social-links clearfix">
                <li><a href="{{ $social_site->facebook}}" target="_blank"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="{{ $social_site->twitter}}" target="_blank"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="{{ $social_site->gogle}}" target="_blank"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="{{ $social_site->linkedin}}" target="_blank"><span class="fa fa-linkedin-square"></span></a></li>
                            <li><a href="{{ $social_site->pinterest}}" target="_blank"><span class="fa fa-pinterest-p"></span></a></li>
                        
                </ul>

            </div>

        </div><!-- / Hidden Bar Wrapper -->

    </section>
    <!-- End / Hidden Bar -->


    @yield('content')



    <!--Main Footer-->
    <footer class="main-footer">
        
        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="column col-md-3 col-sm-12 col-xs-12">
                        <div class="logo">
                            <a href="{{ route('homepage') }}" style="background:url({{ asset('Uploads/Footer/'.$theme->footer_logo) }}) no-repeat;"></a>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column col-md-6 col-sm-12 col-xs-12">
                        <div class="text">Project By:Sumit Karn</div>
                    </div>
                    <!--Column-->
                    <div class="column col-md-3 col-sm-12 col-xs-12">
                        <ul class="social-icon-one">
                            <li><a href="{{ $social_site->facebook}}" target="_blank"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter"><a  href="{{ $social_site->twitter}}" target="_blank"><span class="fa fa-twitter"></span></a></li>
                            <li class="g_plus"><a href="{{ $social_site->gogle}}" target="_blank"><span class="fa fa-google-plus"></span></a></li>
                            <li class="linkedin"><a href="{{ $social_site->linkedin}}" target="_blank"><span class="fa fa-linkedin"></span></a></li>
                            <li class="pinteret"><a href="{{ $social_site->pinterest}}" target="_blank"><span class="fa fa-pinterest-p"></span></a></li>
                            <li class="android"><a href="{{ $social_site->watsaap}}" target="_blank"><span class="fa fa-whatsapp"></span></a></li>
                            <li class="g_plus"><a href="{{ $social_site->youtube}}" target="_blank"><span class="fa fa-youtube"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Copyright Section-->
            <div class="copyright-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <ul class="footer-nav">
                                <li><a href="{{ route('homepage') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li class="active"><a href="{{ route('contact') }}">Contacts</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="copyright">&copy; Copyright NINZIO. All rights reserved.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<!--End Scroll to top-->

<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox-media.js') }}"></script>
<script src="{{ asset('frontend/js/owl.js') }}"></script>
<script src="{{ asset('frontend/js/appear.js') }}"></script>
<script src="{{ asset('frontend/js/wow.js') }}"></script>

@yield('js')
<script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
<script src="{{ asset('frontend/js/color-settings.js') }}"></script>
</body>
</html>
