@extends('layouts.app')

@section('js')
    <script>
        setTimeout(function(){
            $('.alert').slideUp();
        },4000);
    </script>
@endsection

@section('content')



    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
        	<!--Contact Section-->
            <section class="contact-section">
                <div class="auto-container">
                    <!--Map Section-->
                    <section class="map-section">
                        <!--Map Outer-->
                        <div class="map-outer">
                            <!--Map Canvas-->
                            <div class="map-canvas"
                                data-zoom="12"
                                data-lat="-37.817085"
                                data-lng="144.955631"
                                data-type="roadmap"
                                data-hue="#ffc400"
                                data-title="Envato"
                                data-icon-path="images/icons/map-marker.png"
                                data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7127.091811854694!2d85.93718947527543!3d26.726950182831448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sbinaytara%20foundation!5e0!3m2!1sen!2snp!4v1639454886253!5m2!1sen!2snp" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    
                            </div>
                        </div>
                    </section>
                    <!--End Map Section-->
                    
                    <div class="row clearfix">
                        <!--Form Column-->
                        <div class="form-column col-md-8 col-sm-12 col-xs-12">
                            <div class="sec-title">

                                <h2>Contact Form</h2>
                            </div>
                            

                            <div class="text">We Answer during 24 hours in working days.</div>
                            @include('front.partials.message')
                            <!--Contact Form-->
                            <div class="contact-form">
                                @auth()
                                <form method="post" action="{{ route('user-contact-message') }}">
                                    @csrf
                                    <div class="clearfix">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message ..."></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="theme-btn submit-btn">Submit Comment</button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                                @else
                                <p>Plz <a href="{{ route('login') }}"><em>Login</em></a> Or <a href="{{ route('register') }}"><em>Register</em></a>  First To Contact Us</p>
                                @endauth
                                
                            </div>
                        </div>
                        <!--Info Column-->
                        <div class="info-column col-md-4 col-sm-12 col-xs-12">
                            <div class="inner-column">
                                <div class="sec-title">
                                    <h2>Contact Info</h2>
                                </div>
                                <ul class="social-icon-one alternate">
                                    <li><a  href="{{ $social_site->facebook}}" target="_blank()"><span class="fa fa-facebook"></span></a></li>
                                    <li class="twitter"><a  href="{{ $social_site->twitter}}" target="_blank()"><span class="fa fa-twitter"></span></a></li>
                                    <li class="g_plus"><a href="{{ $social_site->gogle}}" target="_blank()"><span class="fa fa-google-plus"></span></a></li>
                                    <li class="linkedin"><a href="{{ $social_site->linkedin}}" target="_blank()"><span class="fa fa-linkedin-square"></span></a></li>
                                    <li class="pinteret"><a href="{{ $social_site->piterest}}" target="_blank()"><span class="fa fa-pinterest-p"></span></a></li>
                                    <li class="android"><a href="{{ $social_site->watsaap}}" target="_blank()"><span class="fa fa-whatsapp"></span></a></li>
                                    <li class="g_plus"><a href="{{ $social_site->youtube}}" target="_blank()"><span class="fa fa-youtube"></span></a></li>
                                </ul>
                                <ul class="info-list">
                                    <li>Basundhara,Kathmandu-Nepal</li>
                                    <li>Phone: +977 (9819813330) <br> Mobile: +977 (9844434175)</li>
                                    <li>Email: sumitkarn989@gmail.com<br> Theme By:Quebec</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!--End Contact Section-->
        </div>
    </div>
    <!--End Sidebar Page Container--> 
@endsection
