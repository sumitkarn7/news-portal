@extends('layouts.app')

@section('js')

<script>
    setTimeout(function(){
        $('.alert').slideUp();
    },20000);
</script>
@endsection

@section('content')

@isset($news)

<!--Blog Single Gallery-->
    <div class="blog-single-gallery grey-bg">
            <div class="auto-container">
                <div class="image">
                    <img src="{{ asset('Uploads/News/'.$news->image) }}" alt="" />
                </div>
            </div>
        </div>
        <!--End Single Gallery-->
        
        <!--Sidebar Page Container-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <!--Content Side-->
                    <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="content">
                            <div class="blog-single">
                                <div class="inner-box">
                                    <div class="upper-box">
                                        <ul class="breadcrumb-bar">
                                            <li><a href="{{ route('homepage') }}">Home</a></li>
                                            <li>{{ $news->getSubCategory->title}}</li>
                                            <li>{{ $news->title}}</li>
                                        </ul>
                                        <ul class="tag-title">
                                            <li>{{@$news->getSubCategory->getCat->title}}</li>
                                            <li>{{ $news->getSubCategory->title}}</li>
                                        </ul>
                                        <h2>{{ $news->title}}</h2>
                                        <ul class="post-meta">
                                            <li><span class="icon qb-clock"></span>{{ date("F d,Y",strToTime($news->created_at))}}</li>
                                            <li><span class="icon qb-user2"></span>by {{ ucfirst($news->getAdmin->name) }}</li>
                                            <li><span class="icon fa fa-comment-o"></span>{{$news->getReview->count() ?? 0}} comments</li>
                                            <li><span class="icon qb-eye"></span>{{ number_format($news->view_count)}} Views</li>
                                        </ul>
                                        <ul class="social-icon-one alternate">
                                            <li class="share">Share:</li>
                                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                            <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li class="linkedin"><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                                            <li class="pinteret"><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                        </ul>
                                    </div>
                                    
                                    {!! $news->news_content!!}
                                    
                                    <!--New Article-->
                                    <ul class="new-article clearfix">
                                        <li><a href="#"><span class="fa fa-angle-left"></span> &ensp; &ensp; &ensp; &ensp; Previous Article</a></li>
                                        <li><a href="#">Next Article &ensp; &ensp; &ensp; &ensp; <span class="fa fa-angle-right"></span></a></li>
                                    </ul>
                                </div>
                                
                                <!--Author Box-->
                                <div class="author-box">
                                    <div class="author-comment">
                                        <div class="inner-box">
                                            <div class="image">
                                                @if($news->getAdmin->UserInfo && $news->getAdmin->UserInfo->image !=null)
                                                <img src="{{ asset('Uploads/User/'.$news->getAdmin->UserInfo->image) }}" alt="" />
                                                @else
                                                <img src="{{ asset('sample.png') }}" alt="" />
                                                @endif
                                            </div>
                                            <h4>{{ ucfirst($news->getAdmin->name) }}</h4>
                                            <div class="text">
                                                {{ $news->getAdmin->UserInfo->address}}
                                            </div>
                                            <ul class="social-icon-two">
                                                <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                                <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                                                <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                @isset($related_news)
                                <!--Related Posts-->
                                    
                                        <div class="related-posts">
                                            <div class="sec-title">
                                                <h2>Related Articles</h2>
                                            </div>
                                            <div class="related-item-carousel owl-carousel owl-theme">
                                                @foreach($related_news as $news_info)
                                                <!--News Block Two-->
                                                <div class="news-block-two small-block">
                                                    <div class="inner-box">
                                                        <div class="image">
                                                            <a href="{{ route('news-detail',$news_info->slug)}}"><img src="{{ asset('Uploads/News/'.$news_info->image)}}" alt="" /></a>
                                                            <div class="category"><a href="#">{{ $news_info->getSubCategory->title}}</a></div>
                                                        </div>
                                                        <div class="lower-box">
                                                            <h3><a href="{{ route('news-detail',$news_info->slug)}}">{{ $news_info->title}}</a></h3>
                                                            <ul class="post-meta">
                                                                <li><span class="icon fa fa-clock-o"></span>{{ date("F d,Y",strToTime($news_info->created_at))}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                @endisset
                                
                                <!--Comments Area-->
                                <div class="comments-area">
                                
                                    <div class="sec-title"><h2>{{ $news->getReview->count() ?? 0}} Comments</h2></div>
                                   
                                    @if($news->getReview && $news->getReview->count() >0)
                                    <!--Comment Box-->
                                    @foreach($news->getReview as $review)
                                        <div class="comment-box">
                                            <div class="comment">
                                                <div class="author-thumb">
                                                    @if($review->getUser->UserInfo && $review->getUser->UserInfo->image !=null)
                                                    <img src="{{ asset('Uploads/User/'.$review->getUser->UserInfo->image) }}" alt="">
                                                    @else
                                                    <img src="{{ asset('sample.png') }}" alt="">
                                                    @endif
                                                </div>
                                                <div class="comment-inner">
                                                    <div class="comment-info">{{ ucfirst($review->getUser->name)}}</div>
                                                    <div class="post-date">{{ date("F d,Y",strToTime($review->created_at))}}</div>
                                                    <div class="text">{{ $review->review}}.</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                    <p>No Comment Yet In This News.....</p>
                                    @endif

                                    
                                    
                                </div>
                                
                                <!-- Comment Form -->
                                <div class="comment-form">
                                        
                                    <div class="sec-title"><h2>Leave a comment</h2></div>
                                    
                                    
                                    @auth()
                                    <!--Comment Form-->
                                    <form method="post" action="{{ route('add-review',$news->id) }}">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                {{ Form::textarea('review','',['class'=>($errors->has('review') ?'is-invalid':''),'placeholder'=>'Message...'])}}
                                            </div>
                                            @error('review')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message}}
                                            </div>
                                            @enderror
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                <button class="theme-btn" type="submit">Submit Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                    @else
                                    <p>Plz <strong><a href="{{ route('login') }}">Login</a></strong> First To Comment In This News</p>
                                    @endauth
                                        
                                </div>
                                <!--End Comment Form -->
                                
                            </div>
                        </div>
                    </div>
                    
                    <!--Sidebar Side-->
                    <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <aside class="sidebar default-sidebar right-sidebar">
                        
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
                            
                            <!--Adds Widget-->
                            <div class="sidebar-widget sidebar-adds-widget">
                                <div class="adds-block" style="background-image:url({{ asset('Uploads/Promo_middle/'.$promo->middle_place) }});">
                                    <div class="inner-box">
                                        <div class="text">Advertisement</div>
                                        <a href="{{ $promo->middle_link}}" target="_blank" class="theme-btn btn-style-two">View Now</a>
                                    </div>
                                </div>
                            </div>
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
                                            
                                            <!--Tab / Active Tab-->
                                            <div class="tab active-tab" id="prod-popular">
                                                <div class="content">
                                                @isset($popular)
                                                    @foreach($popular as $news)
                                                        <article class="widget-post">
                                                            <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                            <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                            <div class="post-info">{{ $news->created_at->diffForHumans()}}</div>
                                                        </article>
                                                    @endforeach
                                                @endisset
                                                </div>
                                            </div>
                                            
                                            <!--Tab-->
                                            <div class="tab" id="prod-recent">
                                                <div class="content">
                                                    
                                                @isset($recent)
                                                    @foreach($recent as $news)
                                                        <article class="widget-post">
                                                            <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                            <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                            <div class="post-info">{{ $news->created_at->diffForHumans()}}</div>
                                                        </article>
                                                    @endforeach
                                                @endisset
                                                    
                                                </div>
                                            </div>
                                            
                                            <!--Tab-->
                                            <div class="tab" id="prod-comment">
                                                <div class="content">
                                                    
                                                @isset($old_news)
                                                    @foreach($old_news as $news)
                                                        <article class="widget-post">
                                                            <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a><div class="overlay"><span class="icon qb-play-arrow"></span></div></figure>
                                                            <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                                            <div class="post-info">{{ $news->created_at->diffForHumans()}}</div>
                                                        </article>
                                                    @endforeach
                                                @endisset
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <!--End Product Info Tabs-->
                                
                            </div>
                            <!--End Post Widget-->
                            
                            <!--Category Widget-->
                            <div class="sidebar-widget categories-widget">
                                <div class="sidebar-title">
                                    <h2>Categories</h2>
                                </div>
                                <ul class="cat-list">
                                    <li class="clearfix"><a href="#">Travel <span>(30)</span></a></li>
                                </ul>
                            </div>
                            <!--End Category Widget-->
                            
                        </aside>
                    </div>
                    
                </div>
                
            </div>
    </div>
<!--End Sidebar Page Container-->
@endisset
@endsection