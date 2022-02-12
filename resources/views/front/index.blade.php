@extends('layouts.app')



@section('content')


    <!--Main Slider-->
    @isset($latest_news)
        <section class="main-slider">
            <div class="auto-container">
                <div class="single-item-carousel owl-carousel owl-theme">

                    <!--Slide-->
                    @foreach($latest_news as $news)
                    <div class="slide">
                        <figure class="image">
                            <a href="{{ route('news-detail',$news->slug) }}"><img src="{{ asset('Uploads/News/'.$news->image) }}" alt="" /></a>
                        </figure>
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <div class="content">
                                    <div class="category"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->getCat->title}}</a></div>
                                    <h2><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></h2>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>{{ $news->created_at->diffForHumans()}}</li>
                                        <li><span class="icon fa fa-comment-o"></span>3</li>
                                        <li><span class="icon qb-eye"></span>{{number_format($news->view_count)}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    

                </div>
            </div>
        </section>
    @endisset
    <!--End Main Slider-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                @isset($category)
                    <!--Content Side-->
                    <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">

                    @foreach($category as $cat)
                        <!--Category Tabs Box-->
                        <div class="category-tabs-box">
                            <!--Product Tabs-->
                            <div class="prod-tabs tabs-box">

                                <!--Tab Btns-->
                                <div class="tab-btns tab-buttons clearfix">
                                    <div class="pull-left">
                                        <div class="category">{{ $cat->title}}</div>
                                    </div>

                                </div>

                                <!--Tabs Container-->
                                <div class="tabs-content">

                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="prod-alls">
                                        <div class="content">
                                            <div class="row clearfix">
                                                <div class="column col-md-6 col-sm-6 col-xs-12">
                                                    <div class="single-item-carousel owl-carousel owl-theme">
                                                        @if($cat->getSubCat && $cat->getSubCat->count() >0)
                                                        @foreach($cat->getSubCat as $sub_cat)
                                                        @foreach($sub_cat->getNews as $news)
                                                        <!--News Block Two-->
                                                        <div class="news-block-two">
                                                            <div class="inner-box">
                                                                <div class="image">
                                                                    <a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt="" /></a>
                                                                    <div class="category"><a href="{{ route('news-detail',$news->slug) }}">{{ $sub_cat->title}}</a></div>
                                                                </div>
                                                                <div class="lower-box">
                                                                    <h3><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></h3>
                                                                    <ul class="post-meta">
                                                                        <li><span class="icon fa fa-clock-o"></span>{{ $news->created_at->diffForHumans()}}</li>
                                                                        <li><span class="icon fa fa-comment-o"></span>{{ $news->getReview->count() ?? 0}}</li>
                                                                        <li><span class="icon fa fa-eye"></span>{{ number_format($news->view_count)}}</li>
                                                                    </ul>
                                                                    <div class="text">
                                                                        {{ Str::limit(strip_tags($news->news_content),"200","...")}}
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endforeach
                                                        @else
                                                        @foreach($cat->getNews as $news)
                                                        <div class="news-block-two">
                                                            <div class="inner-box">
                                                                <div class="image">
                                                                    <a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt="" /></a>
                                                                    <div class="category"><a href="{{ route('news-detail',$news->slug) }}">{{ $cat->title}}</a></div>
                                                                </div>
                                                                <div class="lower-box">
                                                                    <h3><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></h3>
                                                                    <ul class="post-meta">
                                                                        <li><span class="icon fa fa-clock-o"></span>{{ $news->created_at->diffForHumans()}}</li>
                                                                        <li><span class="icon fa fa-comment-o"></span>{{ $news->getReview->count() ?? 0}}</li>
                                                                        <li><span class="icon fa fa-eye"></span>{{ number_format($news->view_count)}}</li>
                                                                    </ul>
                                                                    <div class="text">
                                                                        {{ Str::limit(strip_tags($news->news_content),'200','...')}}
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endif

                                                        

                                                    </div>
                                                </div>
                                                <div class="column col-md-6 col-sm-6 col-xs-12">

                                                    
                                                    


                                                    @if($cat->getSubCat && $cat->getSubCat->count() >0)
                                                        @foreach($cat->getSubCat as $sub_cat)
                                                        @foreach($sub_cat->getViewNews as $news)
                                                        <!--Widget Post-->
                                                        <article class="widget-post">
                                                            <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                            <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                            <div class="post-info">{{ $news->created_at->diffForHumans()}}</div>
                                                        </article>
                                                        @endforeach
                                                        @endforeach
                                                        @else
                                                        @foreach($cat->getViewNews as $news)
                                                        <!--Widget Post-->
                                                        <article class="widget-post">
                                                            <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                            <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                            <div class="post-info">{{ $news->created_at->diffForHumans()}}</div>
                                                        </article>
                                                        @endforeach
                                                    @endif

                                                    

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--End Category Info Tabs-->

                    @endforeach

                    </div>
                @endisset

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar default-sidebar right-sidebar">

                        <!--Social Widget-->
                        <div class="sidebar-widget sidebar-social-widget">
                            <div class="sidebar-title">
                                <h2>Follow Us</h2>
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
                        </div>
                        <!--End Social Widget-->

                        @isset($promo)
                        <!--Adds Widget-->
                        <div class="sidebar-widget sidebar-adds-widget">
                            <div class="adds-block" style="background-image:url({{ asset('Uploads/Promo_middle/'.$promo->middle_place) }});">
                                <div class="inner-box">
                                    <div class="text">Advertisement</div>
                                    <a href="{{ $promo->middle_link}}" class="theme-btn btn-style-two" target="_blank">View Now</a>
                                </div>
                            </div>
                        </div>
                        @endisset
                        <!--Ends Adds Widget-->

                        <!--News Post Widget-->
                        <div class="sidebar-widget posts-widget">

                            <!--Product widget Tabs-->
                            <div class="product-widget-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">

                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-popular" class="tab-btn active-btn">Popular</li>
                                        <li data-tab="#prod-recent" class="tab-btn">Recent</li>
                                        <li data-tab="#prod-comment" class="tab-btn">Old</li>
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        @isset($popular)
                                        <!--Tab / Active Tab-->
                                        <div class="tab active-tab" id="prod-popular">
                                            <div class="content">
                                                @foreach($popular as $news)
                                                    <article class="widget-post">
                                                        <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                        <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                        <div class="post-info">{{ date("F d,Y",strToTime($news->created_at))}}</div>
                                                    </article>
                                                @endforeach

                                            </div>
                                        </div>
                                        @endisset

                                        @isset($recent)
                                        <!--Tab-->
                                        <div class="tab" id="prod-recent">
                                            <div class="content">
                                            @foreach($recent as $news)
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                    <div class="post-info">{{ date("F d,Y",strToTime($news->created_at))}}</div>
                                                </article>
                                            @endforeach

                                            </div>
                                        </div>
                                        @endisset

                                        @isset($old_news)
                                        <!--Tab-->
                                        <div class="tab" id="prod-comment">
                                            <div class="content">
                                                @foreach($old_news as $news)
                                                <article class="widget-post">
                                                    <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                    <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                    <div class="post-info">{{ date("F d,Y",strToTime($news->created_at))}}</div>
                                                </article>
                                                @endforeach

                                            </div>
                                        </div>
                                        @endisset

                                    </div>

                                </div>

                            </div>
                            <!--End Product Info Tabs-->

                        </div>
                        <!--End Post Widget-->

                        @isset($category)
                        <!--Category Widget-->
                        <div class="sidebar-widget categories-widget">
                            <div class="sidebar-title">
                                <h2>Categories</h2>
                            </div>
                            <ul class="cat-list">
                                @foreach($category as $cat)
                                <li class="clearfix">
                                    <a href="{{ route('category-detail',$cat->slug) }}">{{ $cat->title}} 
                                        <!-- <span>({{ $cat->get}})</span> -->
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--End Category Widget-->
                        @endisset

                    </aside>
                </div>

            </div>

            <!--Fullwidth Add-->
            <div class="fullwidth-add text-center">
                <div class="image">
                    <a href="{{ $promo->footer_link}}" target="_blank"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/Promo_footer/'.$promo->footer_place) }}" alt="" /></a>
                </div>
            </div>

        </div>
    </div>
    <!--End Sidebar Page Container-->

    @isset($all_news)
    <!--Blog Carousel Section-->
    <section class="blog-carousel-section grey-bg">
        <div class="auto-container">
            <div class="three-item-carousel owl-carousel owl-theme">
            @foreach($all_news as $news)
                <!--News Block Three-->
                <div class="news-block-three">
                    <div class="inner-box">
                        <div class="image">
                            <img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt="" />
                            <div class="overlay-box">
                                <a href="{{ route('news-detail',$news->slug) }}" class="play-btn"><span class="icon qb-play-arrow"></span></a>
                                <div class="content">
                                    <div class="tag"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->getSubCategory->title}}</a></div>
                                    <h3><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></h3>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>{{ date("F d,Y",strToTime($news->created_at))}}</li>
                                        <li><span class="icon fa fa-comment-o"></span>{{ $news->getReview->count() ?? 0}}</li>
                                        <li><span class="icon qb-eye"></span>{{ number_format($news->view_count)}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
            </div>
        </div>
    </section>
    <!--End Blog Carousel Section-->
    @endisset

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <!--Sec Title-->
                    <div class="sec-title">
                        <h2>Latest News</h2>
                    </div>
                    @isset($news_latest)
                    <div class="content-blocks">
                        <!--News Block Four-->
                        @foreach($news_latest as $news)
                            <div class="news-block-four">
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="image-column col-md-6 col-sm-6 col-xs-12">
                                            <div class="image">
                                                <a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="content-box col-md-6 col-sm-6 col-xs-12">
                                            <div class="content-inner">
                                                <div class="category"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->getCat->title}}</a></div>
                                                <h3><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></h3>
                                                <ul class="post-meta">
                                                    <li><span class="icon fa fa-clock-o"></span>{{ $news->created_at->diffForHumans()}}</li>
                                                    <li><span class="icon fa fa-comment-o"></span>{{ $news->getReview->count() ?? 0}}</li>
                                                    <li><span class="icon fa fa-eye"></span>{{ number_format($news->view_count)}}</li>
                                                </ul>
                                                <div class="text">{{ Str::limit(strip_tags($news->news_content),'200','...')}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    @endisset

                    <!-- Styled Pagination -->
                    <div class="styled-pagination">
                        <ul class="clearfix">
                            {{$news_latest->links()}}
                        </ul>
                    </div>

                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar default-sidebar">

                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search" required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!--Recent News Widget-->
                        <div class="sidebar-widget recent-news-widget">
                                <div class="sec-title">
                                    <h2>Recent Reviews</h2>
                                </div>
                                <!--News Block Five-->
                                <div class="news-block-five">
                                    <div class="inner-box">
                                        
                                        <div class="image">
                                            <a href="{{ route('news-detail',$recent_news[0]['slug']) }}"><img src="{{ asset('Uploads/News/'.$recent_news[0]['image']) }}" alt="" /></a>
                                            <div class="category"><a href="{{ route('news-detail',$recent_news[0]['slug']) }}"></a></div>
                                        </div>
                                        <div class="lower-box">
                                            <h3><a href="{{ route('news-detail',$recent_news[0]['slug']) }}">{{$recent_news[0]['title']}}</a></h3>
                                            <div class="text">{{ Str::limit(strip_tags($recent_news[0]['news_content']),'200','...')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @isset($twits)
                        <!--Tweet Widget-->
                        <div class="sidebar-widget tweet-widget">
                            <div class="sec-title">
                                <h2>Recent Tweets</h2>
                            </div>
                            <div class="single-item-carousel owl-carousel owl-theme">
                                @foreach($twits as $review)
                                <div class="tweet-block">
                                    <div class="inner-box">
                                        <div class="tweet-icon">
                                            <span class="fa fa-twitter"></span>
                                        </div>
                                        <div class="text">{{ $review->review}}</div>
                                        <div class="post-time">{{ $review->created_at->diffForHumans()}}</div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        @endisset

                    </aside>
                </div>

            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->

@endsection
