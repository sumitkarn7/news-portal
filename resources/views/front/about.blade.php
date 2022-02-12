@extends('layouts.app')



@section('content')



    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            @isset($about)
        	<!--Page Title-->
            <section class="page-title">
                <div class="auto-container">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h2>{{ ucfirst($about->title) }}</h2>
                        </div>
                        <div class="pull-right">
                            <ul class="page-title-breadcrumb">
                                <li><a href="{{ route('homepage') }}"><span class="fa fa-home"></span>Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Page Title-->
            
            <!--About Section-->
            <section class="about-section">
                
                <!--Author Info-->
                <div class="author-info">
                    <div class="auto-container">
                        <div class="row clearfix">
                            <!--Image Column-->
                            <div class="image-column col-md-4 col-sm-12 col-xs-12">
                                <div class="image">
                                    @isset($about->image)
                                    <img src="{{ asset('Uploads/About/'.$about->image) }}" alt="" />
                                    @endisset
                                </div>
                            </div>
                            <!--Image Column-->
                            <div class="content-column col-md-8 col-sm-12 col-xs-12">
                                <div class="content-inner">
                                    <h2>Hi, my name is <span class="theme_color">{{ ucfirst($about->name) }}</span></h2>
                                    <div class="text">
                                        <p>{{ ucfirst($about->description)}}</p>
                                    </div>
                                    <ul class="social-icon-one alternate">
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
                    </div>
                </div>
                
               
                
            </section>
            <!--End About Section-->
            @endisset
        </div>
    </div>
    <!--End Sidebar Page Container--> 
@endsection
