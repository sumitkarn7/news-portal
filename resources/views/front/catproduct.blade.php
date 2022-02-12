@extends('layouts.app')

@section('js')

<script>
    setTimeout(function(){
        $('.alert').slideUp();
    },20000);
</script>
@endsection

@section('content')

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
            <div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                	<!--Sec Title-->
                    <div class="sec-title">
                    	<h2>{{ $cat->getCat->title}}</h2>
                    </div>
                    <div class="content-blocks">
                        <!--News Block Four-->
                        @isset($cat_news)
                        @foreach($cat_news as $news)
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
                                            <div class="category"><a href="{{ Route('category-detail',$news->getSubCategory->slug) }}">{{ $news->getSubCategory->title}}</a></div>
                                            <h3><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon fa fa-clock-o"></span>{{ $news->created_at->diffForHumans()}}</li>
                                                <li><span class="icon fa fa-comment-o"></span>{{ $news->getReview->count()}}</li>
                                                <li><span class="icon fa fa-eye"></span>{{ number_format($news->view_count)}}</li>
                                            </ul>
                                            <div class="text">{{  Str::limit(strip_tags($news->news_content),'200','...')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endisset

                    
                    
                    
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
                            @isset($recent_news)
                        	<!--News Block Five-->
                            <div class="news-block-five">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="{{ route('news-detail',$recent_news[0]['slug']) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$recent_news[0]['image']) }}" alt="" /></a>
                                        <div class="category"><a href="{{ route('category-detail',$recent_news[0]->getSubCategory->slug) }}">{{ $recent_news[0]->getSubCategory->title }}</a></div>
                                    </div>
                                    <div class="lower-box">
                                        <h3><a href="{{ route('news-detail',$recent_news[0]['slug']) }}">{{ $recent_news[0]['title']}}</a></h3>
                                       
                                        <div class="text">{{  Str::limit(strip_tags($recent_news[0]['news_content']),'200','...')}}</div>
                                    </div>
                                </div>
                            </div>
                            @endisset

                            @isset($latest)
                            @foreach($latest as $news)
                        	<!--Widget Post Two-->
                            <article class="widget-post-two">
                                <div class="inner">
                                    <figure class="post-thumb"><a href="{{ route('news-detail',$news->slug) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset('Uploads/News/'.$news->image) }}" alt=""></a></figure>
                                    <div class="text"><a href="{{ route('news-detail',$news->slug) }}">{{ $news->title}}</a></div>
                                    
                                </div>
                            </article>

                            @endforeach

                            @endisset
                            
                        </div>
                        
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
        </div>
    </div>
    <!--End Sidebar Page Container--> 

@endsection