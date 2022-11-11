@extends('layouts.app')
@section('content')
<section class="blog-page-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>blog</h3>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                
                <div class="blog-list-wrap">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="blog-thumb position-relative">
                                <a href="{{route('blog.details')}}">
                                    <img class="img-block" src="{{url('images/photography/photography2.jpg')}}" alt="">
                                </a>
                                <span class="blog-post-date">22 Nov 2021</span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                            <div class="blog-content">
                                <a href="{{route('blog.details')}}" class="blog-title">Many people limit themselves</a>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                <div class="btncover">
                                    <a href="{{route('blog.details')}}" class="blog-read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-list-wrap">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="blog-thumb position-relative">
                                <a href="{{route('blog.details')}}">
                                    <img class="img-block" src="{{url('images/photography/photography9.jpg')}}" alt="">
                                </a>
                                <span class="blog-post-date">22 Nov 2021</span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                            <div class="blog-content">
                                <a href="{{route('blog.details')}}" class="blog-title">Many people limit themselves</a>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                <div class="btncover">
                                    <a href="{{route('blog.details')}}l" class="blog-read-more">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="recnt-blog-stcky">
                    <div class="blog-title-head">
                        <h3>Recent Blog</h3>
                    </div>
                    <div class="recnt-blog">
                        <ul>
                            <li>
                                <a href="{{route('blog.details')}}">
                                    <div class="rcnt-blog-img">
                                        <img src="{{url('images/photography/photography2.jpg')}}" alt="">
                                    </div>
                                    <div class="rcnt-blog-txt">
                                        <h5>Lorem ipsum dolor sit</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur .</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('blog.details')}}">
                                    <div class="rcnt-blog-img">
                                        <img src="{{url('images/photography/photography2.jpg')}}" alt="">
                                    </div>
                                    <div class="rcnt-blog-txt">
                                        <h5>Lorem ipsum dolor sit</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur .</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection